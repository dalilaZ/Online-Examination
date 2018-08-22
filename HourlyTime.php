<?php
include 'dbinfo.php'; 
?> 

<?php 
 session_start(); 
//connect to the db 
$username = $_SESSION['username'];
 
if(isset($_POST['sdate']) and isset($_POST['fdate']))  {
	$sdate = $_POST['sdate'];
	$fdate= $_POST['fdate'];
    $whours=$_POST['whours'];
	$button = $_POST['button'];
        $wnotes =$_POST['wnotes'];

	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");


  $sql_query = "SELECT  Username, TimeClass from hourlytime AS HT where HT.Username = '$username' AND HT.TimeClass='$button' ";

$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  

	if($result == false)
	{
		echo 'The query  failed.';
		exit();
	}

	$row = mysqli_fetch_array($result);
	$username_check = $row['Username'];
        $timeclass_check = $row['TimeClass']; 
 
 if ($username_check and $timeclass_check) 
    {       



           $sql_query2 = "SELECT TotalHours AS old_hours from hourlytime AS HT WHERE HT.TimeClass = '$timeclass_check' AND Username='$username_check'"; 

	$result2= mysqli_query($link, $sql_query2) or die(mysqli_error($link)); 
	    if($result2 == false)
		{
			echo 'The query failed.';
			exit();
		}

      $row = mysqli_fetch_array($result2);
      $old_hours = $row['old_hours'];
      $new_hours = $whours + $old_hours;

 $sql_query3 = " UPDATE hourlytime AS HT SET HT.TotalHours ='$new_hours', HT.StartDate='$sdate', HT.EndDate='$fdate', HT.NewHours='$whours', HT.WorkNotes='$wnotes' WHERE HT.TimeClass='$timeclass_check' AND HT.Username='$username_check' " ;

    
  $result3 = mysqli_query($link, $sql_query3) or die(mysqli_error($link)); 
	    if($result3 == false)
		{
			echo 'The query failed 3.';
			exit();
		}
}
  
  if (($username_check) and ($timeclass_check) and $new_hours>160 or $old_hours>160) {
     $x = 12 * $new_hours * 1.5; 
     
$sql_query4 = " UPDATE hourlytime AS HT SET  HT.x ='$x'  WHERE HT.TimeClass='$timeclass_check' AND HT.Username='$username_check' " ;



            $result4 = mysqli_query($link, $sql_query4) or die(mysqli_error($link)); 
	    if($result3 == false)
		{
			echo 'The query failed 4.';
			exit();
		}
      } 




 if ( ($username_check and $timeclass_check) and ($timeclass_check =='Salaried' or $timeclass_check =='Vacation' or $timeclass_check =='Sick' or $timeclass_check =='Holiday') ) { 
  
  $sql_query5 = "SELECT Deducation AS old_deducation from hourlytime AS HT WHERE HT.TimeClass = '$timeclass_check' AND Username='$username_check'"; 

	$result5= mysqli_query($link, $sql_query5) or die(mysqli_error($link)); 
	    if($result2 == false)
		{
			echo 'The query failed 5.';
			exit();
		}

      $row = mysqli_fetch_array($result);
      $old_deducation = $row['old_deducation'];
      $new_deducation = $whours + $old_deducation;

  $sql_query6 = " UPDATE hourlytime AS HT SET  HT.Deducation ='$new_deducation'  WHERE HT.TimeClass='$timeclass_check' AND HT.Username='$username_check' " ;



            $result6= mysqli_query($link, $sql_query6) or die(mysqli_error($link)); 
	    if($result6 == false)
		{
			echo 'The query failed.';
			exit();
		}

  }


  
else { 

 $sql_query7= "INSERT INTO hourlytime(TimeClass, StartDate, EndDate,  WorkNotes, NewHours, TotalHours, Username) VALUES ('$button', '$sdate','$fdate', '$wnote', '$whours', '$whours', '$username') ";
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
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
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

<table class="layout" border="0" align="center">

<form action="" method="post" align="center">
<td colspan="2">
<table border="0" align="center">

<tr>
<td align="center" colspan="2"><p class="heading4">Time Entery</p></td>
</tr>


  <tr>
    <td>Time Clasification</td>
 <td><input type="radio" name="button" value="Salaried"/>Salaried</td>
   <td><input type="radio" name="button" value="Sick"/>Sick</td>
  <td><input type="radio" name="button" value="Vacation"/>Vacation</td>
  <td><input type="radio" name="button" value="Holiday"/>Holiday</td>
 </tr>

 <tr>
    <td>Start Date</td>
    <td><input type="date" name="sdate"/></td>
 </tr>

<tr>
    <td>Finish Date</td>
    <td><input type="date" name="fdate"/></td>
 </tr>

<tr>
    <td>Total Worked Hours</td>
    <td><input type="number" name="whours"/></td>
 </tr>

<tr>
    <td>Work Notes</td>
    <td><input type="text" name="wnotes"/></td>
 </tr>

<tr></tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<td></td><td>
<tr>
<td></td><td>
<input type="submit" class="button" value="Confirm"/>
</td></tr>

</table>
</td>
</form>
</table>

</html>
