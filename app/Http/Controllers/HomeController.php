<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /** @var \App\Models\User */

        $user  = Auth::user();
        $id = $user->id;

        // get name
        $name = $user->name;

        //get role names
        $role = $user->getRoleNames()->first();

        // get student all
        $students = Student::all();
        // student name
        $student = Student::where('user_id', '=', $id)->first();

        // now
        $now = Carbon::now();
        // kelas
        $group = Group::all();

        switch ($role) {
            case 'admin':
                return view('home.home', compact('students', 'now', 'name', 'group'));
                break;

            case 'siswa':
                return view('home.shome', compact('student'));
                break;

            default:
                return view('home.nahome', compact('name'));
        }
    }
}
