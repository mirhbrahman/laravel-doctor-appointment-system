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
							<th>Branch</th>
							<th>Action</th>
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
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>

									</td>
									<td>
									sdlfdls

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
