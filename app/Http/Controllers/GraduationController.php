<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Group;
use App\Models\Student;
use App\Models\Graduation;
use Illuminate\Http\Request;

class GraduationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $graduations = Graduation::all();
        return view('admin.graduation.index', compact('graduations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $years = Year::all();
        $groups = Group::where('id', '21')->orWhere('id', '22')->orWhere('id', '23')->orWhere('id', '24')->get();
        if ($request->kelas) {
            $student_g6 = Student::where('status', 'aktif')->where('group_id',  $request->kelas)->get();
        } else {
            $student_g6 = null;
        }
        return view('admin.graduation.create', compact('years', 'groups', 'student_g6'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $check = $request->check;
        $student_id = $request->student_id;
        $year_id = $request->year_id;

        foreach ($student_id as $sid) {
            if (isset($check[$sid]) == 'on') {
                // dd($sid);

                Graduation::create([
                    'student_id' => $student_id[$sid],
                    'year_id' => $year_id,
                ]);
                Student::where('id', '=', $sid)->update([
                    'status' => 'lulus',
                    'group_id' => null,
                ]);
            }
        }
        return redirect()->route('graduation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Graduation $graduation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Graduation $graduation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Graduation $graduation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Graduation $graduation)
    {
        //
    }
}
