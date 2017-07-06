@extends('layouts.app')

@section('content')


    <div id="wrapper">

        @include('pages.partials.side-nav')

       <!-- Button to toggle side-nav -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>

        <div class="container-fluid">

            <h4 class="h4-responsive">Корзина</h4><br>

            @include('cart.partials.cart_table')


            @if ($cart_total === 0)
                <a href="{{ url('/') }}" class="btn btn-primary">Продолжить покупки</a>
            @else
                <a href="{{ url('/') }}" class="btn btn-primary">Продолжить покупки</a>
                <a href="{{ route('checkout') }}" class="btn btn-default">Купить</a>
            @endif

            <br><br><br>

        </div>  <!-- close container -->

    </div>  <!-- close wrapper -->

@stop
