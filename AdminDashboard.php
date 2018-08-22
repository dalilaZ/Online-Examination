<?php
include 'dbinfo.php'; 
?>  

<?php
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

$username = $_SESSION['username'];

$sql_query = "SELECT* from hourlytime ";
$result = mysqli_query($link, $sql_query)  
	 or die(mysqli_error($link));	
        
	
	if($result== false)
	{
		echo 'The query failed.';
		exit();
	}
$numrow = mysqli_num_rows($result);
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
<td align="center" colspan="10"><p class="heading4">Personel Hourly Preview</p></td>
</tr>  
  <tr>
    <th>Personel Name</th>
    <th>Username</th>
    <th>Today's Date</th>
    <th>Total Hours </th>
    <th>New Hours</th>
    <th>Time Class</th>
     <th>1.5x</th>
    <th>Deducation</th>
   </tr>
</tr>
 <?php
 while($row = mysqli_fetch_array($result)){ 
	$username = $row['Username']; 
     	$totalHours = $row['TotalHours'];
        $newHours = $row['NewHours'];  
 	$timeClass = $row['TimeClass']; 
        $x2 = $row['x']; 
        $deducation2 = $row['Deducation']; 
       
        
   ?>
<tr>
  <td><?php echo $pname; ?></td>
  <td><?php echo $username; ?></td>
  <td><?php echo $tdate; ?></td>
  <td><?php echo $totalHours; ?></td>
  <td><?php echo $newHours; ?></td>
 <td><?php echo $timeClass; ?></td>
  <td><?php echo $x2; ?></td>
  <td><?php echo $deducation2; ?></td>
</tr>

<?php 
}
?>

   


