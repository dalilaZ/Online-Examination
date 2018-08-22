
<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
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

<table class="layout" border="0" align="center">

<form action="Coleagues.php" method="post" align="center">
<td colspan="2">
<table border="0" align="center">

<tr>
<td align="center" colspan="2"><p class="heading4">Search Coleagues</p></td>
</tr>

<tr>
    <td>First Name</td>
    <td><input type="text" name="Cname"/></td>
</tr>

<tr>
    <td>Last Name</td>
    <td><input type="text" name="Csurname"/></td>
</tr>


<tr>
    <td>Telefon</td>
    <td><input type="text" name="Ctelefon"/></td>
</tr>

<tr>
<td>

<input type="submit" value="Search"/>
</td></tr>



<tr><td>
<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
</td></tr>

<tr><td>
<form action="Login.php" method="post">
<input type="submit" value="Close"/>
</table>
</td>
</form>

</table>
</body>
</html>
