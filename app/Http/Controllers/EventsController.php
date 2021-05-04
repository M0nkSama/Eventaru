<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Read

        $posts = Events::all();
        // dd($posts);
        // $JSONfile = json_encode($posts);
        // dd($JSONfile);
        return view('admin.events.main',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CREATE
        return view('admin.events.create');
        
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
            'eventname' => 'required',
            'category' => 'required',
            'organizer' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        

        $posts = Events::create([
            'eventname'=> $request->eventname,
            'category'=> $request->category,
            'organizer'=> $request->organizer,
            'address'=> $request->address,
            'contact'=> $request->contact,
            'date'=> $request->date,
            'time'=> $request->time,
        ]);

        if($posts){
            //Redirect with Flash message
            return redirect('/post')->with('status', 'Post added Successfully!');
        }
        else{
            return redirect('/post/create')->with('status', 'There was an error!');
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
        $posts = Events::findOrFail($id);
        return view('show',compact('posts'));
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
        $posts = Events::where('id',$id)->first();
        return view('admin.events.edit',compact('posts'));
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
        $posts = Events::find($id);

        $posts->eventname = $request->eventname;
        $posts->category = $request->category;
        $posts->organizer = $request->organizer;
        $posts->address = $request->address;
        $posts->contact = $request->contact;
        $posts->date = $request->date;
        $posts->time = $request->time;

        if($posts->save()){
            return redirect('/post')->with('status', 'Post edited Successfully!');
        }
        else{
            return redirect('/post/$id/edit')->with('status', 'There was an error');

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
        $posts = Events::find($id);
        if($posts->delete()){
            return redirect('/post')->with('status', 'Post was deleted successfully');
        }
        else return redirect('/post')->with('status', 'There was an error');

        
    }
}