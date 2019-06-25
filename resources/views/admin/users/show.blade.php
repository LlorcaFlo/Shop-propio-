@extends('layouts.app')
@section('title', 'Usuario')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
    @include('admin.partials.page-header')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs float-right">
                    <li class="nav-item ">
                        @if($user->cart_pending->count() == "0")
                            <a href="{{ route('user_pendings', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> {{ $user->cart_pending->count() }}</a>
                        @else
                            <a href="{{ route('user_pendings', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart" rel="tooltip" title="Ver pedidos usuario"></i> {{ $user->cart_pending->count() }}</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ('users.edit', $user->id ) }}" class="btn btn-success btn-sm" rel="tooltip" title="Editar usuario"><i class="fa fa-edit"></i></a>
                    </li>
                    <li class="nav-item">
                        <!-------    BUTTON ELIMINAR   ----------->
                        <form method="post" action="{{ route('users.destroy', $user->id ) }}">
                            @csrf
                            @method('delete')
                            @if($user->admin)
                                <a rel="tooltip" class="btn btn-dark btn-sm"
                                   title="El usuario es administrador">
                                    <i class="fa fa-close"></i></a>
                            @elseif($user->cart_pending->count())
                                <a rel="tooltip" class="btn btn-dark btn-sm"
                                   title="El usuario tiene un carrito pendiente">
                                    <i class="fa fa-close"></i></a>
                            @else
                                <button type="submit" rel="tooltip" class="btn btn-danger btn-sm" title="Eliminar"><i class="fa fa-trash"></i>
                                </button>
                            @endif
                        </form>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active text-dark" id="profile">
                        <h5 class="mb-3">{{ __('User Profile') }}</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <h6>{{ __('Name') }}</h6>
                                <p>
                                    {{ $user->name }}
                                </p>
                                <h6>{{ __('E-Mail Address') }}</h6>
                                <p>
                                    {{ $user->email }}
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h6>{{ __('Phone') }}</h6>
                                <p>
                                    {{ $user->phone }}
                                </p>
                                <h6>{{ __('Address') }}</h6>
                                <p>
                                    {{ $user->address }}
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h6>{{ __('User name') }}</h6>
                                <p>
                                    {{ $user->user_name }}
                                </p>
                                <h6>{{ __('Admin') }}</h6>
                                @if($user->admin)
                                    <label for="check1"><strong>Si</strong></label>
                                    <input id="check2" type="checkbox" checked disabled>

                                    <label for="check2"><strong>No</strong></label>
                                    <input id="check2" type="checkbox" disabled>
                                @else
                                    <label for="check1"><strong>Si</strong></label>
                                    <input id="check2" type="checkbox" disabled>

                                    <label for="check2"><strong>No</strong></label>
                                    <input id="check2" type="checkbox" checked disabled>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> {{ __('Recent Activity') }}</h5>
                                <table class="table table-sm table-hover table-striped">
                                    <tbody>
                                    <tr>
                                        <td><strong>Login </strong>{{ $user->last_logged_at->diffForHumans()}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Última vez editado</strong> {{ $user->updated_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Registro</strong> {{ $user->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('users.index') }}" class="btn btn-outline-dark"><i class="fa fa-arrow-left"></i> Volver</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-1 text-center">
                <img src="{{ asset('img/faces/avatar.jpg') }}" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                <h6 class="mt-2">{{ __('Upload a different photo') }}</h6>
                <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input">
                    <span class="custom-file-control">{{__('Choose file')}}</span>
                </label>
            </div>
        </div>
    </div>
    @include ('partials.footer')
@endsection
