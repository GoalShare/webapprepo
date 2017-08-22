

 @extends('layouts.navbar')

@section('content')
<script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>

<!--<style>
  .cardsub{
    width:100px;
     height:70px;
  }
</style>-->

<div class="container">
  <div class="row">
    <div class="card" style="height:600px; overflow-y:scroll;">

      <div class="card-content">
        <div class="btn-floating right" style="display:none;" id="gridviewbtn">
          <i class="material-icons">view_module</i>
        </div>

        <div class="btn-floating right" id="listviewbtn">
          <i class="material-icons">list</i>
        </div>

        <script type="text/javascript">

        $(document).ready(function(){
            $("#listviewbtn").click(function() {
              $("#listviewbtn").hide();
              $("#listviewrow").show();
              $("#gridviewrow").hide();
              $("#gridviewbtn").show();
            });
            $("#gridviewbtn").click(function() {
              $("#gridviewrow").show();
              $("#listviewbtn").show();
              $("#gridviewbtn").hide();
              $("#listviewrow").hide();
            });
          });

        </script>

      <div class="row">
        <div class="col s12 m12 l4">
          <p class="card-title activator grey-text text-darken-4">Upload Your Files</p>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l8">
          <div class="blue-text text-darken-4" id="filesizebar" style="font-weight:bold;" disabled></div>
        </div>
      </div>

      <div class="row">
        <div id="progressdiv" style="display:none;">
          <div class="col s11 m11 l11">
            <div class="progress">
              <div class="determinate" id="percentage"></div>
            </div>
          </div>


          <div class="col s1 m1 l1">
            <b><span class="right" id="percentagedis"></span></b>
          </div>
        </div>
      </div>
    </div>



    <script>var totafilelsize=0;</script>

    <div class="row" id="gridviewrow">
     @foreach ($files as $file)

        <div class="col s12 m6 l2">

          <div class="card" id="{{$file->id}}cardgrid" style="height:220px;">

             <!--Modal Trigger -->
            <div data-target="{{$file->id}}gridpopup" class="modal-trigger">
            <div class="card-image waves-effect waves-block waves-light" style="height:100px;">

                 <script>
                     totafilelsize=totafilelsize+({{$file->size}});
                     var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';


                     var extension = fileName.split('.').pop();
                       if(extension=="pdf"){
                         document.write('<iframe src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" style="width:600px; height:100px;" frameborder="0"></iframe>');
                         }

                       else if(extension=="jpg" || extension=="png" || extension=="jpeg"){
                         document.write('<img src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" />');
                         }

                       else if(extension=="doc" || extension=="docx" || extension=="txt"){
                        document.write('<img src="img/icons8-DOC-50.png" height="200px" >');
                        }

                       else if(extension=="rar" || extension=="zip"){
                        document.write('<img src="img/icons8-RAR-50.png">');
                        }

                       else if(extension=="zip"){
                        document.write('<img src="img/icons8-ZIP-50.png">');
                       }
                </script>
             </div>
           </div>

       <div id="{{$file->id}}gridpopup" class="modal">
         <div class="modal-content">
             <h5><b>File Name:</b> {{$file->filename}}</h5>
             <script>
               var rd = {{$file->size}}.toFixed(4);
               document.write('<h5><b>File Size:</b>'+rd+'GB</h5>');
              </script>

             <h5><b>Uploaded Date:</b> {{$file->created_date}}</h5>
           </div>
       </div>

    <div class="card-content" style="height:120px;">
      <div class="row">
        <a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">
        <p style="font-size=5px;color:black;" class="truncate">Doc Name: {{$file->filename}}</p></a>
        <p class="truncate">New Name: {{$file->fakename}}</p>
      </div>

      <div class="row">
          <div class="col l4">
          <a class="modal-trigger" href="#{{$file->id}}modgrid"><i class="material-icons" style="cursor:pointer;color:#0d47a1;">mode_edit</i></a>
        </div>

        <div class="col l4">
          <a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" download>
          <i class="material-icons" style="color:#0d47a1;">file_download</i></a>
        </div>
        <div class="col l4">
            <form id="{{$file->id}}deleteformgrid" action="{{route('deletefile')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$file->id}}">
            <button type="submit" style="background-color:Transparent;border:none;"><i class="material-icons" style="color:black;">delete</i></button>
          </form>

        </div>
      </div>

          <!-- Modal Structure -->
          <div id="{{$file->id}}modgrid" class="modal">
            <div class="modal-content">
              <h5>File Name Already Exist: {{$file->filename}}</h5>
              <form method="POST" id="{{$file->id}}frmgrid" action="{{route('updatefilename')}}">
                {{csrf_field()}}
                <input type="text" name="newfilename" id="name{{$file->id}}grid" placeholder="Change Your File Name"  required>

                <input type="hidden" name="newfileid" value="{{$file->id}}" id="id{{$file->id}}grid">

                <button type="submit" class="btn">Send</button>

              </form>

            </div>
          </div>
       </div>
    </div>
