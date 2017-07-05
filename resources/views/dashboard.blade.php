@extends('layouts.navbar')

@section('content')

    <!--add goal form -->
      <div id="addgoal" class="modal modal-fixed-footer">
    <div class="modal-content" style="text-align:center;">
      <h4>Add a Goal</h4>
      <form enctype="multipart/form-data" action="{{route('dashboard')}}" method="post" id="addgoalform">
{{ csrf_field() }}
        <div class="collection">
          <a href="#!" class="collection-item">
            <div class="input-field col s6">
              <input id="goalname" name="goalname" type="text" class="validate" required>
              <label for="goalname">Goal Name</label>
            </div>
          </a>
          <a href="#!" class="collection-item">
            <div class="input-field col s6">
              <input id="goalintent" name="goalintent" type="text" class="validate" required>
              <label for="goalintent">Goal Intent</label>
            </div>
          </a>
          <a href="#!" class="collection-item">
                <p class="center-align">
                  <input class="with-gap" name="goalpriority" type="radio" value="high" id="HighPriority" checked="checked" />
                  <label for="HighPriority">High Priority</label>
                </p>
                <p class="center-align">
                  <input class="with-gap" name="goalpriority" type="radio" value="medium" id="MediumPriority" />
                  <label for="MediumPriority">Medium Priority</label>
                </p>
                <p class="center-align">
                  <input class="with-gap" name="goalpriority" type="radio" value="low" id="LowPriority"  />
                  <label for="LowPriority">Low Priority</label>
                </p>
          </a>
          <a href="#!" class="collection-item">
            <div class="input-field col s12">
                <select name="goalcategory">
                  <option value="non specified" disabled selected>select goal category</option>
                                                         <option value="business">business</option>
                                                         <option value="education">education</option>
                                                         <option value="fitness">fitness</option>
                                                         <option value="Health and fitness">Health and fitnessitness</option>
                                                         <option value="Get Educated and professional memberships">Get Educated and professional memberships</option>
                                                         <option value=" Financial stability and Gains"> Financial stability and Gains</option>
                                                         <option value="Construct my first house">Construct my first house</option>
                                                         <option value="Buy a car">Buy a car</option>
                                                         <option value=" Find a partner"> Find a partner</option>
                                                         <option value="Travel around and see the world">Travel around and see the world</option>
                                                         <option value="Skill up as a professional">Skill up as a professional</option>
                                                         <option value="Sports and Aquatics">Sports and Aquatics</option>
                                                         <option value="Ignite a concept">Ignite a concept</option>
                </select>
                <label>Goal Category</label>
              </div>
              <script type="text/javascript">
              $(document).ready(function() {
                  $('select').material_select();
                });
              </script>
          </a>
          <a href="#!" class="collection-item">
            <div class="mdl-textfield mdl-js-textfield">
              <label  style="color:#565656;font-size:12pt;"for="goalstartdate">Goal Start-Date</label>
              <input class="mdl-textfield__input" style="color:#565656;" type="date" id="goalstartdate" name="goalstartdate" required>
            </div>
          </a>
          <a href="#!" class="collection-item">
            <div class="mdl-textfield mdl-js-textfield">
              <label  style="color:#565656;font-size:12pt;"for="goalenddate">Goal End-Date</label>
              <input class="mdl-textfield__input" style="color:#565656;" type="date" id="goalenddate" name="goalenddate" required>
            </div>
          </a>
          <a href="#!" class="collection-item">
            <div class="file-field input-field">
              <div class="btn">
                <span>Upload a Goal Picture</span>
                <input type="file" name="goalpicture">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" name="goalpicturepath">
              </div>
            </div>
          </a>
        </div>
