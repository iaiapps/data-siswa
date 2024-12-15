<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Student;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = Year::all();
        return view('admin.year.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.year.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Year::create($data);
        return redirect()->route('year.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Year $year)
    {
        return view('admin.year.edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Year $year)
    {
        $year->update($request->all());
        return redirect()->route('year.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Year $year)
    {
        //
    }

    // ini fungsi siswa dan tahun
    public function showstudentyear($id)
    {
        $year = Year::where('id', $id)->first();
        $students = Student::where('year_id', $id)->get();
        return view('admin.year.showstudent', compact('students', 'year'));
    }

    public function addstudentyear($id)
    {
        $students = Student::all();
        $years = Year::all();
        return view('admin.year.addstudent', compact('students', 'years', 'id'));
    }
    public function storestudentyear(Request $request)
    {
        $year_id = $request->year_id;
        $check = $request->check;
        $student_id = $request->student_id;

        foreach ($student_id as $sid) {
            if (isset($check[$sid]) == 'on') {
                Student::where('id', '=', $sid)->update([
                    'year_id' => $year_id
                ]);
            }
        }
        return redirect()->back();
    }
}
