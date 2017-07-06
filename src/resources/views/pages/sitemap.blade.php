@extends('layouts.app')

@section('content')

    <div id="wrapper">

    @include('pages.partials.side-nav')

    <!-- Button to toggle side-nav -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>


        <div class="container-fluid">
            <li>
                <a href="{{ url('sitemap') }}">
                    Карта сайта
                </a>
            </li>
            <li>
                <a href="{{ url('about') }}">
                    О нас
                </a>
            </li>
            <li>
                <a href="{{ url('contacts') }}">
                    Контакты
                </a>
            </li>
            @foreach($brands as $brand)
                <li>
                    <a href="{{ url('brand', $brand->id) }}">
                        Бренд {{ $brand->brand_name }}
                    </a>
                </li>
            @endforeach

                @foreach($categories as $category)


                    @foreach($category->children as $children)
                        <li>
                            <a href="{{ url('category', $children->id) }}">
                                Категория {{ $children->category }}
                            </a>
                        </li>
                    @endforeach

                @endforeach

            @foreach($products as $product)
                <li>
                    <a href="{{ route('show.product', $product->product_name) }}">
                        Товар {{ $product->product_name }}
                    </a>
                </li>

            @endforeach

        </div>      <!-- Close container-fluid -->

    </div>  <!-- Close wrapper -->


@endsection

@section('footer')

@endsection
