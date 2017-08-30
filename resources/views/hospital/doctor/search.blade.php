@extends('layouts.hospital')

@section('content')
	<div class="col-sm-12">
		<div class="col-sm-6 col-sm-offset-3">
			@include('includes.errors')
			<h4>Find Doctor</h4>
			{!!Form::open(['method'=>'POST','action'=>'Hospital\DoctorsController@find'])!!}
			<div id="custom-search-input">
				<div class="input-group col-md-12">
					<input type="text" name="search" class="form-control" placeholder="Search" />
					<span class="input-group-btn">
						<button class="btn btn-success" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</span>
				</div>
			</div>
			{!!Form::close()!!}

			<div class="col-sm-12" style="padding:0">
				@if (isset($doctors) && count($doctors))
					<div class="col-sm-12">
						<hr>
					</div>
					@foreach ($doctors as $doctor)
						<div class="col-sm-12" style="padding:0;margin-bottom:5px">
							<div class="col-sm-3" style="">
								<img class="img-responsive" src="{{URL::to('/uploads/profilePic').'/'.$doctor->image}}" alt="No Image">
							</div>
							<div class="col-sm-6">
								<p style="margin:0"><label for="">{{$doctor->name}}</label></p>
								<p style="margin:0">{{$doctor->email}}</p>
							</div>
							<div class="col-sm-3">
								<a href="{{route('hosDoc.add',$doctor->user_id)}}" class="btn btn-block btn-info">Add</a>
							</div>
						</div>
					@endforeach
				@else
					@if (isset($noData) && count($noData))
						{{$noData}}
					@endif
				@endif
			</div>
		</div>
	</div>
@endsection
