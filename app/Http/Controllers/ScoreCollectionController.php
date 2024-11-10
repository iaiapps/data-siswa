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
        $students = Student::all();
        $subjects = Subject::all();
        return view('admin.student.scorecollection.index', compact('students', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('admin.student.scorecollection.create', compact('students', 'subjects'));
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
    public function show(ScoreCollection $scoreCollection)
    {
        return view('admin.student.scorecollection.show', compact('scoreCollection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScoreCollection $scoreCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScoreCollection $scoreCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScoreCollection $scoreCollection)
    {
        //
    }
}
