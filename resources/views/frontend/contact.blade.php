@extends('frontend.frontmaster')

@section('content')


<main id="main">


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact my-5">
  
      <div class="container" data-aos="fade-up">

        <div class="row my-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form  method="POST" action="{{route('contact-store')}}" role="form">
                @csrf
                    
         @if(session()->has('status'))
         <div class="alert alert-success">
              {{ session()->get('status') }}
          </div>
         @endif

              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>

                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" required>
                  </div>

                  <div class="form-group mt-3 mt-md-0 col-md-12">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div>
              

              <div class="">
                  <input type="submit" name="btnSubmit" class="btn btn-success" value="Send Message"/> 

                </div>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection

