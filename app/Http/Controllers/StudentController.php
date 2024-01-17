<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $classroom = Classroom::where('name', $request->classroom)->first();
        $classroomId = $classroom->_id;

        Student::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'address' => $request->address,
            'phone' => $request->phone,
            'classroom_id' => $classroomId,
        ]);

        return response([
            'message' => 'Input data success!',
            'req' => [
                'name' => $request->name,
                'dob' => $request->dob,
                'address' => $request->address,
                'phone' => $request->phone,
                'classroom_id' => $classroomId,
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
