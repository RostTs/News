<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;


class CategoriesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required|string'
       ]);
       
       Category::create([
        'title' => $request->input('title')
       ]);

       return redirect('/manager')
         ->with('message','Category has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingNews = News::where('category_id',$id);
        if($existingNews){
            return redirect('/manager')
            ->with('customError','There are some news with this category, please delete or update them first');
        }
        
        $category = Category::where('id',$id);
        $category->delete();
        
        return redirect('/manager')
        ->with('message','Category has been deleted');
    }
}
