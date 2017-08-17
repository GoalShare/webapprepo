@extends('layouts.navbarWithoutMain')

@section('content')
<br><br><br>

<div class="ui vertical stripe segment">
<div class="ui text container">
  <h1 class="ui header">Password Reset</h1>
  <p>Please enter your Email in order to for us to help you reset your email</p>
        <form class="ui form" action="{{route('reset')}}" method = "POST">
        {{ csrf_field() }}
        <div class="field">
            <label>email</label>
            <input type="email" name="email" placeholder="Password">
        </div>
       
        <button class="ui button" type="submit">Submit</button>
        </form>
  <h4 class="ui horizontal header divider">
    <a href="/">Return to Home page</a>
  </h4>

</div>
</div>
@endsection
