<?php 
include "funcs.php";
start();

if(!isset($_GET["e"]) || !data_exist("Exam", "ExamID", (int)$_GET["e"]))
	redirect_to("index.php");

if(isset($_GET["del"])){
	$db->query("DELETE FROM exam WHERE ExamID = ". (int)$_GET["e"]);
	$_SESSION["exam_deleted"] = 1;
	redirect_to("index.php");
}

$last_page = (
			isset($_SERVER['HTTP_REFERER']) && 
			(basename(parse_url($_SERVER['HTTP_REFERER'],PHP_URL_PATH)) != basename(__FILE__))
	) ? $_SERVER['HTTP_REFERER'] : "index.php";


$exam_res = $db->query("SELECT * FROM Exam WHERE ExamID = " . (int)$_GET["e"]);
$exam_data = $exam_res->fetch_assoc();

$course_data = $db->query("SELECT * FROM Course WHERE CourseID = ". $exam_data["CourseID"])->fetch_assoc();

$roman_lookup = array("I", "II", "III", "IV", "V"); //lazy stuff...
$str_lookup = array("True or False", "Choose The Best Answer", "Give Short Answer");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Exam Preview</title>
		<link rel="stylesheet" type="text/css" href="css/exam.css">
	</head>
	<body>


		<button type="button" onclick="window.print()" class="prnt-btn no-print">
			<i class="fa fa-print"></i>
			Print
		</button>

	<a class="prnt-btn ger-btn no-print" href="?e=<?php echo (int)$_GET["e"]; ?>"><i class="fa fa-question"></i> Questions</a>
		<a class="prnt-btn ger-btn no-print" href="?e=<?php echo (int)$_GET["e"]; ?>&ash"><i class="fa fa-reorder"></i> A.Sheet</a>
		<a class="prnt-btn ger-btn no-print" href="?e=<?php echo (int)$_GET["e"]; ?>&ans"><i class="fa fa-pencil"></i> Answers</a>
<?php
	if($exam_data["UserID"] == $_SESSION["user_id"]){
?>
	
		<a class="prnt-btn del-btn no-print" href="?e=<?php echo (int)$_GET["e"]; ?>&del"><i class="fa fa-trash"></i> Delete</a>
		<script type="text/javascript">
			function confirmation (e) {if(!confirm("Are You Sure?")) e.preventDefault();}
			document.getElementsByClassName('del-btn')[0].addEventListener('click', confirmation, false);
		</script>
<?php } ?>
		<a class="prnt-btn back-btn no-print" href="<?php echo $last_page; ?>"><i class="fa fa-arrow-left"></i> Back</a>

		<div id="exam-all">		
			<?php include "toolbar.php"; ?>
			<div id="exam-view" contenteditable="true">
				<h2 align="center"><?php echo $course_data["CourseString"]; ?> Exam.</h2>
				<br>
				<div id="info-stud">Name ____________________________  ID __________  Section __________ </div>
				<br>
				<?php
				$count_type = 0;
				for ($i=1; $i <= 3 ; $i++) { 
					$qres = $db->query("SELECT * FROM questions q JOIN examquestions eq ON q.QuestionID = eq.QuestionID AND q.QuestionType=$i AND eq.ExamID= ". $exam_data["ExamID"]);
					$tfl = array("True", "False");
					$is_answer_sheet = isset($_GET["ash"]);
					$is_answer = isset($_GET["ans"]);
					
					if(!mysqli_num_rows($qres)) continue;
					
					printf("<div class='q-type'><u>%s. %s</u></div>", $roman_lookup[$count_type], $str_lookup[$i-1]);

					if($is_answer_sheet||$is_answer)echo '<div class="answer-sheet">';

					for($r = 1;$row = $qres->fetch_assoc();$r++){
						if($is_answer_sheet){ //lmao suppper lazyy...
							if($i==3)continue; //i'm super lazy and i hate web dev't
							echo "<span><i>$r.</i> ____________</span>";
						}
						elseif ($is_answer) {
							if($i==3)continue;
							$answer = $row["QuestionType"] == 2 ? chr(64+$row["Answer"]): $tfl[$row["Answer"]-1] ;
							printf("<span><i>%s.</i> %s</span>", $r, $answer);
						}
						else{		
							echo "<div class=\"question\">$r. ".htmlspecialchars($row["QuestionString"])."</div>";
							$qid = $row["QuestionID"];
							if($i == 2){
								$mcres = $db->query("SELECT * FROM MultipleChoice WHERE QuestionID = $qid ORDER BY MultipleChoiceID");
								for($k=65;$row_m = $mcres->fetch_assoc();$k++)
									printf("<div class='choice'>%c) %s </div>", $k, htmlspecialchars($row_m["MultipleChoiceString"] ));
							}
						}
					}
					if($is_answer_sheet||$is_answer) echo "</div>";

					$count_type++;
				}
				?>
			</div>
		</div>

	</body>
</html>
