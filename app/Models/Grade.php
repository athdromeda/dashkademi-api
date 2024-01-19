<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ["student_id", "latihan_1", "latihan_2", "latihan_3", "latihan_4", "harian_1", "harian_2", "uts", "uas"];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
