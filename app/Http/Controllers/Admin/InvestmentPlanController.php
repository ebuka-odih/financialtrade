<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InvestPlans;
use Illuminate\Http\Request;

class InvestmentPlanController extends Controller
{
   public function index()
   {
       $investment_plans = InvestPlans::all();
       return view('admin.investment-plans', compact('investment_plans'));
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

   public function edit($id)
   {
        $investment_plans = InvestPlans::findOrFail($id);

   }

   public function delete($id)
   {
     $investment_plans = InvestPlans::findOrFail($id);
     $investment_plans->delete();
     return redirect()->back();
   }


   protected function getData(Request $request)
   {
       $rules = [
         'name' => 'required',
         'min_amount' => 'required',
         'max_amount' => 'required',
         'daily_interest' => 'required',
         'capital_return' => 'nullable',
         'term_days' => 'required',
       ];

       return $request->validate($rules);
   }

}
