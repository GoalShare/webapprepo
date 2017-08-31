@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=gapiLoad"></script>
    <script src="https://apis.google.com/js/client.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
   iframe {
     width: 100%;
     border: 0;
     min-height: 80%;
     height: 600px;
     display: flex;
   }
 </style>
  </head>
  <body>

    <!-- <script type="text/javascript">
    // var myObj, i, j, x = "";
    //       var clientId = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
    //       var apiKey = 'R9ijmkXitCwlC-Zh7oY26ICw';
    //       var scopes = 'https://www.googleapis.com/auth/contacts.readonly';

    //       $(document).on("click",".googleContactsButton", function(){
    //         gapi.client.setApiKey(apiKey);
    //         window.setTimeout(authorize);
    //       });

    //       function authorize() {
    //         gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthorization);
    //       }

    //       function handleAuthorization(authorizationResult) {
    //         if (authorizationResult && !authorizationResult.error) {
    //           $.getJSON("https://www.google.com/m8/feeds/contacts/default/thin?alt=json&access_token=" + authorizationResult.access_token + "&max-results=500&v=3.0",
    //             function(result){

    //               //process the response here
    //               console.log(JSON.stringify(result));

    //             });
    //         }
    //       }

    function auth() {
	    var config = {
	      'client_id': '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com',
	      'scope': 'https://www.googleapis.com/auth/gmail.readonly'
	    };
	    gapi.auth.authorize(config, function() {
	      fetch(gapi.auth.getToken());

	    });
	  }

	  function fetch(token) {
	    $.ajax({
		    url: "https://www.google.com/m8/feeds/contacts/default/full?access_token=" + token.access_token + "&alt=json",
		    dataType: "jsonp",
		    success:function(data) {
                              // display all your data in console
		            console.log(JSON.stringify(data));
                console.log(data);

                for(var i=0;i<data.feed.entry.length;i++){
                  var z=data.feed.entry[i].link[0].href;
                document.write(data.feed.entry[i].gd$email[0].address+'<br>');


              }


		    }
		});
	}



        </script>
         <button onclick="auth();">GET CONTACTS FEED</button>
         <span id="test1"></span>
         <span id="test2"></span>
        <!-- <button class="googleContactsButton">Get my contacts</button> -->



       </head>

         <div class="container">
           <h1>Gmail API demo</h1>

           <button id="authorize-button" class="btn btn-primary hidden">Authorize</button>

           <table class="table table-striped table-inbox hidden">
             <thead>
               <tr>
                 <th>From</th>
                 <th>Subject</th>
                 <th>Date/Time</th>
               </tr>
             </thead>
             <tbody></tbody>
           </table>
         </div>

         <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
         <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

         <script type="text/javascript">
           var clientId = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
           var apiKey = 'AIzaSyCvWE2bE4Kq6xfN166Eaj0GceDBv6P-Qsw';
           var scopes = 'https://www.googleapis.com/auth/gmail.readonly';
           function handleClientLoad() {
             gapi.client.setApiKey(apiKey);
             window.setTimeout(checkAuth, 1);
           }
           function checkAuth() {
             gapi.auth.authorize({
               client_id: clientId,
               scope: scopes,
               immediate: true
             }, handleAuthResult);
           }
           function handleAuthClick() {
             gapi.auth.authorize({
               client_id: clientId,
               scope: scopes,
               immediate: false
             }, handleAuthResult);
             return false;
           }
           function handleAuthResult(authResult) {
             if(authResult && !authResult.error) {
               loadGmailApi();
               $('#authorize-button').remove();
               $('.table-inbox').removeClass("hidden");
             } else {
               $('#authorize-button').removeClass("hidden");
               $('#authorize-button').on('click', function(){
                 handleAuthClick();
               });
             }
           }
           function loadGmailApi() {
             gapi.client.load('gmail', 'v1', displayInbox);
           }
           function displayInbox() {
             var request = gapi.client.gmail.users.messages.list({
               'userId': 'me',
               'labelIds': 'INBOX',
               'maxResults': 10
             });
             request.execute(function(response) {
               $.each(response.messages, function() {
                 var messageRequest = gapi.client.gmail.users.messages.get({
                   'userId': 'me',
                   'id': this.id
                 });
                 messageRequest.execute(appendMessageRow);
               });
             });
           }
           function appendMessageRow(message) {
             $('.table-inbox tbody').append(
               '<tr>\
                 <td>'+getHeader(message.payload.headers, 'From')+'</td>\
                 <td>\
                   <a href="#message-modal-' + message.id +
                     '" data-toggle="modal" id="message-link-' + message.id+'">' +
                     getHeader(message.payload.headers, 'Subject') +
                   '</a>\
                 </td>\
                 <td>'+getHeader(message.payload.headers, 'Date')+'</td>\
               </tr>'
             );
             $('body').append(
               '<div class="modal fade" id="message-modal-' + message.id +
                   '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
                 <div class="modal-dialog modal-lg">\
                   <div class="modal-content">\
                     <div class="modal-header">\
                       <button type="button"\
                               class="close"\
                               data-dismiss="modal"\
                               aria-label="Close">\
                         <span aria-hidden="true">&times;</span></button>\
                       <h4 class="modal-title" id="myModalLabel">' +
                         getHeader(message.payload.headers, 'Subject') +
                       '</h4>\
                     </div>\
                     <div class="modal-body">\
                       <iframe id="message-iframe-'+message.id+'" srcdoc="<p>Loading...</p>">\
                       </iframe>\
                     </div>\
                   </div>\
                 </div>\
               </div>'
             );
             $('#message-link-'+message.id).on('click', function(){
               var ifrm = $('#message-iframe-'+message.id)[0].contentWindow.document;
               $('body', ifrm).html(getBody(message.payload));
             });
           }
           function getHeader(headers, index) {
             var header = '';
             $.each(headers, function(){
               if(this.name === index){
                 header = this.value;
               }
             });
             return header;
           }
           function getBody(message) {
             var encodedBody = '';
             if(typeof message.parts === 'undefined')
             {
               encodedBody = message.body.data;
             }
             else
             {
               encodedBody = getHTMLPart(message.parts);
             }
             encodedBody = encodedBody.replace(/-/g, '+').replace(/_/g, '/').replace(/\s/g, '');
             return decodeURIComponent(escape(window.atob(encodedBody)));
           }
           function getHTMLPart(arr) {
             for(var x = 0; x <= arr.length; x++)
             {
               if(typeof arr[x].parts === 'undefined')
               {
                 if(arr[x].mimeType === 'text/html')
                 {
                   return arr[x].body.data;
                 }
               }
               else
               {
                 return getHTMLPart(arr[x].parts);
               }
             }
             return '';
           }
         </script>
         <script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
       </body>
</html>
@endsection
