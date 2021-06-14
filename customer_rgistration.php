<DOCTYPE html>
    <html>
    <head>
     <meta charset="UTF-8">
     <title> Satish Store</title>
     <link rel="stylesheet" href="css/bootstrap.min.css"/>
       <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="js/jquery.js"> </script>
      <script src="js/bootstrap.min.js"> </script>
      <script src="main.js"></script>
    </head>

      <body>
       <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Satish Store</a>
           </div>

            <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Rental</a></li>
            </ul>
    </div>
  </div>
  <p><br/></p>
  <p><br/></p>
  <p><br/></p>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8" id="signup_msg">
        <!-- alert from sign up form-->
      </div>
      <div class="col-md-2"></div>
              
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel panel-primary">
          <div class="panel-heading"> Customer Sign Up Form</div>
          <div class="panel-body">
            
            <form method="POST">
            <div class="row">
              <div class="col-md-6">
                <label for="f_name"> First Name</label>
                <input type="text" class="form-control" id="f_name" name="f_name">
              </div>


              <div class="col-md-6">
                <label for="l_name"> Last Name</label>
                <input type="text" class="form-control" id="l_name" name="l_name">
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="email"> EmailId</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="repass">Re-enter Password</label>
                <input type="password" class="form-control" id="repass" name="repass">
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="mob">Mobile</label>
                <input type="text" class="form-control" id="mob" name="mob" maxlength="10"><br>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="addr1">Address 1</label>
                <input class="form-control" type="text" id="addr1" name="addr1">
                
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="addr2">Address 2</label>
                <input class="form-control" type="text" id="addr2" name="addr2">
                
              </div>
              
            </div>
            <p><br/></p>
            <div class="row">
              <div class="col-md-12">
              <input style="float: right;" value="Sign Up" type="button" id="signup_btn" name="signup_btn" class="btn btn-success btn-lg">
              </div>
            </div>
          </form>
        </div>
          <div class="panel-footer">&copy:2020</div>
          
        </div>
      </div>
      <div class="col-md-2"></div>
       
    </div>
    
  </div>
</body>
</html>