<?php
include "funcs.php";
start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Exam Generator - Manual.</title>
	</head>
	<body>
		<?php include "header.php" ?>
		<br><br>
		<?php
			if(isset($_SESSION["man_exam_add"])){
				echo "<span id='temp-msg'><i class='fa fa-info'></i> Exam Saved!</span>";
				unset($_SESSION["man_exam_add"]);
			}
			elseif (isset($_SESSION["exam_deleted"])) {
				echo "<span id='temp-msg' ><i class='fa fa-check'></i> Exam Deleted!</span>";
				unset($_SESSION["exam_deleted"]);
			}
		?>
		<div id="contain">
			<div id="c-left">
				<div class="std-form" style="min-height: 230px">
					<form id="exam-info" method="POST" action="man_save.php">
						<h3><i class="fa fa-info"></i> Assignment/Exam Information </h3>

						<div class="form-drop">
							<select name="course" required>
								<option value="" selected>None</option>
								<?php
									$res = get_courses();
									while($row = $res->fetch_assoc())
										printf("<option value='%s'>%s</option>", $row["CourseID"], $row["CourseString"]);
								?>
							</select>
							<span class="fd-icon"><i class="fa fa-chevron-down"></i></span>
							<label>Course*</label>
						</div><br>

						<div class="form-textarea">
							<textarea name="title" class="std-input" maxlength="100" required></textarea>
							<label>Title*</label>
						</div>
						<br><br>
						<input type="hidden" id="exam_str" name="exam_str" value="">
					</form>
				</div>
			</div>
			<div id="c-right">
				<div class="std-form" style="min-height: 230px">
					<h3><i class="fa fa-reorder"></i> Saved Exam List</h3>
					<table id="tablee">
						<thead>
							<th>Title</th>
							<th>Course</th>
						</thead>
						<tbody>
		<?php
			$res = $db->query("SELECT * FROM exam_manual  WHERE UserID= ".$_SESSION["user_id"]." ORDER BY DateTime DESC");
			if(!mysqli_num_rows($res))
				echo "<tr><td><i>No Exams.</i></td></tr>";
			else while($row = $res->fetch_assoc()){
				$course = $db->query("SELECT * FROM Course WHERE CourseID = ". $row["CourseID"])->fetch_assoc();				
				printf("<tr> <td><a href='exam_preview_man.php?e=%d'>%s</a></td> <td>%s</td> </tr>", 
					$row["ExamID"],
					htmlspecialchars($row["ExamTitle"]), 
					htmlspecialchars($course["CourseString"])
				);
			}
		?>
						</tbody>
					</table>
					<br>			
				</div>

			</div>
			<div class="clear"></div>
		</div>
		<div id="exam-all">		
			<?php define('INC_FILE', "1"); include "toolbar.php"; ?>
			<div id="exam-view" onclick="this.focus()" contenteditable="true"></div>
		</div>

		<br><br><br>
		<?php include "footer.php" ?>
		<script src="lib/jquery.min.js"></script>
		<script src="lib/jquery-paginate.min.js"></script>
		<script type="text/javascript">
			$('#tablee').paginate({ limit: 5});
		</script>
		<script src="lib/docx2html.min.js"></script>
		<script src="js/manual_funcs.js"></script>
	</body>
</html>