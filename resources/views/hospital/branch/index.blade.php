@extends('layouts.hospital');
@section('assets')
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script
  src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet"
  href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

@endsection
@section('content')
  <div class="col-sm-12">
    <div class="col-sm-12" style="padding-left:0">
      <a href="{{route('branch.create')}}" class="btn btn-primary">Add Branch</a>
      <hr>
    </div>
  </div>
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">Branchs</div>
      <div class="panel-body">
        @include('includes.errors')
        <table class="table" id="table">
          <thead>
            <tr>
              <th>Branch Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>About</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            @if (count($branches))
              @foreach ($branches as $branch)
                <tr class="item{{$branch->id}}">
                  <td>{{$branch->name}}</td>
                  <td>{{$branch->phone}}</td>
                  <td>{{$branch->address}}</td>
                  <td>{{$branch->about}}</td>

               <td><a class="btn btn-info" href="{{route('branch.edit',$branch->id)}}">Edit</a></td>
            <!-- <td><button id="{{$branch->user_id}}" onClick="reply_click(this.id)" type="button" name="button">Hello</button></td>
-->
                </tr>

              @endforeach
            @else
              <td colspan="3">No data found</td>
            @endif

          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">


@if (count($branches))
  <script>
  $(document).ready(function() {
    $('#table').DataTable();
  } );
  @endif

  </script>
@endsection
