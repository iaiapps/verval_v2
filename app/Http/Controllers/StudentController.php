<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->all();
        $id = $student->id;
        $student->update($data);
        return redirect()->route('student.show', $id)->with('success', 'Berhasil update data');
        // return back()->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    // ----------------------- handle from user ----------------------- //

    public function userStudent(Request $request)
    {
        $id = Auth::user()->id;
        $student = Student::where('user_id', $id)->first();
        // dd($student_id);
        return view('student.show', compact('student'));
    }

    public function isVerified(Request $request)
    {
        $student_id = $request->student_id;
        $isVerified = $request->isVerified;
        Student::where('id', $student_id)->update([
            'isVerified' => $isVerified
        ]);
        return back()->with('success', 'Berhasil verifikasi data');
        // dd($isVerified);
    }
}
