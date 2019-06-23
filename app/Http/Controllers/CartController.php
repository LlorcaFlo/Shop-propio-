<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Events\MinStockEvent;
use App\Events\PdfCatSendEvent;
use App\User;
use Carbon\Carbon;

class CartController extends Controller
{

   public function update()
   {
      $user = auth()->user();
      $cart = $user->cart;
      $cart->status = 'pending';
      $cart->order_date = Carbon::now();
      $cart->save();

      PdfCatSendEvent::dispatch($user, $cart);
      MinStockEvent::dispatch($cart->details);

      return back ()->with ('status', 'Tu pedido ha sido registrado. Te contactaremos pronto vía email');
   }

   public function ordered_carts()
   {
      return view ('carts.ordered_carts');
   }


   public function show_carts_pending()
   {
      $users = collect();
         $carts = Cart::where('status','pending')->get();
     
         foreach ($carts as $cart) 
         {
            if(! $users->contains($cart->user))
            {
             $users->push($cart->user);
            }
         }
      return view('admin.users.cartPendings', compact('users'));
      
   }

   public function show_pending($id)
   {
      $user = User::find($id);

      $carts = $user->cart_pending;

      return view('admin.users.user_pending', compact('carts', 'user'));

   }

}
