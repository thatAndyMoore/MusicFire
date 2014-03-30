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
<title>MusicFire - Album Info</title>

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
$album = $link;

$queryalb = "SELECT * FROM $table_alb WHERE AlbumID='$album'";
$albumresult = mysql_query($queryalb);
	$row = mysql_fetch_array($albumresult, MYSQL_NUM);
		$albumID= $artrow[0];
		$albumName = $row[1];
		$albumDate = $row[2];
		$artistid = $row[3];
		$albumArt = $row[4];
$artistnameinit = "SELECT * FROM $table_art WHERE ArtistID='$artistid'";
$artistresult = mysql_query($artistnameinit);
	$artistrow = mysql_fetch_array($artistresult, MYSQL_NUM);
		$artistname = $artistrow[1];


print "<h3>$albumName</h3>";
print "<table>";
print "<tr><td><img src=\"images/albums/$albumArt\"/></td><td>Artist: $artistname</br>Released: $albumDate</td></tr>";
print "</table>";

$songs = "SELECT * FROM $table_song WHERE AlbumID='$album'";
	$songresults = mysql_query($songs);

print "<table>";
while($songrow = mysql_fetch_array($songresults, MYSQL_NUM))
{
	$songid = $songrow[0];
	$songname = $songrow[3];
	$songloc = $songrow[5];

	print "<tr><td>$songname</td><td><audio controls><source src=\"music/demos/$songloc\" type=\"audio/ogg\"></audio></td><td>";
	if($username)
	{
		print "<a href=\"checkout.php?link=$songid\"><input type=\"button\" value=\"$.99\"/></a></tr>";
	}
}
print "</table>";
?>
</content>
</body>
</html>