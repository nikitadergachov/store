<div class="menu">
    <div class="accordion">
        @if ($orders->count() == 0)
           Нет заказов
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
                                            @if ($orderitem->pivot->total_reduced == 0)
                                                {{$orderitem->pivot->total}} руб
                                            @else
                                                {{$orderitem->pivot->total_reduced}} руб
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><b>Данные клиента</b></td>
                                    <td>ФИО {{ $order->name }} <br> Номер телефона {{ $order->phone }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>Адрес доставки</b></td>
                                    <td>Адрес {{$order->address}}<br>Город {{$order->city}}<br>Регион {{$order->region}}<br>Доп.Адрес {{$order->address_2}}</td>
                                    <td><b>Сумма</b></td>
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
