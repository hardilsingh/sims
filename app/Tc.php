<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tc extends Model
{
    //

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function getStudent() {
        return $this->belongsTo("App\Students" , 'student_id');
    }
}
