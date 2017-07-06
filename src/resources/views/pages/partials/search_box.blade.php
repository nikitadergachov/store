{!! Form::open(array('route' => 'queries.search')) !!}
<div class="typeahead-container" id="typeahead-container">
    <div class="typeahead-field">
            <span class="typeahead-query" id="typeahead-query">
                {!! Form::text('search', null, array('id' => 'flyer-query', 'placeholder' => 'Найти товар', 'autocomplete' =>'off')) !!}
            </span>
        {!! Form::submit('Поиск', ['id' => 'Search-Btn']) !!}
    </div>
</div>
{!! Form::close() !!}
