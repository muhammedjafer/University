<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use Illuminate\Support\Facades\DB;

class invoicecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = invoice::latest()->paginate(6);
        /*always use compact, always*/
        return view('invoice.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice.create');
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
            'totalAmount' => 'required|numeric',
            'totalPaid' => 'required|numeric',
            'Date' => 'required',
            'repairBrokenPart' => 'required'
        ]);

        $post = new invoice();
        $post->customerName = $request->input('customerName');
        $post->totalAmount = $request->input('totalAmount');
        $post->totalPaid = $request->input('totalPaid');
        $post->Date = $request->input('Date');
        $post->repairBrokenPart = $request->input('repairBrokenPart');
        $post->save();
        return redirect()->route('invoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = invoice::findOrFail($id);
        return view('invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = invoice::findorFail($id);
        return view('invoice.edit', compact('invoice'));
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
            'totalAmount' => 'required|numeric',
            'totalPaid' => 'required|numeric',
            'Date' => 'required',
            'repairBrokenPart' => 'required'
        ]);

        $post = invoice::findOrFail($id);
        $post->customerName = $request->input('customerName');
        $post->totalAmount = $request->input('totalAmount');
        $post->totalPaid = $request->input('totalPaid');
        $post->Date = $request->input('Date');
        $post->repairBrokenPart = $request->input('repairBrokenPart');
        $post->update();

        $post = $post->$id;
        return redirect()->route('invoice.index', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('invoice.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('searchinvoice');
        $post = DB::table('invoices')->where('customerName', 'LIKE', '%'.$search.'%')->paginate(6);
        
        return view('invoice.index', ['post'=> $post]);
            //return dd($search, $post);
    }
}
