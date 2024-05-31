<?php
include "funcs.php";
connect_db();
session_start();

if(isset($_SESSION["user_id"])) redirect_to("index.php");

$msg = NULL;

$input_arr = array("name", "username", "email", "pass", "cpass");

if(isset($_POST["submit"])){
	foreach ($input_arr as $i) { // lazy way to check all isset(field)
		if(!isset($_POST[$i])) $msg = "Error: Blank Input Field.";
	}
	if(!$msg){
		if(strlen($_POST["pass"]) < 8)
			$msg = "Error: password must be at least 8 characters.";
		else if($_POST["pass"] != $_POST["cpass"])
			$msg = "Error: Passwords Don't Match.";
		else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
			$msg = "Error: invalid email.";
		else if(data_exist("user", "username", $_POST["username"]))
			$msg = "Error: Username Already in use";
		else if(data_exist("user", "email", $_POST["email"]))
			$msg = "Error: Email Already in use.";
		else{
			add_user($_POST["name"], $_POST["username"], $_POST["email"], $_POST["pass"]);
			$_SESSION["act_msg"] = 1;
			redirect_to("login.php");
		}
	}
}

close_db();
?>
<!doctype html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="signup-body">
	<div id="signup_main">
		<div id="signup-card">
			<div class="signup-head">
				<i class="fa fa-user-plus" style="font-size:100px;"></i>
				<h1>Signup</h1>
				<?php
					if($msg)
						echo '<div id="sign-error"><i class="fa fa-warning"></i> '. $msg .'</div>';
				?>
			</div>
			<form action="signup.php" method="POST" id="sign-form">
				<div class="sign-input">
					<i class="fa fa-user"></i>
					<input type="text" name="name" minlength="3" placeholder="Name" maxlength="30" required>
				</div>

				<div class="sign-input">
					<i class="fa fa-user"></i>
					<input type="text" name="username" minlength="3" placeholder="Username" maxlength="16" required>
				</div>
				
				<div class="sign-input">
					<i class="fa fa-envelope"></i>
					<input type="text" name="email" placeholder="Email" maxlength="100" required>
				</div>
				
				<div class="sign-input">
					<i class="fa fa-lock"></i>
					<input type="Password" name="pass"  minlength="8" placeholder="Password" maxlength="64" required>
				</div>
				
				<div class="sign-input">
					<i class="fa fa-lock"></i>
					<input type="Password" name="cpass" minlength="8" placeholder="Re-Enter Password" maxlength="64" required>
				</div>

				<center>
					<button class="sing-btn" name="submit" value="1">Create <i class="fa fa-user-plus"></i></button>
					<button class="sing-btn" type="button" onclick="location.href='login.php'">Login Page <i class="fa fa-arrow-right"></i></button>
				</center>
			</form>
		</div>
		<br><br><br>
	</div>
</body>
</html>