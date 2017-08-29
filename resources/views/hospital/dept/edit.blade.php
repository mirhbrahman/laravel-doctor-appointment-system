@extends('layouts.hospital')

@section('content')
	<div class="col-sm-12">
		<div class="col-sm-12">
			<h4 style="text-align:center">Hospitals Department</h4>
			<hr>
		</div>

		<div class="col-sm-12" style="padding:0">
			<div class="col-sm-6">
				<label for="">Edit Department</label>
				@include('includes.errors')
				<hr style="margin-top:5px;margin-bottom:5px">
				{!!Form::model($dept,['action'=>['Hospital\DeptsController@update',$dept->id],'method'=>'PATCH'])!!}
				<label for="">Dept Name</label>
				{!!Form::text('name',null,['class'=>'form-control'])!!}
				<br>
				{!!Form::submit('Update',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
			</div>

		</div>
	</div>
@endsection
