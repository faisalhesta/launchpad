<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // if(auth()->user()->user_type=='1'){
        //     return view('teachers.home');
        // }

        // elseif(auth()->user()->user_type=='2')
        // {
        //     return view('students.home');
        // }

        // else{
            return view('home');
        // }

    }
}