<input type="text" class="hidden" name="action" value="2">
    </div>
    <div class="modal-footer">
      <a href="#!" id="cancelmodalbtn" style="margin-right:10px;margin-left:10px;"class="model-close waves-effectwaves-effect waves-light btn">Not Now</a>
      <button type="submit" id="addgoalbtn" style="margin-right:10px;margin-left:10px;"class="modal-action waves-effectwaves-effect waves-light btn">Add Goal</button>
    </form>
    </div>
  </div>
  <script>
  $(document).ready(function(){
   // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
   document.getElementById('view-source').addEventListener("click",function(event){
     event.preventDefault();
     $('.modal').modal();
     $('#addgoal').modal('open');
   });
   document.getElementById('cancelmodalbtn').addEventListener("click",function(event){
     event.preventDefault();
     $('.modal').modal();
     $('#addgoal').modal('close');
   });

   addgoalbtn

 });
  </script>
      <!--end of add goal -->


    <div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">

        </br>
        </br>
        </br>
        </br>
        </br>
        <div class="mdl-grid portfolio-max-width" id="goaldisplay">
          @if($goal->isEmpty())
            <div class="container center" style="padding-top:20px">
         <div class="col s12 m12">
           <div class="card blue-grey darken-1">
             <div class="card-content white-text">
               <!-- <span class="card-title">Card Title</span> -->
               <div class="hide-on-small-only">
                 <img src="welcome.png" alt="">
               </div>
               <div class="hide-on-med-and-up">
                 <img src="{{asset('welcome.png')}}" alt="" width="293px" height="98px">
               </div>
             </div>
             <div class="card-action">
                <a href="#addgoal">Click to create a goal</a>

              </div>

           </div>
         </div>
