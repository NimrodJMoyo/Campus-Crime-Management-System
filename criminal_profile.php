<?php
include("server.php");
if(isset($_GET['case_id'])){
	$case_id = $_GET['case_id'];
	unset($_GET['case_id']);
$sql = "SELECT * FROM `case`  JOIN crime ON `case`.crime_id = crime.crime_id JOIN criminal ON
 criminal.criminal_id = `case`.criminal_id WHERE case_ref= :case_id";
							$result = $db->prepare($sql);
							$result->execute(array(':case_id' => $case_id));
							$row = $result->fetch();


include("header_2.html");
?>

<link rel="stylesheet" href="./criminal_profile.css">

<div id="user-profile-2" class="user-profile">
		<div class="tabbable">
			<ul class="nav nav-tabs padding-18">
				<li class="active">
					<a data-toggle="tab" href="#home" style="font-size:20px">
						<i class="green ace-icon fa fa-user bigger-120"></i>
						Criminal info
					</a>
				</li>

				<li>
					<a data-toggle="tab" href="#jurisdiction"  style="font-size:20px">
						<i class="orange ace-icon fa fa-chain bigger-120"></i>
						Jurisidiction Results
					</a>
				</li>

				<li>
					<a data-toggle="tab" href="#updates"  style="font-size:20px">
						<i class="green ace-icon fa fa-feed bigger-120"></i>
						Updates
					</a>
				</li>

				<li>
					<a data-toggle="tab" href="#evidence"  style="font-size:20px">
						<i class="blue ace-icon fa fa-camera bigger-120"></i>
						Evidence
					</a>
				</li>
			</ul>

			<div class="tab-content no-border padding-24">
				<div id="home" class="tab-pane in active">
					<div class="row">
						<div class="col-xs-12 col-sm-3 center">
							<span class="profile-picture">
								<img class="editable img-responsive" alt="Criminal's Image" id="avatar2" src="./images/criminals/oscar.jpg">
							</span>

							<div class="space space-4"></div>


							<a href="#" class="btn btn-sm btn-block btn-primary" style="font-size:20px">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span >Give us More Details?</span>
							</a>
						</div><!-- /.col -->

		<div class="col-lg-5 col-md-6 col-xs-12 col-sm-9">

			<table class="table table-striped table-hover text-info">
                <thead>
                    <tr>
						
                </thead>
                <tbody style="font-size:20px">

                    					
                        <h3 class="alert alert-info"> <?php echo $row['name'];  ?> </h3>
					
					<tr>					
                        <th>Case Number: </th>
                        <td> <?php echo $row['case_ref'];  ?> </td>
					</tr>
					<tr>					
                        <th>Position: </th>
                        <td> <?php echo $row['position'];  ?> </td>
					</tr>
					<tr>					
                        <th>Gender: </th>
                        <td> <?php echo $row['gender'];  ?> </td>
					</tr>
					<tr>					
                        <th>Location: </th>
                        <td> <?php echo $row['occurrence_location'];  ?> </td>
					</tr>
					<tr>					
                        <th>Date of Occurrence:  </th>
                        <td> <?php echo $row['occurrence_date'];  ?> </td>
					</tr>
					<tr>					
                        <th>Date of Report: </th>
                        <td> <?php echo $row['report_date']; ?></td>
					</tr>
							

							<!-- *******************************
							*******************************
							******************************* -->
                </tbody>
            </table>
					
							
							
					<div class="row">
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
							<div class="widget-box transparent">
								<div class="widget-header widget-header-small">
									<h4 class="widget-title text-danger" style="font-size:20px">
										<i class="ace-icon fa fa-check-square-o bigger-110"></i>
										Crime Details 
									</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<p class="alert alert-warning" style="font-size:16px">
											<?php echo $row['description']; ?>
										</p>
										
									</div>
									<a href="cases.php" class="btn btn-md btn-primary">Back</a>
								</div>
							</div>
						</div>
				</div><!-- /#home -->

				<div id="Jurisidiction" class="tab-pane">
					
				</div><!-- /#Related Cases -->

				<div id="updates" class="tab-pane">
					
				</div><!-- /#Updates -->

				<div id="evidence" class="tab-pane">
					<ul class="ace-thumbnails">
						<li>
						
						
						</li>
					</ul>
				</div><!-- /#Evidence -->
			</div>
		</div>
    </div>
    
<?php
 }
include('footer.html');
?>