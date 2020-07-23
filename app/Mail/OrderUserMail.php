<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $subject = 'Order has been placed';

    /**
     * Create a new message instance.
     *
     * @param $order
     */
    public function __construct($orderid)
    {
        $this->order =Order::where('id',$orderid)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->order;

        return $this->markdown('emails.user-order');
    }
}
