<?php
$host = 'host';
$user = 'user';
$password = 'password';
$database = 'database';

$con = mysql_connect($host, $user, $password);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($database, $con) or die('Error while selecting: ' . mysql_error() . ' Error No.: '. mysql_errno()); 

$insertion = "INSERT INTO Answers (Item1, Item2, Item3, Item4, Item5, Item6, Item7, Item8, Item9, Item10, Item11, Item12, Item13, Item14, Item15, Item16, Item17, Item18, Item19, Item20) VALUES ('$_POST[Item1]','$_POST[Item2]','$_POST[Item3]','$_POST[Item4]','$_POST[Item5]','$_POST[Item6]','$_POST[Item7]','$_POST[Item8]','$_POST[Item9]','$_POST[Item10]','$_POST[Item11]','$_POST[Item12]','$_POST[Item13]','$_POST[Item14]','$_POST[Item15]','$_POST[Item16]','$_POST[Item17]','$_POST[Item18]','$_POST[Item19]','$_POST[Item20]');";

if (!mysql_query($insertion, $con))
  {
  die('Error while inserting: ' . mysql_error() . ' Error No.: '. mysql_errno());
  }
echo "Vielen Dank für Ihre Teilnahme!";

mysql_close($con);
?>