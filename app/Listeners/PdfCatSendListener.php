<?php

namespace App\Listeners;

use App\Mail\NewOrder;
use App\Mail\NewOrderAdmin;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class PdfCatSendListener
{
    public function handle($event)
    {
        $admins = User::all()->where('admin', true);

        $pdf = App::make ('dompdf.wrapper');
        $pdf2 = App::make ('dompdf.wrapper');

        $pdf->loadView('pdf.order_user', ['user' => $event->user, 'cart' => $event->cart ]);
        $pdf2->loadView('pdf.order_admin', ['user' => $event->user, 'cart' => $event->cart ]);

        Mail::to($event->user)->send(new NewOrder($event->user, $event->cart, $pdf));

        foreach ($admins as $admin) 
        {
            Mail::to($admin)->send(new NewOrderAdmin($event->user, $event->cart, $pdf2));
        }
    }
}
