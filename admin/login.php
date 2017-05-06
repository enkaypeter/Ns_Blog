<?php
	session_start();
    require("includes/functions.php");
    $username = "";
    $password = "";
    if(isset($_POST["logIn"])){
//        echo "GO!!"
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $connect = connect();
        $sql = 'SELECT * FROM admin WHERE username = "'.$username.'" AND password = "'.$password.'" ';
        $res = mysqli_query($connect,$sql);
        $count = mysqli_affected_rows($connect);
        if($count >= 1){
            $_SESSION["admin"] = $username;
            header("location:adminHome.php");
        }
        else{
            $error = '<p class="error">Incorrect Username or password</p>';
        }
    }
?>
<html>
    <head>
        <title></title>
           <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
     <link href="css/login.css" rel="stylesheet">
    </head>
    <body style="background-image: url('image/home-bg.jpg')">
        <!-- <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <form name="sentMessage" id="contactForm" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="control-group form-group">
                                <div class="controls"> 
                                    <div class="col-sm-6">
                                        <label>Username</label>
                                         <input type="text" class="form-control" id="name" name="username" placeholder="Enter your username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls"> 
                                    <div class="col-sm-6">
                                        <label>Password</label>
                                         <input type="password" class="form-control" id="name" name="password" placeholder="Enter your password" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="logIn" class="btn btn-primary">Log In</button>
                        </form>
            </div>
        </div> -->
        
   <div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo-container"></div>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <form method="post" id="loginForm" enctype="multipart/form-data">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control" type="text" name='username' placeholder="username"/>          
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" type="password" name='password' placeholder="password"/>     
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="logIn">Login</button>
          </div>
        </form>        
      </div>  
    </div>    
  </div>
</div>
    </body>
</html>