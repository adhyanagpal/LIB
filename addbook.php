<?php 	

include('config/db_connect.php');
$title = $book_id = $price = $author = $editon = $quantity = $pub_id = $error1 = $error2 = '';
$errors = array('title' => '','book_id' => '','pub_id' => '','price' => '','author' => '','edition' => '','quantity' => '');

if(isset($_POST['submit'])){

	if(empty($_POST['title'])){
			$errors['title'] = 'Title is required';
		} else{
			$title = $_POST['title'];
		}
	if(empty($_POST['book_id'])){
			$errors['book_id'] = 'Book ID is required';
		} else{
			$book_id = $_POST['book_id'];
		}
	if(empty($_POST['price'])){
			$errors['price'] = 'Book Price is required';
		} else{
			$price = $_POST['price'];
		}
	if(empty($_POST['author'])){
			$errors['author'] = 'Author Name is required';
		} else{
			$author = $_POST['author'];
		}
	if(empty($_POST['edition'])){
			$errors['edition'] = 'Edition Number is required';
		} else{
			$edition = $_POST['edition'];
		}
	if(empty($_POST['quantity'])){
			$errors['quantity'] = 'Quantity is required';
		} else{
			$quantity = $_POST['quantity'];
		}
	if(empty($_POST['pub_id'])){
			$errors['pub_id'] = 'Publisher ID is required';
		} else{
			$pub_id = $_POST['pub_id'];
		}
	if(array_filter($errors)){
			// echo 'errors in form';
		} else {
			// echo 'no errors';
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
			$author = mysqli_real_escape_string($conn, $_POST['author']);
			$price = mysqli_real_escape_string($conn, $_POST['price']);
			$author = mysqli_real_escape_string($conn, $_POST['author']);
			$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
			$pub_id = mysqli_real_escape_string($conn, $_POST['pub_id']);

			$sql_pub = "INSERT INTO Books VALUES ('$book_id',$quantity,$edition,$price,'$title','$author')";

			if(mysqli_query($conn, $sql_pub)){
				// echo "INSERTED!!!";
				$sql_pubby = "INSERT INTO Published_by VALUES ('$book_id','$pub_id')";
				if(mysqli_query($conn, $sql_pubby)){
					// echo "INSERTED!!!";
					header('Location: viewbooks.php');
				} else {
					$error2 = mysqli_error($conn);
				}
			} else {
				$error1 = mysqli_error($conn);
			}

			
		}
	}


 ?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container brown-text">
 	<h2>Add a New Book</h2>
  <div class="row">
    <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    	<div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Book Title" id="title" name="title" type="text" class="validate">
          <label for="title">Book Title*</label>
          <div class="red-text"><?php echo $errors['title']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Book ID" id="book_id" name="book_id" type="text" class="validate">
          <label for="book_id">Book ID*</label>
          <div class="red-text"><?php echo $errors['book_id']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Book Price" id="price" name="price" type="text" class="validate">
          <label for="price">Book Price*</label>
          <div class="red-text"><?php echo $errors['price']; ?></div>
        </div>
        </div>

     	<div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Author Name" id="author" name="author" type="text" class="validate">
          <label for="author">Author Name*</label>
          <div class="red-text"><?php echo $errors['author']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Edition Number" id="edition" name="edition" type="text" class="validate">
          <label for="edition">Edition Number*</label>
          <div class="red-text"><?php echo $errors['edition']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Quantity" id="quantity" name="quantity" type="text" class="validate">
          <label for="quantity">Quantity*</label>
          <div class="red-text"><?php echo $errors['quantity']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Publisher ID" id="pub_id" name="pub_id" type="text" class="validate">
          <label for="pub_id">Publisher ID*</label>
          <div class="red-text"><?php echo $errors['pub_id']; ?></div>
        </div>
        </div>
      
      <div class="center">
      	<div class="red-text"><?php echo $error1; echo $error2; ?></div>
		<input type="submit" name="submit" value="ADD" class="btn brown z-depth-1 center">
		
	  </div>
     
    </form>
   </div>
</div>




<?php include('templates/footer.php'); ?>
</html>