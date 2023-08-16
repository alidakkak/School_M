<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teachers_id');
    }
}
