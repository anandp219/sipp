<?php

require('header.inc');

$id=$_GET['slug'];

@$db=new mysqli("mysql3.000webhost.com","a7264348_sipp2","london109","a7264348_sipp2");

if(mysqli_connect_errno())

{

echo "error:could not connect to database<br/>";

require('footer.inc');

exit;

}

$query="select url from urls where short='".$id."'";

$result=$db->query($query);

$row=$result->fetch_assoc();

$url=$row['url'];

$num=$result->num_rows;

echo $url."<br/>";

$zz="http://";

$zz=$zz.$url;
$xz="sipp.tk";
if($num>0)

{

//header("HTTP/1.1 301 Moved Permanently");

header("Location: ".$zz);

//echo "here";

require('footer.inc');

exit;

}

else

{

//header("HTTP/1.1 301 Moved Permanently");

header("Location : ".$xz);

}

$db->close();

require('footer.inc');

?>