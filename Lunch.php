<?php
include 'dbinfo.php'; 
?>  

<!--<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
$today = date("Y-m-d");
$hour = date("h:i:sa");

if(isset($_POST['shour']) and isset($_POST['fhour']))  {
	$shour = $_POST['shour'];
	$fhour= $_POST['fhour'];
	
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");



     $sql_query = "SELECT Username from lunch AS L where L.Username = '$username'"; 

$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$username_check = $row['Username'];
     if ($username_check) 
    {       
            $sql_query2 = " UPDATE lunch AS L SET L.Start ='$shour', L.Finish='$fhour' where L.Username='$username' ";
            $result2 = mysqli_query($link, $sql_query2) or die(mysqli_error($link)); 
	    if($result2 == false)
		{
			echo 'The query by ISBN failed.';
			exit();
		}
      } 
else { 



     $sql_query3 = "INSERT INTO lunch(Username, Start, Finish) VALUES ('$username', '$shour','$fhour') ";
    $result3 = mysqli_query($link, $sql_query3) or die(mysqli_error($link)); 


if($result3 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
		
}

}


?>-->
 
<html>

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
.drugi{ 
 padding: 15px 45px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999; }

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
</head>


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

<table class="layout" border="0" align="center">

<form action="start.php" method="post" align="center">
<td colspan="2">
<table border="0" align="center">

<tr>
<td>
<input type="submit" value="Start" class="drugi"/>
</td></tr>
</table>
</td>
</form>


<form action="finish.php" method="post" align="center" >
<td colspan="2">
<table border="0" align="center">


<tr>
<td>
<input type="submit" value="Finished" class="button"/>
</td></tr>

</table>
</td>
</form>
</table>

</html>


















