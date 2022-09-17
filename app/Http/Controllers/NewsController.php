<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->input('category')){
            $category = Category::where('title',$request->input('category'))->first();
        }
        
        $news = (isset($category))? News::where('category_id',$category->id)->orderBy('created_at','DESC')->get()
                                : News::orderBy('created_at','DESC')->get();
        return view('index')
            ->with('news',$news)
            ->with('categories',Category::orderBy('created_at','DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048',
       ]);

       if($request->image){
        $imageName = uniqid() . '_' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'),$imageName);
       }
       $slug = SlugService::createSlug(News::class,'slug',$request->title);

       $lastNews = News::orderBy('id','DESC')->first();
       if($lastNews){
        $nextId = $lastNews->id + 1;
        $slug = $slug . '-' . $nextId;
       }


       News::create([
        'title' => $request->input('title'),
        'slug' => $slug,
        'description' => $request->input('description'),
        'image' => (isset($imageName))? $imageName : null,
        'category_id' => $request->input('category')
       ]);

       return redirect('/manager')
         ->with('message','News has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('newsSingle.index')
            ->with('news',News::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('newsSingle.edit')
        ->with('news', News::where('slug', $slug)->first())
        ->with('categories', Category::orderBy('created_at','DESC')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string'
       ]);
        $newSlug = SlugService::createSlug(News::class, 'slug', $request->title);

       News::where('slug', $slug)
       ->update([
           'title' => $request->input('title'),
           'description' => $request->input('description'),
           'slug' => $newSlug,
           'category_id' => $request->input('category')
       ]);

       return redirect("/news/$newSlug")
         ->with('message','News has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $news = News::where('slug',$slug);
        $news->delete();
        
        return redirect('/manager')
        ->with('message','News has been deleted');
    }
}
