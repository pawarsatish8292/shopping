<?php
session_start();
if(isset($_SESSION['uid'])){
  header('Location:profile.php');
}
?>
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
            <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Rental</a></li>
            <li style="width:200px;left:10px;top:10px;">
             <input type="text" class="from-control" id="search"></li>
             <li style="top:10px;left:10px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
            <div class="dropdown-menu" style="width: 400px;">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <div class="row">
                  <div class="col-md-3">Sr.No</div>
                  <div class="col-md-3">Product Image</div>
                  <div class="col-md-3">Product Name</div>
                  <div class="col-md-3">Price in $</div>
                </div>
                </div>
                <div class="panel-body"></div>
                <div class="panel-footer"></div>
                
              </div>
              
            </div>
            </li>
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
              <ul class="dropdown-menu">
              <div style="width: 250px;">
                <div class="panel panel-primary">
                  <div class="panel-heading">Login
                    
                  </div>
                  <div class="panel-heading">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required="required" class="form-control">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" required="required" class="form-control">
                    <p><br/></p>
                    <a href="#" style="color: white;list-style: none;">forgotten password</a><input type="submit" value="Login" class="btn btn-success" id="login" style="float: right;">
                  </div>
                  <div class="panel-footer" id="e_msg"></div>
                  
                </div>
              </div>







              </ul>
            </li>
            <li><a href="customer_rgistration.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
            
            </ul>
       </div>
      </div>
      <p><br/></p>
      <p><br/></p>
      <p><br/></p>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-2">
            <div id="get_category"></div>
           <!--  <div class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"><h4>Categories</h4></a></li>
              <li><a href="#"><h4>Categories</h4></a></li>
              <li><a href="#"><h4>Categories</h4></a></li>
              <li><a href="#"><h4>Categories</h4></a></li>
              <li><a href="#"><h4>Categories</h4></a></li>
            </div> -->
            <div id="get_brand"></div>
           <!--  <div class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"><h4>Brand</h4></a></li>
              <li><a href="#"><h4>Categories</h4></a></li>
              <li><a href="#"><h4>Categories</h4></a></li>
              <li><a href="#"><h4>Categories</h4></a></li>
              <li><a href="#"><h4>Categories</h4></a></li>
            </div> -->
          </div>
          <div class="col-md-8">
            <div class="panel panel-info">
             <div class="panel-heading">Product</div>
             <div class="panel-body">
              <div id="get_product"></div>
              <!--  <div class="col-md-4">
                 <div class="panel panel-info"> 
                  <div class="panel-heading">Samsung Galaxy </div>
                 <div class="panel-body">
                  <img src="images/samsung.jpg" class="img-responsive" />
                 </div> 
                 <div class="panel-heading">$.500.00
                  <button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
                 </div>
               </div>
               </div> -->
             </div>
             <div class="panel-footer">&copy; 2020</div>
           </div>
          </div>

          <div class="col-md-1"></div>
        </div>
      </div>
      </body>
    </html>

