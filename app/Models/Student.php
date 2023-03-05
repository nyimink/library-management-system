<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function studentCategory()
    {
        return $this->belongsTo('App\Models\StudentCategory');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }
}
