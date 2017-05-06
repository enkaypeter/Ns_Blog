<?php
   session_start();
   require("includes/functions.php");
   $msg = "";
   $e_mail = "";
   $login ="";
   $pass = "";
   $fName = "";
   $lName = "";
   $pword = "";
   $confirm = "";
   $email = "";
   $password = "";
   $aGoodName = "";
   if(isset($_POST["signUp"])){
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $email = $_POST["email"];
        $pword = $_POST["pword"];
        $confirm = $_POST["confirm"];
        
        if($pword != $confirm){
            $pass = '<p class="error">Your passwords must Match</p>';
        }elseif($pword == $confirm){
         $connect = connect();
        //$checkSql = 'SELECT email FROM users WHERE email = "'.$email.'" ';
        //$res = mysqli_query($connect,$checkSql);
        //$count = mysqli_affected_rows($connect);
        //if($count>=1){
        //    $msg = '<p class="eror">A user with this email already exist</p> ';
        //} 
            $sql = 'INSERT INTO users (firstName, lastName, email, password, online) VALUES("'.$fName.'","'.$lName.'","'.$email.'","'.$pword.'",0)';
            $res = mysqli_query($connect,$sql) or die(mysqli_error($connect));
            $count= mysqli_affected_rows($connect);
            if($count >= 1){
                $msg = '<p class="success" style="margin-bottom:20px">Your registration was successfull. You can Now Login</p>';
            }else{
                $msg = '<p class=error>Could Not Register</p>';
            }
        }
      }
      mysqli_close($connect);
   if(isset($_POST["logIn"])){
         $connect = connect();
         $e_mail = $_POST["e-mail"];
        $password = $_POST["password"];
        $loginQuery = 'SELECT * FROM users WHERE email = "'.$e_mail.'" AND password = "'.$password.'" ';
        $res = mysqli_query($connect, $loginQuery);
        $count  = mysqli_affected_rows($connect);
        if($count > 0){
            $_SESSION["user"] = $e_mail; 
            $sql = 'UPDATE users SET online = 1 WHERE email = "'.$e_mail.'" ';
            mysqli_query($connect,$sql);
            header("location:index.php");
        }
        else{
            $login = '<p class= "error">Incorrect username or password</p>';
        }
        mysqli_close($connect);
   }
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body style=" background-image: url('img/home-bg.jpg'); background-repeat: no-repeat; background-position: center top; background-attachment: fixed;">

    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form method="post">
          <div class="top-row">
            <center>
            <?php
               if(isset($login)){
                  echo $login;
               }
               if(isset($pass)){
                  echo $pass;
               }
               if(isset($msg)){
                  echo $msg;
               }
               elseif(isset($aGoodName)){
                  header("location:index.php");
               }
            ?>            
            <br/> <br/></center>
            
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="fName" required/>
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="lName" required/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set  Password<span class="req">*</span>
            </label>
            <input type="password" name = "pword" required/>
          </div>
          <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password" name = "confirm" required/>
          </div>
          
          <button type="submit" class="button button-block"  name="signUp" />Sign Up</button>
          
          </form>

        </div>
        
        <div id="login">
          <h1>Welcome!</h1>
          <?php
          if(isset($login)){
                  echo $login;
               }
            if(isset($msg)){
                  echo $msg;
               }
            ?>
         <!--  <center><p class="forgot"><a href="#"></a></p></center>-->
          <form  method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="e-mail" required/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required/>
          </div>
          
         <!-- <p class="forgot"><a href="#">Forgot Password?</a></p>-->
          
          <button class="button button-block" name="logIn"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/signUp.js"></script>

    
    
    
  </body>
</html>
