<?php
  session_start(); 
   if($_SESSION['login_user']!="Alpha")
    header('location:index.php');
?>




<html>
<head>
  <link href="css/icon.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <link href="css/icon.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
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

  

<!-- VIEW CUSTOMER AND ARTIST -->
<?php
      $conn = mysqli_connect("localhost","root","cutepanda","art_gallery");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      echo "<br><br><br><div class='container z-depth-2' id='view'>
        <div style='padding:15px'>
        <h2 align='center'><strong>VIEW CUSTOMERS</strong></h2>
        <table class='bordered'>
        <tr>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Password</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        </tr>";
      $result = mysqli_query($conn,"select * from customer");
      while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['CUS_ID'] . "</td>";
        echo "<td>" . $row['CUS_NAME'] . "</td>";
        echo "<td>" . $row['CUS_PASSWORD'] . "</td>";
        echo "<td>" . $row['USERNAME'] . "</td>";
        echo "<td>" . $row['PHONE'] . "</td>";
        echo "<td>" . $row['EMAIL'] . "</td>";
        echo "<td>" . $row['ADDRESS'] . "</td>";
        echo "</tr>";
      }
      echo "</table></div></div></br></br></br>"
    ?>

    <?php
      $conn = mysqli_connect("localhost","root","cutepanda","art_gallery");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      echo "<div class='container z-depth-2' id='view'>
        <div style='padding:15px'>
        <h2 align='center'><strong>VIEW ARTISTS</strong></h2>
        <table class='bordered'>
        <tr>
        <th>Artist ID</th>
        <th>Artist Name</th>
        <th>Password</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Category ID</th>
        <th>Experience</th>
        </tr>";
      $result = mysqli_query($conn,"select * from artist");
      while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['ARTIST_ID'] . "</td>";
        echo "<td>" . $row['ANAME'] . "</td>";
        echo "<td>" . $row['ARTIST_PASSWORD'] . "</td>";
        echo "<td>" . $row['ARTIST_USERNAME'] . "</td>";
        echo "<td>" . $row['PHONE'] . "</td>";
        echo "<td>" . $row['EMAIL'] . "</td>";
        echo "<td>" . $row['EXPERIENCE'] . "</td>";
        echo "<td>" . $row['CATEG_ID'] . "</td>";
        echo "</tr>";
      }
      echo "</table></div></div></br></br></br></br>"
    ?>

    





<!-- Delete customer and artist -->
 <div class="container z-depth-2" id="del">
      <div style="padding: 15px">
        <h2 align='center'><strong>Delete An Artist</strong></h2>
        <form method='post'>
          <div class='row'>
            <div class='input-field'>
              <input id='artist_id_del' type='text' class='validate' name='artist_id_del'>
              <label for='artist_id_del'>Artist ID</label>
            </div>
          </div>
          <button class='btn waves-effect waves-light col s3 offset-s9 pink' type='submit' name='delete'>Delete
          <i class='material-icons right'></i></button>
        </form>
      </div>
    </div>
    </br></br></br>

    <div class="container z-depth-2" id="delcu">
      <div style="padding: 15px">
        <h2 align='center'><strong>Delete A Customer</strong></h2>
        <form method='post'>
          <div class='row'>
            <div class='input-field'>
              <input id='customer_id_delcu' type='text' class='validate' name='customer_id_delcu'>
              <label for='customer_id_delcu'>Customer ID</label>
            </div>
          </div>
          <button class='btn waves-effect waves-light col s3 offset-s9 pink' type='submit' name='deletec'>Delete
          <i class='material-icons right'></i></button>
        </form>
      </div>
    </div>
    </br></br></br>


    <?php
if(isset($_POST['delete']))
  if (empty($_POST['artist_id_del'])) {
    echo "<script type='text/javascript'>alert('Enter Artist ID')</script>";
  }
  else{
    mysqli_query($conn,"delete from artist where ARTIST_ID='".$_POST['artist_id_del']."'");
    echo "<script type='text/javascript'>alert('".$_POST['artist_id_del']." deleted')</script>";
  }
?>


<?php
if(isset($_POST['deletec']))
  if (empty($_POST['customer_id_delcu'])) {
    echo "<script type='text/javascript'>alert('Enter Customer ID')</script>";
  }
  else{
    mysqli_query($conn,"delete from customer where CUS_ID='".$_POST['customer_id_delcu']."'");
    echo "<script type='text/javascript'>alert('".$_POST['customer_id_delcu']." deleted')</script>";
  }
?>

<div class="container z-depth-2">
<div style="padding: 15px">
<h2 align='center'><strong>EXHIBITION</strong></h2>
 <br>
 <?php
 echo "<table class='bordered'>
 <th>ARTIST ID</th>
 <th>ARTIST NAME</th>
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
echo "<td>" . $row_con['START_DATE'] . "</td>";
echo "<td>" . $row_con['END_DATE'] . "</td>";
echo "</tr>";
}
echo "</table></br></br></br></br>";
?>
</div>
</div>
</body>
</html>

