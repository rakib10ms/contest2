@extends('frontend.frontmaster')



@section('content')



 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h1>We Find Genius,<br>Show your Talent</h1>
    <h2>We are team of to hunt talented Contester</h2>
    <a href="{{url('/')}}" class="btn-get-started">Get Started</a>
  </div>
</section><!-- End Hero -->


 <!-- ======= Popular Courses Section ======= -->
 <section id="popular-courses" class="courses">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Contests</h2>
      <p>Running Contests</p>
    </div>

    <div class="row" data-aos="zoom-in" data-aos-delay="100">

      @forelse($contests as $contest)

      <div class="col-lg-3 col-md-4 ">
        <div class="course-item">
          <img src="{{asset('assets/uploads/contest/'.$contest->image)}}" class=""  style="width: 100%;object-fit:cover;height:150px;">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <a href="{{url('/all-runningContest',$contest->topic_id)}}">  <h4> {{$contest->topic_name}} </h4></a>
            </div>

            <h3><a>{{$contest->name}}</a></h3>
            <p>{{ Str::limit($contest->description, 100) }}</p>
            <div class="trainer align-items-center">
              <div class="trainer-profile d-flex justify-content-between align-items-center bg-light ">
                <i class="bx bx-calendar font-weight-bold">{{date('d-m-Y', strtotime($contest->start_date));}}</i>&nbsp; 
                &nbsp;&nbsp;
                <i class="bx bx-calendar-check  font-weight-bold ">{{date('d-m-Y', strtotime($contest->end_date));}}</i>&nbsp;   
              </div>
              <div class="trainer-rank d-flex align-items-center my-3">
               
                <a class="btn btn-success" href="{{route('contest-desc',$contest->id)}}">Full Bio</a>

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
</section><!-- End Popular Courses Section -->



</div>

@endsection



