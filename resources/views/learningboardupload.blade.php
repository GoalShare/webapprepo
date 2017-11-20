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
    <center><h4 class="">Knowledge Hub File Upload</h4></center>
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

<div class="col s12">
      <a class="btn right" href="{{url('existingboard')}}" style="cursor:pointer;" href="#">Add more</a>
</div>

<div class="col s12" style="height:30px;"></div>

      <form id="learningboardUploadForm" method="post" enctype="multipart/form-data" action="{{route('learningboarduploadfile')}}">
        {{csrf_field()}}
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

          <input type="text" id="learningboardname"  name="learningboardname" value="" oninput="validateinput()" placeholder="Enter a name to your new learning board" required>
          <div id="errormsg" style="color:red;font-size:10px;display:none;"></div>
          <script type="text/javascript">

            function validateinput() {
               $.post('{{route('inputlearningboard')}}',{
               searchname:$('#learningboardname').val(),
               _token:'{{ csrf_token() }}'
              },function(data,status){
              console.log('Data: ' + data + 'Status: ' + status);
              var obj=JSON.parse(data);
              for(i=0;i < obj.length;i++){
              console.log('Data: ' + obj[i].title);
              if(obj[i].title!==null){
                document.getElementById("errormsg").style.display="inline";
                document.getElementById("errormsg").innerHTML=document.getElementById("errormsg").innerHTML+"This name is already in the learningboard";

              }

              else{
                  document.getElementById("errormsg").style.display="none";
              }
                }
                          });
                    }

          </script>


          <input type="text" id="priority" name="priority" placeholder="Give a priority to your learning board" required>


          <input type="text" id="title" placeholder="Give a title for your 1st video/photo/document">

          <input type="text" id="discription" placeholder="Give a discription to your learning board">



          <h6>Select Category</h6>

          <div class="col s12">
            <div class="input-field">
              <select name="categorytype" id="categorytype" class="browser-default" required>
                 <option value="" disabled selected>Choose your option</option>
                @foreach ($Categorytype as $Categorytypes)
                  <option value="{{$Categorytypes->ID}}">{{$Categorytypes->Category_Name}}</option>
                @endforeach
              </select>
            </div>
          </div>


          <script>
            $(document).ready(function(){
              $("select#categorytype").change(function(){
                var selectedtype = $("#categorytype option:selected").val();
                  console.log(selectedtype);

                        $.post('{{route('getSelecteditem')}}',{
                          selectedID:selectedtype,
                          _token:'{{ csrf_token() }}'
                                     },function(data,status){
                                       console.log('Data: ' + data + 'Status: ' + status);
                                       var obj=JSON.parse(data);
                                       document.getElementById('dropdown1').innerHTML='';
                                       for(i=0;i < obj.length;i++){
                                         console.log('Data: ' + obj[i].Category_Contain_Name +obj[i].ID + 'Status: ' + status);

                                        //  document.getElementById('categorycontain').innerHTML=document.getElementById('categorycontain').innerHTML+('<div class="col s4">'+'<div class="card"  style="height:75px;">'+obj[i].Category_Contain_Name+'</div></div>');
                         document.getElementById('dropdown1').innerHTML=document.getElementById('dropdown1').innerHTML+'<option value="'+obj[i].ID+'">'+obj[i].Category_Contain_Name+'</option>';

                                       }

                                     });



                  });
                  //  document.getElementById('categorycontain').style.display='none';
                });

          </script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();
      });
  </script>

<div class="col s12" style="height:20px;"></div>

  <div class="col s12">
  <select class="browser-default" id="dropdown1" required>
     <option value="" disabled selected>Choose your option</option>
  </select>
</div>

 <script>
   $(document).ready(function(){
     $("select#dropdown1").change(function(){
       var selectedcategorytype = $("#dropdown1 option:selected").val();
         console.log(selectedcategorytype);
         $.post('{{route('getcategorycontent')}}',{
           selectedcategorytypeID:selectedcategorytype,
               _token:'{{ csrf_token() }}'
                      },function(data,status){
                        console.log('Data: ' + data + 'Status: ' + status);
                        var obj=JSON.parse(data);
                        document.getElementById('subdropdown1').innerHTML='';
                        for(j=0;j < obj.length;j++){
                          console.log('Data: ' + obj[j].Sub_Contain_Name +obj[j].ID + 'Status: ' + status);

          document.getElementById('subdropdown1').innerHTML=document.getElementById('subdropdown1').innerHTML+'<option value="'+obj[j].ID+'">'+obj[j].Sub_Contain_Name+'</option>';
        }


                      });

                      });

                           });


         </script>

