@extends('layouts.doctor')
@section('content')
	<div class="col-sm-12">
		<div class="col-sm-12" >
			<div class="panel panel-info">
				<div class="panel-heading">Your Info</div>
				<div class="panel-body">
					@include('includes.errors')
					{{Form::open(['method'=>'POST','action'=>'Doctor\DoctorBasicInfoController@store','files'=>true])}}
					<div class="form-group">
						<label for="name">Specialties Degree:</label>
						{{Form::text('degree',$docInfo->degree,['class'=>'form-control','placeholder'=>'Specialties degree'])}}

						<label for="name">phone:</label>
						{{Form::number('phone',$docInfo->phone,['class'=>'form-control','placeholder'=>'Phone'])}}

						<label for="name">Date of Birth:</label>
						{{Form::date('dob',date('Y-m-d',strtotime($docInfo->dob)),['class'=>'form-control'])}}

						<label for="name">Address:</label>
						{{Form::textarea('address',$docInfo->address,['class'=>'form-control','placeholder'=>'Address','rows'=>5]) }}

						<label for="name">About You:</label>
						{{Form::textarea('about',$docInfo->about,['class'=>'form-control','placeholder'=>'About','rows'=>5])}}

						<label for="name">Your Image:</label>

						@if ($docInfo->image)
							<div class="" style="padding-top:5px">
								<p>Old Image</p>
								<img style="width:200px" src="{{URL::to('uploads/profilePic').'/'.$docInfo->image}}" alt="">
							</div>
							<p>Choose New</p>
						@endif
						{{Form::file('image',['class'=>'form-control'])}}


						<br>
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">
						<a href="{{route('docBasicInfo.index')}}" class="btn btn-default">Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection
