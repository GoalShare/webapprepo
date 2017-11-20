@extends('layouts.navbar')

@section('content')
  <script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>
<style>
#inputfiledis{

  text-align: center;
  line-height: 250px;
  color: #000000;
  font-family: Arial;
}

#inputfile{
  position: absolute;
  margin: 0;
  padding: 0;
  width: 50%;
  height: 50%;
  outline: none;
  opacity: 0;
}

#filesform{

  border: 2px dashed #bdbdbd;
  background-color: #f5f5f5;
  height:450px;
}

.upload > input{

  display: none;
}


</style>


<form class="" id="dblearningfileform" action="{{route('existingboarduploadfile')}}" method="post">
 {{csrf_field()}}
 <input type="hidden" name="filename" value="" id="filenameinput">
 <input type="hidden" name="title" value="" id="titleinput">
 <input type="hidden" name="discription" value="" id="discriptioninput">
 <input type="hidden" name="CTIDinput" value="" id="CTIDinput">
 <input type="hidden" name="CCIDinput" value="" id="CCIDinput">
 <input type="hidden" name="SCIDinput" value="" id="SCIDinput">
 <input type="hidden" name="LIDinput" value="" id="LIDinput">
</form>

<div class="container">
  <div class="row hide-on-small-only"><br><br>
    <div class="col l2 m2  center-align">
      <span class=" red-text "><b>New Goal</b></span><br>
      <a href="#addgoal" class="btn btn-floating red btn-large "><i class="material-icons">add</i></a>
    </div>
    <div class="col l2 m2  center-align">
      <span class=" blue-text text-lighten-1"><b>Send Invite</b></span><br>
      <a class="btn btn-floating blue lighten-1 btn-large googleContactsButton" href="#myModal11"><i class="material-icons">people</i></a>
    </div>
    <div class="col l2 m2  center-align">
      <span class=" grey-text text-darken-3"><b>Dashboard</b></span><br>
      <a href="{{url('/dashboard')}}" class="btn btn-floating grey darken-3 btn-large "><i class="material-icons">dashboard</i></a>
    </div>
    <div class="col l2 m2 center-align">
      <span class=" blue-text text-darken-4"><b>Knowledge Hub</b></span><br>
      <a href="{{url('/mainlearningboard')}}" class="btn btn-floating btn-large "><i class="material-icons">attach_file</i></a>
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
  <div class="card">
  @foreach ($learningboardtable as $learningboardtables)
    @if ($learningboardtables->ID==$lbid)
      <center><h4 class="">Upload Your Files to the {{$learningboardtables->LB_Name}}</h4></center>
      <script>
      document.getElementById('CTIDinput').value={{$learningboardtables->CT_ID}};
      document.getElementById('CCIDinput').value={{$learningboardtables->CC_ID}};
      document.getElementById('SCIDinput').value={{$learningboardtables->SC_ID}};
      document.getElementById('LIDinput').value={{$learningboardtables->ID}};
      </script>
    @endif
  @endforeach
  <hr>
  <div class="col s12" style="height:30px;"></div>
    <div class="row">
      <div id="progressdiv" style="display:none;">
        <div class="col s11">
          <div class="progress">
            <div class="determinate" id="percentage"></div>
          </div>
        </div>


        <div class="col s1">
          <b><span class="right" id="percentagedis"></span></b>
        </div>
      </div>
<form action="{{route('existingboarduploadfile')}}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
      <div class="col s12" style="height:30px;"></div>

        <div class="col l6">
          <div id="filesform">
            <input id="inputfile" type="file" name="allfiles" accept=".jpeg,.gif,.png,.jpg,.mkv,.flv,.vob,.avi,.mov,.wmv,.amv,.mp4,.m4p,.m4v,.3gp,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">

            <p id="inputfiledis">

              <div style="text-align:center;">
              <i style="font-size: 200px;color:#bdbdbd;" class="material-icons">cloud_upload</i>
              </div>
                <p id="ee" style="text-align:center;">Drag your files here or click in this area.</p>

            </p>

            <div class="col s12" style="height:30px;"></div>

            <div class="col s12">
              <div class="col s4">
                <div class="upload">
                  <label for="fileinputimg">
                    <img src="{{asset('img/t1.png')}}"/>
                  </label>
                  <input id="fileinputimg" type="file" name="myImage"  accept="image/*"/>

                </div>
              </div>

              <div class="col s4">
                <div class="upload">
                  <label for="fileinputvideo">
                    <img src="{{asset('img/t2.png')}}"/>
                  </label>
                  <input type="file" id="fileinputvideo" name="myVideo" accept="video/*">

                </div>
              </div>

              <div class="col s4">
                <div class="upload">
                  <label for="fileinputdoc">
                    <img src="{{asset('img/t3.png')}}"/>
                  </label>
                  <input id="fileinputdoc" type="file" name="myDoc"  accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"/>
                </div>

              </div>

            </div>
          </div>
        </div>

        <div class="col l6">
          <div class="col s12" style="height:100px;"></div>
            <input type="text" id="existingboardtitle"  name="existingboardtitle" value="" oninput="validateinput()" placeholder="Enter a title" required>
              <div id="errormsg" style="color:red;font-size:10px;display:none;"></div>


          <input type="text" id="discription" placeholder="Give a discription">


         <div class="col s12" style="height:300px;"></div>
         <div class="col s12">
           <div class="col s4">
             <button class="btn" type="reset">Cancel</button>
           </div>
           <div class="col s4 "></div>
           <div class="col s4">
             <button class="btn" onclick="qwert()" type="submit">Upload</button>
           </div>
         </div>
         <div class="col s12" style="height:10px;"></div>
       </div>

  </form>


     <script type="text/javascript">
        AWS.config.update({
                accessKeyId : 'AKIAIZ53HQQ6SFH3XHDQ',
                secretAccessKey : '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'
        });
        AWS.config.region = 'ap-southeast-1';
    </script>

    <script type="text/javascript">

       function qwert(){

            var bucket = new AWS.S3({params: {Bucket: 'lifewithgoals'}});
            var fileChooser = document.getElementById('inputfile');
            var title=document.getElementById('existingboardtitle').value;
            var learningboarddis=document.getElementById('discription').value;
            var filename=document.getElementById('inputfile').value;
            var file = fileChooser.files[0];
            var tempfilename=file.name;
            var filenameinput=document.getElementById('filenameinput');
            var titleinput=document.getElementById('titleinput');
            var learningboarddisinput=document.getElementById('discriptioninput');
            var newfilenameform=document.getElementById('dblearningfileform');

            if (file) {
      document.getElementById("progressdiv").style.display="inline";

        var params = {
        Key: tempfilename, ContentType: file.type, Body: file};
        bucket.upload(params).on('httpUploadProgress', function(evt) {
            console.log("Uploaded :: " + parseInt((evt.loaded * 100) / evt.total)+'%');
            document.getElementById("percentage").style.width=(parseInt((evt.loaded * 100) / evt.total)+'%');
            document.getElementById("percentagedis").innerHTML=(parseInt((evt.loaded * 100) / evt.total)+'%');
            if((parseInt((evt.loaded * 100) / evt.total)+'%')=="100%"){
              document.getElementById("progressdiv").style.display="none";
            }
    }).send(function(err, data) {
    filenameinput.value=tempfilename;
    titleinput.value=title;
    learningboarddisinput.value=learningboarddis;
    newfilenameform.submit();

    });


      }


     }


    </script>

    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('form input').change(function () {
      $('#ee').text(this.files.length + " file(s) selected");
            });
      });
</script>
@endsection
