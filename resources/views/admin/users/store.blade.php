@extends('layouts.app')
@section('content')
    <h1>Inserção de Usuário</h1>

    <hr>

    <form action="{{ route('user.store') }}" method="post">

        {{ csrf_field() }}

        <p class="form-group">
            <label for="name">Nome do Usuário:</label> <br>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="form-control @if($errors->has('name')) is-invalid @endif">

            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </p>

        <p class="form-group">
            <label for="email">E-mail:</label> <br>
            <input type="text" name="email" id="email" value="{{ old('email') }}"
                   class="form-control @if($errors->has('email')) is-invalid @endif">

            @if($errors->has('email'))
                <span class="invalid-feedback">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </p>

        <p class="form-group">
            <label for="password">Senha:</label> <br>
            <input type="password" name="password" id="password" value="{{ old('password') }}"
                   class="form-control @if($errors->has('password')) is-invalid @endif">

            @if($errors->has('password'))
                <span class="invalid-feedback">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </p>

        <p class="form-group">
            <label for="confirm_password">Confirmar Senha:</label> <br>
            <input type="password" name="password_confirmation" id="password-confirm" value="{{ old('password_confirmation') }}"
                   class="form-control @if($errors->has('password_confirmation')) is-invalid @endif">

            @if($errors->has('password_confirmation'))
                <span class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </span>
            @endif
        </p>


        <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
    </form>
@endsection
