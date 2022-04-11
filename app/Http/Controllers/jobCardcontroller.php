<?php

namespace App\Http\Controllers;

use App\Models\jobCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jobCardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = jobCard::latest()->paginate(6);
        /*always use compact, always*/
        return view('jobcard.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobcard.create');
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
            'customerName' => 'required|min:5|max:100',
            'vehicleBrand' => 'required',
            'inDate' => 'required',
            'outDate' => 'required',
            'asignedTo' => 'required|min:5|max:100'
        ]);

        $post = new jobCard();
        $post->customerName = $request->input('customerName');
        $post->vehicleBrand = $request->input('vehicleBrand');
        $post->inDate = $request->input('inDate');
        $post->outDate = $request->input('outDate');
        $post->asignedTo = $request->input('asignedTo');
        $post->save();
        return redirect()->route('jobcard.index');
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
        $jobcard = jobCard::findorFail($id);
        return view('jobcard.edit', compact('jobcard'));
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
            'customerName' => 'required|min:5|max:100',
            'vehicleBrand' => 'required',
            'inDate' => 'required',
            'outDate' => 'required',
            'asignedTo' => 'required|min:5|max:100'
        ]);

        $post = jobCard::findOrFail($id);
        $post->customerName = $request->input('customerName');
        $post->vehicleBrand = $request->input('vehicleBrand');
        $post->inDate = $request->input('inDate');
        $post->outDate = $request->input('outDate');
        $post->asignedTo = $request->input('asignedTo');
        $post->update();

        $post = $post->$id;
        return redirect()->route('jobcard.index', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobcard = jobcard::findOrFail($id);
        $jobcard->delete();
        return redirect()->route('jobcard.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('searchjobcard');
        $post = DB::table('job_cards')->where('customerName', 'LIKE', '%'.$search.'%')->paginate(7);
        
        return view('jobcard.index', ['post'=> $post]);
            //return dd($search, $post);
    }
}
