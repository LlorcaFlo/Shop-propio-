@extends('layouts.app')
@section('title', __('Editar_usuario'))
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
    @include('admin.partials.page-header')
    @include('admin.partials.alert')
    @include('partials.errors')


    <div class="container">
        <div class="row my-2">
            <div class="col-lg-4 order-lg-1 text-center">
                <img src="{{ asset('img/faces/avatar.jpg') }}" class="mx-auto img-fluid rounded-circle w-75 d-block" alt="avatar">
                <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input">
                    <span class="custom-file-control">{{__('Upload a different photo')}}</span>
                </label>
            </div>

            <div class="col-lg-8 order-lg-2">
                <div class="tab-content py-4">
                    <div class="tab-pane active text-dark" id="profile">
                        <h5 class="mb-3">{{ __('Edit') .' '. __('Profile') }}</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-sm-12 mb-3">
                                    <label for="UserName">{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control" id="UserName"
                                           value="{{ old('name', $user->name) }}">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="Email">{{ __('E-Mail Address') }}</label>
                                    <input type="text" name="email" class="form-control" id="Email"
                                           value="{{ old('email', $user->email) }}">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="UserName">{{ __('User').' '.__('Name') }}</label>
                                    <input type="text" name="user_name" class="form-control" id="UserName"
                                           value="{{ old('user_name', $user->user_name) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-12 mb-3">
                                    <label for="Phone">{{__('Phone')}}</label>
                                    <input type="text" name="phone" class="form-control" id="Phone"
                                           value="{{ old('phone', $user->phone) }}">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="Address">{{__('Address')}}</label>
                                    <input type="text" name="address" class="form-control" id="Address"
                                           value="{{ old('address', $user->address) }}">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="Admin">{{__('Admin')}}</label>
                                    <input type="checkbox" name="admin" class="form-control" id="Admin"
                                           value="{{ old('admin', $user->admin) }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 p-5 align-items-center">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-arrow-left"></i> Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Editar usuario</h2>
                @include('admin.partials.alert')
                @include('partials.errors')
            <!---------  FORM   ----------->
                <form action="{{ route ('users.update', $user->id ) }}"
                      method="post">
                    @csrf
                    <div class="row">

                        <!---------   NOMBRE   ----------->


                        <div class="col-sm-6">

                        </div>

                        <div class="col-sm-12 mb-3">
                            <label for="UserNick">Nick de Usuario</label>
                            <input type="text" name="user_name" class="form-control" id="UserNick"
                            value="{{ old('name', $user->user_name) }}">
                        </div>


                        <input type="hidden" name="password" class="form-control" id="UserPass"
                            placeholder="Password del Usuario" value="{{ $user->password }}">




                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="{{ route ('users.index') }}" class="btn btn-default">Cancelar</a>

                </form>
            </div>
        </div>
    </div>--}}
    @include ('partials.footer')
@endsection

