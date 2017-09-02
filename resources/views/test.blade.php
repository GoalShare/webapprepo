@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <!-- <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=gapiLoad"></script>
    <script src="https://apis.google.com/js/client.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
 -->




    <head>
    <script src="https://apis.google.com/js/client.js"></script>
    <script type="text/javascript">
        function authClick() {
            // Your Client ID is retrieved from your project in the Developer Console => https://console.developers.google.com
            var CLIENT_ID = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
            var SCOPES = "https://www.googleapis.com/auth/contacts.readonly";
            gapi.auth.authorize(
                { client_id: CLIENT_ID, scope: SCOPES, immediate: false }, authResult);
            return false;
        }
        /**
        * Handle response from authorization server.
        * @param {Object} authResult Authorization result.
        */
        function authResult(Result)
        {
            var Div = document.getElementById('divauthresult');
            if (Result && !Result.error)
            {
                // Auth OK! => load API.
                Div.style.display = 'none';
                loadPeopleApi();
            }
            else{
                // Auth Error, allowing the user to initiate authorization by
                Div.innerText = ':( Authtentication Error : ' + Result.error;
            }
        }
        /**
        * Load Google People client library. List Contact requested info
        */
        function loadPeopleApi()
        {
            gapi.client.load('https://people.googleapis.com/$discovery/rest', 'v1', showContacts);
        }
        /**
        * Show Contacts Details display on a table pagesize = 100 connections.
        */
        function showContacts()
        {
            var request = gapi.client.people.people.connections.list({
			    'resourceName': 'people/me',
			    'pageSize': 100,
			    'requestMask.includeField': 'person.phone_numbers,person.organizations,person.email_addresses,person.names'
            });
            request.execute(function(resp) {
                var connections = resp.connections;
                if (connections)
                {
                    var Html = "<table><tr><th>Name</th><th>Email</th><th>Company</th><th>Phone</th></tr>";
                    var EmptyCell = "<td> - </td>";
                    for (i = 0; i < connections.length; i++)
                    {
                        var person = connections[i];
                        Html += "<tr>";
                        if (person.names && person.names.length > 0)
                        Html += "<td>" + person.names[0].displayName + "</td>";
                        else
                       Html += EmptyCell;
                        if (person.emailAddresses && person.emailAddresses.length > 0)
					        Html += "<td>" + person.emailAddresses[0].value + "</td>";
                        else
                            Html += EmptyCell;
				        if (person.organizations && person.organizations.length > 0)
					        Html += "<td>" + person.organizations[0].name + "</td>";
				        else
				            Html += EmptyCell;
				        if (person.phoneNumbers && person.phoneNumbers.length > 0)
					        _Html += "<td>" + person.phoneNumbers[0].value + "</td>";
				        else
				            Html += EmptyCell;
				        Html += "</tr>";
                    }
                    divtableresult.innerHTML = "Contacts found : <br>" + Html;
                } else {
                    divtableresult.innerHTML = "";
                    divauthresult.innerText = "No Contacts found!";
                }
            });
        }
    </script>
</head>
  </head>
  <body>

    <h3>Get your contacts using People API</h3>
    <p>
        Press button to Authorize and Download your Contacts in JSON
        <br />
        <br />
        <button onclick="authClick(event)">Load Contacts</button>
    </p>
    <div id="divauthresult"></div>
    <div id="divtableresult"></div>




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






  </body>
</html>
@endsection
