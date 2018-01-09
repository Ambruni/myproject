<html> 
<head>
  <link href="css/icon.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <link href="css/icon.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js" ></script>
</head>
<body>
<br>
    <div class="container">
      <a href="logout.php" class="btn btn-info btn-lg" style="float: right;">
      <span class="glyphicon glyphicon-log-out" ></span> Log Out </a>
    </div>

 <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<br>
 <div class="container z-depth-2">
<div style="padding: 15px">
<h2 align='center'><strong>ADD PAINTINGS</strong></h2>
<?php
if(isset($_POST['action']))
	if(empty($_POST['pname'])||empty($_POST['pprice'])||empty($_POST['quantity'])||empty($_POST['date'])||empty($_POST['artist_id']))
	{
		echo '<script language="javascript">';
		echo 'alert("Input all the feilds")';
		echo '</script>';
	}
	else
	{
		$pname = $_POST['pname'];
		$pprice = intval($_POST['pprice']);
		$quantity =intval($_POST['quantity']);
		$date = $_POST['date'];
		$artist_id =intval($_POST['artist_id']);
		$conn = mysqli_connect("localhost","root","cutepanda","art_gallery");
		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
    $target_dir = 'uploads/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$target_file_comp = $_SERVER['DOCUMENT_ROOT'].'/miniproject/new/'.$target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if($check !== false) {
        echo 'File is an image - ' . $check['mime'] . '.';
        $uploadOk = 1;
    } else {
        echo 'File is not an image.';
        $uploadOk = 0;
    }
    if (file_exists($target_file)) {
    echo 'Sorry, file already exists.';
    $uploadOk = 0;
}
// Check file size
if ($_FILES['fileToUpload']['size'] > 5000000000) {
    echo 'Sorry, your file is too large.';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg'
&& $imageFileType != 'gif' ) {
    echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo 'Sorry, your file was not uploaded.';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo 'The file '. basename( $_FILES['fileToUpload']['name']). ' has been uploaded.';
            $s = "insert into painting (ARTIST_ID,PNAME,PPRICE,QUANTITY,CREATED_DATE,IMAGE_PATH) values ('".$artist_id."','".$pname."',".$pprice.",'".$quantity."','".$date."','".$target_file_comp."')";
            $query = mysqli_query($conn,$s);
        } else {
        echo 'Sorry, there was an error uploading your file.';
    }
}
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
       <link href="css/icon.css" rel="stylesheet">
       <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
       <link href="css/icon.css" rel="stylesheet">
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body>
     <div class="row">
    <form class="col s12" method="post" enctype="multipart/form-data">

    	 <div class="row">
        <div class="input-field col s6">
          <input id="artist_id" type="text" class="validate" name="artist_id">
          <label for="artist_id"> Artist ID</label>
        </div>
      </div>

         <div class="row">
      <div class="input-field col s6">
          <input id="pname" type="text" class="validate" name="pname">
          <label for="pname">Painting Name</label>
        </div>
        </div>

      <div class="row">
        <div class="input-field col s6">
          <input id="pprice" type="text" class="validate" name="pprice">
          <label for="pprice"> Painting Price</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s6">
          <input id="quantity" type="text" name="quantity">
          <label for="quantity">Quantity</label>
        </div>
        </div>
       

         <div class="row">
      <div class="input-field col s6">
          <input id="date" type="text" class="validate" name="date">
          <label for="date">Date (YYYY/MM/DD)</label>
        </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
             Select image to upload:
   <br> <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <!--   <input type="submit" class = "btn btn-info btn-lg" value="Upload Image" name="submit"> -->
          </div>
        </div>
         <button class="btn waves-effect waves-light col s3 offset-s9 pink" type="submit" name="action" style="float: right;">Submit
          <i class="material-icons right">send</i>
  </button><br>
    </form>
  </div>
<!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
    <!-- Select image to upload: -->
   <!-- <br> <input type="file" name="fileToUpload" id="fileToUpload"> -->
  <!-- <br>  <input type="submit" class = "btn btn-info btn-lg" value="Upload Image" name="submit"> -->
<!-- </form>  -->

<br> <hr>
  <div class="container z-depth-2" id="delcu">
      <div style="padding: 15px">
        <h2 align='center'><strong>Delete A Painting</strong></h2>
        <form method='post'>
          <div class='row'>
            <div class='input-field'>
              <input id='del_painting' type='text' class='validate' name='del_painting'>
              <label for='del_painting'>Painting ID</label>
            </div>
          </div>
          <button class='btn waves-effect waves-light col s3 offset-s9 pink' type='submit' name='deletep'>Delete
          <i class='material-icons right'></i></button>
        </form>
      </div>
    </div>
  
<?php
if(isset($_POST['deletep']))
  if (empty($_POST['del_painting'])) {
    echo "<script type='text/javascript'>alert('Enter Painting ID')</script>";
  }
  else{
    $conn=mysqli_connect("localhost","root","cutepanda","art_gallery");
    $q1 = mysqli_query($conn,"select * from painting where PAINT_ID = ".intval($_POST['del_painting'])."");
    $q1_row = mysqli_fetch_assoc($q1);
    $fname = $q1_row['IMAGE_PATH'];
    unlink($fname);
    mysqli_query($conn,"delete from painting where PAINT_ID = ".$_POST['del_painting']."");
    echo "<script type='text/javascript'>alert('".$_POST['del_painting']." deleted')</script>";
  }
?> <br> <hr>
<div class="container" ">
      <a href="artmain.php" class="btn btn-info btn-lg" style="float: bottom;">
      <span class="glyphicon glyphicon-chevron-left"></span> Go Back </a>
    </div>
</body>
</html>
