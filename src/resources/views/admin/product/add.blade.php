@extends('admin.dash')

@section('content')

    <div class="container" id="admin-product-container">

            <br><br>
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>
        <a href="{{ url('admin/products') }}" class="btn btn-danger">Назад</a>
            <br><br>

        <h4 class="text-center">Добавить новый товар</h4><br><br>

        <div class="col-md-12">

            <form role="form" method="POST" action="{{ route('admin.product.post') }}">
                {{ csrf_field() }}

                <div class="col-sm-6 col-md-6" id="Product-Input-Field">
                    <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                        <label>Название товара</label>
                        <input type="text" class="form-control" id = "product_name" name="product_name" value="{{ old('product_name') }}" placeholder="Название товара">
                        <span id="error_product_name" class="help-block red-text"></span>
                        @if($errors->has('product_name'))
                            <span class="help-block">{{ $errors->first('product_name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6 col-md-6" id="Product-Input-Field">
                    <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                        <label>Бренд</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            <option value="" ></option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" @if ( old('brand_id') == $brand->id) selected="selected" @endif >{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                        <span id="error_brand" class="help-block red-text"></span>

                    @if($errors->has('brand_id'))
                            <span class="help-block">{{ $errors->first('brand_id') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12" id="category-dropdown-container">

                    <div class="col-sm-6 col-md-6" id="Product-Input-Field">
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label>Цена</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="material-icons">attach_money</i></div>
                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Цена товара">
                            </div>
                            <span id="error_price" class="help-block red-text"></span>

                        @if($errors->has('price'))
                                <span class="help-block">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6" id="Product-Input-Field">
                        <div class="form-group{{ $errors->has('reduced_price') ? ' has-error' : '' }}">
                            <label>Цена по скидке(опционально)</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="material-icons">attach_money</i></div>
                                <input type="text" class="form-control" name="reduced_price"  id="reduced_price" value="{{ old('reduced_price') }}" placeholder="Цена товара по скидке">
                            </div>
                            <span id="error_reduced_price" class="help-block red-text"></span>
                            @if($errors->has('reduced_price'))
                                <span  class="help-block">{{ $errors->first('reduced_price') }}</span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-md-12" id="category-dropdown-container">

                    <div class="col-sm-6 col-md-6" id="Product-Input-Field">
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label>Категория</label>
                            <select class="form-control" name="category" id="category" data-url="{{ url('api/dropdown')}}">
                                <option value=""></option>
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                            <span id="error_category" class="help-block red-text"></span>

                        @if($errors->has('category'))
                                <span class="help-block">{{ $errors->first('category') }}</span>
                            @endif
                        </div>
                        <br>
                    </div>

                    <div class="col-sm-6 col-md-6" id="Product-Input-Field">
                        <div class="form-group{{ $errors->has('cat_id') ? ' has-error' : '' }}">
                            <label>Подкатегория</label>
                            <select class="form-control" name="cat_id"  id="sub_category">
                                <option value=""></option>
                            </select>
                            <span id="error_cat_id" class="help-block red-text"></span>

                        @if($errors->has('cat_id'))
                                <span class="help-block">{{ $errors->first('cat_id') }}</span>
                            @endif
                        </div>
                        <br>
                    </div>

                </div>

                <div class="col-sm-3 col-md-3" id="Product-Input-Field">
                    <div class="form-group">
                        <label>Рекомендуемый товар</label><br>
                        <input type="checkbox" name="featured" value="1">
                    </div>
                </div>

                <div class="col-sm-3 col-md-3" id="Product-Input-Field">
                    <div class="form-group{{ $errors->has('product_qty') ? ' has-error' : '' }}">
                        <label>Количество товара</label>
                        <input type="number" class="form-control" name="product_qty" id="product_qty" value="{{ old('product_qty') }}" placeholder="Количество товара" min="0">
                        <span id="error_qty" class="help-block red-text"></span>

                    @if($errors->has('product_qty'))
                            <span class="help-block">{{ $errors->first('product_qty') }}</span>
                        @endif
                    </div>
                </div>


                <div class="col-sm-6 col-md-6" id="Product-Input-Field">
                    <div class="form-group{{ $errors->has('product_sku') ? ' has-error' : '' }}">
                        <label>Код товара</label>
                        <input type="text" class="form-control" name="product_sku"  id="product_sku" value="{{ old('product_sku') }}" placeholder="Сгенерировать код товара" readonly="readonly">
                        <button class="btn btn-info btn-sm waves-effect waves-light" onclick="GetRandom()" type="button" id="product_sku">Сгенирировать</button>
                        @if($errors->has('product_sku'))
                            <span class="help-block">{{ $errors->first('product_sku') }}</span>
                        @endif
                    </div>
                </div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Описание</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Характеристики</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Описарние товара</label>
                                <textarea id="product-description" name="description">
                                    {{ old('description') }}
                                </textarea>
                                <span id="error_description" class="help-block red-text"></span>

                            @if($errors->has('description'))
                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">


                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('product_spec') ? ' has-error' : '' }}">
                                <label for="product_spec">Характеристики товара - <i>Опционально</i></label>
                                <textarea id="product_spec" name="product_spec">
                                     {{ old('product_spec') }}
                                </textarea>
                                @if($errors->has('product_spec'))
                                    <span class="help-block">{{ $errors->first('product_spec') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit" name ="submit" disabled>Создать товар</button>
                </div>

            </form>

        </div> <!-- Close col-md-12 -->

    </div>  <!-- Close container -->
@endsection

@section('footer')
    <!-- Include Froala Editor JS files. -->
    <script type="text/javascript" src="{{ asset('src/public/js/libs/froala_editor.min.js') }}"></script>

    <!-- Include Plugins. -->
    <script type="text/javascript" src="{{ asset('src/public/js/plugins/align.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/public/js/plugins/char_counter.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/public/js/plugins/font_family.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/public/js/plugins/font_size.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/public/js/plugins/line_breaker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/public/js/plugins/lists.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/public/js/plugins/paragraph_format.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/public/js/plugins/paragraph_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/public//js/plugins/quote.min.js') }}"></script>


    <script>
        $(function() {
            $('#product_spec').froalaEditor({
                charCounterMax: 3500,
                height: 500,
                codeBeautifier: true,
                placeholderText: 'Введите характеристики товара...',
            })
        });
    </script>

    <script>
        $(function() {
            $('#product-description').froalaEditor({
                charCounterMax: 2500,
                height: 500,
                codeBeautifier: true,
                placeholderText: 'Введите описание товара...',
            })
        });
    </script>



@endsection
