<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCancelMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $subject = 'Your Order Has been Canceled';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderid)
    {
        $this->order = Order::where('id',$orderid)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order-cancel');
    }
}
