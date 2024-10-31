<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('admin.group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Group::create($data);
        return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('admin.group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $data = $request->all();
        $group->update($data);
        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }



    // ini fungsi siswa dan kelas
    public function showstudentgroup($id)
    {
        $group = Group::where('id', $id)->first();
        $students = Student::where('group_id', $id)->get();
        return view('admin.group.showstudent', compact('students', 'group'));
    }

    public function addstudentgroup()
    {
        $students = Student::all();
        $groups = Group::all();
        // dd($students);
        return view('admin.group.addstudent', compact('students', 'groups'));
    }
    public function storestudentgroup(Request $request)
    {
        $group_id = $request->group_id;
        $check = $request->check;
        $student_id = $request->student_id;
        // $data = $request->all();

        foreach ($student_id as $sid) {
            if (isset($check[$sid]) == 'on') {
                // dd($sid);
                Student::where('id', '=', $sid)->update([
                    'group_id' => $group_id
                ]);
            }
        }
        return redirect()->back();
    }
}