<div class="col s12" style="height:20px;"></div>
         <div class="col s12">
         <select class="browser-default" id="subdropdown1" required>
            <option value="" disabled selected>Choose your option</option>
         </select>
         </div>

         <script>
           $(document).ready(function(){
             $("select#subdropdown1").change(function(){
               var selectedsubcategorytype = $("#subdropdown1 option:selected").val();
                 console.log(selectedsubcategorytype);

                                   });

                                 });
                 </script>



         <div class="col s12" style="height:30px;"></div>
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

     <form class="" id="dblearningfileform" action="{{route('learningboarduploadfile')}}" method="post">
      {{csrf_field()}}
      <input type="hidden" name="filename" value="" id="filenameinput">
      <input type="hidden" name="learningboardname" value="" id="learningboardnameinput">
      <input type="hidden" name="learningboardpriority" value="" id="learningboardpriorityinput">
      <input type="hidden" name="title" value="" id="titleinput">
      <input type="hidden" name="discription" value="" id="discriptioninput">
      <input type="hidden" name="categorytype" value="" id="categorytypeinput">
      <input type="hidden" name="categorycontain" value="" id="dropdown1input">
      <input type="hidden" name="subcategory" value="" id="subdropdown1input">
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


            var formup=document.getElementById("learningboardUploadForm");
            var bucket = new AWS.S3({params: {Bucket: 'lifewithgoals'}});
            var fileChooser = document.getElementById('inputfile');
            var fileChooserimg=document.getElementById('fileinputimg');

            var fileChooservideo=document.getElementById('fileinputvideo');
            var fileChooserdoc=document.getElementById('fileinputdoc');

            // if(fileChooserimg !== null){
            //   fileChooser=fileChooserimg;
            // }
            //
            // else if(fileChooservideo !== null){
            //   fileChooser=fileChooservideo;
            // }
            //
            // else if(fileChooserdoc !== null){
            //   fileChooser=fileChooserdoc;
            // }

            var learningboardname=document.getElementById('learningboardname').value;
            var title=document.getElementById('title').value;
            var learningboarddis=document.getElementById('discription').value;
            var learningboardpriority=document.getElementById('priority').value;
            var categorytype=document.getElementById('categorytype').value;
            var dropdown1=document.getElementById('dropdown1').value;
            var subdropdown1=document.getElementById('subdropdown1').value;
            var filename=document.getElementById('inputfile').value;
            var file = fileChooser.files[0];
            var tempfilename=file.name;
            var filenameinput=document.getElementById('filenameinput');
            var learningboardnameinput=document.getElementById('learningboardnameinput');
            var titleinput=document.getElementById('titleinput');
            var learningboarddisinput=document.getElementById('discriptioninput');
            var learningboardpriorityinput=document.getElementById('learningboardpriorityinput');
            var categorytypeinput=document.getElementById('categorytypeinput');
            var dropdown1input=document.getElementById('dropdown1input');
            var subdropdown1input=document.getElementById('subdropdown1input');
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
    learningboardnameinput.value=learningboardname;
    titleinput.value=title;
    learningboarddisinput.value=learningboarddis;
    learningboardpriorityinput.value=learningboardpriority;
    categorytypeinput.value=categorytype;
    dropdown1input.value=dropdown1;
    subdropdown1input.value=subdropdown1;
    // filesizeinput.value=tempfilesize;
    newfilenameform.submit();


    // window.location.href = "index.php?filename="+tempfilename;


    });
    <!-- //formup.submit();

      }


     }

    //    function uploadlearningboardFileimg(){
    //      document.getElementById("progressdiv").style.display="inline";
    //
    //         var formup=document.getElementById("learningboardUploadForm");
    //         var bucket = new AWS.S3({params: {Bucket: 'lifewithgoals'}});
    //
    //         var fileChooserimg = document.getElementById('fileinputimg');
    //
    //         var filenameimg=document.getElementById('fileinputimg').value;
    //
    //         var fileimg = fileChooserimg.files[0];
    //
    //         var tempfilenameimg=fileimg.name;
    //
    //         // var tempfilesize=(file.size)/(1024*1024*1024);
    //         var filenameinput=document.getElementById('filenameinput');
    //         // var filesizeinput=document.getElementById('filesizeinput');
    //         var newfilenameform=document.getElementById('dblearningfileform');
    //
    // if (fileimg) {
    //
    //     var params = {
    //     Key: tempfilenameimg, ContentType: fileimg.type, Body: fileimg};
    //     bucket.upload(params).on('httpUploadProgress', function(evt) {
    //         console.log("Uploaded :: " + parseInt((evt.loaded * 100) / evt.total)+'%');
    //         document.getElementById("percentage").style.width=(parseInt((evt.loaded * 100) / evt.total)+'%');
    //         document.getElementById("percentagedis").innerHTML=(parseInt((evt.loaded * 100) / evt.total)+'%');
    //         if((parseInt((evt.loaded * 100) / evt.total)+'%')=="100%"){
    //           document.getElementById("progressdiv").style.display="none";
    //         }
    // }).send(function(err, data) {
    // filenameinput.value=tempfilenameimg;
    // // filesizeinput.value=tempfilesize;
    // newfilenameform.submit();
    //
    //
    // // window.location.href = "index.php?filename="+tempfilename;
    //
    //
    // });
    // <!-- //formup.submit();
    //
    //   }
    //
    //
    //
    //    }
    //
    //    function uploadlearningboardFilevideo(){
    //      document.getElementById("progressdiv").style.display="inline";
    //
    //         var formup=document.getElementById("learningboardUploadForm");
    //         var bucket = new AWS.S3({params: {Bucket: 'lifewithgoals'}});
    //
    //         var fileChooservideo = document.getElementById('fileinputvideo');
    //
    //         var filenamevideo=document.getElementById('fileinputvideo').value;
    //
    //         var filevideo = fileChooservideo.files[0];
    //
    //         var tempfilenamevideo=filevideo.name;
    //
    //         // var tempfilesize=(file.size)/(1024*1024*1024);
    //         var filenameinput=document.getElementById('filenameinput');
    //         // var filesizeinput=document.getElementById('filesizeinput');
    //         var newfilenameform=document.getElementById('dblearningfileform');
    //
    // if (fileimg) {
    //
    //     var params = {
    //     Key: tempfilenamevideo, ContentType: filevideo.type, Body: filevideo};
    //     bucket.upload(params).on('httpUploadProgress', function(evt) {
    //         console.log("Uploaded :: " + parseInt((evt.loaded * 100) / evt.total)+'%');
    //         document.getElementById("percentage").style.width=(parseInt((evt.loaded * 100) / evt.total)+'%');
    //         document.getElementById("percentagedis").innerHTML=(parseInt((evt.loaded * 100) / evt.total)+'%');
    //         if((parseInt((evt.loaded * 100) / evt.total)+'%')=="100%"){
    //           document.getElementById("progressdiv").style.display="none";
    //         }
    // }).send(function(err, data) {
    // filenameinput.value=tempfilenamevideo;
    // // filesizeinput.value=tempfilesize;
    // newfilenameform.submit();
    //
    //
    // // window.location.href = "index.php?filename="+tempfilename;
    //
    //
    // });
    // <!-- //formup.submit();
    //
    //   }
    //
    //
    //
    //    }
    //
    //    function uploadlearningboardFiledoc(){
    //      document.getElementById("progressdiv").style.display="inline";
    //
    //         var formup=document.getElementById("learningboardUploadForm");
    //         var bucket = new AWS.S3({params: {Bucket: 'lifewithgoals'}});
    //
    //         var fileChooserdoc = document.getElementById('fileinputdoc');
    //
    //         var filenamedoc=document.getElementById('fileinputdoc').value;
    //
    //         var filedoc = fileChooserdoc.files[0];
    //
    //         var tempfilenamedoc=filedoc.name;
    //
    //         // var tempfilesize=(file.size)/(1024*1024*1024);
    //         var filenameinput=document.getElementById('filenameinput');
    //         // var filesizeinput=document.getElementById('filesizeinput');
    //         var newfilenameform=document.getElementById('dblearningfileform');
    //
    // if (fileimg) {
    //
    //     var params = {
    //     Key: tempfilenamedoc, ContentType: filedoc.type, Body: filedoc};
    //     bucket.upload(params).on('httpUploadProgress', function(evt) {
    //         console.log("Uploaded :: " + parseInt((evt.loaded * 100) / evt.total)+'%');
    //         document.getElementById("percentage").style.width=(parseInt((evt.loaded * 100) / evt.total)+'%');
    //         document.getElementById("percentagedis").innerHTML=(parseInt((evt.loaded * 100) / evt.total)+'%');
    //         if((parseInt((evt.loaded * 100) / evt.total)+'%')=="100%"){
    //           document.getElementById("progressdiv").style.display="none";
    //         }
    // }).send(function(err, data) {
    // filenameinput.value=tempfilenamedoc;
    // // filesizeinput.value=tempfilesize;
    // newfilenameform.submit();
    //
    //
    // // window.location.href = "index.php?filename="+tempfilename;
    //
    //
    // });
    // <!-- //formup.submit();
    //
    //   }


       //
      //  }

    </script>
   </div>
 </div>
</div>
{{-- <form id="hidctform" action="{{route('formct')}}" method="post">
 {{csrf_field()}}
 <input type="hidden" name="ct" id="ct" value="">
</form> --}}

<script>
  $(document).ready(function(){
    $('form input').change(function () {
      $('#ee').text(this.files.length + " file(s) selected");
            });
      });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
    });
</script>

@endsection
