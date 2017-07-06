
@if ($product_quantity->count() == 0)
    <p>Товар закончился</p>
@else
    <table class="table table-bordered table-responsive table-condensed">
        <thead>
        <tr>
            <th>ID товара</th>
            <th>Название товара</th>
            <th>Количество товара</th>
            <th>Изменить количество товара</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_quantity as $product)
            <tr>
                <td>#{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_qty }}</td>
                <td>
                    <form action="update" method="post" class="form-inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="product" value="{{ $product->id }}" />
                        <div class="form-group{{ $errors->has('product_qty') ? ' has-error' : '' }}">
                            <input type="number" name="product_qty" class="form-control" title="Product Quantity" min="0">
                            @if($errors->has('product_qty'))
                                <span class="help-block">{{ $errors->first('product_qty') }}</span>
                            @endif
                            <button class="btn btn-sm btn-default"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif