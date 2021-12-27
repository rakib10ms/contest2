@extends('backend.master')
@section('section')

<h1> ADD CONTEST NOTICE</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
    @endif
    
	<form action="{{route('contest-notice.store')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-12">
  

    <div class="form-group  col-md-10">
    <label for="exampleFormControlTextarea1">Your Description*</label>
    <textarea class="form-control" rows="5"  name="description"></textarea>
 
   </div>


 <div class="form-group">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</div>


</form>






@endsection