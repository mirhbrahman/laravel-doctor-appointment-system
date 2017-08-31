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
label{
	color:#098009;
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
					<div class="col-sm-6">
						@include('includes.errors')
						<table class="table">
							<tr>
								<td><b>Department</b></td>
								<td>{{$doctor->dept->name}}</td>
							</tr>

						</table>

						<label for="">Visiting Hours</label>
						@if (isset($visit) && count($visit))
							<table class="table">
								<thead>
									<th>Day</th>
									<th>Start</th>
									<th>Finish</th>
								</thead>
								<tbody>
									<tr>
										<td>Saturday</td>
										@if ($visit->sat_s == null || $visit->sat_e == null)
											<td colspan="2" style="color:red;text-align:center">OFF</td>
										@else
											<td>{{date('h:i:s a', strtotime($visit->sat_s))}}</td>
											<td>{{date('h:i:s a', strtotime($visit->sat_e))}}</td>
										@endif
									</tr>

									<tr>
										<td>Sunday</td>
										@if ($visit->sun_s == null || $visit->sun_e == null)
											<td colspan="2" style="color:red;text-align:center">OFF</td>
										@else
											<td>{{date('h:i:s a', strtotime($visit->sun_s))}}</td>
											<td>{{date('h:i:s a', strtotime($visit->sun_e))}}</td>
										@endif
									</tr>

									<tr>
										<td>Monday</td>
										@if ($visit->mon_s == null || $visit->mon_e == null)
											<td colspan="2" style="color:red;text-align:center">OFF</td>
										@else
											<td>{{date('h:i:s a', strtotime($visit->mon_s))}}</td>
											<td>{{date('h:i:s a', strtotime($visit->mon_e))}}</td>
										@endif
									</tr>

									<tr>
										<td>Tuesday</td>
										@if ($visit->tue_s == null || $visit->tue_e == null)
											<td colspan="2" style="color:red;text-align:center">OFF</td>
										@else
											<td>{{date('h:i:s a', strtotime($visit->tue_s))}}</td>
											<td>{{date('h:i:s a', strtotime($visit->tue_e))}}</td>
										@endif
									</tr>

									<tr>
										<td>Wednesday</td>
										@if ($visit->wed_s == null || $visit->wed_e == null)
											<td colspan="2" style="color:red;text-align:center">OFF</td>
										@else
											<td>{{date('h:i:s a', strtotime($visit->wed_s))}}</td>
											<td>{{date('h:i:s a', strtotime($visit->wed_e))}}</td>
										@endif
									</tr>

									<tr>
										<td>Thursday</td>
										@if ($visit->thu_s == null || $visit->thu_e == null)
											<td colspan="2" style="color:red;text-align:center">OFF</td>
										@else
											<td>{{date('h:i:s a', strtotime($visit->thu_s))}}</td>
											<td>{{date('h:i:s a', strtotime($visit->thu_e))}}</td>
										@endif
									</tr>

									<tr>
										<td>Friday</td>
										@if ($visit->fri_s == null || $visit->fri_e == null)
											<td colspan="2" style="color:red;text-align:center">OFF</td>
										@else
											<td>{{date('h:i:s a', strtotime($visit->fri_s))}}</td>
											<td>{{date('h:i:s a', strtotime($visit->fri_e))}}</td>
										@endif
									</tr>

								</tbody>
							</table>
						@else
							<td><span style="color:red">Not set yet</span> <a href="{{route('docVisit.add',$doctor->id)}}"> <i class="fa fa-cog" aria-hidden="true"></i> Set</a></td>
							<td>
							@endif

						</div>
						<div class="col-sm-6">
							<table class="table">
								<tr>
									<td><b>Fee (TK)</b></td>
									@if (isset($fee) && count($fee))
										<td>{{$fee->fee}} | <a href="{{route('docFee.add',$doctor->id)}}"> <i class="fa fa-cog" aria-hidden="true"></i> Edit</a></td>
									@else
										<td><span style="color:red">Not set yet</span> <a href="{{route('docFee.add',$doctor->id)}}"> <i class="fa fa-cog" aria-hidden="true"></i> Set</a></td>
									@endif
								</tr>
							</table>
							<label for="">Branch</label>
							<br>
							<br>
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
