<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarSelling;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{

    public function index()
    {
        $now = date('Y-m-d H:i:s');
        $week = date('Y-m-d H:i:s', strtotime('-7 days', strtotime(date('Y-m-d H:i:s'))));

        $sellingtoday   = CarSelling::with(['cars'])
            ->whereDate('created_at', date('Y-m-d'))
            ->select(DB::Raw('count(car_id) as total_selling, car_id'))
            ->groupBy('car_id')
            ->orderByDesc('total_selling')
            ->first();

        $sellingweek   = CarSelling::with(['cars'])
            ->whereBetween('created_at', [$week, $now])
            ->select(DB::Raw('count(car_id) as total_selling, car_id'))
            ->groupBy('car_id')
            ->orderByDesc('total_selling')
            ->first();

        return view('dashboard.index', compact('sellingtoday', 'sellingweek'));
    }
}
