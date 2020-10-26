<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestPlans extends Model
{
    protected $guarded = [];
    protected $appends = 'total_return';


    public function getTotalReturnAttribute()
    {
        return $this->daily_return * $this->term_days;
    }
}
