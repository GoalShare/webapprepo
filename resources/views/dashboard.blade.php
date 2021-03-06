@extends('layouts.navbar')
@section('content')
    @php
        $carbon = new Carbon(Auth::User()->created_at);
        $compare =Carbon::now();
    @endphp
    <!--add goal form -->
    <div id="addgoal" class="modal modal-fixed-footer ">
        <div class="modal-content" style="text-align:center;">
            <h4>Add Your Goal</h4>
            <form enctype="multipart/form-data" action="{{route('dashboard')}}" method="post" id="addgoalform">
                {{ csrf_field() }}
                <div class="row blue lighten-5">
                    <div class=" col l6 m6 s12 ">
                        <div class="card-panel">
                            <div class="input-field ">
                                <input id="goalname" name="goalname" type="text" class="validate tooltipped"
                                       data-position="bottom" data-delay="50" data-tooltip="Enter your Goal Name "
                                       required>
                                <label for="goalname">Goal Name</label>
                            </div>
                            <small>give a name to your Goal to easily access it</small>
                        </div>
                    </div>
                    <div class=" col l6 m6 s12">
                        <div class="card-panel">
                            <div class="input-field">
                                <input id="goalintent" name="goalintent" type="text" class="validate tooltipped"
                                       data-position="bottom" data-delay="50" data-tooltip="Enter your Goal intent "
                                       required>
                                <label for="goalintent">Goal Intent</label>
                            </div>
                            <small>let us know what you want to achive with this goal</small>
                        </div>
                    </div>
                </div>
                <div class="row green lighten-5">
                    <div class=" col l6 m6 s12">
                        <div class="card-panel">
                            <p class="left-align">
                                <input class="with-gap" name="goalpriority" type="radio" value="high" id="HighPriority"
                                       checked="checked"/>
                                <label for="HighPriority">High Priority</label>
                            </p>
                            <p class="left-align">
                                <input class="with-gap" name="goalpriority" type="radio" value="medium"
                                       id="MediumPriority"/>
                                <label for="MediumPriority">Medium Priority</label>
                            </p>
                            <p class="left-align">
                                <input class="with-gap" name="goalpriority" type="radio" value="low" id="LowPriority"/>
                                <label for="LowPriority">Low Priority</label>
                            </p>
                        </div>
                    </div>
                    <div class=" col l6 m6 s12">
                        <div class="card-panel">
                            <div class="input-field tooltipped" data-position="bottom" data-delay="50"
                                 data-tooltip="Select Goal category">
                                <select name="goalcategory" required>
                                    <option value="non specified" disabled selected>select goal category</option>
                                    <option value="Be happy">Be happy</option>
                                    <option value="Career and professional growth">Career and professional growth
                                    </option>
                                    <option value="Community and recreation">Community and recreation</option>
                                    <option value="Creativity and Designs">Creativity and Designs</option>
                                    <option value="Drama, Entertainment and Music">Drama, Entertainment and Music
                                    </option>
                                    <option value="Education and Learning">Education and Learning</option>
                                    <option value="Travel and Adventure">Travel and Adventure</option>
                                    <option value="Finance and stability">Finance and stability</option>
                                    <option value="Friends">Friends</option>
                                    <option value="Health, fitness and sports">Health, fitness and sports</option>
                                    <option value="Hobbies">Hobbies</option>
                                    <option value="Love, Marriage and Relationship">Love, Marriage and Relationship
                                    </option>
                                    <option value="Personal, family and home">Personal, family and home</option>
                                    <option value="Spiritual Life<">Spiritual Life</option>
                                    <option value="Time of the Year">Time of the Year</option>
                                </select>
                                <label>Goal Category</label>
                            </div>
                            <small>select the category in which your goal belongs from the given types of categories
                            </small>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('select').material_select();
                        });
                    </script>
                </div>
                <div class="row indigo lighten-5">
                    <div class="col l6 m6 s12">
                        <div class="card-panel">
                            <div class="input-field row">
                                @php
                                    $month=date("n");
                                    $year=date("Y");
                                    $day=date("d");
                                @endphp
                                <select class="col s2" id="gsdatedropdown" onchange="gssetdob()">
                                    {{-- @if ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)
                                      @for ($i=1; $i<32 ; $i++) --}}
                                    {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
                                    {{-- @endfor
                                  @elseif ($month==4||$month==6||$month==9||$month==11)
                                    @for ($i=1; $i<31 ; $i++) --}}
                                    {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
                                    {{-- @endfor
                                  @elseif ($month==2&&$year%4==0)
                                    @for ($i=1; $i<30 ; $i++) --}}
                                    {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
                                    {{-- @endfor
                                  @elseif ($month==2&&$year%4!=0)
                                    @for ($i=1; $i<29 ; $i++) --}}
                                    {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
                                    {{-- @endfor
                                  @endif --}}
                                    @for ($i=1; $i <=31 ; $i++)
                                        <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <select class="col s6" id="gsmonthdropdown" onchange="gssetdatefunc()">
                                    <option data-month="JAN" value="01" {{ ($month==1)?"selected":"" }}>January</option>
                                    <option data-month="FEB" value="02" {{ ($month==2)?"selected":"" }}>February
                                    </option>
                                    <option data-month="MAR" value="03" {{ ($month==3)?"selected":"" }}>March</option>
                                    <option data-month="APR" value="04" {{ ($month==4)?"selected":"" }}>April</option>
                                    <option data-month="MAY" value="05" {{ ($month==5)?"selected":"" }}>May</option>
                                    <option data-month="JUN" value="06" {{ ($month==6)?"selected":"" }}>June</option>
                                    <option data-month="JUL" value="07" {{ ($month==7)?"selected":"" }}>July</option>
                                    <option data-month="AUG" value="08" {{ ($month==8)?"selected":"" }}>August</option>
                                    <option data-month="SEP" value="09" {{ ($month==9)?"selected":"" }}>September
                                    </option>
                                    <option data-month="OCT" value="10" {{ ($month==10)?"selected":"" }}>October
                                    </option>
                                    <option data-month="NOV" value="11" {{ ($month==11)?"selected":"" }}>November
                                    </option>
                                    <option data-month="DEC" value="12" {{ ($month==12)?"selected":"" }}>December
                                    </option>
                                </select>
                                <select class="col s4" id="gsyeardropdown" onchange="gsfebdates()">
                                    <option value="{{ $year }}" selected>{{ $year }}</option>
                                    @for ($i=($year+1); $i<($year+20) ; $i++)
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <label>Enter the starting date</label>
                            </div>
                            <small>Enter the date you are starting this Goal. Today's date will be automatically
                                asigned
                            </small>
                        </div>
                    </div>
                    <input type="hidden" id="goalstartdate" name="goalstartdate"
                           value="{{ $year }}-{{ $month }}-{{ $day }}">
                    <script type="text/javascript">
                        var gsdatedropdown = document.getElementById('gsdatedropdown');
                        var gsmonthdropdown = document.getElementById('gsmonthdropdown');
                        var gsyeardropdown = document.getElementById('gsyeardropdown');
                        var goalstartdate = document.getElementById('goalstartdate');
                        var d = new Date();

                        function gsfebdates() {
                            if (gsmonthdropdown.value == 02) {

                                if (gsyeardropdown.value % 4 == 0) {
                                    if (gsyeardropdown.value % 100 == 0) {
                                        // year is divisible by 400, hence the year is a leap year
                                        if (gsyeardropdown.value % 400 == 0) {
                                            gsdatedropdown.innerHTML = "";
                                            for (var i = 1; i <= 29; i++) {
                                                gsdatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                            }
                                        }
                                        else {
                                            gsdatedropdown.innerHTML = "";
                                            for (var i = 1; i <= 28; i++) {
                                                gsdatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                            }
                                        }
                                    }
                                    else {
                                        gsdatedropdown.innerHTML = "";
                                        for (var i = 1; i <= 29; i++) {
                                            gsdatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                        }
                                    }

                                }

                            }
                            goalstartdate.value = gsyeardropdown.value + '-' + gsmonthdropdown.value + '-' + gsdatedropdown.value;
                            console.log(goalstartdate.value);
                        }

                        function gssetdob() {
                            goalstartdate.value = gsyeardropdown.value + '-' + gsmonthdropdown.value + '-' + gsdatedropdown.value;
                            console.log(goalstartdate.value);
                        }

                        function gssetdatefunc() {
                            if (gsmonthdropdown.value == 02) {
                                if (gsyeardropdown.value % 4 == 0) {
                                    if (gsyeardropdown.value % 100 == 0) {
                                        // year is divisible by 400, hence the year is a leap year
                                        if (gsyeardropdown.value % 400 == 0) {
                                            gsdatedropdown.innerHTML = "";
                                            for (var i = 1; i <= 29; i++) {
                                                gsdatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                            }
                                        }
                                        else {
                                            gsdatedropdown.innerHTML = "";
                                            for (var i = 1; i <= 28; i++) {
                                                gsdatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                            }
                                        }
                                    }
                                    else {
                                        gsdatedropdown.innerHTML = "";
                                        for (var i = 1; i <= 29; i++) {
                                            gsdatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                        }
                                    }

                                }
                                else {
                                    gsdatedropdown.innerHTML = "";
                                    for (var i = 1; i <= 28; i++) {
                                        gsdatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                    }
                                }

                            }
                            else {
                                if (gsmonthdropdown.value == 01 || gsmonthdropdown.value == 03 || gsmonthdropdown.value == 05 || gsmonthdropdown.value == 07 || gsmonthdropdown.value == 08 || gsmonthdropdown.value == 010 || gsmonthdropdown.value == 12) {
                                    gsdatedropdown.innerHTML = "";
                                    for (var i = 1; i <= 31; i++) {
                                        gsdatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                    }
                                } else {
                                    gsdatedropdown.innerHTML = "";
                                    for (var i = 1; i <= 30; i++) {
                                        gsdatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                    }
                                }
                            }
                            goalstartdate.value = gsyeardropdown.value + '-' + gsmonthdropdown.value + '-' + gsdatedropdown.value;
                            console.log(goalstartdate.value);
                        }
                    </script>
                    <div class="col l6 m6 s12">
                        <div class="card-panel">
                            <div class="input-field row">
                                <select class="col s2" id="gedatedropdown" onchange="gesetdob()" style="height:50px;">
                                    {{-- @if ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)
                                      @for ($i=1; $i<32 ; $i++) --}}
                                    {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
                                    {{-- @endfor
                                  @elseif ($month==4||$month==6||$month==9||$month==11)
                                    @for ($i=1; $i<31 ; $i++) --}}
                                    {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
                                    {{-- @endfor
                                  @elseif ($month==2&&$year%4==0)
                                    @for ($i=1; $i<30 ; $i++) --}}
                                    {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
                                    {{-- @endfor
                                  @elseif ($month==2&&$year%4!=0)
                                    @for ($i=1; $i<29 ; $i++) --}}
                                    {{-- <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option> --}}
                                    {{-- @endfor
                                  @endif --}}
                                    @for ($i=1; $i <=31 ; $i++)
                                        <option value="{{ $i }}" {{ ($day==$i)?"selected":"" }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <select class="col s6" id="gemonthdropdown" onchange="gesetdatefunc()">
                                    <option data-month="JAN" value="01" {{ ($month==1)?"selected":"" }}>January</option>
                                    <option data-month="FEB" value="02" {{ ($month==2)?"selected":"" }}>February
                                    </option>
                                    <option data-month="MAR" value="03" {{ ($month==3)?"selected":"" }}>March</option>
                                    <option data-month="APR" value="04" {{ ($month==4)?"selected":"" }}>April</option>
                                    <option data-month="MAY" value="05" {{ ($month==5)?"selected":"" }}>May</option>
                                    <option data-month="JUN" value="06" {{ ($month==6)?"selected":"" }}>June</option>
                                    <option data-month="JUL" value="07" {{ ($month==7)?"selected":"" }}>July</option>
                                    <option data-month="AUG" value="08" {{ ($month==8)?"selected":"" }}>August</option>
                                    <option data-month="SEP" value="09" {{ ($month==9)?"selected":"" }}>September
                                    </option>
                                    <option data-month="OCT" value="10" {{ ($month==10)?"selected":"" }}>October
                                    </option>
                                    <option data-month="NOV" value="11" {{ ($month==11)?"selected":"" }}>November
                                    </option>
                                    <option data-month="DEC" value="12" {{ ($month==12)?"selected":"" }}>December
                                    </option>
                                </select>
                                <select class="col s4" id="geyeardropdown" onchange="gefebdates()">
                                    <option value="{{ $year }}" selected>{{ $year }}</option>
                                    @for ($i=($year+1); $i<($year+20) ; $i++)
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <label>Enter the ending date</label>
                            </div>
                            <small>Enter the enddate of your goal.A date of two days from now will be automatically
                                asigned
                            </small>
                        </div>
                    </div>
                    <input type="hidden" id="goalenddate" name="goalenddate"
                           value="{{ $year }}-{{ $month }}-{{ $day+2 }}">
                    <script type="text/javascript">
                        var gedatedropdown = document.getElementById('gedatedropdown');
                        var gemonthdropdown = document.getElementById('gemonthdropdown');
                        var geyeardropdown = document.getElementById('geyeardropdown');
                        var goalenddate = document.getElementById('goalenddate');

                        function gefebdates() {
                            if (gemonthdropdown.value == 02) {

                                if (geyeardropdown.value % 4 == 0) {
                                    if (geyeardropdown.value % 100 == 0) {
                                        // year is divisible by 400, hence the year is a leap year
                                        if (geyeardropdown.value % 400 == 0) {
                                            gedatedropdown.innerHTML = "";
                                            for (var i = 1; i <= 29; i++) {
                                                gedatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                            }
                                        }
                                        else {
                                            gedatedropdown.innerHTML = "";
                                            for (var i = 1; i <= 28; i++) {
                                                gedatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                            }
                                        }
                                    }
                                    else {
                                        gedatedropdown.innerHTML = "";
                                        for (var i = 1; i <= 29; i++) {
                                            gedatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                        }
                                    }

                                }

                            }
                            goalstartdate.value = geyeardropdown.value + '-' + gemonthdropdown.value + '-' + gedatedropdown.value;
                            console.log(goalenddate.value);
                        }

                        function gesetdob() {
                            goalstartdate.value = geyeardropdown.value + '-' + gemonthdropdown.value + '-' + gedatedropdown.value;
                            console.log(goalenddate.value);
                        }

                        function gesetdatefunc() {
                            if (gemonthdropdown.value == 02) {
                                if (geyeardropdown.value % 4 == 0) {
                                    if (geyeardropdown.value % 100 == 0) {
                                        // year is divisible by 400, hence the year is a leap year
                                        if (geyeardropdown.value % 400 == 0) {
                                            gedatedropdown.innerHTML = "";
                                            for (var i = 1; i <= 29; i++) {
                                                gedatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                            }
                                        }
                                        else {
                                            gedatedropdown.innerHTML = "";
                                            for (var i = 1; i <= 28; i++) {
                                                gedatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                            }
                                        }
                                    }
                                    else {
                                        gedatedropdown.innerHTML = "";
                                        for (var i = 1; i <= 29; i++) {
                                            gedatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                        }
                                    }

                                }
                                else {
                                    gedatedropdown.innerHTML = "";
                                    for (var i = 1; i <= 28; i++) {
                                        gedatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                    }
                                }

                            }
                            else {
                                if (gemonthdropdown.value == 01 || gemonthdropdown.value == 03 || gemonthdropdown.value == 05 || gemonthdropdown.value == 07 || gemonthdropdown.value == 08 || gemonthdropdown.value == 010 || gemonthdropdown.value == 12) {
                                    gedatedropdown.innerHTML = "";
                                    for (var i = 1; i <= 31; i++) {
                                        gedatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                    }
                                } else {
                                    gedatedropdown.innerHTML = "";
                                    for (var i = 1; i <= 30; i++) {
                                        gedatedropdown.innerHTML += '<option value="' + i + '">' + i + '</option>';
                                    }
                                }
                            }
                            goalstartdate.value = geyeardropdown.value + '-' + gemonthdropdown.value + '-' + gedatedropdown.value;
                            console.log(goalenddate.value);
                        }
                    </script>
                </div>
                <input type="hidden" style="display:none;" name="action" value="2">
        </div>
        <div class="modal-footer" style="height:18%;">
            <button type="submit" id="addgoalbtn" style="margin-right:10px;margin-left:10px;"
                    class="modal-action waves-effectwaves-effect waves-light btn center">Add Goal
            </button>
            <a onclick="$('#addgoal').modal('close');" style="margin-right:10px;margin-left:10px;"
               class="model-close waves-effectwaves-effect waves-light btn center">cancel</a>
            <div class="file-field input-field left">
                <div class="btn btn-floating">
                    <span><i class="material-icons">photo</i></span>
                    <input type="file" name="goalpicture">
                </div>
                <div class="file-path-wrapper">
                    <input style="display:none;" class="file-path validate tooltipped" data-position="bottom"
                           data-delay="50" data-tooltip="Upload Your Goal Picture" type="text" name="goalpicturepath">
                </div>
            </div>
            </form>
        </div>
    </div>
    <!--end of add goal -->

    <div class="container" id="goaldisplay">
        <div class="row hide-on-small-only"><br><br>
          <div class="col l1 m1  center-align"></div>
            <div class="col l2 m2  center-align">
                <span class=" red-text "><b>New Goal</b></span><br>
                <a href="#addgoal" class="btn btn-floating red btn-large "><i class="material-icons">add</i></a>
            </div>
            <div class="col l2 m2  center-align">
                <span class=" blue-text text-lighten-1"><b>Send Invite</b></span><br>
                <a class="btn btn-floating blue lighten-1 btn-large" href="#sendinvitebtnmodal"><i
                            class="material-icons">people</i></a>
            </div>
            <!-- Modal Structure -->
            <div id="sendinvitebtnmodal" class="modal">
                <div style="height:25px;background-color:#0d47a1;color:white;"><img
                            src="{{asset('favicon/favicon-16x16.png')}}" height="20px">Send Invite
                </div>
                <div class="modal-content">

                    <!-- <h5 style="color:#0d47a1;">We are ready to connect with your friends.</h5> -->
                    <div class="row" style="height:25px;"></div>
                    <div class="row">
                        <div class="col s4 m4 l4">
                            <center><a class="googleContactsButton" href="#myModal11"><img
                                            src="{{asset('img/mail_logo_rgb_web.png')}}" style="margin-top:-5%;"
                                            width="80%" height="80%"></a></center>
                        </div>

                        <div class="col s4 m4 l4">
                            <center>
                                <a onclick="send_private_msg_to_fb_user()">
                                    <img style="cursor:pointer" src="{{asset('img/facebook_logos_PNG19749.png')}}"
                                         width="80%" height="80%">
                                </a>
                            </center>


                            <script type="text/javascript">
                                function send_private_msg_to_fb_user() {
                                    FB.login(function (response) {
                                        if (response.authResponse) {
                                            FB.ui({
                                                method: 'send',
                                                name: 'Send Private Message to Facebook User using Javascript Facebook API',
                                                link: 'http://www.lifewithgoals.com',
                                                description: 'In this tutorial I will show you how to send private message to facebook user using Javascript Facebook API. Although it looks very complicated but in real it is very simple, just follow the tutorial.'
                                            });
                                        }
                                    });
                                }
                            </script>
                            <script language="javascript" type="text/javascript">

                                window.fbAsyncInit = function () {
                                    FB.init({
                                        appId: '284837855364891',
                                        status: true,
                                        autoLogAppEvents: true,
                                        xfbml: true,
                                        version: 'v2.10'

                                    });

                                };

                                (function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));


                            </script>
                        </div>

                        <div class="col s4 m4 l4">
                            <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                            <center>
                                <a><img src="{{asset('img/LinkedIn_Logo.svg.png')}}"
                                        data-href="http://www.lifewithgoals.com/"
                                        style="cursor:pointer;width:80%; height:80%;"
                                        onclick="window.open('https://www.linkedin.com/cws/share?url=http://www.lifewithgoals.com/','targetWindow','width=700px,height=600px');"></a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">

                var clientId = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
                var apiKey = 'R9ijmkXitCwlC-Zh7oY26ICw';
                var scopes = 'https://www.googleapis.com/auth/contacts.readonly';

                $(document).on("click", ".googleContactsButton", function () {
                    gapi.client.setApiKey(apiKey);
                    window.setTimeout(authorize);
                });

                function authorize() {
                    gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthorization);

                }

                function handleAuthorization(authorizationResult) {
                    if (authorizationResult && !authorizationResult.error) {
                        $.get("https://www.google.com/m8/feeds/contacts/default/thin?alt=json&access_token=" + authorizationResult.access_token + "&max-results=500&v=3.0",
                            function (result) {
                                document.getElementById("sendinvitebtnmodal").style.display = "none";
                                console.log(result);
                                var text = '';
                                var count = 0;
                                for (var i = 0; i < result.feed.entry.length; i++) {
                                    var x = result.feed.entry[i].gd$email;
                                    var y = result.feed.entry[i].title;
                                    if (x == undefined) {
                                        console.log("yy");
                                    }

                                    else {
                                        count = count + 1;
                                        var set = 0;
                                                @foreach($allemail as $allemails)
                                        var v = "{{$allemails}}";
                                        // console.log(v);
                                        if (x[0].address == v) {
                                            console.log(x[0].address + " " + i);
                                            // console.log($('#ch'+k)[0]);

                                            text = text + '<div class="col s12 m12 l6"><div class="card disabledcard" style="width:100%; height:100%;max-height:100%; background-color: #EEEEEE;"><div class="row"><div class="col l4"><span class="checkboxlist"><input type="checkbox" name="checkboxnames" value="' + x[0].address + '" id="ch' + i + '" disabled/><label for="ch' + i + '"></label></span><img src="{{asset('img/Cornmanthe3rd-Plex-Communication-gmail.ico')}}" height="40px" width="40px"></div><div class="col l8 truncate"><span style="font-weight: bold;" >' + y.$t + '</span><br><span style="font-size:12px;color:#A7A7A7;">' + x[0].address + '</span></div></div></div></div>';
                                            set = 1;

                                        }
                                        else {

                                        }
                                        @endforeach

                                        if (set == 0) {
                                            text = text + '<div class="col s12 m12 l6"><div class="card tosearch" style="width:100%; height:100%;max-height:100%; background-color: #EEEEEE;"><div class="row"><div class="col l4"><span class="checkboxlist"><input type="checkbox" name="checkboxnames" value="' + x[0].address + '" id="ch' + i + '"/><label for="ch' + i + '"></label></span><img src="{{asset('img/Cornmanthe3rd-Plex-Communication-gmail.ico')}}" height="40px" width="40px"></div><div class="col l8 truncate"><span <span style="font-weight: bold;">' + y.$t + '</span><br><span style="font-size:12px;color:#A7A7A7;">' + x[0].address + '</span></div></div></div></div>';

                                        }


                                        // console.log(document.getElementsByTagName("input")[0].value);
                                        // $.get("http://picasaweb.google.com/data/entry/api/user/"+x[0].address+"?alt=json")
                                        //     .done(function() {
                                        //       $.get("http://picasaweb.google.com/data/entry/api/user/"+x[0].address+"?alt=json",
                                        //         function(data){
                                        //           console.log(data);
                                        //             var x=data.entry.gphoto$thumbnail.$t;
                                        //             console.log('<img src="'+x+'">');});
                                        //     }).fail(function() {
                                        //       console.log("wefdsdvcsdvcsdzcsd");
                                        //     });


                                    }

                                    document.getElementById("found2").innerHTML = '<span style="color:#0d47a1;font-size:17px;"><span>&nbsp&nbsp&nbsp</span>Connect with people you know on Gmail.</span>';
                                    document.getElementById("found3").innerHTML = '<span><span>&nbsp&nbsp&nbsp&nbsp</span>We found' + " " + count + " " + 'people from your address book. Select the people you would like to connect to.</span>';

                                }


                                document.getElementById("demo11").innerHTML = text;


                                document.getElementById("myModal11").style.display = "inline";


                                //
                                //
                                var invitebtn = document.getElementById('sendinv');
                                invitebtn.addEventListener("click", function (event) {
                                    Check();
                                });

                                function Check() {


                                    var checkArray = new Array();
                                    var count = 0;
                                    if ($('[type="checkbox"]').is(":checked")) {
                                        console.log("qwertyuiop");

                                        $('input[name="checkboxnames"]:checked').each(function () {

                                            //console.log(this.value);

                                            checkArray.push(this.value);
                                            //     // document.write('<input type="hidden" name="test'+count+'" value="'+this.value+'" />');
                                            //
                                        });
                                    }
                                    else {
                                        console.log("jdcnjsnkmkmkmookmokmok");
                                    }
                                    console.log(checkArray.length);
                                    for (var i = 0; i < checkArray.length; i++) {
                                        console.log('<input type="hidden" name="' + i + '" value="' + checkArray[i] + '">');
                                        document.getElementById("checklistnameform").innerHTML = document.getElementById("checklistnameform").innerHTML + ('<input type="hidden" name="val' + i + '" value="' + checkArray[i] + '">');
                                    }
                                    $('#lengthsize').val(checkArray.length);

                                    submitForm();

                                }


                            });
                    }
                }


            </script>


            <form id="checklistnameform" action="{{route('chkdetails')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="length" id="lengthsize" value="">
            </form>

            <script>
                function submitForm() {
                    var newchecklistnameform = document.getElementById('checklistnameform');
                    newchecklistnameform.submit();

                }
            </script>


            <!--
            <script>

            //             $.get("http://picasaweb.google.com/data/entry/api/user/chirathpereraz1st@gmail.com?alt=json",
            //               function(data){
            //                 console.log(data);
            //                   var x=data.entry.gphoto$thumbnail.$t;
            //                   console.log(x);
            //
            //
            //  });
            $.get("http://picasaweb.google.com/data/entry/api/user/qeuniversityreach@pearson.com?alt=json")
                .done(function() {
                  $.get("http://picasaweb.google.com/data/entry/api/user/chirathpereraz1st@gmail.com?alt=json",
                    function(data){
                      console.log(data);
                        var x=data.entry.gphoto$thumbnail.$t;
                        console.log('<img src="'+x+'">');});
                }).fail(function() {
                  console.log("wefdsdvcsdvcsdzcsd");
                });


                xhttp=new XMLHttpRequest();
            xhttp.open("GET","http://picasaweb.google.com/data/entry/api/user/chirathpereraz1st@gmail.com?alt=json",false);
            xhttp.send();

            if (xhttp.status === 404) {
                console.log("correct");
            }
                        </script> -->


            <!-- The Modal -->
            <div id="myModal11" class="modal modal-fixed-footer" style="height:600px;max-height:600px; z-index:3000;">
                <div style="height:140px;">
                    <div id="found1" style="height:25px;background-color:#0d47a1;color:white;"><img
                                src="{{asset('img/Martz90-Circle-Gmail.png')}}" height="20px" width="20px">&nbsp Gmail<a
                                class="right" style="cursor:pointer;" onclick="windowclose();"><i
                                    class="material-icons">close</i></a></div>
                    <div id="found2" style="height:25px;"></div>
                    <div id="found3" style="height:25px;"></div>
                    <br>
                    <div class="row" style="background-color:#EDEEEE;height:25px;">

                        <div class="col s4 m4 l4"><span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                            <input type="checkbox" id="chk" onclick="toggle(this);"/>
                            <label for="chk"></label>Select all
                        </div>
                        <div class="col s4 m4 l4"></div>
                        <div class="col s4 m4 l4">
                            <input style="max-width:200px;max-height:20px;" type="text" id="myInput"
                                   onkeyup="myFunction()" placeholder="Search for names..">
                        </div>
                    </div>

                    <script>
                        function windowclose() {
                            document.getElementById("myModal11").style.display = "none";
                        }

                        function toggle(source) {
                            var checkboxes = document.querySelectorAll('input[type="checkbox"]');

                            for (var i = 0; i < checkboxes.length; i++) {

                                if (checkboxes[i] != source)
                                    checkboxes[i].checked = source.checked;
                            }
                        }

                        function myFunction() {
                            console.log("dcisdjcnsjkdcnkdmn");


                            var textBox = $.trim($('#myInput').val());

                            if (textBox == "") {
                                $('.tosearch').show();
                                $('.disabledcard').hide();
                            }

                            else {
                                $('.disabledcard').hide();
                                $('.tosearch').hide();
                                var txt = $('#myInput').val();
                                $('.tosearch:contains("' + txt + '")').show();
                                $('.disabledcard').hide();
                            }
                        }

                    </script>
                </div>
                <!-- Modal content -->
                <div class="modal-content" style="height:410px;max-height:410px;">

                    <div id="demo11" class="row"></div>


                </div>
                <div class="modal-footer" style="height:50px;">
                    <button class="modal-action waves-effect waves-green btn right" id="sendinv">Send Invite</button>

                    <button class="modal-action modal-close waves-effect waves-green btn left" type="reset">Reset
                    </button>


                </div>


            </div>

            <div class="col l2 m2  center-align">
                <span class=" grey-text text-darken-3"><b>Dashboard</b></span><br>
                <a href="{{url('/dashboard')}}" class="btn btn-floating grey darken-3 btn-large "><i
                            class="material-icons">dashboard</i></a>
            </div>
            <!-- <div class="col l2 m2 center-align">
                <span class=" blue-text text-darken-4"><b>My Documents</b></span><br>
                <a href="{{url('/files')}}" class="btn btn-floating btn-large "><i
                            class="material-icons">attach_file</i></a>
            </div> -->

            <div class="col l2 m2 center-align">
                <span class=" purple-text text-darken-3"><b>My Schedule</b></span><br>
                <a href="{{url('/calendar')}}" class="btn btn-floating purple darken-3 btn-large "><i
                            class="material-icons">date_range</i></a>
            </div>
            <div class="col l2 m2  center-align">
                <span class=" green-text text-darken-4"><b>My Profile</b></span><br>
                <a href="{{url('profile/'.Auth::id())}}" class="btn btn-floating green darken-4 btn-large "><i
                            class="material-icons">people</i></a>
            </div>
            <div class="col l1 m1  center-align"></div>
        </div>
        @if($goal->isEmpty() && $alignedgoal->isEmpty())
            <div class="row">
                <div class="col s12 m4 l4">
                    <div class="card-panel teal">
                  <span class="white-text">
                  <h4>Hi {{ Auth::User()->fname }}&nbsp;{{ Auth::User()->lname }},</h4>
                  we warmly welcome you to lifewithgoals.com. This is a platform to help you build, organize and monitor goals in your life, work and leisure and also much more.
                  </span>
                    </div>
                    <div class="card-panel purple darken-3">
                  <span class="white-text">
                  <h4>Get your day planned</h4>
                  Have a plan for every second. Access your schedule to know what you have planned. Let us know your progress on every step. We will let you know what you achieved.
                  </span>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card-panel red">
                  <span class="white-text">
                  <h4>You are just few clicks away...</h4>
                  <ol>
                    <li>Click on "+" button.</li>
                    <li>Enter details of what you want to achieve</li>
                    <li>Go to your Goal</li>
                    <li>Achive it with our help</li>
                  </ol>
                  </span>
                    </div>
                    <div class="card-panel blue">
                  <span class="white-text">
                  <h4>Invite People</h4>
                  Invite others to lifewithgoals.com to grow together. Help them achieve their goals like you have. Just click the send invite button and select who you want to invite
                  </span>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card-panel blue darken-4">
                  <span class="white-text">
                  <h4>Upload files</h4>
                  Access your files anytime anywhere. We have them organized for you. We will keep them secured for you.
                  </span>
                    </div>
                    <div class="card-panel blue-grey darken-3">
                  <span class="white-text">
                  <h4>Share and Align</h4>
                  Now you can share your goals with others so others can achieve what you have achieved too. You can also align a goal with others to work together on the same goal. Achieve something greater than you. Remember to set the correct privacy
                  </span>
                    </div>
                </div>
            </div>
        @else
            {{-- starrrrrrrrrrrrrrrrrrrtttttttttttttttttt --}}
            <br>
            <ul class="collection">
                <li class="collection-item"><b>Pinned Goals</b></li>
            </ul>
            <!-- the main goal that will be repeated -->
            <div class="row center">
                @foreach ($goal as $goals)
                    @if($goals->pinned==1)
                        <div class="col l4 m6 s12 card sticky-action responsive">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{asset('uploads/goals/'.$goals->goalpicturetwo)}}"
                                     alt="goal picture">
                            </div>
                            <div class="card-content">
              <span class="card-title  grey-text text-darken-4">
                <span class="col s2 tooltipped" style="cursor:pointer;" data-position="right" data-delay="50"
                      data-tooltip="Pin this goal">
                  <form method="post" action="{{ route('dashboard') }}" id="unpin" style="position:inline;">
                      {{ csrf_field() }}
                      <input type="hidden" name="pinned" value="0">
                    <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="action" value="1">
                    <button type="submit" style="border:none;background-color:#fff;" id="unpinbtn">
                        <img class="icon icons8-Pin-Filled" width="20" height="20"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABfklEQVQ4T6WU0U0CQRCG/90EnimBDtQOsAKxAs+EnfAGVKBUIL6RXR7OCsQKwA6wAinBe12SHTMGyN5xF+5kkn2b+TIz/z+r8I8gomdmHgGYOOfSGKGa8gaDQU9rvTrUMfNjDG0ETJKk02q1vpVSnbiRGNoIaIxZKqXuKqa6t9YuawOJaAzgpWpFzPwD4LYUOBwOuyGEETNfA5C3BdAtjlqEC/QEaIxJpJNzxRWdTk+ARLQBcNVQ/SyE0F8sFusToCjZbrfXdaHM/LHb7ZI0TWWHKN1hTWgGIBFlaxn7HJSZN865m+JqKm1DRGkIIdVazyrGz6y1OYNXjiy3CuDp6C2l5F5zQjHzp3Oud7ZDIuoDeI8Sp977WVEoZn51zonZc5Eb2RgjJl5FHpxaa6VbFHaaee+7B2VLRdkfvsAEevRVnHyAMvOs+G0d8o4diggAHgB8aa378/lczq1x/AGjw3/z3o/LRqlLVtGHObHWikUuCmWM2TJzInd4EWlf/Avee7REp9E1bAAAAABJRU5ErkJggg==">
                    </button>
                  </form>
                </span>
                <span style="cursor:pointer;" class="col s8 truncate activator tooltipped" data-position="bottom"
                      data-delay="50" data-tooltip="Goal name - {{ $goals->goalname }}">{{ $goals->goalname }}</span>
                <span style="cursor:pointer;" class="col s2 activator tooltipped" data-position="bottom" data-delay="50"
                      data-tooltip="View details"><i class="material-icons right">more_vert</i></span>
              </span>
                                <br><br>
                                <div style="border-top:1px solid grey;"><br>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        Priority :
                                        {{$goals->goalpriority}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        End date :
                                        {{$goals->goalenddate}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        Start date :
                                        {{$goals->goalstartdate}}
                                    </div>
                                </div>
                                <div style="border-top:1px solid grey;">
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col s3">
                                        <a class="waves-effect waves-light btn btn-floating tooltipped"
                                           data-position="bottom" data-delay="50" data-tooltip="Go to goal"
                                           href="{{ url('/goal/'.$goals->goalid) }}"><i class="material-icons">exit_to_app</i></a>
                                    </div>
                                    <div class="col s3">
                                        <form action="{{route('deletegoal')}}" method="post">
                                            {{csrf_field()}}
                                            <button type="submit"
                                                    class="waves-effect waves-light btn btn-floating tooltipped"
                                                    data-position="bottom" data-delay="50" data-tooltip="Delete goal">
                                                <input type="hidden" name="goalid" value="{{$goals->goalid}}"><i
                                                        class="material-icons  ">delete</i></button>
                                        </form>
                                    </div>
                                    <div class="col s3">
                                        @if ($goals->goalauthorization=="gift")
                                            <a class="waves-effect waves-light btn btn-floating tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is shared to you">
                                                <i class="material-icons">share</i>
                                            </a>
                                        @else
                                            <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is not shared">
                                                <i class="material-icons">share</i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col s3">
                                        @if ($goals->goalauthorization=="aligned")
                                            <a class="waves-effect waves-light btn btn-floating tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is aligned to you">
                                                <i class="material-icons">call_merge</i>
                                            </a>
                                        @else
                                            <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is not aligned">
                                                <i class="material-icons">call_merge</i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s10 tooltipped" data-position="bottom" data-delay="50"
                                         data-tooltip="completed percentage">
                                        @if ($goals->goalcompletedpercentage<=30)
                                            <div class="progress red lighten-4">
                                                <div class="determinate red darken-4"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($goals->goalcompletedpercentage<=60)
                                            <div class="progress orange lighten-4">
                                                <div class="determinate orange darken-4"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($goals->goalcompletedpercentage<=80)
                                            <div class="progress yellow lighten-4">
                                                <div class="determinate yellow darken-4"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($goals->goalcompletedpercentage<100)
                                            <div class="progress green lighten-4">
                                                <div class="determinate green darken-4"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($goals->goalcompletedpercentage==100)
                                            <div class="progress  light-green accent-3">
                                                <div class="determinate  light-green accent-3"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col s2 tooltipped" data-position="bottom" data-delay="50"
                                         data-tooltip="{{ $goals->goalcompletedpercentage }}% completed">
                                        @if ($goals->goalcompletedpercentage<=30)
                                            <span class="red-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($goals->goalcompletedpercentage<=60)
                                            <span class="orange-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($goals->goalcompletedpercentage<=80)
                                            <span class="yellow-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($goals->goalcompletedpercentage<100)
                                            <span class="green-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($goals->goalcompletedpercentage==100)
                                        <!-- Christmas Star icon by Icons8 -->
                                            <img class="icon icons8-Christmas-Star" width="20" height="20"
                                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAACKUlEQVQ4T62UPW8TQRCG39m9u5Ao1tmyQGBcJMiRXCGMhGlQiERFCkSJkBD8BCpaXNHyF6AjDYIGWhtBkTS2qIysfFUWNLEgDrbvbgbtOef4C5+LXLc7s8+8887eEs75o3PmYS6gbOdL/s9gw37Q2IgTEAuU6koS3sJ+7yBwnXR7le41D2dB44Hb+RIIL3t7AdQSKnEqZwKlml+BJ1WAkgYIJeIkeJ3u7339n8rZwJ38GwBPzeEQCIAuYNd52MjNBMrna3cY+iYHuAtQSjwugGlBJ9WiSvRrRkC1TLAuUQ2gFghliLQAqsHGIRXqB2G27Kzd4GN8ky6WgjYA/6y+dVHBQEMPQ5g6C3qC4EQgXfFI8RNrc3dr0LKBAqoMkIsosSPgvwI7o+H/YtgZFa6lY0AAPOOBQCfkkYGFlgx7MQKNAizg3wIQwz8CwENHxmATwKh9o5Tb4vIfAZ8A9hUF/8go1OA2g4/N/qiyqP7UKXsfck3u0GWTpF1Ap3XooU4TtDvw8C0V68/Gpz0V2Hufa0mPXFiAk1WA6g8FSuBc1YAdHqtQsT7xK04FdrdyAiHYWQVyRq8NOYCd1eZutKj4IzWXwu67NdEpgk6dtify0W8Gtwc2nMaoWJ8QNLERfMo9Dzr0uq8CFRBKdKteNot+DCVjR189F6jYqA2rnAqkZf2CFulxBBpvy4DZwysrY22O50wA5cvqdVrf/x737oVXbEpu7PM1D3g45x/V0vYVEDEg7AAAAABJRU5ErkJggg==">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-reveal"
                                 style="opacity: 0.7;filter: alpha(opacity=70); /* For IE8 and earlier *">
                                <span class="card-title grey-text text-darken-4">{{ $goals->goalname }}<i
                                            class="material-icons right">close</i></span>
                                <ol class="collection">
                                    @foreach ($task as $tasks)
                                        @if($goals->goalid==$tasks->goalid)
                                            <li class="collection-item">
                                                {{$tasks->taskname}}&nbsp;&nbsp;<b>{{ $tasks->taskcompletedpercentage }}
                                                    %</b>
                                            </li>
                                        @endif
                                    @endforeach

                                </ol>
                                <ul class="collection">
                                    @if ($goals->gottasks==0)
                                        <li class="collection-item">
                                            No Tasks yet...
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($alignedgoal as $alignedgoals)
                    @if($alignedgoals->pinned==1)
                        <div class="col l4 m6 s12 card sticky-action responsive">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{asset('uploads/goals/'.$alignedgoals->goalpicturetwo)}}"
                                     alt="goal picture">
                            </div>
                            <div class="card-content">
              <span class="card-title  grey-text text-darken-4">
                <span class="col s2 tooltipped" style="cursor:pointer;" data-position="right" data-delay="50"
                      data-tooltip="Pin this goal">
                  <form method="post" action="{{ route('dashboard') }}" id="unpin" style="position:inline;">
                      {{ csrf_field() }}
                      <input type="hidden" name="pinned" value="0">
                    <input type="hidden" name="goalid" value="{{$alignedgoals->goalid}}">
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="action" value="1">
                    <button type="submit" style="border:none;background-color:#fff;" id="unpinbtn">
                        <img class="icon icons8-Pin-Filled" width="20" height="20"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABfklEQVQ4T6WU0U0CQRCG/90EnimBDtQOsAKxAs+EnfAGVKBUIL6RXR7OCsQKwA6wAinBe12SHTMGyN5xF+5kkn2b+TIz/z+r8I8gomdmHgGYOOfSGKGa8gaDQU9rvTrUMfNjDG0ETJKk02q1vpVSnbiRGNoIaIxZKqXuKqa6t9YuawOJaAzgpWpFzPwD4LYUOBwOuyGEETNfA5C3BdAtjlqEC/QEaIxJpJNzxRWdTk+ARLQBcNVQ/SyE0F8sFusToCjZbrfXdaHM/LHb7ZI0TWWHKN1hTWgGIBFlaxn7HJSZN865m+JqKm1DRGkIIdVazyrGz6y1OYNXjiy3CuDp6C2l5F5zQjHzp3Oud7ZDIuoDeI8Sp977WVEoZn51zonZc5Eb2RgjJl5FHpxaa6VbFHaaee+7B2VLRdkfvsAEevRVnHyAMvOs+G0d8o4diggAHgB8aa378/lczq1x/AGjw3/z3o/LRqlLVtGHObHWikUuCmWM2TJzInd4EWlf/Avee7REp9E1bAAAAABJRU5ErkJggg==">
                    </button>
                  </form>
                </span>
                <span style="cursor:pointer;" class="col s8 truncate activator tooltipped" data-position="bottom"
                      data-delay="50" data-tooltip="Goal name - {{ $alignedgoals->goalname }}">{{ $alignedgoals->goalname }}</span>
                <span style="cursor:pointer;" class="col s2 activator tooltipped" data-position="bottom" data-delay="50"
                      data-tooltip="View details"><i class="material-icons right">more_vert</i></span>
              </span>
                                <br><br>
                                <div style="border-top:1px solid grey;"><br>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        Priority :
                                        {{$alignedgoals->goalpriority}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        End date :
                                        {{$alignedgoals->goalenddate}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        Start date :
                                        {{$alignedgoals->goalstartdate}}
                                    </div>
                                </div>
                                <div style="border-top:1px solid grey;">
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col s3">
                                        <a class="waves-effect waves-light btn btn-floating tooltipped"
                                           data-position="bottom" data-delay="50" data-tooltip="Go to goal"
                                           href="{{ url('/goal/'.$alignedgoals->goalid) }}"><i class="material-icons">exit_to_app</i></a>
                                    </div>
                                    <div class="col s3">
                                        <form action="{{route('deletegoal')}}" method="post">
                                            {{csrf_field()}}
                                            <button type="submit"
                                                    class="waves-effect waves-light btn btn-floating tooltipped"
                                                    data-position="bottom" data-delay="50" data-tooltip="Delete goal">
                                                <input type="hidden" name="goalid" value="{{$alignedgoals->goalid}}"><i
                                                        class="material-icons  ">delete</i></button>
                                        </form>
                                    </div>
                                    <div class="col s3">
                                        @if ($alignedgoals->goalauthorization=="gift")
                                            <a class="waves-effect waves-light btn btn-floating tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is shared to you">
                                                <i class="material-icons">share</i>
                                            </a>
                                        @else
                                            <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is not shared">
                                                <i class="material-icons">share</i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col s3">
                                        @if ($alignedgoals->email!=Auth::User()->email)
                                            <a class="waves-effect waves-light btn btn-floating tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is aligned to you">
                                                <i class="material-icons">call_merge</i>
                                            </a>
                                        @else
                                            <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is not aligned">
                                                <i class="material-icons">call_merge</i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s10 tooltipped" data-position="bottom" data-delay="50"
                                         data-tooltip="completed percentage">
                                        @if ($alignedgoals->goalcompletedpercentage<=30)
                                            <div class="progress red lighten-4">
                                                <div class="determinate red darken-4"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($alignedgoals->goalcompletedpercentage<=60)
                                            <div class="progress orange lighten-4">
                                                <div class="determinate orange darken-4"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($alignedgoals->goalcompletedpercentage<=80)
                                            <div class="progress yellow lighten-4">
                                                <div class="determinate yellow darken-4"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($alignedgoals->goalcompletedpercentage<100)
                                            <div class="progress green lighten-4">
                                                <div class="determinate green darken-4"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($alignedgoals->goalcompletedpercentage==100)
                                            <div class="progress  light-green accent-3">
                                                <div class="determinate  light-green accent-3"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col s2 tooltipped" data-position="bottom" data-delay="50"
                                         data-tooltip="{{ $alignedgoals->goalcompletedpercentage }}% completed">
                                        @if ($alignedgoals->goalcompletedpercentage<=30)
                                            <span class="red-text text-darken-4"><b>{{ $alignedgoals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($alignedgoals->goalcompletedpercentage<=60)
                                            <span class="orange-text text-darken-4"><b>{{ $alignedgoals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($alignedgoals->goalcompletedpercentage<=80)
                                            <span class="yellow-text text-darken-4"><b>{{ $alignedgoals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($alignedgoals->goalcompletedpercentage<100)
                                            <span class="green-text text-darken-4"><b>{{ $alignedgoals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($alignedgoals->goalcompletedpercentage==100)
                                        <!-- Christmas Star icon by Icons8 -->
                                            <img class="icon icons8-Christmas-Star" width="20" height="20"
                                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAACKUlEQVQ4T62UPW8TQRCG39m9u5Ao1tmyQGBcJMiRXCGMhGlQiERFCkSJkBD8BCpaXNHyF6AjDYIGWhtBkTS2qIysfFUWNLEgDrbvbgbtOef4C5+LXLc7s8+8887eEs75o3PmYS6gbOdL/s9gw37Q2IgTEAuU6koS3sJ+7yBwnXR7le41D2dB44Hb+RIIL3t7AdQSKnEqZwKlml+BJ1WAkgYIJeIkeJ3u7339n8rZwJ38GwBPzeEQCIAuYNd52MjNBMrna3cY+iYHuAtQSjwugGlBJ9WiSvRrRkC1TLAuUQ2gFghliLQAqsHGIRXqB2G27Kzd4GN8ky6WgjYA/6y+dVHBQEMPQ5g6C3qC4EQgXfFI8RNrc3dr0LKBAqoMkIsosSPgvwI7o+H/YtgZFa6lY0AAPOOBQCfkkYGFlgx7MQKNAizg3wIQwz8CwENHxmATwKh9o5Tb4vIfAZ8A9hUF/8go1OA2g4/N/qiyqP7UKXsfck3u0GWTpF1Ap3XooU4TtDvw8C0V68/Gpz0V2Hufa0mPXFiAk1WA6g8FSuBc1YAdHqtQsT7xK04FdrdyAiHYWQVyRq8NOYCd1eZutKj4IzWXwu67NdEpgk6dtify0W8Gtwc2nMaoWJ8QNLERfMo9Dzr0uq8CFRBKdKteNot+DCVjR189F6jYqA2rnAqkZf2CFulxBBpvy4DZwysrY22O50wA5cvqdVrf/x737oVXbEpu7PM1D3g45x/V0vYVEDEg7AAAAABJRU5ErkJggg==">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-reveal"
                                 style="opacity: 0.7;filter: alpha(opacity=70); /* For IE8 and earlier *">
                                <span class="card-title grey-text text-darken-4">{{ $alignedgoals->goalname }}<i
                                            class="material-icons right">close</i></span>
                                <ol class="collection">
                                    @foreach ($task as $tasks)
                                        @if($alignedgoals->goalid==$tasks->goalid)
                                            <li class="collection-item">
                                                {{$tasks->taskname}}&nbsp;&nbsp;<b>{{ $tasks->taskcompletedpercentage }}
                                                    %</b>
                                            </li>
                                        @endif
                                    @endforeach

                                </ol>
                                <ul class="collection">
                                    @if ($alignedgoals->gottasks==0)
                                        <li class="collection-item">
                                            No Tasks yet...
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                      @endif
                    @endforeach
            </div>
            <ul class="collection">
                <li class="collection-item"><b>other</b></li>
            </ul>
            <div class="row center">
                @foreach ($goal as $goals)
                    @if ($goals->pinned==0)
                        <div class="col l4 m6 s12 card sticky-action responsive">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{asset('uploads/goals/'.$goals->goalpicturetwo)}}"
                                     alt="goal picture">
                            </div>
                            <div class="card-content">
          <span class="card-title  grey-text text-darken-4">
            <span class="col s2 tooltipped" style="cursor:pointer;" data-position="right" data-delay="50"
                  data-tooltip="Pin this goal">
              <form method="post" action="{{ route('dashboard') }}" id="unpin" style="position:inline;">
                  {{ csrf_field() }}
                  <input type="hidden" name="pinned" value="1">
                <input type="hidden" name="goalid" value="{{$goals->goalid}}">
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="action" value="1">
                <button type="submit" style="border:none;background-color:#fff;" id="unpinbtn">
                  <!-- Pin Filled icon by Icons8 -->
                  <img class="icon icons8-Pin-Filled" width="20" height="20"
                       src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABf0lEQVQ4T6WUzXHCQAyFpREFUAIdBA+7d1JBSAVxKgipIKSCkA5IBSEVQM6WZ0kFoQR8944y8tiM8Q/Ywac9aD9L7z0twj++KIoWiPiEiM+TyWRVRmBfXhRFU0TcFPcQ8bEM7QV0zg29978AMDzpqgTtBWTmNQDctUx1b4xZdwbGcTwXkbczEh2I6LYR6JwbpWmqoo8BYCwie0QcVUdtgB9qwDiOw7yTE526mCcirzUgM+8A4KYLoFSTiMjMWrutAXMntz2gX0QUBkFw0B+0aajxuARNACBUZzsF+1KnIrKz1gZVaVpjw8wrEVkh4rJl/MQYUzOuEZjv6gsAZNny3uu+nhglIt/W2unFDpl5BgCfRaFGYTAYLBs0fTfGzM8CnXNj770ufjaKwqy1Cz1XNE2IaFQ422iKXkjTdJNvxzFX5eICqrpWn63j61Mc1AQAeACAHyKaBUGw7xnurDwzpbT4H0Q0bxqlKxyLBzN/fTUiV33IzHsRCXUPryLll/8ASP7A5nfoHrQAAAAASUVORK5CYII=">
                </button>
              </form>
            </span>
            <span style="cursor:pointer;" class="col s8 truncate activator tooltipped" data-position="bottom"
                  data-delay="50" data-tooltip="Goal name - {{ $goals->goalname }}">{{ $goals->goalname }}</span>
            <span style="cursor:pointer;" class="col s2 activator tooltipped" data-position="bottom" data-delay="50"
                  data-tooltip="View details"><i class="material-icons right">more_vert</i></span>
          </span>
                                <br><br>
                                <div style="border-top:1px solid grey;"><br>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        Priority :
                                        {{$goals->goalpriority}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        End date :
                                        {{$goals->goalenddate}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        Start date :
                                        {{$goals->goalstartdate}}
                                    </div>
                                </div>
                                <div style="border-top:1px solid grey;">
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col s3">
                                        <a class="waves-effect waves-light btn btn-floating tooltipped"
                                           data-position="bottom" data-delay="50" data-tooltip="Go to goal"
                                           href="{{ url('/goal/'.$goals->goalid) }}"><i class="material-icons">exit_to_app</i></a>
                                    </div>
                                    <div class="col s3">
                                        <form action="{{route('deletegoal')}}" method="post">
                                            {{csrf_field()}}
                                            <button type="submit"
                                                    class="waves-effect waves-light btn btn-floating tooltipped"
                                                    data-position="bottom" data-delay="50" data-tooltip="Delete goal">
                                                <input type="hidden" name="goalid" value="{{$goals->goalid}}"><i
                                                        class="material-icons  ">delete</i></button>
                                        </form>
                                    </div>
                                    <div class="col s3">
                                        @if ($goals->goalauthorization=="gift")
                                            <a class="waves-effect waves-light btn btn-floating tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is shared to you">
                                                <i class="material-icons">share</i>
                                            </a>
                                        @else
                                            <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is not shared">
                                                <i class="material-icons">share</i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col s3">
                                        @if ($goals->goalauthorization=="aligned")
                                            <a class="waves-effect waves-light btn btn-floating tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is aligned to you">
                                                <i class="material-icons">call_merge</i>
                                            </a>
                                        @else
                                            <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is not aligned">
                                                <i class="material-icons">call_merge</i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s10 tooltipped" data-position="bottom" data-delay="50"
                                         data-tooltip="completed percentage">
                                        @if ($goals->goalcompletedpercentage<=30)
                                            <div class="progress red lighten-4">
                                                <div class="determinate red darken-4"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($goals->goalcompletedpercentage<=60)
                                            <div class="progress orange lighten-4">
                                                <div class="determinate orange darken-4"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($goals->goalcompletedpercentage<=80)
                                            <div class="progress yellow lighten-4">
                                                <div class="determinate yellow darken-4"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($goals->goalcompletedpercentage<100)
                                            <div class="progress green lighten-4">
                                                <div class="determinate green darken-4"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($goals->goalcompletedpercentage==100)
                                            <div class="progress  light-green accent-3">
                                                <div class="determinate  light-green accent-3"
                                                     style="width: {{ $goals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col s2 tooltipped" data-position="bottom" data-delay="50"
                                         data-tooltip="{{ $goals->goalcompletedpercentage }}% completed">
                                        @if ($goals->goalcompletedpercentage<=30)
                                            <span class="red-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($goals->goalcompletedpercentage<=60)
                                            <span class="orange-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($goals->goalcompletedpercentage<=80)
                                            <span class="yellow-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($goals->goalcompletedpercentage<100)
                                            <span class="green-text text-darken-4"><b>{{ $goals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($goals->goalcompletedpercentage==100)
                                        <!-- Christmas Star icon by Icons8 -->
                                            <img class="icon icons8-Christmas-Star" width="20" height="20"
                                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAACKUlEQVQ4T62UPW8TQRCG39m9u5Ao1tmyQGBcJMiRXCGMhGlQiERFCkSJkBD8BCpaXNHyF6AjDYIGWhtBkTS2qIysfFUWNLEgDrbvbgbtOef4C5+LXLc7s8+8887eEs75o3PmYS6gbOdL/s9gw37Q2IgTEAuU6koS3sJ+7yBwnXR7le41D2dB44Hb+RIIL3t7AdQSKnEqZwKlml+BJ1WAkgYIJeIkeJ3u7339n8rZwJ38GwBPzeEQCIAuYNd52MjNBMrna3cY+iYHuAtQSjwugGlBJ9WiSvRrRkC1TLAuUQ2gFghliLQAqsHGIRXqB2G27Kzd4GN8ky6WgjYA/6y+dVHBQEMPQ5g6C3qC4EQgXfFI8RNrc3dr0LKBAqoMkIsosSPgvwI7o+H/YtgZFa6lY0AAPOOBQCfkkYGFlgx7MQKNAizg3wIQwz8CwENHxmATwKh9o5Tb4vIfAZ8A9hUF/8go1OA2g4/N/qiyqP7UKXsfck3u0GWTpF1Ap3XooU4TtDvw8C0V68/Gpz0V2Hufa0mPXFiAk1WA6g8FSuBc1YAdHqtQsT7xK04FdrdyAiHYWQVyRq8NOYCd1eZutKj4IzWXwu67NdEpgk6dtify0W8Gtwc2nMaoWJ8QNLERfMo9Dzr0uq8CFRBKdKteNot+DCVjR189F6jYqA2rnAqkZf2CFulxBBpvy4DZwysrY22O50wA5cvqdVrf/x737oVXbEpu7PM1D3g45x/V0vYVEDEg7AAAAABJRU5ErkJggg==">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-reveal"
                                 style="opacity: 0.7;filter: alpha(opacity=70); /* For IE8 and earlier *">
                                <span class="card-title grey-text text-darken-4">{{ $goals->goalname }}<i
                                            class="material-icons right">close</i></span>
                                <ol class="collection">
                                    @foreach ($task as $tasks)
                                        @if($goals->goalid==$tasks->goalid)
                                            <li class="collection-item">
                                                {{$tasks->taskname}}&nbsp;&nbsp;<b>{{ $tasks->taskcompletedpercentage }}
                                                    %</b>
                                            </li>
                                        @endif
                                    @endforeach

                                </ol>
                                <ul class="collection">
                                    @if ($goals->gottasks==0)
                                        <li class="collection-item">
                                            No Tasks yet...
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($alignedgoal as $alignedgoals)
                    @if($alignedgoals->pinned==0)
                        <div class="col l4 m6 s12 card sticky-action responsive">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{asset('uploads/goals/'.$alignedgoals->goalpicturetwo)}}"
                                     alt="goal picture">
                            </div>
                            <div class="card-content">
              <span class="card-title  grey-text text-darken-4">
                <span class="col s2 tooltipped" style="cursor:pointer;" data-position="right" data-delay="50"
                      data-tooltip="Pin this goal">
                  <form method="post" action="{{ route('dashboard') }}" id="unpin" style="position:inline;">
                      {{ csrf_field() }}
                      <input type="hidden" name="pinned" value="0">
                    <input type="hidden" name="goalid" value="{{$alignedgoals->goalid}}">
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="action" value="1">
                    <button type="submit" style="border:none;background-color:#fff;" id="unpinbtn">
                        <img class="icon icons8-Pin-Filled" width="20" height="20"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABfklEQVQ4T6WU0U0CQRCG/90EnimBDtQOsAKxAs+EnfAGVKBUIL6RXR7OCsQKwA6wAinBe12SHTMGyN5xF+5kkn2b+TIz/z+r8I8gomdmHgGYOOfSGKGa8gaDQU9rvTrUMfNjDG0ETJKk02q1vpVSnbiRGNoIaIxZKqXuKqa6t9YuawOJaAzgpWpFzPwD4LYUOBwOuyGEETNfA5C3BdAtjlqEC/QEaIxJpJNzxRWdTk+ARLQBcNVQ/SyE0F8sFusToCjZbrfXdaHM/LHb7ZI0TWWHKN1hTWgGIBFlaxn7HJSZN865m+JqKm1DRGkIIdVazyrGz6y1OYNXjiy3CuDp6C2l5F5zQjHzp3Oud7ZDIuoDeI8Sp977WVEoZn51zonZc5Eb2RgjJl5FHpxaa6VbFHaaee+7B2VLRdkfvsAEevRVnHyAMvOs+G0d8o4diggAHgB8aa378/lczq1x/AGjw3/z3o/LRqlLVtGHObHWikUuCmWM2TJzInd4EWlf/Avee7REp9E1bAAAAABJRU5ErkJggg==">
                    </button>
                  </form>
                </span>
                <span style="cursor:pointer;" class="col s8 truncate activator tooltipped" data-position="bottom"
                      data-delay="50" data-tooltip="Goal name - {{ $alignedgoals->goalname }}">{{ $alignedgoals->goalname }}</span>
                <span style="cursor:pointer;" class="col s2 activator tooltipped" data-position="bottom" data-delay="50"
                      data-tooltip="View details"><i class="material-icons right">more_vert</i></span>
              </span>
                                <br><br>
                                <div style="border-top:1px solid grey;"><br>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        Priority :
                                        {{$alignedgoals->goalpriority}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        End date :
                                        {{$alignedgoals->goalenddate}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        Start date :
                                        {{$alignedgoals->goalstartdate}}
                                    </div>
                                </div>
                                <div style="border-top:1px solid grey;">
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col s3">
                                        <a class="waves-effect waves-light btn btn-floating tooltipped"
                                           data-position="bottom" data-delay="50" data-tooltip="Go to goal"
                                           href="{{ url('/goal/'.$alignedgoals->goalid) }}"><i class="material-icons">exit_to_app</i></a>
                                    </div>
                                    <div class="col s3">
                                        <form action="{{route('deletegoal')}}" method="post">
                                            {{csrf_field()}}
                                            <button type="submit"
                                                    class="waves-effect waves-light btn btn-floating tooltipped"
                                                    data-position="bottom" data-delay="50" data-tooltip="Delete goal">
                                                <input type="hidden" name="goalid" value="{{$alignedgoals->goalid}}"><i
                                                        class="material-icons  ">delete</i></button>
                                        </form>
                                    </div>
                                    <div class="col s3">
                                        @if ($alignedgoals->goalauthorization=="gift")
                                            <a class="waves-effect waves-light btn btn-floating tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is shared to you">
                                                <i class="material-icons">share</i>
                                            </a>
                                        @else
                                            <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is not shared">
                                                <i class="material-icons">share</i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col s3">
                                        @if ($alignedgoals->email!=Auth::User()->email)
                                            <a class="waves-effect waves-light btn btn-floating tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is aligned to you">
                                                <i class="material-icons">call_merge</i>
                                            </a>
                                        @else
                                            <a class="waves-effect waves-light btn btn-floating blue lighten-3 tooltipped"
                                               data-position="bottom" data-delay="50"
                                               data-tooltip="this goal is not aligned">
                                                <i class="material-icons">call_merge</i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s10 tooltipped" data-position="bottom" data-delay="50"
                                         data-tooltip="completed percentage">
                                        @if ($alignedgoals->goalcompletedpercentage<=30)
                                            <div class="progress red lighten-4">
                                                <div class="determinate red darken-4"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($alignedgoals->goalcompletedpercentage<=60)
                                            <div class="progress orange lighten-4">
                                                <div class="determinate orange darken-4"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($alignedgoals->goalcompletedpercentage<=80)
                                            <div class="progress yellow lighten-4">
                                                <div class="determinate yellow darken-4"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($alignedgoals->goalcompletedpercentage<100)
                                            <div class="progress green lighten-4">
                                                <div class="determinate green darken-4"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @elseif ($alignedgoals->goalcompletedpercentage==100)
                                            <div class="progress  light-green accent-3">
                                                <div class="determinate  light-green accent-3"
                                                     style="width: {{ $alignedgoals->goalcompletedpercentage }}%"></div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col s2 tooltipped" data-position="bottom" data-delay="50"
                                         data-tooltip="{{ $alignedgoals->goalcompletedpercentage }}% completed">
                                        @if ($alignedgoals->goalcompletedpercentage<=30)
                                            <span class="red-text text-darken-4"><b>{{ $alignedgoals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($alignedgoals->goalcompletedpercentage<=60)
                                            <span class="orange-text text-darken-4"><b>{{ $alignedgoals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($alignedgoals->goalcompletedpercentage<=80)
                                            <span class="yellow-text text-darken-4"><b>{{ $alignedgoals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($alignedgoals->goalcompletedpercentage<100)
                                            <span class="green-text text-darken-4"><b>{{ $alignedgoals->goalcompletedpercentage }}
                                                    %</b></span>
                                        @elseif ($alignedgoals->goalcompletedpercentage==100)
                                        <!-- Christmas Star icon by Icons8 -->
                                            <img class="icon icons8-Christmas-Star" width="20" height="20"
                                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAACKUlEQVQ4T62UPW8TQRCG39m9u5Ao1tmyQGBcJMiRXCGMhGlQiERFCkSJkBD8BCpaXNHyF6AjDYIGWhtBkTS2qIysfFUWNLEgDrbvbgbtOef4C5+LXLc7s8+8887eEs75o3PmYS6gbOdL/s9gw37Q2IgTEAuU6koS3sJ+7yBwnXR7le41D2dB44Hb+RIIL3t7AdQSKnEqZwKlml+BJ1WAkgYIJeIkeJ3u7339n8rZwJ38GwBPzeEQCIAuYNd52MjNBMrna3cY+iYHuAtQSjwugGlBJ9WiSvRrRkC1TLAuUQ2gFghliLQAqsHGIRXqB2G27Kzd4GN8ky6WgjYA/6y+dVHBQEMPQ5g6C3qC4EQgXfFI8RNrc3dr0LKBAqoMkIsosSPgvwI7o+H/YtgZFa6lY0AAPOOBQCfkkYGFlgx7MQKNAizg3wIQwz8CwENHxmATwKh9o5Tb4vIfAZ8A9hUF/8go1OA2g4/N/qiyqP7UKXsfck3u0GWTpF1Ap3XooU4TtDvw8C0V68/Gpz0V2Hufa0mPXFiAk1WA6g8FSuBc1YAdHqtQsT7xK04FdrdyAiHYWQVyRq8NOYCd1eZutKj4IzWXwu67NdEpgk6dtify0W8Gtwc2nMaoWJ8QNLERfMo9Dzr0uq8CFRBKdKteNot+DCVjR189F6jYqA2rnAqkZf2CFulxBBpvy4DZwysrY22O50wA5cvqdVrf/x737oVXbEpu7PM1D3g45x/V0vYVEDEg7AAAAABJRU5ErkJggg==">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-reveal"
                                 style="opacity: 0.7;filter: alpha(opacity=70); /* For IE8 and earlier *">
                                <span class="card-title grey-text text-darken-4">{{ $alignedgoals->goalname }}<i
                                            class="material-icons right">close</i></span>
                                <ol class="collection">
                                    @foreach ($task as $tasks)
                                        @if($alignedgoals->goalid==$tasks->goalid)
                                            <li class="collection-item">
                                                {{$tasks->taskname}}&nbsp;&nbsp;<b>{{ $tasks->taskcompletedpercentage }}
                                                    %</b>
                                            </li>
                                        @endif
                                    @endforeach

                                </ol>
                                <ul class="collection">
                                    @if ($alignedgoals->gottasks==0)
                                        <li class="collection-item">
                                            No Tasks yet...
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                      @endif
                    @endforeach
            </div>
        @endif
        {{-- eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeennnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndddddddddddddddddddddd --}}
    </div>
    <!-- Tap Target Structure -->
    <div class="fab" id="view-source">
        <div class="tap-target" data-activates="view-source">
            <div class="tap-target-content white-text"><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<h5>Start Building Your Life Goals</h5>
                <p>
                    Click on "+" and define your Goal


                </p>


            </div>
        </div>


        <a href="#addgoal" id="addgoalbtntwo" style="display:none;"
           class="btn-floating btn-large waves-effect waves-light red tooltipped hide-on-small-only pulse"
           data-position="top" data-delay="50" data-tooltip="ADD GOAL"><i class="material-icons">add</i></a>
        <a href="#addgoal"
           class="btn-floating btn-large waves-effect waves-light red tooltipped hide-on-med-and-up pulse"
           data-position="top" data-delay="50" data-tooltip="ADD GOAL"><i class="material-icons">add</i></a>
    </div>
    @if ($goal->isEmpty()||($compare->diffInHours($carbon))<1)
        <script>
            var addgoalbtntwo = document.getElementById("addgoalbtntwo");
            addgoalbtntwo.style.display = "block";
            $('.tap-target').tapTarget('open');
        </script>
        @endif
        </div>


        <!-- Chat 1.0 Start ------------------------------------------------------------>
        <!-- Chat 1.0 Style Sheet Start ------------------------------------------------>
        <style>

            body {

                font-family: sans-serif;
            }

            .msg_head {
                background: #f39c12;
                color: white;
                padding: 12px;
                font-weight: bold;
                cursor: pointer;

            }

            .msg_box {
                position: fixed;
                bottom: -5px;
                width: 300px;
                background: white;
                z-index: 10;
                right: 8px
            }

            .msg_head {
                background: #3498db;
            }

            .msg_body {
                background: white;
                height: 300px;
                font-size: 12px;
                padding: 15px;
                overflow-y: scroll;
                overflow-x: hidden;
                border-style: solid;
                border-width: 0px 1px 0px 1px;
            }

            .msg_input {
                width: 100%;

                border-style: solid;
                border-width: 0px 1px 0px 1px;
            }

            .msg_a {
                position: relative;
                background: #FDE4CE;
                padding: 2px;
                min-height: 10px;
                margin-bottom: 5px;
                margin-right: 10px;
                border-radius: 5px;

            }

            .msg_a:before {
                content: "";
                position: absolute;
                width: 0px;
                height: 0px;
                border: 10px solid;
                border-color: transparent #FDE4CE transparent transparent;
                left: -20px;
                top: 7px;
            }

            .msg_b {
                background: #EEF2E7;
                padding: 3px 2px 2px 2px;
                min-height: 15px;
                margin-bottom: 5px;
                position: relative;
                margin-left: 10px;
                border-radius: 5px;
                word-wrap: break-word;
            }

            .msg_b:after {
                content: "";
                position: absolute;
                width: 0px;
                height: 0px;
                border: 10px solid;
                border-color: transparent transparent transparent #EEF2E7;
                right: -20px;
                top: 7px;
            }

            .msg_footer {
                background: white;
                height: 70px;
                font-size: 12px;
                padding: 0px 0px 7px 15px;
                border-style: solid;
                border-width: 0px 1px 0px 1px;
            }

            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #000;
            }

            /* label underline focus color */
            .input-field input[type=text]:focus {

                border: 1px;
                border-radius: 10px;
                outline: none;
                box-shadow: none;

                box-sizing: content-box;
            }

            .ctext-l {
                float: left;
                padding-left: 10px;
                text-align: left;
            }

            .ctext-r {
                float: right;
                padding-left: 0px;
                text-align: right;
                width: 390px;
            }

            .cmacro {
                margin-top: 1px;
                width: 85%;
                border-radius: 5px;
                padding: 0px 5px 5px 0px;
                display: flex;

            }

        </style>
        <!-- Chat 1.0 Style Sheet End -------------------------------------------------->

        <!-- Chat 1.0 Body Start ------------------------------------------------------->
        <div class="msg_box" style="">
            <div class="msg_head">LISA

            </div>
            <div class="msg_wrap">

                <div class="msg_body">
                    <!-- Chat box Hide Content -->
                    <div style="  text-align: center;" id="myContent">
                        <h2 style="font-size: 23px">I'm Your <br> Virtual Assistant <br>LISA
                        </h2>
                    </div>
                    <!--  end of chat hide content -->


                    <div class="msg_push"></div>

                </div>


                <div class="msg_footer">

                    <input style="width: 250px;border: 2px; "

                           type="text" placeholder=" Message "
                           class="msg_input" onclick="toggler('myContent');">


                </div>
            </div>
        </div>

        <!-- Chat 1.0 Body End -------------------------------------------------------------------------->
        <!-- Chat 1.0 Script Start ---------------------------------------------------------------------->
        <script>
            function toggler(divId) {
                $("#" + divId).fadeOut('slow');
            }

        </script>
        <script>
            var dt = new Date().getHours();
            if (dt >= 0 && dt <= 11) {
                ddate = "Good Morning! How can I help you ?";
            } else if (dt >= 12 && dt <= 17) {
                ddate = "Good Afternoon! How can I help you ?";
            } else {

                ddate = "Good Evening! How can I help you ?";
            }
            var ddate;

            var botMessageintro = "Hello ";
            var name = "{{ Auth::User()->fname }}";




            $(document).ready(function () {
                $('.msg_wrap').hide();
                $('.msg_head').click(function () {


                    $('.msg_wrap').slideToggle('slow');
                });

                $('.user').click(function () {

                    $('.msg_wrap').show();
                    $('.msg_box').show();
                });


                var me = {};
                me.avatar = "{{asset('uploads/avatars/'.Auth::User()->avatar)}}";

                var you = {};
                you.avatar = "https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-512.png";


                var botMessage = "";

                $('input').keypress(
                    function (e) {
                        if (e.keyCode == 13) {
                            var text = $(this).val();
                            if (text !== "") {
                                $(this).val('');
                                <!-- Sample Text Start -->
                                var re01 = /goal/gi;
                                var re011 = /goals/gi;
                                var re02 = /define/gi;
                                var re03 = /create/gi;

                                var re1 = /files/gi;
                                var re11 = /file/gi;

                                var re2 = /upload/gi;
                                var re3 = /store/gi;

                                var re4 = /send/gi;
                                var re5 = /invite/gi;

                                var re6 = /Schedule/gi;
                                var re7 = /what/gi;

                                var re8 = /add/gi;
                                var re9 = /profile/gi;
                                var re10 = /picture/gi;
                                var re12 = /change/gi;

                                var re13 = /LISA/gi;
                                var re14 = /hello/gi;


                                <!-- Sample Text End -->

                                if (text.search((re02 || re03) && re01 || re011) !== -1) {

                                    botMessage = "Go to Dashboard and Click New Goal and Submit The Form";
                                }
                                else if (text.search((re1 || re11) && (re2 || re3)) !== -1) {

                                    botMessage = "You can Upload Files to My Documents Area";
                                }
                                else if (text.search(re4 && re5) !== -1) {

                                    botMessage = "If you Want to Invite Some one to This web Site You can Use Send Invite";
                                }
                                else if (text.search(re6 && re7) !== -1) {

                                    botMessage = "You can See Your Event Dates and Dead lines";

                                } else if (text.search((re8 || re12) && (re10 || re9)) !== -1) {

                                    botMessage = "You can Upload New or Change Current Profile Picture Using My Profile Section ";

                                } else if (text.search(re14 || re13) !== -1) {

                                    botMessage = "Hello! Im LISA ";

                                } else {

                                    botMessage = "I can't understand Please Tell Me Simply";
                                }


                            }

                            $('<div class="msg_a">' +
                                '<div class="cmacro">' +
                                '<div class="avatar" style="padding:3px 46px 0px 10px !important"><img  class="img-circle" style="border-radius: 50%; width: 40px;position: absolute;"  src="' + me.avatar + '" /></div>' +
                                '<div class="ctext ctext-l">' +
                                '<p>' + text + '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>+').insertBefore('.msg_push');

                            $('<div class="msg_b">' +
                                '<div class="cmacro">' +
                                '<div class="ctext ctext-r">' +
                                '<p>' + botMessage + '</p>' +
                                '</div>' +
                                '<div class="avatar2" style="padding:0px 0px 0px 30px !important;"><img  style=" margin-top: 5px;border-radius: 50%; width: 40px;position: absolute;right: 10px " src="' + you.avatar + '"  /></div>' +
                                '</div>' +
                                '</div>+').insertBefore('.msg_push');


                            $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
                        }

                    });

                $('<div class="msg_b">' +
                    '<div class="cmacro">' +
                    '<div class="ctext ctext-r">' +
                    '<p>' + botMessageintro + name + '<br>' + ddate + '<br>' + '</p>' +
                    '</div>' +
                    '<div class="avatar2" style="padding:0px 0px 0px 30px !important;"><img  style=" margin-top: 5px;border-radius: 50%; width: 40px;position: absolute;right: 10px " src="' + you.avatar + '"  /></div>' +
                    '</div>' +
                    '</div>+').insertBefore('.msg_push');



            });
        </script>
        <!-- Chat 1.0 Script End ------------------------------------------------------------------------>
        <!--Chat 1.0 END -------------------------------------------------------------------------------->


@endsection
