@extends('layouts.loginaboutusnavebar')

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
                  <span class="card-title center">Ramil De Silva (CEO and Founder) </span>
                <p class=" center">Ramil (@Ramil) is the CEO and founder of lifewithgoals. He is responsible for the final decisions on all the design outcomes made by the company, overall vision, strategy and day to day operations.Ramil believes in simplicity and user experience coupled with the most advanced technology will allow people spend their time qualitatively. His focus is to couple good engineering with beauty to create consumables.
Prior to founding lifewithgoals, Ramil was engaged in multiple large scale national and international HR IT implementations and change management strategy for 14 years. This lead Ramil to think out of the box and enable goal setting to be social and fun loving process.</p>
              </div>
            </div>
          </div>
          <div class="col s12 m2">
            <div class="card">
              <div class="card-image " >
                <img src="{{asset('avatars/2.png')}}" class="circle "  >
              </div>
              <div class="card-content">
                  <span class="card-title center">Darshan Samanpura (Technology Consultant)</span>
                <p class="center">Darshana (@darshana) is the escalation point  of any technical issues related to lifewithgoals. Darshana has been a pivotal part of success in life with goals engineering team. Darshana picked up the best software engineers with intelligence and aptitude and formulated the core engineering team
Prior to founding lifewithgoals, Darshana has been heading the technology in few successful start ups. He enjoys helping companies come through the obstacles limited by technology and offering working solutions.  </p>
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
                <img src="{{asset('avatars/sanka.png')}}" class="circle "  >
              </div>
              <div class="card-content">
                  <span class="card-title center">Web Developer and Web Designer</span>
                <p class=" center">Sanka Rajapaksha is an undergraduate in Software Engineering at NSBM. He joined Lifewithgoals.com upon conviced by Sagi.He likes to blog and research on new technology.He is not doing what everyone else does,he has unique ideas.He always concerns best ideas with productivity tips.</p>
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
                  He is in strive to create visually appealing for the site that feature user-friendly design and clear navigation.</p>
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
