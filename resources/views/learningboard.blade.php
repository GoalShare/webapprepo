@extends('layouts.navbar')

@section('content')
  <script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>
<div class="container">
  <div class="card">
      <div style="height:20px;"></div>
      @foreach ($learningboardtable as $learningboardtabledata)
        @if ($lbid==$learningboardtabledata->ID)
          @foreach ($users as $user)
            @if($user->id==$learningboardtabledata->User_ID)
              <span><h6><a>{{$learningboardtabledata->LB_Name}}</a>&nbsp by &nbsp<a>{{$user->fname}}</a>&nbsp<a>{{$user->lname}}</a></h6></span>
            @endif
          @endforeach

        @endif
      @endforeach



<div style="height:20px;"></div>
<div class="row">

<script>
var count=0;
</script>

             @foreach ($learningboardfilestable as $learningboardfilesdata)
               @if(($learningboardfilesdata->L_ID==$lbid)&&($learningboardfilesdata->CC_ID==$ccid)&&($learningboardfilesdata->SC_ID==$scid))

                 <script>
                 var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}';
                 var extension = fileName.split('.').pop();
                 if(extension=="mp4"){
                   count=count+1;
                   document.write('<div class="col l6">');
                     document.write('<div class="card" style="height:550px;">');
                        document.write('<div class="card-title">');
                         document.write('<center><b>Video</b></center>');
                         document.write('</div>');
                         document.write('<div class="row');
                         console.log(count);
                               document.write('<span class="">'+count+'.'+'{{$learningboardfilesdata->title}}'+'</span>'+'<div style="width:5px;"></div>');
                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">thumb_up</i></a>');
                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">thumb_down</i></a>');
                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">share</i></a>');
                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">rss_feed</i></a>');
                               document.write('</div>');
                               document.write('<div class="row">');
                               document.write('<div class="col s12">');
                               document.write('<video class="responsive-video" width="550" height="500" controls><source src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}" type="video/mp4"></video>');
                               document.write('</div>');
                               document.write('</div>');
                               document.write('<div class="row">');
                               document.write('<div class="col s12">');
                               @foreach ($users as $user)
                                 @if($user->id==$learningboardfilesdata->user_ID)
                                      document.write('<p>Posted-on:'+" "+"{{$learningboardfilesdata->date}}"+'&nbsp by &nbsp'+"{{$user->fname}}"+" "+"{{$user->lname}}"+'</p>');
                                  @endif
                               @endforeach
                               document.write('<p>'+"{{$learningboardfilesdata->discription}}"+'</p>');
                               document.write('</div>');
                               document.write('</div>');
                               document.write('</div>');
                               document.write('</div>');

                   }

                   </script>
                   <script>
                   var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}';
                   var extension = fileName.split('.').pop();
                   if(extension=="pdf"){
                     count=count+1;
                     document.write('<div class="col l6">');
                       document.write('<div class="card" style="height:550px;">');
                          document.write('<div class="card-title">');
                           document.write('<center><b>Document</b></center>');
                           document.write('</div>');
                           document.write('<div class="row');
                           console.log(count);
                          //
                              document.write('<span class="">'+count+'.'+'{{$learningboardfilesdata->title}}'+'</span>'+'<div style="width:5px;"></div>');

                                 document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">thumb_up</i></a>');
                                 document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">thumb_down</i></a>');
                                 document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">share</i></a>');
                                 document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">rss_feed</i></a>');

                               document.write('</div>');

                               document.write('<div class="row">');
                                 document.write('<div class="col s12">');
                           document.write('<iframe width="525" height="320" src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}"></iframe>');
                           document.write('</div>');
                             document.write('</div>');
                             document.write('<div class="row">');
                               document.write('<div class="col s12">');
                               @foreach ($users as $user)
                                 @if($user->id==$learningboardfilesdata->user_ID)
                                      document.write('<p>Posted-on:'+" "+"{{$learningboardfilesdata->date}}"+'&nbsp by &nbsp'+"{{$user->fname}}"+" "+"{{$user->lname}}"+'</p>');
                                  @endif
                               @endforeach
                                 document.write('<p>'+"{{$learningboardfilesdata->discription}}"+'</p>');
                               document.write('</div>');
                             document.write('</div>');

                       document.write('</div>');
                    document.write('</div>');

                     }



                 </script>
                 <script>
                 var fileName = 'https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}';
                 var extension = fileName.split('.').pop();
                 if(extension=="jpg" || extension=="png" || extension=="jpeg"){
                   count=count+1;
                   document.write('<div class="col l6">');
                     document.write('<div class="card" style="height:550px;">');
                        document.write('<div class="card-title">');
                         document.write('<center><b>Document</b></center>');
                         document.write('</div>');
                         document.write('<div class="row');
                         console.log(count);
                        //
                            document.write('<span class="">'+count+'.'+'{{$learningboardfilesdata->title}}'+'</span>'+'<div style="width:5px;"></div>');

                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">thumb_up</i></a>');
                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">thumb_down</i></a>');
                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">share</i></a>');
                               document.write('<a class="center col s3" style="font-size: 30px"><i class="material-icons">rss_feed</i></a>');

                             document.write('</div>');

                             document.write('<div class="row">');
                               document.write('<div class="col s12">');
                         document.write('<img width="585" height="320" src="https://s3-ap-southeast-1.amazonaws.com/lifewithgoals/{{$learningboardfilesdata->filename}}"/>');
                         document.write('</div>');
                           document.write('</div>');
                           document.write('<div class="row">');
                             document.write('<div class="col s12">');
                             @foreach ($users as $user)
                               @if($user->id==$learningboardfilesdata->user_ID)
                                    document.write('<p>Posted-on:'+" "+"{{$learningboardfilesdata->date}}"+'&nbsp by &nbsp'+"{{$user->fname}}"+" "+"{{$user->lname}}"+'</p>');
                                @endif
                             @endforeach
                               document.write('<p>'+"{{$learningboardfilesdata->discription}}"+'</p>');
                             document.write('</div>');
                           document.write('</div>');

                     document.write('</div>');
                  document.write('</div>');

                   }



               </script>
               @endif
             @endforeach


        </div>
  </div>
</div>
@endsection
