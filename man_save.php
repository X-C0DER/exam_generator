<?php
include "funcs.php";
start();

if(isset($_POST["update"])){
	$data = s($_POST["data"]);
	$eid = (int)$_POST["eid"];
	$db->query("UPDATE exam_manual SET ExamString = \"$data\" WHERE ExamID = $eid");
	exit;
}

$title = s($_POST["title"]);
$data = s($_POST["exam_str"]);
$course = (int)$_POST["course"];
$uid = $_SESSION["user_id"];

$db->query("INSERT INTO exam_manual(ExamTitle, ExamString, CourseID, UserID) VALUES (\"$title\", \"$data\", $course, $uid)");

$_SESSION["man_exam_add"] = 1;
redirect_to("manual.php");
?>