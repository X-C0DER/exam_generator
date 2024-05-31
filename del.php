<?php
include "funcs.php";
start();
if(!isset($_SESSION["admin"])) redirect_to("index.php");
$db->query("DELETE FROM user WHERE UserID = " . $_GET["id"]);
redirect_to("dashboard.php");
?>