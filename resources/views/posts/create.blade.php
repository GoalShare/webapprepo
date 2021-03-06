@extends('blog.app')

@section('title')
    Add New Post
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload {
            max-width: 100%;
            height: auto;
        }
    </style>
    <script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist     | link image jbimages",

        });
    </script>

    <form action="/new-post" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text"
                   name="title" class="form-control"/>
        </div>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


        <div class="form-group">
            <label>Upload Cover Image</label>
            <div class="input-group">
            <span class="input-group-btn">
                <span  class="btn btn-default btn-file">

                    Browse… <input value="{{ old('coverimg') }}" name="coverimg" type="file" id="imgInp">
                </span>
            </span>
                <input type="text" class="form-control" readonly>
            </div>
            <img id='img-upload'/>
        </div>

        <div class="form-group">
            <label>Tags</label>
            <div class="input-group">
                <input style="width: 40%; font-size: larger" type="text" id="skills" name="skills" data-role="tagsinput" />
            </div>
        </div>

            <textarea name='body' class="form-control">{{ old('body') }}</textarea>
        </div>
        <input type="submit" name='publish' class="btn btn-success" value="Publish"/>
        <input type="submit" name='save' class="btn btn-default" value="Save Draft"/>
    </form>
    <script>
        $(document).ready(function () {
            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function () {
                readURL(this);
            });
        });

    </script>



@endsection
