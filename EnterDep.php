<?php
include 'dbinfo.php'; 
?> 

<?php 
 session_start(); 
//connect to the db 
$username = $_SESSION['username'];
 
if(isset($_POST['name']))  {

$name = $_POST['name']; 
$dip = $_POST['dip'];  
$location = $_POST['location']; 
$status =$_POST['status']; 
$radio = $_POST['radio'];


$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");


  $sql_query = "INSERT INTO Departments ( Name, Location, DepartmentStatus)  VALUES( '$name','$location', '$radio')";


$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  

	if($result == false)
	{
		echo 'The query  failed.';
		exit();
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
<?php echo $button?>
<table class="layout" border="0" align="center">

<form action="" method="post" align="center">
<td colspan="2">
<table border="0" align="center">

<tr>
<td align="center" colspan="2"><p class="heading4">Task Entry</p></td>
</tr>


<tr>
    <td>Name</td>
    <td><input type="text" name="name"/></td>
 </tr>

<tr>
    <td>Location</td>
    <td><input type="text" name="location"/></td>
 </tr>


<tr>
    <td>Status</td>
    <td><input type="radio" name="radio" value="Activ"/>Active</td>
    <td><input type="radio" name="radio" value="Passive"/>Passive</td>
   
</tr>




<tr>
<td>
<input type="submit" value="Confirm"/>
</td></tr>





