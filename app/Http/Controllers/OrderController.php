<?php

namespace App\Http\Controllers;

use App\Order;
use App\Record;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::latest('updated_at')->where('debt', '>', 0)->paginate(6);

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();

        return view('orders.create', compact('clients'));
    }

    public function store(OrderRequest $request, Record $record)
    {
        // dd(bcsub(request()->get('drum_full'), $request->delivery));
        Order::create([
            'delivery' => $request->delivery,
            'pay' => $request->pay,
            'debt' => bcsub($request->delivery, $request->pay),
            'client_id' => $request->client_id,
            'description' => $request->description,
        ]);

        $record->decrement('drum_full', $request->delivery);
        $record->increment('drum_borrow', $request->drum_borrow);
        $record->increment('drum_empty', $request->drum_empty);

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
