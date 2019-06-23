<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;

  class User extends Authenticatable
  {
    use Notifiable;

    protected $fillable = [
      'name', 'email', 'password', 'phone', 'address', 'user_name'
    ];

    protected $hidden = ['password', 'remember_token',];

    protected $dates = ['last_logged_at'];

    protected $casts = ['email_verified_at' => 'datetime',];

    public function carts()
    {
      return $this->hasMany(Cart::class);
    }

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function getCartAttribute()
    {
      $cart = $this->carts()->where('status', 'active')->first();
      if ($cart)
         return $cart;

      $cart = new Cart();
      $cart->status = 'active';
      $cart->user_id = $this->id;
      $cart->save();

      return $cart;
    }

    public function getCartPendingAttribute()
    {
      $carts = $this->carts()->where('status', 'pending')->get();
      if ($carts)
         return $carts;
    }

    public function getDetailsCartsPendingAttribute()
    {
      $carts = $this->cart_pending;
      $total = 0;

      foreach($carts as $cart)
      {
          foreach($cart->details as $details)
          {
            $total += $details->subtotal;
          }
      }
      return $total;
      
    }

  }
