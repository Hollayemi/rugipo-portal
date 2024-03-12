<!-- <p>

	<i class="fa fa-arrow-right"> Create New Batch</i>

<br><br>

	<i class="fa fa-arrow-down"> Existing Batches</i>

</p> -->

<!-- <button type="button" class="btn btn-primary">Create New Batch</button>
<br><br> -->

<?php include("connection.php") ?>

<?php include("connection.php") ?>
<?php


$query3 = "SELECT lecturers.*, post.*, batches.* 
           FROM lecturers 
           LEFT JOIN batches ON lecturers.batch_advising = batches.id 
           LEFT JOIN post ON lecturers.post_id = post.id 
           ORDER BY lecturers.post_id ASC";
$run3 = mysqli_query($conn,$query3);
// if($run3) echo "yes";
// if (mysqli_num_rows($run3)==0) { echo "hi"; }

$query4 = "SELECT * FROM `batches` order by year desc";
$run4 = mysqli_query($conn,$query4);

$query5 = "SELECT * FROM `post` order by id desc";
$run5 = mysqli_query($conn,$query5);

?>


  <div class="container my-5">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">

        <button class="nav-link btn btn-success active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Lecturers</button>
	&nbsp;&nbsp;
    <button class="nav-link btn btn-primary" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Register New Lecturer</button>
	&nbsp;&nbsp;
        <button class="nav-link btn btn-info" id="nav-post-tab" data-bs-toggle="tab" data-bs-target="#nav-post" type="button" role="tab" aria-controls="nav-post" aria-selected="false">Create Post</button>

      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <p>
	* Following are the registerd lecturers for this department.
  <form class="shadow p-3" action="" method="get">
  <div class="form-group row">
  &nbsp;&nbsp;
    <input type="text" name="batch" class="form-control col col-4" placeholder="Lecturer name" required>
    &nbsp;&nbsp;
  <button type="submit" class="btn btn-info">Go</button>
  </div>

</form>
  <br>
	 <table class="table">
		 <thead class="thead-light">
			 <tr>
				 <th scope="col">#</th>
				 <th scope="col">Full Name</th>
				 <th scope="col">Email</th>
				 <th scope="col">Mobile</th>
				 <th scope="col">Post</th>
				 <th scope="col">Batch Advising</th>
				</tr>
			</thead>
			<tbody>
     
      <?php
				$i =1;  
				while($row3 = mysqli_fetch_array($run3)){
				?>	<tr><?php
        $dte = substr($row3['creation_date'],0,10);
				echo "<th scope='row'>{$i}</th>";
        ?>  
				<td><a href="./lecturer_detail.php?id=<?php echo $row3['id'] ?>" class="st-name"><?php echo $row3['name'] ?><a></td>
        <?php
				echo "<td>{$row3['email']}</td>";
				echo "<td>{$row3['mobile']}</td>";
				echo "<td>{$row3['title']}</td>";
                if($row3['year']) {
				echo "<td> {$row3['year']} - " . (intval($row3['year']) + 4) . "</td>";
                } else {
                    echo "<td>NILL</td>";
                }
        
				$i++;
			}
			?>	</tr><?php
				?>
					

			</tbody>
		</table>
	</p>
      </div>

      <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
 <p>
 * Let's add some new Lecturer with a new energy. Following is the simple form for adding a new student record to the previous existing records.
 <form class="shadow p-3" action="" method="post">
  <div class="form-group">
    <label for="c-name">Lecturer Name :- </label>
    <input type="text" name="c-name" class="form-control" id="c-name" aria-describedby="c-name" placeholder="Enter Student Full Name. Ex :- Stephen Ola" required>
  </div>
 
  <div class="form-group">
    <label for="c-post">Lecural Post :- </label>
 
  <select class="custom-select" name="c-post" id="c-post" required>
    <option value="">Choose...</option>
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
    while($row4 = mysqli_fetch_array($run4)){
      $bfy = $row4['year'];
      $blly = $row4['year'] + 4;
      $biid = $row4['id'];
      ?>
      <option value="<?php echo $biid; ?>"><?php echo $bfy; ?> - <?php echo $blly; ?></option>
    <?php
    }
    ?>
    </select>
  </div>
 
  <div class="form-group">
    <label for="c-email">Email :- </label>
    <input type="email" name="c-email" class="form-control" id="c-email" aria-describedby="c-email" placeholder="Enter Student Email. Ex :- stephanyemmitty@gmail.com" required>
  </div>
  <div class="form-group">
    <label for="c-mobile">Mobile :- </label>
    <input type="text" name="c-mobile" class="form-control" id="c-mobile" aria-describedby="c-mobile" placeholder="Enter Student Mobile No without +234 prefix. Ex :- 8147702684" required>
  </div>
  
 
  <button type="submit" name="submit-form" class="btn btn-info">Submit</button>
</form>
	</p>     

      </div>



      <div class="tab-pane fade p-3" id="nav-post" role="tabpanel" aria-labelledby="nav-post-tab">
 <p>
 * Let's add some new Lecturer's post.
 <form class="shadow p-3" action="" method="post">
  <div class="form-group">
    <label for="c-name">Post Name :- </label>
    <input type="text" name="p-title" class="form-control" id="p-title" aria-describedby="p-title" placeholder="Enter Post Title. Ex :- HOD" required>
  </div>  
 
  <button type="submit" name="submit-post" class="btn btn-info">Submit</button>
</form>
</p>
    </div>
  </div>
  
<?php



// add new post

if(isset($_POST["submit-post"])) {
    $postTitle = $_POST['p-title'];

    $ck1 = "select * from `post` where title='$postTitle'";

    $rn1 = mysqli_query($conn,$ck1);
		$nm1 = mysqli_num_rows($rn1);
		if($nm1>0){
			echo '<script>alert("Student Data Already Exists!")</script>';
  
		}else{

		$query31 = "INSERT INTO `post` (`title`) VALUES ('$postTitle')";
		$run31 = mysqli_query($conn,$query31);

		if($run31){
      // header('location:classes.php?batch=2018');
      echo "<meta http-equiv='refresh' content='0'>";
		}else{
      // echo "no";
    }
    }
}

// add new class...
	if(isset($_POST['submit-form'])){
		$cname = $_POST['c-name'];
		$cpost = $_POST['c-post'];
		$cemail = $_POST['c-email'];
		$cadvising = $_POST['c-advising'];
		$cmobile = $_POST['c-mobile'];
    // echo $cname.$cbatch.$cemail.$croll.$cmobile;
    $ck2 = "select * from `lecturers` where name='$cname'";
		$rn2 = mysqli_query($conn,$ck2);
		$nm2 = mysqli_num_rows($rn2);
		if($nm2>0){
			echo '<script>alert("Student Data Already Exists!")</script>';
  
		}else{

		$query1 = "INSERT INTO `lecturers` (`post_id`,`email`,`mobile`,`batch_advising`,`name`,`date`) VALUES ('$cpost','$cemail','$cmobile','$cadvising','$cname',NOW())";
		$run1 = mysqli_query($conn,$query1);

		if($run1){
      // header('location:classes.php?batch=2018');
      echo "<meta http-equiv='refresh' content='0'>";
		}else{
      // echo "no";
    }
    }

	}

?>