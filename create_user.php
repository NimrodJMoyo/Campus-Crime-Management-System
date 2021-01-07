<?php 
include('server.php');
try{
    if (isset($_POST['add_user'])) {
      
       $username = $_POST['username'];
       $email = $_POST['email'];
	   $user_type = $_POST['user_type'];
	   $password_1 = $_POST['password_1'];
       $password_2 = $_POST['password_2'];


       $query = "SELECT * FROM members WHERE username = :username";  
       $result = $db->prepare($query);  
       $result->execute( array('username' => $username));  
       $count = $result->rowCount(); 

        // form validation: ensure that the form is correctly filled
        if ($position=='position') { array_push($errors, "Select user type"); }
        if (empty($password_1)) { array_push($errors, "Password required"); }
        if (empty($username)) { array_push($errors, "username required"); }
        if ($password_1 != $password_2) {array_push($errors, "Passwords Mismatch!");}

       //***CHECKING IF THE REG NUMBER HASNT BEEN USED BEFORE***
        elseif($count > 0 && count($errors) == 0){
               array_push($errors, "username is Aready Taken!");
           }
        

   // register user if there are no errors in the 
        

           if (count($errors) == 0) {
           $md5_password = md5($password_1);//encrypting the password before saving in the database
           $insert_query = "INSERT INTO members (username,email,password,user_type) 
                   VALUES('$username','$email','$md5_password','$user_type')";
           $count = $db->exec($insert_query);  
           //$db = null;
          $_SESSION['message'] = "you have succesifully created $user_type account for $username.";

        header('Location: home.php');
           exit();
           }
       } 
           }catch (PDOException $e) {
               echo $e->getMessage(); 
         }

include("header_2.html");
         
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/create_user.css">
</head>
<body>
	<div class="header bg-info">
        <h2>Admin - create user</h2>
        <img src="images/user.png"/>
	</div>
	
	<form method="post" action="create_user.php">

		<?php //echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="security">Security</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn btn-md btn-primary" name="add_user"> + Add user</button>
		</div>
    </form>
    
</body>
</html>
<?php
include("footer.html");
?>