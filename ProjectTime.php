<?php
include 'dbinfo.php'; 
?> 

<?php 
 session_start(); 
//connect to the db 
$username = $_SESSION['username'];
 
if(isset($_POST['psdate']) and isset($_POST['pfdate']))  {
	$psdate = $_POST['psdate'];
	$pfdate= $_POST['pfdate'];
        $pwhours=$_POST['pwhours'];
	$button = $_POST['button'];
        $pwnotes =$_POST['pwnotes'];
        $pid = $_POST['pid']; 
        $tid = $_POST['tid'];
        $customer = $_POST['customer']; 


	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");


  $sql_query = "SELECT   ProjectID, TaskID,  Username from ProjectTime AS PT where PT.Username = '$username' AND PT.ProjectID='$pid' AND PT.TaskID = '$tid' ";

$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  

	if($result == false)
	{
		echo 'The query  failed.';
		exit();
	}

	$row = mysqli_fetch_array($result);
	$username_check = $row['Username'];
        $pid_check = $row['ProjectID']; 
        $tid_check = $row['TaskID'];
 
 if ($username_check and $pid_check and $tid_check) 
    {       



           $sql_query2 = "SELECT Hours AS old_hours from ProjectTime AS PT WHERE PT.ProjectID = '$pid_check' AND PT.Username='$username_check' AND PT.TaskID ='$tid_check'"; 

	$result2= mysqli_query($link, $sql_query2) or die(mysqli_error($link)); 
	    if($result2 == false)
		{
			echo 'The query failed.';
			exit();
		}

      $row = mysqli_fetch_array($result2);
      $old_hours = $row['old_hours'];
      $new_hours = $pwhours + $old_hours;

 $sql_query3 = " UPDATE ProjectTime AS PT SET PT.Hours ='$new_hours', PT.FromDate='$psdate', PT.ToDate='$pfdate', PT.NewHours='$pwhours', PT.WorkNotes='$pwnotes' WHERE PT.ProjectID='$pid_check' AND PT.Username='$username_check' AND PT.TaskID='$tid_check' " ;

    
  $result3 = mysqli_query($link, $sql_query3) or die(mysqli_error($link)); 
	    if($result3 == false)
		{
			echo 'The query failed 3.';
			exit();
		}
}
  
else { 

 $sql_query7= "INSERT INTO ProjectTime(ProjectID, TaskID, Hours,  NewHours, FromDate, ToDate, Username, WorkNotes) VALUES ('$pid', '$tid','$pwhours','$pwhours', '$psdate', '$pfdate', '$username', '$pwnotes') ";
    $result7= mysqli_query($link, $sql_query7) or die(mysqli_error($link)); 


if($result7 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}

} 
}

?>






<html>

<head>
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

<link rel="stylesheet" type="text/css" href="style.css">
<div><h1 class="maintitle">Company Managment System</h1> 

<div><h2 class="barone">User: <?php echo $_SESSION['username']?></h2></div>


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
<?php echo $button?>
<table class="layout" border="0" align="center">

<form action="" method="post" align="center">
<td colspan="2">
<table border="0" align="center">

<tr>
<td align="center" colspan="2"><p class="heading4">Time Entery for Projects</p></td>
</tr>


  <tr>
    <td>Start Date</td>
    <td><input type="date" name="psdate"/></td>
 </tr>

<tr>
    <td>Finish Date</td>
    <td><input type="date" name="pfdate"/></td>
 </tr>

<tr>
    <td>Total Worked Hours</td>
    <td><input type="number" name="pwhours"/></td>
 </tr>


<tr>
    <td>Project ID</td>
    <td><input type="number" name="pid"/></td>
 </tr>

<tr>
    <td>Task ID</td>
    <td><input type="number" name="tid"/></td>
 </tr>




<tr>
    <td>Work Notes</td>
    <td><input type="text" name="pwnotes"/></td>
 </tr>

<tr>
<td>
<input type="submit" value="Confirm"/>
</td></tr>

</table>
</td>
</form>
</table>

</html>
