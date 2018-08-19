<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Http\Requests\RestaurantRequest;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index()
    {
        //$restaurants = Restaurant::where('owner_id', Auth::user()->id)->get();

        $restaurants = Auth::user()->restaurants;
        return view('admin.restaurant.index', compact('restaurants'));
    }

    public function new()
    {
        return view('admin.restaurant.store');
    }

    public function store(RestaurantRequest $request)
    {
        $request->validated();

        $restaurantData = $request->all();

        try {

            $user = Auth::user();
            $user->restaurants()->create($restaurantData);

            flash('Restaurante criado com sucesso!')->success();

        } catch (\Exception $e) {
            flash('Erro ao tentar cadastrar restaurante!')->error();
        }

        return redirect()->route('restaurant.index');
    }

    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurant.edit', compact('restaurant'));
    }

    public function update(RestaurantRequest $request, $id)
    {
        $request->validated();

        $restaurantData = $request->all();

        try {

            $restaurant = Restaurant::findOrFail($id);
            $restaurant->update($restaurantData);

            flash('Restaurante atualizado com sucesso!')->success();

        } catch (\Exception $e) {
            flash('Erro ao tentar atualizar o restaurante!')->error();
        }

        return redirect()->route('restaurant.edit', ['id' => $restaurant->id]);
    }

    public function delete($id)
    {
        try {

            $restaurant = Restaurant::findOrFail($id);
            $restaurant->delete();

            flash('Restaurante deletado com sucesso!')->success();

        } catch (\Exception $e) {
            flash('Erro ao deletar restaurante!')->error();
        }

        return redirect()->route('restaurant.index');
    }
}
