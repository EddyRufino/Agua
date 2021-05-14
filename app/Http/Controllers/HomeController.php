<?php

namespace App\Http\Controllers;

use App\Order;
use App\Record;
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

        return view('home', compact('drums', 'pay', 'debt'));
    }
}
