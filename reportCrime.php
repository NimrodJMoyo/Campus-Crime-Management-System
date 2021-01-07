<?php
//include("file_upload_handler.php");
$_SESSION['message']='';

include("server.php");

// **** INITIALISING VARIABLES

//Crime
 $crime_type = "";
 $crimedescription = "";
 $crimeLocation = "";
 $crimeDate = "";
 $reportDate = "";
 $status = "Pending Review";

 //Criminal
$cName = "";
$cPosition = "";
$cGender = "";
$cdescription = "";
$cPicture = "";

//Reporter's Details
$rName = "";
$rGender = "";
$rEmail = "";
$rPhoneNumber = "";
$witness_1 = "";
$witness_1_no = "";
$witness_2 = "";
$witness_1_no = "";

//Evidence
$vName = "";
$vPhone = "";
$evidence_1 = "";
$evidence_1 = "";
$evidence_2 = "";
$evidence_2 = "";
$evidence_3 = "";
$support_evidence = "";


try{
    if (isset($_POST['send_report'])) {
       // receive all input values from the form
       $crime_type = $_POST['crime_type'];
       $crimedescription = $_POST['crimeDescription'];
       $crimeLocation = $_POST['crimeLocation'];
       $crimeDate = $_POST['crimeDate'];
       $reportDate = $_POST['reportDate'];
       
       //Criminal's Details
       $cName = $_POST['cName'];
       $cPosition = $_POST['cPosition'];
       $cGender = $_POST['cGender'];
       $cDescription = $_POST['cDescription'];
       //$cPicture = $_FILES['cPicture']['tmp_name'];
       //$cPicture = mysql_real_escape_string($cPicture);
       //$cPicture = base64_encode(file_get_contents(addslashes($cPicture)));


//        $cPicture = $_FILES['cPicture']['name'];
//        $imgContent = addslashes(file_get_contents($cPicture));

       // destination of the file on the server

       //****** */
//        $image = $_FILES['image']['name'];
//   	// Get text
//   	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

//   	// image file directory
//   	$target = "images/".basename($image);

//   	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
//   	// execute query
//   	mysqli_query($db, $sql);

//   	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
//   		$msg = "Image uploaded successfully";
//   	}else{
//   		$msg = "Failed to upload image";
//   	}
//   }
//   $result = mysqli_query($db, "SELECT * FROM images");



       //Reporter's Details
       $rName = $_POST['rName'];
       $rGender = $_POST['rGender'];
       $rPosition = $_POST['rPosition'];
       $rEmail = $_POST['rEmail'];
       $rPhoneNumber = $_POST['rPhoneNumber'];
       $witness_1 = $_POST['witness_1'];
       $witness_1_no = $_POST['witness_1_no'];
       $witness_2 = $_POST['witness_2'];
       $witness_2_no = $_POST['witness_2_no'];
       
       //Evidence
       $vName = $_POST['vName'];
       $vPhone = $_POST['vPhone'];
//        $evidence_1 = file_get_contents($_FILES['evidence_1']['tmp_name']);
//        $evidence_1 = mysql_real_escape_string($evidence_1);
//        $evidence_2 = file_get_contents($_FILES['evidence_2']['tmp_name']);
//        $evidence_2 = mysql_real_escape_string($evidence_2);
//        $evidence_3 = file_get_contents($_FILES['evidence_3']['tmp_name']);
//        $evidence_3 = mysql_real_escape_string($evidence_3);
       $support_evidence = $_POST['evidenceDescription'];

      
       // ******INSERTING INTO CRIME TABLE
           $insert_query = "INSERT INTO crime (`type`,`description`,occurrence_Location,occurrence_date,report_date) 
                   VALUES('$crime_type','$crimedescription','$crimeLocation','$crimeDate','$reportDate')";                 
           $count = $db->exec($insert_query); 
           $crime_id = $db->lastInsertId();

        // ******INSERTING INTO REPORTER TABLE
           $insert_query = "INSERT INTO reporter (`name`,position,gender,email,phone) 
                   VALUES('$rName','$rPosition','$rGender','$rEmail','$rPhoneNumber')";
            $count = $db->exec($insert_query); 
            $reporter_id = $db->lastInsertId();
           

        // ******INSERTING INTO CRIMINAL TABLE
           $insert_query = "INSERT INTO criminal (`name`,position,gender,postraiture,picture) 
                   VALUES('$cName','$cPosition','$cGender','$cDescription','$cPicture')";      
           $count = $db->exec($insert_query);
           $criminal_id = $db->lastInsertId(); 
           

        // ******INSERTING INTO VICTIM TABLE
           $insert_query = "INSERT INTO victim (crime_id,`name`,phone) 
                   VALUES('$crime_id','$vName','$vPhone')";
           $count = $db->exec($insert_query); 

         // ******INSERTING INTO EVIDENCE TABLE
        //    $insert_query = "INSERT INTO evidence (crime_id,evidence_1,evidence_2,evidence_3) 
        //            VALUES('$crime_id','$evidence_1','$evidence_2','$evidence_3')";
        //    $count = $db->exec($insert_query); 

           // ******INSERTING INTO WITNESS TABLE
           $insert_query = "INSERT INTO `witness`(crime_id,`name`,phone) 
                   VALUES('$crime_id','$witness_1','$witness_1_no')";
           $count = $db->exec($insert_query); 
           $insert_query = "INSERT INTO `witness` (crime_id,`name`,phone) 
                   VALUES('$crime_id','$witness_2','$witness_2_no')";
           $count = $db->exec($insert_query); 

       // ******INSERTING INTO CASE TABLE
           $insert_query = "INSERT INTO `case` (`status`,criminal_id,crime_id,reporter_id) 
                   VALUES('$status','$criminal_id','$crime_id','$reporter_id')";
           $count = $db->exec($insert_query); 
        


           header('Location: home.php');
           exit();
       } 
           }catch (PDOException $e) {
               echo $e->getMessage(); 
         }


if(isset($_SESSION['username'])){
    include('header_2.html');
}else{
    include('header_1.html');
}
    
include("reportCrime.html");
include("footer.html");

// while (isset($_SESSION['message'])){
//     //echo $_SESSION['error'];
//     echo "<div class='notloggederror'>";
//     echo $_SESSION['message'];
//     echo "</div>";
//     $_SESSION['message']='';
//     break;
// }
?>