@extends('layouts.app')
@section('content')
    <h1>Inserção de Menu</h1>

    <hr>

    <form action="{{ route('menu.store') }}" method="post">

        {{ csrf_field() }}

        <p class="form-group">
            <label for="name">Nome do Menu:</label> <br>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="form-control @if($errors->has('name')) is-invalid @endif">

            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </p>

        <p class="form-group">
            <label for="price">Preço:</label> <br>
            <input type="text" name="price" id="price" value="{{ old('price') }}"
                   class="form-control @if($errors->has('price')) is-invalid @endif">

            @if($errors->has('price'))
                <span class="invalid-feedback">
                    {{ $errors->first('price') }}
                </span>
            @endif
        </p>

        <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
    </form>
@endsection
