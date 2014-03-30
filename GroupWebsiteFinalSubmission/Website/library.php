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

$connect = mysql_connect($host, $user, $passwd);
mysql_select_db($database);
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<html lang="en">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>MusicFire - User Library</title>
<body>
<header>
<a href="index.php"><img src="images/logo.png"/></a>
</header>
<content>

<?php
include 'loggedin.php';
print "<p><h2>Your Library</h2></p>";
print "<table>";
$orderquery = "SELECT * FROM $table_order WHERE CustID='$custid'";
	$orderresults = @mysql_query ($orderquery);
while($orders = mysql_fetch_array($orderresults, MYSQL_NUM))
{
	$ordernum = $orders[0];
	$songquery = "SELECT * FROM $table_sale WHERE OrderID='$ordernum'";
		$songresults = @mysql_query ($songquery);
	while($songs = mysql_fetch_array($songresults, MYSQL_NUM))
	{
		$songid = $songs[1];
		$songinfoquery = "SELECT * FROM $table_song WHERE SongID='$songid'";
			$songinforesults = @mysql_query ($songinfoquery);
		while($songinfo = mysql_fetch_array($songinforesults, MYSQL_NUM))
		{
			$artid = $songinfo[1];
			$songname = $songinfo[3];
			$songfile = $songinfo[4];
			$artistquery = "SELECT * FROM $table_art WHERE ArtistID='$artid'";
				$artistresults = @mysql_query ($artistquery);
				$artistinfo = mysql_fetch_array($artistresults, MYSQL_NUM);
					$artistname = $artistinfo[1];
			print "<tr><td><art>$artistname</art> - $songname</td><td><a href=\"music/$songfile\" download=\"$songname\"><input type=\"button\" value=\"Download\"></a></td></tr>";
		}
	}
}
?>
