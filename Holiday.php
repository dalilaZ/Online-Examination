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

if(isset($_POST['fdate']) and isset($_POST['tdate']))  {
	$fdate = $_POST['fdate'];
	$tdate= $_POST['tdate'];
	
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");



     $sql_query = "SELECT Username from holiday AS H where H.Username = '$username'"; 

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
            $sql_query2 = " UPDATE holiday AS H SET H.FromDate ='$fdate', H.ToDate='$LHour' where H.Username='$username' ";
            $result2 = mysqli_query($link, $sql_query2) or die(mysqli_error($link)); 
	    if($result2 == false)
		{
			echo 'The query by ISBN failed.';
			exit();
		}
      } 
else { 



     $sql_query3 = "INSERT INTO holiday(Username, FromDate, ToDate) VALUES ('$username', '$fdate','$tdate') ";
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
<link rel="stylesheet" type="text/css" href="style.css">
<div><h1 class="maintitle">Company Managment System</h1> 

<div><h2 class="barone">User: <?php echo $_SESSION['username']?></h2></div>

<div><ul class="menusubnav">
<li class="orange"><a href="UserSummary.php">User Home Page</a></li>
<li><a href="EnteringHours.php">Arrival Hours</a></li>
<li><a href="LeavingHours.php">Leaving Hours</a></li>
<li><a href="Lunch.php">Lunch Hours</a></li>
<li><a href="Holiday.php">Take a Holiday</a></li>
<li><a href="Search.php">Search Coleagues</a></li>
<li><a href="Projects.php">Search Projects</a></li>
<li><a href="logOut.php" onClick="return confirm('Are you sure to logout?');">Logout</a></li>
</ul></div>
</head>


<body>

<table class="layout" border="0" align="center">

<form action="" method="post" align="center">
<td colspan="2">
<table border="0" align="center">

<tr>
<td align="center" colspan="2"><p class="heading4">Holiday</p></td>
</tr>


  <tr>
    <td>From Date</td>
    <td><input type="date" name="fdate"/> </td>
 </tr>

 <tr>
    <td>To Date</td>
    <td><input type="date" name="tdate"/></td>
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


















