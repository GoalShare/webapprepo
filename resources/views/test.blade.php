@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=gapiLoad"></script>
  </head>
  <body>
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
                function(response){
                  //process the response here
                  console.log(response);
                 
                  document.write(json_encode(response));
                });
            }
          }
        </script>
        <script src="https://apis.google.com/js/client.js"></script>
        <button class="googleContactsButton">Get my contacts</button>
        <div id="wines">
          <!-- Javascript will print data in here when we have finished the page -->
          </div>
  </body>
</html>
@endsection
