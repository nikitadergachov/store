
@if ($carts->count() == 0)
    <p>Нет активный корзин</p>
@else
    <table class="table table-bordered table-responsive table-condensed">
        <thead>
        <tr>
            <th></th>
            <th>ID корзины</th>
            <th>Имя пользователя</th>
            <th>Товары</th>
            <th>Сумма</th>
            <th>Дата создания</th>
        </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
            <tr>
                <td class="text-center">
                    <form method="post" action="{{ route('admin.cart.delete', $cart->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button id="delete-cart-btn">
                            <i class="material-icons red-text">delete_forever</i>
                        </button>
                    </form>
                </td>
                <td>#{{ $cart->id }}</td>
                <td>{{ $cart->user->username }}</td>
                <td>{{ $cart->products->product_name }}</td>
                <td>{{ $cart->qty }}</td>
                <td>{{ prettyDate($cart->created_at) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif