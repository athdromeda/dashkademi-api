<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ["student_id", "mat", "eng", "art", "che", "phy"];
    protected $cast = [
        'mat' => 'array',
        'eng' => 'array',
        'art' => 'array',
        'che' => 'array',
        'phy' => 'array'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
