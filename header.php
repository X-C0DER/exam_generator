<div id="nav-main">
	<div class="content-head">
		<nav class="content-head-nav">

			<section class="content-head-title">
				Exam Generator<span style="color: cyan">.</span>
			</section>

			<section class="content-head-list">
				<ul>
					<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="manual.php"><i class="fa fa-archive"></i> Manual</a></li>
					<li><a href="exams.php"><i class="fa fa-globe"></i> Exams</a></li>
					<?php 
						if(isset($_SESSION["admin"]))
							echo '<li><a href="dashboard.php"><i class="fa fa-wrench"></i> Dashboard</a></li>';
					?>
					<li><a href="contactus.php"><i class="fa fa-envelope"></i> Contact Us</a></li>
					<li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
					<?php
						echo '<li><i style="font-size:30px" class="fa fa-user-circle-o"></i> @'.htmlspecialchars(get_user_info_by_id($_SESSION["user_id"])["Username"]).'</li>';
					?>
				</ul>
			</section>

		</nav>
		<br><br>
	</div>
</div>
