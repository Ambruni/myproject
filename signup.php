<?php
if(isset($_POST['action']))
	if(empty($_POST['first_name'])||empty($_POST['username'])||empty($_POST['password'])||empty($_POST['phone'])||empty($_POST['email'])||empty($_POST['experience'] || empty($_POST['categ_id'])))
	{
		echo '<script language="javascript">';
		echo 'alert("Input all the feilds")';
		echo '</script>';
	}
	else
	{
		$artist_username = $_POST['username'];
		$artist_password = $_POST['password'];
		$email = $_POST['email'];
		$aname = $_POST['first_name'];
		$phone = $_POST['phone'];
    $categ_id = $_POST['categ_id'];
    $experience = $_POST['experience'];
		//$artist_id =intval($_POST['artist_id']);
		$conn = mysqli_connect("localhost","root","cutepanda","art_gallery");
		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		$s = "insert into artist (ANAME,PHONE,EMAIL, CATEG_ID,EXPERIENCE ,ARTIST_USERNAME,ARTIST_PASSWORD) values ('".$aname."',".$phone.",'".$email."','".$categ_id."','".$experience."','".$artist_username."','".$artist_password."')";
		$query = mysqli_query($conn,$s);
	}
?>
<html class="no-js">
    <head>
      <meta charset='UTF-8'>
      <style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(simple/images/loader-64x/Preloader_6.gif) center no-repeat #fff;
}
</style>
<script src="js/jq.js"></script>
 <script>
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("500");;
  });
</script>
       <script type="text/javascript" src="js/jquery.js"></script>
             <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
      <link href="" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <link href="css/icon.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body>
     <div class="row">
    <form class="col s12" method="post">
      <div class="row">
        <div class="input-field col s4">
          <input id="first_name" type="text" class="validate" name="first_name">
          <label for="first_name">First Name</label>
        </div>
      </div>
            <div class="row">
        <div class="input-field col s6">
          <input id="email" type="email" class="validate" name="email">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="categ_id" type="text" class="validate" name="categ_id">
          <label for="categ_id"> Category ID</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s6">
          <input id="phone" type="text" name="phone">
          <label for="phone">Phone</label>
        </div>
        </div>
        <div class="row">
      <div class="input-field col s6">
          <input id="username" type="text" class="validate" name="username">
          <label for="username">Username</label>
        </div>
        </div>

         <div class="row">
      <div class="input-field col s6">
          <input id="experience" type="text" class="validate" name="experience">
          <label for="experience">Experience</label>
        </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light col s3 offset-s9 pink" type="submit" name="action">Submit <i class="material-icons right"></i>
  </button>
    </form>
  </div>
    </body>
    </html>