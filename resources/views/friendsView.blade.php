@extends('layouts.navbar')

@section('content')


    <div class="container">



        <div class="col s12 m12 l12">
          <div class="card ">

               <div class="card-action">
                  <h5><b>People</b></h5>
               </div>
               <form action="{{route('search')}}" method="post">
                   {{ csrf_field()}}

               <div class="input-field">
                  <input type="search" name="searchkey" placeholder="{{$searchkey}}" >
                 <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                 <i class="material-icons">close</i>
               </div>
             </form>
               <li class="divider"></li>
               @foreach ($user as $users)
                 @if ($users->id!=Auth::id())
                   <a href="{{url('/search/'.$users->id)}}" class="blue-text darken-4">
               <div class="card-content">
                 <ul class="collection">
                   <li class="collection-item avatar ">
                     <img src="{{asset('uploads/avatars/'.$users->avatar)}}" alt="" class="circle">
                     <span class="title"><strong>{{$users->fname.' '.$users->lname}}</strong></span>
                    <p>{{$users->email}}<br>
                       DOB:{{$users->dob}}<br>
                       No:{{$users->phone}}
                     </p>
                     <div class="right-align">
                     </div>
                   </li>
                 </ul>
               </div></a>
             @endif
             @endforeach
             <li class="divider"></li>
             @foreach ($userfname as $userfnames)
               @if ($userfnames->id!=Auth::id())
                 <a href="{{url('/search/'.$userfnames->id)}}" class="blue-text darken-4">
             <div class="card-content">
               <ul class="collection">
                 <li class="collection-item avatar ">
                   <img src="{{asset('uploads/avatars/'.$userfnames->avatar)}}" alt="" class="circle">
                   <span class="title"><strong>{{$userfnames->fname.' '.$userfnames->lname}}</strong></span>
                  <p>{{$userfnames->email}}<br>
                     DOB:{{$userfnames->dob}}<br>
                     No:{{$userfnames->phone}}
                   </p>
                   <div class="right-align">
                   </div>
                 </li>
               </ul>
             </div></a>
           @endif
           @endforeach
            <li class="divider"></li>
                          @foreach ($userlname as $userlnames)
                            @if ($userlnames->id!=Auth::id())
                              <a href="{{url('/search/'.$userlnames->id)}}" class="blue-text darken-4">
                          <div class="card-content">
                            <ul class="collection">
                              <li class="collection-item avatar ">
                                <img src="{{asset('uploads/avatars/'.$userlnames->avatar)}}" alt="" class="circle">
                                <span class="title"><strong>{{$userlnames->fname.' '.$userlnames->lname}}</strong></span>
                               <p>{{$userlnames->email}}<br>
                                  DOB:{{$userlnames->dob}}<br>
                                  No:{{$userlnames->phone}}
                                </p>
                                <div class="right-align">
                                </div>
                              </li>
                            </ul>
                          </div></a>
                        @endif
                        @endforeach





             </div>
        </div>
    </div>


  @endsection
