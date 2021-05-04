<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        //Read

        $posts = Category::all();
        // dd($posts);
        // $JSONfile = json_encode($posts);
        // dd($JSONfile);
        return view('admin.category.main',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CREATE
        return view('admin.category.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CREATE
        // dd($request->all());
        $request->validate([
            'categoryname' => 'required',
            'description' => 'required',
            
        ]);


        

        if ($file = $request->file('image')) {
            $request->validate([
                'image' =>'mimes:jpg,jpeg,png,bmp'
            ]);
            $image = $request->file('image');
            $imgExt = $image->getClientOriginalExtension();
            $fullname = time().".".$imgExt;
            $result = $image->storeAs('images/category',$fullname);
            }

            else{
                $fullname = 'image.png';
            }

            $posts = new Category();
            $posts->categoryname = $request->categoryname;
            $posts->description = $request->description;
            $posts->image = $fullname;
            $posts->save();



        if($posts->save()){
            //Redirect with Flash message
            return redirect('/category')->with('status', 'Category added Successfully!');
        }
        else{
            return redirect('/category/create')->with('status', 'There was an error!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Read individual
        // $posts = Post::find(3)->get();
        $posts = Category::findOrFail($id);
        return view('admin.category.show',compact('posts'));
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
        //Update View
        $posts = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('posts'));
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
        //Update
        $posts = Category::find($id);

        $posts->categoryname = $request->categoryname;
        $posts->description = $request->description;
        $posts->image = $request->image;
      

        if($posts->save()){
            return redirect('/category')->with('status', 'Category edited Successfully!');
        }
        else{
            return redirect('/category/$id/edit')->with('status', 'There was an error');

        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete
        $posts = Category::find($id);
        if($posts->delete()){
            return redirect('/category')->with('status', 'Category was deleted successfully');
        }
        else return redirect('/category')->with('status', 'There was an error');

        
    }
}
