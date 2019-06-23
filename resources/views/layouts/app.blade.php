<!DOCTYPE html>
<html lang="en">

@include ('partials.head')

<body class="@yield('body-class')">
<!-------------------------- BARRA DE NAVEGACIÓN ----------------------------->
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <!--------   BOTON 'TIENDA'  ------------>
            <div class="navbar-translate">
            <a class="navbar-brand" href="{{ url('/') }}">{{-- <img width="200" height="50" class="d-inline-block align-top" src="{{ asset('img/Llorca-shop-logo.png') }}"> --}}Llorca-Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <!---         BUSCADOR DE PRODUCTOS              ----->
        <div class="m-auto w-75 text-center">
            <div class="nav-item">
                <form action="{{ route ('search_product') }}">
                    <input  class="rounded" type="text" placeholder="Nombre del producto" name="query" id="search">
                    <button type="submit" class="btn btn-primary btn-sm rounded-circle">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <!--------   BOTÓN 'LOGIN'   -------->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                <!--------   BOTÓN REGISTER   -------->
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <!--------   DESPLEGABLE USER ------------>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <!--------  'DASHBOARD'  ------------>
                            <a class="dropdown-item" href="{{ route ('home') }}">
                                Dashboard
                            </a>

                            @if( auth()->user ()->admin )

                                <!--------  'GESTIONAR PRODUCTOS'  ------------>
                                <a class="dropdown-item" href="{{ route('users.index') }}">
                                    Gestionar usuarios
                                </a>

                                <a class="dropdown-item" href="{{ route('admin_products_index') }}">
                                    Gestionar productos
                                </a>

                                    <!--------  'GESTIONAR CATEGORÍAS'  ------------>
                                <a class="dropdown-item" href="{{ route('admin_categories_index') }}">
                                    Gestionar categorías
                                </a>
                                <a class="dropdown-item" href="{{ route('show_carts_pending') }}">
                                    Gestionar carritos pendientes
                                </a>

                                <a class="dropdown-item" href="{{ route('admin_providers_index') }}">
                                    Gestionar compras
                                </a>
                            @endif

                        <!--------  LOGOUT  ------------>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>

                    <div class="collapse navbar-collapse" id="navbarContent">

                        <!--------   BOTON 'SELECCIONA UN IDOMA'  ------------>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                   href="#"
                                   id="navbarDropdownMenuLink"
                                   data-toggle="dropdown"
                                   aria-haspopup="false"
                                   aria-expanded="false">
                                    {{ __("Selecciona un idioma") }}
                                </a>

                                <!--------   OPCIONES DESPLEGABLE IDIOMA  ------------>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('set_language', ['es']) }}">
                                        {{ __("Español") }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('set_language', ['en']) }}">
                                        {{ __("Inglés") }}
                                    </a>
                                </div>
                            </li>
                        </ul>

                    </div>
                    {{--fin prueba desplegable idioma--}}
                @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<!--   Core JS Files   -->
<script src="{{ asset ('js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('js/plugins/moment.min.js') }}"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{ asset ('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset ('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
<!--	Plugin for Sharrre btn -->
<script src="{{ asset ('js/plugins/jquery.sharrre.js') }}" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset ('js/material-kit.js?v=2.0.4') }}" type="text/javascript"></script>

@yield('scripts')

</body>

</html>