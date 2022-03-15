@extends('customer.layouts.app')

@section('content')
	<div class="row">
	  <div class="col-lg-11">
	    <h2>Update Customer</h2>
	  </div>
	  <div class="col-lg-1">
		<a class="btn btn-primary" href="{{ url('customer') }}"> Back</a>
	  </div>
	</div>

	@if ($errors->any())
	   <div class="alert alert-danger">
		<strong>ERROR!!!</strong> There is at least one error in your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{ $error {{</li>
			@endforeach

		</ul>
	   </div>
	@endif

	<form method="post" action="{{ route('customer.update',$customer->id) }}"
	    @method('PATCH')
	    @csrf
	    <div class="form-group">
		<label for="txtFirstName">First Name:</label>
		<input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name=txtFirstName" value="{{ $customer->first_name }}">
	    </div>

	    <div class"form-group">
		<label for="txtLastName">Last Name:</label>
		<input type="text" class="form-control" id="txtLast Name" placeholder="Enter Last Name" name="txtLastName" value={{ $customer->last_name }}">
	    </div>

	    <button type="submit" class="btn btn-default">Submit</button>
	</form>
@endsection
