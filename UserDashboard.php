<?php
include 'dbinfo.php'; 
?>  

<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

$username = $_SESSION['username'];

$sql ="SELECT Edate from EnteringHours where Username='$username' "; 
         
$result=mysqli_query($link, $sql) or die(mysqli_error($link));	
        
	
	if($result == false)
	{
		echo 'The query failed.';
		exit();
	}
$row = mysqli_fetch_array($result);
$datetoday = $row['Edate'];

$sql2 ="SELECT TotalHours, x, NewHours from hourlytime where Username='$username' and TimeClass='Salaried' "; 
         
$result2=mysqli_query($link, $sql2) or die(mysqli_error($link));	
        
	
	if($result2 == false)
	{
		echo 'The query failed.';
		exit();
	}
$row = mysqli_fetch_array($result2);
$totalhoursSalaried= $row['TotalHours'];
$x=$row['x']; 
$newworkedhours =$row['NewHours']; 

$sql3 ="SELECT TotalHours, Deducation from hourlytime where Username='$username' and TimeClass='Sick' "; 
         
$result3=mysqli_query($link, $sql3) or die(mysqli_error($link));	
        
	
	if($result3 == false)
	{
		echo 'The query failed.';
		exit();
	}
$row = mysqli_fetch_array($result3);
$totalhoursSick= $row['TotalHours'];
$deducationSick= $row['Deducation']; 

$sql4 ="SELECT TotalHours,Deducation from hourlytime where Username='$username' and TimeClass='Vacation' "; 
         
$result4=mysqli_query($link, $sql4) or die(mysqli_error($link));	
        
	
	if($result4== false)
	{
		echo 'The query failed.';
		exit();
	}
$row = mysqli_fetch_array($result4);
$totalhoursVacation= $row['TotalHours'];
$deducationVacation=$row['Deducation']; 

$sql5 ="SELECT TotalHours from hourlytime where Username='$username' and TimeClass='Holiday' "; 
         
$result5=mysqli_query($link, $sql5) or die(mysqli_error($link));	
        
	
	if($result5 == false)
	{
		echo 'The query failed.';
		exit();
	}
$row = mysqli_fetch_array($result5);
$totalhoursHoliday= $row['TotalHours'];
$deducationHoliday=$row['Deducation']; 

$totalDeducation = $deducationSick + $deducationVacation +$deducationHoliday; 

//Project Time 
$sql6 = "Select* from ProjectTime where Username='$username'";
$result6=mysqli_query($link,$sql6)
or die(mysqli_error($link));	
        
	
	if($result6 == false)
	{
		echo 'The query failed.';
		exit();
	}
$row=mysqli_fetch_array($result6);
$projectID = $row['ProjectID']; 
$TaskID = $row['TaskID'];
$hours = $row['Hours'];

$sql7 = "Select* from Proje where ProjeID='$projectID'";
$result7=mysqli_query($link,$sql7)
or die(mysqli_error($link));	
        
	
	if($result7 == false)
	{
		echo 'The query failed.';
		exit();
	}

$row=mysqli_fetch_array($result7);
$projectName = $row['Name']; 
$lasting = $row['Lasting']; 
$dep = $row['Dep']; 


$sql8 = "Select* from Departments where DepID='$dep' ";
$result8=mysqli_query($link,$sql8)
or die(mysqli_error($link));	
        
	
	if($result8 == false)
	{
		echo 'The query failed.';
		exit();
	}

$row=mysqli_fetch_array($result8);
$departmentName = $row['Name']; 
$status = $row['DepartmentStatus']; 


$sql9 = "Select* from EnterTasks where ProjectID='$TaskID'";
$result9=mysqli_query($link,$sql9)
or die(mysqli_error($link));	
        
	
	if($result9 == false)
	{
		echo 'The query failed.';
		exit();
	}

$row=mysqli_fetch_array($result9);
$taskName = $row['Name']; 
$tstatus = $row['Status']; 
 
?>

<html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<div><h1 class="maintitle">Company Managment System</h1> 

<div><h2 class="barone">User's Dashboard: <?php echo $_SESSION['username']?></h2></div>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
<ul>
  <li><a class="active" href="UserSummary.php">Home</a></li>
  <li><a href="UserDashboard.php">Dashboard</a></li>
  <li><a href="EnteringHours.php">IN</a></li>
  <li><a href="LeavingHours.php">OUT</a></li>
  <li><a href="Lunch.php">Break</a></li>
  <li><a href="HourlyTime.php">Enter Hourly Time</a></li>
  <li><a href="ProjectTime.php">Enter Project Time</a></li>
  <li><a href="SelectDepartment.php">Select Project</a></li>
  <li><a href="Search.php">Search Coleagues</a></li>
  
  <li style="float:right"><a href="Login.php">Log Out</a></li>
</ul>

</head>
<body>
<form action="" method="post">

<table border="1" style="width:100%" class="layout">
 <tr>
<td align="center" colspan="10"><p class="heading4">Hourly Time</p></td>
</tr>

  <tr>
    <th>Username</th>
    <th>Today's Date</th>
    <th>Status</th>
    <th>Total Worked Hours (Salaried)</th>
    <th>Sick</th>
     <th>Vacation</th>
    <th>Holiday</th>
   <th>1.5x</th>
   <th>Total Deducation</th>
   <th>Hours Today</th>
</tr>

<tr>
  <td><?php echo $username; ?></td>
  <td><?php echo $datetoday;?></td>
  <td><?php echo $status; ?></td>
  <td><?php echo $totalhoursSalaried; ?></td>
  <td><?php echo $totalhoursSick; ?></td>
  <td><?php echo $totalhoursVacation; ?></td>
  <td><?php echo $totalhoursHoliday; ?></td>
  <td><?php echo $x; ?></td>
  <td><?php echo $totalDeducation; ?></td>
  <td><?php echo $newworkedhours; ?></td>
</tr> 
</table>
</form>

<form action="" method="post">

<table border="1" style="width:100%" class="layout">
 <tr>
<td align="center" colspan="10"><p class="heading4">Project Time</p></td>
</tr>

  <tr>
    <th>Username</th>
    <th>Today's Date</th>
    <th>Total Hours Worked on Task</th>
    <th>Task</th>
    <th>Task Status</th>
    <th>Project</th>
    <th>Lasting</th>
    <th>Department</th>
    <th>Status</th>
       
</tr>

<tr>
  <td><?php echo $username; ?></td>
  <td><?php echo $datetoday;?></td>
  <td><?php echo $hours; ?></td>
  <td><?php echo $taskName; ?></td>
  <td><?php echo $tstatus; ?></td>
  <td><?php echo $projectName; ?></td>
  <td><?php echo $lasting; ?></td>
  <td><?php echo $departmentName; ?></td>
  <td><?php echo $status; ?></td>
  
</tr> 
</table>
</form>
</html>



