@extends('layouts.navbar')

@section('content')

      @foreach ($goal as $goals)
      @endforeach
      @foreach ($user as $users)
          @endforeach
  <div id="addtaskmodal" class="modal modal-fixed-footer">
    <div class="modal-content" style="text-align:center;">
      <h4>Add a Task</h4>
      <form action="{{route('goal')}}" method="post" id="addtaskform">
{{ csrf_field() }}
        <input type="text" style="display:none;"class="hidden" value="{{$goals->goalid}}" name="goalid">
        <input type="text"style="display:none;" class="hidden" value="addtask" name="action">
        <input type="text" style="display:none;"class="hidden" value="{{$goals->goalauthorization}}" name="goalauthorization">
        <div class="collection">
          <a href="#!" class="collection-item">
            <div class="input-field col s6">
              <input class="validate" style="color:#565656;" type="text" id="taskname" name="taskname" required>
              <label style="color:#565656;"for="taskname">Task Name</label>
            </div>
          </a>
          <a href="#!" class="collection-item">
            <div class="input-field col s6">
              <input  style="color:#565656;" type="text" id="taskintent" name="taskintent" required>
              <label style="color:#565656;"for="taskintent">Task Intent</label>
            </div>
          </a>
          <a href="#!" class="collection-item">
            <p>
                 <input name="taskpriority" type="radio" id="priority1" />
                 <label for="priority1">high</label>
               </p>
               <p>
                 <input name="taskpriority" type="radio" id="priority2" />
                 <label for="priority2">medium</label>
               </p>
               <p>
                 <input  name="taskpriority" type="radio" id="priority3"  />
                 <label for="priority3">low</label>
               </p>
          </a>
          <a href="#!" class="collection-item">
            <div class="input-field col s6">
              <span  style="color:#565656;font-size:12pt;">Task Start-Date</span>
              <input  style="color:#565656;" type="date" id="taskstartdate" name="taskstartdate" required>
            </div>
          </a>
          <a href="#!" class="collection-item">
            <div class="input-field col s6">
              <span style="color:#565656;font-size:12pt;">Task End-Date</span>
              <input  style="color:#565656;" type="date" id="taskenddate" name="taskenddate" required>
            </div>
          </a>
        </div>

    </div>
    <div class="modal-footer">
      <button type="submit" id="addtaskbtn" style="margin-right:10px;margin-left:10px;"class="modal-action waves-effectwaves-effect waves-light btn">Add Task</button>
    </form>  <a href="#!" id="cancelmodalbtn" style="margin-right:10px;margin-left:10px;"class="model-close waves-effectwaves-effect waves-light btn">Not Now</a>
    </div>
    <script>
    document.getElementById("cancelmodalbtn").addEventListener("click",function(event){
      $('#addtaskmodal').modal('close');
    });
    // var addtaskbtn=document.getElementById('addtaskbtn');
    // addtaskbtn.addEventListener("click",function(event){
    //   event.preventDefault();
    //   addtask();
    // });
    // function addtask(){
    //  var form = document.getElementById("addtaskform");
    //  var action = form.getAttribute("action");
    //  var form_data = new FormData(form);
    //  var xhr = new XMLHttpRequest();
    //  xhr.open('POST', action, true);
    //  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    //  xhr.send(form_data);
    //  xhr.onreadystatechange = function () {
    //    if(xhr.readyState == 4 && xhr.status == 200) {
    //       var result = xhr.responseText;
    //       console.log('Result: ' + result);
    //       $('#addtaskmodal').modal('close');
    //       window.location.reload();
    //    }
    //  };
  //  }
    </script>
  </div>
<div>

</div>

