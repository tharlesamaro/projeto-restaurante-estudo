<?php
/**
 * Created by PhpStorm.
 * User: tharles
 * Date: 16/08/18
 * Time: 23:05
 */
?>

<h1>Inserção de Restaurante</h1>

<hr>

{{--{{ var_dump($errors->all()) }}--}}

<form action="{{ route('restaurant.store') }}" method="post">

    {{ csrf_field() }}

    <p>
        <label for="name">Nome do restaurante:</label> <br>
        <input type="text" name="name" id="name">
        <br>
        @if($errors->has('name'))
            {{--@foreach($errors->get('name') as $erro)--}}
                {{--{{ $erro }}--}}
            {{--@endforeach--}}
            {{ $errors->first('name') }}
        @endif
    </p>

    <p>
        <label for="address">Endereço:</label> <br>
        <input type="text" name="address" id="address">
        <br>
        @if($errors->has('address'))
            {{ $errors->first('address') }}
        @endif
    </p>

    <p>
        <label for="description">Fale sobre o restaurante:</label> <br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <br>
        @if($errors->has('description'))
            {{ $errors->first('description') }}
        @endif
    </p>

    <button type="submit">Cadastrar</button>
</form>
