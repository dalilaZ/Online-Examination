<?php
include 'dbinfo.php'; 
?> 

<?php 
 session_start(); 
//connect to the db 
$username = $_SESSION['username'];
 
if(isset($_POST['ssdate']) and isset($_POST['ffdate']))  {

   $pname = $_POST['pname']; 
   $pid = $_POST['pid']; 
   $pcor =$_POST['pcor'];
   $aim =$_POST['aim']; 
   $lasting = $_POST['last'];
   $ssdate = $_POST['ssdate'];
   $ffdate = $_POST['ffdate']; 
  $did = $_POST['did']; 
   

 $link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");


  $sql_query = "INSERT INTO Proje (Name, ProjeID, ProjectCoordinator, Aim, Lasting, StartDate, FinishDate,Dep) VALUES('$pname', '$pid','$pcor','$aim','$lasting','$ssdate','$ffdate','$did')";


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
<td align="center" colspan="2"><p class="heading4">Projects Entery</p></td>
</tr>


  <tr>
    <td>Project Name</td>
    <td><input type="text" name="pname"/></td>
 </tr>

<tr>
    <td>ProjectID</td>
    <td><input type="number" name="pid"/></td>
 </tr>

<tr>
    <td>Department ID</td>
    <td><input type="vacchar" name="did"/></td>
 </tr>

<tr>
    <td>Project Coordinator</td>
    <td><input type="text" name="pcor"/></td>
 </tr>


<tr>
    <td>Aim</td>
    <td><input type="text" name="aim"/></td>
 </tr>

<tr>
<select name="last">
  <option value="0">No</option>
  <option value="1">Yes</option>
</select>
</tr>

<tr>
    <td>Start Date</td>
    <td><input type="date" name="ssdate"/></td>
 </tr>

<tr>
    <td>Finish Date</td>
    <td><input type="date" name="ffdate"/></td>
 </tr>




<tr>
<td>
<input type="submit" value="Confirm"/>
</td></tr>




















