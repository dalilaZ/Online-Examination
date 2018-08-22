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

<div><h2 class="barone">Admin: <?php echo $_SESSION['username']?></h2></div>


<ul>
  <li><a class="active" href="UserSummary.php">Home</a></li>
  <li><a href="AdminDashboard.php">Dashboard</a></li>

  <li><a href="EnterProject.php">Enter Projects</a></li> 
  <li><a href="EnteringTasks.php">Enter Tasks</a></li> 
 <li><a href="EnterDep.php">Enter  Dpartment</a></li> 
  
  
  <li style="float:right"><a href="Login.php">Log Out</a></li>
</ul>


<!--
<li><a href="EnterProject.php">Enter Projects</a></li> 
<li><a href="EnteringTasks.php">Enter Tasks</a></li> 
<li><a href="EnterDep.php">Enter  Dpartment</a></li> 

-->
</head>

<body>
<br>
<table class="layout" border="0" align="center">
<td>
<table align="center" width="70%">
<tr>

<marquee class="heading3" behavior="alternate">Welcome To Your Admin Home Page <?php echo $_SESSION['username'] ?></marquee></td>
<tr align="center" class="heading3">

</tr>
</tr>
</table>
</td>
</table>
</body>
</html>
