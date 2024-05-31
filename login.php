<?php
include "funcs.php";
connect_db();
session_start();

if(isset($_SESSION["user_id"])) redirect_to("index.php");


$msg = NULL;

if(isset($_POST["login"]) && isset($_POST["username"]) && isset($_POST["pass"])){
	if(!data_exist("user", "username", $_POST["username"]))
		$msg = "Username you've entered does'nt match any account.";
	else{
		$ret = password_match($_POST["username"], $_POST["pass"]);
		if(!$ret)
			$msg = "Incorrect password.";
		elseif($ret == -1)
			$_SESSION["act_msg"] = 1;
		else {
			login($ret);
			redirect_to("index.php");
		}
	}
}

close_db();
?>
<!doctype html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="signup-body">
	<div id="signup_main">
		<br><br><br>
		<div id="signup-card">
			<div class="signup-head">
				<i class="fa fa-user-circle-o" style="font-size:100px;"></i>
				<h1>Login</h1>
				<?php
					if($msg)
						echo '<div id="sign-error"><i class="fa fa-warning"></i> '. $msg .'</div>';
					if(isset($_SESSION["act_msg"])){
						echo "<span id='temp-msg' class='error-msg'><i class='fa fa-warning'></i> Your account is not activated yet. you'll receive email when your account activated!</span>";
						unset($_SESSION["act_msg"]);
					}
				?>
			</div>
			<form action="login.php" method="POST" id="sign-form">
				<div class="sign-input">
					<i class="fa fa-user"></i>
					<input type="text" name="username" placeholder="Username" required>
				</div>

				<div class="sign-input">
					<i class="fa fa-lock"></i>
					<input type="Password" name="pass" placeholder="Password" required>
				</div>
				

				<center>
					<button class="sing-btn" name="login" value="1">Login <i class="fa fa-arrow-right"></i></button>
					<button class="sing-btn" type="button" onclick="location.href='signup.php'">Singup <i class="fa fa-user-plus"></i></button>
				</center>
			</form>
		</div>
		<br><br><br>
	</div>
	<script>
		function remove_after(){
			document.getElementById("temp-msg").remove();
		}

		setTimeout(remove_after, 1000 * 20);
	</script>
</body>
</html>