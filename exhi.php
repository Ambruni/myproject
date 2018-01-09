<html>
<head>
  <link href="css/icon.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <link href="css/icon.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
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


<?php
session_start();
$user=$_SESSION['login_user'];
$conn = mysqli_connect("localhost","root","cutepanda","art_gallery");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
$query=mysqli_query($conn,"select * from artist where ARTIST_USERNAME='".$user."'");
$row=mysqli_fetch_assoc($query);
$uid=$row['ARTIST_ID'];
?>

<br><br>

<div class="container z-depth-2">
<div style="padding: 15px;">
<h2 align='center'><strong>EXHIBITION</strong></h2>
 <br>
 <?php
 echo "<table class='bordered'>
 <th>ARTIST ID</th>
 <th>ARTIST NAME</th>
 <th>ID</th>
 <th>EXHIBITION_START_DATE</th>
 <th>EXHIBITION_END_DATE</th>";
 
  $result_con = mysqli_query($conn,"select * from EXHIBITION ");
while($row_con = mysqli_fetch_array($result_con))
{
  $var = mysqli_query($conn, "select ARTIST_ID from EXHIBITION_ARTIST  where ID= '".$row_con['ID']."'");
  $var_row = mysqli_fetch_array($var);
  $res = mysqli_query($conn,"select ANAME from artist where ARTIST_ID = '".$var_row['ARTIST_ID']."'");
  $res_row = mysqli_fetch_array($res);
echo "<tr>";
echo "<td>" . $var_row['ARTIST_ID'] . "</td>";
echo "<td>" . $res_row['ANAME'] . "</td>";
echo "<td>" . $row_con['ID'] . "</td>";
echo "<td>" . $row_con['START_DATE'] . "</td>";
echo "<td>" . $row_con['END_DATE'] . "</td>";
echo "</tr>";
}
echo "</table></br></br></br></br>";
?>
</div>
</div>

<div class="container">
	<h2>Change Dates</h2>
	<div class="row">
		<form class="form" method="post">
			<div class='input-field'>
              <input id='id' type='text' class='validate' name='id'>
              <label for='id'>Exhibition ID</label>
            </div>
			<div class='input-field'>
              <input id='start_dat' type='text' class='validate' name='start_dat'>
              <label for='start_dat'>Start Date</label>
            </div>
			<div class='input-field'>
              <input id='end_dat' type='text' class='validate' name='end_dat'>
              <label for='end_dat'>End Date</label>
            </div>
			<button class='btn waves-effect waves-light col s3 offset-s9 pink' type='submit' name='change_exhi'>Change
          <i class='material-icons right'></i></button>
          <?php
          	if (isset($_POST['change_exhi'])) {
          		if(empty($_POST['end_dat']))
          		mysqli_query($conn,"CALL EXHI_START('".$_POST['start_dat']."',".$_POST['id'].")");
          		elseif(empty($_POST['start_dat']))
          			mysqli_query($conn,"CALL EXHI_END('".$_POST['end_dat']."',".$_POST['id'].")");
          		else{
          			mysqli_query($conn,"CALL EXHI_START('".$_POST['start_dat']."',".$_POST['id'].")");
          			mysqli_query($conn,"CALL EXHI_END('".$_POST['end_dat']."',".$_POST['id'].")");
          		}
          	}
          ?>
		</form>
		</div>
	</div>

<div class="container">
	<h2>Conduct Exhibition</h2>
	<div class="row">
		<form class="form" method="post">
			<div class='input-field'>
              <input id='start' type='text' class='validate' name='start_date'>
              <label for='start_date'>Start Date</label>
            </div>
			<div class='input-field'>
              <input id='end' type='text' class='validate' name='end_date'>
              <label for='end_date'>End Date</label>
            </div>
			<div class='input-field'>
              <input id='loc' type='text' class='validate' name='location'>
              <label for='location'>Location</label>
            </div>
			<button class='btn waves-effect waves-light col s3 offset-s9 pink' type='submit' name='add_exhi'>Add
          <i class='material-icons right'>add</i></button>
          <?php
          	if (isset($_POST['add_exhi'])) {
          		mysqli_query($conn,"insert into exhibition(START_DATE,END_DATE,LOCATION) values ('".$_POST['start_date']."','".$_POST['end_date']."','".$_POST['location']."')");
          		$qq = mysqli_query($conn,"select MAX(ID) as ID from exhibition");
          		$qqr = mysqli_fetch_assoc($qq);
          		$idd = $qqr['ID'];
          		mysqli_query($conn,"insert into exhibition_artist values(".$idd.",".$uid.")");
          	}
          ?>
		</form>
		</div>
	</div>
<br> <hr>
      <a href="artmain.php" class="btn btn-info btn-lg" style="float: bottom;">
      <span class="glyphicon glyphicon-chevron-left"></span> Go Back </a>
 </body>
 </html>