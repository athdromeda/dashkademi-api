<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $collection = "classrooms";
    public $timestamps = false;

    protected $fillable = ["title", "description", "students"];
}
