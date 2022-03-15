<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	$customers = Customer::all();
	return view('customer.list', compact('customers','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
	$request->validate([
		'txtFirstName'=>'required',
		'txtLastName'=> 'required',
		'txtAddress' => 'required'
	]);
	
	$customer = new Customer([
		'first_name' => $request->get('txtFirstName'),
		'last_name'=> $request->get('txtLastName'),
		'address'=> $request->get('txtAddress')
	]);

	$customer->save();
	return redirect('/customer')->with('success', 'Customer has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
	return view('customer.view',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
	return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
	$request->validate([
		'txtFirstName'=>'required',
		'txtLastName'=> 'required',
		'txtAddress' => 'required'
	]);

	$customer = Customer::find($id);
	$customer->first_name = $request->get('txtFirstName');
	$customer->last_name = $request->get('txtLastName');
	$customer->address = $request->get('txtAddress');

	$customer->update();

	return redirect('/customer')->with('success', 'Customer updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
	$customer->delete();
	return redirect('/customer')->with('success', 'Customer deleted successfully');
    }
}
?>
