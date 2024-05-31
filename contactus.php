<?php
include "funcs.php";
start();
if(isset($_POST["submit"])){
	$subject = s($_POST["subject"]);
	$message = s($_POST["message"]);
	$uid = $_SESSION["user_id"];
	$db->query("INSERT INTO contact_us (subject, message, UserID) VALUES('$subject', '$message', $uid)");
	$_SESSION["added"] = 1;
	redirect_to("contactus.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Exam Generator - Contact Us.</title>
	</head>
	<body>
		<?php include "header.php" ?>
		<?php
			if(isset($_SESSION["added"])){
				echo "<div id='temp-msg'><i class='fa fa-check'></i> Message Sent!</div>";
				unset($_SESSION["added"]);
			}
		?>
		<br><br><br>
		<div class="std-form">			
			<form method="post" action="contactus.php">
				<h3><i class="fa fa-pencil"></i> Contact Us</h3>

				<div class="form-group">
					<input type="text" class="std-input" name="subject" maxlength="40"><br>
					<label>Subject*</label>
				</div>
				<br>

				<div class="form-textarea">
					<textarea name="message" class="std-input" maxlength="200" required=""></textarea>
					<label>Message*</label>
				</div>
				<br>
				<button class="std-btn" name="submit">Submit</button>
				<br><br>
			</form>
		</div>
		<br><br>

		<?php include "footer.php" ?>
		<script type="text/javascript">
			function remove_after(){
				document.getElementById("temp-msg").remove();
			}
			setTimeout(remove_after, 1000 * 4);
		</script>
	</body>
</html>