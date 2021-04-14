<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $drums = Record::all();
        // $fulls = Record::latest()->get();
        // dd($fulls);
        return view('home', compact('drums'));
    }
}
