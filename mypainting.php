<?php
session_start();
if ($_SESSION['login_user'] == "") {
	header('location:index.html');
}
$user=$_SESSION['login_user'];
$conn = mysqli_connect("localhost","root","cutepanda","art_gallery");
if (!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}

$query=mysqli_query($conn,"select * from artist where ARTIST_USERNAME='".$user."'");
$row=mysqli_fetch_assoc($query);
$uid=$row['ARTIST_ID'];
?>



<html>
<head>
	<head>
  <link href="css/icon.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <link href="css/icon.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js" ></script>
<br>
  <div class="container">
      <a href="logout.php" class="btn btn-info btn-lg" style="float: right;">
      <span class="glyphicon glyphicon-log-out" ></span> Log Out </a>
    </div>

 <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<br>

    <style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>

</head>
<body>
<ul>
  <li><a href="#home" class="glyphicon glyphicon-home">Home</a></li>
  <li><a class="active" href="mypainting.php">My Paintings</a></li>
  <li><a href="exhi.php">Exhibition</a></li>
  <li><a href="gall.html">View Other Paintings</a></li>
  <li><a href="manage_painting">Manage Paintings</a></li>
</ul>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">

  

<div class="container" id="mypainting">
<div style="padding: 15px;">
 <h2><center> <strong> My Paintings</strong></center></h2>
  <?php
  $conn = mysqli_connect("localhost","root","cutepanda","art_gallery");
    $mypainting=mysqli_query($conn, "select IMAGE_PATH from painting where ARTIST_ID=".$uid."");
    while ($mypainting_row=mysqli_fetch_array($mypainting) )
    {
    	$str=$mypainting_row['IMAGE_PATH'];
    	$arr=explode("/",$str);
      echo "<img src = '".$arr[5]."/".$arr[6]."'width='30px' height='150px' style = 'margin: 10px'>";
    }
  ?>
</div>
</div>

<br> <hr>
<div class="container" ">
      <a href="artmain.php" class="btn btn-info btn-lg" style="float: bottom;">
      <span class="glyphicon glyphicon-chevron-left"></span> Go Back </a>
    </div>

</body>
</html>