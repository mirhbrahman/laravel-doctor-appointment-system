@extends('layouts.hospital')
@section('content')
	<div class="col-sm-12">
		<div class="col-sm-8 col-sm-offset-2">
			<p style="text-align:center"><label for="">Edit Hospital Basic Info</label></p>
			@include('errors.errors')
			{!!Form::model($basicInfo,['method'=>'POST','action'=>'Hospital\BasicInfoController@store'])!!}
			<label for="">Name</label>
			{!!Form::text('name',null,['class'=>'form-control','required'])!!}
			<label for="">Email</label>
			{!!Form::email('email',null,['class'=>'form-control','required'])!!}
			<label for="name">phone</label>
            {!!Form::text('phone',null,['class'=>'form-control','placeholder'=>'Separate multiple phone by comma \',\'','required'])!!}
			<label for="">Address</label>
			{!!Form::textarea('address',null,['class'=>'form-control','required'])!!}
			<br>
			{!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
			{!!Form::close()!!}
		</div>
	</div>
@endsection
