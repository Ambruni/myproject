

<?php

header("content-type:image/jpeg");

$host = 'localhost';
$user = 'root';
$pass = 'cutepanda';

mysql_connect($host, $user, $pass);

mysql_select_db('art_gallery');

$name=$_GET['name'];

$select_image="select * from PAINTING where PAINTING_NAME='$name'";

$var=mysql_query($select_image);

if($row=mysql_fetch_array($var))
{
 $image_name=$row["imagename"];
 $image_content=$row["imagecontent"];
}
echo $image;

?>

