@extends('layouts.hospital')
@section('content')
	<div class="col-sm-12">
		<label for="">Edit doctors visiting hours</label>
		<p>Doc Name: {{$doc->name}}</p>
		<p>Doc Email: {{$doc->email}}</p>
		<hr>
		<div class="col-sm-6 col-sm-offset-3">

			<p style="text-align:center"><b>Visition Hours</b></p>
			@include('includes.errors')
			{{Form::model($visit,['action'=>'Hospital\DocVisitController@store','method'=>'POST'])}}
			{{Form::hidden('relation_id',$rel->id)}}
			<table class="table">
				<thead>
					<th>Day</th>
					<th>Start</th>
					<th>Finish</th>
				</thead>
				<tbody>
					<tr>
						<td>Saturday</td>
						<td>{{Form::time('sat_s',null,['class'=>'form-control'])}}</td>
						<td>{{Form::time('sat_e',null,['class'=>'form-control'])}}</td>
					</tr>
					<tr>
						<td>Sunday</td>
						<td>{{Form::time('sun_s',null,['class'=>'form-control'])}}</td>
						<td>{{Form::time('sun_e',null,['class'=>'form-control'])}}</td>
					</tr>
					<tr>
						<td>Monday</td>
						<td>{{Form::time('mon_s',null,['class'=>'form-control'])}}</td>
						<td>{{Form::time('mon_e',null,['class'=>'form-control'])}}</td>
					</tr>
					<tr>
						<td>Tuesday</td>
						<td>{{Form::time('tue_s',null,['class'=>'form-control'])}}</td>
						<td>{{Form::time('tue_e',null,['class'=>'form-control'])}}</td>
					</tr>
					<tr>
						<td>Wednesday</td>
						<td>{{Form::time('wed_s',null,['class'=>'form-control'])}}</td>
						<td>{{Form::time('wed_e',null,['class'=>'form-control'])}}</td>
					</tr>
					<tr>
						<td>Thursday</td>
						<td>{{Form::time('thu_s',null,['class'=>'form-control'])}}</td>
						<td>{{Form::time('thu_e',null,['class'=>'form-control'])}}</td>
					</tr>
					<tr>
						<td>Friday</td>
						<td>{{Form::time('fri_s',null,['class'=>'form-control'])}}</td>
						<td>{{Form::time('fri_e',null,['class'=>'form-control'])}}</td>
					</tr>
				</tbody>
			</table>
			{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
			{{Form::close()}}
		</div>
	</div>
@endsection
