<?php
include("server.php");


if(isset($_POST['update'])){
	//do your own validation here
	$sql = "UPDATE  `case`  JOIN crime ON `case`.crime_id = crime.crime_id JOIN
	 criminal ON criminal.criminal_id = `case`.criminal_id 
	 SET `name`=:name, `status`=:status, `type`=:type,crime.description=:description
	WHERE case_ref=:case_id";
	$query = $db->prepare($sql);
	$query->bindParam(':name', $_POST['name']);
	$query->bindParam(':status', $_POST['status']);
	$query->bindParam(':type', $_POST['type']);
	$query->bindParam(':case_id', $_POST['case_id']);
	$query->bindParam(':description',$_POST['description']);
	if( ! $query->execute()){
		echo 'Please check errors';
	}else{
      
       //"<div class='alert alert-success'>Updated Successfully . 
        //<a href='criminal_profile.php'>Goto Profile</a></div>";
        header('Location: cases.php');
        $_SESSION['message'] = "UPDATED";
           exit();
    }
    
}
if(isset($_GET['case_id'])){
    $case_id = $_GET['case_id'];
$sql = "SELECT * FROM `case`  JOIN crime ON `case`.crime_id = crime.crime_id JOIN criminal ON
 criminal.criminal_id = `case`.criminal_id WHERE case_ref= :case_id";
							$result = $db->prepare($sql);
							$result->execute(array(':case_id' => $case_id));
							$row = $result->fetch();

                            include("header_2.html");
                            
?>
	<div>
		<div>
			<div class="container" style="width:60%">
			<form action="edit_crime.php" method="POST">						
						<h4 class="title text-heading">Edit Case </h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<div class="modal-body">					
						<div class="form-group">
							<label>Case no (unchangable)</label>
                            <input type="text" class="form-control" value="<?php echo $case_id;?> "
                            name="case_id" disabled required>
						</div>
						<div class="form-group">
						 <label>crime Status</label>
						<div class="input-group">
							<span class="input-group-addon" style="max-width: 100%;">
							<i class="glyphicon glyphicon-list"></i></span>
							<select class="selectpicker form-control" name="status">
							<option><?php echo $row['status']; ?></option>
							<option>Pending Review</option>
							<option>Under Investigation</option>
							<option>Convicted</option>
							<option>Wanted</option>
							<option>Pending Trial</option>
							<option>Disapproved</option>
							<option>Closed</option>
							<option>Jailed</option>
							<option>Suspended</option>
							</select>
						</div>
					</div>
						<div class="form-group">
							<label>Criminal</label>
							<input name="name" class="form-control" value="<?php echo $row['name'];?>">
						</div>

						<div class="form-group">
						 <label>crime Type</label>
						<div class="input-group">
							<span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
							<select class="selectpicker form-control" name="type">
							<option><?php echo $row['type']; ?></option>
							<option>Laptop Theft</option>
							<option>Burglary</option>
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
					<div class="form-group">
							<label>crime Description</label>
							<textarea name="description" class="form-control" rows="5" ><?php echo $row['description'];?>
								
							</textarea>
						</div>				
					</div>
					<div class="modal-footer">
                        <a href="cases.php">
						<input type="button" class="btn btn-default" value="Cancel"></a>
						<input type="submit" name="update" class="btn btn-info" value="Save Changes">
					</div>
				</form>
			</div>
		</div>
    </div>
<?php } ?>