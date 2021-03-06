<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('id', 'asc')->where('is_parent' , 0)->get();
        return view('backend.pages.category.manage' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::orderby('title' , 'asc')->where('is_parent' , 0)->get();
        return view('backend.pages.category.create' , compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title          = $request->title;
        $category->slug           = Str::slug($request->title);
        $category->description    = $request->description;
        $category->is_parent      = $request->is_parent;
        $category->status         = $request->status;



        if($request->image)
        {

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/category/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;

        }

        $category->save();
        return redirect()->route('category.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Category::find($id);
          if(!is_null($category))
          {

             $parents = Category::orderby('title' , 'asc')->where('is_parent' , 0)->get();
             return view('backend.pages.category.edit' , compact('parents','category'));
          }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = new Category();
        $category->title          = $request->title;
        $category->slug           = Str::slug($request->title);
        $category->description    = $request->description;
        $category->is_parent      = $request->is_parent;
        $category->status         = $request->status;



        if($request->image)
        {

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/category/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;

        }

        $category->save();
        return redirect()->route('category.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

     {
        $category = Category::find($id);
        if(!is_null($category))
        {
            if(File::exists('backend/img/category/'  .  $category->image) ){
                File::delete('backend/img/category/'  . $category->image);
            }
            $category->delete();
            return redirect()->route('category.manage');
        }
    }
}
