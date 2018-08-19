@extends('layouts.app')
@section('content')
    <a href="{{ route('menu.new') }}" class="float-right btn btn-success">Novo</a>

    <h1 class="float-left">Menu</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Restaurante</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
        </thead>

        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->name }}</td>
                <td>
                    <a href="{{ route('restaurant.edit', ['restaurant' => $menu->restaurant->id]) }}">
                        {{ $menu->restaurant->name }}
                    </a>
                </td>
                <td>{{ $menu->created_at }}</td>
                <td>
                    <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}"
                       class="btn btn-primary">Editar</a>
                    <a href="{{ route('menu.remove', ['id' => $menu->id]) }}"
                       class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
