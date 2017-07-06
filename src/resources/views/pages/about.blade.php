@extends('layouts.app')

@section('content')

    <div id="wrapper">

    @include('pages.partials.side-nav')

    <!-- Button to toggle side-nav -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>


        <div class="container-fluid">

            <h3 align="center">О нас</h3>

            <h5 align="width">Постараемся быть краткими и не утомить вас официальными данными из нашей истории.

                Наша компания начала свою работу в октябре 2016 года, а уже в ноябре 2016 года открылся самый первый магазин нашей компании в Севастополе на улице Университетской.

            </h5>

            <h5 align="width">
                На сегодняшний день наша компания насчитывает не более 1 магазина по всей стране.
                Компания Anichov – это самые интересные, самые свежие, самые актуальные новинки из мира высоких технологий для удовлетворения потребностей даже самых взыскательных и требовательных клиентов!

            </h5>

        </div>      <!-- Close container-fluid -->

    </div>  <!-- Close wrapper -->


@endsection
