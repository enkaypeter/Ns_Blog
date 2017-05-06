<?php
session_start();
require("includes/functions.php");
error_reporting(0);
$disComment = "";
$id = "";
$text = "";
$date = "";
$pass = "";
   
     //get the email making the comment
   $connect = connect();
    $name = 'SELECT * FROM users ';
    $resname = mysqli_query($connect,$name) or die(mysqli_error($connect));
    $countee = mysqli_affected_rows($connect);
    if($countee > 0){
       while($rowEmail = mysqli_fetch_assoc($resname)){
        $emailUser = $rowEmail["email"];
       }
    }
    mysqli_close($connect);
    
    //get the name of the user
    $connect = connect();
    $nameQuery = 'SELECT * FROM users WHERE email = "'.$emailUser.'"';
    $nameRes = mysqli_query($connect,$nameQuery) or die(mysqli_error($connect));    
    $countUser = mysqli_affected_rows($connect);
    if($countUser > 0){
        while($rowName = mysqli_fetch_assoc($nameRes)){
        $fName = $rowName["firstName"];
        $lName = $rowName["lastName"];
        $fullName = "".$fName." ".$lName."";
        }
    }
    mysqli_close($connect);
    //display the comment
    $connect = connect();
    $showAllQuery = 'SELECT * FROM  comment ';
    $res = mysqli_query($connect,$showAllQuery) or die(mysqli_error($connect));
    $count = mysqli_affected_rows($connect);
    if($count > 0){
        while($row = mysqli_fetch_assoc($res)){
        $id = $row["commentId"];
       $text = $row["text"];
        $date = $row["date"];
            
            $disComment .= '
                        <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="img/icon.ico" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">'.$fullName.'
                            <small>'.$date.'</small>
                        </h4>
                        '.$text.'
                    </div>
                </div>
            ';
        }
    }
     mysqli_close($connect);
    //when the submit button is clicked
if(isset($_POST["submit"])){
    $connect = connect();
    if(!isset($_SESSION["user"])){
    header("location:register.php");
  }
    $comment = $_POST["comon"];
    $insertSql = 'INSERT INTO comment (text,date) VALUES("'.$comment.'",now())';
    $postRes = mysqli_query($connect,$insertSql) or die(mysqli_error($connect));
    $postCount = mysqli_affected_rows($connect);         
            if($postCount >= 1){
                $msg = '<p class=success> Item Added Successfully</p>';
            }else{
                 $msg = '<p class="error"> Could not add Item to Database. Please Try again!</p>';
            }
         header("location:post.php");
        
   }
   
    
    //get the name of the person making the comment
    
   
       
        mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NEIGHBOURHOOD STALKER!</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">STALKER!</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="active" href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="http://neighbourhoodstalker.com">Ns Home</a>
                    </li>
                    <li>
                        <a href="feedback.php">Feedback</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/post-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>LOL. DO NAIJA YOUTHS NEED DELIVERANCE OR MIND SURGERY? CAN LTA MAKE IT HAPPEN?</h1>
                        <h3 class="subheading">The Interview </h3>
                        <span class="meta">Posted by <a href="#">Enkay</a> on July 29, 2016</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                   <?php
                    require("includes/interview.php");
                    ?>
                            <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="comon" rows="3" required></textarea>
                        </div>
                        <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
                <!-- Posted Comments -->
               <?php
                    echo $disComment;
               ?>
                </div>
            </div>
        </div>
    </article>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                         <li>
                            <a href="https://twitter.com/dahoodstalker">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="http://fb.com/HoodStalker">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/117697688203251941208">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-google-plus  fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    	 <p class="copyright text-muted">Copyright &copy; Neighbourhoodstalker.com 2016 <br>Site Built by Enkay</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
