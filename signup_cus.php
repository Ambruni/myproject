<?php
if(isset($_POST['action']))
	if(empty($_POST['cus_name'])||empty($_POST['username'])||empty($_POST['cus_password'])||empty($_POST['phone'])||empty($_POST['email'])||empty($_POST['address']))
	{
		echo '<script language="javascript">';
		echo 'alert("Input all the feilds")';
		echo '</script>';
	}
	else
	{
		$username = $_POST['username'];
		$cus_password = $_POST['cus_password'];
		$email = $_POST['email'];
		$cus_name = $_POST['cus_name'];
		$phone = $_POST['phone'];
    $address = $_POST['address'];
	
		$conn = mysqli_connect("localhost","root","cutepanda","art_gallery");
		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		$r = "insert into customer (CUS_NAME,CUS_PASSWORD,USERNAME,PHONE,EMAIL, ADDRESS) values ('".$cus_name."','".$cus_password."','".$username."',".$phone.",'".$email."','".$address."')";
		$query = mysqli_query($conn,$r);
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script>
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("500");;
  });
</script>
       <script type="text/javascript" src="js/jquery.js"></script>
             <script type="text/javascript" src="materialize/js/materialize.js"></script>
      <link href="css/icon.css" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <link href="css/icon.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body>
     <div class="row">
    <form class="col s12" method="post">
      <!-- <div class="row"> -->
        <!-- <div class="input-field col s6"> -->
          <!-- <input id="cus_id" type="text" class="validate" name="cus_id"> -->
          <!-- <label for="cus_id">Customer ID</label> -->
        <!-- </div> -->
      <!-- </div> -->
      <div class="row">
        <div class="input-field col s6">
          <input id="cus_name" type="text" class="validate" name="cus_name">
          <label for="cus_name">First Name</label>
        </div>
      </div>
          <div class="row">
        <div class="input-field col s6">
          <input id="cus_password" type="password" class="validate" name="cus_password">
          <label for="cus_password">Password</label>
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
          <input id="email" type="email" class="validate" name="email">
          <label for="email">Email</label>
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
          <input id="address" type="text" class="validate" name="address">
          <label for="address">Address</label>
        </div>
        </div>
      
      <button class="btn waves-effect waves-light col s3 offset-s9 pink" type="submit" name="action">Submit <i class="material-icons right">send</i>
  </button>
    </form>
  </div>
    </body>
    </html>