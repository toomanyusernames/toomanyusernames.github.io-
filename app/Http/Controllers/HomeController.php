<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'listUser']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function listUser(){
        $users = User::orderBy('id', 'desc') ->paginate(30);
        return view('user.index')->withUsers($users);
    }

    public function showUser($id){
        $user = User::find($id);
        return view('user.show')->withUser($user);
    }

}
