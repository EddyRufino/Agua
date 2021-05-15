<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;

class ReportAguaController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function agua()
    {
        $month = request()->validate([
            'month' => 'required'
        ]);

        $year = request()->validate([
            'year' => 'required'
        ]);

        return (new OrdersExport)->forDate($year, $month)->download('pedidos-excel.xlsx');
    }
}
