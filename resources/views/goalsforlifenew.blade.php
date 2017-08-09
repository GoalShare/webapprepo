<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Compiled and minified CSS -->
    <!-- Latest compiled and minified CSS -->



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/C133C2CF-E0EB-3E49-B84F-D4514D6D7273/main.js" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/3727D6D4154D-F48B-94E3-BE0E-FC2C331C/abn/main.css"/><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style media="screen">

#view-source {
  position: fixed;
  display: block;
  right: 0;
  bottom: 0;
  margin-right: 40px;
  margin-bottom: 40px;
  z-index: 900;
}
/*body {
    background-image: url("2.jpg");
}*/

.navbar{
  background:#0d47a1;
  border: none;
}
.footer{
    background:#0d47a1;
    color: white;
    position: fixed;
    margin-top: 200px;
  bottom: 0;
   height: 100px;
   width: 100%;

}
.forgotPassword{
padding-left: 10px;
}
.nav{
z-index: 2;
}
/*body {
    background-image: url("2.jpg");
     background-repeat: no-repeat;
     height: 100%;
     width: 100%;
}*/
</style>





  </head>
  <body>




    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <img src="{{asset('favicon/LOGO.png')}}" alt="" height= "35px" width = "184px" style="margin-top:20px">
        <!-- <img src="mainIcon.png" alt="" height= "35px" width = "184px"> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" role="form" method="POST" action="{{ route('login') }}">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Password"  >
                </div>
              </div>
              <button type="submit" class="btn btn-primary">login</button>
              <div class="col s6  ">
                            <input type="checkbox" id="remeber" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span style="color:white">Remember me  </span>
                            <a href="{{ route('password.request') }}"style="color:white " class="forgotPassword">   Forgot Password</a>
              </div>
            </form>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


        <div class="container">
            <div class="row">
                <div class="col-md-7">

                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="jumbotron">
                    <div class="container">
                        <div class="row">
                          <form class="" action="index.html" method="post">
                            <div class="col-md-6 col-sm-12 ">
                              <input type="text" class="form-control" placeholder="First Name"  >
                                <label for=""></label>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <input type="text" class="form-control" placeholder="Last Name"  >
                                <label for=""></label>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="email" class="form-control" placeholder="Email"  >
                                <label for=""></label>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                              <input type="password" class="form-control" placeholder="password"  >
                                <label for=""></label>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <input type="password" class="form-control" placeholder="confirm Password"  >
                                <label for=""></label>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                              <div class="radio">
                                  <label><input type="radio" name="optradio">Male</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="optradio">Female</label>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-12 ">
                              <div class="form-group">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <label for="">DOB</label>
                            </div>

                            <script type="text/javascript">
                               $(function () {
                                   $('#datetimepicker2').datetimepicker({
                                       locale: 'ru'
                                   });
                               });
                           </script>
                            </div>



                            <div class="col-md-12 col-sm-12 ">
                                <input type="number" class="form-control" placeholder="phoneNumber"  >
                                .<label for="">Phone Number</label>
                              </label>
                            </div>

                            <div class="col-md-12 col-sm-12 ">
                              <div class="checkbox checkbox-primary">
                                  <input id="checkbox2" type="checkbox" checked="">
                                  <label for="checkbox2">
                                    <h4>  By signing up, you agree to our <a href="{!! url('/nonLoginPolicies'); !!}">Terms</a> & <a href="{!! url('/nonLoginPolicies'); !!}">Privacy Policy.</a></h4>
                                  </label>
                              </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-block">Sign up</button>




                          </form>
                        </div>
                      </div>
                </div>
                </div>
            </div>
          </div><br><br><br>


  </body>
  <!--Footer-->
<footer class="page-footer footer center-on-small-only">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-6">
                <h3 class="title whiteText"><b>Life with goals</b></h3>
                <p>Here you can use rows and columns here to organize your footer content.</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-6">
                <h5 class="title">Links</h5>
                <ul>
                    <li><a href="#!">About Us</a></li>
                    <li><a href="#!">Support</a></li>
                    <li><a href="#!">Work With us</a></li>

                </ul>
            </div>
            <div class="footer-copyright">
                <div class="container-fluid">
                    © 2015 Copyright:

                </div>
            </div>
            <!--/.Second column-->
        </div>

    </div>
    <!--/.Footer Links-->

    <!--Copyright-->

    <!--/.Copyright-->

</footer>
<!--/.Footer-->


</html>
