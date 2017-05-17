
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<!--jQuery [ REQUIRED ]-->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script>

    <!--SCRIPT-->
    <!--=================================================-->


</head>

<body>


 <script>
/*headers sending

*/
//To registr and get token use this string
//base64_encode('111222333:aaabbbccc');
// Result: MTExMjIyMzMzOmFhYWJiYmNjYw==  
//Than yu will get such token 
//Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhcGkiLCJzdWIiOiIxMTEyMjIzMzMiLCJpYXQiOjE0OTUwMjU2MjksImV4cCI6MTU2MTA4NTYyOX0.h1mJ7Uk8zQn2WFky_supYjYkknH4hBSNB-EanMPO50Q
//This Bearer is aceteble now
/*

headers sending*/              


			  $.ajaxSetup({
                  
                       headers: { 
                            'Authorization': 'Basic MTExMjIyMzMzOmFhYWJiYmNjYw==' 
                       }
                   
              

               });

              

            
			   
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////			   
			   
 var contentType ="application/x-www-form-urlencoded; charset=utf-8";
 
if(window.XDomainRequest) //for IE8,IE9
    contentType = "text/plain";
 
$.ajax({
	//to register
	/*http://nechemya.imedia.in.ua/api/v1/auth/app*/
	//to set up data in database POST
	/*http://nechemya.imedia.in.ua/api/v1/application-data*/
	//to get user Data GET
	/*http://nechemya.imedia.in.ua/api/v1/user-data*/
     url:"http://nechemya.imedia.in.ua/api/v1/auth/app", 
    data: {
    },
     type:"POST",
     dataType:"json",   
     contentType:contentType,    
     success:function(data) 
     {
        alert("Data from Server"+JSON.stringify(data));
     },
     error:function(jqXHR,textStatus,errorThrown)
     {
        alert("You can not send Cross Domain AJAX requests: "+errorThrown);
     }
    });




        </script>
		
		</body></html>