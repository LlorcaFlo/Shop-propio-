<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index ()
   {
      $products = Product::Has('providers')->with('providers')->paginate(3);
      return view ('admin.providers.index', compact ('products') );
   }
}
