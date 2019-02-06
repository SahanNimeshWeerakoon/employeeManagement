<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        $id = Auth()->user()->id;
        $user = User::find($id);
        if($user->status == 1){
            return redirect('admindashboard');
        }
        return redirect('employeedashboard')->with('user', $user);

        // return view('home');
    }
}
