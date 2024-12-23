<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(Hash::make($request->password));
        $user_data = [
            'name' => $request->name,
            'email' => $request->nis . '@sditharum.id',
            'password' => Hash::make($request->password),
        ];

        $user_id = User::create($user_data)->assignRole($request->role)->id;

        // create student
        Student::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'status' => $request->status,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'gender' => $request->gender,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,

        ]);
        // return redirect()->route('student.create', ['user_id' => $user_id]);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $user->update($data);
        $user->syncRoles($request->role);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    // handle resetpassword from admin to default (password1234)
    public function resetpass($id)
    {
        $user = User::where('id', $id)->first();
        $user->update([
            'password' => Hash::make('password1234'),
        ]);
        return redirect()->back()->with('reset', 'password berhasil direset');
    }

    // handle ganti password user
    public function changePassword()
    {
        $id = Auth::user()->id;
        return view('admin.user.passchange', compact('id'));
    }
    public function editPassword(Request $request, User $pass)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password:web',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $pass->update($validated);
        return redirect()->route('biodata.index');
    }
}
