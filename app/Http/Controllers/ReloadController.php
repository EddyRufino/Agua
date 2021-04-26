<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReloadRequest;
use App\Record;
use App\Reload;
use Illuminate\Http\Request;

class ReloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        return view('reloads.create');
    }

    public function store(ReloadRequest $request, Record $record)
    {
        Reload::create([
            'count_drum' => $request->count_drum,
            'price' => $request->price,
            'price_total' => $request->price * $request->count_drum
        ]);

        $record->decrement('drum_empty', $request->count_drum);
        $record->increment('drum_full', $request->count_drum);

        return redirect()->route('home');
    }

    public function show(Reload $reload)
    {
        //
    }

    public function edit(Reload $reload)
    {
        //
    }

    public function update(Request $request, Reload $reload)
    {
        //
    }

    public function destroy(Reload $reload)
    {
        //
    }
}
