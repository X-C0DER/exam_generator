<?php 
include "funcs.php";
start();

if(!isset($_GET["e"]) || !data_exist("Exam_Manual", "ExamID", (int)$_GET["e"]))
	redirect_to("index.php");

if(isset($_GET["del"])){
	$db->query("DELETE FROM Exam_Manual WHERE ExamID = ". (int)$_GET["e"]);
	$_SESSION["exam_deleted"] = 1;
	redirect_to("manual.php");
}

$last_page = (
			isset($_SERVER['HTTP_REFERER']) && 
			(basename(parse_url($_SERVER['HTTP_REFERER'],PHP_URL_PATH)) != basename(__FILE__))
	) ? $_SERVER['HTTP_REFERER'] : "manual.php";


$exam_res = $db->query("SELECT * FROM Exam_Manual WHERE ExamID = " . (int)$_GET["e"]);
$exam_data = $exam_res->fetch_assoc();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Saved Preview</title>
		<link rel="stylesheet" type="text/css" href="css/exam.css">
	</head>
	<body>


		<button type="button" onclick="window.print()" class="prnt-btn no-print">
			<i class="fa fa-print"></i>
			Print
		</button>
<?php
	if($exam_data["UserID"] == $_SESSION["user_id"]){
?>
		<a class="prnt-btn del-btn no-print" href="?e=<?php echo (int)$_GET["e"]; ?>&del"><i class="fa fa-trash"></i> Delete</a>
<?php } ?>
		<a class="prnt-btn back-btn no-print" href="<?php echo $last_page; ?>"><i class="fa fa-arrow-left"></i> Back</a>
		<script type="text/javascript">
			function confirmation (e) {if(!confirm("Are You Sure?")) e.preventDefault();}
			document.getElementsByClassName('del-btn')[0].addEventListener('click', confirmation, false);
		</script>

		<div id="exam-all">		
			<?php if($exam_data["UserID"] == $_SESSION["user_id"]) define('INC_FILE_P', "1"); include "toolbar.php"; ?>
			<div id="exam-view" onclick="this.focus()" contenteditable="true">
				<?php echo $exam_data["ExamString"] ?>
			</div>
		</div>

		<script src="lib/jquery.min.js"></script>
		<script type="text/javascript">
			function save_exam(){
				exam_data = document.getElementById("exam-view").innerHTML;

				function remove_after(){
					document.getElementById("temp-msg").remove();
				}

				function display_msg(){
					document.getElementById("exam-toolbar").insertAdjacentHTML(
						"beforeend", "<span id='temp-msg' class='no-print'><i class='fa fa-info'></i> Exam Saved!</span>"
					);
					setTimeout(remove_after, 1000 * 2);
				}

				request = $.ajax({
					url: "man_save.php",
					type: "POST",
					data: {update: 1, data: exam_data, eid: <?php echo (int)$_GET["e"] ?>}
				});

				request.done(function(msg){display_msg()});

				request.fail(function(jqXHR, textStatus){
					alert("Save Failed, Code Return:" + textStatus);
				});
			}
		</script>
	</body>
</html>
