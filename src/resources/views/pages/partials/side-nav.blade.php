 <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">

                <li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fixed" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Бренды <span class="caret"></span>
                        <ul class="dropdown-menu">
                            @foreach($brands as $brand)
                                <li id="dropdown-category">
                                    <a href="{{ url('brand', $brand->id) }}">
                                        {{ $brand->brand_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </a>
                </li>
                </li>



                @foreach($categories as $category)
                    <li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ $category->category }} <span class="caret"></span>
                                <ul class="dropdown-menu">
                                    @foreach($category->children as $children)
                                        <li id="dropdown-category">
                                            <a href="{{ url('category', $children->id) }}">
                                                {{ $children->category }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </a>
                        </li>
                    </li>
                @endforeach

                <li>
                    <a href="{{ url('contacts') }}">
                        Контакты
                    </a>
                </li>
                <li>
                    <a href="{{ url('about') }}">
                        О нас
                    </a>
                </li>
                <li>
                    <a href="{{ url('sitemap') }}">
                        Карта сайта
                    </a>
                </li>
                <li>
                    <a href="{{ url('all') }}">
                        Все товары
                    </a>
                </li>


                <br><br>

                <li>
                    <a href="{{ url('admin/dashboard') }}">
                        Администратор
                    </a>
                </li>


            </ul>

        </div>  <!-- close sidebar-wrapper -->