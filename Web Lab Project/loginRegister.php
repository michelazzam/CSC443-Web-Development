

<!DOCTYPE html>
<html >
      <head>
        <meta charset="utf-8">
        <title>Login</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- daoud ico -->
      <link rel="shortcut icon" href="charbeldaoud.ico">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
      <link rel="stylesheet" href="css/login.css">
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
   
   <script src="js/modernizr-2.6.2.min.js"></script>


      </head>
      <body>

          <div class="container-fluid bg">
              <div class="row">
                  <div class="col-md-4 col-sm-3 col-xs-12">  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12 ">

                      <form  autocomplete="off" class="form-container" method="POST" name="loginForm" action="php/login.php" onsubmit="return validateForm()" >
                      <h1>WELCOME!</h1>

                      <div class="login">
                        <div class="form-group">
                          <label for="inputEmail">Email</label><br/>
                          <input type="email" name="email" id="inputEmail" placeholder="Email" required >
                        </div>
                        <div class="form-group">
                          <label for="inputPassword">Password</label><br/>
                          <input minlength="5" type="password" name="pass" id="inputPassword" placeholder="Password" required>
                        </div>
                      </div>
                        <div class="form-group hiddenP" >
                        </div>

                        <input type="submit" id="log1" class="btn btn-block" value="Get Rested" >                      

                        <span class="btn btn-primary btn-block btn-reg" id="reg1" >Register for Some Rest</span>

                      </form>

                  </div>
                  <div class="col-md-4 col-sm-3 col-xs-12">  </div>

              </div>
          </div>

        <script src="js/login.js"></script>
      </body>

</html>
