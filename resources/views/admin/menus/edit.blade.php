@extends('layouts.app')
@section('content')
    <h1>Editar Menu</h1>

    <hr>

    <form action="{{ route('menu.update', ['id' => $menu->id]) }}" method="post">

        {{ csrf_field() }}

        <p class="form-group">
            <label for="name">Nome do Menu:</label>
            <input type="text" name="name" id="name" value="{{ $menu->name }}"
                   class="form-control @if($errors->has('name')) is-invalid @endif">

            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </p>

        <p class="form-group">
            <label for="price">Preço:</label>
            <input type="text" name="price" id="price" value="{{ $menu->price }}"
                   class="form-control @if($errors->has('price')) is-invalid @endif">

            @if($errors->has('price'))
                <span class="invalid-feedback">
                    {{ $errors->first('price') }}
                </span>
            @endif
        </p>

        <p class="form-group">
            <label for="price">Restaurante:</label>
            <select name="restaurant_id" id="restaurant_id" class="form-control">
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}"
                            @if($menu->restaurant_id == $restaurant->id) selected @endif>
                        {{ $restaurant->name }}
                    </option>
                @endforeach
            </select>

            @if($errors->has('restaurant_id'))
                <span class="invalid-feedback">
                    {{ $errors->first('restaurant_id') }}
                </span>
            @endif
        </p>

        <button type="submit" class="btn btn-success btn-lg">Atualizar</button>
    </form>
@endsection
