@if (count($errors))
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

		@foreach ($errors->all() as $error)
			<li>
				{{$error}}
			</li>
		@endforeach
	</div>
@endif

@if (Session::has('message'))
	<div class="alert alert-warning alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<li>
			{{Session::get('message')}}
		</li>
	</div>
@endif
