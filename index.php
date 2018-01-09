<?php
session_start();
?>



<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alpha Art Gallery</title>
     <link rel="icon" type="image/png" href="logo.png" />

     <script type="text/javascript" src="js/jquery.js"></script>

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/nivo-lightbox.css" rel="stylesheet" />
	<link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />	
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
    <!-- =========================================================================================== -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<a href="index.html"></a>
		</div>
		<div class="page-scroll">
			<a href="#about">
				<i class="fa fa-angle-down fa-5x animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->
	
    <!-- Navigation -->
    <div id="navigation">
        <nav class="navbar navbar-custom" role="navigation">
                              <div class="container">
                                    <div class="row">
                                          <div class="col-md-12">
                         
                                          <!-- Brand and toggle get grouped for better mobile display -->
                                          <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                                <i class="fa fa-bars"></i>
                                                </button>
                                          </div>
                                                      <!-- Collect the nav links, forms, and other content for toggling -->
                                                      <div class="collapse navbar-collapse" id="menu">
                                                            <ul class="nav navbar-nav">
                                                                  <li class="active"><a href="#intro">Home</a></li>
                                                                  <li><a href="#about">Know More</a></li>
														          <li><a href="#gallery">Our Gallery</a></li>
														          <li><a href="#contact">Talk to us</a></li>
														          <li><a href="#admin" data-toggle= "modal" data-target="#myModal">Sign Up</a></li>
                                                            </ul>
                                                      </div>
                                                      <!-- /.Navbar-collapse -->
                             
                                          </div>
                                    </div>
                              </div>
                              <!-- /.container -->
                        </nav>
    </div> 
    <!-- /Navigation -->  <br>
    <?php
    	$connect = mysqli_connect("localhost","root","cutepanda","art_gallery");
    	$res = mysqli_query($connect,"select max(NOT_ID) from notification");
 		$res_row = mysqli_fetch_assoc($res);
 		$stored_not_id = intval($res_row['max(NOT_ID)']);
 		$nam = mysqli_query($connect,"select P_NAME from notification where NOT_ID = $stored_not_id");
 		$nam_row = mysqli_fetch_assoc($nam);
        echo "<marquee> New paintings have been added! Check out the gallery!<br>Painting Name: ".$nam_row['P_NAME']."</marquee>"; 

    ?>
   <br>
 <div class="dropdown" style="padding-left: 1200px;">
	<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" >Login
	<span class="caret" ></span></button>
		<ul class="dropdown-menu dropdown-menu-right" role = "menu" aria-labelledby="menu1">
		<li role="presentation"><a role="menuitem" tabindex="-1" href="artistpage.php"> Artist Login</a></li>
		<li role="presentation"><a role="menuitem" tabindex="-1" href="customerpage.php"> Customer Login</a></li>
		</ul>
 </div>
	<!-- Section: about -->
    <section id="about" class="home-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					
						<div class="section-heading text-center">
						<div class="wow bounceInDown" data-wow-delay="0.2s">
							<h2>Hello! Find the finest paintings here!</h2>
						</div>
						<p class="wow bounceInUp" data-wow-delay="0.3s"> Get an opportunity to own one of them..!</p>
						</div>
					
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
				
					<img src="bg.jpg" class="img-responsive img-rounded" alt="" />
				</div>		
				<div class="col-md-6">
					<p><strong>Know more about us</strong></p>
					<p> "Art washes away from the soul the dust of everyday life" -- by Pablo Picasso....</p>
					<p>Alpha Art Gallery has the finest paintings painted by the famous artists.
					    Feel free to contact us!!
					</p>
					<blockquote>
					There will be exhibitions organised by the artists.
					Get a chance to buy the one which you like and own it!!
					</blockquote>
					<a href="#gallery" class="btn btn-skin btn-lg btn-scroll">View Few paintings</a>
				</div>
			</div>		
		</div>
	</section>
	<!-- /Section: about -->
	
	<!-- Section: separator -->
    <section id="separator" class="home-section parallax text-center" data-stellar-background-ratio="0.5">
		
		<div class="container">
			<div class="row">
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center txt-shadow">
							<div class="icon">
								<i class="fa fa-file-image-o fa-5x"></i>
							</div>
						<span class="color-white"></span>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center txt-shadow">
							<div class="icon">
								<i class="fa fa-search fa-5x"></i>
							</div>
						<span class="color-white"></span>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center txt-shadow">
							<div class="icon">
								<i class="fa fa-user fa-5x"></i>
							</div>
						<span class="color-white"></span>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center txt-shadow">
							<div class="icon">
								<i class="fa fa-paint-brush fa-5x"></i>
							</div>
						<span class="color-white"></span>
						</div>
					</div>
			</div>		
		</div>
	</section>
	<!-- /Section: separator -->
	
	
	<!-- Section: gallery -->
    <section id="gallery" class="home-section text-center bg-gray">

			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
						<h2>Our Painting Gallery</h2>
						<p></p>
					</div>
					</div>
				</div>
			</div>
			</div>

		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
					<div class="wow bounceInUp" data-wow-delay="0.4s">
                    <div id="owl-works" class="owl-carousel">
                        <div class="item"><img src="paint1.jpg" class="img-responsive " alt="img" height="50px" width="70px"></div>
                        <div class="item"><img src="paint2.jpg" class="img-responsive " alt="img"></div>
                        <div class="item"><img src="paint3.jpg" class="img-responsive " alt="img"></div>
                        <div class="item"><img src="paint4.jpg" class="img-responsive " alt="img"></div>
                        <div class="item"><img src="paint5.jpg" class="img-responsive " alt="img"></div>
                        <div class="item"><img src="paint6.jpg" class="img-responsive " alt="img"></div>
                        <div class="item"><img src="paint7.jpg" class="img-responsive " alt="img"></div>
                        <div class="item"><img src="paint.jpg" class="img-responsive " alt="img"></div>
                        <div class="item"><img src="paint8.jpg" class="img-responsive " alt="img"></div>
                        <div class="item"><img src="paint9.jpg" class="img-responsive " alt="img"></div>
                    </div>
					</div>
                </div>
            </div>
		</div>
	</section>
	<!-- /Section: services -->
	
