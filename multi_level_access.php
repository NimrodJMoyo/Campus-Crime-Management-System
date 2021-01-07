<?php
//****ADMIN PREVILEDGES****
function CheckAccessLevel(){
 if($_SESSION['user_type']=='admin'){
    echo "<li class='nav-item dropdown'>
    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' 
    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
         Manage Records
    </a>
    <div class='dropdown-menu bg-primary' aria-labelledby='navbarDropdown'>
        <a class='dropdown-item' href='cases.php' >All cases</a>
        <a class='dropdown-item' href='cases.php'>update cases</a>
        <a class='dropdown-item' href='#'>manage cases</a>
        <a class='dropdown-item' href='#'>manage records</a>
    </div>
  </li>";
  echo "<li class='nav-item dropdown'>
    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
         Manage Users
    </a>
    <div class='dropdown-menu bg-primary' aria-labelledby='navbarDropdown'>
        <a class='dropdown-item' href='create_user.php' >create user</a>
        <a class='dropdown-item' href='#'>update User</a>
        <a class='dropdown-item' href='#'>remover User</a>
    </div>
  </li>";

    echo "<li class='nav-item' style='font-size:16px'>
    <a href='#' class='nav-link'>Reports<sup><span class='badge text-danger bg-info'>
    28
    </span><sup></a>
    </li>";
   }//admin end

   elseif($_SESSION['user_type']=='security'){
    echo "<li class='nav-item dropdown'>
    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' 
    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
         Manage Criminals
    </a>
    <div class='dropdown-menu bg-primary' aria-labelledby='navbarDropdown'>
        <a class='dropdown-item' href='cases.php'>update criminals</a>
        <a class='dropdown-item' href='#'>add criminals</a>
        <a class='dropdown-item' href='#'>remove criminal</a>
    </div>
  </li>";
  echo "<li class='nav-item dropdown'>
    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
         Manage Wanted
    </a>
    <div class='dropdown-menu bg-primary' aria-labelledby='navbarDropdown'>
        <a class='dropdown-item' href='#' >add wanted</a>
        <a class='dropdown-item' href='#'>update wanted</a>
        <a class='dropdown-item' href='#'>remove wanted</a>
    </div>
  </li>";

    echo "<li class='nav-item'>
    <a href='#' class='nav-link'>Update Services</a>
    </li>";
    echo "<li class='nav-item'>
    <a href='#' class='nav-link'>Reports<sup><span class='badge bg-info'>
    24
    </span><sup></a>
    </li>";
    
   }//security f(x) end

   elseif($_SESSION['user_type']=='user'){
    echo "<li class='nav-item'>
    <a href='reportCrime.php' class='nav-link'>report Crime</a>
    </li>";
    echo "<li class='nav-item'>
    <a href='cases.php' class='nav-link'>Cases</a>
    </li>";
    echo "<li class='nav-item'>
    <a href='wanted.php' class='nav-link'>wanted</a>
    </li>";
    echo "<li class='nav-item'>
    <a href='mycases.php' class='nav-link'>my cases</a>
    </li>";
    echo "<li class='nav-item dropdown'>
    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' 
    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
         Services
    </a>
    <div class='dropdown-menu bg-primary' aria-labelledby='navbarDropdown'>
        <a class='dropdown-item' href='victimSupport.php' >Victim Support</a>
        <a class='dropdown-item' href='#'>Security Team</a>
        <a class='dropdown-item' href='#'>Developers Team</a>
    </div>
  </li>";
    
   }//regular user end

   //***By PASSING Attempters */


   else{
       header('Location: login.php');
       $_SESSION['error']= "<div class='alert bg-warning' style='text-align:center;'>
       <input autofocus type='radio'> ACCESS DENIED, YOU MUST LOGIN FIRST!<input type='radio' autofocus='true'></div>";
   }


	// if ($_SESSION['error']==$notLoggedIn){
    //     array_push($errors,$notLoggedIn);
	// 	echo '<div class="error">';
	// 		foreach ($errors as $err){
	// 			echo $err .'<br>';
	// 		}
	// 	echo '</div>';
	// }



}//function end
    
    
?>
