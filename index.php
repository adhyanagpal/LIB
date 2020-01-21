<?php 	

include('config/db_connect.php');


 ?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container">
	<h2 class="brown-text">LANDING PAGE</h2>

	<a href="addpublisher.php">Add a new Publisher</a> <br>

	<a href="viewpublishers.php">View all Publishers</a> <br>

	<a href="addbook.php">Add a new Book</a> <br>

	<a href="viewbooks.php">View all Books</a> <br>

	<a href="addstudent.php">Add a new Student</a> <br>

	<a href="viewstudents.php">View all Students</a> <br>

	<a href="addstaffmem.php">Add a new Staffmember</a> <br>

	<a href="viewstaffmems.php">View all Staffmembers</a> <br>

	<a href="issuebook.php">Issue a Book</a> <br>

	<a href="returnbook.php">Return a Issued Book</a> <br>

	<a href="viewissued.php">View all Issued Books</a> <br>
	
</div>
<?php include('templates/footer.php'); ?>
</html>