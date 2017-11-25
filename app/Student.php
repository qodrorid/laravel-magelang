<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'address', 'age', 'email', 'photo'];

    public function studentClass()
    {
        return $this->belongsTo(\App\StudentClass::class, 'class_id');
    }
}
