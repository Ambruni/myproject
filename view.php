
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

	$query=mysqli_query($conn,"select * from customer where USERNAME = '".$user."'");
	$row=mysqli_fetch_assoc($query);
	$uid=$row['CUS_ID'];
	?>

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
	<style>
	body {
	margin: 0;
	}

	ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	width: 20%;
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
	<li><a  href=""  class="glyphicon glyphicon-home">Home</a></li>
	<li><a href="gall.html">View Gallery Paintings</a></li>
	<li><a href="order.php">Place My Order</a></li>
	<li><a class="active" href="view.php">View My Order</a></li>
	</ul>


	<div class="container" style="margin-left:25%;padding:1px 16px;height:1000px;">
	<div class="row">
	<div>
	<table class="bordered">
	<tr>
	<th>PAINT ID</th>
	<th>PRICE</th>
	<th>QUANTITY</th>
	<th>IMAGE</th>
	</tr>
	

	<?php
	$mypainting=mysqli_query($conn, "select PAINT_ID,OPRICE,OQUANTITY from painting_order where CUS_ID=".$uid."");
	while ($mypainting_row=mysqli_fetch_array($mypainting) )
	{
	echo "<tr>";
	echo "<td>".$mypainting_row['PAINT_ID']."</td>";
	echo "<td>".$mypainting_row['OPRICE']."</td>";
	echo "<td>".$mypainting_row['OQUANTITY']."</td>";
	$my=mysqli_query($conn, "select IMAGE_PATH from painting where PAINT_ID=".$mypainting_row['PAINT_ID']."");
	$my_row=mysqli_fetch_array($my);
	$str=$my_row['IMAGE_PATH'];
	$arr=explode("/",$str);
	echo "<td>";
	echo "<img src = '".$arr[5]."/".$arr[6]."'width='100px' height='100px'>";
	echo "</td>";
	echo "</tr>";
	}
	?>

	</tr>
	</table>
	</div>
	<br><br><br>
	</body>
	</html>