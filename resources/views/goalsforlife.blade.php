<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Life With Goals</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href="{{asset('materialize/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.light_blue-blue.min.css" />
    <link rel="stylesheet" href="styles_goalcards">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style3.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
    html {
    font-family: 'Roboto', sans-serif;
  }
        #view-source {
          position: fixed;
          display: block;
          right: 0;
          bottom: 0;
          margin-right: 40px;
          margin-bottom: 40px;
          z-index: 900;
        }

        .mdl-layout__content {
        	padding: 30px;
        	flex: none;
        }

        .portfolio-max-width {
          max-width: 900px;
          margin: auto;
        }

        .team_hr {
            border: 1px solid #fff;
            width: 39.5%;
            float: left;
        }

        .team_hr_left {
            margin-right: 30px;
            margin-left: 15px;
        }

        .team_hr_right {
            margin-left: 30px;
        }

        .hr_gray {
            border: 1px solid #cccccc;
        }

        .drawer-separator {
          height: 1px;
          background-color: #dcdcdc;
          margin: 8px 0;
        }

        .img-size{
          align-items: center;
        }

        .remember{
          width: 20px
        }

        .foot{
          margin-top:150px;
        }
    </style>

  </head>
  <body id="page">

    <ul class="cb-slideshow">
        <li><span>Image 01</span><div><h3>Revolution</h3></div></li>
        <li><span>Image 02</span><div><h3>Innovation</h3></div></li>
        <li><span>Image 03</span><div><h3>Balance</h3></div></li>
        <li><span>Image 04</span><div><h3>Equality</h3></div></li>
        <li><span>Image 05</span><div><h3>Engineering</h3></div></li>
        <li><span>Image 06</span><div><h3>Leading</h3></div></li>
    </ul>

    <div class="demo-layout-transparent mdl-layout mdl-js-layout">

          <nav>
      <div class="nav-wrapper blue darken-4">

          <a href="{{url('/')}}" class="brand-logo  "><img src="{{asset('favicon/LOGO.png')}}" alt="" height= "35px" width = "184px">
          </a>


      </div>
    </nav>
      <main  class="mdl-layout__content main" style="font-family: 'Roboto', sans-serif;">
        <div class="row">
          <div class="col s12 l6 m6 right" >
          <div class="card blue darken-4 ">
            <div class="card-tabs" >
              <ul class="tabs tabs-fixed-width">
                <li class="tab "><a class="active blue-text" style="border-right:1px solid #e2e2e2" href="#test4">Login</a></li>
                <li class="tab"><a  class="blue-text" style="border-left:1px solid #e2e2e2" href="#test5">Register</a></li>
              </ul>
            </div>
            <div class="card-content grey lighten-4">
              <div id="test4" >
                <form action="{{route('checkemail')}}" method="post" id="mailform">
                  <input type="text" class="hide" name="checkemail" id="checkmail">
                </form>
                <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    @if($errors->has('email')||$errors->has('password'))
                      @if ($errors->first('email')=="fail")
                        <div class="row">
                            <div class="red-text chip col s12 l8 push-l2 center-align"><i class="close material-icons">not_interested</i>Sorry, Your Email or Password is incorrect.</div><br>
                        </div>
                      @endif
                    @endif
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix" style="color:grey;">email</i>
                        <input id="icon_prefix"  name="email" type="email" placeholder="email" class="validate" required autofocus>
                        <label for="icon_prefix" data-error="you are missing required characters" id="a">
                          Email Address
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix" style="color:grey;">lock</i>
                        <input id="password"   name="password" type="password" placeholder="password" class="validate" required>
                        <label for="password" data-error="you cannot leave the password empty" id="b">
                          Password
                        </label>
                        <span class="right">
                          <a href="{{ route('password.request') }}" class="blue-text">
                              Forgot Your Password  ?
                          </a>
                        </span>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col s12 center">
                          <input type="checkbox" id="remeber" name="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label for="remeber">Remember me</label>
                        </div>
                        <div class="col s6">

                        </div>
                      </div>


                    <div class="center">
                        <div >
                        <button type="submit" class="waves-effect waves-light btn blue darken-4">Login</button>
                      </div>
                    </div>

                  </form>
              </div>
