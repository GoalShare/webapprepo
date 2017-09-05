@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />

    <script src="https://apis.google.com/js/client.js?onload=gapiLoad"></script>
    <script src="https://apis.google.com/js/client.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  </head>
  <body>
       <button class="googleContactsButton" id="myBtn">Get my contacts</button>


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
                  var text = "";
              for(var i=0;i<result.feed.entry.length;i++){
                  var x=result.feed.entry[i].gd$email;

                  if(x==undefined){
                    console.log("hjhjdbcsjhdbchs");
                  }

                  else{

                    text +=x[0].address+'<br/>';

                  }
                }

                document.getElementById("demo").innerHTML =text;
                });
            }
          }


        </script>




  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close right" style="cursor:pointer;">&times;</span>
      <p id="demo"></p>
    </div>

  </div>

  <script>
  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  btn.onclick = function() {
      modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>

  </body>
</html>
@endsection
