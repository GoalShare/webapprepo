<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
  </head>
  <body>
    <script>
    document.getElementById("demo").innerHTML = Date();
    </script>
    <div class="container">
        <h1><b>Dear {{$user->fname}} {{$user->lname}}</b></h1>
        <p class="flow-text">  Welcome and we are glad you joined us today   <p id="demo"></p> with lifewithgoals.com.
</p>
<blockquote>
  We hope you will be able to convert your day to day life to live with a meaningful purpose. As you
start with us, you will be able to define your skills, strengths and combine it with your goal.
We will continue to add more features and keep you updated on our journey.
</blockquote>
<blockquote>
  Life with goals, for an better life !!! <br>
  Login to lifewithgoals.com to start your journey..
</blockquote>
<blockquote>
Please confirm your account by
<a href="{{url('/dashboard/'.$user->email)}}" class="btn">Confirm account</a>
</blockquote>
      <blockquote>
<!-- Please confirm your account by  <a href="{{url('register/confirm/{$user->token}')}}" class="btn">Confirm account</a> -->
</blockquote>
  <p class="flow-text">Thank You.<br> Team Lifewithgoals.com</p>
       </div>
  </body>
</html>
