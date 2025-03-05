<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\ScoreCollection;

class ScoreCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::where('status_siswa', 'aktif')->get();
        $subjects = Subject::all();
        return view('admin.student.scorecollection.index', compact('students', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $student = Student::find($request->s_id);
        $subjects = Subject::all();
        return view('admin.student.scorecollection.create', compact('student', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        ScoreCollection::create($data);
        return redirect()->route('scorecollection.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);
        $collection = ScoreCollection::where('student_id', '=', $id)->get();
        // dd($collection);
        return view('admin.student.scorecollection.show', compact('collection', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScoreCollection $scoreCollection)
    {
        return view('admin.student.scorecollection.edit', compact('scoreCollection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScoreCollection $scoreCollection)
    {
        // dd($request->all());
        $scoreCollection->update($request->all());
        return redirect()->route('scorecollection.show', $scoreCollection->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScoreCollection $scoreCollection)
    {
        //
    }
}
