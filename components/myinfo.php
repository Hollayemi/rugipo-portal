
<?php
    include("connection.php");

    if (!isset($_SESSION['email'])) {
    header("Location: slogin.php");
    exit();
}
?>

<?php 
$email = $_SESSION['email'];

$query2 = "SELECT * FROM `students` where email = '$email' LIMIT 1 ";
$run2 = mysqli_query($conn,$query2);
 
while($row2 = mysqli_fetch_array($run2)){
  $sname =  $row2['name'];
  $sroll =  $row2['roll_number'];
  $semail =  $row2['email'];
  $smobile =  $row2['mobile'];
  $sdate = $row2['date'];
  $sbid = $row2['batch_id'];
}


$query3 = "SELECT * FROM `batches` where id = '$sbid' LIMIT 1 ";
$run3 = mysqli_query($conn,$query3);
 
while($row3 = mysqli_fetch_array($run3)){
  $sbsy = $row3['year'];
  $sbly = $row3['year'] + 4;
}

$query4 = "SELECT * FROM `students` where batch_id = '$sbid' ";
$run4 = mysqli_query($conn,$query4);

$query41 = "SELECT * FROM `students` where batch_id = '$sbid' ";
$run41 = mysqli_query($conn,$query41);

$query5 = "SELECT * FROM `lecturers` where batch_advising = '$sbid' ";
$run5 = mysqli_query($conn, $query5);

$query6 = "SELECT lecturers.*, post.*, batches.* 
           FROM lecturers 
           LEFT JOIN batches ON lecturers.batch_advising = batches.id 
           LEFT JOIN post ON lecturers.post_id = post.id 
           ORDER BY lecturers.post_id ASC";
$run6 = mysqli_query($conn,$query6);
 

?>

