 <?php
     session_start();
if(!isset($_SESSION["admin"])){
    header("location:login.php");
}
    require("includes/functions.php");
     $id = $_GET["id"];
    //get user details
    $title ="";
    $miniTitle = "";
    $name2 = "";
    $dateAdded2 = "";
    $p1 = "";
    $p2 = "";
    $p3 = "";
    $p4 = "";
    $p5 = "";
    $p6 = "";
    $p7 = "";
    $p8 = "";
    $p9 = "";
    $p10 = "";
    $connect = connect(); 
    $dummySql = 'SELECT * FROM post WHERE postId = '.$id.'';
    $postRes = mysqli_query($connect,$dummySql);
    $counter = mysqli_affected_rows($connect);
    if($counter >= 1){
        while($rowDis = mysqli_fetch_assoc($postRes)){
           $title = $rowDis["postHeading"];
           $miniTitle = $rowDis["postSubHeading"];
           $name2 = $rowDis["adminName"];
           $dateAdded2 = $rowDis["dateAdded"];
           $p1 = $rowDis["p1"];
           $p2 = $rowDis["p2"];
           $p3 = $rowDis["p3"];
           $p4 = $rowDis["p4"];
           $p5 = $rowDis["p5"];
           $p6 = $rowDis["p6"];
           $p7 = $rowDis["p7"];
           $p8 = $rowDis["p8"];
           $p9 = $rowDis["p9"];
           $p10 = $rowDis["p10"];
            $imageDis = '
                    <a href="#">
                        <img class="img-responsive" src="image/1_'.$id.'.jpg " alt="post Image">
                    </a>
            ';
             $imageDis2 = '
                    <a href="#">
                        <img class="img-responsive" src="image/2_'.$id.'.jpg " alt="post Image">
                    </a>
            ';
        }
    }
   
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

    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="blog.neighbourhoodstalker.com">STALKER!</a>
            </div>

            <!-- nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="http://neighbourhoodstalker.com">Ns Home</a>
                    </li>
                    <li>
                        <a href="admin/adminHome.php">Admin</a>
                    </li>
                    <li>
                        <a href="viewPost.php">Post</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('image/post-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>
                            <?php
                                echo $title;
                            ?>
                        </h1>
                        <h3 class="subheading"><?php echo $miniTitle; ?></h3>
                        <span class="meta">Posted by <a href="#"><?php echo $name2; ?></a> <?php echo $dateAdded2; ?></span>
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
                    <p>
                       <?php
                            if(isset($p1)){
                            echo $p1;
                            }
                       ?>
                    </p>

                    <p>
                         <?php
                            if(isset($p2)){
                            echo $p2;
                            }
                       ?>
                    </p>
                     <?php echo $imageDis; ?>
                    <p>
                         <?php
                            if(isset($p3)){
                            echo $p3;
                            }
                       ?>
                    </p>

                    <p>
                        <?php
                            if(isset($p4)){
                            echo $p4;
                            }
                       ?>
                    </p>
                     <p>
                        <?php
                            if(isset($p5)){
                            echo $p5;
                            }
                       ?>
                    </p>
                       <p>
                        <?php
                            if(isset($p6)){
                            echo $p6;
                            }
                       ?> 
                       </p>
                         <p>
                            <?php
                            if(isset($p7)){
                            echo $p7;
                            }
                       ?>     
                        </p>
                          <p>
                            <?php
                            if(isset($p8)){
                            echo $p8;
                            }
                             ?>     
                        </p>
                           <?php echo $imageDis2; ?>
                             <p>
                            <?php
                            if(isset($p9)){
                            echo $p9;
                            }
                             ?>     
                        </p>
                                <p>
                            <?php
                            if(isset($p10)){
                            echo $p10;
                            }
                             ?>     
                        </p>
                    
                </div>
            </div>
        </div>
    </article>

    <hr>
        <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
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
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
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
