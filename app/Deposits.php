<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposits extends Model
{
    protected $appends = 'approved_date';
    protected $guarded = [];

    public function getApprovedDateAttribute()
    {
        if ($this->status == 1){
            return $this->updated_at;
        }
    }

    public function status(){
        if ($this->status >= 1){
            return "<a class='label label-success'>Paid</a>";
        }elseif($this->status == 0){
            return "<a class='label label-warning'>Pending</a>";
        }else{
            return "<a class='label label-danger'>Canceled</a>";
        }
    }

}
