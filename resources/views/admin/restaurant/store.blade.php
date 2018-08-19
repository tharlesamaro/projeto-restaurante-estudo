@extends('layouts.app')
@section('content')
    <h1>Inserção de Restaurante</h1>

    <hr>

    <form action="{{ route('restaurant.store') }}" method="post">

        {{ csrf_field() }}

        <p class="form-group">
            <label for="name">Nome do restaurante:</label> <br>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="form-control @if($errors->has('name')) is-invalid @endif">

            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </p>

        <p class="form-group">
            <label for="address">Endereço:</label> <br>
            <input type="text" name="address" id="address" value="{{ old('address') }}"
                   class="form-control @if($errors->has('address')) is-invalid @endif">

            @if($errors->has('address'))
                <span class="invalid-feedback">
                    {{ $errors->first('address') }}
                </span>
            @endif
        </p>

        <p class="form-group">
            <label for="description">Fale sobre o restaurante:</label> <br>
            <textarea name="description" id="description" cols="30" rows="10"
                      class="form-control @if($errors->has('description')) is-invalid @endif">{{ old('description') }}</textarea>

            @if($errors->has('description'))
                <span class="invalid-feedback">
                    {{ $errors->first('description') }}
                </span>
            @endif
        </p>

        <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
    </form>
@endsection
