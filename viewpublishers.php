<?php 	

include('config/db_connect.php');

$sql = 'SELECT pub_id,pub_name,pub_addr_city,pub_addr_street FROM Publisher';
	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
	// fetch the resulting rows as an array
	$pubs = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// free the $result from memory (good practise)
	mysqli_free_result($result);
	// close connection
	mysqli_close($conn);

 ?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container" id="cardz">
	<h2 class="brown-text">Publishers</h2>
	<div class="row">

	<?php foreach($pubs as $pub){ ?>
	  <div class="col s12 l6">
	  	<div class="card">
	  	   <div class="card-content">
	  		 <span class="card-title brown-text"><strong>Publisher Name:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($pub['pub_name']); ?></span>
	  	   
	  		 <span class="card-title brown-text"><strong>Publisher Address:</strong> &nbsp;<?php echo htmlspecialchars($pub['pub_addr_street']); ?>
	  		 	 , <?php echo htmlspecialchars($pub['pub_addr_city']); ?>
	  		 </span>
	  	  
	  		 <span class="card-title brown-text"><strong>Publisher ID:</strong> &nbsp;<?php echo htmlspecialchars($pub['pub_id']); ?></span>
	  	   </div>
	  	</div>
	  </div>
	<?php } ?>

	</div>
</div>

<?php include('templates/footer.php'); ?>
</html>




 
