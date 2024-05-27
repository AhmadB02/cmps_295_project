<!DOCTYPE html>
<?php
include("newfunc.php");
if(isset($_POST['app_search_submit']))
{
	$contact=$_POST['app_contact'];
	$query = "SELECT * FROM appointmenttb WHERE email= '$contact';";
	$result = mysqli_query($con, $query);
	
	if(mysqli_num_rows($result) == 0) {
		echo "<script>alert('No entries found! Please enter valid details'); window.location.href = 'admin-panel1.php#list-doc';</script>";
		exit(); 
	}
?>
<html>
<head>
	<title>Patient Details</title>
  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class='container-fluid' style='margin-top:50px;'>
    	<div class='card'>
        	<div class='card-body' style='background-color:#342ac1;color:#ffffff;'>
				<table class='table table-hover'>
					<thead>
						<tr>
							<th scope='col'>First Name</th>
							<th scope='col'>Last Name</th>
							<th scope='col'>Email</th>
							<th scope='col'>Contact</th>
							<th scope='col'>Doctor Name</th>
							<th scope='col'>Consultancy Fees</th>
							<th scope='col'>Appointment Date</th>
							<th scope='col'>Appointment Time</th>
							<th scope='col'>Appointment Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while ($row = mysqli_fetch_array($result)) {
								echo "<tr>
										<td>" . htmlspecialchars($row['fname']) . "</td>
										<td>" . htmlspecialchars($row['lname']) . "</td>
										<td>" . htmlspecialchars($row['email']) . "</td>
										<td>" . htmlspecialchars($row['contact']) . "</td>
										<td>" . htmlspecialchars($row['doctor']) . "</td>
										<td>" . htmlspecialchars($row['docFees']) . "</td>
										<td>" . htmlspecialchars($row['appdate']) . "</td>
										<td>" . htmlspecialchars($row['apptime']) . "</td>
										<td>";
										
								if($row['userStatus']==1 && $row['doctorStatus']==1) {
									echo "Active";
								} elseif($row['userStatus']==0 && $row['doctorStatus']==1) {
									echo "Cancelled by You";
								} elseif($row['userStatus']==1 && $row['doctorStatus']==0) {
									echo "Cancelled by Doctor";
								}
								
								echo "</td>
									</tr>";
							}
						?>
					</tbody>
				</table>
				<center><a href='admin-panel1.php' class='btn btn-light'>Back to your Dashboard</a></center>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 
</body>
</html>
<?php
}
?>
