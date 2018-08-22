<?php
include 'dbinfo.php'; 
?>  

<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
$today = date("Y-m-d");
$hour = date("h:i:sa");

if(isset($_POST['edate']) and isset($_POST['ehour']))  {
	$edate = $_POST['edate'];
	$ehour= $_POST['ehour'];
	
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");



     $sql_query = "SELECT Username from enteringhours AS EH where EH.Username = '$username'"; 

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
            $sql_query2 = " UPDATE enteringhours AS EH SET EH.Edate ='$edate', EH.Ehour='$ehour' where EH.Username='$username' ";
            $result2 = mysqli_query($link, $sql_query2) or die(mysqli_error($link)); 
	    if($result2 == false)
		{
			echo 'The query by ISBN failed.';
			exit();
		}
      } 
else { 



     $sql_query3 = "INSERT INTO enteringeours(Username, Edate, Ehour) VALUES ('$username', '$edate','$ehour') ";
    $result3 = mysqli_query($link, $sql_query3) or die(mysqli_error($link)); 


if($result3 == false)
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
<td align="center" colspan="2"><p class="heading4">Arival</p></td>
</tr>


  <tr>
    <td>Date</td>
    <td><input type="text" name="edate" value=" <?php echo date('d/m/y');?>"/></td>
 </tr>

 <tr>
    <td>Hour</td>
    <td><input type="text" name="ehour" value=" <?php echo date('h:i:sa');?>"/></td>
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


















