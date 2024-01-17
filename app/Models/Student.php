<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $collection = "students";
    public $timestamps = false;

    protected $fillable = ["name", "dob", "address", "phone", "classroom_id"];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function grades()
    {
        return $this->belongsTo(Grade::class);
    }
}
