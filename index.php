<?php
include "funcs.php";
start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Exam Generator - Home.</title>
	</head>
	<body>
		<?php include "header.php" ?>
		<br><br>

		<div id="contain">
			<div id="c-left">
				<div class="std-form">
					<form method="post" action="post_q.php">
						<?php
							if(isset($_SESSION["exam_gen_error"])){
								echo "<span id='temp-msg' class='error-msg'><i class='fa fa-warning'></i> Error While Generating Exam!</span>";
								unset($_SESSION["exam_gen_error"]);
							}
							elseif (isset($_SESSION["exam_gen"])) {
								echo "<span id='temp-msg' ><i class='fa fa-check'></i> Exam Generated!</span>";
								unset($_SESSION["exam_gen"]);
							}
							elseif (isset($_SESSION["exam_deleted"])) {
								echo "<span id='temp-msg' ><i class='fa fa-check'></i> Exam Deleted!</span>";
								unset($_SESSION["exam_deleted"]);
							}
							elseif (isset($_SESSION["exam_added"])) {
								echo "<span id='temp-msg' ><i class='fa fa-check'></i> Exam Added!</span>";
								unset($_SESSION["exam_added"]);
							}
						?>
						<h3><i class="fa fa-pencil"></i> Add Question </h3>

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
						</div>
						<br>

						<div class="form-drop">				
							<select id="types" name="type" onchange="if(this.selectedIndex) changed_type(this.selectedIndex)" required>
								<option>None</option>
								<option value="1">True or False</option>
								<option value="2" selected>Multiple Choice</option>
								<option value="3">Give Short Answer</option>
							</select>
							<span class="fd-icon"><i class="fa fa-chevron-down"></i></span>
							<label>Question Type*</label>
						</div>
						<br>

						<div class="form-drop">
							<select name="chapter" required>
								<option value="" selected>None</option>
								<?php
									for($i=1; $i < 6; $i++)
										printf("<option value='%s'>Chapter %s</option>", $i, $i);
								?>
							</select>
							<span class="fd-icon"><i class="fa fa-chevron-down"></i></span>
							<label>Chapter*</label>
						</div>

						<div id="questions"></div>

						<br>
						<button type="button" class="icon-btn" style="background: lightgreen;" onclick="add_question()">
							<i class="fa fa-plus"></i>
						</button>

						<button type="button" class="icon-btn red" style="background: #ff8887;" onclick="remove_question()">
							<i class="fa fa-minus"></i>
						</button>
						<br>

						<button class="std-btn">Submit</button>
						<br><br>
					</form>
				</div>
			</div>
			<div id="c-right">
				<div class="std-form">
					<h3><i class="fa fa-reorder"></i> Generated Exam List</h3>
					<table id="tablee">
						<thead>
							<th>Exam Date</th>
							<th>Course</th>
						</thead>
						<tbody>
		<?php
			$res = $db->query("SELECT * FROM exam  WHERE UserID= ".$_SESSION["user_id"]." ORDER BY DateTime DESC");
			if(!mysqli_num_rows($res))
				echo "<tr><td><i>No Exams.</i></td></tr>";
			else while($row = $res->fetch_assoc()){
				$course = $db->query("SELECT * FROM Course WHERE CourseID = ". $row["CourseID"])->fetch_assoc();				
				printf("<tr> <td><a href='exam_preview.php?e=%d'>Exam %s</a></td> <td>%s</td> </tr>", 
					$row["ExamID"],
					$row["DateTime"], 
					htmlspecialchars($course["CourseString"])
				);
			}
		?>
					</tbody>
					</table>
					<br>			
				</div>

				<div class="std-form">			
					<form method="post" action="gen_exam.php">
						<h3><i class="fa fa-cog"></i> Generate Exam</h3>

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
						</div>
						<br>

						<div class="form-group">
							<input type="number" class="std-input" name="type1"><br>
							<label>True or False*</label>
						</div>
						<br>

						<div class="form-group">
							<input type="number" class="std-input" name="type2"><br>
							<label>Multiple Choice*</label>
						</div>
						<br>
						
						<div class="form-group">				
							<input type="number" class="std-input" name="type3"><br>
							<label>Give Short Answer*</label>
						</div>
						<br>

						<div class="form-check">
							<label>Chapters</label><br>
							<?php
								for($i=1; $i < 6; $i++)
									printf("%s<input type='checkbox' name='chapter[]' value='%s'>", $i, $i);
							?>
						</div>

						<br>
						<button class="std-btn">Generate</button>
						<br><br>
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php include "footer.php" ?>
		<script src="lib/jquery.min.js"></script>
		<script src="lib/jquery-paginate.min.js"></script>
		<script type="text/javascript">
			$('#tablee').paginate({ limit: 10});
		</script>
		<script type="text/javascript" src="js/funcs.js"></script>
	</body>
</html>