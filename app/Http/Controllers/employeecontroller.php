<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\jobCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employeecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = employee::latest()->paginate(7);
        return view('employee.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
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
            'employeeName' => 'required|min:5|max:100',
            'employeeNumber' => 'required|min:10|numeric',
            'Designation' => 'required|max:50',
        ]);
        $post = new employee();
        $post->employeeName = $request->input('employeeName');
        $post->mobileEmployee = $request->input('employeeNumber');
        $post->Designation = $request->input('Designation');
        $post->save();
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = employee::findOrFail($id);
        $employeeName = employee::select('employeeName')->find($id);
        $Name = $employeeName['employeeName'];

        $numberofjobcardforeachemployee =jobCard::select('asignedTo')->where('asignedTo', 'like', '%'.$Name.'%')->get()->count();
        return view('employee.show', compact('numberofjobcardforeachemployee', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = employee::findorFail($id);
        return view('employee.edit', compact('employee'));
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
            'employeeName' => 'required|min:5|max:100',
            'employeeNumber' => 'required|min:10|numeric',
            'Designation' => 'required|max:50',
        ]);
        $post = employee::findOrFail($id);
        $post->employeeName = $request->input('employeeName');
        $post->mobileEmployee = $request->input('employeeNumber');
        $post->Designation = $request->input('Designation');
        $post->update();

        $post = $post->$id;
        return redirect()->route('employee.index', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = employee::findOrFail($id);
        $customer->delete();
        return redirect()->route('employee.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('searchemployee');
        $Designation = $request->get('selection');
        //return dd($Designation);
        
            //return dd($search, $Designation);
        $post = DB::table('employees')->where($Designation, 'like', '%' . $search . '%')->paginate(7);
            //return dd($post->items(), $search, $Designation);
        return view('employee.index', ['post' => $post]);
            
    }

    public function showall(Request $id)
    {
        $sear = employee::findOrFail($id);
        $search = $sear[0]->employeeName;
        $post = DB::table('job_cards')->where('asignedTo', 'LIKE', '%'.$search.'%')->paginate(7);
        //return dd($post->items(), $post);
        return view('jobcard.index', ['post'=> $post]);
        //return dd($search, $post);
    }
}
