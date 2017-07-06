@extends('admin.dash')

@section('content')

    <div class="container" id="admin-category-container">

        <br><br>
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>
        <a href="{{ url('admin/categories') }}" class="btn btn-danger">Назад</a>
        <br><br>

        <div class="col-xs-12 col-sm-9 col-md-9" id="admin-category-container">

            <ul class="collection with-header">
                <li class="collection-header">
                    @foreach($categories as $category)
                        <h5 class="text-center">Все товары категории - <b>{{ $category->category }}</b></h5>
                    @endforeach
                </li>
                @if ($count === 0)
                    <h6 class="text-center">Нет товаров данной подкатегории</h6>
                @else()
                    <?php $i = 1; ?>
                    @foreach($products as $product)
                        <li class="collection-item">
                            # {{ $i }}&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('admin.product.edit', $product->id) }}" id="Show-Product-Under-Sub-Category">
                                {{$product->product_name}}
                            </a>
                        </li>
                    <?php $i++; ?>
                    @endforeach
                @endif
            </ul>



        </div>

    </div>

@endsection