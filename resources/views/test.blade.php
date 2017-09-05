@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />

    <script src="https://apis.google.com/js/client.js?onload=gapiLoad"></script>
    <script src="https://apis.google.com/js/client.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
.black_overlay {
  display: none;
  position: absolute;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: black;
  z-index: 1001;
  -moz-opacity: 0.8;
  opacity: .80;
  filter: alpha(opacity=80);
}
.white_content {
  display: none;
  position: absolute;
  top: 25%;
  left: 25%;
  width: 50%;
  height: 50%;
  padding: 16px;
  border: 16px solid orange;
  background-color: white;
  z-index: 1002;
  overflow: auto;
}
</style>
  </head>
  <body>
       <button class="googleContactsButton" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Get my contacts</button>


    <script type="text/javascript">

          var clientId = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
          var apiKey = 'R9ijmkXitCwlC-Zh7oY26ICw';
          var scopes = 'https://www.googleapis.com/auth/contacts.readonly';

          $(document).on("click",".googleContactsButton", function(){
            gapi.client.setApiKey(apiKey);
            window.setTimeout(authorize);
          });

          function authorize() {
            gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthorization);
          }

          function handleAuthorization(authorizationResult) {
            if (authorizationResult && !authorizationResult.error) {
              $.get("https://www.google.com/m8/feeds/contacts/default/thin?alt=json&access_token=" + authorizationResult.access_token + "&max-results=500&v=3.0",
                function(result){
                  console.log(result);

                  document.write('<div id="light" class="white_content">');
                  for(var i=0;i<result.feed.entry.length;i++){
                  var x=result.feed.entry[i].gd$email;

                  if(x==undefined){
                    console.log("hjhjdbcsjhdbchs");
                  }

                  else{

                   document.write(x[0].address+'<br>');
                  }
                }
document.write('</div>');


                });
            }
          }


        </script>

        <p>This is the main content. To display a lightbox click <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">here</a>
      </p>
      <div id="light" class="white_content">This is the lightbox content.
      </div>
      <div id="fade" class="black_overlay"></div>
  </body>
</html>
@endsection
