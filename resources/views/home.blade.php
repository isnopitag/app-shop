@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Panel de compras</h2>

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif

            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="active">
                    <a href="#dashboard" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Carrito de compras
                    </a>
                </li>
                {{--<li>--}}
                    {{--<a href="#tasks" role="tab" data-toggle="tab">--}}
                        {{--<i class="material-icons">list</i>--}}
                        {{--Pedidos realizados--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
        
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>SubTotal</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>


            <div class="text-center">
                <form method="post" action="{{ url('/order') }}">
                    {{ csrf_field() }}
                    
                    <button class="btn btn-primary btn-round">
                        <i class="material-icons">done</i> Realizar pedido
                    </button>
                </form>
                
            </div>

        </div>

    </div>
</div>

@include('includes.footer')
@endsection
