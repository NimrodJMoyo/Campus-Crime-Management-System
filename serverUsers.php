<?php 
	// variable declaration to avoid undefined variable errors
	$fname = "";
	$sname = "";
	$position = "";
	$password= "";
	$username= "";
	$email    = "";
	$password_1 = "";
	$errors = array(); 
	$database = "CCRMS";
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', $database);

	// REGISTER USER
	if (isset($_POST['signUp'])) {
		// receive all input values from the form
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$sname = mysqli_real_escape_string($db, $_POST['sname']);
		$position = mysqli_real_escape_string($db, $_POST['position']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$reg_number = mysqli_real_escape_string($db, $_POST['reg_number']);
		$email = mysqli_real_escape_string($db, $_POST['email']);

		// form validation: ensure that the form is correctly filled
		if (empty($fname)) { array_push($errors, "Username required"); }
		if (empty($sname)) { array_push($errors, "Surname required"); }
		if ($position=='position') { array_push($errors, "Select Position"); }
		if (empty($password_1)) { array_push($errors, "Password required"); }
		if (empty($reg_number)) { array_push($errors, "Reg Number required"); }
		//if (($reg_number)) { array_push($errors, "Your Reg Number have already been registered"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Passwords Mismatch!");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password_1 = md5($password_1);//encrypting the password before saving in the database
			$query = "INSERT INTO members (name,surname,position,reg_number,email,password) 
					  VALUES('$fname','$sname','$position','$reg_number','$email','$password_1')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $fname;
			$_SESSION['success'] = "You are now logged in";
			header('location: reportCrime.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db, $_POST['reg_number']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username required");
		}
		if (empty($password)) {
			array_push($errors, "Password required");
		}

		if (count($errors) == 0) {
			$password = md5($password); //password encryption to match encrypted one
			$query = "SELECT * FROM members WHERE reg_number='$username' AND password ='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['reg_number'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: reportCrime.php');
			}else {
				array_push($errors, "Either Username or Password is incorrect!");
			}
		}
	}

?>

