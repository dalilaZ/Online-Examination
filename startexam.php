<?php
session_start();
include "connect.php";

?>
<!docktype html>
<html>
<head>
  <title> subject </title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</head>
<body>
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="student.php">Your profile</a></li>
 
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="navbar-fixed">
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">OES</a>
    <ul class="right hide-on-med-and-down">
      
      <li><a href="subject.php">Give quiz</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Hi  <?php echo $_SESSION['username']; ?>
        <i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
</div>
<div style="margin-left: 40%; margin-top: 5%; font-family: GillSans, Calibri, Trebuchet, sans-serif;">
  <h2> Start Exam! </h2>
</div>
<form action="startexam.php" method="post" >
  <div class="row">
<div class="input-field col s6" style="width: 50%!important; margin-left: 22%; margin-top: 5%;">
<?php $subject = $_SESSION['subject']; ?>

    <select name="user">
      <option value="" disabled selected>Choose exam to give</option>
      <?php
      $query=mysqli_query($connect,"SELECT* FROM exam where subject='$subject' ");
      $i=mysqli_num_rows($query);
      while($i--){
        $row=mysqli_fetch_array($query);
		      $exam_id = $row['id']; 
		      $exam_no = $row['exam_no'];
			  $exam_name =$row['exam_name'];
			  $sdate= $row['start_date'];
			  $fdate =$row['finish_date'];
			  $shour =$row['start_hour'];
			  $fhour =$row['finish_hour']; 
			  $duration =$row['duration'];
			  
              $todayDate = strtotime(date("Y-m-d"));
              $TestDateBegin = strtotime("$sdate");
			  $testDateEnd = strtotime("$fdate");
			  $timeBegin = strtotime("$shour");
              $timeEnd =strtotime("$fhour"); 
              $timeNow=strtotime(date("H:i:s")); 

			  if($todayDate >= $TestDateBegin && $todayDate <= $testDateEnd ) {
    echo '<option value='."$exam_no".'>'."$exam_name".'</option>' ;
} else {
    $missed[] = $exam_id;
} 
       
      }
      ?>
    </select>
  </div>
</div>
    <input class="btn waves-effect waves-light" style="padding-top: 7px!important; margin-left: 23%; margin-top: 1%; "type="submit" name="submit" value="SUBMIT" />
  </div>
</form>
<?php 
  if(isset($_POST['submit'])){
	  $exam_no =$_POST['user']; 
	  $q = mysqli_query($connect, "SELECT* from exam where exam_no='$exam_no' AND subject='$subject'");
	  $row= mysqli_fetch_array($q); 
	  $id = $row['id']; 
	  $_SESSION['exam']=$id;
	  echo $id; 
	  header("Location:quiz2.php");
  }?>

</body>
<script>
$(document).ready(function() {
    $('select').material_select();
  });
  </script>
</html>

