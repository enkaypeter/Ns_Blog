<?php
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
           $pid = "1'.$id.'.jpg";
           $pi2 = "2'.$id.'.jpg";
           if(isset($pid)){
            $imageDis = '
                    <a href="#">
                        <img class="img-responsive" src="blog.neighbourhoodstalker/admin/image/1_'.$id.'.jpg " alt="post Image">
                    </a>
            ';
           }
           if(isset($pid2)){
             $imageDis2 = '
                    <a href="#">
                        <img class="img-responsive" src="blog.neighbourhoodstalker/admin/image/2_'.$id.'.jpg " alt="post Image">
                    </a>
            ';
           }
        }
    }
      $comment = '<div class="fb-comments" data-href="https://blog.neighbourhoodstalker.com/post.php?id='.$id.'" data-numposts="5"></div>';
      $url = 'http://blog.neighbourhoodstalker.com/post?='.$id.' ';
     mysqli_close($connect);
      
?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
     
    <meta property="og:url"          content="<?php echo $url; ?>" />
    <meta property="og:type"         content="website" />
    <meta property="og:title"        content="<?php echo $title; ?>" />
    <meta property="og:description"  content="<?php echo $miniTitle; ?>" />
    <meta property="og:image"        content="htpp://blog.neighbourhoodstalker.com/img/icon.ico" />
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    
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

	<!-- facebook ads begin -->
	
		 <style>
                                            #ad_root {
                                               display: none;
                                               font-size: 14px;
                                               height: 250px;
                                               line-height: 16px;
                                               position: relative;
                                               width: 300px;
                                             }
                                             .thirdPartyMediaClass {
                                               height: 157px;
                                               width: 300px;
                                             }
                                             .thirdPartyTitleClass {
                                               font-weight: 600;
                                               font-size: 16px;
                                               margin: 8px 0 4px 0;
                                               overflow: hidden;
                                               text-overflow: ellipsis;
                                               white-space: nowrap;
                                             }
                                             .thirdPartyBodyClass {
                                               display: -webkit-box;
                                               height: 32px;
                                               -webkit-line-clamp: 2;
                                               overflow: hidden;
                                             }
                                             .thirdPartyCallToActionClass {
                                               color: #326891;
                                               font-family: sans-serif;
                                               font-weight: 600;
                                               margin-top: 8px;
                                             }
                                           </style>
                                           <script>
                                             window.fbAsyncInit = function() {
                                               FB.Event.subscribe(
                                                 'ad.loaded',
                                                 function(placementId) {
                                                   console.log('Audience Network ad loaded');
                                                   document.getElementById('ad_root').style.display = 'block';
                                                 }
                                               );
                                               FB.Event.subscribe(
                                                 'ad.error',
                                                 function(errorCode, errorMessage, placementId) {
                                                   console.log('Audience Network error (' + errorCode + ') ' + errorMessage);
                                                 }
                                               );
                                             };
                                             (function(d, s, id) {
                                               var js, fjs = d.getElementsByTagName(s)[0];
                                               if (d.getElementById(id)) return;
                                               js = d.createElement(s); js.id = id;
                                               js.src = "//connect.facebook.net/en_US/sdk/xfbml.ad.js#xfbml=1&version=v2.5&appId=1354873301209456";
                                               fjs.parentNode.insertBefore(js, fjs);
                                             }(document, 'script', 'facebook-jssdk'));
                                           </script>
	
	
	
	
	<!-- facebook ads ends -->


      <!-- facebook social plugin -->
      <!--<div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      </script>-->
      
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
                        <a href="index.php">Home</a>
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
                <div class="col-lg-6 col-lg-offset-2 col-md-10 col-md-offset-1">
                    
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
                           <?php
                              if(isset($imageDis2)){
                              echo $imageDis2;
                              }
                           ?>
                        <p>
                           <?php
                              if(isset($p3)){
                              echo $p3;
                              }
                           ?>
                        </p>
                        <div class="fb-ad" data-placementid="1354873301209456_1357449510951835" data-format="native" data-nativeadid="ad_root" datatestmode="false"></div>
					    <div id="ad_root">
					      <a class="fbAdLink">
					        <div class="fbAdMedia thirdPartyMediaClass"></div>
					        <div class="fbAdTitle thirdPartyTitleClass"></div>
					        <div class="fbAdBody thirdPartyBodyClass"></div>
					        <div class="fbAdCallToAction thirdPartyCallToActionClass"></div>
					      </a>
					    </div>
					      
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
                           <?php
                              if(isset($imageDis2)){
                              echo $imageDis2;
                              }
                           ?>
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
                    
                     <!--Facebook Share Button-->
                <br/>
                   <!-- Your share button code -->
                 <!-- <div class="fb-share-button" 
                     data-href="<?php echo $url; ?>" 
                     data-layout="button_count">
                  </div> -->
                    <br/>
                    <hr>
                        <!-- Blog Comments -->

                <!-- Comments Form -->
            <!--    <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="comon" rows="3" required></textarea>
                        </div>
                        <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
                    </form>
                </div>
                -->
                <!--Facebook Share Button-->
                <br/>
                   <!--Facebook Comment PlugIn -->
                   <?php
                     echo $comment;
                   ?>
                   
                <!-- Posted Comments -->
                   
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
