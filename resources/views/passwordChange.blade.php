@extends('layouts.navbarWithoutMain')

@section('content')
<br><br><br>



<div class="ui vertical stripe segment">
<div class="ui text container">
  <h1 class="ui header">Password Reset</h1>
  <p>Enter your new password.</p>
        <form class="ui form"action="{{route('resetPass')}}" method="POST">
        {{csrf_field()}}
        <div class="field">
            <label>Password</label>
            <input type="password" name="passwordReset" placeholder="Password">
        </div>
        <div class="field">
            <label>Confirm Password</label>
            <input type="password" name="confirmPasswordReset" placeholder="Confirm Password">
        </div>
        <div class="field">
           
            <input type="hidden" name="idForPass" value="{{$id}}">
        </div>
     
        <button class="ui button" type="submit">Submit</button>
        </form>
  <h4 class="ui horizontal header divider">
    <a href="/">Return to Home page</a>
  </h4>

</div>
</div>




@endsection
