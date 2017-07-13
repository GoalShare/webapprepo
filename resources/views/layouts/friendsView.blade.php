<style media="screen">
@media only screen and (max-width : 540px)
{
    .chat-sidebar
    {
        display: none !important;
    }

    .chat-popup
    {
        display: none !important;
    }
}



.chatsidebar
{
    background-color: #dbdbdb;
    width: 200px;
    position: fixed;
    height: 70%;
    right: 0px;
    margin-top: 100px;
    margin-right: 10px;
    padding-top: 10px;
    padding-bottom: 100px;
    border: 1px solid rgba(29, 49, 91, .3);
      overflow-y: scroll;
      z-index: 2;
      border-radius: 10px;

}

/* Scrollbar styles */
div::-webkit-scrollbar {
width: 6px;
height: 12px;
}

div::-webkit-scrollbar-track {
border: 1px   #0047b3;
border-radius: 10px;
}

div::-webkit-scrollbar-thumb {
background:  #0047b3;
border-radius: 10px;
}




</style>

<div class="chatsidebar center hide-on-med-and-down">
@foreach ($friends as $friend)
  @if ($friend->id!=Auth::id())
  <a href="{{url('/search/'.$friend->id)}}"><div class="chip">
    <img src="{{asset('uploads/avatars/'.$friend->avatar)}}" alt="Contact Person">
    {{$friend->fname}} {{$friend->lname}}
  </div></a><br>
@endif
@endforeach




</div>
<script type="text/javascript">
.chatsidebar {overflow:auto;}
.chatsidebar {overflow-y:auto;}
.chatsidebar {overflow-x:auto;}
</script>
