<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OrderCancelMail;
use App\Mail\OrderCompleteMail;
use App\Mail\OrderDeclineMail;
use App\Mail\OrderRefundMail;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderProcessController extends Controller
{
    public function completed(Order $order){
       $order->status = "completed";
       $order->update();

       Mail::to($order->email)->send(new OrderCompleteMail($order->id));

           return back();
    }
    public function declined(Order $order){
        $order->status = "decline";
        $order->update();
        Mail::to($order->email)->send(new OrderDeclineMail($order->id));
        return back();
    }

    public function refunded(Order $order){
        $order->status = "refunded";
        $order->update();
        Mail::to($order->email)->send(new OrderRefundMail($order->id));
        return back();
    }

    public function canceled(Order $order){
        $order->status = "canceled";
        $order->update();
        Mail::to($order->email)->send(new OrderCancelMail($order->id));
        return back();
    }
}
