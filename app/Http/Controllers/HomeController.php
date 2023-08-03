<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\User;
use App\Categorie;
use App\SubCategorie;
use Session;
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
        return view('home');
    }
    public function allUser()
    {
        if(auth::user()->role>0)
        {
            return redirect()->back();
        }
        $allUser = User::where('role',1)->get();
        return view('allUser',compact('allUser'));
    }
    public function allCategories()
    {
        if(auth::user()->role>0)
        {
            return redirect()->back();
        }
        $allCategories = Categorie::with('subCategories')->get();
        return view('allCategories',compact('allCategories'));
    }
}
