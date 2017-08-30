@extends('layouts.hospital')

@section('content')
<style media="screen">
.panel-heading {
	padding: 3px 15px;
	border-bottom: 1px solid transparent;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
	padding: 1px;
	line-height: 1.42857143;
	vertical-align: top;
	border-top: 1px solid #ddd;
}
</style>
<div class="col-sm-12">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"><label for="">Doctor Info</label></div>
			<div class="panel-body">
				@if (isset($doctor) && count($doctor))
					<div class="col-sm-4">
						@if ($doctor->docBasicInfo)
							<img class="img-responsive img-rounded" src="{{URL::To('uploads/profilePic').'/'.$doctor->docBasicInfo->image}}" alt="No image">
						@else
							No Image
						@endif

					</div>
					<div class="col-sm-8">
						<table class="table">
							<tr>
								<td><b>Name</b></td>
								<td>{{$doctor->name}}</td>
							</tr>
							<tr>
								<td><b>Email</b></td>
								<td>{{$doctor->email}}</td>
							</tr>
							@if ($doctor->docBasicInfo)
								<tr>
									<td><b>Specialties Degree</b></td>
									<td>{{$doctor->docBasicInfo->degree}}</td>
								</tr>
								<tr>
									<td><b>Phone</b></td>
									<td>{{$doctor->docBasicInfo->phone}}</td>
								</tr>
								<tr>
									<td><b>Date of Birth</b></td>
									<td>{{date("jS F, Y", strtotime($doctor->docBasicInfo->dob))}}</td>
								</tr>
								<tr>
									<td><b>Address</b></td>
									<td>{{$doctor->docBasicInfo->address}}</td>
								</tr>
								<tr>
									<td><b>About</b></td>
									<td>{{$doctor->docBasicInfo->about}}</td>
								</tr>
								<tr>
									<td><b>Joining date</b></td>
									<td>{{date("jS F, Y", strtotime($doctor->created_at))}}</td>
								</tr>
							@endif

						</table>
					</div>
				@endif
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"><label for="">Hospital Info</label></div>
			<div class="panel-body">
				@if (isset($doctor) && count($doctor))
					<div class="col-sm-4">
						<table class="table">
							<tr>
								<td><b>Department</b></td>
								<td>{{$doctor->dept->name}}</td>
							</tr>
							<tr>
								<td><b>Fee</b></td>
								@if (isset($fee))
									<td>{{$doctor->dept->name}}</td>
								@else
									<td><span style="color:red">Not set yet</span> <a href="#"> <i class="fa fa-cog" aria-hidden="true"></i> Set</a></td>
								@endif
							</tr>
						</table>

						<table class="table">
							<label for="">Visiting Hours</label>
							@if (isset($work))
								@else
								<td><span style="color:red">Not set yet</span> <a href="#"> <i class="fa fa-cog" aria-hidden="true"></i> Set</a></td>	
							@endif
						</table>

					</div>
					<div class="col-sm-8">
						<label for="">Branch</label>
						<table class="table">
							<tr>
								<td>Name</td>
								<td>{{$doctor->branch->name}}</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>{{$doctor->branch->email}}</td>
							</tr>
							<tr>
								<td>Phone</td>
								<td>{{$doctor->branch->phone}}</td>
							</tr>
							<tr>
								<td>Address</td>
								<td>{{$doctor->branch->address}}</td>
							</tr>
							<tr>
								<td>About</td>
								<td>{{$doctor->branch->about}}</td>
							</tr>


						</table>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
