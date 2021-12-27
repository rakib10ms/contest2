@extends('frontend.frontmaster')


@section('content')



<section id="popular-courses" class="courses">
  <div class="container my-5" >
    <div class="section-title">
      <h2>Category</h2>
      <p>{{$topicName['name']}}</p>
    </div>

<div class="row">

  @forelse($findContest as $contest)

  <div class="col-lg-3 col-md-4 ">
    <div class="course-item">
      <img src="{{asset('assets/uploads/contest/'.$contest->image)}}" style="width: 100%;object-fit:cover;height:150px;">
      <div class="course-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <a href="{{url('/all-runningContest',$contest->topic_id)}}"><h4> {{$contest->topic_name}} </h4></a>
        </div>

        <h3><a href="">{{$contest->name}}</a></h3>
        <p>{{ Str::limit($contest->description, 100) }}</p>
        <div class="trainer align-items-center">
          <div class="trainer-profile d-flex justify-content-between align-items-center bg-light ">
            <i class="bx bx-calendar  font-weight-bold">{{date('d-m-Y', strtotime($contest->start_date));}}</i>&nbsp; 
            &nbsp;&nbsp;
            <i class="bx bx-calendar-check font-weight-bold">{{date('d-m-Y', strtotime($contest->end_date));}}</i>&nbsp;   
          </div>
          <div class="trainer-rank d-flex align-items-center">
           
            <a href="{{route('contest-desc',$contest->id)}}" class="btn btn-success text-white btn-block mt-3 "><i class="fa fa-trophy fa-2x"> </i><b>Full Bio </b> </a>


          </div>
        </div>
      </div>
    </div>
  </div> <!-- End Course Item-->

  @empty
  <div class="jumbotron bg-light col-md-10">
    <h1 class="display-4">Right No contest Available...!</h1>
    <p class="lead">There will be a upcomming contest... please eyes on there</p>
 
  </div>
  @endforelse

</div>
</div>
</section>

@endsection

