@extends('layouts.search')

@section('content')
	<div class="col-sm-12">
		<p style="text-align:center"><label for="">Find Your Doctor</label></p>
		<div class="col-sm-4">
			<a href="{{route('search.hospitals')}}"><i class="fa fa-search fa-fw"></i> By Hospital</a>
		</div>
		<div class="col-sm-4">

		</div>
		<div class="col-sm-4">

		</div>
	</div>
@endsection
