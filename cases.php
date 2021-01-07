<?php 

include("server.php");
include("header_2.html");

while(isset($_SESSION['message'])){
	echo $_SESSION['message'];
	break;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/tables.css">
<title>UZ|Crime-Cases</title>


<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title bg-info">
                <div class="row">
                    <div class="col-sm-6">
						<h2>ALL <b>CASES</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addCriminalModal" class="btn btn-md btn-primary" data-toggle="modal">
							<i class="material-icons">&#xE147;</i> <span>Add New Case</span></a>
						<a href="#deleteCriminalModal" class="btn btn-warning btn-md" data-toggle="modal">
							<i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover" style="font-size:14px">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Case no</th>
                        <th>Criminal</th>
						<th>Crime</th>
                        <th>Status</th>
						<th>occurrence date</th>
						<th colspan = "4" rowspan="3" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>

						<?php

							$sql = "SELECT * FROM
							 `case`  JOIN crime ON `case`.crime_id = crime.crime_id JOIN criminal ON criminal.criminal_id = `case`.criminal_id";
							$result = $db->prepare($sql);
							$result->execute();
							$item = $result->fetch();
							$count = count($result);
							for($i=0; $row = $result->fetch(); $i++){
								$case_id = $row['case_ref'];
								$name = $row['name'];
								$type = $row['type'];
								$status = $row['status'];
								$occurrence_date = $row['occurrence_date'];

		
						?>	
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>

											
                        <td> <?php echo $case_id; ?> </td>
                        <td> <?php echo $name;  ?> </td>
						<td><?php echo $type;  ?></td>
						<td><?php echo $status;  ?></td>
						<td><?php echo $occurrence_date;  ?></td>
                        <td>

						<!-- Implementing Access Levels -->
							
							<?php if($_SESSION['user_type']=='admin'){ echo "
							<a href='edit_crime.php?case_id={$case_id}' class='btn btn-sm btn-default'>
								<i class='material-icons' data-toggle='tooltip' title='Edit Crime Record'>
								&#xE254;</i>Update</a>
								
							
							
							<button class='btn btn-sm btn-warning' name = 'delete'>
                            <a href='#deleteCriminalModal' class='delete' data-toggle='modal'>
								<i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
								Delete
							</button>";}
							else{
								echo "
								<a href='criminal_profile.php?case_id={$case_id}' class='btn btn-sm btn-info'>
									<i class='material-icons' data-toggle='tooltip' title='Edit Crime Record'>
									&#xE254;</i>More Details</a>";
							}
								?>
                        </td>
					</tr>
							<?php } ?>

							<!-- *******************************
							*******************************
							******************************* -->
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b><?php echo $count; ?></b> out of <b>43</b> entries</div>
                <ul class="pagination">
                    <li class="ptype-item disabled"><a href="#">Previous</a></li>
                    <li class="ptype-item"><a href="#" class="ptype-link">1</a></li>
                    <li class="ptype-item"><a href="#" class="ptype-link">2</a></li>
                    <li class="ptype-item active"><a href="#" class="ptype-link">3</a></li>
                    <li class="ptype-item"><a href="#" class="ptype-link">4</a></li>
                    <li class="ptype-item"><a href="#" class="ptype-link">5</a></li>
                    <li class="ptype-item"><a href="#" class="ptype-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addCriminalModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Add Criminal</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->

	<!-- Delete Modal HTML -->
	<div id="deleteCriminalModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Criminal</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
include("footer.html");
?>                                		                            