<?php
session_start();
ob_start();
require('includes/connect.php');

if($_SESSION['permission_user'] != true ){
	header('Location: loginRegister.php');
  die();
}else{

if($_SESSION['comp_name']!=null)
{
  $comp_name=$_SESSION['comp_name'];
}else{
$comp_name=$_GET['comp'];
$_SESSION['comp_name'] =$comp_name;
}
$stmt1 = $mysqli->prepare("SELECT comp_id, comp_description, comp_rating, comp_address FROM companies WHERE comp_name=? ");
$stmt1->bind_param('s', $comp_name);
$stmt1->execute();
$stmt1->store_result();

$stmt1->bind_result($comp_id, $comp_desc, $comp_rating, $comp_address);
$stmt1->fetch();


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

	<link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="css/jquery.datetimepicker.css">

  <link rel="stylesheet" href="css/location.css">
  <link rel="stylesheet" href="css/star.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>


	</head>
	<body>


		<div id="fh5co-wrapper">
    <div id="fh5co-header" >
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo" ><a href="index.php">S. P. A. Gallery</a></h1>


						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">

							<ul class="sf-menu" id="fh5co-primary-menu">
                <!-- //change active word -->
								<li class="aactive"><a href="php/logout.php">logout</a></li>

							</ul>
						</nav>
					</div>
				</div>
			</header>
        </div>
		<div id="fh5co-page">
		





       <!-- start of body info -->
       <div class="location-info ">
            <div class="container"  >
                <div class="row">

                          <div class="image-row">
                                <div class="image-loc">

                                
         <div id="myCarousel" class="carousel slide cars" data-ride="carousel">
           <!-- Indicators -->
           <ol class="carousel-indicators">
           <?php
               //instead of is the package id
                     $file = glob("images/$comp_id/img/*.*");
                     $count=count($file);
                     for ($i=0; $i<$count; $i++)
                     {
                       $num = $file[$i];
                       if($i==0){
                           ?>
                             <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="active"></li>

                         <?php  }
                           else {
                           ?>
                             <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" ></li>

                         <?php
                         }
                       }
                       ?>
           </ol>

           <!-- Wrapper for slides -->

           <div class="carousel-inner">
             <?php

                     for ($i=0; $i<$count; $i++)
                     {
                       $num = $file[$i];
                       if($i==0){
                           ?>
                           <div class="item active">
                             <img  src="<?php echo $num; ?>" alt="responsive"">
                           </div>

                         <?php  }
                           else if($i>0){
                           ?>

                         <div class="item">
                             <img src="<?php echo $num; ?>"  alt="responsive"">
                         </div>

                         <?php
                         }
                       }
                       ?>
           </div>
           <!-- Left and right controls -->
           <a class="left carousel-control" href="#myCarousel" data-slide="prev">
             <span class="glyphicon glyphicon-chevron-left"></span>
             <span class="sr-only">Previous</span>
           </a>
           <a class="right carousel-control" href="#myCarousel" data-slide="next">
             <span class="glyphicon glyphicon-chevron-right"></span>
             <span class="sr-only">Next</span>
           </a>
         </div>
       
                                </div>
                            </div>

                            <div class="loc-info">
                                 
                                    <p><h1><?php echo $comp_name; ?></h1>
                                    <h3>
                                  <div class="rating" > 
                                  <span id="comp_rat" value="<?php echo $comp_rating; ?>"></span>
                                    <span class="fa fa-star _c0" ></span>
                                    <span class="fa fa-star _c1" ></span>
                                    <span class="fa fa-star _c2" ></span>
                                    <span class="fa fa-star _c3" ></span>
                                    <span class="fa fa-star _c4"></span>
                                    &nbsp; 
                                    <?php echo $comp_rating; ?>/5
                                </div>
                                
                                      </h3></p>


                                    <h3><?php echo $comp_desc; ?></h3>
                                    <!-- <h3>echo $comp_address; </h3> -->
                            </div>
                    </div>
                <div class="row rrow">
                <?php


                $stmt = $mysqli->prepare("SELECT pack_id, pack_name, pack_description, pack_rating, pack_price FROM packages where comp_id = ?");
                $stmt->bind_param('i', $comp_id);
                $stmt->execute();
                $stmt->store_result();

                $numRows = $stmt -> num_rows;
                $stmt->bind_result($pack_id, $pack_name, $pack_description, $pack_rating, $pack_price);



                while( $stmt->fetch())
                {
                  //instead of is the package id
                  $files = glob("images/$comp_id/packages/$pack_id/*.*");
                  $count=count($files);
                ?>

            <div class="adsItem ">
                         <div class="imageBox">
                         <a data-toggle="modal"  data-target="#myModal<?php echo $pack_id;?> ">
                              <img src="<?php echo $files[0];?>" alt="Responsive image">
                              </a>
                           </div>
                          <div class="package_info_header" style="margin-left:2%;">
                             <div class="package_name"> <?php echo $pack_name; ?> </div>
                               <div class="package_price">   <?php  echo $pack_price;  ?>$</div>
                         </div>

                   </div>

            <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $pack_id; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"><?php echo $pack_name;?></h4>
        </div>
        <div class="modal-body">

          <div class="contains">
            <div id="myCarousel<?php echo $pack_id;?>" class="carousel slide " data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
              <?php
               
                        for ($i=0; $i<$count; $i++)
                        {
                          $num = $files[$i];
                          if($i==0){
                              ?>
                                <li data-target="#myCarousel<?php echo $pack_id;?>" data-slide-to="<?php echo $i;?>" class="active"></li>

                            <?php  }
                              else {
                              ?>
                                <li data-target="#myCarousel<?php echo $pack_id;?>" data-slide-to="<?php echo $i;?>" ></li>

                            <?php
                            }
                          }
                          ?>
              </ol>

              <!-- Wrapper for slides -->

              <div class="carousel-inner">
                <?php

                        for ($i=0; $i<$count; $i++)
                        {
                          $num = $files[$i];
                          if($i==0){
                              ?>
                              <div class="item active cars tem">
                                <img src="<?php echo $num; ?>"  style="width:100%;">
                              </div>

                            <?php  }
                              else if($i>0){
                              ?>

                            <div class="item cars tem">
                                <img src="<?php echo $num; ?>"  style="width:100%;">
                            </div>

                            <?php
                            }
                          }
                          ?>




                <!-- <div class="item">
                  <img src="images/cover1.jpg" alt="New york" style="width:100%;">
                </div> -->

              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel<?php echo $pack_id;?>" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel<?php echo $pack_id;?>" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>

            </div>
          </div>

          <div class="contains-info">
            <div class="rating"></div>
            <p><?php echo $pack_description?></p>
            <p>         <div class="rating" id="pack_rat" value="<?php echo $pack_rating; ?>" name="<?php echo intval($pack_id); ?>"> 
                                   <?php echo $pack_price;?>$ &nbsp; &nbsp;  &nbsp; 
                                   <span class="fa fa-star _p<?php echo intval($pack_id); ?>p0" ></span>
                                    <span class="fa fa-star _p<?php echo intval($pack_id); ?>p1" ></span>
                                    <span class="fa fa-star _p<?php echo intval($pack_id); ?>p2" ></span>
                                    <span class="fa fa-star _p<?php echo intval($pack_id); ?>p3" ></span>
                                    <span class="fa fa-star _p<?php echo intval($pack_id); ?>p4"></span>
                                    &nbsp; 
                                    <?php echo $pack_rating; ?>/5
                                </div></p>
            <span class="btn"  id="register" onclick="show(<?php echo $pack_id;?>)" >Reserve</span>
                  <div class="shows" id="<?php echo $pack_id;?>" >

                    <form autocomplete="off" class="needs-validation " novalidate method="POST" action="php/sms.php">
                        <div class="form-row">
                          <div class="col-md-6 mb-3" >
                            <label for="validationTooltipname">Check in Name</label>
                            <input type="text" class="form-control" id="validationTooltipname" placeholder="name" name="check_name" required>

                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="datetimepicker<?php echo intval($pack_id); ?>">Date & Time</label>
                            <input class="form-control" type="text" id="datetimepicker<?php echo intval($pack_id); ?>" placeholder="date and time" name="check_date" required>

                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="validationTooltipnumber">Phone Number</label>
                            <input type="tel" class="form-control" id="validationTooltipnumber" maxlength="8" placeholder="phone" name="check_phone" required>

                          </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 ">
                            <label for="exampleFormControlTextarea1">Any note?</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="comment" name="check_comment"></textarea>
                          </div>
                        </div>
                        <!-- <div class="form-row"> -->
                        <button class="btn btn-primary"  type="submit">Submit</button>
                        <!-- </div> -->
                     </form>

                  </div>

              <!-- <div class="reviews">
                <div class="image">im</div>

                <div class="rating-info">
                    <div class="name">michel azzam</div>
                    <div class="rating">5stars</div>
                    <div class="description">perfect place </div>
                    <div class="like"></div>
              </div>

            </div> -->
          </div>

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
                </div>

            </div>

    </div>

    <!-- end of body  -->
<?php
    $stmt2 = $mysqli->prepare("SELECT comp_email, comp_fb, comp_insta, comp_twitter,  comp_website,  comp_youtube, comp_phone FROM companies WHERE comp_name=? ");
    $stmt2->bind_param('s', $comp_name);
    $stmt2->execute();
    $stmt2->store_result();

    $stmt2->bind_result($comp_email, $comp_fb, $comp_insta, $comp_twitter,  $comp_website,  $comp_youtube, $comp_phone);
    $stmt2->fetch();
?>

                <!-- start of footer -->
		<footer>
                <div id="footer">
                      <div id="fh5co-contact" class="fh5co-section animate-box">
                        <div class="container">
                          <form autocomplete="off" action="#"  >
                            <div class="row">
                              <div class="col-md-6">
                                <h3 class="section-title"><?php echo $comp_name; ?> Address</h3>
                                <ul class="contact-info">
                                  <li><i class="icon-location-pin"></i><?php echo $comp_address; ?></li>
                                  <li><i class="icon-phone2"></i>+961-<?php echo $comp_phone; ?></li>
                                  <li><i class="icon-mail"></i><a href="https://outlook.office.com/owa/"  target="_blank"><?php echo $comp_email; ?></a></li>
                                  <li><i class="icon-globe2"></i><a href="<?php echo $comp_website; ?>"  target="_blank"><?php echo $comp_website; ?></a></li>
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
                                      <input type="submit" id="downsub" value="Send Message" class="btn btn-primary btn-lg downMsg">
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
                                                <a href="<?php echo $comp_twitter; ?>"><i class="icon-twitter2"></i></a>
                                                <a href="<?php echo $comp_fb; ?>" target="_blank"><i class="icon-facebook2"></i></a>
                                                <a href="<?php echo $comp_insta; ?>" target="_blank"><i class="icon-instagram"></i></a>
                                                <a href="<?php echo $comp_website; ?>"><i class="icon-dribbble2"></i></a>
                                                <a href="<?php echo $comp_youtube; ?>"><i class="icon-youtube"></i></a>
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

    <script src="js/jquery.datetimepicker.full.js"></script>

    <script src="js/request.time.js"></script>

    <script src="js/location.js"></script>

    <script src="js/main.js"></script>

	</body>
</html>
                        <?php } ?>