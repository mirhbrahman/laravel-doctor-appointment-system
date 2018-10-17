@extends('layouts.hospital')
@section('assets')
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script
  src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet"
  href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

@endsection
@section('content')


	<div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">Doctors</div>
      <div class="panel-body">
        @include('includes.errors')
        <table class="table table-striped" id="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Specialized</th>
              <th>Branch</th>
              <th>Department</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if (isset($doctors)&&count($doctors))
              @foreach ($doctors as $doctor)
                <tr class="item{{$doctor->id}}">
                  <td>{{$doctor->name}}</td>
                  <td>{{$doctor->email}}</td>
				  @if ($doctor->docBasicInfo)
				  	<td>{{$doctor->docBasicInfo->degree}}</td>
					@else
						<td>Not set yet</td>
				  @endif

				  <td>{{$doctor->branch->name}}</td>
                  <td>{{$doctor->dept->name}}</td>
                  @if ($doctor->status == 0)
                    <td>
                      <p class="btn btn-primary">Pending</p>
                    </td>
                  @elseif ($doctor->status == 2)
                    <td>
                      <p class="btn btn-danger">Rejacted</p>
                    </td>
                  @else
                    <td>
                      <a href="{{route('hosDoc.show',$doctor->id)}}" class="btn btn-info">View</a>
                  </td>
                  @endif

                </tr>

              @endforeach
            @else
              <td colspan="6">No data found</td>
            @endif

          </tbody>
        </table>
      </div>
    </div>

	@if ($doctors)
  <script>

  $(document).ready(function() {
    $('#table').DataTable();
  } );

  </script>
@endif
@endsection