</div>

          @else
          {{-- starrrrrrrrrrrrrrrrrrrtttttttttttttttttt --}}
             <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
              <tbody>
                <tr>
                 <td class="mdl-data-table__cell--non-numeric"><b>Pinned Goals</b></td>
                </tr>
              </tbody>
             </table>
            <!-- the main goal that will be repeated -->
            @foreach ($goal as $goals)
              @if($goals->pinned==1)
            <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
              <div class="containerholder">

              <div class="overlay">
              <!-- what goes in the slide up -->
              <div class="text">
                <!-- repeatable List for tasks -->
                <ul class="demo-list-item mdl-list">
                  @foreach ($task as $tasks)
                    @if($goals->goalid==$tasks->goalid)
                  <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content" style="color:white;">
                      {{$tasks->taskname}}
                    </span>
                  </li>
                  @endif
                  @endforeach
                  @if ($goals->gottasks==0)
                      <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content" style="color:white;">
                        No Tasks yet
                    </span>
                  </li>
                  @endif
                </ul>

              </div>

              </div>
            <!-- <div id="some-div"> -->
                <div class="mdl-card__media">
                    <img class="article-image" src="{{asset('uploads/goals/'.$goals->goalpicturetwo)}}" border="0" alt="" >
                </div>
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">{{$goals->goalname}}</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  Priority:{{$goals->goalpriority}}<br>
                  End date:{{$goals->goalenddate}}<br>
                  Start date:{{$goals->goalstartdate}}<br>
                  Authorization:{{$goals->goalauthorization}}<br>
                </div>


             <!-- <span id="some-element">
               sdfsfsdfsdfsffdsfsfd
             </span> -->
               <!-- </div> -->
             </div>
             <div class="mdl-card__actions mdl-card--border">

             <!--  Progress Bar -->
             <div id="{{$goals->goalid}}" class="mdl-progress mdl-js-progress"></div><br>

             <script>

             // javascript for the progressbar needs to repeat for all goals
                 document.querySelector('#{{$goals->goalid}}').addEventListener('mdl-componentupgraded', function() {
                   this.MaterialProgress.setProgress({{$goals->goalcompletedpercentage}});
                 });

             </script>
               <form method="post" action="{{ route('dashboard') }}" id="unpin">
                 {{ csrf_field() }}
               <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="{{ url('/goal/'.$goals->goalid) }}">Go to Goal</a>&nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp
               <input type="text" class="hidden" name="pinned" value="0">
               <input type="text" class="hidden" name="goalid" value="{{$goals->goalid}}">
               <input type="text" class="hidden" name="email" value="{{$email}}">
               <input type="text" class="hidden" name="action" value="1">
               <button type="submit"  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" id="unpinbtn"><i class="material-icons">pin_drop</i></button>
             </form>
             <form class="" action="{{route('deletegoal')}}" method="post">
               {{csrf_field()}}
               <button type="submit" style="border:none;background-color:inherit;"><input type="hidden" name="goalid" value="{{$goals->goalid}}"><i class="material-icons">delete</i></button>
             </form>
             <script>
             //ajax unpin
            //  window.onload=function(){
            //      document.getElementById("unpinbtn").addEventListener("click", function(event) {
            //         event.preventDefault();
            //         unpin();
            //       });
            //  }
             //
            //  function disableSubmitButton() {
            //    document.getElementById("unpinbtn").disabled = true;
            //  }
             //
            //  function enableSubmitButton() {
            //    document.getElementById("unpinbtn").disabled = false;
            //  }
             //
            //  function unpin(){
            //  var form = document.getElementById("unpin");
            //  var action = form.getAttribute("action");
             //
            //  var form_data = new FormData(form);
             //
            //  var xhr = new XMLHttpRequest();
            //  xhr.open('POST', action, true);
            //  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            //  xhr.send(form_data);
            //  xhr.onreadystatechange = function () {
            //    if(xhr.readyState == 4 && xhr.status == 200) {
            //      enableSubmitButton();
            //      $( "#goaldisplay" ).load(window.location.href + " #goaldisplay" );
            //    }
            //  };
             //
            //  }
             </script>
           </div>
          </div>
      @endif
    @endforeach
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
       <tbody>
         <tr>
          <td class="mdl-data-table__cell--non-numeric"><b>Other</b></td>
         </tr>
       </tbody>
      </table>
      @foreach ($goal as $goals)
      @if ($goals->pinned==0)
          <!-- ////////////////////////////////// -->
            <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
              <div class="containerholder">

              <div class="overlay">
              <!-- what goes in the slide up -->
              <div class="text">
                <!-- repeatable List for tasks -->
                <ul class="demo-list-item mdl-list">
                  @foreach ($task as $tasks)
                    @if($goals->goalid==$tasks->goalid)
                  <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content" style="color:white;">
                      {{$tasks->taskname}}
                    </span>
                  </li>
                  @endif
                  @endforeach
                  @if ($goals->gottasks==0)
                      <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content" style="color:white;">
                        No Tasks yet
                    </span>
                  </li>
                  @endif
                </ul>
                                <i class="material-icons">comment</i> &nbsp   &nbsp 22
              </div>

              </div>
            <!-- <div id="some-div"> -->
                <div class="mdl-card__media">
                    <img class="article-image" src="{{asset('uploads/goals/'.$goals->goalpicturetwo)}}" border="0" alt="">
                </div>
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">{{$goals->goalname}}</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  Priority:{{$goals->goalpriority}}<br>
                  End date:{{$goals->goalenddate}}
                </div>

             <!-- <span id="some-element">
               sdfsfsdfsdfsffdsfsfd
             </span> -->
               <!-- </div> -->
             </div>
             <div class="mdl-card__actions mdl-card--border">

             <!--  Progress Bar -->
             <div id="{{$goals->goalid}}" class="mdl-progress mdl-js-progress"></div><br>

             <script>
             // javascript for the progressbar needs to repeat for all goals
                 document.querySelector('#{{$goals->goalid}}').addEventListener('mdl-componentupgraded', function() {
                   this.MaterialProgress.setProgress({{$goals->goalcompletedpercentage}});
                 });
             </script>
             <form method="post" action="{{ route('dashboard') }}" id="pin">
               {{ csrf_field() }}
             <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="{{ url('/goal/'.$goals->goalid) }}">Go to Goal</a>&nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp
             <input type="text" class="hidden" name="pinned" value="1">
             <input type="text" class="hidden" name="goalid" value="{{$goals->goalid}}">
             <input type="text" class="hidden" name="email" value="{{$email}}">
             <input type="text" class="hidden" name="action" value="1">
             <button type="submit"  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent"><i class="material-icons">pin_drop</i></button>
           </form>
           </div>
          </div>
        @endif
        @endforeach
      @endif
       {{-- eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeennnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndddddddddddddddddddddd --}}
            <div id="overlay2"></div>



        </div>


        <div class="fab">
          <button id="view-source" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></button>
        </div>





      </main>
      </div>


  <!--  Scripts-->


@endsection
