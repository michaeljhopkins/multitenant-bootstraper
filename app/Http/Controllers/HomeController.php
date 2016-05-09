<?php

namespace Multi\Http\Controllers;

use Multi\Http\Requests;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check()){
            return view('pages.users.show',['user' => \Auth::user()]);
        }
        else{
            return view('auth.login');
        }
    }
}
