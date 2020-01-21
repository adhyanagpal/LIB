<?php 

include('config/db_connect.php');

$mem_name = $mem_id = $mem_dob = $mem_contact = $mem_email = $mem_address_street = $mem_address_city = $error1 = $error2 = '';
$errors = array('mem_name' => '','mem_id' => '','mem_dob'=>'','mem_contact'=>'','mem_email'=>'','mem_address_street' => '','mem_address_city' => '');

if(isset($_POST['submit'])){

	if(empty($_POST['mem_name'])){
			$errors['mem_name'] = 'Staff Member Name is required';
		} else{
			$mem_name = $_POST['mem_name'];
		}
	if(empty($_POST['mem_id'])){
			$errors['mem_id'] = 'Staff Member ID is required';
		} else{
			$mem_id = $_POST['mem_id'];
		}
	if(empty($_POST['mem_dob'])){
			$errors['mem_dob'] = 'Staff Member Date of Birth is required';
		} else{
			$mem_dob = $_POST['mem_dob'];
		}
	if(empty($_POST['mem_contact'])){
			$errors['mem_contact'] = 'Staff Member Contact is required';
		} else{
			$mem_contact = $_POST['mem_contact'];
		}
	if(empty($_POST['mem_email'])){
			$errors['mem_email'] = 'Staff Member Email is required';
		} else{
			$mem_email = $_POST['mem_email'];
		}
	if(empty($_POST['mem_address_street'])){
			$errors['mem_address_street'] = 'Staff Member Street is required';
		} else{
			$mem_address_street = $_POST['mem_address_street'];
		}
	if(empty($_POST['mem_address_city'])){
			$errors['mem_address_city'] = 'Staff Member City is required';
		} else{
			$mem_address_city = $_POST['mem_address_city'];
		}
	

	if(array_filter($errors)){
			// echo 'errors in form';
		} else {
			// echo 'no errors';
			$mem_name = mysqli_real_escape_string($conn, $_POST['mem_name']);
			$mem_id = mysqli_real_escape_string($conn, $_POST['mem_id']);
			$mem_email = mysqli_real_escape_string($conn, $_POST['mem_email']);
			$mem_contact = mysqli_real_escape_string($conn, $_POST['mem_contact']);
			$mem_dob = mysqli_real_escape_string($conn, $_POST['mem_dob']);
			$mem_address_city = mysqli_real_escape_string($conn, $_POST['mem_address_city']);
			$mem_address_street = mysqli_real_escape_string($conn, $_POST['mem_address_street']);
			

			$sql_1 = "INSERT INTO Member VALUES ('$mem_id','$mem_dob','$mem_name','$mem_address_city','$mem_address_street','$mem_contact','$mem_email')";

			if(mysqli_query($conn, $sql_1)){
				// echo "INSERTED!!!";
				$sql_2 = "INSERT INTO Staff VALUES ('$mem_id')";
				if(mysqli_query($conn, $sql_2)){
					// echo "INSERTED!!!";
					header('Location: viewstaffmems.php');
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
 	<h2>Add a New Staff Member</h2>
 	<div class="row">
    <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    	<div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Staff Member Name" id="mem_name" name="mem_name" type="text" class="validate">
          <label for="mem_name">Staff Member Name*</label>
          <div class="red-text"><?php echo $errors['mem_name']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Staff Member ID" id="mem_id" name="mem_id" type="text" class="validate">
          <label for="mem_id">Staff Member ID*</label>
          <div class="red-text"><?php echo $errors['mem_id']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Staff Member Address: Street" id="mem_address_street" name="mem_address_street" type="text" class="validate">
          <label for="mem_address_street">Staff Member Address: Street*</label>
          <div class="red-text"><?php echo $errors['mem_address_street']; ?></div>
        </div>
        </div>

     	<div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Staff Member Address: City" id="mem_address_city" name="mem_address_city" type="text" class="validate">
          <label for="mem_address_city">Staff Member Address: City*</label>
          <div class="red-text"><?php echo $errors['mem_address_city']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Staff Member Date of Birth" id="mem_dob" name="mem_dob" type="text" class="validate">
          <label for="mem_dob">Staff Member Date of Birth*</label>
          <div class="red-text"><?php echo $errors['mem_dob']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Staff Member Contact Number" id="mem_contact" name="mem_contact" type="text" class="validate">
          <label for="mem_contact">Staff Member Contact Number*</label>
          <div class="red-text"><?php echo $errors['mem_contact']; ?></div>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Staff Member Email" id="mem_email" name="mem_email" type="email" class="validate">
          <label for="mem_email">Staff Member Email*</label>
          <div class="red-text"><?php echo $errors['mem_email']; ?></div>
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