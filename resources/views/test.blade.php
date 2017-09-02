@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>

    <!-- <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=gapiLoad"></script>
    <script src="https://apis.google.com/js/client.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
 -->




    <body>



    <script type="text/javascript">
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

  //   function auth() {
	//     var config = {
	//       'client_id': '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com',
	//       'scope': 'https://www.google.com/m8/feeds'
	//     };
	//     gapi.auth.authorize(config, function() {
	//       fetch(gapi.auth.getToken());
  //
	//     });
	//   }
  //
	//   function fetch(token) {
	//     $.ajax({
	// 	    url: "https://www.google.com/m8/feeds/contacts/default/full?access_token=" + token.access_token + "&alt=json",
	// 	    dataType: "jsonp",
	// 	    success:function(data) {
  //                             // display all your data in console
	// 	            console.log(JSON.stringify(data));
  //               console.log(data);
  //
  //               for(var i=0;i<data.feed.entry.length;i++){
  //                 var z=data.feed.entry[i].link[0].href;
  //               document.write(data.feed.entry[i].gd$email[0].address+'<br>');
  //
  //
  //             }
  //
  //
	// 	    }
	// 	});
	// }
</script>



<script src="https://apis.google.com/js/client.js?onload=gapiLoad"></script>

<script>
function gapiLoad() {
	gapi.client.setApiKey('R9ijmkXitCwlC-Zh7oY26ICw');	// app api-wide client api key
	getGoogleContactEmails(function(result){
		console.log(result);
	});
}

function getGoogleContactEmails(callback) {
  var oauth_clientKey = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com'; // replace with your oauth client api key
	var firstTry = true;
	function connect(immediate, callback){
	    var config = {
	        'client_id': oauth_clientKey,
	        'scope': 'https://www.google.com/m8/feeds',
	        'immediate': immediate,
	    };

	    gapi.auth.authorize(config, function () {
			var authParams = gapi.auth.getToken();
	        $.ajax({
	            url: 'https://www.google.com/m8/feeds/contacts/default/full?max-results=10000',
	            dataType: 'jsonp',
	            type: "GET",
	            data: authParams,
	            success: function (data) {
	                var parser = new DOMParser();
	 				xmlDoc = parser.parseFromString(data,"text/xml");
	 				var entries = xmlDoc.getElementsByTagName('feed')[0].getElementsByTagName('entry');
	 				var contacts = [];
	 				for (var i = 0; i < entries.length; i++){
	 					var name = entries[i].getElementsByTagName('title')[0].innerHTML;
	 					var emails = entries[i].getElementsByTagName('email');
	 					for (var j = 0; j < emails.length; j++){
	 					  var email = emails[j].attributes.getNamedItem('address').value;
	 					  contacts.push({name: name, email: email});
              console.log(email);
	 					}
	 				}
	 				callback(contacts);
	            },
	            error: function (data) {
	            	if (firstTry)
						connect(false, callback);
					firstTry = false;
	            }
	        })
	    });
	}
	connect(true, callback);
}
</script>

<button onclick="gapiLoad();" value="get"></button>
  </body>
</html>
@endsection
