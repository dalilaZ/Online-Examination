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
if($_POST['Cname'] != null)  { // ISBN
	$cname = $_POST['Cname'];  
	// store session data
	//Our SQL Query
	$sql_query1 = "Select (*)  From personel AS P, projects AS PR Where P.Name = '$cname' AND P.Username = PR.Username";
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
	$_SESSION['Csurname']=$title;
	//Our SQL Query
	$sql_query1 = "Select (*)  From personel AS P, projects AS PR Where P.Surname = '$csurname' AND P.Username = PR.Username";
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
	$sql_query1 = "Select (*)  From personel AS P, projects AS PR Where P.Name = '$ctelefon' AND P.Username = PR.Username";
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
<body>
<h1>Hold Request for a Book</h1>
<form action="IssueIDgenerate.php" method="post">

<table border="1" style="width:100%">
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
<input type="Submit" value="submit"/>
</form>

  
</table>
</form>

<form action="Search.php" method="post">
<input type="submit" value="Back"/>
</form>

</body>
</html>
