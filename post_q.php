<?php
include "funcs.php";

start();

$course = $_POST["course"];
$type = $_POST["type"];
$chapter = $_POST["chapter"];

for ($i=0; $i < count($_POST["question"]); $i++){
	$question = trim($_POST["question"][$i]);
	$answer = $_POST["answer"][$i];
	$qid = post_q($course, $type, $chapter, $question, (int)$type==3 ? null : $answer);

	if((int)$type == 2){
		post_m(trim($_POST["choice_a"][$i]), $qid);
		post_m(trim($_POST["choice_b"][$i]), $qid);
		post_m(trim($_POST["choice_c"][$i]), $qid);
		post_m(trim($_POST["choice_d"][$i]), $qid);
	}

}

$_SESSION["exam_added"] = 1;
redirect_to("index.php");
?>