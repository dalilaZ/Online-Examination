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


         
	
	
	

	$sql_query1 = "Select* from projects ";
	//Run our sql query
   	 $result1 = mysqli_query($link, $sql_query1)  
	 or die(mysqli_error($link));	
        
	
	if($result1 == false)
	{
		echo 'The query failed.';
		exit();
	}
	
	
	//Our SQL Query
      
	
	$numrow = mysqli_num_rows($result1);
	if($numrow == 0){
	echo 'There are no available copies right now, please go back and make a future hold request.';
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
<h1>Search Projects</h1>
<form action="" method="post">

<table border="1" style="width:100%">
<tr>
<td align="center" colspan="10"><p class="heading4">Hourly Time</p></td>
</tr>
  <tr>
    <th>Select</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Project ID</th>
    <th>Project Name</th>
    <th>Project Field</th>


  </tr>

  <?php while($row = mysqli_fetch_array($result1)){ 
	$projectID = $row['ProjectID'];
        $pName = $row['PName'];
        $field = $row['Field'];
        $i++;
   ?>

  <tr>
    <td><input type="radio"  name="button" value="<?php echo $i; ?>" /></td>
    <td><input type="date" name="Fromdate"/></td>
    <td><input type="date" name="Todate" /></td>
   <td><?php echo $projectID; ?></td>
    <td><?php echo $pName; ?></td>
   <td><?php echo $field; ?></td>
  </tr>

<?php
if(isset($_POST['submit'])){
if(isset($_POST['button'])){
echo $_POST['button'];
$fromdate = $_POST['Fromdate'];
$todate = $_POST['Todate']; 

if($_POST['button'] == $projectID){

$query2 = "INSERT INTO p_p(Username, ProjectID, FromDate, ToDate) VALUES ('$username', '$projectID', '$fromdate','$todate') ";
   
$result2 = mysqli_query($link, $query2)  
	 or die(mysqli_error($link));	
        
	
	if($result2== false)
	{
		echo 'The query failed.';
		exit();

	}
}
}
}


}



?>

</table>

<input type="Submit" name ="submit" value="submit"/>
</form>





<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
<?php echo $username;


    
    
 ?>
</body>
</html>
