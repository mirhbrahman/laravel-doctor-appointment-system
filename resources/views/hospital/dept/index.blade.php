@extends('layouts.hospital')

@section('content')
	<div class="col-sm-12">
		<div class="col-sm-12">
			<h4 style="text-align:center">Hospitals Department</h4>
			<hr>
		</div>

		<div class="col-sm-12" style="padding:0">
			<div class="col-sm-6">
				<label for="">Create Department</label>
				@include('includes.errors')
				<hr style="margin-top:5px;margin-bottom:5px">
				{!!Form::open(['action'=>'Hospital\DeptsController@store','method'=>'POST'])!!}
				<label for="">Dept Name</label>
				{!!Form::text('name',null,['class'=>'form-control'])!!}
				<br>
				{!!Form::submit('Create',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
			</div>
			<div class="col-sm-6">
				<label for="">Department List</label>
				@if (count($depts))
					<table class="table" style="margin-top:5px;">
						@foreach ($depts as $dept)
							<tr>
								<td>{{$dept->name}}</td>
								<td>
									<div class="col-sm-4">
										<a href="{{route('dept.edit',$dept->id)}}" class="btn btn-info">Edit</a>
									</div>
									{{Form::open(['action'=>['Hospital\DeptsController@destroy',$dept->id],'method'=>'DELETE'])}}
									{{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm(\'Are you sure you want to delete this item?\')'])}}
									{{Form::close()}}
								</td>
							</tr>
						@endforeach
					</table>
				@endif
			</div>
		</div>
	</div>
@endsection
