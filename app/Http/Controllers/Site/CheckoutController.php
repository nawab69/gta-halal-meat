<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\StripePaymentController;
use Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    protected $payPal;

    protected $orderRepository;


    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
    {
        $this->payPal = $payPal;
        $this->orderRepository = $orderRepository;


    }



    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {



        $data = $this->validate($request, [
            'email'   => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => '',
            'post_code' => 'required',
            'phone_number' => 'required',
            'notes' => '',
            'payment_mode' => 'required',
            'total' => 'required',
            'tax' => 'required',
            'delivery' => 'required',
            'delivery_type' => 'required',
            'discount' => '',
            'state' => 'required',
            'delivery_other' => '',
            'd_first_name'  => '',
            'd_last_name' => '',
            'd_address' => '',
            'd_city' => '',
            'd_country' => '',
            'd_post_code' => '',
            'd_phone_number' => '',
            'd_state'  => '',
            'd_email'  => '',
            'terms' =>  'required',
        ]);

        if(session()->has('coupon')){
            session()->forget('coupon');
        }



        if($data['total'] < config('settings.minimum')){
            $minimum = 'Please Order Minimum '.config('settings.minimum').' $';
            return back()->with('error',$minimum);
        }






        $order = $this->orderRepository->storeOrderDetails($data);


        if($data['payment_mode'] == 1) {
            // You can add more control here to handle if the order is not stored properly
            if ($order) {
                $this->payPal->processPayment($order);
            }
        }
        elseif($data['payment_mode']==2){

            return redirect('pay')->with('order',$order);
        }
        elseif ($data['payment_mode']==3){
            return redirect('bankpayment/'.$order->order_number);
        }
        return redirect()->back()->with('message','Order not placed');
    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}
