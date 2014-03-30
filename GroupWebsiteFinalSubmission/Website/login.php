<?php
error_reporting(0);
$host = 'localhost';
$user = 'root';
$passwd = '';
$database = 'groupsite';

$username = $_POST['username'];
$password = $_POST['password'];

$connect = mysql_connect($host, $user, $passwd);
mysql_select_db($database);

$query = "SELECT * FROM accounts WHERE username='$username' AND password=SHA('$password')";


$result = mysql_query($query, $connect);
$row = mysql_fetch_array($result, MYSQL_NUM);

if ($row)
{
	session_start();
	$_SESSION['id'] = $row[0];
	$_SESSION['name'] = $row[1];
	$_SESSION['cust'] = $row[3];
	header("location: index.php");
}
else
{
		print "<body style=\"background-image:url('images/background.jpg')\"/>";
		print "<script> alert(\"User does not exist. Returning to Home.\"); window.location.href=\"index.php\";</script>";
}
?>
