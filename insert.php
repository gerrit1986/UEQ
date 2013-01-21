<?php
mb_internal_encoding('UTF-8');
$host = 'host';
$user = 'user';
$password = 'password';
$database = 'database';
  
# get credentials, connect to database server and forget password
$con = mysql_connect($host, $user, $password);
unset($password);

# check connection to database server
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

# select database
mysql_select_db($database, $con) or die('Error while selecting: ' . mysql_error() . ' Error No.: '. mysql_errno());

# check whether the UEQ has already been submitted
if ($_COOKIE['submitted'] == 'True')
  {
  die("Sie hatten den Fragebogen bereits abgegeben. Ihre erste Abgabe wird berücksichtigt. Vielen Dank!");
  }

# define insertion and insert to database
$insertion = "INSERT INTO Answers (Item1, Item2, Item3, Item4, Item5, Item6, Item7, Item8, Item9, Item10, Item11, Item12, Item13, Item14, Item15, Item16, Item17, Item18, Item19, Item20) VALUES ('$_POST[Item1]','$_POST[Item2]','$_POST[Item3]','$_POST[Item4]','$_POST[Item5]','$_POST[Item6]','$_POST[Item7]','$_POST[Item8]','$_POST[Item9]','$_POST[Item10]','$_POST[Item11]','$_POST[Item12]','$_POST[Item13]','$_POST[Item14]','$_POST[Item15]','$_POST[Item16]','$_POST[Item17]','$_POST[Item18]','$_POST[Item19]','$_POST[Item20]');";

if (!mysql_query($insertion, $con))
  {
  die("Error while inserting: " . mysql_error() . " Error No.: ". mysql_errno());
  }

# set cookie to prevent multiple submissions
setcookie('submitted', 'True', time()+86400);
echo "Vielen Dank für Ihre Teilnahme!";

# close connection
mysql_close($con);
}
?>
