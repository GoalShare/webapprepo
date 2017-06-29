                          var intentbtn=document.getElementById('intentbtn');
                          var editintent=document.getElementById('editintent');
                          var intent=document.getElementById('intent');
                          var intentfield=document.getElementById('intentfield');

                          var categorybtn=document.getElementById('categorybtn');
                          var editcategory=document.getElementById('editcategory');
                          var category=document.getElementById('category');
                          var categoryfield=document.getElementById('categoryfield');

                          intentbtn.addEventListener("click", function(event) {
                          event.preventDefault();
                          document.getElementById('resultintent').innerHTML='';
                          intent.disabled=false;
                          intent.focus();
                          editintent.style.display='inline';
                          intentbtn.style.display='none';
                        });
                          categorybtn.addEventListener("click", function(event) {
                          event.preventDefault();
                          document.getElementById('resultcategory').innerHTML='';
                          category.disabled=false;
                          category.focus();
                          editcategory.style.display='inline';
                          categorybtn.style.display='none';
                        });

                          editintent.addEventListener("click",function(event){
                            event.preventDefault();
                            editintentpost();
                          });

                          editcategory.addEventListener("click",function(event){
                            event.preventDefault();
                            editcategorypost();
                          });
                        function editcategorypost(){
                         var form = document.getElementById("categoryfrm");
                         var action = form.getAttribute("action");
                         var result_category = document.getElementById("resultcategory");
                         var form_data = new FormData(form);

                         var xhr = new XMLHttpRequest();
                         xhr.open('POST', action, true);
                         xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                         xhr.send(form_data);
                         xhr.onreadystatechange = function () {
                           if(xhr.readyState == 4 && xhr.status == 200) {
                              var result = xhr.responseText;
                              console.log('Result: ' + result);
                              if(result!=''){
                              result_category.innerHTML = result;
                             category.disabled=true;
                             editcategory.style.display='none';
                             categorybtn.style.display='inline';
                             category.style.textAlign='right';

                           }
                             else {
                               result_category.innerHTML='this field cannot be empty';
                               result_category.style.color='red';
                             }
                           }
                         };
                       }

                          function editintentpost(){
                           var form = document.getElementById("intentfrm");
                           var action = form.getAttribute("action");
                           var result_div = document.getElementById("resultintent");
                           var form_data = new FormData(form);

                           var xhr = new XMLHttpRequest();
                           xhr.open('POST', action, true);
                           xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                           xhr.send(form_data);
                           xhr.onreadystatechange = function () {
                             if(xhr.readyState == 4 && xhr.status == 200) {
                                var result = xhr.responseText;
                                console.log('Result: ' + result);
                                // var json = JSON.parse(result);
                                // if(json.hasOwnProperty('errors') && json.errors.length > 0) {
                                //   displayErrors(json.errors);
                                // } else {
                                  // postResult(json.intent);
                                // }
                                if(result!=''){
                                result_div.innerHTML = result;
                               intent.disabled=true;
                               editintent.style.display='none';
                               intentbtn.style.display='inline';
                               intent.style.textAlign='right';

                             }
                               else {
                                 result_div.innerHTML='this field cannot be empty';
                                 result_div.style.color='red';
                               }
                             }
                           };
                         }
