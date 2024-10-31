<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user_id = $request->user_id;
        $student = Student::where('user_id', $user_id)->first();
        // dd($student);
        return view('admin.student.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $student = Student::where('user_id', $request->user_id)->first();

        $student->update($data);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // dd($student);
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    // --- handle dari user student --- //
    public function biodata()
    {
        $id = Auth::user()->id;
        $student = Student::where('user_id', $id)->first();
        // dd($id);
        return view('student.show', compact('student'));
    }
}
