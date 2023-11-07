<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $products;
    public $fullPrice;
    public function __construct($products, $fullPrice)
    {
        $this->products = $products;
        $this->fullPrice = $fullPrice;
    }

    public function build()
    {
        return $this->view('mail.confirm-order')
            ->subject('Ваш заказ был отправлен');
    }
}
