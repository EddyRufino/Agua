<?php

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class OrdersExport implements FromView
{
    use Exportable;

    private $year;
    private $month;

    public function forDate($year, $month)
    {
        $this->year = $year;
        $this->month = $month;

        return $this;
    }

    public function view(): View
    {
        $orders = Order::with('client')->whereYear('created_at', $this->year)
                    ->whereMonth('created_at', $this->month)
                    ->orderBy('created_at', 'ASC')
                    ->get();

        $pays = $orders->sum('pay') * 8;
        $debts = $orders->sum('debt') * 8;

        return view('exports.report-agua', compact('orders', 'pays', 'debts'));
    }
}
