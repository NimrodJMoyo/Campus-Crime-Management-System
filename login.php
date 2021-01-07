<?php
include("server.php");
    if (isset($_POST['login'])) {
       $username = $_POST['username'];
       $user_password = $_POST['user_password'];

       if (empty($username)) {
           array_push($errors, "Username required");
       }
       if (empty($user_password)) {
           array_push($errors, "Password required");
       }

       if (count($errors) == 0) {

         $user_password = md5($user_password); //password encryption to match encrypted one
            try{
           
           $query = "SELECT * FROM members WHERE username = :username AND password = :user_password";  
               $result = $db->prepare($query);  
               $result->execute(  
                   array(  
                       'username' => $username,  
                       'user_password' => $user_password 
                   )  
            );  
               $count = $result->rowCount(); 
              
               if($count > 0){  
                
                   $_SESSION["username"] = $username;
                   $_SESSION["password"] = $user_password;
                   header('location: home.php');
                   //echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                   }else{  
                   array_push($errors, "Either Username or Password is incorrect!"); } 

               } catch(PDOException $error) {
                $message = $error->getMessage();
           }
       } 
    } 

// ***** INCLUDING LOGIN FORM ******
    include("header_1.html");

    while (isset($_SESSION['error'])){
        //echo $_SESSION['error'];
        echo "<div class='notloggederror'>";
        echo $_SESSION['error'];
        $_SESSION['error']='';
        echo "</div>";
        break;
}
    include("login.html");
    // echo "<style>

    // .notloggederror {
    //     width: 92%; 
    //     margin: 0px auto; 
    //     padding: 10px; 
    //     border: 1px solid #a94442; 
    //     color: #a94442; 
    //     background: #f2dede; 
    //     border-radius: 5px; 
    //     text-align: left;
    // }
    
    
    // </style>";


// ***** INCLUDING FOOTER ******
    include("footer.html");

echo "This page is provided as a special service for those who wish to report criminal activity occurring on the
University of Zimbabwe Campus or the immediate area surrounding the campus, and is not intended to replace the 
normal crime reporting process. Do not send emergency or crisis information, or situations needing an immediate
 response by Public Safety through this link. Anonymous reports of crime are accepted."
?>