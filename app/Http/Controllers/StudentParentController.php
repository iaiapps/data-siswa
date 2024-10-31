<?php

namespace App\Http\Controllers;

use App\Models\StudentParent;
use Illuminate\Http\Request;

class StudentParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentparents = StudentParent::all();
        return view('admin.parent.index', compact('studentparents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = $request->id;
        return view('admin.parent.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->student_id;
        $data = $request->all();
        StudentParent::create($data);
        return redirect()->route('student.show', $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentParent $studentParent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentParent $studentParent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentParent $studentParent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentParent $studentParent)
    {
        //
    }
}
