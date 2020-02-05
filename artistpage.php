
  <?php
  session_start();
  if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
      $error = "Username or Password is invalid";
    }
    else {
      $username=$_POST['username'];
      $password=$_POST['password'];
      $conn = mysqli_connect("localhost","root","*********","art_gallery");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $query = mysqli_query($conn,"select * from artist where ARTIST_PASSWORD='$password' AND ARTIST_USERNAME='$username'");
      $rows = mysqli_num_rows($query);
      if ($rows == 1) {
        $_SESSION['login_user']=$username;
        header('location: artmain.php');
      } 
      else {
        $error = "Username or Password is invalid";
        echo '<script language="javascript">';
        echo 'alert("Username or Password is invalid")';
        echo '</script>';
      }
      mysqli_close($conn);
    }
  }
?>


<html>
  <head>
    <link href="css/icon.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <link href="css/icon.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script> 
    <p><h2><strong><center>ARTIST LOGIN</center></h2></strong></p> 
    <br><br>  
    <div class="container">  
      <div class="row">
        <form class="col s6" method="post">
          <div class="row">
            <div class="input-field col s6">
              <input id="username" type="text" class="validate" name="username">
              <label for="username">UserName</label>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Password</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light col s3 offset-s9 pink" type="submit" name="submit">Submit
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
