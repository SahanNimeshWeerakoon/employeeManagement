<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'employee_id');
    }
}
