@if ($cart_total === 0)

@else
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" id="Checkout-Shipping-Payment-Container">
                <div class="panel-heading">Информация о доставке </div>
                <div class="panel-body">

                    <form id="payment-form" role="form" method="POST" action="/order">
                        {!! csrf_field() !!}

                        <div class="alert alert-danger payment-errors @if(!$errors->any()){{'hidden'}}@endif">
                            {{$errors->first('error')}}
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>ФИО</label>
                                <input type="text" title="name" class="form-control" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label>Номер телефона</label>
                                <input type="text" title="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label>Адрес</label>
                                <input type="text" title="address" class="form-control" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('address_2') ? ' has-error' : '' }}">
                                <label>Дополнительный адрес (опционально)</label>
                                <input type="text" title="address_2" class="form-control" name="address_2" value="{{ old('address_2') }}">
                                @if ($errors->has('address_2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label>Город</label>
                                <input type="text" title="city" class="form-control" name="city" value="{{ old('city') }}">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="region">Регион:</label>
                                <input type="text" title="region" class="form-control" name="region" value="{{ old('city') }}">
                                @if ($errors->has('region'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6" style="padding-left: 0;">
                                <div class="form-group{{ $errors->has('index') ? ' has-error' : '' }}">
                                    <label>Индекс</label>
                                    <input type="text" title="index" class="form-control" name="index" value="{{ old('index') }}">
                                    @if ($errors->has('index'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('index') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <br><br><br>
                            </div>
                        </div>

                        <div class="heading">Платёжная информация</div><hr>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                                <label>ФИО владельца карты</label>
                                <input type="text" class="form-control" size="20" name="full_name" value="{{ old('full_name') }}">
                                @if ($errors->has('full_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Номер карты</label>
                                <input type="text" class="form-control" maxlength="19" data-stripe="number" >
                                <p>Для теста: 4242 4242 4242 4242</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CVC</label>
                                <input type="text" class="form-control" maxlength="4" data-stripe="cvc"/>
                                <p>Для теста: 123</p>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label class="col-md-4 control-label">Expiration (MM/YYYY)</label>
                            <div class="col-md-6">
                                <input style="width: 20% !important; display: inline !important;" type="text" class="form-control" size="2" data-stripe="exp-month"/>
                                <span style="font-size: 30px; vertical-align: middle">/</span>
                                <input style="width: 40% !important; display: inline !important;" type="text" class="form-control" size="4" data-stripe="exp-year"/>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-md-3">
                                {!! Form::label(null, 'Месяц окончания действия') !!}
                                {!! Form::selectMonth(null, null, ['class' => 'form-control', 'data-stripe="exp-month"'], '%m') !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::label(null, 'Год окончания действия') !!}
                                {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, ['class' => 'form-control', 'data-stripe="exp-year"']) !!}
                            </div>
                        </div>


                        <div class="col-md-12">
                            <br><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default waves-effect waves-light">
                                    Оплатить
                                </button>
                            </div>
                        </div>




                    </form> <!-- close form -->

                </div>  <!-- close panel-body -->
            </div>  <!-- close panel-default -->
        </div>  <!-- close col-md-10 -->
    </div>  <!-- row -->

@endif

<br><br><br><br> <br><br><br><br>