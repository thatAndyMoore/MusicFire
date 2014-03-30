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

$num = 0;
$six = 6;

$connect = mysql_connect($host, $user, $passwd);
mysql_select_db($database);

$newquery = "SELECT * FROM $table_alb ORDER BY releasedate";
	$newqueryresults = mysql_query($newquery);

while ($albums = mysql_fetch_array($newqueryresults, MYSQL_NUM))
{
		$albid = $albums[0];
		$albimg = $albums[4];
	if ($num < $six)
	{
		print "<a href=\"album.php?link=$albid\"><img src=\"images/albums/$albimg\"/></a>";
		$num++;
	}
}
?>