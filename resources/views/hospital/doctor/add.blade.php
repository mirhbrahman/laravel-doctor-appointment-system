@extends('layouts.hospital')

@section('content')
	<div class="col-sm-12">
		<h4 style="text-align:center">Add doctor to your hospital</h4>
		<hr>

		@if (isset($doc) && count($doc))
			<div class="col-sm-12">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="col-sm-12">
						<label for="">Doctor's Info</label>
					</div>
					<div class="col-sm-12" style="padding:0">
						<div class="col-sm-4">
							@if (count($doc->docBasicInfo))
								<img class="img-responsive" src="{{URL::to('uploads/profilePic').'/'.$doc->docBasicInfo->image}}" alt="No Image">
							@else
								No Image
							@endif

						</div>
						<div class="col-sm-8" style="padding:0">
							<table class="table">
								<tr>
									<td>Name</td>
									<td>{{$doc->name}}</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>{{$doc->email}}</td>
								</tr>
								<tr>
									<td>Specialized</td>
									@if (count($doc->docBasicInfo))
										<td>{{$doc->docBasicInfo->degree}}</td>
									@endif
								</tr>
							</table>
						</div>
					</div>

					<div class="col-sm-12">
						<br>
						<label for="">Select Hospital's Info</label>
						<br>
						@include('includes.errors')
						{{Form::open(['method'=>'POST','action'=>'Hospital\DoctorsController@sendDocRequest'])}}
						{{Form::hidden('doc_id',$doc->user_id)}}
						<label for="">Branch</label>
						{{Form::select('branch_id',[''=>'Choose']+$branches,null,['class'=>'form-control'])}}
						<label for="">Departmetn</label>
						{{Form::select('dept_id',[''=>'Choose']+$depts,null,['class'=>'form-control'])}}
						<br>
						{{Form::submit('Send Request',['class'=>'btn btn-primary'])}}
						{{Form::close()}}
					</div>

				</div>

			</div>
		@endif
	</div>
@endsection
