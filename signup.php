<?php
include("server.php");

// REGISTER USER
try{
    if (isset($_POST['signUp'])) {
       // receive all input values from the form
       $fname = $_POST['fname'];
       $sname = $_POST['sname'];
       $position = $_POST['position'];
       $password_1 = $_POST['password_1'];
       $password_2 = $_POST['password_2'];
       $username = $_POST['username'];
       $email = $_POST['email'];
       $user_type = 'user';


       $query = "SELECT * FROM members WHERE username = :username";  
       $result = $db->prepare($query);  
       $result->execute( array('username' => $username));  
       $count = $result->rowCount(); 

        // form validation: ensure that the form is correctly filled
        if (empty($fname)) { array_push($errors, "Name required"); }
        if (empty($sname)) { array_push($errors, "Surname required"); }
        if ($position=='position') { array_push($errors, "Select Position"); }
        if (empty($password_1)) { array_push($errors, "Password required"); }
        if (empty($username)) { array_push($errors, "Reg Number required"); }
        if ($password_1 != $password_2) {array_push($errors, "Passwords Mismatch!");}

       //***CHECKING IF THE REG NUMBER HASNT BEEN USED BEFORE***
        elseif($count > 0 && count($errors) == 0){
               array_push($errors, "Reg Number Aready exist!");
           }
        

   // register user if there are no errors in the 
        

           if (count($errors) == 0) {
           $md5_password = md5($password_1);//encrypting the password before saving in the database
           $insert_query = "INSERT INTO members (name,surname,position,username,email,password,user_type) 
                   VALUES('$fname','$sname','$position','$username','$email','$md5_password','$user_type')";
           $count = $db->exec($insert_query);  
           //$db = null;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password_1;
        header('Location: home.php');
        echo "WE ARE HERE";
           exit();
           }
       } 
           }catch (PDOException $e) {
               echo $e->getMessage(); 
         }

         include("header_1.html");
         include("signup.html");
         include("footer.html");

?>