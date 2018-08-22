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

if($_POST['Cname'] != null)  { 
	$cname = $_POST['Cname'];  
	// store session data
	//Our SQL Query
	$sql_query1 = "Select*  From personel  Where Name = '$cname'";
	//Run our sql query
    $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
						
} elseif ($_POST['Csurname'] != null) {
	$csurname = $_POST['Csurname'];  
	// store session data
	$_SESSION['Csurname']=$csurname;
	//Our SQL Query
	$sql_query1 = "Select*  From personel  Where Surname = '$csurname'";
	 //Run our sql query
	   $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Title failed.';
			exit();
		}	
		
} elseif ($_POST['Ctelefon'] != null) {
	$ctelefon = $_POST['Ctelefon'];  
	// store session data
	$_SESSION['Ctelefon']=$ctelefon;
	//Our SQL Query
	$sql_query1 = "Select*  From personel  Where Name = '$ctelefon' ";
	 //Run our sql query
	   $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Author failed.';
			exit();
		}	
	//Our SQL Query
			
} else {
	header('Location: UserSummary.php');
}
$numrow = mysqli_num_rows($result1);
if($numrow == 0){
	echo 'There are no available copies right now, please go back and make a future hold request.';
}
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<div><h1 class="maintitle">Company Managment System</h1> 

<div><h2 class="barone">User: <?php echo $_SESSION['username']?></h2></div>
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

<table border="1" class="layout" style="width:100%">
<tr>
<td align="center" colspan="2"><p class="heading4">Find Coleagues</p></td>
</tr>
  <tr>
    <th>Username</th>
    <th>Name</th>
    <th>Surname</th>
    <th>DOB</th>
    <th>Address</th>
    <th>Telefon</th>

  </tr>

  <?php while($row = mysqli_fetch_array($result1)){ 
	  
	$Username = $row['Username'];
	$Name = $row['Name'];
	$Surname = $row['Surname'];
	$DOB = $row['DOB'];
	$Address = $row['Address'];
	$Telefon= $row['Telefon'];
  ?>
  <tr>
    <td><?php echo $Username; ?></td>
    <td><?php echo $Name; ?></td>
    <td><?php echo $Surname; ?></td>
    <td><?php echo $DOB; ?></td>
    <td><?php echo $Address; ?></td>
    <td><?php echo $Telefon; ?></td>
  </tr>
<?php
}
?>
</table>

</form>

  
</table>
</form>

<form action="Search.php" method="post">
<input type="submit" value="Back"/>
</form>

</body>
</html>
