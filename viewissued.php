<?php 


include('config/db_connect.php');

$sql = 'SELECT book_id,mem_id,issue_date FROM Issued';
	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
	// fetch the resulting rows as an array
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// free the $result from memory (good practise)
	mysqli_free_result($result);
	// close connection
	mysqli_close($conn);

 ?>

 <!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container" id="cardz">
	<h2 class="brown-text">Issued Books</h2>
	<div class="row">


	<?php foreach($books as $book){ ?>
	  <div class="col s12 l6">
	  	<div class="card">
	  	   <div class="card-content">

	  		 <span class="card-title brown-text"><strong>Member ID:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($book['mem_id']); ?></span>
	  		 
	  		 <span class="card-title brown-text"><strong>Book ID:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($book['book_id']); ?></span>

	  		 <span class="card-title brown-text"><strong>Issue Date:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($book['issue_date']); ?></span>


	  	   </div>
	  	</div>
	  </div>
	<?php } ?>

	</div>
</div>

<?php include('templates/footer.php'); ?>
</html>
