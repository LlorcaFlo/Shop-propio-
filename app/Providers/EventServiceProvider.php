<?php

namespace App\Providers;

use App\Events\MinStockEvent;
use App\Events\PdfCatSendEvent;
use App\Events\ProductInCartEvent;
use App\Events\ProductPriceWasChangedEvent;
use App\Listeners\DetailPriceVariationListener;
use App\Listeners\MinStockListener;
use App\Listeners\PdfCatSendListener;
use App\Listeners\SendMailToNewUserRegisteredListener;
use App\Listeners\StoreLastLoginDateListener;
use App\Listeners\UpdateProductStockListener;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    
    protected $listen = [
       ProductInCartEvent::class          => [
          UpdateProductStockListener::class,
        ],
       Registered::class                  => [
          SendMailToNewUserRegisteredListener::class,
       ],
       Login::class                       => [
          StoreLastLoginDateListener::class,
       ],
       ProductPriceWasChangedEvent::class => [
          DetailPriceVariationListener::class,
       ],

       MinStockEvent::class => [
        MinStockListener::class,
       ],

       PdfCatSendEvent::class => [
        PdfCatSendListener::class,
      ]


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
