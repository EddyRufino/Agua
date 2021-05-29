<?php

namespace App\Http\Controllers;

use App\Order;
use App\Record;
use App\Reload;
use Carbon\Carbon;
use App\Charts\OrderChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $drums = Record::all();
        $orders = Order::select('pay', 'debt')
                    ->whereMonth('created_at', today()->format('m'))
                    ->get();

        $pay = collect([]);
        $debt = collect([]);

        $orders->each(function ($item, $key) use ($pay, $debt) {
            $pay->push($item->pay * 8);
            $debt->push($item->debt * 8);
        });

        $pay = $pay->sum();
        $debt = $debt->sum();

        // Mis Recargas
        $reloads = Reload::latest()
                ->whereYear('created_at', Carbon::now()->format('Y'))
                ->whereMonth('created_at', Carbon::now()->format('m'))
                ->get();

        // Charts
        $chart = $this->getOrderChart();

        return view('home', compact('drums', 'pay', 'debt', 'reloads', 'chart'));
    }

    public function getOrderChart()
    {
       $days = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
        $today = today()->format('Y-m');
        $dateStart = "{$today}-01";
        $dateLast = "{$today}-31";

        $dataOrder = collect([]);

        for ($days_backwards = $dateStart; $days_backwards <= $dateLast; $days_backwards++)
        {
            $dataOrder->push(Order::whereDate('created_at', $days_backwards)->count());
        }

        $chart = new OrderChart;

        $today = today()->format('M Y');
        $chart->labels($days);
        $chart->dataset("Pedidos - {$today}", 'line', $dataOrder)->backgroundColor('rgba(63, 191, 127, .6)');

        return $chart;
    }
}
