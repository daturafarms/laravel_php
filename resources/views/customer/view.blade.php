@extends('customer.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-11">
		  <h2>Laravel/PHP/MySQL Example by Ted Ford</h2>
		</div>
		<div class="col-lg-1">
		  <a class="btn btn-primary" href="{{ url('customer') }}"> Back</a>
		</div

		<table class="table table-bordered">
		   <tr>
			<th>First Name:</th>
			<td{{ $customer->first_name }}</td>
		   </tr>

		  <tr>
			<th>Address:</th>
			<td>{{ $customer->address }}</td>
		  </tr>

	</table>
@endsection
