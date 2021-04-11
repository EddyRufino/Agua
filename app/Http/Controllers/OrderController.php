<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\OrderRequest;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $orders = Order::latest('updated_at')->paginate(6);

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();

        return view('orders.create', compact('clients'));
    }

    public function store(OrderRequest $request)
    {
        Order::create([
            'delivery' => $request->delivery,
            'pay' => $request->pay,
            'debt' => bcsub($request->delivery, $request->pay),
            'client_id' => $request->client_id,
        ]);

        return redirect()->route('orders.index');
    }

    public function edit(Order $order)
    {
        $clients = Client::all();

        return view('orders.edit', compact('clients', 'order'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        // $request->all()
        // $deliver = $request->delivery;
        // $debt = $request->pay;

        $order->update([
            'delivery' => $request->delivery,
            'pay' => $request->pay,
            'debt' => bcsub($request->delivery, $request->pay),
            'client_id' => $request->client_id,
        ]);

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
