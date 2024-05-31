<?php
include "funcs.php";

start();

$course = (int)$_POST["course"];
$type1 = (int)$_POST["type1"];
$type2 = (int)$_POST["type2"];
$type3 = (int)$_POST["type3"];

if(!isset($_POST["chapter"])){
	$_SESSION["exam_gen_error"] = 2;
	redirect_to("index.php");
}

$vals  = implode(",", array_map("intval", $_POST["chapter"]));

function num_q($t){
	global $db, $vals, $course;
	$r = $db->query("SELECT * FROM questions WHERE CourseID=$course AND Chapter IN ($vals) AND QuestionType=$t");
	return mysqli_num_rows($r);
}

function get_q($t, $l){
	global $db, $vals, $course;
	$r = $db->query("SELECT * FROM questions WHERE CourseID=$course AND Chapter IN ($vals) AND QuestionType=$t ORDER BY RAND() LIMIT $l"); // Very Slow Query ...
	return $r;
}

if(num_q(1) < $type1 || num_q(2) < $type2 || num_q(3) < $type3 || !($type1+$type2+$type3)){
	$_SESSION["exam_gen_error"] = 1;
	redirect_to("index.php");
}

$res = array(get_q(1, $type1), get_q(2, $type2), get_q(3, $type3));
$exam_r = $db->query("INSERT INTO exam (CourseID, UserID) VALUES ($course, ".$_SESSION["user_id"].")");
$exam_id = $db->insert_id;

for ($i=0; $i < 3 ; $i++)
	while($row = $res[$i]->fetch_assoc())
		$db->query("INSERT INTO examquestions (ExamID, QuestionID) VALUES($exam_id, ".$row["QuestionID"].")");

$_SESSION["exam_gen"] = 1;
redirect_to("index.php");
?>