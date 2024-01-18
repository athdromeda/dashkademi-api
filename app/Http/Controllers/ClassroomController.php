<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Classroom::all();
        return $data;
    }

    public function detail($name)
    {
        $classroom = Classroom::where('name', $name)->firstOrFail();
        $classroomDescription = $classroom->description;

        return ['classroom' => $name, 'description' => $classroomDescription, 'students' => $classroom->students];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Classroom::create($request->all());
        return response(['message' => 'New classroom created'], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
