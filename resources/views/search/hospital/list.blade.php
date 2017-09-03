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
		<div class="panel panel-default">
			<div class="panel-heading">Hospitals</div>
			<div class="panel-body">
				@include('includes.errors')
				<table class="table table-striped" id="table">
					<thead>
						<tr>
							<th>Hospital Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						@if (isset($hospitalList) && count($hospitalList))
							@foreach ($hospitalList as $hospital)
								<tr class="item{{$hospital->id}}">
									<td>{{$hospital->name}}</td>
									<td>{{$hospital->email}}</td>
									@if ($hospital->hosBasicInfo)
										<td>{{$hospital->hosBasicInfo->phone}}</td>
									@else
										<td>Not Set</td>
									@endif
									@if ($hospital->hosBasicInfo)
										<td>{{$hospital->hosBasicInfo->address}}</td>
									@else
										<td>Not Set</td>
									@endif

								</tr>

							@endforeach
						@else
							<td colspan="3">No hospital found</td>
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
