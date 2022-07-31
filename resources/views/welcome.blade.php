<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/theme.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<section style="padding-top: 7rem;">
    <div class="bg-holder">
    </div>

    <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
                  <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" >
                    <label for="email">Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" >
                    <label for="password">Password</label>
                  </div>
                  <div class="d-grid">
                    <button id="LoginBtn" class="btn btn-info btn-login text-uppercase fw-bold" type="submit" >Sign
                      in</button>
                    
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> 
        </script>
        <script>
            $("#LoginBtn").click(function (e){
            e.preventDefault();
            var settings = {
                "url": "http://127.0.0.1:8000/api/login",
                "method": "POST",
                "headers": {
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify({"email":document.getElementById("email").value,"password":document.getElementById("password").value}),
            };
            $.ajax({
                ...settings,
                success: function (result) {
                    location.href = "http://127.0.0.1:8000/articles";
                },
                error : function (){
                    alert("error")
                }
            })
        })
</script>

    </body>
</html>