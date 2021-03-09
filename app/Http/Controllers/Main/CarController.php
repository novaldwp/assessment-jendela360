<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\CarRequest;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderByDesc('id')->paginate(5);

        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(CarRequest $request)
    {
        $params['name']     = $request->name;
        $params['price']    = $request->price;
        $params['stock']    = $request->stock;

        $store = Car::create($params);

        return redirect()->route('cars.index')->with("success", "Berhasil Menambahkan Data Mobil");
    }

    public function edit($id)
    {
        $car = $this->getCarById($id);

        return view('cars.edit', compact('car'));
    }

    public function update(CarRequest $request, $id)
    {
        $params['name']     = $request->name;
        $params['price']    = $request->price;
        $params['stock']    = $request->stock;

        $car    = $this->getCarById($id);
        $car->update($params);

        return redirect()->route('cars.index')->with("success", "Berhasil Mengubah Data Mobil");
    }

    public function destroy($id)
    {
        $car = $this->getCarById($id);
        $car->delete();

        return redirect()->back()->with("success", "Berhasil Menghapus Data Mobil");
    }

    public function getCarById($id)
    {
        $car = Car::FindOrFail($id);

        return $car;
    }
}
