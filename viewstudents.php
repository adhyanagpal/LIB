<?php 

include('config/db_connect.php');

$sql = 'SELECT member.mem_id,mem_dob,mem_name,mem_address_city,mem_address_street,mem_contact,mem_email,branch,degree,yearOfPassing FROM member,student WHERE member.mem_id=student.mem_id';
	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
	// fetch the resulting rows as an array
	$studs = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// free the $result from memory (good practise)
	mysqli_free_result($result);
	// close connection
	mysqli_close($conn);

 ?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container brown-text">
 	<h2>Students</h2>
 	<div class="row">

	<?php foreach($studs as $Student){ ?>
	  <div class="col s12 l6">
	  	<div class="card">
	  	   <div class="card-content">
	  		 <span class="card-title brown-text"><strong>Student Name:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($Student['mem_name']); ?></span>

	  		 <span class="card-title brown-text"><strong>Student Date of Birth:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($Student['mem_dob']); ?></span>

	  		 <span class="card-title brown-text"><strong>Student Contact Number:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($Student['mem_contact']); ?></span>

	  		 <span class="card-title brown-text"><strong>Student Email:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($Student['mem_email']); ?></span>

	  		 <span class="card-title brown-text"><strong>Student Address:</strong> &nbsp;<?php echo htmlspecialchars($Student['mem_address_street']); ?>
	  		 	 , <?php echo htmlspecialchars($Student['mem_address_city']); ?>
	  		 </span>

	  		 <span class="card-title brown-text"><strong>Student ID:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($Student['mem_id']); ?></span>

	  		 <span class="card-title brown-text"><strong>Student Branch:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($Student['branch']); ?></span>

	  		 <span class="card-title brown-text"><strong>Student Degree:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($Student['degree']); ?></span>

	  		 <span class="card-title brown-text"><strong>Student Year of Passing:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($Student['yearOfPassing']); ?></span>

	  		 
	  	   </div>
	  	</div>
	  </div>
	<?php } ?>

	</div>

 </div>


<?php include('templates/footer.php'); ?>
</html>