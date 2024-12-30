<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Auth;

class StudentParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $studentparents = StudentParent::all();
        // return view('admin.parent.index', compact('studentparents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = $request->id;
        return view('student.parent.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->student_id;
        $data = $request->all();
        StudentParent::create($data);

        // untuk cek user dan hasRole
        /** @var \App\Models\User */
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('student.show', $id);
        } elseif ($user->hasRole('siswa')) {
            return redirect()->route('biodata.index');
        }
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
    public function edit(StudentParent $studentparent)
    {
        return view('student.parent.edit', compact('studentparent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentParent $studentparent)
    {
        $id = $studentparent->student_id;
        $data = $request->all();
        $studentparent->update($data);

        // untuk cek user dan hasRole
        /** @var \App\Models\User */
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('student.show', $id);
        } elseif ($user->hasRole('siswa')) {
            return redirect()->route('biodata.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentParent $studentParent)
    {
        //
    }
}
