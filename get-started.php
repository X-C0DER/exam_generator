<!DOCTYPE html>
<html>
<head>
	<title>Get Started</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<style type="text/css">
		body{
			padding: 0;
			margin: 0;
			color: #777;
			font-family: Gisha;
			height: 100%;
		}

		#image{
			background: black url(images/desk2.jpg) no-repeat center center fixed;
			background-size: cover;
			position: fixed;
			width: 130%;
			height: 130%;
			top: -20px;
			left: -30px;
			z-index: -1;
			filter: blur(5px);
			box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.7);
		}

		a{
			text-decoration: none;
			color: blueviolet;
		}

		#nav-main{
			color: #fff;
			position: relative;
			background-size: cover;
			height: 110px;
			overflow: hidden;
		}

		#nav-main:after{
			content: " ";
			display: block;
			height: 45px;
			position: absolute;
			bottom: 0px;
			width: 300%;
			left: -500px;
		}


		.content-head section{
			display: inline-block;
		}

		.content-head-nav{
			line-height: 30px;
			width: 85%;
			margin: 0 auto;
		}

		.content-head-title{
			font-size: 30px;
			font-weight:bold;
			margin: 12px;
		}

		.content-head-list{
			float:right;
			font-size: 17px;
		}

		.content-head-list li{
			display: inline-block;
			padding: 0 30px;
			text-decoration: none;
			position: relative;
		}

		.content-head-list a{
			color: #fff;
			transition: ease-in-out 0.3s;
		}

		.content-head-list a::after{
			content: " ";
			height: 2px;
			width: 0px;
			background: cyan;
			position: absolute;
			left: 0;
			bottom: -2px;
			transition: ease-in-out 0.3s;
		}

		.content-head-list a:hover::after{
			width: 100%;
		}

		.content-head-list a:hover > i{
			color: cyan;
			transition: ease-in-out 0.3s;
			text-shadow: 0 0 14px cyan;
		}

		@keyframes glow_anim{
			from {color: white;}
			to {color: cyan;}
		}

		.glow_cyan {
			animation-name: glow_anim;
			animation-duration: 5s;
			animation-iteration-count: infinite;
			animation-direction: alternate;
		}

		.glow_cyan2{
			animation-name: glow_anim;
			animation-duration: 5s;
			animation-iteration-count: infinite;
			animation-direction: alternate;
			animation-delay: 5s;
		}

		.title  {
			font-size: xx-large;
			margin-top: 30px;
			text-align: center;
			color: white;
			letter-spacing: 0.6em;
			font-weight: bolder;
			text-transform: uppercase;
		}
		.title-2 {
			text-transform: capitalize;
			text-align:center; ;
			font-size: 17px;
			margin-top: 5px;
			color: white;
			width: 80%;
			margin: 0 auto;
			line-height: 30px;
		}

		.s-button1{
			border:none;
			color: #fff;
			text-align: center;
			border-radius: 5px 0 0px 5px;
			font-size: 20px;
			font-weight: bold;
			width: 120px;
			padding: 10px 10px;
			display: inline-block;
			background: #42d0ff;
		}

		.s-button2{
			margin-left: -5px;
			border:none;
			color: #42d0ff;
			text-align: center;
			border-radius: 0px 5px 5px 0px;
			font-size: 20px;
			font-weight: bold;
			width: 120px;
			padding: 10px 10px;
			display: inline-block;
			background: #fff;
		}

	</style>
</head>
<body>
	<br><br>
		<div id="image"></div>
		<div id="nav-main">
			<div class="content-head">
				<nav class="content-head-nav">

					<section class="content-head-title">
						Exam Generator<span style="color: cyan">.</span>
					</section>

					<section class="content-head-list">
						<ul>
							<li><a href="login.php" target="_blank"><i class="fa fa-sign-in"></i> Login</a></li>
							<li><a href="signup.php" target="_blank"><i class="fa fa-user-plus"></i> Signup</a></li>
						</ul>
					</section>

				</nav>
				<br><br>
			</div>
		</div>
		<br>
		<div class="title">
			<h1><span class="glow_cyan">Exam</span> <span class="glow_cyan2">Bank</span></h1>
		</div>
		<br>
		<div class="title-2">
			<h3>
				Generate Exams Automatically From Given Parameters. Manually Create And Manage Exams/Assignments.
				Share Created Exams With Other Teachers. Edit Created Exam With WYSIWYG Editor And Import Word Documents
				To The Editor. 
			</h3>
		</div>
		<br><br><br>
		<center>		
			<a href="login.php" target="_blank" class="s-button1">Login</a>
			<a href="signup.php" target="_blank" class="s-button2">Signup</a>
		</center>
	</body>
</html>