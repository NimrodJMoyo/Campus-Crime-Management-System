<?php

include("server.php");

if (isset($_SESSION['username'])){
session_parameters_loader();
}
    echo $_SESSION['message'];

echo $_SESSION['message'];
include("header_2.html");
$name = $_SESSION['fname'];
echo "<div class='container bg-primary' style='text-align:center;'>
<h3>
Hey $name, thank you for taking your time testing my project!
</h3>
</div>";


include("footer.html");
?>