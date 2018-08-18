<?php
/**
 * Created by PhpStorm.
 * User: tharles
 * Date: 16/08/18
 * Time: 23:05
 */
?>

<h1>Editar Restaurante</h1>

<hr>

<form action="{{ route('restaurant.update', ['id' => $restaurant->id]) }}" method="post">

    {{ csrf_field() }}

    <p>
        <label for="name">Nome do restaurante:</label> <br>
        <input type="text" name="name" id="name" value="{{ $restaurant->name }}">
    </p>

    <p>
        <label for="address">Endereço:</label> <br>
        <input type="text" name="address" id="address" value="{{ $restaurant->address }}">
    </p>

    <p>
        <label for="description">Fale sobre o restaurante:</label> <br>
        <textarea name="description" id="description" cols="30" rows="10">
            {{ $restaurant->description }}
        </te    xtarea>
    </p>

    <button type="submit">Cadastrar</button>
</form>
