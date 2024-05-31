<?php
include "funcs.php";
start();
if(!isset($_SESSION["admin"])) redirect_to("index.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="lib/jquery.min.js"></script>
		<script src="lib/jquery-paginate.min.js"></script>
		<script src="lib/raphael.js"></script>
		<script src="lib/morris.min.js"></script>
		<link rel="stylesheet" href="lib/morris.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Exam Generator - Dashboard.</title>
	</head>
	<body>
		<?php include "header.php" ?>
		<br>
		<div class="dash-stat">	
			<h2><i class="fa fa-bar-chart"></i> Automatically Generated Exams Visualization</h2>			
			<div class="plot" id="course-dist">Course-Questions</div>
			<div class="plot" id="type-dist">Q. Types</div>
			<div class="plot" id="exam-dist">Courses-Exam</div>
			<br><br><br><br>
		</div>
		<br><br>

		<div class="wide-table">
			<h2><i class="fa fa-user-plus"></i> New Account List</h2>
			<br>
			<table>
				<thead>
					<th>Name</th>
					<th>Username</th>
					<th>Email</th>
					<th> </th>
				</thead>
				<tbody>
					<?php
						$res = $db->query("SELECT * FROM user WHERE Activated=0 and UserType=1 ORDER BY Name");
						if(mysqli_num_rows($res)){
							while($row = $res->fetch_assoc())
								printf("<tr><td>%s</td><td>@%s</td><td>%s</td><td class='center'>".
									"<a href='apv.php?id=%d'><i class='fa fa-check'></i></a> <a class='dl' href='del.php?id=%d'><i class='fa fa-trash'></i></a></td></tr>",
									htmlspecialchars($row["Name"]),
									htmlspecialchars($row["Username"]),
									htmlspecialchars($row["Email"]),
									$row["UserID"], $row["UserID"]
								);
						}
						else echo "No New Accounts.";
					?>
				</tbody>
			</table>
			<br><br>
		</div><br><br>

		<div class="wide-table">
			<h2><i class="fa fa-envelope"></i> Messages Received</h2>
			<br>
			<table id="tablee">
				<thead>
					<th>Subject</th>
					<th>Message</th>
					<th>Sent by</th>
				</thead>
				<tbody>
					<?php
						$res = $db->query("SELECT * FROM contact_us ORDER BY cid DESC");
						if(mysqli_num_rows($res)){
							while($row = $res->fetch_assoc()){	
								$user = $db->query("SELECT * FROM user WHERE UserID = ". $row["UserID"])->fetch_assoc();
								printf("<tr><td>%s</td><td class='message-td'>%s</td><td>%s</td></tr>",
									htmlspecialchars($row["subject"]),
									htmlspecialchars($row["message"]),
									htmlspecialchars($user["Name"])
								);
							}
						}
						else echo "<tr><td><center>No MEssages.</center></td></tr>";
					?>
				</tbody>
			</table>
			<br><br>
		</div><br><br>

		<div class="wide-table">
			<h2><i class="fa fa-user"></i> Account List</h2>
			<br>
			<table>
				<thead>
					<th>Name</th>
					<th>Username</th>
					<th>Email</th>
					<th></th>
				</thead>
				<tbody>
					<?php
						$res = $db->query("SELECT * FROM user WHERE Activated=1 and UserType=1 ORDER BY Name");
						if(mysqli_num_rows($res)){
							while($row = $res->fetch_assoc())
								printf("<tr><td>%s</td><td>@%s</td><td>%s</td><td class='center'><a class='dl' href='del.php?id=%d'><i class='fa fa-trash'></i></a></a></td></tr>",
									htmlspecialchars($row["Name"]),
									htmlspecialchars($row["Username"]),
									htmlspecialchars($row["Email"]),
									$row["UserID"]
								);
						}
						else echo "<tr><td><center>No Accounts.</center></td></tr>";
					?>
				</tbody>
			</table>
			<br><br>
		</div>

		<script>
			Morris.Donut({
			  element: 'course-dist',
			  data: [
				<?php
					$res = get_courses();
					while($row = $res->fetch_assoc()){
						$c = mysqli_num_rows($db->query("SELECT * FROM questions WHERE CourseID=".$row["CourseID"]));
						printf("{value: %d, label: \"%s\"},", $c, $row["CourseString"]);
					}
				?>
			  ],
			});
			Morris.Donut({
			  element: 'type-dist',
			  data: [
				<?php
					$arr = array("", "True or False", "Multiple Choice", "Give Short Answer");
					for($r = 1; $r <= 3; $r++){
						$c = mysqli_num_rows($db->query("SELECT * FROM questions WHERE QuestionType=$r"));
						printf("{value: %d, label: '%s'},", $c, $arr[$r]);			
					}
				?>
			  ],
			   colors: ['#F67280', '#C06C84', '#6C5B7B'],
			});
			Morris.Donut({
			  element: 'exam-dist',
			  data: [
				<?php
					$res = get_courses();
					while($row = $res->fetch_assoc()){
						$c = mysqli_num_rows($db->query("SELECT * FROM exam WHERE CourseID=".$row["CourseID"]));
						printf("{value: %d, label: \"%s\"},", $c, $row["CourseString"]);
					}
				?>
			  ],
			  colors: ['#45ADA8', '#547980', '#afa'],
			});

			var elem = document.getElementsByClassName('dl');

			function confirmation (e) {
				if(!confirm("Are You Sure?")) e.preventDefault();
			}

			for (var i = 0; i < elem.length; i++) {
				elem[i].addEventListener('click', confirmation, false);
			}
			$('#tablee').paginate({ limit: 10});
		</script>
		<?php include "footer.php" ?>
	</body>
</html>