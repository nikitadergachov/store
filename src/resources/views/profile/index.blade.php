@extends('layouts.app')

@section('content')

    <div id="wrapper">

        @include('pages.partials.side-nav')

        <!-- Button to toggle side-nav -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>

        <div class="container-fluid">

            <div class="col-md-12">

                <h4 class="text-center">Ваши заказы</h4><br>

                <div class="menu">
                    <div class="accordion">
                        @if ($orders->count() == 0)
                            У вас не заказов
                        @else
                            @foreach($orders as $order)
                                <div class="accordion-group">
                                    <div class="accordion-heading" id="accordion-group">
                                        <a class="accordion-toggle" data-toggle="collapse" href="#order{{$order->id}}">Заказ #{{$order->id}} - {{prettyDate($order->created_at)}}</a>
                                    </div>
                                    <div id="order{{$order->id}}" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <table class="table table-striped table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Товар
                                                    </th>
                                                    <th>
                                                        Количество
                                                    </th>
                                                    <th>
                                                        Цена товара
                                                    </th>
                                                    <th>
                                                        Сумма
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->orderItems as $orderitem)
                                                    <tr>
                                                        <td><a href="{{ route('show.product', $orderitem->product_name) }}">{{$orderitem->product_name}}</a></td>
                                                        <td>{{$orderitem->pivot->qty}}</td>
                                                        <td>
                                                            @if($orderitem->pivot->reduced_price == 0)
                                                                {{ $orderitem->pivot->price }} руб
                                                            @else
                                                               {{ $orderitem->pivot->reduced_price }} руб
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($orderitem->pivot->total_reduced == 0) руб
                                                                {{$orderitem->pivot->total}}
                                                            @else
                                                                {{$orderitem->pivot->total_reduced}} руб
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td><b>Информация клиента</b></td>
                                                    <td>ФИО {{ $order->name }}, Телефон {{$order->phone}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Адрес доставки</b></td>
                                                    <td>{{$order->address}}<br>{{$order->city}}, {{$order->region}}</td>
                                                    <td><b>Сумма заказа: </b></td>
                                                    <td><b>{{$order->total}} руб</b></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>

        </div>  <!-- close container-fluid -->

    </div>  <!-- close wrapper -->


@endsection