<?php

namespace App\Mail;

use App\Cart;
use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrderAdmin extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $cart;
    private $pdf;

    public function __construct(User $user, Cart $cart, PDF $pdf)
    {
        $this->user = $user;
        $this->cart = $cart;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this
            ->view('emails.new_order_admin')
            ->with('user', $this->user)
            ->with('cart', $this->cart)
            ->attachData($this->pdf->output(), 'Factura de la compra del usuario '. $this->user->user_name .'.pdf')
            ->subject('Nuevo Pedido de Shop');
    }
}
