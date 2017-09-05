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
       <button class="googleContactsButton">Get my contacts</button>


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
              for(var i=0;i<result.feed.entry.length;i++){
                  var x=result.feed.entry[i].gd$email;

                  if(x==undefined){
                    console.log("hjhjdbcsjhdbchs");
                  }

                  else{

                    document.write(x[0].address+'<br>');

                  }
                }


                });
            }
          }


        </script>
        <script>
        $.ajax({
          type: 'post',
          url: 'test2.php',
          dataType: 'json',
          data: {
            txt: txtbox,
            hidden: hiddenTxt
          },
          cache: false,
          success: function(returndata) {
            if (returndata[4] === 1) {

              $("#bsModal3").modal('show');

            } else {
              // other code
            }
          },
          error: function() {
            console.error('Failed to process ajax !');
          }
        });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="mySmallModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                Your content goes here...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

  </body>
</html>
@endsection
