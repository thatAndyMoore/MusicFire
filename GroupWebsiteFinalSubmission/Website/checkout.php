<?php
error_reporting(0);
session_start();
$username = $_SESSION['name'];
$userid = $_SESSION['id'];
$custid = $_SESSION['cust'];
$host = 'localhost';
$user = 'root';
$passwd = '';
$database = 'groupsite';
$table_acct = 'accounts';
$table_cust = 'customer';
$table_bill = 'billing';
$table_art = 'artists';
$table_alb = 'albums';
$table_song = 'songs';
$table_order = 'orders';
$table_sale = 'sales';
$today = date("Y-m-d H:i:s");

$connect = mysql_connect($host, $user, $passwd);
mysql_select_db($database);

$link = $_GET['link'];
$songid = $link;

$albget = "SELECT AlbumID FROM $table_song WHERE SongID='$songid'";
$thealb = @mysql_query($albget);
	$albarray = mysql_fetch_array($thealb, MYSQL_NUM);
	$albid = $albarray[0];

$orderquery = "INSERT INTO $table_order VALUES(0,'$custid', '$today')";
mysql_query($orderquery, $connect);

$orderget = "SELECT OrderID FROM $table_order WHERE orderdate='$today'";
$neword = @mysql_query($orderget);
	$orderarray = mysql_fetch_array($neword, MYSQL_NUM);
	$orderid = $orderarray[0];

$salequery = "INSERT INTO $table_sale VALUES('$orderid','$songid')";

if (mysql_query($salequery, $connect))
{
	print "<body style=\"background-image:url('images/background.jpg')\"/>";
	print "<script> alert(\"Thank you for your purchase!\"); window.location.href=\"library.php\";</script>";
}
else
{
	print "<body style=\"background-image:url('images/background.jpg')\"/>";
	print "<script> alert(\"Purchase failed! Please try again.\"); window.location.href=\"album.php?link=$albid\";</script>";
}
?>







