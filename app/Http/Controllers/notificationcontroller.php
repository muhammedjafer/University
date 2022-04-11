<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class notificationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = notification::latest()->paginate(7);
        return view('notification.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notification.create');
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
            'name' => 'required|min:5|max:100',
            'mobileNumber' => 'required|min:10|numeric',
            'location' => 'required',
        ]);

        $post = new notification();
        $post->name = $request->input('name');
        $post->mobileNumber = $request->input('mobileNumber');
        $post->location = $request->input('location');
        $post->save();
        return redirect()->route('notification.index');
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
        $notification = notification::findorFail($id);
        return view('notification.edit', compact('notification'));
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
        $request->validate([
            'name' => 'required|min:5|max:100',
            'mobileNumber' => 'required|min:10|numeric',
            'location' => 'required',
        ]);

        $post = notification::findOrFail($id);
        $post->name = $request->input('name');
        $post->mobileNumber = $request->input('mobileNumber');
        $post->location = $request->input('location');
        $post->update();

        $post = $post->$id;
        return redirect()->route('notification.index', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = notification::findOrFail($id);
        $notification->delete();
        return redirect()->route('notification.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('searchnotification');
        $post = DB::table('notifications')->where('name', 'LIKE', '%'.$search.'%')->paginate(7);
        return view('notification.index', ['post'=> $post]);
            //return dd($search, $post);
    }
}
