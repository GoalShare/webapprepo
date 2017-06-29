 
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="card blue darken-4 white-text center">
     <div class="card-content blue darken-4">
       <h2> Account Settings</h2>
     </div>
     <div class="card-tabs  ">
       <ul class="tabs tabs-fixed-width bl">
         <li class="tab"><a href="#test4">Test 1</a></li>
         <li class="tab"><a class="active" href="#test5">Test 2</a></li>
         <li class="tab"><a href="#test6">Test 3</a></li>
       </ul>
     </div>
     <div class="card-content grey lighten-4 black-text ">
       <div id="test4" class="left">Test 1</div>
       <div id="test5">Test 2</div>
       <div id="test6">Test 3</div>
     </div>
   </div>

  </div>

@endsection