<?php 

include('config/db_connect.php');

$sql = 'SELECT * FROM member WHERE mem_id in (select mem_id from staff)';
	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
	// fetch the resulting rows as an array
	$staffs = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// free the $result from memory (good practise)
	mysqli_free_result($result);
	// close connection
	mysqli_close($conn);

 ?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container brown-text">
 	<h2>Staff Members</h2>
 	<div class="row">

	<?php foreach($staffs as $staff){ ?>
	  <div class="col s12 l6">
	  	<div class="card">
	  	   <div class="card-content">
	  		 <span class="card-title brown-text"><strong>Staff Member Name:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($staff['mem_name']); ?></span>

	  		 <span class="card-title brown-text"><strong>Staff Member Date of Birth:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($staff['mem_dob']); ?></span>

	  		 <span class="card-title brown-text"><strong>Staff Member Contact Number:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($staff['mem_contact']); ?></span>

	  		 <span class="card-title brown-text"><strong>Staff Member Email:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($staff['mem_email']); ?></span>

	  		 <span class="card-title brown-text"><strong>Staff Member Address:</strong> &nbsp;<?php echo htmlspecialchars($staff['mem_address_street']); ?>
	  		 	 , <?php echo htmlspecialchars($staff['mem_address_city']); ?>
	  		 </span>

	  		 <span class="card-title brown-text"><strong>Staff Member ID:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($staff['mem_id']); ?></span>

	  		 
	  	   </div>
	  	</div>
	  </div>
	<?php } ?>

	</div>

 </div>


<?php include('templates/footer.php'); ?>
</html>