<div id= "myModal" class="modal fade" role = "dialog"> 
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class = "modal-title"> SIGN UP AS </h4>
        	</div>
        <div class = "modal-body">
        	<form class = "form-horizontal">
        	<div class = "form-group">
        	<div class="container">
        	<div class="row">
        	<br>
    			<p style="padding: 20px;"></style> New Artist? Not to worry Sign Up here! <a href="signup.php"> Artist Sign Up </a> </p>
    			<br><br>
            <p style="padding: 20px;"> New Customer? Not to worry Sign Up here!  <a href="signup_cus.php"> Customer Sign Up </a> </p>
     	    </div>
     	</div>
     	</div>
        	
        	</form>
        </div>
        <div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
        </div>
	</div>
</div>
</div>

	

	<!-- Section: contact -->
    <section id="contact" class="home-section text-center"> 
		 <div class="heading-contact"> 
			 <div class="container"> 
			 <div class="row"> 
				 <div class="col-lg-8 col-md-offset-2"> 
					
					<div class="section-heading"> 
					 <div class="wow bounceInDown" data-wow-delay="0.4s">
					 <h2>Reach Us!</h2> 
					 </div> 
					 <p class="wow lightSpeedIn" data-wow-delay="0.3s">Contact Us through Email</p> 
					 </div>
					
				 </div> 
			 </div> 
			 </div> 
		 </div> 

		 
		<div class="container">
         <div class="row">
        <div class="col-lg-8 col-md-offset-2">
            <div class="form-wrapper marginbot-50">
     
                <form id="contact-form" action="" method="post" role="form" class="contactForm">
                    <div class="form-group">
                    	<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="mail" id="mail" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="text" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validation"></div>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" data-rule="minlen:4" data-msg="Enter Phone Number" />
                        <div class="validation"></div>
                    </div>                 
                    <div class="text-center"><button type="submit" class="btn btn-skin btn-block" name="con_action">Send Message</button></div>
                     <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                </form>
            </div>
        </div>
    </div>	
		</div>

		 <?php
        if(isset($_POST['con_action'])){
          $conn_con = mysqli_connect("localhost","root","cutepanda","art_gallery");
          if (!$conn_con) {
            die("Connection failed: " . mysqli_connect_error());
          }
          $name = $_POST['name'];
          $mail = $_POST['mail'];
          $text = $_POST['text'];
          $phone = $_POST['phone'];
          $query_con = mysqli_query($conn_con,"insert into contact(CNAME,EMAIL,MESSAGE,PHONE) values ('".$name."','".$mail."','".$text."','".$phone."')");
        }
      ?>
	</section>
	<!-- /Section: contact -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<p>&copy; Alpha Art Gallery</p>
                    <div class="credits">
                        <!-- 
                            All the links in the footer should remain intact. 
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Lonely
                        -->
                       
                    </div>
				</div>
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.sticky.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    
</body>
</html>
