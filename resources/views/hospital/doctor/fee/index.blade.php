@extends('layouts.hospital')
@section('content')
	<div class="col-sm-12">
		<label for="">Edit doctors fee</label>
		<p>Doc Name: {{$doc->name}}</p>
		<p>Doc Email: {{$doc->email}}</p>
		<hr>
		<div class="col-sm-6">
			
			<label for="">Fee (TK)</label>
			@include('includes.errors')
			{{Form::model($fee,['action'=>'Hospital\DocFeeController@store','method'=>'POST'])}}
			{{Form::hidden('relation_id',$rel->id)}}
			{{Form::number('fee',null,['class'=>'form-control'])}}
			<br>
			{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
			{{Form::close()}}
		</div>
	</div>
@endsection
