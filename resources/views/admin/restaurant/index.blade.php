<h1>Restaurantes</h1>

<a href="{{ route('restaurant.new') }}">Novo</a>

<hr>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($restaurants as $restaurant)
            <tr>
                <td>{{ $restaurant->id }}</td>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->created_at }}</td>
                <td>
                    <a href="{{ route('restaurant.edit', ['restaurant' => $restaurant->id]) }}">Editar</a>
                    <a href="{{ route('restaurant.remove', ['id' => $restaurant->id]) }}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

