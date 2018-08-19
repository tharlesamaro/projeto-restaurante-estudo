<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function new()
    {
        return view('admin.users.store');
    }

    public function store(UserRequest $request)
    {
        $userData = $request->all();

        $request->validated();

        $userData['password'] = bcrypt($userData['password']);

        $user = new User();
        $user->create($userData);

        flash('Usuário criado com sucesso!')->success();

        return redirect()->route('usuario.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $userData = $request->all();

        $request->validated();

        $userData['password'] = bcrypt($userData['password']);

        $user = User::findOrFail($id);
        $user->update($userData);

        print 'Usuário atualizado com sucesso';
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        print 'Usuário deletado com sucesso';
    }
}
