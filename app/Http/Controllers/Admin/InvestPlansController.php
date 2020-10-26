<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InvestPlans;
use Illuminate\Http\Request;

class InvestPlansController extends Controller
{

    public function index()
    {
       $invest_plans = InvestPlans::all();
       return view('admin.investment-plans', compact('invest_plans'));
    }


    public function create()
    {
        return view('admin.investment-plans-create');
    }


    public function store(Request $request)
    {
       $data = $this->getData($request);
       InvestPlans::create($data);
       return redirect()->route('admin.investment-plans.index');
    }


    public function show(InvestPlans $investPlans)
    {
        //
    }


    public function edit(InvestPlans $investPlans)
    {
        //
    }


    public function update(Request $request, InvestPlans $investPlans)
    {
        //
    }


    public function destroy(InvestPlans $investPlans)
    {
        //
    }

    protected function getData(Request  $request)
    {
        $rules = [
          'name' => 'required',
          'desc' => 'nullable',
          'leverage' => 'nullable',
          'acct_base_currency' => 'nullable',
          'min_amount' => 'required',
          'max_amount' => 'required',
          'term_days' => 'required',
          'daily_return' => 'required',
          'spread' => 'nullable',
        ];
        return $request->validate($rules);
    }
}
