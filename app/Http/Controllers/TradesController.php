<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Trades;
use Illuminate\Http\Request;

class TradesController extends Controller
{

    public function index()
    {
        return view('dashboard.trades');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Trades $trades)
    {
        //
    }


    public function edit(Trades $trades)
    {
        //
    }


    public function update(Request $request, Trades $trades)
    {
        //
    }


    public function destroy(Trades $trades)
    {
        //
    }
}
