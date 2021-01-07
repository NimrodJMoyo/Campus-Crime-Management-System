<?php 
session_start();
	// variable declaration to avoid undefined variable errors
	$dbpassword = '';
	$dbusername = 'root';
	$username = "";
	$fname = "";
	$sname = "";
	$position = "";
	$password= "";
	$username= "";
	$email    = "";
	$password_1 = "";
	$errors = array(); 
	//$database = 'ccrms';
	$_SESSION['message'] = ""; 
	$hostname = 'localhost'; 
	
	// ***** Connection to database ******
 
try { $db = new PDO("mysql:host=$hostname; dbname=ccrms", $dbusername, $dbpassword);
	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
			 echo $e->getMessage();
			}
	

if(isset($_SESSION['username']))//*** CHECKING ACCESS LEVELS AND LOADING APPROPRIATE HEADERS
			{
			
			function session_parameters_loader(){
				Global $db;
			
				  $retrieve_query = "SELECT * FROM members WHERE username = :username";   
				  $result = $db->prepare($retrieve_query);
				  $result->execute(['username' => $_SESSION['username']]); 
				  $user = $result->fetch();
			  
				  // Assigning fetched data to variables
				  $_SESSION['user_type'] = $user['user_type']; 
				  $_SESSION['fname'] = $user['name'];
				  $_SESSION['sname'] = $user['surname'];
				  $_SESSION['position'] = $user['position'];
				  $_SESSION['email'] = $user['email'];
				
			  }
	   }
	  
?>
