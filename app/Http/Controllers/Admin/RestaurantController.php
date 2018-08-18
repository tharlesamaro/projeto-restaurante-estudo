<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        return Restaurant::all();
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
        $restauranteData = $request->all();

        $restaurante = Restaurant::findOrFail($id);
        $restaurante->update($restauranteData);

        print 'Restaurante atualizado com sucesso';
    }
}
