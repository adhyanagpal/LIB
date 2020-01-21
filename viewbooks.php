<?php 	

include('config/db_connect.php');

$sql = 'SELECT book_id,quantity,edition,price,title,author FROM Books';
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
	<h2 class="brown-text">Books</h2>
	<div class="row">

	<?php foreach($books as $book){ ?>
	  <div class="col s12 l6">
	  	<div class="card">
	  	   <div class="card-content">
	  		 <span class="card-title brown-text"><strong>Book Title:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($book['title']); ?></span>

	  		  <span class="card-title brown-text"><strong>Book Price:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($book['price']); ?></span>

	  		  <span class="card-title brown-text"><strong>Book Author Name:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($book['author']); ?></span>
	  	   
	  		  <span class="card-title brown-text"><strong>Book Edition:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($book['edition']); ?></span>

	  		  <span class="card-title brown-text"><strong>Book Quantity:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($book['quantity']); ?></span>
	  	  
	  		 <span class="card-title brown-text"><strong>Book ID:</strong> &nbsp;
	  		 	<?php echo htmlspecialchars($book['book_id']); ?></span>


	  	   </div>
	  	</div>
	  </div>
	<?php } ?>

	</div>
</div>


<?php include('templates/footer.php'); ?>
</html>