<?php
    require("includes/functions.php");
    $allPost = "";
    $postId = "";
    $name = "";
    $header = "";
    $subHeading = "";
    $dateAdded = "";
    $connect = connect();
    $showAllQuery = 'SELECT * FROM post';
    $res = mysqli_query($connect,$showAllQuery);
    $count = mysqli_affected_rows($connect);
    if($count > 0){
        while($row = mysqli_fetch_assoc($res)){
        $id = $row["postId"];
        $name = $row["adminName"];
        $header = $row["postHeading"];
        $subHeading = $row["postSubHeading"];
        $dateAdded = $row["dateAdded"];
            
            $allPost .= '<div class="post-preview">
                        <a href="post.php?id='.$id.'">
                        <h2 class="post-title">
                            '.$header.'
                        </h2>
                        <h3 class="post-subtitle">
                            '.$subHeading.'
                        </h3>
                    </a>
                    <p class="post-meta">Posted by '.$name.' <a href="#"> </a>  on '.$dateAdded.'</p>
                </div>';
        }
    }
    $url = 'http://blog.neighbourhoodstalker.com/post?='.$id.' ';
    
    mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <meta property="og:url"          content="<?php echo $url; ?>" />
    <meta property="og:type"         content="article" />
    <meta property="og:title"        content="<?php echo $header; ?>" />
    <meta property="og:description"  content="<?php echo $subHeading; ?>" />
    <meta property="og:image"        content="" />
    
    
    
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>STALKER!</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">
	
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<script src="https://cdn.flurry.com/js/flurry.js"></script>
	<script>FlurryAgent.startSession(4C9Z76JVVJGY95NSRSWC);</script>
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

            <!-- nav links, forms, and other content for toggling -->
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
                    
                     <!-- 
                   	<li>
                       	 <a href="register.php">Register</a>
                    	</li>
                    -->
                    
                    <li>
                        <a href="admin/adminHome.php">Admin</a>
                    </li>
                    <!--<li>
                        <a href="register.php">Register!</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- background image for this header. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>STALKER!</h1>
                        <hr class="small">
                        <span class="subheading">Official Blog of Neighbourhood Stalker</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
    
    	  <!-- ads by facebook -->
                
                    <script>
			      window.fbAsyncInit = function() {
			        FB.Event.subscribe(
			          'ad.loaded',
			          function(placementId) {
			            console.log('Audience Network ad loaded');
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
  		  <div class="fb-ad" data-placementid="1354873301209456_1365730363457083" data-format="300x250" data-testmode="false"></div>
               
                <!-- end of facebook ads -->
    
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php
                    echo $allPost;
                ?>
              
                
                <hr>
                
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="older.php">older &rarr;</a>
                    </li>
                    <li class="previous">
                        <a href="index.php">&larr; newer</a>
                    </li>
                </ul>
            </div>
           
            
            
        </div>
     </div>

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
