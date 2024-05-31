<?php

$db = NULL;

function connect_db(){
	global $db;
	$db = mysqli_connect("localhost", "root", "", "exam_gen");
}

function close_db(){
	global $db;
	mysqli_close($db);
}


function s($s){
	global $db;
	return mysqli_real_escape_string($db, $s);
}

function get_courses(){
	global $db;
	$result = mysqli_query($db, "SELECT * FROM course");
	return $result;
}

function redirect_to($str){
	header("Location: " . $str);
	exit;
}

function h_authenticated($str){
	if(!isset($_SESSION["user_id"]))
		redirect_to($str);
}

function start(){
	session_start();
	connect_db();
	h_authenticated("get-started.php");
}

function post_q($course, $type, $chapter, $question, $answer=null){
	global $db;
	if($answer==null) $answer_r = "NULL"; else $answer_r = (int)$answer;
	$course_r = (int)$course;
	$type_r = (int)$type;
	$chapter_r = (int)$chapter;
	$question_r = s($question);
	$res = $db->query("INSERT INTO questions (CourseID, QuestionType, Chapter, QuestionString, Answer)".
						"VALUES ($course_r, $type_r, $chapter_r, \"$question_r\", $answer_r)");
	if (!$res) die("Server Internal Error");
	return $db->insert_id;
}

function post_m($choice, $qid){
	global $db;
	$db->query("INSERT INTO multiplechoice (MultipleChoiceString, QuestionID) VALUES (\"".s($choice)."\", ".(int)$qid.")");
}

function data_exist($table, $cname, $rname){
	global $db;
	$r = $db->query("SELECT * FROM $table WHERE $cname = '". s($rname)."'");
	return mysqli_num_rows($r) ? true : false;
}

function add_user($name, $username, $email, $password){
	global $db;
	$name_r	= s($name);
	$username_r = s($username);
	$email_r = s($email);
	$pass_r = md5($password);

	$res=$db->query("INSERT INTO user (name, username, email, password)VALUES('$name_r', '$username_r', '$email_r', '$pass_r')");

	if (!$res) die("Server Internal Error");
	return $db->insert_id;
}

function password_match($username, $password){
	global $db;
	$ret = mysqli_fetch_assoc($db->query("SELECT * FROM user WHERE username = '".s($username)."'"));

	if(md5($password) == $ret["Password"]){
		if(!(int)$ret["Activated"]) return -1;
		return (int)$ret["UserID"];
	}
	return 0;
}

function login($user_id){
	global $db;
	if(!isset($_SESSION["user_id"])){
		$_SESSION["user_id"] = $user_id;
		$type = $db->query("SELECT * from user WHERE UserID=" . $user_id)->fetch_assoc()["UserType"];
		if(!$type) $_SESSION["admin"] = 1;
	}
}

function get_user_info_by_id($id){
	global $db;
	return mysqli_fetch_assoc($db->query("SELECT * FROM user WHERE UserID = '".(int)$id."'"));
}

?>