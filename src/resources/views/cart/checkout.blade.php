@extends('layouts.app')

@section('content')


    <div id="wrapper">

        @include('pages.partials.side-nav')

                <!-- Button to toggle side-nav -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>

        <div class="container-fluid">

            <h4 class="h4-responsive">Заказ</h4><br>

            @include('cart.partials.cart_checkout_table')


            <a href="{{ url('/') }}" class="btn btn-primary">Продолжить покупки</a>
            <a href="{{ route('cart') }}" class="btn btn-default">Купить</a>
            <br><br><br><br>

            @include('cart.partials.shipping_payment')

        </div>  <!-- close container -->
    </div>  <!-- close wrapper -->

@stop

