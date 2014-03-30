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


?>