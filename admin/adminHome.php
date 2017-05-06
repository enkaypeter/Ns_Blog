<?php
    session_start();
if(!isset($_SESSION["admin"])){
    header("location:login.php");
}
    if(isset($_POST["submit"])){
        require("includes/functions.php");
        $connect = connect();
        $name = $_POST["name"];
        $header = $_POST["Header"];
        $subHeading = $_POST["subHeading"];
        
        $p1 = $_POST["p1"];
        $p2 = $_POST["p2"];
        $p3 = $_POST["p3"];
        $p4 = $_POST["p4"];
        $p5 = $_POST["p5"];
        $p6 = $_POST["p6"];
        $p7 = $_POST["p7"];
        $p8 = $_POST["p8"];
        $p9 = $_POST["p9"];
        $p10 = $_POST["p10"];
        $postSql = 'INSERT INTO post (dateAdded,adminName,postHeading,postSubHeading,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10) VALUES (now() , "'.$name.'","'.$header.'","'.$subHeading.'","'.$p1.'","'.$p2.'","'.$p3.'","'.$p4.'","'.$p5.'","'.$p6.'","'.$p7.'","'.$p8.'","'.$p9.'","'.$p10.'" ) ';
        $postRes = mysqli_query($connect,$postSql);
        $postCount = mysqli_affected_rows($connect);
             
                    //upload image
            $pid = mysqli_insert_id($connect);
            $img_1 = "1_$pid.jpg";
            move_uploaded_file($_FILES["image1"]["tmp_name"], "image/".$img_1." ");
             $img_2 = "2_$pid.jpg";
            move_uploaded_file($_FILES["image2"]["tmp_name"], "image/".$img_2." ");
            if($postCount >= 1){
                $msg = '<p class=success> Item Added Successfully</p>';
            }else{
                 $msg = '<p class="error"> Could not add Item to Database. Please Try again!</p>';
            }
        
        
    }
?>
<html>
    <head>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

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
    <body style="background-image: url('image/home-bg.jpg'); background-repeat: no-repeat; background-position: center top; background-attachment: fixed;">
         <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">STALKER!</a>
            </div>

            <!-- nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="http://blog.neighbourhoodstalker.com">Home</a>
                    </li>
                    <li>
                        <a href="postPage.php">Full Post</a>
                    </li>
                    <li>
                        <a href="http://neighbourhoodstalker.com">Ns Home</a>
                    </li>
                    <li>
                        <a href="viewPost.php">Post</a>
                    </li>
                    <li>
                        <a class="active" href="admin/adminHome.php">Admin</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

        <div style="padding-left:45px;">
            <form name="sentMessage" id="contactForm" class="form-horizontal " method="post" enctype="multipart/form-data">
                <?php
                    if(isset($msg)){
                        echo $msg;
                    }
                ?>
              <div class="container ">
                <div class="row">
                     <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    
                    <div class="control-group form-group move">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Post Heading:</label>
                                    <input type="text" class="form-control" id="phone" name="Header" placeholder="Enter The SubHeading Of The Post" required >
                            </div>
                        </div>
                     </div>
            
                    <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Post SubHeading:</label>
                                    <input type="text" class="form-control" id="phone" name="subHeading" placeholder="Enter The SubHeading Of The Post" required >
                            </div>
                        </div>
                     </div>
            
                    <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Posted By Who?</label>
                                <textarea class="form-control" rows="4" id="message" name="name" placeholder="Please Enter Your Name" required ></textarea>
                            </div>
                        </div>
                     </div>
            
                      <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph One:</label>
                                <textarea class="form-control" rows="4" id="message" name="p1" placeholder="Enter Your First Paragraph" required ></textarea>
                            </div>
                        </div>
                    </div>
                      <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph Two:</label>
                                <textarea class="form-control" rows="4" id="message" name="p2" placeholder="Enter Your Second Paragraph" required ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph Three:</label>
                                <textarea class="form-control" rows="4" id="message" name="p3" placeholder="Enter Your Third Paragraph" required ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph Four:</label>
                                <textarea class="form-control" rows="4" id="message" name="p4" placeholder="Enter Your Fourth Paragraph" required ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph Five:</label>
                                <textarea class="form-control" rows="4" id="message" name="p5" placeholder="Enter Your Fifth Paragraph" required ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph Six:</label>
                                <textarea class="form-control" rows="4" id="message" name="p6" placeholder="Enter Your Sixth Paragraph"></textarea>
                            </div>
                        </div>
                    </div>
                     <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph Seven:</label>
                                <textarea class="form-control" rows="4" id="message" name="p7" placeholder="Enter Your Seventh Paragraph"></textarea>
                            </div>
                        </div>
                    </div>
                      <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph Eight:</label>
                                <textarea class="form-control" rows="4" id="message" name="p8" placeholder="Enter Your Eight Paragraph"></textarea>
                            </div>
                        </div>
                    </div>
                       <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph Nine:</label>
                                <textarea class="form-control" rows="4" id="message" name="p9" placeholder="Enter Your Ninth Paragraph"></textarea>
                            </div>
                        </div>
                    </div>
                        <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Paragraph 10:</label>
                                <textarea class="form-control" rows="4" id="message" name="p10" placeholder="Enter Your Tenth Paragraph"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Image 1:</label>
                                <input type="file" class="file" name="image1" required>
                            </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <div class="col-sm-6">
                                <label>Image 2:</label>
                                <input type="file" class="file" name="image2" required>
                            </div>
                        </div>
                    </div>
                    
        
                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
            </form>
                </div>
            </div>
        </div>
        
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