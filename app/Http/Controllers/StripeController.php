<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Cart;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth'); // if you want user to be logged in to use this function then uncomment this code.
    }


    public function bankpayment($order_number){

        return view('bankPayment',compact('order_number'));
    }

    public function bankPay(Request $request){

        $data = $request->all();
        $order_no = $data['order_number'];

        $order = Order::where('order_number',$order_no)->first();

        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = "Interect";
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));

    }


    public function handleonlinepay(Request $request)
    {

        $input = $request->input();
        try {
            \Stripe\Stripe::setApiKey(config('settings.stripe_secret_key'));

            // Creating a customer - If you want to create customer uncomment below code.
            /*  $customer = \Stripe\Customer::create(array(
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken,
                    'card' => $request->stripeCard
                ));

                $stripe_id = $customer->id;

            // Card instance
            // $card = \Stripe\Card::create($customer->id, $request->tokenId);
            */

            $unique_id = uniqid(); // just for tracking purpose incase you want to describe something.

            // Charge to customer
            $charge = \Stripe\Charge::create(array(
                'description' => " - Amount: " . $input['amount'] . ' - ' . $unique_id,
                'source' => $request->stripeToken,
                'amount' => (int)($input['amount'] * 100), // the mount will be consider as cent so we need to multiply with 100
                'currency' => config('settings.currency_code')
            ));


            $order = Order::where('id',$request->order_no)->first();
            $order->status = 'processing';
            $order->payment_status = 1;
            $order->payment_method = "Stripe - $unique_id";
            $order->save();

            Cart::clear();


            return response()->json([
                'message' => 'Your order placed successfully. Your order number is : '.$order->order_number,
                'state' => 'success'
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'There were some issue with the payment. Please try again later.',
                'state' => 'error'
            ]);
        }
    }
}
