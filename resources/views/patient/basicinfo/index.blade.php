@extends('layouts.patient')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			@include('includes.errors')
			<div class="col-xs-12 col-sm-4" style="text-align:center">
				<figure>
					<img class="img-rounded img-responsive" alt="No image" src="{{URL::to('uploads/profilePic').'/'.$patientInfo->image}}">
				</figure>
			</div>
			<div class="col-xs-12 col-sm-8">
				<ul class="list-group" style="margin-bottom: 5px;">
					<table class="table">

						<tr>
							<td><b>Name</b></td>
							<td>{{Auth::user()->name}}</td>
						</tr>

						<tr>
							<td><b>Phone</b></td>
							<td>{{$patientInfo->phone}}</td>
						</tr>
						<tr>
							<td><b>Date of Birth</b></td>
							@if ($patientInfo->dob)
								<td>{{ date("jS F, Y", strtotime($patientInfo->dob)) }}</td>
							@else
								<td></td>
							@endif

						</tr>
						<tr>
							<td><b>Address</b></td>
							<td>{{$patientInfo->address}}</td>
						</tr>
						<tr>
							<td><b>About</b></td>
							<td>{{$patientInfo->about}}</td>
						</tr>

					</table>
				</ul>

				<div class="pull-right">
					<a class="btn btn-info" href="{{route('patientBasicInfo.edit')}}"> <span class="glyphicon glyphicon-cog"></span> Edit</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
