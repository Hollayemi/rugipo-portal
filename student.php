
<?php
    session_start();

    if (!isset($_SESSION['roll_number'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Students</title>

	<link rel="icon" href="./img/logo.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
	<link rel="stylesheet" href="css/student.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">DASH<b>BOARD</b>
			
		</h2>
		<h5>Computer Science & Technology, <?php echo $_SESSION['roll_number']; ?></h5>
		<!-- <i class="fa fa-user" aria-hidden="true"></i> -->
	</header>
	<section class="main-section">
			<?php include("./components/myinfo.php") ?>
		</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>