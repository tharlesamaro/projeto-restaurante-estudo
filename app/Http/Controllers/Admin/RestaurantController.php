<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurant.index', compact('restaurants'));
    }

    public function new()
    {
        return view('admin.restaurant.store');
    }

    public function store(Request $request)
    {
        $restaurantData = $request->all();

        $restaurant = new Restaurant();
        $restaurant->create($restaurantData);

        print 'Restaurante criado com sucesso!';
    }

    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request, $id)
    {
        $restaurantData = $request->all();

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($restaurantData);

        print 'Restaurante atualizado com sucesso';
    }

    public function delete($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        print 'Restaurante deletado com sucesso';
    }
}
