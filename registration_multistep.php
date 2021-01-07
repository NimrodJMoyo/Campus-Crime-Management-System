<!DOCTYPE html>
<html>
<head>
    <title>membership form</title>
</head>
<body>

      <?php  

      if (isset($_POST["step"]) AND $_POST["step"] >= 1 AND $_POST["step"] <= 3 ) { // note that this will only return true when the form containing the input with name "step" has been submitted..dont get confused that the input has its attr of "value" already set eg "value = 1"; that is why if you load the page the "displayStep1();" runs.

      call_user_func("processStep" .(int)$_POST["step"]); 

      }else{
        displayStep1();
      }

      function setInputValue($fieldName){
            if (isset($_POST[$fieldName])) {
                echo $_POST[$fieldName];
            }
        }

     function setChecked($fieldName , $fieldValue){
        if (isset($_POST[$fieldName]) AND $_POST[$fieldName] == $fieldValue) {
            echo 'checked = "checked" ';
        }
     }

     function setSelected($fieldName , $fieldValue){

        if (isset($_POST[$fieldName]) AND $_POST[$fieldName] == $fieldValue) {
            echo 'select = "selected"';
        }
     }


      function displayStep1(){?>

        <form action="registration_multistep.php" method="post">
      
  <!-- progressbar -->
<ul autofocus id="progressbar">
  <li class="active">Crime Details</li>
  <li>Criminal Details</li>
  <li>Reporter's info</li>
  <li>Victim details & Upload Evidence</li>
</ul>
  <!-- fieldsets -->

  <!--CRIME DETAILS-->
  <fieldset>
    <h2 class="fs-title text-primary">Crime Details</h2>

    <div class="form-group">
        <label class="col-lg-3 col-md-4 col-sm-4 col-xs-6 control-label">Crime Type:</label>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 inputGroupContainer">
         <div class="input-group">
            <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
            <select autofocus class="selectpicker form-control" name="crime_type">
             <option>Choose Crime Type</option>
             <option>Laptop Theft</option>
             <option>Drug Abuse</option>
             <option>Rape</option>
             <option>Arson</option>
             <option>Corruption</option>
             <option>Theft</option>
             <option>Fighting</option>
             <option>Other</option>
             </select>
         </div>
        </div>
       </div>
        

       <div class="form-group">
          <label class="col-lg-3 col-md-4 col-sm-4 col-xs-6 control-label">Crime Discription:</label>
          <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 inputGroupContainer">
           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <textarea name="crimeDiscription" rows= "6" placeholder="Describe the details of the crime" class="form-control" required="true" type="text"></textarea></div>
          </div>
         </div>

         <div class="form-group">
            <label class="col-lg-3 col-md-4 col-sm-4 col-xs-6 control-label">Location of Occurance:</label>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 inputGroupContainer">
             <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user">
            </i></span><input name="crimeLocation" class="form-control" type="text" autofocus></div>
            </div>
           </div>

      <div class="form-group">
       <label class="col-lg-3 col-md-4 col-sm-4 col-xs-6 control-label">Date of Occurance:</label>
       <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 inputGroupContainer">
        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
          <input type="date" name="crimeDate" class="form-control"></div>
       </div>
      </div>

      <div class="form-group">
          <label class="col-lg-3 col-md-4 col-sm-4 col-xs-6 control-label">Date of Report:</label>
          <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 inputGroupContainer">
           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
            <select class="form-control" name="reportDate"><option><?php echo date("l-d-M-Y"); ?></option></select>
          </div>
          </div>
      </div>

    <button name="next_1" class="next  btn btn-lg btn-primary" value="Next" >Next</button>
  </fieldset>
      
      
      
                <input type="submit" name="submitButton" value="next &gt;">
            </div>
        </form>

     <?php } ?>

     <?php
        function processStep1(){
            displayStep2();
        }

        function displayStep2(){?>

            <form action="registration_multistep.php" method="post">
            <h1>Member Signup: Step 1</h1>
            <div  style="width: 30em;">
                <input type="hidden" name="step" value="2"> <!-- note that even if u set the value of a form element in the attr "value", php script will not return true unless the form has been submitted-->
                your gender<br>

             <label for = "male">male</label><input type="radio" name="gender" id="male" value="male" <?php setChecked('gender' , 'male'); ?> >  <br><br>
             <label for = "female">female</label><input type="radio" name="gender" id="female" value="female"  <?php setChecked('gender' , 'female'); ?> > <br><br>

                <select name="favourite">

                    <option value="default" <?php setSelected('favourite' , 'default');?> >selected</option>
                    <option value="rice" <?php setSelected('favourite' , 'rice'); ?> >rice</option>
                    <option value="beans" <?php setSelected('favourite' , 'beans'); ?> >beans</option>

                </select>
                <label for = "comments"></label><input type="hidden" name="comments" id="comments"  value="<?php setInputValue('comments'); ?>"><br><br>

                <label for = "firstName"></label><input type="hidden" name="firstName" id="firstName"  value="<?php setInputValue('firstName'); ?>"><br><br>
                <label for = "lastName"></label><input type="hidden" name="lastName" id="lastName"  value="<?php setInputValue('lastName'); ?>"><br><br>

                <input type="submit" name="submitButton" id ="back" value="&lt; back">
                <input type="submit" name="submitButton" id ="next" value="next &gt;">
            </div>
        </form>


        <?php }?>

        <?php
        function processStep2(){

            if (isset($_POST["submitButton"]) AND $_POST["submitButton"] == "< back") {
                displayStep1();
            }else{
                displayStep3();
            }
        }

        function displayStep3(){?>

            <form action="registration_multistep.php" method="post">
            <h1>Member Signup: Step 1</h1>
            <div  style="width: 30em;">
                <input type="hidden" name="step" value="3"> <!-- note that even if u set the value of a form element in the attr "value", php script will not return true unless the form has been submitted-->


                 <!--notice the input for gender is only 1 here and the value is what the setInputValue() function echoed and the only argument passed is 'gender' for $fieldValue--> 
             <label></label><input type="hidden" name="gender" value=" <?php setInputValue('gender'); ?>" ><br><br>

                <label for = "favourite"></label><input type="hidden" name="favourite" id="favourite" value="<?php setInputValue('favourite'); ?>"><br><br>
                your comment<br>
                <label for = "comments"></label><input type="text" name="comments" id="comments"  value="<?php setInputValue('comments'); ?>"><br><br>

                <label for = "firstName"></label><input type="hidden" name="firstName" id="firstName"  value="<?php setInputValue('firstName'); ?>"><br><br>
                <label for = "lastName"></label><input type="hidden" name="lastName" id="lastName"  value="<?php setInputValue('lastName'); ?>"><br><br>

                <input type="submit" name="submitButton" id ="back" value="&lt; back">
                <input type="submit" name="submitButton" id ="next" value="next &gt;">
            </div>
        </form>


        <?php }?>

        <?php


        function processStep3(){

            if (isset($_POST["submitButton"]) AND $_POST["submitButton"] == "< back" ) {
                displayStep2();
            }else{
                displayThanks();
            }
        }

        function displayThanks(){
            echo "successful";
        }

        ?>









</body>
</html>