@extends('frontend.frontmaster')

@section('content')
<style type="text/css">
  body{
  background:background-color: #b8c6db;
background-image: linear-gradient(315deg, #b8c6db 0%, #f5f7fa 74%);
}
</style>
<div class="container">
	<div class="row">


		<div class="col-md-10 mt-5 card-body ">
             @if(Session('status'))
                      <div class="form-group col-sm-4 col-md-8">
                      <div class="alert alert-danger" role="alert">
                               {{ Session('status') }} 
                          </div>
                      </div>
                      @endif


                      @if($errors->any())
                      @foreach($errors->all() as $error)
                      <div class="form-group col-sm-4 col-md-8">
                      <div class="alert alert-danger" role="alert">
                               {{ $error }}
                          </div>
                      </div>
                      @endforeach
                      @endif

         <div class="row justify-content-center ">
          <div class="col-md-8">
            <span class="anchor" id="formContact"></span>
            <!-- form contact -->
            <div class="card card-outline-secondary " style="background:white">
              <div class="card-header">
                <h3 class="mb-0">Edit Form</h3>
              </div>
              <div class="card-body">
            
                <form autocomplete="off" class="form" role="form" method="POST" enctype="multipart/form-data" action="{{route('userConform-update',$contestformEdit->id)}}">
                	@csrf

                  <input type="hidden" name="contest_id" value="{{$contestformEdit->contest_id}}">
                  <input type="hidden" name="topic_id" value="{{$contestformEdit->topic_id}}">
                  <fieldset>
                    <label class="mb-0" for="name2">Name</label>
                    <div class="row mb-1">
                      <div class="col-lg-12">
                        <input class="form-control" id="name2" name="name2" readonly type="text" value="{{$contestformEdit->user_name}}">
                      </div>
                    </div>
										<label class="mb-0" for="email2">Email</label>
                    <div class="row mb-1">
                      <div class="col-lg-12">
                        <input class="form-control" id="email2" name="email2" readonly value="{{$contestformEdit->user_email}}" type="text">
                      </div>
                    </div>
							<label class="mb-0" for="file">File</label>

                         <div class="row mb-1">
                      <div class="col-lg-12">
                        {{$contestformEdit->file}}
                        <input class="form-control" id="file" name="file"  type="file"  />
                      </div>
                    </div>
					<label class="mb-0" for="message2">Message</label>
                    <div class="row mb-1">
                      <div class="col-lg-12">
                        <textarea class="form-control" id="message2" name="notes"  rows="6">{{$contestformEdit->notes}}
                        </textarea>
                      </div>
                    </div>
										<button class="btn btn-primary btn-lg float-right" type="submit">Submit</button>
                  </fieldset>
                </form>


              </div>
            </div><!-- /form contact -->
          </div><!--/col-->
        </div>
</div>
</div>
</div>
@endsection


