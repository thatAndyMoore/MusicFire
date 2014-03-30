<?php
error_reporting(0);
session_start();
$username = $_SESSION['name'];
$host = 'localhost';
$user = 'root';
$passwd = '';
$database = 'groupsite';
$table_art = 'artists';
$table_alb = 'albums';
$table_song = 'songs';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<html lang="en">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>MusicFire - Alphabetically Listing</title>
<body>
<header>
<a href="index.php"><img src="images/logo.png"/></a>
</header>
<content>


<?php
if ($username)
{
	include 'loggedin.php';
}
else
{
	include 'loginscreen.php';
}
?>

Browse:
<letters><a href="browse.php?link=A%">A </a><a href="browse.php?link=B%">B</a> <a href="browse.php?link=C%">C</a> <a href="browse.php?link=D%">D</a> <a href="browse.php?link=E%">E</a> <a href="browse.php?link=F%">F</a> <a href="browse.php?link=G%">G</a> <a href="browse.php?link=H%">H</a> <a href="browse.php?link=I%">I</a> <a href="browse.php?link=J%">J</a> <a href="browse.php?link=K%">K</a> <a href="browse.php?link=L%">L</a> <a href="browse.php?link=M%">M</a> <a href="browse.php?link=N%">N</a> <a href="browse.php?link=O%">O</a> <a href="browse.php?link=P%">P</a> <a href="browse.php?link=Q%">Q</a> <a href="browse.php?link=R%">R</a> <a href="browse.php?link=S%">S</a> <a href="browse.php?link=T%">T</a> <a href="browse.php?link=U%">U</a> <a href="browse.php?link=V%">V</a> <a href="browse.php?link=W%">W</a> <a href="browse.php?link=X%">X</a> <a href="browse.php?link=Y%">Y</a> <a href="browse.php?link=Z%">Z</a><letters></br>

<?php
$connect = mysql_connect($host, $user, $passwd);
mysql_select_db($database);

$link = $_GET['link'];
$letter = $link;

$query = "SELECT * FROM $table_art WHERE artistname LIKE '$letter'";
$artresults = mysql_query ($query);
if ($artresults)
{
	print "Available artists:</p>";
	print "<table>";
	while($artrow = mysql_fetch_array($artresults, MYSQL_NUM))
	{
		$artid = $artrow[0];
		$artist = $artrow[1];
		$albums = "SELECT * FROM $table_alb WHERE ArtistID='$artid'";
			$albresults = mysql_query($albums);
		print "<tr><td><art>$artist</a></art></td></tr>";
		while($albrow = mysql_fetch_array($albresults, MYSQL_NUM))
		{
			$albid = $albrow[0];
			$albart = $albrow[4];
			print "<tr><td><a href=\"album.php?link=$albid\"><img src=\"images/albums/$albart\"/></a></td></tr>";
		}

	}
	print "</table>";
}
?>
</html>