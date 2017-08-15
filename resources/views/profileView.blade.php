@extends('layouts.navbar')

@section('content')

@include('layouts.friendsView')
<div id="addgoal" class="modal modal-fixed-footer">
<div class="modal-content" style="text-align:center;">
<h4>Add a Goal</h4>
<form enctype="multipart/form-data" action="{{route('dashboard')}}" method="post" id="addgoalform">
  {{ csrf_field() }}
  <ul class="collection">
    <li class="collection-item">
      <div class="input-field col s6">
        <input id="goalname" name="goalname" type="text" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal Name " required>
        <label for="goalname">Goal Name</label>
      </div>
    </li>
    <li class="collection-item">
      <div class="input-field col s6">
        <input id="goalintent" name="goalintent" type="text" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal intent " required>
        <label for="goalintent">Goal Intent</label>
      </div>
    </li>
    <li class="collection-item">
          <p class="left-align">
            <input class="with-gap" name="goalpriority" type="radio" value="high" id="HighPriority" checked="checked" />
            <label for="HighPriority">High Priority</label>
          </p>
          <p class="left-align">
            <input class="with-gap" name="goalpriority" type="radio" value="medium" id="MediumPriority" />
            <label for="MediumPriority">Medium Priority</label>
          </p>
          <p class="left-align">
            <input class="with-gap" name="goalpriority" type="radio" value="low" id="LowPriority"  />
            <label for="LowPriority">Low Priority</label>
          </p>
    </li>
    <li class="collection-item">
      <div class="input-field col s12 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Select Goal category">
          <select name="goalcategory" required>
             <option  value="non specified" disabled selected>select goal category</option>
             <option  value="business">business</option>
             <option  value="education">education</option>
             <option  value="Health and fitness">Health and fitness</option>
             <option  value="Get Educated and professional memberships">Get Educated and professional memberships</option>
             <option  value=" Financial stability and Gains"> Financial stability and Gains</option>
             <option  value="Construct my first house">Construct my first house</option>
             <option  value="Buy a car">Buy a car</option>
             <option  value=" Find a partner"> Find a partner</option>
             <option  value="Travel around and see the world">Travel around and see the world</option>
             <option  value="Skill up as a professional">Skill up as a professional</option>
             <option  value="Sports and Aquatics">Sports and Aquatics</option>
             <option  value="Ignite a concept">Ignite a concept</option>
          </select>
          <label>Goal Category</label>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $('select').material_select();
          });
        </script>
    </li>
    <form>
    <li class="collection-item">
      <div class="mdl-textfield mdl-js-textfield">
        <label  style="color:#565656;font-size:12pt;"for="goalstartdate">Goal Start-Date</label>
        <input class="mdl-textfield__input tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal start date" style="color:#565656;" type="date" id="goalstartdate" oninput="dateValid()" name="goalstartdate" required>
        <span id="goalstartdateerror"></span>
      </div>
    </li>
    <li class="collection-item">
      <div class="mdl-textfield mdl-js-textfield">
        <label  style="color:#565656;font-size:12pt;"for="goalenddate">Goal End-Date</label>
        <input class="mdl-textfield__input tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter your Goal end date" style="color:#565656;" type="date" oninput="dateValid()" id="goalenddate" name="goalenddate" required>
          <span id="goalenddateerror"></span>

      </div>
    </li>
    <form>
    <li class="collection-item">
      <div class="file-field input-field">
        <div class="btn">
          <span>Upload a Goal Picture</span>
          <input type="file" name="goalpicture">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Your Goal Picture" type="text" name="goalpicturepath">
        </div>
      </div>
    </li>
  </ul>
<input type="text" class="hidden" name="action" value="2">
</div>
<div class="modal-footer">
<a href="#" id="cancelmodalbtn" style="margin-right:10px;margin-left:10px;"class="model-close waves-effectwaves-effect waves-light btn">Not Now</a>
<button type="submit" id="addgoalbtn" style="margin-right:10px;margin-left:10px;"class="modal-action waves-effectwaves-effect waves-light btn">Add Goal</button>
</form>
</div>
</div>
<div class="row">

    <div class="container">
      <div class="row hide-on-small-only">
        <br><br>
        <div class="col l2 m2  center-align">
          <span class=" red-text "><b>New Goal</b></span><br>
          <a href="#addgoal" class="btn btn-floating red btn-large "><i class="material-icons">add</i></a>
        </div>
        <div class="col l2 m2  center-align">
          <span class=" blue-text text-lighten-1"><b>Send Invite</b></span><br>
          <a href="#" class="btn btn-floating blue lighten-1 btn-large "><i class="material-icons">people</i></a>
        </div>
        <div class="col l2 m2  center-align">
          <span class=" grey-text text-darken-3"><b>Dashboard</b></span><br>
          <a href="{{url('/dashboard')}}" class="btn btn-floating grey darken-3 btn-large "><i class="material-icons">dashboard</i></a>
        </div>
        <div class="col l2 m2 center-align">
          <span class=" blue-text text-darken-4"><b>My Documents</b></span><br>
          <a href="{{url('/files')}}" class="btn btn-floating btn-large "><i class="material-icons">attach_file</i></a>
        </div>
        <div class="col l2 m2 center-align">
          <span class=" purple-text text-darken-3"><b>My Schedule</b></span><br>
          <a href="{{url('/calendar')}}" class="btn btn-floating purple darken-3 btn-large "><i class="material-icons">date_range</i></a>
        </div>
        <div class="col l2 m2  center-align">
          <span class=" green-text text-darken-4"><b>My Profile</b></span><br>
          <a href="{{url('profile/'.Auth::id())}}" class="btn btn-floating green darken-4 btn-large "><i class="material-icons">people</i></a>
        </div>
      </div>
<style media="screen">
  .cambtn{

    position:absolute;
    z-index: 4;
    margin-left: -100px;


  }

  .hidden{
    visibility: hidden;
  }

    .cammob{
        margin-bottom: 200px;
    }
