@extends('backend.master')
<style type="text/css">
  .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 32px;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 50px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 80px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 32px;
  }
  .wrap>div>div{
    height: 200px;
  }
</style>
<style type="text/css">
  /* general structure
==============================*/

:root {
  --bg-clr: #ebebeb;
  --primary-clr: #006494;
  --secondary-clr: #c2244e;
  --light-clr: #ffffff;
  --dark-clr: #000000;
  --v-dark-gray-clr: #484848;
  --dark-gray-clr: #8f8f8f;
  --gray-clr: #b3b3b3;
  --lgh-gray-clr: #cccccc;
  --v-lgh-gray-clr: #d9d9d9;
}

*, *::before, *::after {
  box-sizing: border-box;
}
ul, ol, li, h1, h2, h3, h4, h5, h6, body, html, p {
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Roboto', sans-serif;
  font-size: 18px;
  color: #1f1f1f;
  min-height: 100%;
  background: #ebebeb;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
h1, h2, h3, h4, h5, h6 {
  font-weight: 700;
  line-height: 1.15;
}
h2.border-line, h3.border-line {
  overflow: hidden;
  margin: .3em 0 .7em;
}
h2.border-line:after {
  height: 2px;
}
h2.border-line::after, h3.border-line::after {
  content: '';
  display: inline-block;
  width: 100%;
  background-color: #ccc;
  margin-right: -100%;
  margin-left: 20px;
  vertical-align: middle;
}
a {
  color: var(--primary-clr);
  text-decoration: none;
  transition: all 0.2s ease-in-out;
}
a:hover { color: #971c3d; }

img {max-width: 100%;}

.container, #footer-content { 
  width: 100%; 
  max-width: 960px; 
  padding: 2em 20px; 
  margin: 0 auto;
}

.wsite-button {font-size:14px;}

.spacer-toc { height: 1.5em; }
.spacer-toc .fa { font-size: 1.4em; color: #ccc; }

@media (max-width: 992px) {
  .spacer-toc { height: 80px; }
  .spacer-toc .fa { font-size: 2.5em; }
}

/* event card
============================*/

.event {
  max-width: 440px;
  display: flex;
  flex-direction: column;
  background: var(--light-clr);
  color: var(--dark-clr);
  font-size: 15px;
  line-height: 1.25;
  padding: 10px;
  border: 1px solid var(--lgh-gray-clr);
  border-radius: 3px;
  transition: 0.3s ease;
  position: relative;
}
.event:hover {
  box-shadow: 0 8px 8px -6px var(--v-dark-gray-clr);
  border-color: var(--dark-clr);
}
.event:hover .event--date {
  background: var(--dark-clr);
  color: var(--gray-clr);
}
.event:hover .event--date span:nth-child(2) {
  color: var(--light-clr);
}
.event:hover .event--content {
  background: var(--light-clr);
}
.event:hover .event--content-program a,
.event:hover .event--content-social a {
  background: var(--bg-clr);
}
.event:hover .event--content-social a:hover {
  background: var(--primary-clr);
  color: var(--light-clr);
}
.event:hover .event--img img {
  transform: scale(1.2);
}

.event--date {
  display: flex;
  justify-content: flex-start;
  align-items: baseline;
  flex-wrap: wrap;
  padding: 15px;
  color: var(--dark-gray-clr);
  font-weight: 500;
  text-transform: uppercase;
  position: relative;
  transition: .35s;
}
.event--date::after {
  content: '';
  height: 1px;
  width: 100%;
  background: var(--dark-clr);
  position: absolute;
  bottom: 0;
  left: 0;
}
.event--date span + span {
  margin-left: 5px;
}
.event--date span:nth-child(2) {
  font-weight: 500;
  font-size: 1.375rem;
  color: var(--dark-clr);
  order: -1;
  margin-right: 5px;
  margin-left: 0;
}
.event--date span:nth-child(3) {
  margin-right: 12px;
}
.event--date span:nth-child(4) {
  margin-left: 0;
}
.event--date span:nth-child(4)::before {
  content: "\f041";
  font-family: 'FontAwesome';
  padding-right: 4px;
  color: var(--secondary-clr);
}
.event--img {
  display: block;
  width: 100%;
  height: 154px;
  overflow: hidden;
  transition: 0.3s ease;
}
.event--img img {
  width: 100%;
  height: auto;
  object-fit: cover;
  transition: .5s;
}
.event--content {
  padding: 15px;
  text-align: left;
  background: var(--bg-clr);
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  transition: .35s;
  position: relative;
}
.event--content > * {margin: 0; margin-bottom: 10px;}
.event--content > *:last-child {margin-bottom: 0;}

.event--content h2 {
  font-weight:500;
  font-size: 1.375rem;
  letter-spacing: -.12px;
}
.event--content a {
  color: inherit;
}
.event--content a:hover {
  color: var(--primary-clr);
}
.event--content h2 > a[href]::after {
  content: "\f08e";
  font-family: 'FontAwesome';
  padding: 0 3px 0 6px;
  font-weight: normal;
  font-size: .7em;
}
.event--content h2.canceled,
.event--content-canceled {
  color: var(--secondary-clr);
}
.event--content-info {
  line-height: 1.6;
  display: flex;
  flex-wrap: wrap;
}
.event--content-info > div {
  margin-right: 16px;
}
.event--content-tickets a {
  background: var(--primary-clr);
  color: var(--light-clr);
  padding: 3px 11px;
  border-radius: 3px;
}
.event--content-tickets a:hover {
  background: var(--bg-clr);
}
.event--content-ensemble {
  font-weight: 500;
  margin-top: auto;
}
.event--content-program {
  margin-top: 6px;
}
.event--content-program a {
  display: inline-block;
  background: var(--light-clr);
  padding: 6px 13px;
  border-radius: 15px;
}
.event--content-canceled::before,
.event--content-program a::before,
.event--content-info time::before,
.event--content-tickets a::before,
.event--content-price::before {
  font-family: 'FontAwesome';
  padding-right: 6px;
}
.event--content-canceled::before {content: "\f273";}
.event--content-program a::before {content: "\f02d";}
.event--content-info time::before {content:"\f017";}
.event--content-price::before {content: "\f153";}
.event--content-tickets a::before {content: "\f145";}

.event--content-social {
  font-size: 1.2rem;
  margin-top: 10px;
  display: flex;
  transition: .3s;
}
.event--content-social a {
  width: 40px;
  height: 40px;
  margin-right: 16px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  background: var(--light-clr);
  border-radius: 50%;
}

@media (min-width:801px) {
  .event {
    max-width: 100%;
    flex-direction: row;
    padding: 15px;
    margin-bottom: 20px;
  }
  .event--date {
    flex-direction: column;
    align-items: center;
    flex-basis: 148px;
    text-align: center;
    font-size: .84rem;
    line-height: 1;
    padding: 15px 5px;
  }
  .event--date::after {
    height: 100%;
    width: 1px;
    top: 0;
  }
  .event--date span + span {
    margin: 0;
    margin-top: 2px;
  }
  .event--date span:nth-child(2) {
    order: 0;
    margin-right: 0;
    font-size: 3rem;
  }
  .event--date span.date-md {
    font-size: 2.35rem;
  }
  .event--date span.date-sm {
    font-size: 1.625rem;
  }
  .event--date span:nth-child(3) {
    margin-right: 0;
    margin-bottom: 10px;
  }
  .event--date span:nth-child(4) {
    margin-top: auto;
  }
  .event--img {
    order: 1;
    margin-left: 15px;
    width: 100px;
    height: auto;
    max-height: 200px;
    max-height: max-content;
    display: flex;
  }
  .event--img a {
    display: flex;
  }
  .event--content {
    flex: 2 0 0;
    padding: 15px 20px;
  }
  .event--content > *:not(.event--content-social) {
    max-width: 96%;
  }
  .event--content h2 {
    font-size: 1.5rem;
  }
  .event--content-social {
    position: absolute;
    top: 0;
    right: 15px;
    margin-top: 0;
    height: 100%;
    font-size: 1rem;
    flex-direction: column;
    justify-content: center;
  }
  .event:hover .event--content-social {
    right: 0;
  }
  .event--content-social a {
    margin: 8px 0;
    width: 34px;
    height: 34px;
  }
}

@media (min-width:600px) and (max-width:800px) {
  .eventWrapper {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .event {
    width: 48%;
    margin-bottom: 35px;
  }
  .event--img {
    height: 140px;
  }
}

@media (max-width:599px) {
  .event {
    margin: 0 auto 35px;
  }
}
</style>

@section('section')
    <div class="row wrap">
    <div class="col-md-4">
      <div class="card-counter primary">
        <i class="fa fa-users"></i>
        <span class="count-numbers">{{$allUsers}}</span>
        <span class="count-name">TOTAL USERS</span>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-counter danger">
        <i class="fa fa-trophy"></i>
        <span class="count-numbers">{{$allParticipates}}</span>
        <span class="count-name">TOTAL PARTICIPATES</span>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-counter success">
        <i class="fa fa-trophy"></i>
        <span class="count-numbers">{{$allWinners}}</span>
        <span class="count-name">TOTAL WINNERS</span>
      </div>
    </div>


  </div>



<!-- TIMELINE -->

<div class="wrapper p-5 col-md-12">
<div id="2020" class="spacer-toc"><i class="fa fa-calendar"></i></div>
<h2 class="border-line">{{ now()->year }}</h2>

<!-- 2020 -->

<div class="eventWrapper">
  <div class="event">
    <div class="event--img">
      <a href="" onclick="if (!lightboxLoaded) return false" class="w-fancybox">
        <img src="https://www.mlegakis.com/files/theme/concert-img/20200102-new-year-s-concert-dionysos.jpg" title="Πρωτοχρονιάτικη Συναυλία - Gala Όπερας Δήμου Διονύσου" alt="Πρωτοχρονιάτικη Συναυλία - Gala Όπερας Δήμου Διονύσου">
      </a>
    </div>
    <div class="event--date"><span>Event</span><span>2</span><span>2021</span><span>FROM YOU</span></div>
    <div class="event--content">
      <h2><a href="" title="Πρωτοχρονιάτικη Συναυλία - Gala Όπερας Δήμου Διονύσου">All Events in here..You can find of your own</a></h2>
      <p class="event--content-hall">Recent Events is here !where you can find your event</p>
      <p class="event--content-ensemble">Ορχήστρα δωματίου NuovArte, Σολίστ</p>
    </div>  
  </div>
  <div class="event">
    <div class="event--img">
      <a href="" onclick="if (!lightboxLoaded) return false" class="w-fancybox">
        <img src="https://www.mlegakis.com/files/theme/concert-img/concert-canceled.jpg" title="concert canceled" alt="concert canceled">
      </a>
    </div>
    <div class="event--date"><span>ΜΑΡ</span><span>28</span><span>2021</span><span>NOTICES</span></div>
    <div class="event--content">
      <h2 class="canceled"><del>Folk Festival</del></h2>
      <p class="event--content-canceled">Canceled (Covid-19)</p>
      <p class="event--content-ensemble">Eklipsis vocal ensemble</p>
    </div>  
  </div>      
</div><!-- end eventWrapper  -->


<div class="wsite-spacer" style="height:4rem;"></div>
  

  
</div>
@endsection