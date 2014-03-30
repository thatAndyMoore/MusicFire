<?php
error_reporting(0);
$host = 'localhost';
$user = 'root';
$passwd = '';
$database = 'groupsite';
$table_acct = 'accounts';
$table_cust = 'customer';
$table_bill = 'billing';

$username = $_POST['username'];
$password = $_POST['password'];


$first = $_POST['first'];
$middle = $_POST['middle'];
$last = $_POST['last'];
$email = $_POST['email'];


$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$ccname = $_POST['ccname'];
$ccnum = $_POST['ccnum1'].$_POST['ccnum2'].$_POST['ccnum3'].$_POST['ccnum4'];
$ccdate = $_POST['month'].$_POST['year'];
$cid = $_POST['cid'];

$connect = mysql_connect($host, $user, $passwd);
mysql_select_db($database);
$query1 = "INSERT INTO $table_cust VALUES (0,'$first','$middle','$last','$email')";
$selquery = "SELECT CustID FROM $table_cust where email='$email'";

print '<br><font size="4" color="blue">';
	if (mysql_query($query1, $connect))
	{

	}
	else
	{
			print "<body style=\"background-image:url('images/background.jpg')\"/>";
			print "<script> alert(\"Registration failed! Please try again.\"); window.location.href=\"registration.html\";</script>";
	}
	$added = @mysql_query($selquery);
	$custidarray = mysql_fetch_array($added, MYSQL_NUM);
	$custid = $custidarray[0];

	$query2 = "INSERT INTO $table_acct VALUES (0,'$username',SHA('$password'), '$custid')";
	$query3 = "INSERT INTO $table_bill VALUES (0,'$add1','$add2','$city','$state','$zip','$ccname','$ccnum','$ccdate','$cid', '$custid')";

	if (mysql_query($query2, $connect))
		{

		}
	else
		{
			print "<body style=\"background-image:url('images/background.jpg')\"/>";
			print "<script> alert(\"Registration failed! Please try again.\"); window.location.href=\"registration.html\";</script>";
	}
	if (mysql_query($query3, $connect))
		{
			print "<body style=\"background-image:url('images/background.jpg')\"/>";
			print "<script> alert(\"Thank you for registering!\"); window.location.href=\"index.php\";</script>";
		}
	else
		{
			print "<body style=\"background-image:url('images/background.jpg')\"/>";
			print "<script> alert(\"Registration failed! Please try again.\"); window.location.href=\"registration.html\";</script>";
	}

mysql_close ($connect);
?>
