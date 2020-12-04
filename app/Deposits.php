<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Deposits extends Model
{
    protected $appends = ['approved_date', 'earning'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getApprovedDateAttribute()
    {
        if ($this->status == 'approved'){
            return $this->updated_at;
        }
        return $this->updated_at;
    }

    public function admin_status(){
        if ($this->status == 'approved'){
            return "<a class='badge badge-success'>Paid</a>";
        }else{
            return "<a class='badge badge-warning'>Pending</a>";
        }
    }
    public function status(){
        if ($this->status == 'approved'){
            return "<a class='label label-success'>Approved</a>";
        }elseif($this->status == 'pending'){
            return "<a class='label label-warning'>Pending</a>";
        }else{
            return "<a class='label label-danger'>Canceled</a>";
        }
    }

    public function invest_plan()
    {
        return $this->belongsTo(InvestPlans::class, 'invest_plans_id');
    }
    public function total_return()
    {
        return $this->invest_plan->daily_return * $this->invest_plan->term_days;
    }

    public function expected_profit()
    {
        $expected_profit = $this->total_return() * $this->amount;
        $profit =  number_format((float)$expected_profit / 100, 2, '.', '');
        return $profit;
    }
    public function ending_date()
    {
        $date = Carbon::parse($this->approved_date);
        return $date->addDays($this->invest_plan->term_days - 1);
//        return $date + $this->investment_plan->term_days;
    }

public function getEarningAttribute()
{
    $expected_percent = $this->invest_plan->daily_return  * $this->amount;
    $profit_percent =  number_format((float)$expected_percent / 100, 2, '.', '');

    $days = 0;

    $d_approved = Carbon::parse($this->approved_date);
    $d_ended = Carbon::parse($this->end_date);

    $current_date = Carbon::now();

    if($d_approved->diffInDays($current_date) < $this->invest_plan->term_days){
        $days = $d_approved->diffInDays($current_date);
    }else {
        $days =  $this->invest_plan->term_days;
    }

    $earned = 0;
    for ($i = 0; $i <= $days; $i++){
        $earned += $profit_percent;
    }
    return $earned;
}

    public function total_earned(){
        return  $this->earning + $this->amount;

    }

    public function approved_date()
    {
        if ($this->status == "pending")
        {
            return "dd/mm/yy";
        }else{
            return $this->updated_at;
        }


    }

    public function paid_amt()
    {
        if ($this->status == 'pending')
        {
            return "0.00";
        }
        return $this->amount;
    }

}
