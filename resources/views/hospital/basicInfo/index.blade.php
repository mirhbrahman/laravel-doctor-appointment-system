@extends('layouts.hospital')
@section('content')
	<div class="">

	</div>

	<div class="col-sm-12">
		<div class="col-sm-8 col-sm-offset-2">
			<p style="text-align:center"><label for="">Hospital Basic Info</label></p>
			@include('includes.errors')
			@if (isset($basicInfo) && $basicInfo)
				<table class="table">
					<tr>
						<td>Hospital Name</td>
						<td>{{$basicInfo->name}}</td>
					<tr>
						<td>Hospital Email</td>
						<td>{{$basicInfo->email}}</td>
					</tr>
					<tr>
						<td>Hospital Phone</td>
						<td>{{$basicInfo->phone}}</td>
					</tr>
					<tr>
						<td>Hospital Address</td>
						<td>{{$basicInfo->address}}</td>
					</tr>
				</table>

				<a href="{{route('hosBasicInfo.edit')}}" class="btn btn-info pull-right"><i class="fa fa-cog" aria-hidden="true"></i> Edit</a>
			@else
				<p>Please Add Hospital's Basic Information</p>
				<a href="{{route('hosBasicInfo.edit')}}" class="btn btn-primary pull-right"><i class="fa fa-cog" aria-hidden="true"></i> Add Info</a>
			@endif
		</div>
	</div>
@endsection
