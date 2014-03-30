<?php
error_reporting(0);
session_start();

$_session = array();
session_destroy();

header("location: index.php");

?>