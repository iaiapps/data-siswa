<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;

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
        $data = Student::all();
        $students = $data->where('status_siswa', 'aktif');

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
        $years = Year::all();
        return view('admin.student.edit', compact('student', 'years'));
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

    // cover raport student
    public function cover($id)
    {
        $student = Student::find($id);
        return view('admin.student.cover', compact('student'));
    }
    // cover binduk student
    public function binduk($id)
    {
        $student = Student::find($id);
        return view('admin.student.binduk', compact('student'));
    }

    // --- handle dari user student --- //
    public function biodata()
    {
        $id = Auth::user()->id;
        $student = Student::where('user_id', $id)->first();
        return view('student.show', compact('student'));
    }
    public function biodataEdit($id)
    {
        $student = Student::find($id);
        return view('admin.student.edit', compact('student'));
    }
    public function biodataStore(Request $request, Student $biodata)
    {

        $data = $request->all();
        $biodata->update($data);

        // update username
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first()->update([
            'name' => $request->nama,
        ]);
        return redirect()->route('biodata.index');
    }
}
