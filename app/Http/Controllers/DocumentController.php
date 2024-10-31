<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('admin.student.document.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //cek id
        // $id = Auth::user()->id;
        // $teacher_id = Student::where('user_id', $id)->get()->first()->id;
        $student_id = $request->student_id;

        //validate
        $imgDocument = $request->validate([
            'type' => 'required',
            'file' => 'mimes:jpeg,jpg,png,pdf|file|max:512',
        ]);

        //beri nama
        $file = $request->file('file');
        $file_name = 'student_id-' . $student_id . '-' . time() . '-' . $file->getClientOriginalName();

        //simpan ke folder
        // ini di folder public
        // $request->file('file')->move(public_path('img-document'), $file_name);
        // ini di folder storage/public
        $request->file('file')->storeAs('img-document', $file_name);

        //masukkan ke array validate
        $imgDocument['file'] = $file_name;
        $imgDocument['student_id'] = $student_id;

        //simpan ke database
        Document::create($imgDocument);
        return redirect()->route('student.show', $student_id)->with('success', 'Data telah ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return view('admin.student.view_foto', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        // dd($cek);
        // unlink(storage_path('app/images/'.$image));

        // delete spesific file
        Storage::delete('img-document/' . $document->file);
        $document->delete();
        return redirect()->back();
    }

    // --- //
    // upload document ini nanti untuk student saja
    public function uploadfoto($id)
    {
        return view('admin.student.document.create', compact('id'));
    }

    public function storefoto(Request $request)
    {
        //cek id
        // $id = Auth::user()->id;
        // $teacher_id = Student::where('user_id', $id)->get()->first()->id;
        $student_id = $request->student_id;

        //validate
        $imgDocument = $request->validate([
            'type' => 'required',
            'file' => 'mimes:jpeg,jpg,png,pdf|file|max:512',
        ]);

        //beri nama
        $file = $request->file('file');
        $file_name = 'student_id-' . $student_id . '-' . time() . '-' . $file->getClientOriginalName();

        //simpan ke folder
        // ini di folder public
        // $request->file('file')->move(public_path('img-document'), $file_name);
        // ini di folder storage/public
        $request->file('file')->storeAs('img-document', $file_name);

        //masukkan ke array validate
        $imgDocument['file'] = $file_name;
        $imgDocument['student_id'] = $student_id;

        //simpan ke database
        Document::create($imgDocument);
        return redirect()->route('student.show', $student_id)->with('success', 'Data telah ditambah');
    }

    // viewfoto
    public function viewfoto(Document $document)
    {
        return view('admin.student.view_foto', compact('document'));
    }
}
