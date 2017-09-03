@extends('layouts.search')

@section('content')
	<div class="col-sm-12">
		<div class="col-sm-10 col-sm-offset-1">
			<hr>
			<p><a href="{{route('search.index')}}" class="">Home</a> / <a href="{{route('search.hospitals')}}" class="">Hospitals</a> / {{$hospital->name}}</p>
			<hr>
			<div class="col-sm-12" style="padding:0">
				<h4 style="text-align:center;margin:0">Hospital Info</h4>
				<hr>
				<div class="col-sm-4">
					<h4>Baisc Info</h4>
					<table>
						<tr>
							<td><b>Name: </b></td>
							<td>{{$hospital->name}}</td>
						</tr>
						<tr>
							<td><b>Email: </b></td>
							<td>{{$hospital->email}}</td>
						</tr>
						@if ($hospital->hosBasicInfo)
							<tr>
								<td><b>Phone: </b></td>
								<td>{{$hospital->hosBasicInfo->phone}}</td>
							</tr>
							<tr>
								<td><b>Address: </b></td>
								<td>{{$hospital->hosBasicInfo->address}}</td>
							</tr>
						@endif
					</table>
				</div>
				<div class="col-sm-4">
					<h4>Branch</h4>
					<ol>
						@if ($hospital->hosBranches)
							@foreach ($hospital->hosBranches as $branch)
								<li><a href="{{route('search.hospital.branch',[$hospital->user_id,$branch->id])}}">{{$branch->name}}</a></li>
							@endforeach
						@endif
					</ol>

				</div>
				<div class="col-sm-4">
					<h4>Department</h4>
					<ol>
						@if ($hospital->hosDepts)
							@foreach ($hospital->hosDepts as $dept)
								<li>{{$dept->name}}</li>
							@endforeach
						@endif
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection
