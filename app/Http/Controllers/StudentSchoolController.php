<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Student;
use App\Models\Graduation;
use Illuminate\Http\Request;
use App\Models\StudentSchool;

class StudentSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $student_id = Student::find($id)->id;
        $years = Year::all();
        // dd($student);
        return view('admin.student.sschool.create', compact('student_id', 'years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $student_id = $request->student_id;
        $year_id = $request->year_id;

        StudentSchool::create($data);
        Graduation::create([
            'student_id' => $student_id,
            'year_id' => $year_id,
        ]);
        Student::where('id', '=', $student_id)->update([
            'status' => 'lulus',
            'group_id' => null,
        ]);

        return redirect()->route('student.show', $student_id)->withInput(['tab' => 'school']);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentSchool $studentSchool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentSchool $studentSchool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentSchool $studentSchool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentSchool $studentSchool)
    {
        //
    }
}
