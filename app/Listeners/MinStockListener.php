<?php

namespace App\Listeners;

use App\Mail\MinStockMail;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class MinStockListener
{
    public function handle($event)
    {
        $admins = User::all()->where('admin', true);
        
        foreach($event->details as $detail)
        { 
        	if($detail->product->stock < $detail->product->min_stock)
       		{
        	   foreach($admins as $admin)
        	   {
        	 	Mail::to($admin)->send(new MinStockMail());
        	   }
        	}
        }
    }
}
