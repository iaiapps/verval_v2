<?php

namespace App\Http\Controllers;

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
        $verified = Student::where('isVerified', 1);
        // dd($students);
        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('admin.home', compact('verified'));
        } elseif ($user->role == 'user') {
            return view('student.home');
        }
        // dd($user);
    }
}
