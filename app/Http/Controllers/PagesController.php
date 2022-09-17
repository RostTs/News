<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;

class PagesController extends Controller
{
    public function index(){
        return redirect('/news');
    }

    public function manager(){
        return view('manager.index')
        ->with('news',News::orderBy('created_at','DESC')->get())
        ->with('categories',Category::orderBy('created_at','DESC')->get());
    }
}
