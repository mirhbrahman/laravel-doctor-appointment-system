@extends('layouts.search')
@section('assets')
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script
	src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet"
	href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

@endsection
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

			<div class="col-sm-12">
				<br>
				<div class="panel panel-default">
					<div class="panel-heading">Doctors</div>
					<div class="panel-body">
						@include('includes.errors')
						<table class="table table-striped" id="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Specialized</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@if (isset($doctors)&& $doctors)
									@foreach ($doctors as $doctor)
										<tr class="item{{$doctor->id}}">
											<td>{{$doctor->name}}</td>
											<td>{{$doctor->email}}</td>
											@if ($doctor->docBasicInfo)
												<td>{{$doctor->docBasicInfo->degree}}</td>
											@else
												<td>Not set yet</td>
											@endif

											<td>


												<div class="col-sm-12">
													<div class="col-sm-6">
														<!-- Trigger the modal with a button -->
														<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$doctor->id}}">View Details</button>
														<!-- Modal -->
												<div id="myModal{{$doctor->id}}" class="modal fade" role="dialog">
													<div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Other Info</h4>
															</div>
															<div class="modal-body">

																<label for="" style="color:green">Fee :
																	@if ($doctor->docFee)
																		{{$doctor->docFee->fee}} TK
																	@else
																		<span style="color:red">Not set yet</span>
																	@endif
																</label>
																<br>
																<label for="">Visiting Hours:</label>

																@if ($doctor->docVisit)
																	<table class="table">
																		<thead>
																			<th>Day</th>
																			<th>Start</th>
																			<th>Finish</th>
																		</thead>
																		<tbody>
																			<tr>
																				<td>Saturday</td>
																				@if ($doctor->docVisit->sat_s == null || $doctor->docVisit->sat_e == null)
																					<td colspan="2" style="color:red;text-align:center">OFF</td>
																				@else
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->sat_s))}}</td>
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->sat_e))}}</td>
																				@endif
																			</tr>

																			<tr>
																				<td>Sunday</td>
																				@if ($doctor->docVisit->sun_s == null || $doctor->docVisit->sun_e == null)
																					<td colspan="2" style="color:red;text-align:center">OFF</td>
																				@else
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->sun_s))}}</td>
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->sun_e))}}</td>
																				@endif
																			</tr>

																			<tr>
																				<td>Monday</td>
																				@if ($doctor->docVisit->mon_s == null || $doctor->docVisit->mon_e == null)
																					<td colspan="2" style="color:red;text-align:center">OFF</td>
																				@else
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->mon_s))}}</td>
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->mon_e))}}</td>
																				@endif
																			</tr>

																			<tr>
																				<td>Tuesday</td>
																				@if ($doctor->docVisit->tue_s == null || $doctor->docVisit->tue_e == null)
																					<td colspan="2" style="color:red;text-align:center">OFF</td>
																				@else
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->tue_s))}}</td>
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->tue_e))}}</td>
																				@endif
																			</tr>

																			<tr>
																				<td>Wednesday</td>
																				@if ($doctor->docVisit->wed_s == null || $doctor->docVisit->wed_e == null)
																					<td colspan="2" style="color:red;text-align:center">OFF</td>
																				@else
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->wed_s))}}</td>
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->wed_e))}}</td>
																				@endif
																			</tr>

																			<tr>
																				<td>Thursday</td>
																				@if ($doctor->docVisit->thu_s == null || $doctor->docVisit->thu_e == null)
																					<td colspan="2" style="color:red;text-align:center">OFF</td>
																				@else
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->thu_s))}}</td>
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->thu_e))}}</td>
																				@endif
																			</tr>

																			<tr>
																				<td>Friday</td>
																				@if ($doctor->docVisit->fri_s == null || $doctor->docVisit->fri_e == null)
																					<td colspan="2" style="color:red;text-align:center">OFF</td>
																				@else
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->fri_s))}}</td>
																					<td>{{date('h:i:s a', strtotime($doctor->docVisit->fri_e))}}</td>
																				@endif
																			</tr>

																		</tbody>
																	</table>
																@else
																	<span style="color:red">Not set yet</span>
																@endif
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>

													</div>
												</div>

											</div>

											<div class="col-sm-6">
												@if ($doctor->appoint && $doctor->appoint->status == 0)
													<p class="btn btn-primary">Pending Request</p>
													@else
														{{Form::open(['method'=>'POST','action'=>'Appoint\AppointController@requestAppoint'])}}
														{{Form::hidden('relation_id',$doctor->id)}}
														{{Form::submit('Appoint Request',['class'=>'btn btn-info'])}}
														{{Form::close()}}
														
												@endif

											</div>
										</div>

											</td>

										</tr>

									@endforeach
								@else
									<td colspan="6">No data found</td>
								@endif

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if (count($doctors))
		<script>

		$(document).ready(function() {
			$('#table').DataTable();
		} );

		</script>
	@endif
@endsection
