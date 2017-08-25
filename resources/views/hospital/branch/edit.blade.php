@extends('layouts.hospital');
@section('content')
  <div class="col-sm-12">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">Update Branch</div>
        <div class="panel-body">
          @include('includes.errors')

          {{Form::model($branch,['method'=>'PUT','action'=>['Hospital\BranchsController@update',$branch->id]])}}
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
            <div class="pull-left">
              <input type="submit" class="btn btn-primary" name="submit" value="Update Branch">
              <a class="btn btn-default" href="{{route('branch.index')}}">Back</a>
            </div>
           </div>
        </form>

        <div class="pull-right">
          {{ Form::open(['method'=>'DELETE','action'=>['Hospital\BranchsController@destroy', $branch->id]])}}
          <input type="submit" name="delete" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
        </form>
    </div>
      </div>
    </div>
  </div>

  </div>
</div>
@endsection
