<?php 

include('config/db_connect.php');

$mem_id = $book_id = $issue_date = $error1 = $error2 = $error3 = '';
$errors = array('mem_id' => '','book_id' => '');

if(isset($_POST['submit'])){

	if(empty($_POST['mem_id'])){
			$errors['mem_id'] = 'Member ID is required';
		} else{
			$mem_id = $_POST['mem_id'];
		}
	if(empty($_POST['book_id'])){
			$errors['book_id'] = 'Book ID is required';
		} else{
			$book_id = $_POST['book_id'];
		}
	

	if(array_filter($errors)){
			// echo 'errors in form';
		} else {
			// echo 'no errors';
			$mem_id = mysqli_real_escape_string($conn, $_POST['mem_id']);
			$book_id = mysqli_real_escape_string($conn, $_POST['book_id']);


			$sql1 = "SELECT timestampdiff(year,mem_dob,curdate()) as 'age' FROM Member where Member.mem_id = '$mem_id'";

			$result = mysqli_query($conn, $sql1);
			
			$val1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			
			foreach ($val1 as $val) {
				# code...
				if($val['age']>60){

					$error1 = "The Member ID retired!";

				} else {

					$sql2 = "SELECT quantity FROM Books where Books.book_id = '$book_id'";

					$result2 = mysqli_query($conn, $sql2);
					
					$val2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
					mysqli_free_result($result2);

					foreach ($val2 as $val) {

						if($val['quantity']==0){

							$error2 = "The Book unavaliable!";

						} else {
							
							//now insert
							$sql_ = "INSERT INTO Issued(book_id,mem_id,issue_date) VALUES ('$book_id','$mem_id',curdate())";

							if(mysqli_query($conn, $sql_)){
								echo "INSERTED!!!";
								header('Location: viewissued.php');
							} else {
								$error3 = mysqli_error($conn);
							}

							// if($error3 == ''){
							// 	header('Location: viewissued.php');
							// }
									
						}
						
					}

					
				}
			}
			


		}

}

 ?>

 <!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container" id="cardz">
	<h2 class="brown-text">Issue a Book</h2>
	<div class="row">
		<form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    	<div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Member ID" id="mem_id" name="mem_id" type="text" class="validate">
          <label for="mem_id">Member ID *</label>
          <div class="red-text"><?php echo $errors['mem_id']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Book ID" id="book_id" name="book_id" type="text" class="validate">
          <label for="book_id">Book ID*</label>
          <div class="red-text"><?php echo $errors['book_id']; ?></div>
        </div>
        </div>

       
      <div class="center">
      	<div class="red-text"><?php echo $error1; echo $error2; echo $error3; ?></div>
		<input type="submit" name="submit" value="ADD" class="btn brown z-depth-1 center">
		
	  </div>
     
    </form>

	</div>
</div>

<?php include('templates/footer.php'); ?>
</html>