</style>

          <br>
          <div class="row">
          <div class="col s12 m6 l6 center-align" id="profilepic">
                      <div class="cambtn hide-on-med-and-down" id="imgoverlayfade">
                      <form style=""enctype="multipart/form-data" action="{{route('profile')}}" method="post" id="addprofilepicfrm">
                        {{ csrf_field() }}
                          <p class="white-text">
                            <div class="file-field input-field"  >
                              <div class="btn btn-floating">
                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upload Profile Picture" >camera_alt</i>
                            <input type="file" name="profilepic"  onchange="javascript:this.form.submit();">
                          </div>
                        </div>
                          </p>
                        </form>
                    </div>
                    <div class=" btn btn-floating hide-on-med-and-up">
                      <form style=""enctype="multipart/form-data" action="{{route('profile')}}" method="post" id="addprofilepicfrm">
                        {{ csrf_field() }}
                            <div class="file-field"  >
                          <i class="material-icons">camera_alt</i>
                            <input type="file" name="profilepic"  onchange="javascript:this.form.submit();">
                        </div>
                        </form>
                    </div>
                      <div id="imageWrapper" style="z-index:1;">
                         <img   src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" alt="" width="200px" height="200px" class="circle">
                      </div>
                  </div>
          <script type="text/javascript">
            document.getElementById("imgoverlayfade").style.display='none';
            var imageWrapper = document.getElementById('imageWrapper');
            var imageprof = document.getElementById('imageprof');
            var profilepic=document.getElementById("profilepic");
            profilepic.addEventListener("mouseover",mouseOver);
            profilepic.addEventListener("mouseout",mouseOut);
            imageWrapper.addEventListener("mouseover",wrapperShow);
            imageWrapper.addEventListener("mouseout",WrapperDis);
            imageprof.addEventListener("mouseover",WrapperDis1);
            imageprof.addEventListener("mouseout",WrapperDis1);
            //
            // $("#imageWrapper").hover(function() {
            //   $("#imgoverlayfade").removeClass('hidden');
            // }, function() {
            //   $("#imgoverlayfade").addClass('hidden');
            // });

            //
            // function WrapperDis1(){
            //     $("#imgoverlayfade").removeClass('hidden');
            // }
            //
            // function WrapperDis1(){
            //     $("#imgoverlayfade").addClass('hidden');
            // }
            //
            // function wrapperShow(){
            //     $("#imgoverlayfade").removeClass('hidden');
            // }
            //
            // function WrapperDis(){
            //     $("#imgoverlayfade").addClass('hidden');
            // }
            //
            var dob=0;
            var phone=0;
            function mouseOver(){
              document.getElementById("imgoverlayfade").style.display='inline';
            }
            function mouseOut(){
              document.getElementById("imgoverlayfade").style.display='none';
            }
          </script>
          <div class="col s12 m6 l6">
            <br>
            <button id="editprofileinfobtn"  onclick="displayedit()"class="btn btn-floating pulse right"><i class="material-icons">border_color</i></button><br>
            <h4 id="names" class="flow-text"> <b>{{Auth::User()->fname}}  {{Auth::User()->lname}}</b></h4>
                <p class="flow-text" id="existdetails">{{Auth::User()->email}} <br>
                    {{Auth::User()->phone}}  <br>{{Auth::User()->dob}} </p>
                    <form id="infoform" action="{{route('modifyprofile')}}" method="post" style="display:none;">
                      {{csrf_field()}}
                     <div class="row">
                     <div class="input-field col s12 l6 m6">
                       <input type="text" id="fname" name="fname" value="{{Auth::User()->fname}}" placeholder="{{Auth::User()->fname}}" required></input>
                     </div>
                     <div class="input-field col s12 l6 m6">
                      <input type="text" id="lname" name="lname" value="{{Auth::User()->lname}}" placeholder="{{Auth::User()->lname}}" required></input>
                     </div>
                     </div>
                     <div class="row">
                     <div class="input-field col s12 m12 l12">
                       <label>Date of Birth</label><br>
                       <input id="birthDate" oninput="dateValid()" type="date" name="dob" value="{{Auth::User()->dob}}">
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
                           if(dob!=1 || phone!=1){
                             document.getElementById("modifyprofile").disabled=true;
                           }
                         }
                         else {
                           doberror.innerHTML='valid';
                           doberror.classList.remove('red-text');
                           doberror.classList.add('green-text');
                           dob=1;
                           console.log(dob);
                           if(dob==1 && phone==1){
                             document.getElementById("modifyprofile").disabled=false;
                           }
                         }
                         console.log(e.getFullYear());
                       }
                       </script>
                     </div>
                   </div>
                     <div class="row">
                       <div class="input-field col l4 m4 s12">
                         <select name="countrycode" id="countryCode">
                            <option value="{{Auth::User()->countrycode}}" selected>+{{Auth::User()->countrycode}}</option>
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
                            <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
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
                         <script type="text/javascript">
                         $(document).ready(function() {
                            $('select').material_select();
                          });
                         </script>
                       </div>
                       <div class="input-field col  l8 m8 s12">
                         <input id="phoneNumber" name="phone" oninput="validphone()" type="tel" class="validate" placeholder="{{Auth::User()->phone}}" value="{{Auth::User()->phone}}">
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
                             phone=0;
                             if( dob!=1 || phone!=1){
                               document.getElementById("modifyprofile").disabled=true;
                             }
                           }
                           else {
                             phoneNumbererror.classList.remove('red-text');
                             phoneNumbererror.classList.add('green-text');
                             phoneNumbererror.innerHTML='valid';
                             phoneNumber.style.borderColor = "green";
                             phone=1;
                             if(phone==1 && dob==1){
                               document.getElementById("modifyprofile").disabled=false;
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
                       <div class="col s12">
                         <div class="right">
                           <button type="submit" class="btn btn-floating "  id="modifyprofile"><i class="material-icons">done</i></button>
                           <button type="button" class="btn btn-floating " onclick="closeinfoform()"><i class="material-icons">close</i></button>
                         </div>
                       </div>
                     </div>

                    </form>

          </div>
          <script type="text/javascript">
          var infoform=document.getElementById('infoform');
          var existdetails=document.getElementById('existdetails');
          var names=document.getElementById('names');
          var editprofileinfobtn=document.getElementById('editprofileinfobtn');
          var modifyprofile=document.getElementById('modifyprofile');
          function displayedit() {
            infoform.style.display='block';
            existdetails.style.display='none';
            names.style.display='none';
            editprofileinfobtn.style.display='none';
            dob=1;
            phone=1;
          }

          function closeinfoform() {
            infoform.style.display='none';
            existdetails.style.display='block';
            names.style.display='block';
            editprofileinfobtn.style.display='block';
          }
            // var editprofileinfobtn=document.getElementById("editprofileinfobtn");
             modifyprofile.addEventListener("click",function(event){
               event.preventDefault();
               var action= infoform.getAttribute("action");
               var form_data=new FormData(infoform);
               var xhr = new XMLHttpRequest();
               xhr.open('POST',action, true);
               xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
               xhr.send(form_data);
               xhr.onreadystatechange = function () {
                 if(xhr.readyState == 4 && xhr.status == 200) {
                   var result = xhr.responseText;
                   biosubmit.disabled=false;
                   console.log('Result: ' + result);
                   var json = JSON.parse(result);
                   infoform.style.display='none';
                   existdetails.style.display='block';
                   names.style.display='block';
                   editprofileinfobtn.style.display='block';
                   names.innerHTML="<b>"+json.fname+" "+json.lname+"</b>";
                   existdetails.innerHTML=json.email+'<br>'+json.phone+'<br>'+json.dob;
                   console.log('ds');
                 }
               };

             });
          </script>
        </div>
                              <div class="col s12 m12 l12">
                                <div class="card">
                                  <div class="card-action">
                                     <h5><b>Portfolio</b></h5>
                                  </div>
                                  <div class="row"style="margin:10px;">
                                      <div class="col s12 m6 l6">
                                          <div class="card ">
                                             <div class="card-content ">
                                               <span class="card-title"><i class="material-icons">account_box</i>&nbsp;Aspiration
                                                 <button type="button" onclick="addbiodata()" id="addbiobtn" class="btn btn-floating right pulse"><i class="material-icons">border_color</i></button>
                                                 <i style="display:none;cursor:pointer;" id="closebiobtn"onclick="closeaddbio()" class="material-icons right">close</i>
                                               </span>
                                               <li class="divider"></li><br>
                                               @if (Auth::User()->bio=="")
                                                 <p id="inibio"class="blue-text">Please Enter your aspiration</p>
                                               @else
                                                 <p id="setbio">{{Auth::User()->bio}}</p>
                                               @endif
                                               <form action="{{route('addbio')}}" method="post" id="addbio-form" style="display:none;">
                                                 <div class="row">
                                                   <form class="col s12">
                                                      {{csrf_field()}}
                                                     <div class="row">
                                                       <div class="input-field col s12">
                                                         <textarea id="biocontent" name="bio" class="materialize-textarea"></textarea>
                                                         <label for="biocontent">Type you aspiration</label>
                                                         <button type="button" id="biosubmit" class="btn btn-floating" type="submit"><i class="material-icons">send</i></button>
                                                       </div>
                                                     </div>
                                                   </form>
                                                 </div>
                                               </form>
                                               <script type="text/javascript">
                                                //  var addbiobtn=document.getElementById("addbiobtn");
                                                //  var closebio document.getElementById("closebiobtn");
                                                 var inibio =document.getElementById("inibio");
                                                 var setbio =document.getElementById("setbio");
                                                 var addbioform=document.getElementById("addbio-form");
                                                 var biosubmit=document.getElementById("biosubmit");
                                                 function addbiodata() {
                                                   console.log('sds');
                                                   document.getElementById("addbiobtn").style.display="none";
                                                   document.getElementById("closebiobtn").style.display="inline";
                                                   @if (Auth::User()->bio=="")
                                                   inibio.style.display="none";
                                                   @endif
                                                   @if (Auth::User()->bio!="")
                                                   setbio.style.display="none";
                                                   @endif
                                                   console.log('sdsdsds');
                                                   addbioform.style.display="block";
                                                 }
                                                 function closeaddbio() {
                                                   document.getElementById("addbiobtn").style.display="inline";
                                                   document.getElementById("closebiobtn").style.display="none";
                                                   @if (Auth::User()->bio=="")
                                                   inibio.style.display="block";
                                                   @endif
                                                   @if (Auth::User()->bio!="")
                                                   setbio.style.display="block";
                                                   @endif
                                                   addbioform.style.display="none";

                                                 }

                                                    function postbio() {
                                                      var action = addbioform.getAttribute("action");
                                                      var form_data=new FormData(addbioform);
                                                      var xhr = new XMLHttpRequest();
                                                      xhr.open('POST',action, true);
                                                      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                                      xhr.send(form_data);
                                                      xhr.onreadystatechange = function () {
                                                        if(xhr.readyState == 4 && xhr.status == 200) {
                                                          var result = xhr.responseText;
                                                          biosubmit.disabled=false;
                                                          console.log('Result: ' + result);
                                                          var json = JSON.parse(result);
                                                          addbioform.style.display="none";
                                                          setbio.innerHTML=json;
                                                          setbio.style.display="block";
                                                          document.getElementById("addbiobtn").style.display="inline";
                                                          document.getElementById("closebiobtn").style.display="none";


                                                        }
                                                        else {
                                                          biosubmit.disabled=true;
                                                        }
                                                      };

                                                    }
                                                    biosubmit.addEventListener("click",function(event){
                                                      event.preventDefault();
                                                      postbio();
                                                    });
                                               </script>
                                             </div>
                                          </div>
                                      </div>
                                      <div class="col s12 m6 l6">
                                          <div class="card ">
                                             <div class="card-content">
                                               <span class="card-title"><i class="material-icons">work</i>&nbsp;Work Experience</span>
                                               <li class="divider"></li><br>
                                               <b>previous :</b><br>
                                                 <span id="nopreviouswork" class="blue-text ">Add your previous employments</span>
                                                 @foreach ($portfolio as $work)
                                                 @if ($work->category=='work' && $work->nature=='previous')
                                                   <span class="chip col s12">{{$work->data}} <i id="{{$work->data}}"class="close material-icons">close</i></span>
                                                   <form id="{{$work->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$work->id}}">
                                                   </form>
                                                   <script type="text/javascript">
                                                     document.getElementById("nopreviouswork").style.display="none";
                                                     var deletepreviouswork=document.getElementById('{{$work->data}}');
                                                     deletepreviouswork.addEventListener("click",deletepreviousworkfunction)
                                                     function deletepreviousworkfunction() {
                                                     var form=document.getElementById('{{$work->id}}');
                                                     var action = form.getAttribute("action");
                                                     var form_data = new FormData(form);
                                                     var xhr = new XMLHttpRequest();
                                                     xhr.open('POST', action, true);
                                                     xhr.send(form_data);
                                                     xhr.onreadystatechange = function () {
                                                       if(xhr.readyState == 4 && xhr.status == 200) {
                                                          var result = xhr.responseText;
                                                          console.log('Result: ' + result);


                                                       }
                                                     };
                                                   }
                                                   </script>
                                                 @endif
                                                 @endforeach
                                                 <div id="addnewprevious">
                                                 </div>
                                                 <br>
                                                 <form id="addpreviouswork-form" action="{{route('addpreviouswork')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="previouswork" type="text" name="previous">
                                                     <label for="previouswork">
                                                       Enter your previous Employments
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addpreviousworkbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addpreviousworkbtn=document.getElementById('addpreviousworkbtn');
                                                   addpreviousworkbtn.addEventListener("click", function(event) {
                                                   addpreviousworkfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addpreviousworkfunction() {
                                                   var form=document.getElementById('addpreviouswork-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nopreviouswork").style.display="none";
                                                        document.getElementById("addnewprevious").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <br><br>
                                               <b>current :</b><br>
                                                 <span id="nocurrentwork" class="blue-text ">Add your current employment</span>
                                                 @foreach ($portfolio as $work)
                                                 @if ($work->category=='work' && $work->nature=='current')
                                                   <span class="chip col s12">{{$work->data}}<i id="{{$work->data}}"class="close material-icons">close</i></span>
                                                   <form  id="{{$work->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden"name="id" value="{{$work->id}}">
                                                   </form>
                                                   <script type="text/javascript">
                                                     document.getElementById("nocurrentwork").style.display="none";
                                                     var deletecurrentwork=document.getElementById('{{$work->data}}');
                                                     deletecurrentwork.addEventListener("click",deletecurrentworkfunction)
                                                     function deletecurrentworkfunction() {
                                                     var form=document.getElementById('{{$work->id}}');
                                                     var action = form.getAttribute("action");
                                                     var form_data = new FormData(form);
                                                     var xhr = new XMLHttpRequest();
                                                     xhr.open('POST', action, true);
                                                     xhr.send(form_data);
                                                     xhr.onreadystatechange = function () {
                                                       if(xhr.readyState == 4 && xhr.status == 200) {
                                                          var result = xhr.responseText;
                                                          console.log('Result: ' + result);


                                                       }
                                                     };
                                                   }
                                                   </script>
                                                 @endif
                                                 @endforeach
                                                 <div id="addnewcurrent">
                                                 </div>
                                                 <br>
                                                 <form id="addcurrentwork-form" action="{{route('addcurrentwork')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="currentwork" type="text" name="current">
                                                     <label for="currentwork">
                                                       Enter your current Employment
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addcurrentworkbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addcurrentworkbtn=document.getElementById('addcurrentworkbtn');
                                                   addcurrentworkbtn.addEventListener("click", function(event) {
                                                   addcurrentworkfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addcurrentworkfunction() {
                                                   var form=document.getElementById('addcurrentwork-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nocurrentwork").style.display="none";
                                                        document.getElementById("addnewcurrent").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <div class="card-content">
                                                   &nbsp;
                                                 </div>
                                             </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="divider"></div><br>
                                    <div class="row" style="margin:10px;">
                                        <div class="col s12 m6 l6">
                                            <div class="card ">
                                               <div class="card-content ">
                                                 <span class="card-title"><i class="material-icons">school</i>&nbsp;Education</span>
                                                 <li class="divider"></li><br>
                                                 <b>primary school :</b><br>
                                                 <span id="noprimarysch" class="blue-text">Add your primary school</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='education' && $edu->nature=='primarysch')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("noprimarysch").style.display="none";
                                                    var deleteprimarysch=document.getElementById('{{$edu->data}}');
                                                    deleteprimarysch.addEventListener("click",deleteprimaryschfunction)
                                                    function deleteprimaryschfunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
                                                    var action = form.getAttribute("action");
                                                    var form_data = new FormData(form);
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open('POST', action, true);
                                                    xhr.send(form_data);
                                                    xhr.onreadystatechange = function () {
                                                      if(xhr.readyState == 4 && xhr.status == 200) {
                                                         var result = xhr.responseText;
                                                         console.log('Result: ' + result);


                                                      }
                                                    };
                                                  }
                                                  </script>
                                                 @endif
                                                 @endforeach
                                                 <div id="addnewprimary">
                                                 </div>
                                                 <br>
                                                 <form id="addprimary-form" action="{{route('addprimary')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="primary" type="text" name="primary">
                                                     <label for="primary">
                                                       Enter your primary school
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addprimarybtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addprimarybtn=document.getElementById('addprimarybtn');
                                                   addprimarybtn.addEventListener("click", function(event) {
                                                   addprimaryfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addprimaryfunction() {
                                                   var form=document.getElementById('addprimary-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("noprimarysch").style.display="none";
                                                        document.getElementById("addnewprimary").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <br><br>
                                                 <b>secondary school :</b><br>
                                                 <span id="nosecondarysch" class="blue-text">Add your secondary school</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='education' && $edu->nature=='secondarysch')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("nosecondarysch").style.display="none";
                                                    var deletesecondarysch=document.getElementById('{{$edu->data}}');
                                                    deletesecondarysch.addEventListener("click",deletesecondaryschfunction)
                                                    function deletesecondaryschfunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
                                                    var action = form.getAttribute("action");
                                                    var form_data = new FormData(form);
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open('POST', action, true);
                                                    xhr.send(form_data);
                                                    xhr.onreadystatechange = function () {
                                                      if(xhr.readyState == 4 && xhr.status == 200) {
                                                         var result = xhr.responseText;
                                                         console.log('Result: ' + result);


                                                      }
                                                    };
                                                  }
                                                  </script>
                                                 @endif
                                                 @endforeach
                                                 <div id="addnewsecondary">
                                                 </div>
                                                 <br>
                                                 <form id="addsecondary-form" action="{{route('addsecondary')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="secondary" type="text" name="secondary">
                                                     <label for="secondary">
                                                       Enter your secondary school
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addsecondarybtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addsecondarybtn=document.getElementById('addsecondarybtn');
                                                   addsecondarybtn.addEventListener("click", function(event) {
                                                   addsecondaryfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addsecondaryfunction() {
                                                   var form=document.getElementById('addsecondary-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nosecondarysch").style.display="none";
                                                        document.getElementById("addnewsecondary").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <br><br>
                                                 <b>college :</b><br>
                                                 <span id="nocollege" class="blue-text">Add your college</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='education' && $edu->nature=='college')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("nocollege").style.display="none";
                                                    var deletecollege=document.getElementById('{{$edu->data}}');
                                                    deletecollege.addEventListener("click",deletecollegefunction)
                                                    function deletecollegefunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
                                                    var action = form.getAttribute("action");
                                                    var form_data = new FormData(form);
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open('POST', action, true);
                                                    xhr.send(form_data);
                                                    xhr.onreadystatechange = function () {
                                                      if(xhr.readyState == 4 && xhr.status == 200) {
                                                         var result = xhr.responseText;
                                                         console.log('Result: ' + result);


                                                      }
                                                    };
                                                  }
                                                  </script>
                                                 @endif
                                                 @endforeach
                                                 <div id="addnewcollege">
                                                 </div>
                                                 <br>
                                                 <form id="addcollege-form" action="{{route('addcollege')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="college" type="text" name="college">
                                                     <label for="college">
                                                       Enter your college
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addcollegebtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addcollegebtn=document.getElementById('addcollegebtn');
                                                   addcollegebtn.addEventListener("click", function(event) {
                                                   addcollegefunction();
                                                   event.preventDefault();
                                                   });

                                                   function addcollegefunction() {
                                                   var form=document.getElementById('addcollege-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nocollege").style.display="none";
                                                        document.getElementById("addnewcollege").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <br><br>
                                                 <b>universities :</b><br>
                                                 <span id="nouniversity" class="blue-text">Add your university</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='education' && $edu->nature=='university')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("nouniversity").style.display="none";
                                                    var deleteuniversity=document.getElementById('{{$edu->data}}');
                                                    deleteuniversity.addEventListener("click",deleteuniversityfunction)
                                                    function deleteuniversityfunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
                                                    var action = form.getAttribute("action");
                                                    var form_data = new FormData(form);
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open('POST', action, true);
                                                    xhr.send(form_data);
                                                    xhr.onreadystatechange = function () {
                                                      if(xhr.readyState == 4 && xhr.status == 200) {
                                                         var result = xhr.responseText;
                                                         console.log('Result: ' + result);


                                                      }
                                                    };
                                                  }
                                                  </script>
                                                 @endif
                                                 @endforeach
                                                 <div id="addnewuniversity">
                                                 </div>
                                                 <br>
                                                 <form id="adduniversity-form" action="{{route('adduniversity')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="university" type="text" name="university">
                                                     <label for="university">
                                                       Enter your university
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="adduniversitybtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var adduniversitybtn=document.getElementById('adduniversitybtn');
                                                   adduniversitybtn.addEventListener("click", function(event) {
                                                   adduniversityfunction();
                                                   event.preventDefault();
                                                   });

                                                   function adduniversityfunction() {
                                                   var form=document.getElementById('adduniversity-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("nouniversity").style.display="none";
                                                        document.getElementById("addnewuniversity").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <div class="card-content">
                                                   &nbsp;
                                                 </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m6 l6">
                                            <div class="card">
                                               <div class="card-content ">
                                                 <span class="card-title"><i class="material-icons">grade</i>&nbsp;achievements</span>
                                                 <li class="divider"></li><br>
                                                 <span id="noachievements" class="blue-text">Add your achievements</span>
                                                 @foreach ($portfolio as $edu)
                                                 @if ($edu->category=='achievements' && $edu->nature=='achievements')
                                                  <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                  <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="id" value="{{$edu->id}}">
                                                  </form>
                                                  <script type="text/javascript">
                                                    document.getElementById("noachievements").style.display="none";
                                                    var deleteachievements=document.getElementById('{{$edu->data}}');
                                                    deleteachievements.addEventListener("click",deleteachievementsfunction)
                                                    function deleteachievementsfunction() {
                                                    var form=document.getElementById('{{$edu->id}}');
                                                    var action = form.getAttribute("action");
                                                    var form_data = new FormData(form);
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open('POST', action, true);
                                                    xhr.send(form_data);
                                                    xhr.onreadystatechange = function () {
                                                      if(xhr.readyState == 4 && xhr.status == 200) {
                                                         var result = xhr.responseText;
                                                         console.log('Result: ' + result);


                                                      }
                                                    };
                                                  }
                                                  </script>
                                                 @endif
                                                 @endforeach
                                                 <div id="addnewachievements">
                                                 </div>
                                                 <br>
                                                 <form id="addachievements-form" action="{{route('addachievements')}}" method="post">
                                                   {{csrf_field()}}
                                                   <div class="input-field col s12">
                                                     <input id="achievements" type="text" name="achievements">
                                                     <label for="achievements">
                                                       Enter your achievements
                                                     </label>
                                                     <button type="submit" class="btn btn-floating right"id="addachievementsbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                   </div>
                                                 </form>
                                                 <script type="text/javascript">
                                                   var addachievementsbtn=document.getElementById('addachievementsbtn');
                                                   addachievementsbtn.addEventListener("click", function(event) {
                                                   addachievementsfunction();
                                                   event.preventDefault();
                                                   });

                                                   function addachievementsfunction() {
                                                   var form=document.getElementById('addachievements-form');
                                                   var action = form.getAttribute("action");
                                                   var form_data = new FormData(form);
                                                   var xhr = new XMLHttpRequest();
                                                   xhr.open('POST', action, true);
                                                   xhr.send(form_data);
                                                   xhr.onreadystatechange = function () {
                                                     if(xhr.readyState == 4 && xhr.status == 200) {
                                                        var result = xhr.responseText;
                                                        console.log('Result: ' + result);
                                                        var json = JSON.parse(result);
                                                        document.getElementById("noachievements").style.display="none";
                                                        document.getElementById("addnewachievements").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                        form.reset();
                                                     }
                                                   };
                                                 }
                                                 </script>
                                                 <div class="card-content">
                                                   &nbsp;
                                                 </div>
                                               </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="divider"></div><br>
                                      <div class="row" style="margin:10px;">
                                          <div class="col s12 m6 l6">
                                              <div class="card ">
                                                 <div class="card-content ">
                                                   <span class="card-title"><i class="material-icons">portrait</i>&nbsp;Professional Qualifications</span>
                                                   <li class="divider"></li><br>
                                                   <span id="noprofqual" class="blue-text">Add your professional qualifications</span>
                                                   @foreach ($portfolio as $edu)
                                                   @if ($edu->category=='profqual' && $edu->nature=='profqual')
                                                    <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                    <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                     {{ csrf_field() }}
                                                     <input type="hidden" name="id" value="{{$edu->id}}">
                                                    </form>
                                                    <script type="text/javascript">
                                                      document.getElementById("noprofqual").style.display="none";
                                                      var deleteprofqual=document.getElementById('{{$edu->data}}');
                                                      deleteprofqual.addEventListener("click",deleteprofqualfunction)
                                                      function deleteprofqualfunction() {
                                                      var form=document.getElementById('{{$edu->id}}');
                                                      var action = form.getAttribute("action");
                                                      var form_data = new FormData(form);
                                                      var xhr = new XMLHttpRequest();
                                                      xhr.open('POST', action, true);
                                                      xhr.send(form_data);
                                                      xhr.onreadystatechange = function () {
                                                        if(xhr.readyState == 4 && xhr.status == 200) {
                                                           var result = xhr.responseText;
                                                           console.log('Result: ' + result);


                                                        }
                                                      };
                                                    }
                                                    </script>
                                                   @endif
                                                   @endforeach
                                                   <div id="addnewprofqual">
                                                   </div>
                                                   <br>
                                                   <form id="addprofqual-form" action="{{route('addprofqual')}}" method="post">
                                                     {{csrf_field()}}
                                                     <div class="input-field col s12">
                                                       <input id="profqual" type="text" name="profqual">
                                                       <label for="profqual">
                                                         Enter your professional qualifications
                                                       </label>
                                                       <button type="submit" class="btn btn-floating right"id="addprofqualbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                     </div>
                                                   </form>
                                                   <script type="text/javascript">
                                                     var addprofqualbtn=document.getElementById('addprofqualbtn');
                                                     addprofqualbtn.addEventListener("click", function(event) {
                                                     addprofqualfunction();
                                                     event.preventDefault();
                                                     });

                                                     function addprofqualfunction() {
                                                     var form=document.getElementById('addprofqual-form');
                                                     var action = form.getAttribute("action");
                                                     var form_data = new FormData(form);
                                                     var xhr = new XMLHttpRequest();
                                                     xhr.open('POST', action, true);
                                                     xhr.send(form_data);
                                                     xhr.onreadystatechange = function () {
                                                       if(xhr.readyState == 4 && xhr.status == 200) {
                                                          var result = xhr.responseText;
                                                          console.log('Result: ' + result);
                                                          var json = JSON.parse(result);
                                                          document.getElementById("noprofqual").style.display="none";
                                                          document.getElementById("addnewprofqual").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                          form.reset();
                                                       }
                                                     };
                                                   }
                                                   </script>
                                                   <div class="card-content">
                                                     &nbsp;
                                                   </div>
                                                 </div>
                                              </div>
                                          </div>
                                          <div class="col s12 m6 l6">
                                              <div class="card ">
                                                 <div class="card-content ">
                                                   <span class="card-title"><i class="material-icons">subject</i>&nbsp;Patents</span>
                                                   <li class="divider"></li><br>
                                                   <span id="nopatents" class="blue-text">Add your patents</span>
                                                   @foreach ($portfolio as $edu)
                                                   @if ($edu->category=='patents' && $edu->nature=='patents')
                                                    <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                    <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                     {{ csrf_field() }}
                                                     <input type="hidden" name="id" value="{{$edu->id}}">
                                                    </form>
                                                    <script type="text/javascript">
                                                      document.getElementById("nopatents").style.display="none";
                                                      var deletepatents=document.getElementById('{{$edu->data}}');
                                                      deletepatents.addEventListener("click",deletepatentsfunction)
                                                      function deletepatentsfunction() {
                                                      var form=document.getElementById('{{$edu->id}}');
                                                      var action = form.getAttribute("action");
                                                      var form_data = new FormData(form);
                                                      var xhr = new XMLHttpRequest();
                                                      xhr.open('POST', action, true);
                                                      xhr.send(form_data);
                                                      xhr.onreadystatechange = function () {
                                                        if(xhr.readyState == 4 && xhr.status == 200) {
                                                           var result = xhr.responseText;
                                                           console.log('Result: ' + result);


                                                        }
                                                      };
                                                    }
                                                    </script>
                                                   @endif
                                                   @endforeach
                                                   <div id="addnewpatents">
                                                   </div>
                                                   <br>
                                                   <form id="addpatents-form" action="{{route('addpatents')}}" method="post">
                                                     {{csrf_field()}}
                                                     <div class="input-field col s12">
                                                       <input id="patents" type="text" name="patents">
                                                       <label for="patents">
                                                         Enter your patents
                                                       </label>
                                                       <button type="submit" class="btn btn-floating right"id="addpatentsbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                     </div>
                                                   </form>
                                                   <script type="text/javascript">
                                                     var addpatentsbtn=document.getElementById('addpatentsbtn');
                                                     addpatentsbtn.addEventListener("click", function(event) {
                                                     addpatentsfunction();
                                                     event.preventDefault();
                                                     });

                                                     function addpatentsfunction() {
                                                     var form=document.getElementById('addpatents-form');
                                                     var action = form.getAttribute("action");
                                                     var form_data = new FormData(form);
                                                     var xhr = new XMLHttpRequest();
                                                     xhr.open('POST', action, true);
                                                     xhr.send(form_data);
                                                     xhr.onreadystatechange = function () {
                                                       if(xhr.readyState == 4 && xhr.status == 200) {
                                                          var result = xhr.responseText;
                                                          console.log('Result: ' + result);
                                                          var json = JSON.parse(result);
                                                          document.getElementById("nopatents").style.display="none";
                                                          document.getElementById("addnewpatents").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                          form.reset();
                                                       }
                                                     };
                                                   }
                                                   </script>
                                                   <div class="card-content">
                                                     &nbsp;
                                                   </div>
                                                 </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="divider"></div><br>
                                        <div class="row" style="margin:10px;">
                                            <div class="col s12 m6 l6">
                                                <div class="card ">
                                                   <div class="card-content ">
                                                     <span class="card-title"><i class="material-icons">insert_drive_file</i>&nbsp;Research Papers</span>
                                                     <li class="divider"></li><br>
                                                     <span id="noresearchpapers" class="blue-text">Add your research papers</span>
                                                     @foreach ($portfolio as $edu)
                                                     @if ($edu->category=='researchpapers' && $edu->nature=='researchpapers')
                                                      <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                      <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="id" value="{{$edu->id}}">
                                                      </form>
                                                      <script type="text/javascript">
                                                        document.getElementById("noresearchpapers").style.display="none";
                                                        var deleteresearchpapers=document.getElementById('{{$edu->data}}');
                                                        deleteresearchpapers.addEventListener("click",deleteresearchpapersfunction)
                                                        function deleteresearchpapersfunction() {
                                                        var form=document.getElementById('{{$edu->id}}');
                                                        var action = form.getAttribute("action");
                                                        var form_data = new FormData(form);
                                                        var xhr = new XMLHttpRequest();
                                                        xhr.open('POST', action, true);
                                                        xhr.send(form_data);
                                                        xhr.onreadystatechange = function () {
                                                          if(xhr.readyState == 4 && xhr.status == 200) {
                                                             var result = xhr.responseText;
                                                             console.log('Result: ' + result);


                                                          }
                                                        };
                                                      }
                                                      </script>
                                                     @endif
                                                     @endforeach
                                                     <div id="addnewresearchpapers">
                                                     </div>
                                                     <br>
                                                     <form id="addresearchpapers-form" action="{{route('addresearchpapers')}}" method="post">
                                                       {{csrf_field()}}
                                                       <div class="input-field col s12">
                                                         <input id="researchpapers" type="text" name="researchpapers">
                                                         <label for="researchpapers">
                                                           Enter your research papers
                                                         </label>
                                                         <button type="submit" class="btn btn-floating right"id="addresearchpapersbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                       </div>
                                                     </form>
                                                     <script type="text/javascript">
                                                       var addresearchpapersbtn=document.getElementById('addresearchpapersbtn');
                                                       addresearchpapersbtn.addEventListener("click", function(event) {
                                                       addresearchpapersfunction();
                                                       event.preventDefault();
                                                       });

                                                       function addresearchpapersfunction() {
                                                       var form=document.getElementById('addresearchpapers-form');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                            var result = xhr.responseText;
                                                            console.log('Result: ' + result);
                                                            var json = JSON.parse(result);
                                                            document.getElementById("noresearchpapers").style.display="none";
                                                            document.getElementById("addnewresearchpapers").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                            form.reset();
                                                         }
                                                       };
                                                     }
                                                     </script>
                                                     <div class="card-content">
                                                       &nbsp;
                                                     </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <div class="card ">
                                                   <div class="card-content ">
                                                     <span class="card-title"><i class="material-icons">location_on</i>&nbsp;Places</span>
                                                     <li class="divider"></li><br>
                                                     <b>From :</b><br>
                                                     <span id="nofrom" class="blue-text">Add where you're from</span>
                                                     @foreach ($portfolio as $edu)
                                                     @if ($edu->category=='location' && $edu->nature=='from')
                                                      <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                      <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="id" value="{{$edu->id}}">
                                                      </form>
                                                      <script type="text/javascript">
                                                        document.getElementById("nofrom").style.display="none";
                                                        var deletefrom=document.getElementById('{{$edu->data}}');
                                                        deletefrom.addEventListener("click",deletefromfunction)
                                                        function deletefromfunction() {
                                                        var form=document.getElementById('{{$edu->id}}');
                                                        var action = form.getAttribute("action");
                                                        var form_data = new FormData(form);
                                                        var xhr = new XMLHttpRequest();
                                                        xhr.open('POST', action, true);
                                                        xhr.send(form_data);
                                                        xhr.onreadystatechange = function () {
                                                          if(xhr.readyState == 4 && xhr.status == 200) {
                                                             var result = xhr.responseText;
                                                             console.log('Result: ' + result);


                                                          }
                                                        };
                                                      }
                                                      </script>
                                                     @endif
                                                     @endforeach
                                                     <div id="addnewfrom">
                                                     </div>
                                                     <br>
                                                     <form id="addfrom-form" action="{{route('addfrom')}}" method="post">
                                                       {{csrf_field()}}
                                                       <div class="input-field col s12">
                                                         <input id="from" type="text" name="from">
                                                         <label for="from">
                                                           Enter where you're from
                                                         </label>
                                                         <button type="submit" class="btn btn-floating right"id="addfrombtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                       </div>
                                                     </form>
                                                     <script type="text/javascript">
                                                       var addfrombtn=document.getElementById('addfrombtn');
                                                       addfrombtn.addEventListener("click", function(event) {
                                                       addfromfunction();
                                                       event.preventDefault();
                                                       });

                                                       function addfromfunction() {
                                                       var form=document.getElementById('addfrom-form');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                            var result = xhr.responseText;
                                                            console.log('Result: ' + result);
                                                            var json = JSON.parse(result);
                                                            document.getElementById("nofrom").style.display="none";
                                                            document.getElementById("addnewfrom").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                            form.reset();
                                                         }
                                                       };
                                                     }
                                                     </script>
                                                     <br><br>
                                                     <b>living :</b><br>
                                                     <span id="noliving" class="blue-text">Add where you're living</span>
                                                     @foreach ($portfolio as $edu)
                                                     @if ($edu->category=='location' && $edu->nature=='living')
                                                      <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                      <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="id" value="{{$edu->id}}">
                                                      </form>
                                                      <script type="text/javascript">
                                                        document.getElementById("noliving").style.display="none";
                                                        var deleteliving=document.getElementById('{{$edu->data}}');
                                                        deleteliving.addEventListener("click",deletelivingfunction)
                                                        function deletelivingfunction() {
                                                        var form=document.getElementById('{{$edu->id}}');
                                                        var action = form.getAttribute("action");
                                                        var form_data = new FormData(form);
                                                        var xhr = new XMLHttpRequest();
                                                        xhr.open('POST', action, true);
                                                        xhr.send(form_data);
                                                        xhr.onreadystatechange = function () {
                                                          if(xhr.readyState == 4 && xhr.status == 200) {
                                                             var result = xhr.responseText;
                                                             console.log('Result: ' + result);


                                                          }
                                                        };
                                                      }
                                                      </script>
                                                     @endif
                                                     @endforeach
                                                     <div id="addnewliving">
                                                     </div>
                                                     <br>
                                                     <form id="addliving-form" action="{{route('addliving')}}" method="post">
                                                       {{csrf_field()}}
                                                       <div class="input-field col s12">
                                                         <input id="living" type="text" name="living">
                                                         <label for="living">
                                                           Enter where you're living
                                                         </label>
                                                         <button type="submit" class="btn btn-floating right"id="addlivingbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                       </div>
                                                     </form>
                                                     <script type="text/javascript">
                                                       var addlivingbtn=document.getElementById('addlivingbtn');
                                                       addlivingbtn.addEventListener("click", function(event) {
                                                       addlivingfunction();
                                                       event.preventDefault();
                                                       });

                                                       function addlivingfunction() {
                                                       var form=document.getElementById('addliving-form');
                                                       var action = form.getAttribute("action");
                                                       var form_data = new FormData(form);
                                                       var xhr = new XMLHttpRequest();
                                                       xhr.open('POST', action, true);
                                                       xhr.send(form_data);
                                                       xhr.onreadystatechange = function () {
                                                         if(xhr.readyState == 4 && xhr.status == 200) {
                                                            var result = xhr.responseText;
                                                            console.log('Result: ' + result);
                                                            var json = JSON.parse(result);
                                                            document.getElementById("noliving").style.display="none";
                                                            document.getElementById("addnewliving").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                            form.reset();
                                                         }
                                                       };
                                                     }
                                                     </script>
                                                     <div class="card-content">
                                                       &nbsp;
                                                     </div>
                                                   </div>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="divider"></div><br>
                                          <div class="row" style="margin:10px;">
                                              <div class="col s12 m6 l6">
                                                  <div class="card ">
                                                     <div class="card-content ">
                                                       <span class="card-title"><i class="material-icons">recent_actors</i>&nbsp;Interests</span>
                                                       <li class="divider"></li><br>
                                                       <span id="nointerests" class="blue-text">Add your interests</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='interests' && $edu->nature=='interests')
                                                        <span class="chip col s12">{{$edu->data}}<i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("nointerests").style.display="none";
                                                          var deleteinterests=document.getElementById('{{$edu->data}}');
                                                          deleteinterests.addEventListener("click",deleteinterestsfunction)
                                                          function deleteinterestsrsityfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
                                                          var action = form.getAttribute("action");
                                                          var form_data = new FormData(form);
                                                          var xhr = new XMLHttpRequest();
                                                          xhr.open('POST', action, true);
                                                          xhr.send(form_data);
                                                          xhr.onreadystatechange = function () {
                                                            if(xhr.readyState == 4 && xhr.status == 200) {
                                                               var result = xhr.responseText;
                                                               console.log('Result: ' + result);


                                                            }
                                                          };
                                                        }
                                                        </script>
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewinterests">
                                                       </div>
                                                       <br>
                                                       <form id="addinterests-form" action="{{route('addinterests')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="interests" type="text" name="interests">
                                                           <label for="interests">
                                                             Enter your interests
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addinterestsbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addinterestsbtn=document.getElementById('addinterestsbtn');
                                                         addinterestsbtn.addEventListener("click", function(event) {
                                                         addinterestsfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addinterestsfunction() {
                                                         var form=document.getElementById('addinterests-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("nointerests").style.display="none";
                                                              document.getElementById("addnewinterests").innerHTML+='<span class="chip col s12">'+json+'</span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <div class="card-content">
                                                         &nbsp;
                                                       </div>
                                                     </div>
                                                  </div>
                                              </div>
                                              {{-- <div class="col s12 m6 l6">
                                                  <div class="card ">
                                                     <div class="card-content ">
                                                       <span class="card-title"><i class="material-icons">group</i>&nbsp;Social Links</span>
                                                       <li class="divider"></li><br>
                                                       <b>Facebook:</b><br>
                                                       <span id="nofacebook" class="blue-text">Add your facebook</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='facebook')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("nofacebook").style.display="none";
                                                          var deletefacebook=document.getElementById('{{$edu->data}}');
                                                          deletefacebook.addEventListener("click",deletefacebookfunction)
                                                          function deletefacebookfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
                                                          var action = form.getAttribute("action");
                                                          var form_data = new FormData(form);
                                                          var xhr = new XMLHttpRequest();
                                                          xhr.open('POST', action, true);
                                                          xhr.send(form_data);
                                                          xhr.onreadystatechange = function () {
                                                            if(xhr.readyState == 4 && xhr.status == 200) {
                                                               var result = xhr.responseText;
                                                               console.log('Result: ' + result);


                                                            }
                                                          };
                                                        }
                                                        </script>
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewfacebook">
                                                       </div>
                                                       <br>
                                                       <form id="addfacebook-form" action="{{route('addfacebook')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="facebook" type="text" name="facebook">
                                                           <label for="facebook">
                                                             Enter your facebook
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addfacebookbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addfacebookbtn=document.getElementById('addfacebookbtn');
                                                         addfacebookbtn.addEventListener("click", function(event) {
                                                         addfacebookfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addfacebookfunction() {
                                                         var form=document.getElementById('addfacebook-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("nofacebook").style.display="none";
                                                              document.getElementById("addnewfacebook").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <br><br>
                                                       <b>LinkedIn :</b><br>
                                                       <span id="nolinkedin" class="blue-text">Add your linkedin</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='linkedin')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" target="_blank" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("nolinkedin").style.display="none";
                                                          var deletelinkedin=document.getElementById('{{$edu->data}}');
                                                          deletelinkedin.addEventListener("click",deletelinkedinfunction)
                                                          function deletelinkedinfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
                                                          var action = form.getAttribute("action");
                                                          var form_data = new FormData(form);
                                                          var xhr = new XMLHttpRequest();
                                                          xhr.open('POST', action, true);
                                                          xhr.send(form_data);
                                                          xhr.onreadystatechange = function () {
                                                            if(xhr.readyState == 4 && xhr.status == 200) {
                                                               var result = xhr.responseText;
                                                               console.log('Result: ' + result);


                                                            }
                                                          };
                                                        }
                                                        </script>
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewlinkedin">
                                                       </div>
                                                       <br>
                                                       <form id="addlinkedin-form" action="{{route('addlinkedin')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="linkedin" type="text" name="linkedin">
                                                           <label for="linkedin">
                                                             Enter your linkedin
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addlinkedinbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addlinkedinbtn=document.getElementById('addlinkedinbtn');
                                                         addlinkedinbtn.addEventListener("click", function(event) {
                                                         addlinkedinfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addlinkedinfunction() {
                                                         var form=document.getElementById('addlinkedin-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("nolinkedin").style.display="none";
                                                              document.getElementById("addnewlinkedin").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <br><br>
                                                       <b>Twitter :</b><br>
                                                       <span id="notwitter" class="blue-text">Add your twitter</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='twitter')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("notwitter").style.display="none";
                                                          var deletetwitter=document.getElementById('{{$edu->data}}');
                                                          deletetwitter.addEventListener("click",deletetwitterfunction)
                                                          function deletetwitterfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
                                                          var action = form.getAttribute("action");
                                                          var form_data = new FormData(form);
                                                          var xhr = new XMLHttpRequest();
                                                          xhr.open('POST', action, true);
                                                          xhr.send(form_data);
                                                          xhr.onreadystatechange = function () {
                                                            if(xhr.readyState == 4 && xhr.status == 200) {
                                                               var result = xhr.responseText;
                                                               console.log('Result: ' + result);


                                                            }
                                                          };
                                                        }
                                                        </script>
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewtwitter">
                                                       </div>
                                                       <br>
                                                       <form id="addtwitter-form" action="{{route('addtwitter')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="twitter" type="text" name="twitter">
                                                           <label for="twitter">
                                                             Enter your twitter
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addtwitterbtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addtwitterbtn=document.getElementById('addtwitterbtn');
                                                         addtwitterbtn.addEventListener("click", function(event) {
                                                         addtwitterfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addtwitterfunction() {
                                                         var form=document.getElementById('addtwitter-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("notwitter").style.display="none";
                                                              document.getElementById("addnewtwitter").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <br><br>
                                                       <b>Instagram :</b><br>
                                                       <span id="noinstagram" class="blue-text">Add your instagram</span>
                                                       @foreach ($portfolio as $edu)
                                                       @if ($edu->category=='social' && $edu->nature=='instagram')
                                                        <span class="chip col s12"><a href="//{{$edu->data}}" class="blue-text"><u>{{$edu->data}}</u></a><i id="{{$edu->data}}"class="close material-icons">close</i></span>
                                                        <form id="{{$edu->id}}" action="{{route('deleteportfolio')}}" method="post">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$edu->id}}">
                                                        </form>
                                                        <script type="text/javascript">
                                                          document.getElementById("noinstagram").style.display="none";
                                                          var deleteinstagram=document.getElementById('{{$edu->data}}');
                                                          deleteinstagram.addEventListener("click",deleteinstagramfunction)
                                                          function deleteinstagramfunction() {
                                                          var form=document.getElementById('{{$edu->id}}');
                                                          var action = form.getAttribute("action");
                                                          var form_data = new FormData(form);
                                                          var xhr = new XMLHttpRequest();
                                                          xhr.open('POST', action, true);
                                                          xhr.send(form_data);
                                                          xhr.onreadystatechange = function () {
                                                            if(xhr.readyState == 4 && xhr.status == 200) {
                                                               var result = xhr.responseText;
                                                               console.log('Result: ' + result);


                                                            }
                                                          };
                                                        }
                                                        </script>
                                                       @endif
                                                       @endforeach
                                                       <div id="addnewinstagram">
                                                       </div>
                                                       <br>
                                                       <form id="addinstagram-form" action="{{route('addinstagram')}}" method="post">
                                                         {{csrf_field()}}
                                                         <div class="input-field col s12">
                                                           <input id="instagram" type="text" name="instagram">
                                                           <label for="instagram">
                                                             Enter your instagram
                                                           </label>
                                                           <button type="submit" class="btn btn-floating right"id="addinstagrambtn" name="button"><i type="submit"class="material-icons">send</i></button>
                                                         </div>
                                                       </form>
                                                       <script type="text/javascript">
                                                         var addinstagrambtn=document.getElementById('addinstagrambtn');
                                                         addinstagrambtn.addEventListener("click", function(event) {
                                                         addinstagramfunction();
                                                         event.preventDefault();
                                                         });

                                                         function addinstagramfunction() {
                                                         var form=document.getElementById('addinstagram-form');
                                                         var action = form.getAttribute("action");
                                                         var form_data = new FormData(form);
                                                         var xhr = new XMLHttpRequest();
                                                         xhr.open('POST', action, true);
                                                         xhr.send(form_data);
                                                         xhr.onreadystatechange = function () {
                                                           if(xhr.readyState == 4 && xhr.status == 200) {
                                                              var result = xhr.responseText;
                                                              console.log('Result: ' + result);
                                                              var json = JSON.parse(result);
                                                              document.getElementById("noinstagram").style.display="none";
                                                              document.getElementById("addnewinstagram").innerHTML+='<span class="chip col s12"><a href="//'+json+'" class="blue-text"><u>'+json+'</u></a></span>';
                                                              form.reset();
                                                           }
                                                         };
                                                       }
                                                       </script>
                                                       <div class="card-content">
                                                         &nbsp;
                                                       </div>
                                                     </div>
                                                  </div>
                                              </div> --}}
                                            </div>
                              </div>

                            </div>


          <div class="col s12 m12 l12">
          <div class="card">
            <div class="card-action">
                <h5><b>Skills and Strengths</b></h5>

                   <li class="divider"></li>
            </div>
            <div class="card-content">


                  <div class="row">
                      <div class="col s12 m6 l6">
                        <div class="card">
                          <div class="card-action">
                            Skills
                            <li class="divider"></li>
                          </div>
                          <div class="card-content">

                            <!-- chips -->
                            @foreach ($userskill as $userskills)
                              @if($userskills->type=="skill")
                            <div class="chip">

                                {{$userskills->skill}}

                              <i id="{{$userskills->skill}}"class="close material-icons">close</i>
                            </div>
                            <form id="{{$userskills->id}}" action="{{route('deleteskill')}}" method="post">
                             {{ csrf_field() }}
                             <input type="hidden" name="id" value="{{$userskills->id}}">
                            </form>
                            <script type="text/javascript">
                              var deletealignedbtn=document.getElementById('{{$userskills->skill}}');
                              deletealignedbtn.addEventListener("click",deletealignedfunction)
                              function deletealignedfunction() {
                              var form=document.getElementById('{{$userskills->id}}');
                              var action = form.getAttribute("action");
                              var form_data = new FormData(form);
                              var xhr = new XMLHttpRequest();
                              xhr.open('POST', action, true);
                              xhr.send(form_data);
                              xhr.onreadystatechange = function () {
                                if(xhr.readyState == 4 && xhr.status == 200) {
                                   var result = xhr.responseText;
                                   console.log('Result: ' + result);
                                }
                              };
                            }
                            </script>
                          @endif
                            @endforeach

                            <form id="skillform" action="{{ route('skill')}}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" id="skillinput" name="skill" value="">

                            <br><span class="blue-text">Enter your skills below</span>
                           <div id="skillchip" style="border-bottom:2px solid #0d47a1;"class="chips chips-initial"></div>

                            </form>

                            <script type="text/javascript">
                            var y=0;
                            $('#skillchip').on('chip.add', function(e, chip){


                              var z=$('#skillchip').material_chip('data');

                              var form = document.getElementById("skillform");
                              var action = form.getAttribute("action");
                              var skillinput=document.getElementById("skillinput");
                              skillinput.value=z[y].tag;
                              var form_data = new FormData(form);
                              var xhr = new XMLHttpRequest();
                              xhr.open('POST', action, true);
                              xhr.send(form_data);
                              console.log(form_data);
                              xhr.onreadystatechange = function () {
                                if(xhr.readyState == 4 && xhr.status == 200) {
                                   var result = xhr.responseText;
                                   console.log('Result: ' + result);
                                }
                              };

                              console.log(z[y].tag);
                              y++;
                            });
                            </script>

                          </div>
                        </div>
                      </div>


                        <div class="col s12 m6 l6">
                          <div class="card">
                            <div class="card-action">
                              Strengths
                              <li class="divider"></li>
                            </div>
                            <div class="card-content">
                              <!-- chips -->
                              @foreach ($userskill as $userskills)
                                @if($userskills->type=="strength")
                              <div class="chip">

                                  {{$userskills->skill}}

                                <i id="{{$userskills->skill}}"class="close material-icons">close</i>
                              </div>
                              <form id="{{$userskills->id}}" action="{{route('deleteskill')}}" method="post">
                               {{ csrf_field() }}
                               <input type="hidden" name="id" value="{{$userskills->id}}">
                              </form>
                              <script type="text/javascript">
                                var deletealignedbtn=document.getElementById('{{$userskills->skill}}');
                                deletealignedbtn.addEventListener("click",deletealignedfunction)
                                function deletealignedfunction() {
                                var form=document.getElementById('{{$userskills->id}}');
                                var action = form.getAttribute("action");
                                var form_data = new FormData(form);
                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', action, true);
                                xhr.send(form_data);
                                xhr.onreadystatechange = function () {
                                  if(xhr.readyState == 4 && xhr.status == 200) {
                                     var result = xhr.responseText;
                                     console.log('Result: ' + result);
                                  }
                                };
                              }
                              </script>
                            @endif
                              @endforeach
                              <form id="strengthform"action="{{route('strength')}}" method="post">
                              {{ csrf_field() }}
                                <input type="hidden" id="strengthinput" name="strength" value="">
                                <br><span class="blue-text">Enter your strengths below</span>
                              <div style="border-bottom:2px solid #0d47a1;" id="strengthchip"class="chips chips-initial">

                              </div>
                              </form>
                              <script type="text/javascript">
                              var i=0;
                              $('#strengthchip').on('chip.add', function(e, chip){
                                //agdyabadadadad
                                var x=$('#strengthchip').material_chip('data');
                                var form = document.getElementById("strengthform");
                                var action = form.getAttribute("action");
                                var strengthinput=document.getElementById("strengthinput");
                                strengthinput.value=x[i].tag;
                                var form_data = new FormData(form);
                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', action, true);
                                xhr.send(form_data);
                                console.log(form_data);
                                xhr.onreadystatechange = function () {
                                  if(xhr.readyState == 4 && xhr.status == 200) {
                                     var result = xhr.responseText;
                                     console.log('Result: ' + result);
                                  }
                                };
                                console.log(x[i].tag);
                                i++;
                              });
                              </script>
                            </div>

                          </div>
                        </div>
                      </div>



            </div>

          </div>
        </div>



     <!-- ///////////////////////// -->
     <!-- Second part -->

   <!-- //////////////// -->
   <!-- third part -->
     <div class="col s12 m12 l12">
       <div class="card">
         <div class="card-action">
            <h5><b>Goals</b></h5>
         </div>
         <ul class="collapsible popout" data-collapsible="accordion">
           <li>
             <div class="collapsible-header"><b>Accomplished Goals</b></div>
             @foreach ($goal as $goals)
               @if ($goals->goalcompletedpercentage==100)
                 <div class="collapsible-body">
                   {{$goals->goalname}}
                   <div class="progress">
                       <div class="determinate" style="width: {{$goals->goalcompletedpercentage}}%"> </div>
                   </div>
                   {{$goals->goalcompletedpercentage}}%
                 </div>
               @endif
             @endforeach
           </li>

           <li>
             <div class="collapsible-header"><b>Goals in progress</b></div>
             @foreach ($goal as $goals)
               @if ($goals->goalcompletedpercentage<100)
                 <div class="collapsible-body">
                   {{$goals->goalname}}
                   <div class="progress">
                       <div class="determinate" style="width: {{$goals->goalcompletedpercentage}}%"> </div>
                   </div>
                   {{$goals->goalcompletedpercentage}}%
                 </div>
               @endif
             @endforeach
           </li>

         </ul>
         <br>
         <br><br>

     </div>
   </div>
<!-- ///////////////// -->


<!-- forthpart -->
     <div class="col s12 m12 l12 center-align">
       <div class="card ">

            <div class="card-action">
               <h5><b>Friends</b></h5>
            </div>


          <div class="card-action">
            @foreach ($friends as $friend)
              @if ($friend->id!=Auth::id())
              <a href="{{url('/search/'.$friend->id)}}"><div class="chip">
                <img src="{{asset('uploads/avatars/'.$friend->avatar)}}" alt="Contact Person">
                {{$friend->fname}}&nbsp;{{$friend->lname}}
              </div></a>
              @endif
            @endforeach
            @foreach ($friendstwos as $friendtwo)
              @if ($friendtwo->id!=Auth::id())
              <a href="{{url('/search/'.$friendtwo->id)}}"><div class="chip">
                <img src="{{asset('uploads/avatars/'.$friendtwo->avatar)}}" alt="Contact Person">
                {{$friendtwo->fname}}&nbsp;{{$friendtwo->lname}}
              </div></a>
              @endif
            @endforeach

         </div>

            </div>

                <script type="text/javascript">
                $('.chips').material_chip();
                </script>

          </div>
     </div>
     <!-- ///////////// -->
     <!-- forthpart -->

          </div>





   </div>
</div>

</div>


@endsection
