@extends('layouts.hospital');
@section('content')
  <div class="col-sm-12">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">Add Branch</div>
        <div class="panel-body">
          @include('includes.errors')

          {{Form::open(['method'=>'POST','action'=>'Hospital\BranchsController@store'])}}
          <div class="form-group">

            <label for="name">Branch Name:</label>
            {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Branch Name'])}}

			<label for="">Email</label>
			{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Branch Email'])!!}
            <label for="">Phone:</label>
            {{Form::number('phone',null,['class'=>'form-control','placeholder'=>'Phone'])}}

            <label for="">Address:</label>
            {{Form::textarea('address',null,['class'=>'form-control'])}}

            <label for="">About:</label>
            {{Form::textarea('about',null,['class'=>'form-control'])}}

            <br>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>

  </div>
</div>
@endsection
