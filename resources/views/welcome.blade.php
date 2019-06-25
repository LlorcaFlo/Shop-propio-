@extends('layouts.app')
@section('title', __('Bienvenido'))
@section('body-class', 'landing-page sidebar-collapse')
@section('styles')
    <style>
        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }
        .tt-hint {
            color: #999
        }
        .tt-menu { /* used to be tt-dropdown-menu in older versions */
            width: 200px;
            margin-top: 4px;
            padding: 4px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
        .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
        }
        .tt-suggestion.tt-cursor, .tt-suggestion:hover {
            color: #fff;
            background-color: #0097cf;
        }
        .tt-suggestion p {
            margin: 0;
        }
        .searchbar{
            margin-bottom: auto;
            margin-top: auto;
            height: 60px;
            background-color: #353b48;
            border-radius: 30px;
            padding: 10px;
        }
        .search_input{
            color: white;
            border: 0;
            outline: 0;
            background: none;
            width: 0;
            caret-color:transparent;
            line-height: 40px;
            transition: width 0.2s linear;
        }

        .searchbar:hover > .search_input{
            width: 450px;
            caret-color:red;
            transition: width 0.2s linear;
            padding: 0 10px;
        }
        .search_input:hover > .search_icon{
            background: mediumpurple;

        }

        .searchbar:hover > .search_icon{
            background: #7a43b6;
            color: white;
        }
        .search_icon{
            height: 40px;
            width: 40px;
            float: right;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <!--------- ENCABEZADO: TEXTO "TU TIENDA COMIENZA AQUÍ", BOTÓN ¿COMO FUNCIONA? -------->
    <div class="page-header header-filter pb-5" data-parallax="true"
         style="background-image: url('{{ asset ('img/bg-page.jpg') }}')">
        <div class="container">
            <div class="row p-5 mt-5 main-raised justify-content-center">
                <div class="col-md-6 pt-5">
                    <h2 class="text-white title">{{__('Tu tienda comienza aquí') }}</h2>
                    <h4 class="text-white">{{__('Realiza pedidos en línea') }}</h4>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"
                       class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"> </i> {{__('¿Cómo funciona?') }}
                    </a>
                </div>
                <div class="col-md-6 pt-5">
                    <h3 class="title text-center">
                        Algunos de nuestros productos
                    </h3>
                    <div id="carouselExampleControls" class="carousel slide w-50 m-auto shadow pb-3" data-ride="carousel">
                        <div class="carousel-inner d-none d-md-block rounded-circle" role="listbox">
                            @foreach( $products as $product)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <a href="{{route('product_show', $product->id)}}">
                                        <img class="d-block img-fluid w-100 img-circle"
                                             src="{{$product->featured_image_url}}"
                                             alt="{{$product->name}}">
                                    </a>
                                    {{--<div class="carousel-caption d-none d-md-block d-md-block text-dark">
                                            <h6 class="bg-white rounded">{{$product->name}}</h6>
                                    </div>--}}
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-danger" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-danger" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---  CUERPO: INFORMACIÓN DE LA TIENDA, BUSCADOR DE PRODUCTOS, LISTADO DE CATEGORÍAS Y FORMULARIO RÁPIDO   ----->
    <div class="main main-raised section">
        <div class="container">
            <div class="text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">¿Por qué nuestra tienda es especial?</h2>
                        <h5 class="description">Puedes revisar nuestra relación completa de productos, comparar precios
                            y realizar tus pedidos cuando estés seguro.</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="info">
                                        <div class="icon icon-info">
                                            <i class="material-icons">chat</i>
                                        </div>
                                        <h4 class="info-title">Atendemos tus dudas</h4>
                                        <p>Atendemos rápidamente cualquier duda que tengas vía chat. No estás sólo, sino que
                                            siempre estamos atentos a tus inquietudes.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="info">
                                        <div class="icon icon-success">
                                            <i class="material-icons">verified_user</i>
                                        </div>
                                        <h4 class="info-title">Pago seguro</h4>
                                        <p>Todo pedido que realices será confirmado a través de una llamada. Si no confías en
                                            los pagos en líea puedes pagar contra entrega el valor acordado.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="info">
                                        <div class="icon icon-danger">
                                            <i class="material-icons">fingerprint</i>
                                        </div>
                                        <h4 class="info-title">Información privada</h4>
                                        <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario.
                                            Nadie más tiene acceso a esta información.</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev bg-dark" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next bg-dark" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h2 class="text-center title">¿Aún no te has registrado?</h2>
                        <h4 class="text-center description">Regístrate ingresando tus datos básicos, y prodrás realizar
                            tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas,
                            con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.</h4>
                        <form class="contact-form" method="get" action="{{ url('/register') }}">
                            <div class="row">
                                <!--------   NOMBRE   -------->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nombre</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <!--------   EMAIL   -------->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Correo electrónico</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <!--------   'REGISTRAR'   -------->
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                    <button class="btn btn-primary btn-raised">
                                        Registrar
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!---        LISTADO DE CATEGORÍAS         ----->
        <div class="text-center">
            <h2 class="title">Categorias de nuestros productos</h2>
            <div class="team">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4">
                            <div class="team-player">
                                <div class="card card-plain rounded">

                                    <!---   IMAGEN  ----->
                                    <div class="card-img-top">
                                        <img src="{{ $category->featured_image_url }}"
                                             alt="Thumbnail Image"
                                             class="img-raised rounded-circle img-fluid"
                                        >
                                    </div>

                                    <!---   NOMBRE-ENLACE  ----->
                                    <h4 class="card-title">
                                        <a href="{{ route ('category_show', $category->id) }}">
                                            {{ $category->name }}
                                        </a>
                                        <br>
                                    </h4>

                                    <!---   DESCRIPCIÓN  ----->
                                    <div class="card-body">
                                        <p class="card-description">{{ $category->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include ('partials.footer')
@endsection
@section('scripts')
    <script src="{{ asset ('js/typeahead.bundle.min.js') }}" type="text/javascript"></script>
    <script>
        $( function () {
            var products = new Bloodhound( {
                datumTokenizer : Bloodhound.tokenizers.whitespace,
                queryTokenizer : Bloodhound.tokenizers.whitespace,
                prefetch : '{{ url("/products/json") }}'
            } );
            $( '#search' ).typeahead( {
                    hint : true,
                    highlight : true,
                    minLength : 1
                },
                {
                    name : 'products',
                    source : products // objeto bloodhound
                } );
        } );
    </script>
@endsection