</div>
 @endforeach
 </div>





     <div class="row" id="listviewrow" style="display:none;">

        @foreach ($files as $file)

         <div class="col s12 m12 l12">

         <div class="card" id="{{$file->id}}listcard" style="height:80px;">

        <!--Modal Trigger -->

<div class="row" style="height:50px;">

  <div class="col s3 m1 l1">
  <div data-target="{{$file->id}}listpopup" class="modal-trigger">
         <div class="card-image waves-effect waves-block waves-light" width="75%">

         <script>
           totafilelsize=totafilelsize+({{$file->size}});
         var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}';


         var extension = fileName.split('.').pop();
         if(extension=="pdf"){
           document.write('<img src="img/icons8-PDF-50.png" width="50px" height="50px">');
         }
        else if(extension=="jpg" || extension=="png" || extension=="jpeg"){
           document.write('<img src="img/icons8-Image File-50.png" height="50px"/>');
         }
       else if(extension=="doc" || extension=="docx" || extension=="txt"){
           document.write('<img src="img/icons8-DOC-50.png" height="50px">');
         }
       else if(extension=="zip"){
           document.write('<img src="img/icons8-ZIP-50.png" height="50px">');
         }
         else if(extension=="rar"){
           document.write('<img src="img/icons8-RAR-50.png" height="50px">');
         }
       </script>
     </div>
   </div>
     <div id="{{$file->id}}listpopup" class="modal">
       <div class="modal-content">
             <h5><b>File Name:</b> {{$file->filename}}</h5>
             <script>
               var rd = {{$file->size}}.toFixed(4);
               document.write('<h5><b>File Size:</b>'+rd+'GB</h5>');
              </script>

             <h5><b>Uploaded Date:</b> {{$file->created_date}}</h5>
           </div>
     </div>
       </div>



     <div class="col s7 m8 l8">
        <div>
            <a  style="font-size:12px;color:black;" href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}">
                Original File Name: {{$file->filename}}</a>
         </div>
         <div style="font-size:12px;color:black;">
                 Customized File Name: {{$file->fakename}}</a>
          </div>

         <div style="font-size:12px;color:black;">
            <script>
              var flsz = {{$file->size}}.toFixed(4);
              document.write('Size: '+flsz+'GB');
            </script>
          </div>

          <div style="font-size:12px;color:black;">
            Last uploaded date: {{$file->created_date}}
          </div>
     </div>


