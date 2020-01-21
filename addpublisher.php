<?php 	

include('config/db_connect.php');

$pub_name = $pub_id = $pub_addr_street = $pub_addr_city = $pub_con = $error1 = $error2 = '';
$errors = array('pub_name' => '','pub_id' => '','pub_addr_street' => '','pub_addr_city' => '','pub_con'=>'');


if(isset($_POST['submit'])){

	if(empty($_POST['pub_name'])){
			$errors['pub_name'] = 'Publisher Name is required';
		} else{
			$pub_name = $_POST['pub_name'];
		}
	if(empty($_POST['pub_id'])){
			$errors['pub_id'] = 'Publisher ID is required';
		} else{
			$pub_id = $_POST['pub_id'];
		}
	if(empty($_POST['pub_addr_street'])){
			$errors['pub_addr_street'] = 'Publisher Street is required';
		} else{
			$pub_addr_street = $_POST['pub_addr_street'];
		}
	if(empty($_POST['pub_addr_city'])){
			$errors['pub_addr_city'] = 'Publisher City is required';
		} else{
			$pub_addr_city = $_POST['pub_addr_city'];
		}
	if(empty($_POST['pub_con'])){
			$errors['pub_con'] = 'Publisher Contact is required';
		} else{
			$pub_con = $_POST['pub_con'];
		}
	if(array_filter($errors)){
			// echo 'errors in form';
		} else {
			// echo 'no errors';
			$pub_name = mysqli_real_escape_string($conn, $_POST['pub_name']);
			$pub_id = mysqli_real_escape_string($conn, $_POST['pub_id']);
			$pub_addr_city = mysqli_real_escape_string($conn, $_POST['pub_addr_city']);
			$pub_addr_street = mysqli_real_escape_string($conn, $_POST['pub_addr_street']);
			$pub_con = mysqli_real_escape_string($conn, $_POST['pub_con']);

			$sql_pub = "INSERT INTO Publisher VALUES ('$pub_id','$pub_name','$pub_addr_city','$pub_addr_street')";

			$conarr = explode(',', $pub_con);


			if(mysqli_query($conn, $sql_pub)){
				// echo "INSERTED!!!";
				foreach ($conarr as $con) {

					$sql_pubcon = "INSERT INTO Pub_contact VALUES ('$pub_id','$con')";
					if(mysqli_query($conn, $sql_pubcon)){
						// echo "INSERTED!!!";
					} else {
						$error2 = mysqli_error($conn);
						break;
					}

				}
				if($error2==''){
					header('Location: viewpublishers.php');
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

<!-- <h1>Add Pub PAGE</h1> -->
<div class="container brown-text">
 	<h2>Add a New Publisher</h2>
  <div class="row">
    <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    	<div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Publisher Name" id="pub_name" name="pub_name" type="text" class="validate">
          <label for="pub_name">Publisher Name*</label>
          <div class="red-text"><?php echo $errors['pub_name']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Publisher ID" id="pub_id" name="pub_id" type="text" class="validate">
          <label for="pub_id">Publisher ID*</label>
          <div class="red-text"><?php echo $errors['pub_id']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Publisher Address: Street" id="pub_addr_street" name="pub_addr_street" type="text" class="validate">
          <label for="pub_addr_street">Publisher Address: Street*</label>
          <div class="red-text"><?php echo $errors['pub_addr_street']; ?></div>
        </div>
        </div>

     	<div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Publisher Address: City" id="pub_addr_city" name="pub_addr_city" type="text" class="validate">
          <label for="pub_addr_city">Publisher Address: City*</label>
          <div class="red-text"><?php echo $errors['pub_addr_city']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Publisher Contact" id="pub_con" name="pub_con" type="text" class="validate">
          <label for="pub_con">Publisher Contact* (separated by commas)</label>
          <div class="red-text"><?php echo $errors['pub_con']; ?></div>
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