<div class="container">
  <div class="row">
        <div class="col s12 m12">
          <div class="card ">
            <div class="card-content white-text" style="min-height:300px;background-image:url({{asset('uploads/goals/'.$goals->goalpictureone)}});" >
              <span class="card-title">{{$goals->goalname}}
                  <div class="c100 p50 big">
                      <span id="goalpercentage">{{$goals->goalcompletedpercentage}}%</span>
                      <div class="slice">
                          <div class="bar"></div>
                          <div class="fill"></div>
                      </div>
                 </div></span>

            </div>
            <div class="card-action ">
              <div class="row">
                <div class="col l6 center-align">
                  @if ($goals->goalauthorization!='creator')
                    <div class="chip">
                      <img src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" alt="Contact Person">
                      {{$users->fname}}&nbsp;{{$users->lname}}&nbsp;({{$goals->goalauthorization}})
                    </div>
                  @endif

                  {{-- To display orginal creator --}}
                  {{-- @if (($goals->goalauthorization="creator")&&($goals->email!=Auth::User()->email)) --}}
                  @foreach ($creator as $creators)
                    <div class="chip">
                      <img src="{{asset('uploads/avatars/'.$creators->avatar)}}" alt="Contact Person">
                      {{$creators->fname}}&nbsp;{{$creators->lname}}&nbsp;({{$creators->goalauthorization}})
                    </div>
                  @endforeach



                </div>
              </div>
                <div class="row center-align">
                  <div class="col l6">
                    <ul class="collapsible popout" data-collapsible="expandable">
                      <li>
                      <div class="collapsible-header">
                        <img class="icon icons8-Merge-Git-Filled" width="30" height="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAB0klEQVRIS+2XT07CUBDGv3mJkQRI6gmQE4gnsC4Ed3ACW04gnEA9gfUEtV5A3dm6EG8AJ9AbSEJJMCZvzDPR9C8+tdiFdt/5zXyd+WZKKOmhZdzKvru5WGCKUX9adH6Z4Oqe2xKCLgHaVEBmdsLAHhYJzwTXO94jgEYUJEHDuX/gFAVPgZW8aywekgBm3IeBZa4MDNM16uviKQUGrkPf6q0ODKDW8RwCDqMQJrkb3vRHKwWr4NXOxUCwPGbQI7O057f9cVFQFWfpONXanqpwFAbWcZHQf3BKzT8qNWEc+tbg15uLiBsz326WAMZO0T6tO04GEbaklNs6JqI2GxEdgWAw6GruW2dZamkZCBNNBfhUAoO8QCp4bd81icVdzGqBs6we0QIr56q33R5IOGo7KzdjJrU6P54wsE5qHe+KgG6ywtmz3EgeE9rg92DVvQubBLfAaCXAppp7IuwkwS8km4ubfizRL4OXdffbYgGfxqRmTMLAiiX5aXN9Z4SiK5UZk7zNlluxyp4gu2BMmflEp6M/EjVdo1KBkZQ3WkgmOOsQ0B0nXZXS4LJOn/KOPWUEbW+s3CoqW9G2mXvQE4nzdzjnuI/u9/yyZf76L8xPKtF99xVcbfQfFIlphQAAAABJRU5ErkJggg==">
                      </div>
                      <div class="collapsible-body">
                        <div>
                        @foreach ($aligned as $alignes)

                          <div class=" col s12 chip">
                            <img src="{{asset('uploads/avatars/'.$alignes->avatar)}}" alt="Contact Person"/>
                            <a id="test"href="{{url('/search/'.$alignes->id)}}">{{$alignes->fname}}&nbsp;{{$alignes->lname}}</a>
                            <i id="{{$alignes->email}}"class="close material-icons">close</i>
                          </div>
                          <form id="{{$alignes->id}}" action="{{route('deletealigned')}}" method="post">
                           {{ csrf_field() }}
                           <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                           <input type="hidden" name="email" value="{{$alignes->email}}">
                          </form>
                          <script type="text/javascript">
                            var deletealignedbtn=document.getElementById('{{$alignes->email}}');
                            deletealignedbtn.addEventListener("click",deletealignedfunction)
                            function deletealignedfunction() {
                            var form=document.getElementById('{{$alignes->id}}');
                            var action = form.getAttribute("action");
                            var form_data = new FormData(form);
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', action, true);
                            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                            xhr.send(form_data);
                            xhr.onreadystatechange = function () {
                              if(xhr.readyState == 4 && xhr.status == 200) {
                                 var result = xhr.responseText;
                                 console.log('Result: ' + result);
                                 document.getElementById("intentrow").style.display='block';
                              }
                            };
                          }
                          </script>
                        @endforeach
                      </div>
                        <div id="lis1"class="col s11">
                          <form class="inline" action="{{route('align')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                            <div class="input-field ">
                                      <input id="email" name="email" type="text" class="validate">
                                      <label for="email">email</label>
                                      <button type="submit"  class="btn btn-floating" name="button">
                                        <!-- Merge Git Filled icon by Icons8 -->
