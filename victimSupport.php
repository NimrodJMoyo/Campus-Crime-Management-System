<?php
include("server.php");

//**if user is already logged in, no need to repeat entering infor */

if(isset($_SESSION['username']))//*** CHECKING ACCESS LEVELS AND LOADING APPROPRIATE HEADERS
    {

        $retrieve_query = "SELECT * FROM members WHERE reg_number = :reg_number";   
        $result = $db->prepare($retrieve_query);
        $result->execute(['reg_number' => $_SESSION['username']]); 
        $user = $result->fetch();
    
        // Assigning fetched data to variables
        $fname = $user['name']; 
        $sname = $user['surname'];
        $position = $user['position'];
        $email = $user['email'];
    
  try{
        if (isset($_POST['vsSubmit'])) {
        // receive all input values from the form
        $gender = $_POST['gender'];
        $phoneNumber = $_POST['phoneNumber'];
        $vsProblem = $_POST['vsProblem'];
        //  
            $insert_query = "INSERT INTO vs_support (name,surname,position,gender,phone,email,vs_problem) 
                    VALUES('$fname','$sname','$position','$gender','$phoneNumber','$email','$vsProblem')";
            $count = $db->exec($insert_query);  
            //$db = null;
            $_SESSION['message'] = "Hey <strong>$fname</strong>, You have Successifully send Information to Victim Support Service";
            header('Location: home.php');
            exit();
            }
            }catch (PDOException $e) {
                echo $e->getMessage(); 
            }

            include("header_2.html"); // Headers are included after PHP to avoid headers already send

            // Iclude form entries not captured when regestering
            echo "
                <link rel='stylesheet' href='./css/form_and_stepper.css'>
                <form class='well form-horizontal col-lg-8 col-md-12 col-sm-12 col-xs-12' id='msform' action='victimSupport.php' method='POST'>
                <!--VICTIM DETAILS-->
                <fieldset>
                <h2 class='fs-title text-primary'>UZ Victim Support Service:</h2>
                <div class='jumbotron text-primary' id='titleJumbotron'>
                    Good day, $fname $sname feel free to, this information will never be disclosed!
                </div>

                <div class='form-group'>
                    <label class='col-lg-3 col-md-4 col-sm-4 col-xs-6 control-label'>Phone Number:</label>
                    <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12 inputGroupContainer'>
                    <div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-earphone'></i></span>
                        <input id='rPhone' name='phoneNumber' placeholder='Your Phone Number' 
                        autofocus class='form-control' type='number'>
                    </div><br>
                <div class='form-group'>
                        <label class='col-lg-3 col-md-4 col-sm-4 col-xs-6 control-label'>Gender:</label>
                        <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12 inputGroupContainer'>
                        <div class=''>
                            Male: <input type='radio' name='gender' value='Male' class=''>
                            Female: <input type='radio' name='gender' value='Female' class=''>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-lg-3 col-md-4 col-sm-4 col-xs-6 control-label'>Problem Description:</label>
                        <div class='col-lg-8 col-md-6 col-sm-12 col-xs-12 inputGroupContainer'>
                    <div>
                    <textarea class='form-control' name='vsProblem' required rows='7' 
                    placeholder='Please provide all relevent information that can be used to assist you.The more Details the better'></textarea>
                    </div>
                    </div>
                    </div>
                    <div>
                    <input type='submit' name='vsSubmit' class='btn btn-md btn-primary' value='Send Information' style='float:right' />
                    </div>
            </fieldset>
            </form>";



}else //**ACCESS BEFORE LOGIN
        {

        try{
            if (isset($_POST['vsSubmit'])) {
            // receive all input values from the form
            $fname = $_POST['fname'];
            $sname = $_POST['sname'];
            $position = $_POST['position'];
            $gender = $_POST['gender'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];
            $vsProblem = $_POST['vsProblem'];


            //checking important details
            // form validation: ensure that the form is correctly filled
            // if (empty($vsProblem)) { array_push($errors, "Problem Description required!"); }
            // if (empty($phoneNumber)) { array_push($errors, "Phone Number Needed to Contact you"); }

            if(count($errors)==0){
                $insert_query = "INSERT INTO vs_support (name,surname,position,gender,phone,email,vs_problem) 
                        VALUES('$fname','$sname','$position','$gender','$phoneNumber','$email','$vsProblem')";
                $count = $db->exec($insert_query);  
                //$db = null;
                $_SESSION['message'] = "Hey <strong>$fname</strong>, You have Successifully send Information to Victim Support Service";
                header('Location: home.php');
                exit();
            }
        }
    }catch (PDOException $e) {
                    echo $e->getMessage(); 
                }
        
            include("header_1.html");
            include("victimSupport.html");
        }
include("footer.html");
?>