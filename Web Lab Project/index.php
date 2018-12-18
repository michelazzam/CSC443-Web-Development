
<?php
session_start();
ob_start();
require('includes/connect.php');

if($_SESSION['permission_user'] != true ){
	header('Location: loginRegister.php');
  die();
}else{

$_SESSION['comp_name'] =null;

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FREEHTML5.CO

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place charbeldaoud.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="charbeldaoud.ico">

	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">

	<link rel="stylesheet" href="css/style.css" >

	<!-- <link rel="stylesheet" href="sass/star.scss"> -->

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<div id="fh5co-header" >
			<header id="fh5co-header-section"> 
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo" ><a href="index.php">S. P. A. Gallery</a></h1>

					
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
				
							<ul class="sf-menu" id="fh5co-primary-menu">
									<li class="topnav">
											<!-- <input type="text" placeholder="Search by region"> -->
			
								<li class="aactive"><a href="php/logout.php">logout</a></li>

							</ul>
						</nav>
					</div>
				</div>
			</header>

		</div>


		<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/curve.jpg);">
				<div class="desc animate-box">
					<h2>Self-fulfilling Peace-of-mind Accomplishment</h2>
					<span><a class="btn btn-primary btn-lg" href="#footer">Contact Us</a></span>
				</div>
			</div>

		</div>
    <div class="fh5co-listing " id="list">
      <!-- //add nav bar -->
    			<div class="container "  >
    				<div class="row">

							 <?php               
              
                $stmt = $mysqli->prepare("SELECT comp_id, comp_name FROM companies WHERE 1 ");
                // $stmt->bind_param('i', $comp_id);
                $stmt->execute();
                $stmt->store_result();

                $numRows = $stmt -> num_rows;
                $stmt->bind_result($comp_id, $comp_name);
               


                while( $stmt->fetch())
                {
									?>
									<!-- <form method="get" action="location.php"> -->
    					<div class="col-md-4 col-sm-4 fh5co-item-wrap">
    						<a class="fh5co-listing-item" onclick="POST" href="location.php?comp=<?php echo $comp_name; ?>" >
    							<img src="images//back1_spa.jpg" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive">
    							<div class="fh5co-listing-copy">
										<h2 ><?php echo $comp_name; ?></h2>
    								<span class="icon">
    									<i class="icon-chevron-right"></i>
    								</span>
    							</div>
    						</a>
							</div>
								<!-- </form> -->
    					<!-- END 3 row -->
							<?php
								}
								?>

    				</div>
    			</div>
    		</div>

		<footer>
<div id="footer">
      <div id="fh5co-contact" class="fh5co-section animate-box">
        <div class="container">
          <form autocomplete="off">
            <div class="row">
              <div class="col-md-6">
                <h3 class="section-title">My Address</h3>
                <p>Lebanon, Jbeil-Byblos</p>
                <ul class="contact-info">
                  <li><i class="icon-location-pin"></i>Lebanese American University</li>
                  <li><i class="icon-phone2"></i>+961-71-062186</li>
                  <li><i class="icon-mail"></i><a href="https://outlook.office.com/owa/"  target="_blank">michel.azzam@lau.edu</a></li>
                  <li><i class="icon-globe2"></i><a href="http://www.lau.edu.lb/"  target="_blank">www.Lau.edu</a></li>
                </ul>
              </div>
              <div class="col-md-6">
                <div class="row">
																	<div class="col-md-12">
                                    <div class="form-group">
                                      <input type="text" id="msgSubject" class="form-control" placeholder="Subject" name="subject_sending">
                                    </div>
                                  </div>
                               
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea name="message_content" class="form-control" id="msgContent" cols="30" rows="7" placeholder="Any Message You'd like to deliver?"></textarea>
                                    </div>
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <input id="downsub" value="Send Message" class="btn btn-primary btn-lg downMsg">
                                    </div>
                                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="https://www.facebook.com/michel.azzam.7" target="_blank"><i class="icon-facebook2"></i></a>
								<a href="https://www.instagram.com/michel_azzam/" target="_blank"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="https://www.youtube.com/watch?v=H7U0hFNiYFk"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright &copy;2018 Michel Azzam. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="https://www.instagram.com/michel_azzam/" target="_blank">michel</a> to Mr.<a href="https://www.instagram.com/ninjaco.io/" target="_blank">Daoud</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>


	</div>
	<!-- END fh5co-page -->


	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/index.js"></script>

	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>
							<?php } ?>