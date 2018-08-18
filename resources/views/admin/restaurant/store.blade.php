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

<form action="{{ route('restaurant.store') }}" method="post">

    {{ csrf_field() }}

    <p>
        <label for="name">Nome do restaurante:</label> <br>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        <br>
        @if($errors->has('name'))
            {{ $errors->first('name') }}
        @endif
    </p>

    <p>
        <label for="address">Endereço:</label> <br>
        <input type="text" name="address" id="address" value="{{ old('address') }}">
        <br>
        @if($errors->has('address'))
            {{ $errors->first('address') }}
        @endif
    </p>

    <p>
        <label for="description">Fale sobre o restaurante:</label> <br>
        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
        <br>
        @if($errors->has('description'))
            {{ $errors->first('description') }}
        @endif
    </p>

    <button type="submit">Cadastrar</button>
</form>
