@extends('layouts.search')

@section('content')
	<div class="col-sm-12">
		<div class="col-sm-10 col-sm-offset-1">
			<hr>
				<p><a href="{{route('search.index')}}" class="">Home</a> / <a href="{{route('search.hospitals')}}" class="">Hospitals</a> / <a href="{{route('search.hospital',$hospital->user_id)}}" class="">{{$hospital->name}}</a> / {{$branch->name}}</p>
			<hr>
			<div class="col-sm-12" style="padding:0">
			<h4 style="text-align:center;margin:0">Hospital Branch Info</h4>
			<hr>

				<div class="col-sm-6">
					<h4>Hospital Info</h4>
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
				<div class="col-sm-6">
					<h4>Branch Info</h4>
					<ol>
						@if ($branch)
							<table>
								<tr>
									<td><b>Name: </b></td>
									<td>{{$branch->name}}</td>
								</tr>
								<tr>
									<td><b>Email: </b></td>
									<td>{{$branch->email}}</td>
								</tr>
								<tr>
									<td><b>Phone: </b></td>
									<td>{{$branch->phone}}</td>
								</tr>
								<tr>
									<td><b>Address: </b></td>
									<td>{{$branch->address}}</td>
								</tr>
							</table>
						@endif
					</ol>

				</div>

			</div>
		</div>
	</div>
@endsection
