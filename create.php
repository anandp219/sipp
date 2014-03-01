<?php

require('header.inc');

$url=$_GET['url'];

$url=trim($url);

$const="www.sipp.tk/";

//echo $url."<br/>";
$url=str_replace("http://","",$url);
$url=str_replace("https://","",$url);
//echo $url."<br/>";
if(!get_magic_quotes_gpc())

{

$url=addslashes($url);

}

@$db=new mysqli("mysql3.000webhost.com","a7264348_sipp2","london109","a7264348_sipp2");

if(mysqli_connect_errno())

{

echo "error:could not connect to database<br/>";

require('footer.inc');

exit;

}

$query="select max(id) from urls";

$result=$db->query($query);

$num=$result->num_rows;

//echo $num."<br/>";

$row=$result->fetch_row();

$prevmax=$row[0];

//echo $prevmax."<br/>";

$arr=array('0','0','0','0','0','0');

$prevmax=$prevmax+1;

$mod=$prevmax%61;

$div=$prevmax/61;

$div=intval($div);

for($i=0;$i<$div;$i=$i+1)

$arr[$i]='Z';

//echo $div."<br/>";

//echo $mod."<br/>";

if($mod>=1&&$mod<=9)

$arr[$div]=$mod;

else if($mod>=10&&$mod<=35)

{

//echo "here"."<br/>";

$char='a';

$mod=$mod-10;

for($i=0;$i<$mod;$i++)

++$char;

$arr[$div]=$char;

}

else

{

$char='A';

$mod=$mod-36;

for($i=0;$i<$mod;$i++)

++$char;

$arr[$div]=$char;

}
//$short=intval($url,36);
$short=$prevmax;
$short=base_convert($short,10,36);
$shorturl=$const.$short;

echo "The shorten url for ".$url." is ".$shorturl."<br/>"; 

$query="insert into urls

(url,short) values

('$url','$short')";

$db->query($query);

$query="select * from urls where short='$short'";

$result=$db->query($query);

$num=$result->num_rows;

$row=$result->fetch_assoc();


//echo $row['id']."<br/>".$row['url']."<br/>".$row['short'];
$db->close();

require('footer.inc');

?>