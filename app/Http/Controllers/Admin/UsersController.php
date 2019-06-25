<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        //$users = User::paginate(5);
        $users = User::where('id', '!=', auth()->user()->id)->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view ('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->user_name = $request->get('user_name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        $user->save();

        return back()->with('info', ['success', 'Se ha creado el usuario']);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return back()->with('info', ['success', 'Se ha editado el usuario']);;
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        $users = User::where('id', '!=', auth()->user()->id)->paginate(5);

        return view('admin.users.index', compact('users'))
            ->with('info', ['success', 'Se ha borrado el usuario']);

    }
}
