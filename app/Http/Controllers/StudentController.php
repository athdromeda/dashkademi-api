<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
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
     * Get student detail with the grades.
     */
    public function detail(string $id)
    {
        function countGrades(array $grades)
        {
            $latihan_mean = ($grades[0] + $grades[1] + $grades[2] + $grades[3]) / 4;
            $harian_mean = ($grades[4] + $grades[5]) / 2;
            $uts = $grades[6];
            $uas = $grades[7];

            return $latihan_mean * 15 / 100 + $harian_mean * 20 / 100 + $uts * 25 / 100 + $uas * 40 / 100;
        }

        $detail = Student::where('_id', $id)->firstOrFail();
        $grades = Grade::where('student_id', $id)->firstOrFail();
        $detail['grades'] = [
            'mat' => countGrades(json_decode($grades->mat, true)),
            'eng' => countGrades(json_decode($grades->eng, true)),
            'art' => countGrades(json_decode($grades->art, true)),
            'che' => countGrades(json_decode($grades->che, true)),
            'phy' => countGrades(json_decode($grades->phy, true)),
        ];

        return response($detail, 200);
    }
}
