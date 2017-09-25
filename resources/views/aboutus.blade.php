@extends('layouts.navbar')

@section('content')




  <!-- /head -->
  <br>
  <div class="card">

    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width blue-text darken-4">
        <li class="tab blue-text darken-4"><a href="#aboutUs"  class="active">About us</a></li>
        <li class="tab"><a href="#support">Support</a></li>
        {{-- <li class="tab"><a href="#press">Press</a></li> --}}
        <li class="tab"><a href="#workWithUs">Work with us</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
      <div id="aboutUs">



        <div class="col s12 m12">
          <div class="card blue lighten-1 center">
            <div class="card-content white-text ">
              <span class="card-title "><p class="flow-text ">As a startup, our vision is to connect people with common goals to achieve greater success or people to work through a goal they like and share the success to inspire other people.
  We are a young bunch of IT professional those like to think differently with a mentality of innovation.
  </p></span>

            </div>

          </div>
        </div>

        <p class="flow-text center"><b>Our Team</b></p><br>

        <div class="container-fluid">

        <center>
        <div class="row">
          <div class="col m1"></div>
          <div class="col s12 m2">
            <div class="card">
              <div class="card-image " >
                <img src="{{asset('avatars/1.png')}}" class="circle "  >
              </div>
              <div class="card-content">
                  <span class="card-title center">CEO and Founder</span>
                <p class=" center">Ramil De Silva has been in the IT industry for almost 14 years and the founder of Lifewithgoals.com idea.
                  He looks after the operations overall Ramil is a specialist in the HCM/IDAM aspect of ERP implementations</p>
              </div>
            </div>
          </div>
          <div class="col s12 m2">
            <div class="card">
              <div class="card-image " >
                <img src="{{asset('avatars/2.png')}}" class="circle "  >
              </div>
              <div class="card-content">
                  <span class="card-title center"> Consultant </span>
                <p class="center"> Darshana Samanpura is a seasoned technical expert in the web technologies. Darshana joined to form Lifewithgoals.com with Ramil
                  and is an integral part of the team. Darshana leads all technical solutions related to Lifewithgoals.com  </p>
              </div>
            </div>
          </div>
          <div class="col s12 m2">
            <div class="card">
              <div class="card-image " >
                <img src="{{asset('avatars/3.png')}}" class="circle "  >
              </div>
              <div class="card-content">
                  <span class="card-title center">Web Developer and Web Designer</span>
                <p class=" center">Sagi Lorenzo Amarasiri  speaks 3 languages fluently (Sinhalese, Italian and English) and is one of the main brains developing the server side scripts for Lifewithgoals.com. He also follows his digree in Software
                   Engineering at NSBM. He always thinks there is a functionality missing to make a this a fun full site for a user.</p>
              </div>
            </div>
          </div>
          <div class="col s12 m2">
            <div class="card">
              <div class="card-image " >
                <img src="{{asset('avatars/6.jpg')}}" class="circle "  >
              </div>
              <div class="card-content">
                  <span class="card-title center">Web Designer</span>
                <p class=" center">Chamaka Munasinghe is a graduate in Software Engineering at SLIIT. He joined Lifewithgoals.com upon conviced by Sagi.He involves uderstanding the look, layout, and features of the website.He works with development team for keeping the site up-to-date and prioritizing needs, among other tasks.</p>
              </div>
            </div>
          </div>
          <div class="col s12 m2">
            <div class="card">
              <div class="card-image " >
                <img src="{{asset('avatars/4.jpg')}}" class="circle "  >
              </div>
              <div class="card-content">
                  <span class="card-title center">Web Developer and Web Designer</span>
                <p class=" center">Chirath Perera is an undergraduate in Software Engineering at NSBM. He joined Lifewithgoals.com upon conviced by Sagi and is the main brain designing the user interface for the website.
                  He is strive to create visually appealing for the site that feature user-friendly design and clear navigation. </p>
              </div>
            </div>
          </div>

          <div class="col m1"></div>
          </div>
        </center>
          </div>


      </div>
      <div id="support"><p class="flow-text center">If you want to send us notices or service of process, please contact us via <br>
 <a href="mailto:contactus@Lifewithgoals.com">contactus@Lifewithgoals.com</a></p></div>
      {{-- <div id="press">Test 3</div> --}}
      <div id="workWithUs">  <div class="col s12 m12">
          <div class="card blue lighten-1 center">
            <div class="card-content white-text ">
              <span class="card-title "><p class="flow-text ">We do not have any openings yet <br> But keep in touch with us for more opportunities
  </p></span>

            </div>

          </div>
        </div></div>
    </div>
  </div>

@endsection
