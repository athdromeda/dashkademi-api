<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $grades = Grade::where('student_id', $id)->firstOrFail();
        $res = [
            'student_id' => $id,
            'grades' => [
                'mat' => json_decode($grades->mat, true),
                'eng' => json_decode($grades->eng, true),
                'art' => json_decode($grades->art, true),
                'che' => json_decode($grades->che, true),
                'phy' => json_decode($grades->phy, true),
            ]
        ];

        return response($res, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Grade::create($request->all());
        return response(['message' => 'New record created'], 200);
    }
}
