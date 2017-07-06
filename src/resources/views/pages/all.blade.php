@extends('layouts.app')


@section('content')


    <div id="wrapper">

    @include('pages.partials.side-nav')

    <!-- Button to toggle side-nav -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>

        <div class="container-fluid">



            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Сортировать по
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('all.newest')}}">Новизне</a></li>
                    <li><a href="{{ route('all.lowest' )}}">Возрастанию цены</a></li>
                    <li><a href="{{ route('all.highest') }}"> Убыванию цены</a></li>
                    <li><a href="{{ route('all.alpha.lowest' )}}">По наименованию А-Я</a></li>
                    <li><a href="{{ route('all.alpha.highest' )}}">По наименованию Я-А</a></li>
                </ul>
            </div>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-12 wow slideInLeft" id="product-sub-container">
                        <div class="col-md-4 text-center hoverable">
                            <a href="{{ route('show.product', $product->product_name) }}">
                                @if ($product->photos->count() === 0)
                                    <img src="/src/public/images/no-image-found.jpg" alt="No Image Found Tag" id="Product-similar-Image">
                                @else
                                    @if ($product->featuredPhoto)
                                        <img src="/{{ $product->featuredPhoto->thumbnail_path }}" alt="Photo ID: {{ $product->featuredPhoto->id }}" />
                                    @elseif(!$product->featuredPhoto)
                                        <img src="/{{ $product->photos->first()->thumbnail_path}}" alt="Photo" />
                                    @else
                                        N/A
                                    @endif
                                @endif
                            </a>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ route('show.product', $product->product_name) }}">
                                <h5 class="center-on-small-only">{{ $product->product_name }}</h5>
                                <h6 class="center-on-small-only">Бренд: {{ $product->brand->brand_name }}</h6>
                                <p style="font-size: .9em;">{!! nl2br(str_limit($product->description, $limit = 200, $end = '...')) !!}</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-center">
                            @if($product->reduced_price == 0)
                                {{  $product->price }} руб
                                <br>
                            @else
                                <div class="text-danger list-price"><s>{{ $product->price }} руб</s></div>
                                {{ $product->reduced_price }} руб
                            @endif
                            <br><br><br>
                            @if($product->product_qty==0)
                                <h5 class="text-center red-text">Распроданно</h5>
                            @else
                                <form action="/cart/add" method="post" name="add_to_cart">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="product" value="{{$product->id}}" />
                                    <input type="hidden" name="qty" value="1" />
                                    <button class="btn btn-default waves-effect waves-light">В корзину</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>  <!-- close container-fluid-->
        {!! $products->links() !!}
    </div> <!-- close wrapper -->

@endsection

@section('footer')

@endsection