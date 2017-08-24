@extends('layouts.hospital')

@section('content')
	<div class="col-sm-12">
		<li>
			<a href="{{ route('logout') }}"
				onclick="event.preventDefault();
						 document.getElementById('logout-form').submit();">
				Logout
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</li>
	</div>

	<div class="col-sm-12">
		<ul>
			<li>
				<a href="{{route('hosBasicInfo.index')}}">Basic Info</a>
			</li>
		</ul>
	</div>

@endsection
