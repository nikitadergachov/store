
@if ($cart_total === 0)
    <a href="{{ url('/') }}" class="list-group-item list-group-item-danger"> В корзине нет товаров</a><br>
@else
    @foreach($cart_products as $cart_item)
        <div class="col-sm-12 col-md-12" id="Cart-Products-Container">
            <div class="col-sm-3 col-md-3 center-on-small-only">
                <a href="{{ route('show.product', $cart_item->products->product_name) }}">
                    <h6 class="center-on-small-only" id="featured-product-name">{{ $cart_item->products->product_name }}</h6><br>
                    @if ($cart_item->products->photos->count() === 0)
                        <img src="/src/public/images/no-image-found.jpg" alt="No Image Found Tag" id="Product-similar-Image" style="width: 100px; height: 100px;" >
                    @else
                        @if ($cart_item->featuredPhoto)
                            <img src="/{{ $cart_item->featuredPhoto->thumbnail_path }}" alt="Photo ID: {{ $cart_item->featuredPhoto->id }}" style="width: 100px; height: 100px;" />
                        @elseif(!$cart_item->featuredPhoto)
                            <img src="/{{ $cart_item->products->photos->first()->thumbnail_path}}" alt="Photo" style="width: 100px; height: 100px;" />
                        @else
                            N/A
                        @endif
                    @endif
                </a>
            </div>
            <div class="col-sm-4 col-md-2" id="Carts-Sub-Containers">
                @if($cart_item->products->reduced_price == 0)
                    <div class="center-on-small-only">Цена товара</div> <div class="light-300 black-text medium-500 center-on-small-only" id="Product_Reduced-Price-Cart">{{ $cart_item->products->price }} руб</div>
                    <br>
                    <p class="center-on-small-only">ISBN: {{ $cart_item->products->product_sku }}</p>
                @else
                    <div class="center-on-small-only">Цена товара</div> <div class="green-text medium-500 center-on-small-only" id="Product_Reduced-Price-Cart">{{ $cart_item->products->reduced_price }} руб</div>
                    <br>
                    <p class="center-on-small-only">ISBN: {{ $cart_item->products->product_sku }}</p>
                @endif
            </div>
            <div class="col-sm-1 col-md-1">
                <div class=" center-on-small-only"> Количество</div>
                <div class=" center-on-small-only"><b>{{$cart_item->qty}}</b></div>
            </div>
            <div class="col-sm-3 col-md-2" id="Carts-Sub-Containers">
                <div class="center-on-small-only">Общая цена</div>
                <div class="black-text medium-500 center-on-small-only" id="Product_Reduced-Price-Cart">{{$cart_item->total}} руб</div>
            </div>
            <div class="col-sm-1 col-md-1 center-on-small-only" id="Carts-Sub-Containers">
                <a href="{{URL::route('delete_book_from_cart', array($cart_item->id))}}">
                    <i class="fa fa-times fa-2x" aria-hidden="true" style="color: darkred;"></i>
                </a>
            </div>
        </div>
    @endforeach

    <div class="col-sm-12 col-md-12" id="Cart-Products-Container" style="padding: 25px">
        <div class="col-xs-4 col-sm-8 col-md-9">
            <i class="material-icons md-18">shopping_cart</i> {{ $count }}
        </div>
        <div class="col-xs-8 col-sm-4 col-md-3">
            <b>Сумма: {{$cart_total}} руб</b>
        </div>
    </div>

@endif
