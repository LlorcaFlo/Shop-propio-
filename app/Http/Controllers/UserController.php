<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct ()
    {
        $this->middleware ( 'auth' );
    }
    public function index()
    {
        $user = Auth()->user();
        return view('users.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth()->user();
        return view('users.edit', compact('user'));
    }
}