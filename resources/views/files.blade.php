@extends('layouts.navbar')

@section('content')
<script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>


<div class="container">
  <div class="card">

    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Upload Files</span>
    </div>
    <div>
     <form id="fileUploadForm" method="post" enctype="multipart/form-data" action="{{route('uploadfile')}}">
       <input type="file" name="file" id="file" value="dataFile" required>
       <input type="button" onclick="uploadFile();" value="Upload" />
     </form>

   @foreach ($files as $file)
     {{$file->filename}}<br>
   @endforeach
   </div>


  </div>

</div>
<form class="" id="filenameform" action="{{route('uploadfile')}}" method="post">
  {{csrf_field()}}
  <input type="hidden" name="filename" value="" id="filenameinput">
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
        var bucket = new AWS.S3({params: {Bucket: 'lifewithgoals'}});
        var fileChooser = document.getElementById('file');
        var filename=document.getElementById('file').value;
        var file = fileChooser.files[0];
        var tempfilename=file.name;
        var filenameinput=document.getElementById('filenameinput');
        var filenameform=document.getElementById('filenameform');

if (file) {

    var params = {
    Key: tempfilename, ContentType: file.type, Body: file};
    bucket.upload(params).on('httpUploadProgress', function(evt) {
        console.log("Uploaded :: " + parseInt((evt.loaded * 100) / evt.total)+'%');
}).send(function(err, data) {
filenameinput.value=tempfilename;
filenameform.submit();
// window.location.href = "index.php?filename="+tempfilename;
});
}

}
</script>

@endsection
