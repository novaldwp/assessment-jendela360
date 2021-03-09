<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\CarSellingRequest;
use App\Models\Car;
use App\Models\CarSelling;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class CarSellingController extends Controller
{
    public function index()
    {
        $carsellings = CarSelling::with(['cars'])->orderByDesc('id')->paginate(5);

        return view('car-selling.index', compact('carsellings'));
    }

    public function create()
    {
        $cars = Car::orderBy('name')->get();

        return view('car-selling.create', compact('cars'));
    }

    public function store(CarSellingRequest $request)
    {
        $params['name']     = $request->name;
        $params['email']    = $request->email;
        $params['phone']    = $request->phone;
        $params['car_id']   = $request->car_id;

        $store = CarSelling::create($params);

        Mail::to($params['email'])->send(new SendMail($params));

        return redirect()->route('car-selling.index')->with("success", "Berhasil menambahkan data penjualan mobil");
    }

    public function edit($id)
    {
        $carselling = $this->getSellingById($id);
        $cars       = Car::orderByDesc('id')->get();

        return view('car-selling.edit', compact('carselling', 'cars'));
    }

    public function update(CarSellingRequest $request, $id)
    {
        $params['name']     = $request->name;
        $params['email']    = $request->email;
        $params['phone']    = $request->phone;
        $params['car_id']   = $request->car_id;

        $carselling = $this->getSellingById($id);
        $carselling->update($params);

        return redirect()->route('car-selling.index')->with("success", "Berhasil mengubah data penjualan mobil");
    }

    public function destroy($id)
    {
        $carselling = $this->getSellingById($id);
        $carselling->delete();

        return redirect()->route('car-selling.index')->with("success", "Berhasil menghapus data penjualan mobil");
    }

    public function getSellingById($id)
    {
        $carselling = CarSelling::findOrFail($id);

        return $carselling;
    }
}
