<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\CarSelling;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $now    = date('Y-m-d H:i:s');
        $yest   = date('Y-m-d H:i:s', strtotime('-1 days', strtotime(date('Y-m-d'))));
        $week   = date('Y-m-d H:i:s', strtotime('-7 days', strtotime(date('Y-m-d H:i:s'))));

        $sellingtoday   = CarSelling::with(['cars'])
            ->whereDate('created_at', date('Y-m-d'))
            ->select(DB::Raw('count(car_id) as total_selling, car_id'))
            ->groupBy('car_id')
            ->orderByDesc('total_selling')
            ->first();

        $sellingyest    = CarSelling::with(['cars'])
            ->whereDate('created_at', $yest)
            ->select(DB::Raw('count(car_id) as total_selling, car_id'))
            ->groupBy('car_id')
            ->orderByDesc('total_selling')
            ->first();

        $sellingweek    = CarSelling::with(['cars'])
            ->whereBetween('created_at', [$week, $now])
            ->select(DB::Raw('count(car_id) as total_selling, car_id'))
            ->groupBy('car_id')
            ->orderByDesc('total_selling')
            ->first();

        $totalPriceToday = $sellingtoday ? $sellingtoday->cars->price * $sellingtoday->total_selling : "";
        $totalPriceYest  = $sellingyest ? $sellingyest->cars->price * $sellingyest->total_selling : "";
        $totalAmountToday=  $sellingtoday ? $sellingtoday->total_selling : "";
        $totalAmountYest = $sellingyest ? $sellingyest->total_selling : "";
        $totalDiffPrice  = "";
        $totalDiffAmount = "";

        ($totalPriceToday && $totalPriceYest != "") ? $totalDiffPrice  = round((($totalPriceToday - $totalPriceYest) / $totalPriceToday ) * 100, 1) : "";
        ($totalAmountToday && $totalAmountYest != "") ? $totalDiffAmount = round((($totalAmountToday - $totalAmountYest) / $totalAmountToday) * 100, 1) : "";

        return view('dashboard.index', compact('sellingtoday', 'sellingweek', 'totalDiffPrice', 'totalDiffAmount'));
    }
}
