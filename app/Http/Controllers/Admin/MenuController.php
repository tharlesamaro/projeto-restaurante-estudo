<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function new()
    {
        return view('admin.menus.store');
    }

    public function store(MenuRequest $request)
    {
        $request->validated();

        $menuData = $request->all();

        try {

            $menu = new Menu();
            $menu->create($menuData);

            flash('Menucriado com sucesso!')->success();

        } catch (\Exception $e) {
            flash('Erro ao tentar cadastrar menu!')->error();
        }

        return redirect()->route('menu.index');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(MenuRequest $request, $id)
    {
        $request->validated();

        $menuData = $request->all();

        try {

            $menu = Menu::findOrFail($id);
            $menu->update($menuData);

            flash('Menu atualizado com sucesso!')->success();

        } catch (\Exception $e) {
            flash('Erro ao tentar atualizar o menu!')->error();
        }

        return redirect()->route('menu.edit', ['id' => $menu->id]);
    }

    public function delete($id)
    {
        try {

            $menu = Menu::findOrFail($id);
            $menu->delete();

            flash('Menu deletado com sucesso!')->success();

        } catch (\Exception $e) {
            flash('Erro ao deletar menu!')->error();
        }

        return redirect()->route('menu.index');
    }
}
