<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        if ($this->status == 'pending'){
            return "<a class='label label-warning'>Pending</a>";
        }elseif($this->status == 'approved'){
            return "<a class='label label-success'>Approved</a>";
        }else{
            return "<a class='label label-danger'>Canceled</a>";
        }
    }

    public function admin_status()
    {
        if ($this->status == 'pending'){
            return "<a class='badge badge-warning'>Pending</a>";
        }elseif($this->status == 'approved'){
            return "<a class='badge badge-success'>Approved</a>";
        }else{
            return "<a class='badge badge-danger'>Canceled</a>";
        }
    }
}
