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

$boughtquery = "SELECT * FROM $table_order WHERE CustID='$custid' ORDER BY orderdate DESC";
	$boughtresults = mysql_query($boughtquery);

	while ($bought = mysql_fetch_array($boughtresults, MYSQL_NUM))
	{
		$orderid = $bought[0];
		$indivbought = "SELECT * FROM $table_sale WHERE OrderID='$orderid'";
			$indivresults = mysql_query($indivbought);
		while ($indiv = mysql_fetch_array($indivresults, MYSQL_NUM))
		{
			$songid = $indiv[1];
			$persquery = "SELECT DISTINCT AlbumID FROM $table_song WHERE SongID='$songid'";
				$persresults = mysql_query($persquery);
			while ($pers = mysql_fetch_array($persresults, MYSQL_NUM))
			{
				$albid = $pers[0];
				$albquery = "SELECT * FROM $table_alb WHERE AlbumID='$albid'";
					$albresults = mysql_query($albquery);
				while ($albums = mysql_fetch_array($albresults, MYSQL_NUM))
				{
					$albumid = $albums[0];
					$albimg = $albums[4];
					if ($num < $six)
					{
						print "<a href=\"album.php?link=$albumid\"><img src=\"images/albums/$albimg\"/></a>";
						$num++;
					}
				}
			}
		}

	}
