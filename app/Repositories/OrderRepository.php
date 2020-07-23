<?php

namespace App\Repositories;

use App\Mail\OrderAdminMail;
use App\Mail\OrderUserMail;
use App\Models\Delivery;
use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Contracts\OrderContract;
use Illuminate\Support\Facades\Mail;
use Newsletter;

class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {

        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => auth()->user()->id ?? '1',
            'status'            =>  'pending',
            'grand_total'       =>  $params['total'],
            'sub_total'         => Cart::getSubTotal(),
            'tax'               => $params['tax'],
            'shipping'          => $params['delivery'],
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,
            'first_name'        =>  $params['first_name'],
            'last_name'         =>  $params['last_name'],
            'address'           =>  $params['address'],
            'city'              =>  $params['city'],
            'country'           =>  $params['country'] ?? 'empty',
            'post_code'         =>  $params['post_code'],
            'phone_number'      =>  $params['phone_number'],
            'notes'             =>  $params['notes'] ?? 'empty',
            'email'             =>  $params['email'],
            'payment_mode'      =>  $params['payment_mode'],
            'delivery_type'     =>  $params['delivery_type'],
            'discount'          =>  $params['discount'],
        ]);

        if ($order) {

            $items = Cart::getContent();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();


                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum(),
                    'cutting_instruction' => $item->attributes['cutting_instruction'] ?? '',
                    'other_instruction' => $item->attributes['other_instruction'] ?? '',
                ]);

                $order->items()->save($orderItem);
            }

            if ( ! Newsletter::isSubscribed($order->email) )
            {
                Newsletter::subscribePending($order->email);
            }
        }

        if(!isset($params['delivery_other'])){
            $delivery = new Delivery([
                'order_id'  => $order->id,
                'address'   => $order->address,
                'apartment' => $order->country ?? 'empty',
                'city'      => $order->city,
                'provinces' => $params['state'],
                'post_code' => $order->post_code,
                'first_name' => $order->first_name,
                'last_name'  => $order->last_name,
                'phone'      => $order->phone_number,
                'email'      => $order->email,
            ]);
        }
        else{
            $delivery = new Delivery([
                'order_id'  => $order->id,
                'address'   => $params['d_address'],
                'apartment' => $params['d_country'] ?? 'empty',
                'city'      => $params['d_city'],
                'provinces' => $params['d_state'],
                'post_code' => $params['d_post_code'],
                'first_name' => $params['d_first_name'],
                'last_name'  => $params['d_last_name'],
                'phone'      => $params['d_phone_number'],
                'email'      => $params['d_email'],
            ]);
        }

        $order->delivery()->Save($delivery);

        Mail::to($order->email)->send(new OrderUserMail($order->id));

        Mail::to('gtahalalmeat@gmail.com')->send(new OrderAdminMail($order->id));


        return $order;
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findOrderByNumber($orderNumber)
    {
        return Order::where('order_number', $orderNumber)->first();
    }
}
