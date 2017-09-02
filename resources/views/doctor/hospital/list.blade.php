@extends('layouts.doctor')
@section('assets')
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script
	src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet"
	href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

@endsection
@section('content')


	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">Member of Hospitals</div>
			<div class="panel-body">
				@include('includes.errors')
				<table class="table table-striped" id="table">
					<thead>
						<tr>
							<th>Hospital Name</th>
							<th>Email</th>
							<th>Department</th>
							<th>Other Info</th>
						</tr>
					</thead>
					<tbody>
						@if (isset($hospitalList) && count($hospitalList))
							@foreach ($hospitalList as $hospital)
								<tr class="item{{$hospital->id}}">
									<td>{{$hospital->name}}</td>
									<td>{{$hospital->email}}</td>
									<td>{{$hospital->dept->name}}</td>
									<td>

										<!-- Trigger the modal with a button -->
										<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$hospital->id}}">View Details</button>

										<!-- Modal -->
										<div id="myModal{{$hospital->id}}" class="modal fade" role="dialog">
											<div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Hospital Branch Info</h4>
													</div>
													<div class="modal-body">
														<table class="table">
															<tr>
																<td>Name</td>
																<td>{{$hospital->branch->name}}</td>
															</tr>
															<tr>
																<td>Email</td>
																<td>{{$hospital->branch->email}}</td>
															</tr>
															<tr>
																<td>Phone</td>
																<td>{{$hospital->branch->phone}}</td>
															</tr>
															<tr>
																<td>Address</td>
																<td>{{$hospital->branch->address}}</td>
															</tr>
															<tr>
																<td>About</td>
																<td>{{$hospital->branch->about}}</td>
															</tr>


														</table>

														<label for="" style="color:green">Fee : {{$hospital->docFee->fee}} TK</label>
														<br>
														<label for="">Visiting Hours:</label>
														<table class="table">
															<thead>
																<th>Day</th>
																<th>Start</th>
																<th>Finish</th>
															</thead>
															<tbody>
																<tr>
																	<td>Saturday</td>
																	@if ($hospital->docVisit->sat_s == null || $hospital->docVisit->sat_e == null)
																		<td colspan="2" style="color:red;text-align:center">OFF</td>
																	@else
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->sat_s))}}</td>
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->sat_e))}}</td>
																	@endif
																</tr>

																<tr>
																	<td>Sunday</td>
																	@if ($hospital->docVisit->sun_s == null || $hospital->docVisit->sun_e == null)
																		<td colspan="2" style="color:red;text-align:center">OFF</td>
																	@else
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->sun_s))}}</td>
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->sun_e))}}</td>
																	@endif
																</tr>

																<tr>
																	<td>Monday</td>
																	@if ($hospital->docVisit->mon_s == null || $hospital->docVisit->mon_e == null)
																		<td colspan="2" style="color:red;text-align:center">OFF</td>
																	@else
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->mon_s))}}</td>
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->mon_e))}}</td>
																	@endif
																</tr>

																<tr>
																	<td>Tuesday</td>
																	@if ($hospital->docVisit->tue_s == null || $hospital->docVisit->tue_e == null)
																		<td colspan="2" style="color:red;text-align:center">OFF</td>
																	@else
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->tue_s))}}</td>
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->tue_e))}}</td>
																	@endif
																</tr>

																<tr>
																	<td>Wednesday</td>
																	@if ($hospital->docVisit->wed_s == null || $hospital->docVisit->wed_e == null)
																		<td colspan="2" style="color:red;text-align:center">OFF</td>
																	@else
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->wed_s))}}</td>
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->wed_e))}}</td>
																	@endif
																</tr>

																<tr>
																	<td>Thursday</td>
																	@if ($hospital->docVisit->thu_s == null || $hospital->docVisit->thu_e == null)
																		<td colspan="2" style="color:red;text-align:center">OFF</td>
																	@else
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->thu_s))}}</td>
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->thu_e))}}</td>
																	@endif
																</tr>

																<tr>
																	<td>Friday</td>
																	@if ($hospital->docVisit->fri_s == null || $hospital->docVisit->fri_e == null)
																		<td colspan="2" style="color:red;text-align:center">OFF</td>
																	@else
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->fri_s))}}</td>
																		<td>{{date('h:i:s a', strtotime($hospital->docVisit->fri_e))}}</td>
																	@endif
																</tr>

															</tbody>
														</table>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>

									</td>

								</tr>

							@endforeach
						@else
							<td colspan="6">No hospital found</td>
						@endif

					</tbody>
				</table>
			</div>
		</div>

		@if (count($hospitalList))
			<script>

			$(document).ready(function() {
				$('#table').DataTable();
			} );

			</script>
		@endif
	@endsection
