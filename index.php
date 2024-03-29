<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>

	<link rel="icon" href="./img/logo.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">DASH<b>BOARD</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<h3>Computer Science & Technology, RUGIPO</h3>
		<!-- <i class="fa fa-user" aria-hidden="true"></i> -->
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/logo.png">
				<h5>CSE - RUGIPO</h5>
			</div>
			<ul>
				<li>
					<a href="index.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li>
					<a href="batches.php">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<span>Batches</span>
					</a>
				</li>
				<li>
					<a href="classes.php?batch=2018">
						<i class="fa fa-laptop" aria-hidden="true"></i>
						<span>Classes</span>
					</a>
				</li>
				<li>
					<a href="lecturers.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Lecturers</span>
					</a>
				</li>
				<li>
					<a href="students.php?batch=2018">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Students</span>
					</a>
				</li>
				<!-- <li>
				<a href="attandance_records.php?bid=1&cid=1&sd=<?php echo date('Y-m-d', strtotime(' -1 month'));?>&ld=<?php echo date('Y-m-d'); ?>">
						<i class="fa fa-file" aria-hidden="true"></i>
						<span>Attandance</span>
					</a>
				</li> -->
				<!-- <li>
					<a href="#">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Setting</span>
					</a>
				</li> -->
				<li>
					<a href="">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">
			<h1>WELCOME</h1>
			<p>#Rufus Giwa Polytechnic</p>
		</section>
	</div>

</body>
</html>