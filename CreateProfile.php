<?php
include 'dbinfo.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
if(isset($_POST['Name']) and isset($_POST['Surname']))  {
	$Name = $_POST['Name'];
	$Surname = $_POST['Surname'];
	$FullName = "$Name $Surname";
	//$email = $_POST['email'];
	$DOB = $_POST['DOB'];
	$Address = $_POST['Address'];
	//$gender = $_POST['gender'];
	//$isfaculty = $_POST['isfaculty'];
	$Telefon = $_POST['Telefon'];
	
	$username = $_SESSION['username'];
        $picture = $_SESSION['profile'];
	
	/*if($isfaculty == "1") {
		$dept = $_POST['dept'];
	} else {
		$dept = null;
	}*/

	$insertStatement = "INSERT INTO personel (Username, Name, Surname, DOB, Address, Telefon) VALUES ('$username', '$Name', '$Surname','$DOB', '$Address', '$Telefon')";
	$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
	if($result == false) {
		echo 'The query failed.';
		exit();
	} else {
		header('Location: Login.php');
	}
} 
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<div><h1 class="maintitle">Company Managment System</h1> 

<div><h2 class="barone">Create Profil</h2></div>

<div class="profile">
  <?php 
      if(empty($picture) !== false) {
          echo '<img_src="" , $picture, alt="", $FullName >';
       }

 ?>
</div>

<body>

<br><br><br><br><br><br><br><br>
<table class="layout" border="0" align="center">

<form action="" method="post">
  <td colspan="2">
  <table border="0" align="center">
 <tr>
   <td align="center" colspan="2"><p class="heading4">Create Account Form</p></td>
</tr>

<tr>
    <td>First Name<span class="mandatory">*</span></td>
    <td><input type="text" name="Name" required/><label id="message"></label></td>
</tr>

<tr>
    <td>Last Name<span class="mandatory">*</span></td>
    <td><input type="text" name="Surname" required/></td>
</tr>

<tr>
    <td>D.O.B<span class="mandatory">*</span></td>
    <td><input type="date" name="DOB"/></td>
</tr>


<tr>
    <td>Address<span class="mandatory">*</span></td>
    <td><textarea name="Address" rows="5" cols="30"></textarea></td>
</tr>


<tr>
    <td>Telefon</td>
    <td><input type="text" name="Telefon" required/></td>
</tr>


<tr> 
   <td><input type="submit" value="submit"/>
   </td>
</tr>
</form>
</table>
</td>
</table>

</body>
</html>
