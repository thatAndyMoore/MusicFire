<?php
error_reporting(0);
session_start();
$username = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<html lang="en">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>MusicFire</title>
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
<p></p>
</br>
<div id="popular">
Albums from your last six purchases:</br>
<?php
if ($username)
{
	include 'prevpurch.php';
}
else
{
	print "</br><em>&nbsp;&nbsp;&nbsp;You need to be logged in to see this section.</em>";
}
?>
</div>
<div id="new">
New to our site!</br>
<?php
	include 'new.php';
?>
</div>
<div id="recent">
This year's recent releases!</br>
<?php
	include 'recent.php';
?>
</div>
<div id="sale">
Older Classics!</br>
<?php
	include 'old.php';
?>
</div>
</content>
</body>
</html>