<img class="icon icons8-Merge-Git-Filled" width="30" height="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAADDUlEQVRIS8VXMUxTYRD+7iXgwCsUFyZAhUUTtA4OBhJxoBhYILogasukwgBGJYQFcJGYGHERtrYJBBcjiWjoI1FIRBMdKDC4gAGcWLTYsmjSM/fKq215bR+Pin/Spe+/7/vvv//uviNYXEUNPhcReUBwgeEkIpeYMnMIhDAYIWYO7Mx2hKxAUtZN9T6nWqh0E7gHRE4rgGAOM2gkqnmGsu3PSOxw+1pA9ASgY5YI92zidTDfiWgdU2b2psRqY2CEgG57hKlWzBg0834PscMd8IPgMcw7W06iuKgQrz9uYuXrD5tnYX8k6O1INk4hTvd0cuAims+XJ/bXdr6yTc6MoajmGTTAEsTxmCovjQ8lRQX49qItxcNnU1/QN/bZpteSArFWI+Zx4nqf03GEFtMf0s+ZGykkQirk9hevR4Le42KvE6vuwCARBtIB2xuqMHq3Vv9b4tt0fwbbO7/t8+p5H79yndjh9odBVGKGKDHuv+6CxDcvizkc0bylpF7y1RMr7zKB1p0uQ/81F5p6g3nhFZBYLHaWcuXsvyBm4Cmp7sAcES4cpsfMmBfiEBHOZCMevnkOdV3TebtqaSzkaAxwNkS56jePGlF+efLALzqlclklnv6wiasP5vLmtaWrllddohZiXFvFaJYCIjkvub+xFcXtxwt4v7xlelBmLFl+XG1DbzF2rw7FRQWY0NZ08IWVv8DSTIZvnUsQhaO/UHHleSbi+X2nk8S8vaEalWVqAnRidhU1VUch5Mkr07vQ00kkjaIoi5mCV3OiFO3u6pzNQSqcdDNjSYnNVO30ApKrZEqXqihTLbVDIe9qPaWHoW/sk3kWMG9HNK/TcpNYXvuO5t7ggVMqpUnE26Ii6rAy+crT2+LD8SXI7wBrIxL06BruPwuBXRfS+/KhSB/j+szEnhQPqVy2xR4jENE83pSSaRavTIrETmzTRZ6BkUPQKyPpD24f5BvgWM++BH0yuO59fIQxlUZ7DsK8vTvCJKSs2WGzz05JFvrQpiheMGRYcxo9XAo+gDAIIY7F/FaHtj9Q9mlGLYa+lgAAAABJRU5ErkJggg==">
                                      </button><br>
                            </div>

                          </form>
                          <br>
                        </div>
                      </div>
                      <br>
                    </li>
                    </ul>
                  </div>
                  <div class="col l6">


                  <!-- Thumbs Up icon by Icons8 -->
                {{-- <a class='dropdown-button ' href='#' data-activates='dropdownLikes'>
                  <img class="icon icons8-Thumbs-Up" width="30" height="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAB8klEQVRIS+2WTU7bQBTH/29aJCQcNZwAOEHTG7gLEnaFCzD2CaAnINwgPYE9vUDbXewscG8AJwBuALIjBSHmoZHiKPFHHEPcbDpbv5nf+79PEzZ0aENcvAu8feTtTyZ4QOQ+1BXwZvDOodcRRFcgajM4Sp74pI4DbwLPQ8H8CKJPzLhMQtlfVXlt8CIUioX2icUVM/4mobQbAWehcSidncOfjhDsMfAjCeT52sHF0Lk8k/6aDN1oreAiqAG0usoHQWrQ93FwOlgVauxyOTYt8lELOf8Igc9N9YKhTHjTb62eugOwx8wDgHItxcDdOJSqyKEc2DrybFMsOeMM1Di4xeK2WiX7ceC4WbtyME8rVgvHhJOzObS9trWNzjIwsfBNRLTWX8Yj93oxipmbqeK0L62u6hPhIgeuljqrgaK7pYrXAba66poIn+MnvZudao2CWz3FAO7jQO6vnOP3Kp6lDPiTBPL434GntVHW442F2uqp3wR8KyvKxsDpcIkDWbiIGgGnw4UZN0koC3u9EXCr6x2DxK9lG6sRsNVTAwLOtCZ3PDo10yt3ysHgCEwRiG0C2QD7zGSWQsXhNgGOWSrPpA8mQ7fwzupLooqX+b5M7bK1OFt9NXkwUXn58BKVKU3fq/3PVdeRMvv/4HVFsvKdjYX6FauZgi58jZneAAAAAElFTkSuQmCC">
                </a> --}}
                {{-- dropdown for likes --}}
                {{-- <div class="right">
                  <ul id='dropdownLikes' class='dropdown-content'>
                    <li class="rigth"><a href="#!">one</a></li>
                    <li><a href="#!">two</a></li>
                  </ul>
                </div> --}}


                {{-- ///////////////////////////// --}}
                    <!-- Merge Git Filled icon by Icons8 -->


                {{-- ///////////////////////////// --}}
                    <!-- Share icon by Icons8 -->
                    <style media="screen">

                    .collapsible-body {
                      display: none;
                      border-bottom: 200px solid #ffffff;
                      box-sizing: border-box;
                      padding: 2rem;
                    }
                    </style>
                    <ul class="collapsible popout" data-collapsible="expandable">
                      <li>
                      <div class="collapsible-header">
                        <img class="icon icons8-Share" width="30" height="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAACLElEQVRIS8VW21HbUBDdc/OYzOBMTAWhg5AKUD5I+As0YEsVYFeAqAC5AuE0gD9B/ohcQZwKQjqwR/JM8Di7zJVlImskhIUc6Vdz79lz7tmzC6rpQ024tBXgxpFrEKsDEvjhsDXKIlcp8Jsjd+8l4wrA/gpMRMYLJSd/rq3bZAGVAjc+932ADtIMhcQPb8xPWwHWbF+J+pXnmeCOd8m3Jqv/lTHW7wpR3/OAmfnjbGiNKwVegsIlwl4msMg08MxmZVLHZroAcPxYWzKhO7tpOc8HNtxm47U6Bch+uExkylA2MU0A6QD0QYRGIHYCzxqkC9v4jXcOv5lK8dmarEL9YM6dpHmKgikTeCmhahPEICHdh70Xf6kJhQsQjH89SiMR7iRNUwSYa67IKIwrAtbMkLrwNzPs2bB1+VSgQqnffunrhHmfd6EInYdzdjaRtTAydw7dfaXUj1wWwidZRinDeu2NawPWlT9Bajucc69SqTVwbK4BAe/yJZRbFtgzr90vI7M+81g7mURkEGi8ADtRO0E5yemjp46wdCtppyIGywARnVgJ58tlcCfdTeTfOLmiwpaRqWPxLBGZEwZsYkwBPtXLgFYEIr1KIjOpSJRwohwQff0/QyKFEs9inWLZwSMyCTxz9/nTKYNeLYuArqO21SfKgLxlT2gUeu2HqZbbx0Utlfc/HqcDvQQkRufPheLjra63K7B4oTdIsR9eW37hdCrLtMy5cgFSBil15h5m8AMuCihNVgAAAABJRU5ErkJggg==">
                      </div>
                      <div class="collapsible-body">
                        <div>
                        @foreach ($shared as $shares)
                          <a href="{{url('/search/'.$shares->id)}}"><div class=" col s12 chip">
                            <img src="{{asset('uploads/avatars/'.$shares->avatar)}}" alt="Contact Person"/>
                            {{$shares->fname}}&nbsp;{{$shares->lname}}
                          </div></a>
                        @endforeach
                      </div>
                        <div id="lis1"class="col s11">
                          <form class="inline" action="{{route('share')}}" method="post">
                            {{ csrf_field()}}
                            <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                            <div class="input-field ">
                                      <input id="email" name="email" type="text" class="validate">
                                      <label for="email">email</label>
                                      <button type="submit"  class="btn btn-floating" name="button"><i class="material-icons">share</i></button>
                            </div>

                          </form>
                          <br>
                        </div>
                      </div>
                      <br>
                    </li>
                    </ul>
                  </div>
                  <script type="text/javascript">

                  </script>
                  {{-- dropdown for likes --}}

                  {{-- ///////////////////////////// --}}
                  </div>
                <div class="row">
                  <div class="col l6 center-align">
                    <div class="chip">
                      @php
                        $edt= Carbon\Carbon::createFromFormat('Y-m-d', $goals->goalenddate)->toFormattedDateString();
                        $std= Carbon\Carbon::createFromFormat('Y-m-d', $goals->goalstartdate)->toFormattedDateString();
                      @endphp
                      Ending On:{{$edt}}
                    </div>
                  </div>
                  <div class="col l6 center-align">
                    <div class="chip">
                      Started On:{{$std}}
                    </div>
                  </div>

                </div>
              <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#test1">Overview</a></li>
                    <li class="tab col s3"><a href="#test2">Task</a></li>
                    <li class="tab col s3 "><a href="#test3">Skills</a></li>
                    <li class="tab col s3"><a href="#test4">Privacy</a></li>
                  </ul>
                </div>
                <div id="test1" class="col s12">

                    <ul class="collection">
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>Intent</b>
                        </div>
                        <div class="col l6">
                          <form name="intentfrm" action="{{route('goal')}}" method="post" id="intentfrm" style="display:inline;">
                            {{ csrf_field() }}
                            <div class="preloader-wrapper small active" id="intentpreloader" style="display:none;">
                            <div class="spinner-layer spinner-blue-only">
                                  <div class="circle-clipper left">
                                    <div class="circle"></div>
                                  </div><div class="gap-patch">
                                    <div class="circle"></div>
                                  </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                  </div>
                                </div>
                              </div>
                            <div class="row" id="intentrow">
                            <div class="col s10">
                              <div class="col s12" id="resultintent">
                                <span id="result">{{$goals->goalintent}}</span>
                              </div>
                            <div class="input-field col s12" id="intent" style="display:none;">
                              <input name="goalintent" placeholder="{{$goals->goalintent}}" type="text" required>
                              <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                              <input type="text" style="display:none;" value="updategoal" name="action">
                              <input type="text" style="display:none;" value="goalintent" name="attribute">
                              <label id="intentfield" for="goalintent" ></label>
                            </div>
                          </div>
                            <div class="col s2">
                              @if ($goals->goalauthorization!='share')
                                  <button  class="btn-floating "style="display:none;" type="submit" id="editintent"><i class="material-icons">done</i></button>
                                  <button  class="btn-floating"id="intentbtn" ><i class="material-icons ">mode_edit</i></button>
                              @endif
                            </div>
                          </div>
                          </form>
                          <script type="text/javascript">
                              var intentbtn=document.getElementById('intentbtn');
                              var editintent=document.getElementById('editintent');
                              var intent=document.getElementById('intent');
                              var intentfield=document.getElementById('intentfield');

                              intentbtn.addEventListener("click", function(event) {
                              event.preventDefault();
                              intentbtn.style.display='none';
                              document.getElementById('resultintent').style.display='none';
                              intent.style.display='inline';
                              editintent.style.display='inline';

                            });

                              editintent.addEventListener("click",function(event){
                                event.preventDefault();
                                document.getElementById("intentpreloader").style.display='block';
                                document.getElementById("intentrow").style.display='none';
                                editintentpost();
                              });

                              function editintentpost(){
                               var form = document.getElementById("intentfrm");
                               var action = form.getAttribute("action");
                               var result_div = document.getElementById("result");
                               var form_data = new FormData(form);

                               var xhr = new XMLHttpRequest();
                               xhr.open('POST', action, true);
                               xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                               xhr.send(form_data);
                               xhr.onreadystatechange = function () {
                                 if(xhr.readyState == 4 && xhr.status == 200) {
                                    var result = xhr.responseText;
                                    console.log('Result: ' + result);
                                    document.getElementById("intentrow").style.display='block';
                                    // var json = JSON.parse(result);
                                    // if(json.hasOwnProperty('errors') && json.errors.length > 0) {
                                    //   displayErrors(json.errors);
                                    // } else {
                                      // postResult(json.intent);
                                    // }
                                    if(result!=''){
                                    document.getElementById("intentpreloader").style.display='none';
                                    editintent.style.display='none';
                                    intent.style.display='none';
                                    document.getElementById("resultintent").style.display='inline';
                                    result_div.innerHTML = result;
                                    intentbtn.style.display='inline';

                                 }
                                   else {
                                     document.getElementById("intentpreloader").style.display='none';
                                     document.getElementById("intentfield").innerHTML='You cannot leave this empty';
                                     document.getElementById("intentfield").style.color='red';
                                   }
                                 }
                               };
                             }
                          </script>
                        </div>
                      </li>
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>Category</b>
                        </div>
                        <div class="col l6">
                             <form  name="categoryfrm" action="{{route('goal')}}" method="post" id="categoryfrm" style="display:inline;">
                                {{ csrf_field() }}
                                <div class="preloader-wrapper small active" id="categorypreloader" style="display:none;">
                                <div class="spinner-layer spinner-blue-only">
                                      <div class="circle-clipper left">
                                        <div class="circle"></div>
                                      </div><div class="gap-patch">
                                        <div class="circle"></div>
                                      </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row" id="categoryrow">
                                <div class="col s10">
                                  <div class="col s12" id="resultcategory">
                                    <span id="categoryresult">{{$goals->goalcategory}}</span>
                                  </div>
                                <div class="input-field col s12" id="category" style="display:none;">
                                      <select name="goalcategory" id="goalcategory">
                                        <option value="business"  selected>business</option>
                                        <option value="education">education</option>
                                        <option value="art">art</option>
                                      </select>
                                      <label id="categoryfield" for="goalcategory"></label>
                                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                                  <input type="text" style="display:none;" value="updategoal" name="action">
                                  <input type="text" style="display:none;" value="goalcategory" name="attribute">
                                </div>
                              </div>
                                <div class="col s2">
                                  @if ($goals->goalauthorization!='share')
                                    <button  class="btn-floating"style="display:none;" type="submit" id="editcategory"><i class="material-icons">done</i></button><button  class="btn-floating"id="categorybtn" ><i class="material-icons ">mode_edit</i></button>
                                  @endif
                                </div>
                              </div>
                              </form>
                              <script type="text/javascript">
                                  var categorybtn=document.getElementById('categorybtn');
                                  var editcategory=document.getElementById('editcategory');
                                  var category=document.getElementById('category');
                                  var categoryfield=document.getElementById('categoryfield');

                                  categorybtn.addEventListener("click", function(event) {
                                  event.preventDefault();
                                  categorybtn.style.display='none';
                                  document.getElementById('resultcategory').style.display='none';
                                  document.getElementById('goalcategory').style.display='inline';
                                  category.style.display='inline';
                                  editcategory.style.display='inline';

                                });

                                  editcategory.addEventListener("click",function(event){
                                    event.preventDefault();
                                    document.getElementById("categorypreloader").style.display='block';
                                    document.getElementById("categoryrow").style.display='none';
                                    editcategorypost();
                                  });

                                  function editcategorypost(){
                                   var form = document.getElementById("categoryfrm");
                                   var action = form.getAttribute("action");
                                   var result_div = document.getElementById("categoryresult");
                                   var form_data = new FormData(form);

                                   var xhr = new XMLHttpRequest();
                                   xhr.open('POST', action, true);
                                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                   xhr.send(form_data);
                                   xhr.onreadystatechange = function () {
                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                        var result = xhr.responseText;
                                        console.log('Result: ' + result);
                                        document.getElementById("categoryrow").style.display='block';
                                        if(result!=''){
                                        document.getElementById("categorypreloader").style.display='none';
                                        editcategory.style.display='none';
                                        category.style.display='none';
                                        result_div.innerHTML = result;
                                        document.getElementById("resultcategory").style.display='inline';
                                        categorybtn.style.display='inline';

                                     }
                                       else {
                                         document.getElementById("categorypreloader").style.display='none';
                                         document.getElementById("categoryfield").innerHTML='You cannot leave this empty';
                                         document.getElementById("categoryfield").style.color='red';
                                       }
                                     }
                                   };
                                 }
                              </script>


                        </div>
                      </li>
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>Priority</b>
                        </div>
                        <div class="col l6">
                             <form name="priorityfrm" action="{{route('goal')}}" method="post" id="priorityfrm" style="display:inline;">
                                {{ csrf_field() }}
                                <div class="preloader-wrapper small active" id="prioritypreloader" style="display:none;">
                                <div class="spinner-layer spinner-blue-only">
                                      <div class="circle-clipper left">
                                        <div class="circle"></div>
                                      </div><div class="gap-patch">
                                        <div class="circle"></div>
                                      </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row" id="priorityrow">
                                <div class="col s10">
                                  <div class="col s12" id="resultpriority">
                                    <span id="priorityresult">{{$goals->goalpriority}}</span>
                                  </div>
                                <div class="input-field col s12" id="priority" style="display:none;">
                                      <select name="goalpriority" id="goalpriority">
                                        <option value="high"  selected>high</option>
                                        <option value="medium">medium</option>
                                        <option value="low">low</option>
                                      </select>
                                      <label id="priorityfield" for="goalpriority"></label>
                                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                                  <input type="text" style="display:none;" value="updategoal" name="action">
                                  <input type="text" style="display:none;" value="goalpriority" name="attribute">
                                </div>
                              </div>
                                <div class="col s2">
                                  @if ($goals->goalauthorization!='share')
                                    <button  class="btn-floating"style="display:none;" type="submit" id="editpriority"><i class="material-icons">done</i></button><button  class="btn-floating"id="prioritybtn" ><i class="material-icons ">mode_edit</i></button>
                                  @endif
                                </div>
                              </div>
                              </form>
                              <script type="text/javascript">
                                  var prioritybtn=document.getElementById('prioritybtn');
                                  var editpriority=document.getElementById('editpriority');
                                  var priority=document.getElementById('priority');
                                  var priorityfield=document.getElementById('priorityfield');

                                  prioritybtn.addEventListener("click", function(event) {
                                  event.preventDefault();
                                  prioritybtn.style.display='none';
                                  document.getElementById('resultpriority').style.display='none';
                                  document.getElementById('goalpriority').style.display='inline';
                                  priority.style.display='inline';
                                  editpriority.style.display='inline';

                                });

                                  editpriority.addEventListener("click",function(event){
                                    event.preventDefault();
                                    document.getElementById("prioritypreloader").style.display='block';
                                    document.getElementById("priorityrow").style.display='none';
                                    editprioritypost();
                                  });

                                  function editprioritypost(){
                                   var form = document.getElementById("priorityfrm");
                                   var action = form.getAttribute("action");
                                   var result_div = document.getElementById("priorityresult");
                                   var form_data = new FormData(form);

                                   var xhr = new XMLHttpRequest();
                                   xhr.open('POST', action, true);
                                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                   xhr.send(form_data);
                                   xhr.onreadystatechange = function () {
                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                        var result = xhr.responseText;
                                        console.log('Result: ' + result);
                                        document.getElementById("priorityrow").style.display='block';
                                        if(result!=''){
                                        document.getElementById("prioritypreloader").style.display='none';
                                        editpriority.style.display='none';
                                        priority.style.display='none';
                                        result_div.innerHTML = result;
                                        document.getElementById("resultpriority").style.display='inline';
                                        prioritybtn.style.display='inline';

                                     }
                                       else {
                                         document.getElementById("prioritypreloader").style.display='none';
                                         document.getElementById("priorityfield").innerHTML='You cannot leave this empty';
                                         document.getElementById("priorityfield").style.color='red';
                                       }
                                     }
                                   };
                                 }
                              </script>


                        </div>
                      </li>
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>Start Date</b>
                        </div>
                        <div class="col l6">
                             <form  name="startdatefrm" action="{{route('goal')}}" method="post" id="startdatefrm" style="display:inline;">
                                {{ csrf_field() }}
                                <div class="preloader-wrapper small active" id="startdatepreloader" style="display:none;">
                                <div class="spinner-layer spinner-blue-only">
                                      <div class="circle-clipper left">
                                        <div class="circle"></div>
                                      </div><div class="gap-patch">
                                        <div class="circle"></div>
                                      </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row" id="startdaterow">
                                <div class="col s10">
                                  <div class="col s12" id="resultstartdate">
                                    <span id="startdateresult">{{$goals->goalstartdate}}</span>
                                  </div>
                                <div class="input-field col s12" id="startdate" style="display:none;">
                                      <input type="date"name="goalstartdate" id="goalstartdate" required>
                                      <label id="startdatefield" for="goalstartdate"></label>
                                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                                  <input type="text" style="display:none;" value="updategoal" name="action">
                                  <input type="text" style="display:none;" value="goalstartdate" name="attribute">
                                </div>
                              </div>
                                <div class="col s2">
                                  @if ($goals->goalauthorization!='share')

                                    <button  class="btn-floating"style="display:none;" type="submit" id="editstartdate"><i class="material-icons">done</i></button><button  class="btn-floating"id="startdatebtn" ><i class="material-icons ">mode_edit</i></button>

                                  @endif
                                </div>
                              </div>
                              </form>
                              <script type="text/javascript">
                                  var startdatebtn=document.getElementById('startdatebtn');
                                  var editstartdate=document.getElementById('editstartdate');
                                  var startdate=document.getElementById('startdate');
                                  var startdatefield=document.getElementById('startdatefield');

                                  startdatebtn.addEventListener("click", function(event) {
                                  event.preventDefault();
                                  startdatebtn.style.display='none';
                                  document.getElementById('resultstartdate').style.display='none';
                                  document.getElementById('goalstartdate').style.display='inline';
                                  startdate.style.display='inline';
                                  editstartdate.style.display='inline';

                                });

                                  editstartdate.addEventListener("click",function(event){
                                    event.preventDefault();
                                    document.getElementById("startdatepreloader").style.display='block';
                                    document.getElementById("startdaterow").style.display='none';
                                    editstartdatepost();
                                  });

                                  function editstartdatepost(){
                                   var form = document.getElementById("startdatefrm");
                                   var action = form.getAttribute("action");
                                   var result_div = document.getElementById("startdateresult");
                                   var form_data = new FormData(form);

                                   var xhr = new XMLHttpRequest();
                                   xhr.open('POST', action, true);
                                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                   xhr.send(form_data);
                                   xhr.onreadystatechange = function () {
                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                        var result = xhr.responseText;
                                        console.log('Result: ' + result);
                                        document.getElementById("startdaterow").style.display='block';
                                        if(result!=''){
                                        document.getElementById("startdatepreloader").style.display='none';
                                        editstartdate.style.display='none';
                                        startdate.style.display='none';
                                        result_div.innerHTML = result;
                                        document.getElementById("resultstartdate").style.display='inline';
                                        startdatebtn.style.display='inline';

                                     }
                                       else {
                                         document.getElementById("startdatepreloader").style.display='none';
                                         document.getElementById("startdatefield").innerHTML='You cannot leave this empty';
                                         document.getElementById("startdatefield").style.color='red';
                                       }
                                     }
                                   };
                                 }
                              </script>


                        </div>
                      </li>
                      <li class="collection-item row">
                        <div class="col l6">
                          <b>End Date</b>
                        </div>
                        <div class="col l6">
                             <form  name="enddatefrm" action="{{route('goal')}}" method="post" id="enddatefrm" style="display:inline;">
                                {{ csrf_field() }}
                                <div class="preloader-wrapper small active" id="enddatepreloader" style="display:none;">
                                <div class="spinner-layer spinner-blue-only">
                                      <div class="circle-clipper left">
                                        <div class="circle"></div>
                                      </div><div class="gap-patch">
                                        <div class="circle"></div>
                                      </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row" id="enddaterow">
                                <div class="col s10">
                                  <div class="col s12" id="resultenddate">
                                    <span id="enddateresult">{{$goals->goalenddate}}</span>
                                  </div>
                                <div class="input-field col s12" id="enddate" style="display:none;">
                                      <input type="date"name="goalenddate" id="goalenddate" required>
                                      <label id="enddatefield" for="goalenddate"></label>
                                  <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                                  <input type="text" style="display:none;" value="updategoal" name="action">
                                  <input type="text" style="display:none;" value="goalenddate" name="attribute">
                                </div>
                              </div>
                                <div class="col s2">
                                  @if ($goals->goalauthorization!='share')
                                    <button  class="btn-floating"style="display:none;" type="submit" id="editenddate"><i class="material-icons">done</i></button><button  class="btn-floating"id="enddatebtn" ><i class="material-icons ">mode_edit</i></button>
                                  @endif
                                </div>
                              </div>
                              </form>
                              <script type="text/javascript">
                                  var enddatebtn=document.getElementById('enddatebtn');
                                  var editenddate=document.getElementById('editenddate');
                                  var enddate=document.getElementById('enddate');
                                  var enddatefield=document.getElementById('enddatefield');

                                  enddatebtn.addEventListener("click", function(event) {
                                  event.preventDefault();
                                  enddatebtn.style.display='none';
                                  document.getElementById('resultenddate').style.display='none';
                                  document.getElementById('goalenddate').style.display='inline';
                                  enddate.style.display='inline';
                                  editenddate.style.display='inline';

                                });

                                  editenddate.addEventListener("click",function(event){
                                    event.preventDefault();
                                    document.getElementById("enddatepreloader").style.display='block';
                                    document.getElementById("enddaterow").style.display='none';
                                    editenddatepost();
                                  });

                                  function editenddatepost(){
                                   var form = document.getElementById("enddatefrm");
                                   var action = form.getAttribute("action");
                                   var result_div = document.getElementById("enddateresult");
                                   var form_data = new FormData(form);

                                   var xhr = new XMLHttpRequest();
                                   xhr.open('POST', action, true);
                                   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                   xhr.send(form_data);
                                   xhr.onreadystatechange = function () {
                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                        var result = xhr.responseText;
                                        console.log('Result: ' + result);
                                        document.getElementById("enddaterow").style.display='block';
                                        if(result!=''){
                                        document.getElementById("enddatepreloader").style.display='none';
                                        editenddate.style.display='none';
                                        enddate.style.display='none';
                                        result_div.innerHTML = result;
                                        document.getElementById("resultenddate").style.display='inline';
                                        enddatebtn.style.display='inline';

                                     }
                                       else {
                                         document.getElementById("enddatepreloader").style.display='none';
                                         document.getElementById("enddatefield").innerHTML='You cannot leave this empty';
                                         document.getElementById("startdatefield").style.color='red';
                                       }
                                     }
                                   };
                                 }
                              </script>


                        </div>
                      </li>
                    </ul>

                </div>
                {{-- taskssssssssssssssssssssssss --}}
                <div id="test2" class="col s12">
                  @if ($task->isEmpty())
                    <div id="notask" class="row">
                      <div class="col s12 m12">
                        <div class="card blue-grey darken-1">
                          <div class="card-content white-text">
                            <span class="card-title">No Tasks are added yet</span>
                            <p>start working on your goal by adding tasks click the button below to add a new task</p>
                          </div>
                          <div class="card-action">
                            <a  class="waves-effect waves-light btn-large " href="#addtaskmodal">Add a Task</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                    $(document).ready(function(){
                        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                        $('.modal').modal();
                      });

                    </script>
                  @else
                  <ul class="collapsible" data-collapsible="expandable">
                    @php
                      $taskcount=1;
                    @endphp
                    @foreach ($task as $tasks)
                      <li>
                        <div class="collapsible-header">
                          <div class="row">
                          <div class="col s10">
                          <b>{{$taskcount}}.&nbsp;&nbsp;{{$tasks->taskname}}</b>
                        </div>
                        <div class="col s2">
                          <form class="" action="{{route('deletetask')}}" method="post">
                            {{csrf_field()}}
                            <button type="submit" style="border:none;background-color:inherit;"><input type="hidden" name="goalid" value="{{$tasks->goalid}}"><i class="material-icons">delete</i></button>
                          </form>
                        </div>
                      </div>
                      </div>
                        @php
                          $taskcount=$taskcount+1;
                        @endphp
                        <div class="collapsible-body blue-text text-darken-4">
                          <div class="row">
                              <div class="col s6 center-align">
                                <b>Intent :</b>
                              </div>
                              <div class="col s6 center-align">
                                {{$tasks->taskintent}}
                              </div>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col s6 center-align">
                                  <b>Priority :</b>
                                </div>
                                <div class="col s6 center-align">
                                  {{$tasks->taskpriority}}
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col s6 center-align">
                                  <b>Start Date :</b>
                                </div>
                                <div class="col s6 center-align">
                                  {{Carbon\Carbon::createFromFormat('Y-m-d', $tasks->taskstartdate)->toFormattedDateString()}}
                                </div>
                            </div>
                          <div class="divider"></div>
                          <div class="row">
                              <div class="col s6 center-align">
                                <b>End Date :</b>
                              </div>
                              <div class="col s6 center-align">
                                {{Carbon\Carbon::createFromFormat('Y-m-d', $tasks->taskenddate)->toFormattedDateString()}}
                              </div>
                          </div>
                        <div class="divider"></div>
                        <div class=" section row">
                          <form action="{{route('goal')}}" method="post" name="{{$taskcount.'form'}}" id="{{$taskcount.'form'}}">
                           {{csrf_field()}}
                           <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                           <input type="hidden" name="taskid" value="{{$tasks->id}}">
                           <input type="hidden" name="action" value="updatecp">
                            <div class="col s10">
                              <b>Completed Percetage</b>
                                  <p class="range-field">
                                    <input type="range" name="cpinput" value="{{$tasks->taskcompletedpercentage}}" id="cpinput" min="0" max="100" />
                                  </p>
                            </div>
                            <div class="col s2"><br>
                              <button type="submit" id="{{$taskcount}}" class="waves-effect waves-light btn-floating"><i class="material-icons">done</i></button>
                            </div>
                          </form>
                        </div>
                      <div class="divider"></div>
                        </div>
                      </li>
                      {{-- <script type="text/javascript">
                      // for (var i = 1; i <={{$taskcount}}; i++) {
                        var cpbtn=document.getElementById("{{$taskcount}}");
                        cpbtn.addEventListener("click",function(event){
                          event.preventDefault();
                          setpercentage();
                        });
                        function setpercentage(){
                         var form = document.getElementById("{{$taskcount.'form'}}");
                         var action = form.getAttribute("action");
                         var form_data = new FormData(form);


                         var xhr = new XMLHttpRequest();
                         xhr.open('POST', action, true);
                         xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                         xhr.send(form_data);
                         xhr.onreadystatechange = function () {
                           if(xhr.readyState == 4 && xhr.status == 200) {
                              var result = xhr.responseText;
                              console.log('Result: ' + result);
                              document.getElementById("goalpercentage").innerHTML=result;
                           }
                         };
                       }

                      // }

                      </script> --}}
                    @endforeach

                    <li class="right-align"><a style="margin:5px;" class="waves-effect waves-light btn-floating pulse" href="#addtaskmodal"><i class="material-icons">add</i></a></li>
                  </ul>
                @endif



                </div>
                {{-- skillllllllllllllllllllllllllllsssssssssssssssss --}}
                <div id="test3" class="col s12">
                  <p class="flow-text"><h5>Skills I have</h5></p>

                  <div class="chip">
                   {Skill 1}
                   <i class="close material-icons">close</i>
                 </div>
                 <div class="chip">
                  {Skill 2}
                  <i class="close material-icons">close</i>
                </div>
                <div class="chip">
                 {Skill 3}
                 <i class="close material-icons">close</i>
               </div>


                  <form action="#">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                      <input class="mdl-textfield__input" type="text" id="skillsIHave">
                      <label class="mdl-textfield__label" for="skillsIHave">Add more...</label>
                    </div>
                  </form>
                  <div class="section-spacer"></div>

                  <p class="flow-text"><h5>Skills to acquire:</h5></p>

                          <div class="chip">
                            {Skill 1}
                              <i class="close material-icons">close</i>
                           </div>
                           <div class="chip">
                              {Skill 2}
                            <i class="close material-icons">close</i>
                          </div>

                  <form action="#">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                      <input class="mdl-textfield__input" type="text" id="skillsToAcquire">
                      <label class="mdl-textfield__label" for="skillsToAcquire">Add more...</label>
                    </div>
                  </form>



                </div>
                {{-- priiiiiiiiiiiiivvvvvvvvvaaaaaaaaaacyyyyyyyyyyyyyy --}}
                @foreach ($privacy as $privacys)

                @endforeach
                <div id="test4" class="col s12">
                  <ul class="collection">
                   <li class="collection-item dismissable"><div>make intent private<a href="#!" class="secondary-content">
                     <form id="goalintentprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch">
                      <label>
                          <input id="goalintentprivacy" {{($privacys->goalintentprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalintentprivacy">
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalintentprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalintentprivacy=document.getElementById("goalintentprivacy");
                    goalintentprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setintentprivacy();
                    });
                    function setintentprivacy(){
                     var form = document.getElementById("goalintentprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a></div></li>
                   <li class="collection-item dismissable"><div>make category private<a href="#!" class="secondary-content">
                     <form id="goalcategoryprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch">
                      <label>
                          <input id="goalcategoryprivacy" {{($privacys->goalcategoryprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalcategoryprivacy">
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalcategoryprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalcategoryprivacy=document.getElementById("goalcategoryprivacy");
                    goalcategoryprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setcategoryprivacy();
                    });
                    function setcategoryprivacy(){
                     var form = document.getElementById("goalcategoryprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a></div></li>
                   <li class="collection-item dismissable"><div>make priority private<a href="#!" class="secondary-content">
                     <form id="goalpriorityprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch">
                      <label>
                          <input id="goalpriorityprivacy" {{($privacys->goalpriorityprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalpriorityprivacy">
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalpriorityprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalpriorityprivacy=document.getElementById("goalpriorityprivacy");
                    goalpriorityprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setpriorityprivacy();
                    });
                    function setpriorityprivacy(){
                     var form = document.getElementById("goalpriorityprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a></div></li>
                   <li class="collection-item dismissable"><div>make start date private<a href="#!" class="secondary-content">
                     <form id="goalstartdateprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch">
                      <label>
                          <input id="goalstartdateprivacy" {{($privacys->goalstartdateprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalstartdateprivacy">
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalstartdateprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalstartdateprivacy=document.getElementById("goalstartdateprivacy");
                    goalstartdateprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setstartdateprivacy();
                    });
                    function setstartdateprivacy(){
                     var form = document.getElementById("goalstartdateprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a></div></li>
                   <li class="collection-item dismissable"><div>make end date private<a href="#!" class="secondary-content">
                     <form id="goalenddateprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch">
                      <label>
                          <input id="goalenddateprivacy" {{($privacys->goalenddateprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalenddateprivacy">
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalenddateprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalenddateprivacy=document.getElementById("goalenddateprivacy");
                    goalenddateprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setenddateprivacy();
                    });
                    function setenddateprivacy(){
                     var form = document.getElementById("goalenddateprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a></div></li>
                   <li class="collection-item dismissable"><div>make completed percentage private<a href="#!" class="secondary-content">
                     <form id="goalcompletedpercentageprivacyfrm" action="{{route('goal')}}" method="post">
                       {{ csrf_field() }}
                     <div class="switch">
                      <label>
                          <input id="goalcompletedpercentageprivacy" {{($privacys->goalcompletedpercentageprivacy!='public')?'checked':''}}  value="private" type="checkbox" name="goalcompletedpercentageprivacy">
                        <span class="lever"></span>
                      </label>
                    </div>
                    <input type="text" style="display:none;" value="{{$goals->goalid}}" name="goalid">
                    <input type="text" style="display:none;" value="updateprivacy" name="action">
                    <input type="text" style="display:none;" value="goalcompletedpercentageprivacy" name="attribute">
                    </form>
                    <script type="text/javascript">

                    var goalcompletedpercentageprivacy=document.getElementById("goalcompletedpercentageprivacy");
                    goalcompletedpercentageprivacy.addEventListener("change",function(event){
                      event.preventDefault();
                      setcompletedpercentageprivacy();
                    });
                    function setcompletedpercentageprivacy(){
                     var form = document.getElementById("goalcompletedpercentageprivacyfrm");
                     var action = form.getAttribute("action");
                     var form_data = new FormData(form);


                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', action, true);
                     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                     xhr.send(form_data);
                     console.log('string');
                     xhr.onreadystatechange = function () {
                       if(xhr.readyState == 4 && xhr.status == 200) {
                          var result = xhr.responseText;
                          console.log('Result: ' + result);
                       }
                     };
                   }

                    </script>
                   </a></div></li>
                 </ul>

                </div>
                <!-- comments start -->
                {{-- <div class="row">
                  <div class="input-field col s6">
                   <input id="first_name" type="text" class="validate">
                   <label for="first_name">Join the discussion </label>
                   <a href="#" >
                   <i class="material-icons right ">send</i>
                 </a>
                 </div><br>
                </div> --}}
                {{-- <div class="row col s12">
                    <img src="2.png" class="circle " height="50px" width="50px">
                    <strong>{Commenter's name}</strong>
                    <span>{x time ago}</span>
                    <br>
                    <blockquote >
                      In in culpa nulla elit esse. Ex cillum enim aliquip sit sit ullamco ex eiusmod fugiat. Cupidatat ad minim officia mollit laborum magna dolor tempor cupidatat mollit.
                      Est velit sit ad aliqua ullamco laborum excepteur dolore proident incididunt in labore elit.
                    </blockquote>
                    <div class="row">
                        <a><i class="material-icons">thumb_up</i></a>
                        <a><i class="material-icons">thumb_down</i></a>
                        <a><i class="material-icons">share</i></a>
                    </div>

                    <blockquote >
                      <div class="row col s12">
                          <img src="1.png" class="circle " height="50px" width="50px">
                          <strong>{Replier's Name}</strong>
                          <span>{x time ago}</span>
                          <br>
                          <blockquote >
                          Yes i agree
                          </blockquote>
                          <div class="row">
                              <a><i class="material-icons">thumb_up</i></a>
                              <a><i class="material-icons">thumb_down</i></a>
                              <a><i class="material-icons">share</i></a>
                          </div>
                      </div>
                    </blockquote>
                    <li class="divider"></li>


                </div> --}}

               <!-- ///////// -->
              </div>





            </div>

          </div>
        </div>
      </div>
</div>




</div>



@endsection
