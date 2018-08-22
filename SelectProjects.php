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


$sql ="SELECT Dep FROM takenprojects where User='$username' "; 
         
$result=mysqli_query($link, $sql) or die(mysqli_error($link));	
        
	
	if($result == false)
	{
		echo 'The query failed.';
		exit();
	}

$row = mysqli_fetch_array($result);
$depid = $row['Dep'];  
echo $depid;	
	

	$sql_query1 = "Select* from Proje where Dep='$depid'  ";
	//Run our sql query
   	 $result1 = mysqli_query($link, $sql_query1)  
	 or die(mysqli_error($link));	
        
	
	if($result1 == false)
	{
		echo 'The query failed.';
		exit();
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

<form action=""  method="post">

<table border="1" class="layout" style="width:100%">
<tr>
<td align="center" colspan="10"><p class="heading4">Select Project</p></td>
</tr>
  <tr>
    <th>Select</th>
    <th>Proje ID</th>
    <th>Name</th>
    <th>Coorinator</th>
    <th>Aim</th>
     <th>Lasting</th>
    <th>Start Date</th>
   <th>Finish Date</th>
   <th>Department ID</th>
    



  </tr>

  <?php while($row = mysqli_fetch_array($result1)){ 
	$projectID = $row['ProjeID'];
        $pName = $row['Name'];
        $pCor = $row['ProjectCoordinator'];
        $aim =$row['Aim'];
        $lasting = $row['Lasting']; 
        $sdate = $row['StartDate'];
        $fdate = $row['FinishDate']; 
        $dipp = $row['Dep'];  
        $i++;
   ?>

  <tr>
    <td><input type="radio"  name="button" value="<?php echo $projectID ; ?>" /></td>
    <td><?php echo $projectID; ?></td>
   <td><?php echo $pName; ?></td>
    <td><?php echo $pCor; ?></td>
   <td><?php echo $aim; ?></td>
   <td><?php echo $lasting; ?></td>
   <td><?php echo $sdate; ?></td>
   <td><?php echo $fdate; ?></td>
   <td><?php echo $dipp; ?></td>
  </tr>

<?php
if(isset($_POST['submit'])){
if(isset($_POST['button'])){
echo $_POST['button'];

if($_POST['button'] == $projectID) {

	$query7 = "Select ProjeID, Dep from takenprojects where User='$username' "; 
	$result7 = mysqli_query($link, $query7);
	if($result7== false)
	{
		echo 'The query failed.';
		exit();

	}

$row = mysqli_fetch_array($result7);
$ProjeID=$row['ProjeID']; 
$Dep = $row['Dep'];

if($ProjeID==0)
 {
$query2 = "UPDATE  takenprojects SET ProjeID='$projectID'  where User='$username' AND Dep = '$dipp' ";
   
$result2 = mysqli_query($link, $query2)  
	 or die(mysqli_error($link));	
        
	
	if($result2== false)
	{
		echo 'The query failed.';
		exit();

	}
}
 if($ProjeID>0)
{ 
 $query3 = "INSERT INTO takenprojects (User, Dep, ProjeID) VALUES('$username', '$dipp', '$projectID') "; 


$result3 = mysqli_query($link, $query3)  
	 or die(mysqli_error($link));	
        
	
	if($result3== false)
	{
		echo 'The query3 failed.';
		exit();

	}
}





}
}
}


}



?>

</table>

<input type="Submit" name ="submit" value="submit"/>
</form>




<form action="SelectTask.php" method="post">
<input type="submit"  class="button" value="SelectTask"/>
</form>
<form action="UserSummary.php" class="button" method="post">
<input type="submit" value="Back"/>
</form>
<?php echo $username;


    
    
 ?>
</body>
</html>