<script type="text/javascript">
  var dob=0;
  var num=0;
  var pass=0;
  var conpass=0;
  var em = 0;
</script>

              <div id="test5">
                    <form  role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                      <div class="row">
                        <div class="input-field col m6 s12 l6">
                          <input id="first_name" name="fname" type="text" class="validate"  required>
                          <label for="last_name">
                            First Name
                          </label>
                        </div>
                        <div class="input-field col m6 s12 l6">
                          <input id="last_name" type="text" name="lname" class="validate" required>
                          <label for="last_name">
                            Last Name
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="regemail" oninput="regemailerrorFunc()" name="email" type="email" class="validate" required>
                          <label for="regemail">
                            Email
                          </label>
                          <span class="red-text" id="regemailerror">{{ $errors->first('email') }}</span>

                          <script type="text/javascript">
                            var regemail=document.getElementById("regemail");
                            var regemailerror=document.getElementById("regemailerror");
                            var checkmail=document.getElementById("checkmail");
                            var form=document.getElementById("mailform");
                            var action = form.getAttribute("action");
                            function regemailerrorFunc() {
                              var email=regemail.value;
                              var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                              if(email.match(mailformat))
                              {
                                // checkmail.value=email;
                                // var form_data = new FormData(form);
                                // var xhr = new XMLHttpRequest();
                                // xhr.open('POST', action, true);
                                // console.log('sd');
                                // console.log('sds');
                                // xhr.send(form_data);
                                // xhr.onreadystatechange = function () {
                                //   if(xhr.readyState == 4 && xhr.status == 200) {
                                //      var result = xhr.responseText;
                                //      console.log(result);
                                //      if (result=='true') {
                                       regemailerror.classList.remove('red-text');
                                       regemailerror.classList.add('green-text');
                                       regemailerror.innerHTML='your email is valid';
                                       regemail.style.borderColor = "green";
                                       em=1;
                                       if(num==1 && pass==1 && conpass==1 && dob==1 && em==1){
                                         document.getElementById("register").disabled=false;
                                       }
                                    //  }
                                    //  else {
                                    //    regemailerror.classList.remove('green-text');
                                    //    regemail.style.borderColor = "red";
                                    //    regemailerror.classList.add('red-text');
                                    //    regemailerror.innerHTML='your email is already registered';
                                    //    em=0;
                                    //    if(num!=1 || pass!=1 || conpass!=1 || dob!=1 || em!=1){
                                    //      document.getElementById("register").disabled=true;
                                    //    }
                                    //  }

                                  }


                              else {
                                regemailerror.classList.remove('green-text');
                                regemail.style.borderColor = "red";
                                regemailerror.classList.add('red-text');
                                regemailerror.innerHTML='your email is not valid';
                                em=0;
                                if(num!=1 || pass!=1 || conpass!=1 || dob!=1 || em!=1){
                                  document.getElementById("register").disabled=true;
                                }
                              }
                            }

                          </script>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12 m6 l6">
                          <input id="regpassword" oninput="regpassworderrorFunc()" name="password" type="password" class="validate" autocomplete="off" >
                          <label for="regpassword">
                            Password
                          </label>
                          <span id="regpassworderror"></span>
                          <script type="text/javascript">
                            var password=document.getElementById("regpassword");
                            var passworderror=document.getElementById("regpassworderror");
                            function regpassworderrorFunc() {
                              var value=password.value;
                              if(value.length<8) {
                                passworderror.classList.remove('green-text');
                                password.style.borderColor = "red";
                                passworderror.classList.add('red-text');
                                passworderror.innerHTML='your password is too short';
                                pass=0;
                                if(num!=1 || pass!=1 || conpass!=1 || dob!=1 || em!=1){
                                  document.getElementById("register").disabled=true;
                                }
                              }
                              else {
                                passworderror.classList.remove('red-text');
                                passworderror.classList.add('green-text');
                                passworderror.innerHTML='strong';
                                password.style.borderColor = "green";
                                pass=1;
                                console.log(pass);
                                if(num==1 && pass==1 && conpass==1 && dob==1 && em==1){
                                  document.getElementById("register").disabled=false;
                                }
                              }
                            }

                          </script>
                        </div>
                        <div class="input-field col s12 m6 l6">
                          <input id="regconfirmPassword"  oninput="regconfirmPassworderrorFunc()" type="password" name="password_confirmation" class="validate" >
                          <label for="regconfirmPassword">
                            Confirm Password
                          </label>
                          <span id="regconfirmPassworderror"></span>
                          <script type="text/javascript">
                          var regconfirmPassword=document.getElementById("regconfirmPassword");
                          var regconfirmPassworderror=document.getElementById("regconfirmPassworderror");
                          function regconfirmPassworderrorFunc() {
                            var n = password.value.localeCompare(regconfirmPassword.value)
                            if(n!=0) {
                              regconfirmPassword.style.borderColor = "red";
                              regconfirmPassworderror.classList.remove('green-text');
                              regconfirmPassworderror.classList.add('red-text');
                              regconfirmPassworderror.innerHTML='passwords does not match';
                              conpass=0;
                              if(num!=1 || pass!=1 || conpass!=1 || dob!=1 || em!=1){
                                document.getElementById("register").disabled=true;
                              }
                            }
                            else {
                              regconfirmPassworderror.classList.remove('red-text');
                              regconfirmPassworderror.classList.add('green-text');
                              regconfirmPassworderror.innerHTML='passwords are matching';
                              regconfirmPassword.style.borderColor = "green";
                              conpass=1;
                              console.log(conpass);
                              if(num==1 && pass==1 && conpass==1 && dob==1 && em==1){
                                document.getElementById("register").disabled=false;
                              }
                            }
                          }

                          </script>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12 m6 l6">
                          <label for="gender">Gender</label><br>
                          <select name="gender" id="gender" >
                            {{-- <option value="" disabled selected id="genderselect" onclick="genderselectFunc()">Gender</option> --}}
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                          </select>
                        </div>
                      <div class="input-field col s12 m6 l6">
                        <label>Date of Birth</label><br>
                        <input id="birthDate" oninput="dateValid()" type="date" name="dob">
                        <span id="doberror"></span>
                        <script type="text/javascript">
                        var birthDate=document.getElementById("birthDate");
                        var doberror=document.getElementById("doberror");
                        function dateValid() {
                          var d=new Date(birthDate.value);
                          var e=new Date();
                          if (d.getFullYear()>(e.getFullYear()-6)||d.getFullYear()<(e.getFullYear()-95)) {
                            doberror.innerHTML='your birthdate is invalid';
                            doberror.classList.remove('green-text');
                            doberror.classList.add('red-text');
                            dob=0;
                            if(num!=1 || pass!=1 || conpass!=1 || dob!=1 || em!=1){
                              document.getElementById("register").disabled=true;
                            }
                          }
                          else {
                            doberror.innerHTML='valid';
                            doberror.classList.remove('red-text');
                            doberror.classList.add('green-text');
                            dob=1;
                            console.log(dob);
                            if(num==1 && pass==1 && conpass==1 && dob==1 && em==1){
                              document.getElementById("register").disabled=false;
                            }
                          }
                          console.log(e.getFullYear());
                        }
                        </script>
                      </div>
                      </div>
                      <div class="row">
                        <div class="input-field col l4 m4">
                          <select name="countrycode" id="countryCode">
                          		<option data-countryCode="DZ" value="213">Algeria (+213)</option>
                          		<option data-countryCode="AD" value="376">Andorra (+376)</option>
                          		<option data-countryCode="AO" value="244">Angola (+244)</option>
                          		<option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                          		<option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                          		<option data-countryCode="AR" value="54">Argentina (+54)</option>
                          		<option data-countryCode="AM" value="374">Armenia (+374)</option>
                          		<option data-countryCode="AW" value="297">Aruba (+297)</option>
                          		<option data-countryCode="AU" value="61">Australia (+61)</option>
                          		<option data-countryCode="AT" value="43">Austria (+43)</option>
                          		<option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                          		<option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                          		<option data-countryCode="BH" value="973">Bahrain (+973)</option>
                          		<option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                          		<option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                          		<option data-countryCode="BY" value="375">Belarus (+375)</option>
                          		<option data-countryCode="BE" value="32">Belgium (+32)</option>
                          		<option data-countryCode="BZ" value="501">Belize (+501)</option>
                          		<option data-countryCode="BJ" value="229">Benin (+229)</option>
                          		<option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                          		<option data-countryCode="BT" value="975">Bhutan (+975)</option>
                          		<option data-countryCode="BO" value="591">Bolivia (+591)</option>
                          		<option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                          		<option data-countryCode="BW" value="267">Botswana (+267)</option>
                          		<option data-countryCode="BR" value="55">Brazil (+55)</option>
                          		<option data-countryCode="BN" value="673">Brunei (+673)</option>
                          		<option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                          		<option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                          		<option data-countryCode="BI" value="257">Burundi (+257)</option>
                          		<option data-countryCode="KH" value="855">Cambodia (+855)</option>
                          		<option data-countryCode="CM" value="237">Cameroon (+237)</option>
                          		<option data-countryCode="CA" value="1">Canada (+1)</option>
                          		<option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                          		<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                          		<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                          		<option data-countryCode="CL" value="56">Chile (+56)</option>
                          		<option data-countryCode="CN" value="86">China (+86)</option>
                          		<option data-countryCode="CO" value="57">Colombia (+57)</option>
                          		<option data-countryCode="KM" value="269">Comoros (+269)</option>
                          		<option data-countryCode="CG" value="242">Congo (+242)</option>
                          		<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                          		<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                          		<option data-countryCode="HR" value="385">Croatia (+385)</option>
                          		<option data-countryCode="CU" value="53">Cuba (+53)</option>
                          		<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                          		<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                          		<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                          		<option data-countryCode="DK" value="45">Denmark (+45)</option>
                          		<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                          		<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                          		<option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                          		<option data-countryCode="EC" value="593">Ecuador (+593)</option>
                          		<option data-countryCode="EG" value="20">Egypt (+20)</option>
                          		<option data-countryCode="SV" value="503">El Salvador (+503)</option>
                          		<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                          		<option data-countryCode="ER" value="291">Eritrea (+291)</option>
                          		<option data-countryCode="EE" value="372">Estonia (+372)</option>
                          		<option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                          		<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                          		<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                          		<option data-countryCode="FJ" value="679">Fiji (+679)</option>
                          		<option data-countryCode="FI" value="358">Finland (+358)</option>
                          		<option data-countryCode="FR" value="33">France (+33)</option>
                          		<option data-countryCode="GF" value="594">French Guiana (+594)</option>
                          		<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                          		<option data-countryCode="GA" value="241">Gabon (+241)</option>
                          		<option data-countryCode="GM" value="220">Gambia (+220)</option>
                          		<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                          		<option data-countryCode="DE" value="49">Germany (+49)</option>
                          		<option data-countryCode="GH" value="233">Ghana (+233)</option>
                          		<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                          		<option data-countryCode="GR" value="30">Greece (+30)</option>
                          		<option data-countryCode="GL" value="299">Greenland (+299)</option>
                          		<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                          		<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                          		<option data-countryCode="GU" value="671">Guam (+671)</option>
                          		<option data-countryCode="GT" value="502">Guatemala (+502)</option>
                          		<option data-countryCode="GN" value="224">Guinea (+224)</option>
                          		<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                          		<option data-countryCode="GY" value="592">Guyana (+592)</option>
                          		<option data-countryCode="HT" value="509">Haiti (+509)</option>
                          		<option data-countryCode="HN" value="504">Honduras (+504)</option>
                          		<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                          		<option data-countryCode="HU" value="36">Hungary (+36)</option>
                          		<option data-countryCode="IS" value="354">Iceland (+354)</option>
                          		<option data-countryCode="IN" value="91">India (+91)</option>
                          		<option data-countryCode="ID" value="62">Indonesia (+62)</option>
                          		<option data-countryCode="IR" value="98">Iran (+98)</option>
                          		<option data-countryCode="IQ" value="964">Iraq (+964)</option>
                          		<option data-countryCode="IE" value="353">Ireland (+353)</option>
                          		<option data-countryCode="IL" value="972">Israel (+972)</option>
                          		<option data-countryCode="IT" value="39">Italy (+39)</option>
                          		<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                          		<option data-countryCode="JP" value="81">Japan (+81)</option>
                          		<option data-countryCode="JO" value="962">Jordan (+962)</option>
                          		<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                          		<option data-countryCode="KE" value="254">Kenya (+254)</option>
                          		<option data-countryCode="KI" value="686">Kiribati (+686)</option>
                          		<option data-countryCode="KP" value="850">Korea North (+850)</option>
                          		<option data-countryCode="KR" value="82">Korea South (+82)</option>
                          		<option data-countryCode="KW" value="965">Kuwait (+965)</option>
                          		<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                          		<option data-countryCode="LA" value="856">Laos (+856)</option>
                          		<option data-countryCode="LV" value="371">Latvia (+371)</option>
                          		<option data-countryCode="LB" value="961">Lebanon (+961)</option>
                          		<option data-countryCode="LS" value="266">Lesotho (+266)</option>
                          		<option data-countryCode="LR" value="231">Liberia (+231)</option>
                          		<option data-countryCode="LY" value="218">Libya (+218)</option>
                          		<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                          		<option data-countryCode="LT" value="370">Lithuania (+370)</option>
                          		<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                          		<option data-countryCode="MO" value="853">Macao (+853)</option>
                          		<option data-countryCode="MK" value="389">Macedonia (+389)</option>
                          		<option data-countryCode="MG" value="261">Madagascar (+261)</option>
                          		<option data-countryCode="MW" value="265">Malawi (+265)</option>
                          		<option data-countryCode="MY" value="60">Malaysia (+60)</option>
                          		<option data-countryCode="MV" value="960">Maldives (+960)</option>
                          		<option data-countryCode="ML" value="223">Mali (+223)</option>
                          		<option data-countryCode="MT" value="356">Malta (+356)</option>
                          		<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                          		<option data-countryCode="MQ" value="596">Martinique (+596)</option>
                          		<option data-countryCode="MR" value="222">Mauritania (+222)</option>
                          		<option data-countryCode="YT" value="269">Mayotte (+269)</option>
                          		<option data-countryCode="MX" value="52">Mexico (+52)</option>
                          		<option data-countryCode="FM" value="691">Micronesia (+691)</option>
                          		<option data-countryCode="MD" value="373">Moldova (+373)</option>
                          		<option data-countryCode="MC" value="377">Monaco (+377)</option>
                          		<option data-countryCode="MN" value="976">Mongolia (+976)</option>
                          		<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                          		<option data-countryCode="MA" value="212">Morocco (+212)</option>
                          		<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                          		<option data-countryCode="MN" value="95">Myanmar (+95)</option>
                          		<option data-countryCode="NA" value="264">Namibia (+264)</option>
                          		<option data-countryCode="NR" value="674">Nauru (+674)</option>
                          		<option data-countryCode="NP" value="977">Nepal (+977)</option>
                          		<option data-countryCode="NL" value="31">Netherlands (+31)</option>
                          		<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                          		<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                          		<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                          		<option data-countryCode="NE" value="227">Niger (+227)</option>
                          		<option data-countryCode="NG" value="234">Nigeria (+234)</option>
                          		<option data-countryCode="NU" value="683">Niue (+683)</option>
                          		<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                          		<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                          		<option data-countryCode="NO" value="47">Norway (+47)</option>
                          		<option data-countryCode="OM" value="968">Oman (+968)</option>
                          		<option data-countryCode="PW" value="680">Palau (+680)</option>
                          		<option data-countryCode="PA" value="507">Panama (+507)</option>
                          		<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                          		<option data-countryCode="PY" value="595">Paraguay (+595)</option>
                          		<option data-countryCode="PE" value="51">Peru (+51)</option>
                          		<option data-countryCode="PH" value="63">Philippines (+63)</option>
                          		<option data-countryCode="PL" value="48">Poland (+48)</option>
                          		<option data-countryCode="PT" value="351">Portugal (+351)</option>
                          		<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                          		<option data-countryCode="QA" value="974">Qatar (+974)</option>
                          		<option data-countryCode="RE" value="262">Reunion (+262)</option>
                          		<option data-countryCode="RO" value="40">Romania (+40)</option>
                          		<option data-countryCode="RU" value="7">Russia (+7)</option>
                          		<option data-countryCode="RW" value="250">Rwanda (+250)</option>
                          		<option data-countryCode="SM" value="378">San Marino (+378)</option>
                          		<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                          		<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                          		<option data-countryCode="SN" value="221">Senegal (+221)</option>
                          		<option data-countryCode="CS" value="381">Serbia (+381)</option>
                          		<option data-countryCode="SC" value="248">Seychelles (+248)</option>
                          		<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                          		<option data-countryCode="SG" value="65">Singapore (+65)</option>
                          		<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                          		<option data-countryCode="SI" value="386">Slovenia (+386)</option>
                          		<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                          		<option data-countryCode="SO" value="252">Somalia (+252)</option>
                          		<option data-countryCode="ZA" value="27">South Africa (+27)</option>
                          		<option data-countryCode="ES" value="34">Spain (+34)</option>
                          		<option data-countryCode="LK" value="94" selected>Sri Lanka (+94)</option>
                          		<option data-countryCode="SH" value="290">St. Helena (+290)</option>
                          		<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                          		<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                          		<option data-countryCode="SD" value="249">Sudan (+249)</option>
                          		<option data-countryCode="SR" value="597">Suriname (+597)</option>
                          		<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                          		<option data-countryCode="SE" value="46">Sweden (+46)</option>
                          		<option data-countryCode="CH" value="41">Switzerland (+41)</option>
                          		<option data-countryCode="SI" value="963">Syria (+963)</option>
                          		<option data-countryCode="TW" value="886">Taiwan (+886)</option>
                          		<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                          		<option data-countryCode="TH" value="66">Thailand (+66)</option>
                          		<option data-countryCode="TG" value="228">Togo (+228)</option>
                          		<option data-countryCode="TO" value="676">Tonga (+676)</option>
                          		<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                          		<option data-countryCode="TN" value="216">Tunisia (+216)</option>
                          		<option data-countryCode="TR" value="90">Turkey (+90)</option>
                          		<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                          		<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                          		<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                          		<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                          		<option data-countryCode="UG" value="256">Uganda (+256)</option>
                          	  <option data-countryCode="GB" value="44">UK (+44)</option>
                          		<option data-countryCode="UA" value="380">Ukraine (+380)</option>
                          		<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                          		<option data-countryCode="UY" value="598">Uruguay (+598)</option>
                          		<option data-countryCode="US" value="1">USA (+1)</option>
                          		<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                          		<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                          		<option data-countryCode="VA" value="379">Vatican City (+379)</option>
                          		<option data-countryCode="VE" value="58">Venezuela (+58)</option>
                          		<option data-countryCode="VN" value="84">Vietnam (+84)</option>
                          		<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                          		<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                          		<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                          		<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                          		<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                          		<option data-countryCode="ZM" value="260">Zambia (+260)</option>
                          		<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                          </select>
                          <label for="countrycode ">
                            country code
                          </label>
                        </div>
                        <div class="input-field col  l8 m8">
                          <input id="phoneNumber" name="phone"oninput="validphone()" type="tel" class="validate">
                          <label for="phoneNumber">
                            Phone number
                          </label>
                          <span class="red-text" id="phoneNumbererror"></span>
                          <script type="text/javascript">
                          var phoneNumber=document.getElementById("phoneNumber");
                          var phoneNumbererror=document.getElementById("phoneNumbererror");
                          function validphone() {
                            var z=phoneNumber.value;
                            if(z.length<9) {
                              phoneNumbererror.classList.remove('green-text');
                              phoneNumber.style.borderColor = "red";
                              phoneNumbererror.classList.add('red-text');
                              phoneNumbererror.innerHTML='phone no. must contain more than 9 digits ';
                              num=0;
                              if(num!=1 || pass!=1 || conpass!=1 || dob!=1 || em!=1){
                                document.getElementById("register").disabled=true;
                              }
                            }
                            else {
                              phoneNumbererror.classList.remove('red-text');
                              phoneNumbererror.classList.add('green-text');
                              phoneNumbererror.innerHTML='valid';
                              phoneNumber.style.borderColor = "green";
                              num=1;
                              if(num==1 && pass==1 && conpass==1 && dob==1 && em==1){
                                document.getElementById("register").disabled=false;
                              }
                            }
                          }
                          </script>
                        </div>



                      {{-- <script type="text/javascript">
                        var useragreement=document.getElementById("useragreement");
                        useragreement.addEventListener("change",accept);
                        function accept() {

                          if (useragreement.checked) {
                            document.getElementById("register").disabled=false;
                          }
                          else {
                            document.getElementById("register").disabled=true;
                          }
                        }
                      </script> --}}
                      </div>
                      <div class="row">
                        <div class="input-field col s12 l6 m6 center">
                          <input type="checkbox" id="useragreement" checked>
                          <label for="test1"><h4>  By signing up, you agree to our <a href="{!! url('/nonLoginPolicies'); !!}">Terms</a> & <a href="{!! url('/nonLoginPolicies'); !!}">Privacy Policy.</a></h4></label>
                      </div>
                          <div class="input-field col s12 l6 m6 left">

                          <br><button id="register" class="waves-effect waves-light btn  btn-large blue darken-4" disabled>Register</button>
                        </div>
                        <script type="text/javascript">
                        window.onload = function(){console.log(pass);console.log(pass);console.log(pass);console.log(pass);};

                        // var register=document.getElementById("register");
                        // function regvalid(){
                        //   if (pass==1&&conpass=1&&num=1&&dob=1) {
                        //     register.disabled = false;
                        //   }
                        //   else {
                        //     register.disabled = true;
                        //   }
                        // }
                        </script>
                      </div>



                    </form>
              </div>

            </div>

          </div>
          </div>
          </div>



      </main>
      <br><br><br>
      <footer class="page-footer blue darken-4 foot" style="font-family: 'Roboto', sans-serif;">
               <div class="container">
                 <div class="row">
                   <div class="col l6 s12">
                     <h2 class="white-text "><b>Life With Goals</b></h2><br>

                     <p class="white-text">
                       <small><a href="#" class="white-text footerCont">English(UK)</a></small>
                       <small><a href="" class="white-text footerCont">Sinhalese</a></small>
                     </p>
                     <div class="divider"></div>
                     <p class="white-text">
                       <small><a href="{!! url('/nonLoginAboutus'); !!}" class="white-text footerCont">About us</a></small>
                       <small><a href="{!! url('/nonLoginAboutus'); !!}" class="white-text footerCont">  Support</a></small>
                       {{-- <a href="{!! url('/aboutus'); !!}" class="white-text footerCont"> Press</a> --}}
                       <small><a href="{!! url('/nonLoginAboutus'); !!}" class="white-text footerCont"> Work with us</a></small>
                     </p>

                   </div>
                   <!-- <div class="col l4 offset-l2 s12">

                     <ul>
                       <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>

                       <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                       <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                     </ul>
                   </div> -->
                 </div>
               </div>
               <div class="white-text small  left">
                 <small>© 2017 Copyright</small>
                 <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->

               </div>
             </footer>

    </div>



    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{asset('materialize/js/materialize.js')}}"></script>
    <script src="js/init.js"></script>

  </body>

  <script>
  $('.datepicker').pickadate({
   selectMonths: true, // Creates a dropdown to control month
   selectYears: 15 // Creates a dropdown of 15 years to control year
 });

  $(document).ready(function() {
    $('select').material_select();
  });

    Array.prototype.forEach.call(document.querySelectorAll('.mdl-card__media'), function(el) {
      var link = el.querySelector('a');
      if(!link) {
        return;
      }
      var target = link.getAttribute('href');
      if(!target) {
        return;
      }
      el.addEventListener('click', function() {
        location.href = target;
      });
    });
  </script>


</html>
