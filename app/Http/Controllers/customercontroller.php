<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\customerModel;
use App\Models\invoice;
use App\Models\notification;
use App\Models\jobCard;
use App\Http\Controllers\jobCardController;

class customercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = customerModel::latest()->paginate(7);
        //$post = $post->reverse();
        //array_reverse($post);
        //$po = array_reverse($post->toArray());
        //return dd($post);
        return view('customer.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'mobileNumber' => 'required|min:10|numeric'
        ]);
        $post = new customerModel();
        $post->customerName = $request->input('customerName');
        $post->mobileNumber = $request->input('mobileNumber');
        $post->save();
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = customerModel::findOrFail($id);
        //Find the name of the customer
        $customerName = customerModel::select('customerName')->find($id);
        $Name = $customerName['customerName'];

        //Counting the Invoices of the customer
        $invoice = invoice::select('customerName')->where('customerName', 'like', $Name)->get()->count();

        //how much of the Paid amount of the customer
        $paidAmount = DB::table('invoices')->where('customerName', 'like', $Name)->sum('totalPaid');
        $paidPaid = DB::table('invoices')->where('customerName', 'like', $Name)->sum('totalAmount');

        //Counting the Notification of the customer
        $notification =notification::select('name')->where('name', 'like', $Name)->get()->count();

        //Counting the job cards of the customer
        $jobCard =jobCard::select('customerName')->where('customerName', 'like', $Name)->get()->count();
        //$result = DB::table('invoices')
          //      ->select(DB::raw('SUM(totalPaid) as total_field_name'))
            //    ->get();
        //$customerName = customerModel::select('customerName')->where('id', $id);
        //$invoiceCount = invoice::find('customerName')->where('id', $id)->get();

        return view('customer.show', compact('customer', 'invoice', 'paidAmount', 'notification', 'jobCard', 'paidPaid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customerModel::findorFail($id);
        return view('customer.edit', compact('customer'));
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
            'mobileNumber' => 'required|min:10'
        ]);
        $post = customerModel::findOrFail($id);
        $post->customerName = $request->input('customerName');
        $post->mobileNumber = $request->input('mobileNumber');
        $post->update();
        $post = $post->$id;
        return redirect()->route('customer.index', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customerModel::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }

    public function showall(Request $id) {  
        $sear = customerModel::findOrFail($id);
        $search = $sear[0]->customerName;
        $post = DB::table('job_cards')->where('customerName', 'LIKE', '%'.$search.'%')->paginate(7);
        //return dd($post->items());
        if($post->items()){
        return view('jobcard.index', ['post'=> $post]);
        //return dd($search, $post);
        } else {
            return $this->index();
        }

    }

    public function showallnotification(Request $id) {
        $sear = customerModel::findOrFail($id);
        //because the $sear is an array we have to take just one item in the array, why it's an array becuase we used get() method
        // and get() returns a collection 
        $search = $sear[0]->customerName;
        $post = DB::table('notifications')->where('name', 'LIKE', '%'.$search.'%')->paginate(7);
        if($post->items()){
            return view('notification.index', ['post'=> $post]);
            //return dd($search, $post);
            } else {
                return $this->index();
            }
    }

    public function showallinvoice(Request $id) {
        $sear = customerModel::findOrFail($id);
        //because the $sear is an array we have to take just one item in the array, why it's an array becuase we used get() method
        // and get() returns a collection 
        $search = $sear[0]->customerName;
        $post = DB::table('invoices')->where('customerName', 'LIKE', '%'.$search.'%')->paginate(7);
        if($post->items()){
            return view('invoice.index', ['post'=> $post]);
            //return dd($search, $post);
            } else {
                return $this->index();
            }
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $post = DB::table('customer_models')->where('customerName', 'LIKE', '%'.$search.'%')->paginate(7);
        
        return view('customer.index', ['post'=> $post]);
            //return dd($search, $post);
    }
}
