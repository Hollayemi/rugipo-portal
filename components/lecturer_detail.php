

<?php include("connection.php") ?>

<?php 
$sid = $_GET['id'];


$query2 = "SELECT lecturers.*, post.*, batches.* 
           FROM lecturers 
           LEFT JOIN batches ON lecturers.batch_advising = batches.id 
           LEFT JOIN post ON lecturers.post_id = post.id 
           ORDER BY lecturers.post_id ASC";
$run2 = mysqli_query($conn,$query2);
 
while($row2 = mysqli_fetch_array($run2)){
  $sname =  $row2['name'];
  $postid =  $row2['title'];
  $badvising =  $row2['year'];
  $semail =  $row2['email'];
  $smobile =  $row2['mobile'];
  $sdate = $row2['date'];
}

$query5 = "SELECT * FROM `post` order by id desc";
$run5 = mysqli_query($conn,$query5);


$query3 = "SELECT * FROM `batches`";
$run3 = mysqli_query($conn,$query3);

?>


<!-- form -->
<p>
  * Following are the details of the choosen lecturer in case of any updations simply change the corresponding field value and click on update details. 
  <form class="shadow p-3" action="" method="post">
  <button type="submit" name="submit-form" class="btn btn-info float-right">Update Details</button>
  <br />
  <div class="form-group">
    <label for="c-name">Lecturer Name :- </label>
    <input type="text" value="<?php echo $sname?>" name="c-name" class="form-control" id="c-name" aria-describedby="c-name" placeholder="Enter Student Full Name. Ex :- Raj Patel" required>
  </div>

  <div class="form-group">
    <label for="c-email">Email :- </label>
    <input type="email" name="c-email" value="<?php echo $semail?>" class="form-control" id="c-email" aria-describedby="c-email" placeholder="Enter Student Email. Ex :- kakhilesh79@gmail.com" required>
  </div>
  
  <div class="form-group">
    <label for="c-mobile">Mobile :- </label>
    <input type="text" name="c-mobile" value="<?php echo $smobile?>" class="form-control" id="c-mobile" aria-describedby="c-mobile" placeholder="Enter Student Mobile No without +91 prefix. Ex :- 8543832619" required>
  </div>
    <div class="form-group">
    <label for="c-post">Lecural Post :- </label>

  <select class="custom-select" name="c-post" value="sdsd" id="c-post" required>
    <option selected value="">Choose...</option>
    <?php 
    while($row5 = mysqli_fetch_array($run5)){
      $pTitle = $row5['title'];
      $pId = $row5['id'];
      ?>
      <option value="<?php echo $pId; ?>"><?php echo $pTitle; ?></option>
    <?php
    }
    ?>
    </select>
  </div>

  <div class="form-group">
    <label for="c-advising">Batch Advising :- </label>
 
  <select class="custom-select" name="c-advising" id="c-advising" required>
    <option value="">Choose...</option>
    <?php 
    while($run3 = mysqli_fetch_array($run3)){
      $bfy = $run3['year'];
      $blly = $run3['year'] + 4;
      $biid = $run3['id'];
      ?>
      <option value="<?php echo $biid; ?>"><?php echo $bfy; ?> - <?php echo $blly; ?></option>
    <?php
    }
    ?>
    </select>
  </div>
  
 
</form>
	</p> 
  
<?php



// add new class...
	if(isset($_POST['submit-form'])){
		$cname = $_POST['c-name'];
		$cpost = $_POST['c-post'];
		$cadvising = $_POST['c-advising'];
		$cemail = $_POST['c-email'];
		$cmobile = $_POST['c-mobile'];

		$cid = $sid;
    // echo $cname.$ciid.$csem;
		$query1 = "UPDATE `lecturers` SET `email` = '$cemail', `mobile` = '$cmobile',`mobile` = '$cadvising',`roll_number` = '$croll', `name` = '$cname' where id='$cid' ";
		$run1 = mysqli_query($conn,$query1);

		if($run1){
      ?><script> window.location.href = "lecturer.php" </script><?php
      // header('location:students.php?batch='.$sbsy);
//       echo "<meta http-equiv='refresh' content='0'>";
		}else{
      echo "no";
    }
	

	}

?>