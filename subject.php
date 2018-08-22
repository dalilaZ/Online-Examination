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
  <li><a href="login.php">Logout</a></li>
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
  <h2> Select Course </h2>
</div>
<form action="subject.php" method="post" >
  <div class="row">
<div class="input-field col s6" style="width: 50%!important; margin-left: 22%; margin-top: 5%;">

    <select name="user" >
      <option value="" disabled selected>Choose your course</option>
      <?php
      $query=mysqli_query($connect,"SELECT* FROM addsubject");
      $i=mysqli_num_rows($query);
      while($i--){
        $xxx=mysqli_fetch_array($query);
        $sub=$xxx['name'];
        echo '<option value='."$sub".'>'."$sub".'</option>' ;
      }
      ?>
    </select>
	
  </div>
</div>
    <input class="btn waves-effect waves-light" style="padding-top: 7px!important; margin-left: 23%; margin-top: 1%; "type="submit" name="submit" value="SUBMIT" />
  </div>
</form>
<?php if (isset($_POST['submit'])){
	   $_SESSION['subject'] =$_POST['user']; 
header("Location: startexam.php");}
	   
	   ?>
</body>
<script>
$(document).ready(function() {
    $('select').material_select();
  });
  </script>
</html>

