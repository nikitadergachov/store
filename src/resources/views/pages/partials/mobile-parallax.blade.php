


<div class="item" id="tf-home-parallax">
    <div class="view overlay hm-blue-slight">
        <a><img src="/src/public/images/slider/black_2.jpg" alt="Welcome">
            <div class="mask waves-effect waves-light"></div>
        </a>
        <div class="carousel-caption">
            <div class="animated fadeInDown">
                <h3><strong><span class="color">Покупайте любимые бренды</span></strong></h3>
                @foreach($rand_brands as $rand)
                    <h6 class="text-center" id="random_brands"><a href="{{ url('brand', $rand->id) }}">{{ $rand->brand_name }}</a></h6>
                @endforeach
            </div>
        </div>
    </div>
</div>