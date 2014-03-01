<?php
require ('header.inc');
?>
<?php
echo "<form id=\"form1\" action=\"create.php\" method=\"get\"><br/>";
echo "<input type=\"text\" name=\"url\" size=\"100\" maxlength=\"5000\"><br/>";
echo "<input type=\"submit\" id=\"button\" id=\"button\" value=\"Shorten!\"><br/>";
echo "</form>";
?>
<?php
require ('footer.inc');
?>