<?php

namespace App\Http\Controllers;
use App\Charts\UserChart;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index(){
        $chart = new UserChart;
        $chart->labels(['One', 'Two', 'Three']); //! The X axis
        $chart->dataset('user chart','line', [1, 2, 3]);
        return view('chart.charts', compact('chart'));
    }
}
