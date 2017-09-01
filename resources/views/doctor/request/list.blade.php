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
			<div class="panel-heading">Request</div>
			<div class="panel-body">
				@include('includes.errors')
				<table class="table table-striped" id="table">
					<thead>
						<tr>
							<th>Hospital Name</th>
							<th>Email</th>
							<th>Department</th>
							<th>Branch</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if (isset($requestList) && count($requestList))
							@foreach ($requestList as $request)
								<tr class="item{{$request->id}}">
									<td>{{$request->name}}</td>
									<td>{{$request->email}}</td>
									<td>{{$request->dept->name}}</td>
									<td>

										<!-- Trigger the modal with a button -->
										<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$request->id}}">View Details</button>

										<!-- Modal -->
										<div id="myModal{{$request->id}}" class="modal fade" role="dialog">
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
																<td>{{$request->branch->name}}</td>
															</tr>
															<tr>
																<td>Email</td>
																<td>{{$request->branch->email}}</td>
															</tr>
															<tr>
																<td>Phone</td>
																<td>{{$request->branch->phone}}</td>
															</tr>
															<tr>
																<td>Address</td>
																<td>{{$request->branch->address}}</td>
															</tr>
															<tr>
																<td>About</td>
																<td>{{$request->branch->about}}</td>
															</tr>


														</table>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>

									</td>
									<td>
									<div class="col-sm-12">
										<div class="col-sm-6">
											<!--Accept  request-->
											{{Form::open(['method'=>'Post','action'=>'Doctor\RequestController@accept'])}}
											{{Form::hidden('relation_id',$request->id)}}
											{{Form::submit('Accept',['class'=>'btn btn-sm btn-success'])}}
											{{Form::close()}}
										</div>

											<!--Reject  request-->
											{{Form::open(['method'=>'Post','action'=>'Doctor\RequestController@reject'])}}
											{{Form::hidden('relation_id',$request->id)}}
											{{Form::submit('Reject',['class'=>'btn btn-sm btn-danger'])}}
											{{Form::close()}}

									</div>

									</td>
								</tr>

							@endforeach
						@else
							<td colspan="6">No request found</td>
						@endif

					</tbody>
				</table>
			</div>
		</div>

		@if (count($requestList))
			<script>

			$(document).ready(function() {
				$('#table').DataTable();
			} );

			</script>
		@endif
	@endsection
