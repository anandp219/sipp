<?php

require('header.inc');

//$url=$_GET['url'];

//$url=trim($url);

//echo $url."<br/>";

if(!get_magic_quotes_gpc())

{

//$url=addslashes($url);

}

@$db=new mysqli("mysql3.000webhost.com","a7264348_sipp2","london109","a7264348_sipp2");

if(mysqli_connect_errno())

{

echo "error:could not connect to database<br/>";

require('footer.inc');

exit;

}

$query="delete from urls";

$result=$db->query($query); 

$db->close();

require('footer.inc');

?>