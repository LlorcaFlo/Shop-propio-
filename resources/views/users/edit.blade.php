@extends('layouts.app')
@section('title', __('Edit'))
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
    @include('admin.partials.page-header')
    @include('admin.partials.alert')
    @include('partials.errors')

    <div class="container">
        <div class="row my-2">
            {{--AVATAR--}}
            <div class="col-lg-4 order-lg-1 text-center">
                <img src="{{ asset('img/faces/avatar.jpg') }}" class="mx-auto img-fluid rounded-circle w-75 d-block" alt="avatar">
                <label class="custom-file">
                    <input type="file" id="file" name="photo" class="custom-file-input">
                    <span class="custom-file-control">{{__('Upload a different photo')}}</span>
                </label>
            </div>
            {{--DATOS DEL USUARIO --- USER DATA--}}
            <div class="col-lg-8 order-lg-2">
                <div class="tab-content py-4">
                    <div class="tab-pane active text-dark" id="profile">
                        <h5 class="mb-3">{{ __('Edit') .' '. __('Profile') }}</h5>
                        <form action="{{ route ('users.update', $user->id ) }}" method="post">
                            @csrf
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
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="hidden" name="password" class="form-control"
                                           value="{{ old('password', $user->password) }}">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{__('Save')}}</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{ route('users.index') }}" class="btn btn-outline-dark">
                                    <i class="fa fa-arrow-left"></i> {{__('Back')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include ('partials.footer')
@endsection

