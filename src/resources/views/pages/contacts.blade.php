@extends('layouts.app')

@section('content')

    <div id="wrapper">

    @include('pages.partials.side-nav')

    <!-- Button to toggle side-nav -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>


        <div class="container-fluid">

            <h3 align="center">Контакты</h3>

            <h6 align="center">Телефон +7980010001</h6>
            <h6 align="center">Адрес: Г.Севастополь Улинца университетская 26</h6>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=DNavu6bwrqdSXCu55XrLg-gIO2Lm4wKT&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>

        </div>      <!-- Close container-fluid -->

    </div>  <!-- Close wrapper -->

@endsection