<div class="container my-5 mt-10">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link btn btn-success active" id="nav-mate-tab" data-bs-toggle="tab" data-bs-target="#nav-mate" type="button" role="tab" aria-controls="nav-mate" aria-selected="true">Classmates</button>
	    &nbsp;&nbsp;
        <button class="nav-link btn btn-success active" id="nav-reps-tab" data-bs-toggle="tab" data-bs-target="#nav-reps" type="button" role="tab" aria-controls="nav-reps" aria-selected="true">Class Reps</button>
	    &nbsp;&nbsp;
        <button class="nav-link btn btn-primary" id="nav-lecturers-tab" data-bs-toggle="tab" data-bs-target="#nav-lecturers" type="button" role="tab" aria-controls="nav-lecturers" aria-selected="false">Lecturers</button>
	    &nbsp;&nbsp;
        <button class="nav-link btn btn-info" id="nav-advisers-tab" data-bs-toggle="tab" data-bs-target="#nav-advisers" type="button" role="tab" aria-controls="nav-advisers" aria-selected="false">Level Adviser</button>
      </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active p-3" id="nav-mate" role="tabpanel" aria-labelledby="nav-mate-tab">
          <p>* Following are your classmates
          <form class="shadow p-3" action="" method="get">
              <div class="form-group row">
                  &nbsp;&nbsp;
                  <input type="text" name="batch" class="form-control col col-4" placeholder="Enter name" required>
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
                      <th scope="col">Batch</th>
                  </tr>
              </thead>
              <tbody>
       
              <?php
                  $i =1;  
                  while($row4 = mysqli_fetch_array($run4)){
                  ?>	
                  <tr>
                      <?php
                  $dte = substr($row4['creation_date'],0,10);
                  echo "<th scope='row'>{$i}</th>";
              ?>  
                  <td><a href="./lecturer_detail.php?id=<?php echo $row4['id'] ?>" class="st-name"><?php echo $row4['name'] ?><a></td>
                      <?php
                          echo "<td>{$row4['email']}</td>";
                          echo "<td>{$row4['mobile']}</td>";
                          echo "<td>{$row4['post']}</td>";
                          if($sbly) {
                          echo "<td> {$sbsy} - {$sbly}</td>";
                          } else {
                              echo "<td>NILL</td>";
                          }
                  
                          $i++;
                      }
                      ?>
                      </tr>
                      
  
              </tbody>
          </table>
          </p>
        </div>
        
        <div class="tab-pane fade p-3" id="nav-reps" role="tabpanel" aria-labelledby="nav-reps-tab">
            <p>* Following are class representatives
        <form class="shadow p-3" action="" method="get">
            <div class="form-group row">
                &nbsp;&nbsp;
                <input type="text" name="batch" class="form-control col col-4" placeholder="Enter name" required>
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
                    <th scope="col">Batch</th>
                </tr>
			</thead>
			<tbody>
     
            <?php
				$i =1;  
				while($row41 = mysqli_fetch_array($run41)){
                    if($row41['post'] != "") {
				?>	
                <tr>
                    <?php
                $dte = substr($row41['creation_date'],0,10);
				echo "<th scope='row'>{$i}</th>";
            ?>
				<td><?php echo $row41['name'] ?></td>
                    <?php
                        echo "<td>{$row41['email']}</td>";
                        echo "<td>{$row41['mobile']}</td>";
                        echo "<td>{$row41['post']}</td>";
                        if($sbly) {
                                echo "<td> {$sbsy} - {$sbly}</td>";
                            } else {
                                echo "<td>NILL</td>";
                            }
                            $i++;
                        }
                    }
                    ?>
                    </tr>
        			

			</tbody>
		</table>
	    </p>
      </div>

      <div class="tab-pane fade  p-3" id="nav-lecturers" role="tabpanel" aria-labelledby="nav-lecturers-tab">
        <p>* Following are your lecturers
        <form class="shadow p-3" action="" method="get">
            <div class="form-group row">
                &nbsp;&nbsp;
                <input type="text" name="batch" class="form-control col col-4" placeholder="Enter name" required>
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
				while($row6 = mysqli_fetch_array($run6)){
				?>	
                <tr>
                    <?php
                $dte = substr($row6['creation_date'],0,10);
				echo "<th scope='row'>{$i}</th>";
            ?>  
				<td><?php echo $row6['name'] ?></td>
                    <?php
                        echo "<td>{$row6['email']}</td>";
                        echo "<td>{$row6['mobile']}</td>";
                        echo "<td>{$row6['title']}</td>";
                        if($sbly) {
                        echo "<td> {$sbsy} - {$sbly}</td>";
                        } else {
                            echo "<td>NILL</td>";
                        }
                
                        $i++;
                    }
                    ?>
                    </tr>
        			

			</tbody>
		</table>
	    </p>
      </div>

      <div class="tab-pane fade  p-3" id="nav-advisers" role="tabpanel" aria-labelledby="nav-advisers-tab">
        <p>* Following are your level advisers
        <form class="shadow p-3" action="" method="get">
            <div class="form-group row">
                &nbsp;&nbsp;
                <input type="text" name="batch" class="form-control col col-4" placeholder="Enter name" required>
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
                    <th scope="col">Batch Advising</th>
                </tr>
			</thead>
			<tbody>
     
            <?php
				$i =1;  
				while($row3 = mysqli_fetch_array($run5)){
				?>	
                <tr>
                    <?php
                $dte = substr($row3['creation_date'],0,10);
				echo "<th scope='row'>{$i}</th>";
            ?>  
				<td><a href="./lecturer_detail.php?id=<?php echo $row3['id'] ?>" class="st-name"><?php echo $row3['name'] ?><a></td>
                    <?php
                        echo "<td>{$row3['email']}</td>";
                        echo "<td>{$row3['mobile']}</td>";
                        if($sbly) {
                        echo "<td> {$sbsy} - {$sbly}</td>";
                        } else {
                            echo "<td>NILL</td>";
                        }
                
                        $i++;
                    }
                    ?>
                    </tr>
        			

			</tbody>
		</table>
	    </p>
      </div>

      
    </div>
</div>