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
    public function manageCategories()
    {
        if(auth::user()->role>0)
        {
            return redirect()->back();
        }
        $allCategories = Categorie::orderBy('categories.id','DESC')->get();
        return view('manageCategories',compact('allCategories'));
    }
    public function addCategory(Request $request,$id=0)
    {
        if(auth::user()->role>0)
        {
            return redirect()->back();
        }
        if($request->isMethod('post')) 
        {
            $message = 'added';
            if($request->category_id>0)
            {
                $message = 'updated';
                $Category = Categorie::find($request->category_id);
            }
            else
            {
                $Category = new Categorie();
            }
            $Category->category_name = $request->category;
            $Category->save();

            Session::flash('message', "Category $message successfully!"); 
            return redirect()->route('manageCategories');
        }
        $categories = Categorie::find($id);
        return view('addCategory',compact('categories'));
    }
    public function deleteCategory($id=0)
    {
        if(auth::user()->role>0)
        {
            return redirect()->back();
        }
        $categories = Categorie::find($id);
        if($categories!='')
        {
            $categories->delete();
            Session::flash('message', "Category deleted successfully!"); 
        }
        return redirect()->route('manageCategories');
    }
    public function manageSubCategories()
    {
        if(auth::user()->role>0)
        {
            return redirect()->back();
        }
        $allCategories = SubCategorie::join('categories','categories.id','sub_categories.category_id')
            ->orderBy('sub_categories.id','DESC')
            ->select('sub_categories.*','categories.category_name')
            ->get();
        return view('manageSubCategories',compact('allCategories'));
    }
    public function addSubCategory(Request $request,$id=0)
    {
        if(auth::user()->role>0)
        {
            return redirect()->back();
        }
        if($request->isMethod('post')) 
        {
            $message = 'added';
            if($request->sub_category_id>0)
            {
                $message = 'updated';
                $Category = SubCategorie::find($request->sub_category_id);
            }
            else
            {
                $Category = new SubCategorie();
            }
            $Category->category_id = $request->category;
            $Category->sub_category_name = $request->sub_category;
            $Category->save();

            Session::flash('message', "Sub category $message successfully!"); 
            return redirect()->route('manageSubCategories');
        }
        $categories = Categorie::get();
        $subCategories = SubCategorie::find($id);
        return view('addSubCategory',compact('categories','subCategories'));
    }
    public function deleteSubCategory($id=0)
    {
        if(auth::user()->role>0)
        {
            return redirect()->back();
        }
        $categories = SubCategorie::find($id);
        if($categories!='')
        {
            $categories->delete();
            Session::flash('message', "Sub category deleted successfully!"); 
        }
        return redirect()->route('manageSubCategories');
    }
}
