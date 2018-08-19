<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
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
        $restaurants = Restaurant::all(['id', 'name']);
        return view('admin.menus.store', compact('restaurants'));
    }

    public function store(MenuRequest $request)
    {
        $request->validated();

        $menuData = $request->all();

        try {

            $restaurant = Restaurant::findOrFail($menuData['restaurant_id']);
            $restaurant->menus()->create($menuData);

            flash('Menu criado com sucesso!')->success();

        } catch (\Exception $e) {
            flash('Erro ao tentar cadastrar menu!')->error();
        }

        return redirect()->route('menu.index');
    }

    public function edit(Menu $menu)
    {
        $restaurants = Restaurant::all(['id', 'name']);
        return view('admin.menus.edit', compact('menu', 'restaurants'));
    }

    public function update(MenuRequest $request, $id)
    {
        $request->validated();

        $menuData = $request->all();

        try {

            $restaurant = Restaurant::findOrFail($menuData['restaurant_id']);
            $restaurant->menus()->update($menuData);

            flash('Menu atualizado com sucesso!')->success();

        } catch (\Exception $e) {
            flash('Erro ao tentar atualizar o menu!')->error();
        }

        return redirect()->route('menu.edit', ['id' => $id]);
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