<div class="col s2 m2 l2">
  <div class="row"></div>
         <div class="row">
           <div class="col s12 m4 l4">
              <a class="modal-trigger" href="#{{$file->id}}mod">
                <i class="material-icons" style="cursor:pointer;color:#0d47a1;">mode_edit</i></a>
           </div>

           <div class="col s12 m4 l4">
               <a href="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$file->filename}}" download>
               <i class="material-icons" style="color:#0d47a1;">file_download</i></a>
            </div>

            <div class="col s12 m4 l4">
               <form id="{{$file->id}}deleteformlist" action="{{route('deletefile')}}" method="POST">
                 {{ csrf_field() }}
                 <input type="hidden" name="id" value="{{$file->id}}">
                 <button type="submit" style="background-color:Transparent;border:none;"><i class="material-icons" style="color:black;">delete</i></button>
                 </form>
          </div>
        </div>
          <!-- Modal Structure -->
         <div id="{{$file->id}}mod" class="modal">
            <div class="modal-content">
              <h5>File Name Already Exist: {{$file->fakename}}</h5>
              <form method="POST" id="{{$file->id}}frmgrid" action="{{route('updatefilename')}}">
                {{csrf_field()}}
                <input type="text" name="newfilename" id="name{{$file->id}}grid" placeholder="Change Your File Name"  required>

                <input type="hidden" name="newfileid" value="{{$file->id}}" id="id{{$file->id}}grid">

                <button type="submit" class="btn">Send</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

       <div id="{{$file->id}}" class="modal">
         <div class="modal-content">
           <h5><b>File Name:</b> {{$file->filename}} </h5>
           <script>
             var rd = {{$file->size}}.toFixed(4);
             document.write('<h5><b>File Size:</b>'+rd+'GB</h5>');
            </script>

           <h5><b>Uploaded Date:</b> {{$file->created_date}}</h5>
         </div>
       </div>


   @endforeach

       </div>




<script>
 var round = totafilelsize.toFixed(4);
 var remainsize=5-round;

document.getElementById("filesizebar").innerHTML="Your Total file size:"+" "+round+" "+"GB and Your remaining file size: "+remainsize+"GB";

 if(totalfilesize==5){
   document.getElementById("buttonupload").style.display="none";
 }
 </script>


</div>
</div>

</div>
 <form id="fileUploadForm" method="post" enctype="multipart/form-data" action="{{route('uploadfile')}}">
     {{csrf_field()}}
     <div class="file-field input-field">
     <div class="fixed-action-btn" style="margin-bottom:10%;">
      <button class="btn btn-floating halfway-fab right waves-effect pulse btn-large waves-light" data-position="top" data-delay="50">
      <i class="material-icons">file_upload</i>
      <input type="file" name="file" id="file"  id="buttonupload" onchange="uploadFile()" placeholder required>

      </button>
      </div>
       </div>

     </form>

 <form class="" id="filenameform" action="{{route('uploadfile')}}" method="post">
  {{csrf_field()}}
  <input type="hidden" name="filename" value="" id="filenameinput">
  <input type="hidden" name="filesize" value="" id="filesizeinput">
</form>
 <script type="text/javascript">
    AWS.config.update({
            accessKeyId : 'AKIAIZ53HQQ6SFH3XHDQ',
            secretAccessKey : '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'
    });
    AWS.config.region = 'ap-southeast-1';
</script>
<script type="text/javascript">
   function uploadFile(){
     document.getElementById("progressdiv").style.display="inline";

        var formup=document.getElementById("fileUploadForm");
        var bucket = new AWS.S3({params: {Bucket: 'lifewithgoals'}});
        var fileChooser = document.getElementById('file');
        var filename=document.getElementById('file').value;
        var file = fileChooser.files[0];
        var tempfilename=file.name;
        var tempfilesize=(file.size)/(1024*1024*1024);
        var filenameinput=document.getElementById('filenameinput');
        var filesizeinput=document.getElementById('filesizeinput');
        var newfilenameform=document.getElementById('filenameform');

if (file) {

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
filesizeinput.value=tempfilesize;
newfilenameform.submit();


// window.location.href = "index.php?filename="+tempfilename;


});
<!-- //formup.submit();

  }
   }
</script>


@endsection
