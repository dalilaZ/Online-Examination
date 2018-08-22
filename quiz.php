<?php
session_start();
 include "connect.php";
$subject=$_SESSION['subject'];
              $exam_id =$_SESSION['exam'];
			 
			  error_reporting(E_ERROR | E_PARSE);
?>
<?php

              $count = 5;
              $_SESSION['ref']=1;
              $_SESSION['aa']=$sub;
              $xyz=mysqli_query($connect,"SELECT* from exam_question AS E inner join questions as Q on Q.subject = E.subject and Q.no = E.question_id where E.subject = '$subject' and E.exam_id = '$exam_id' ORDER BY Q.no DESC");
              $i=mysqli_num_rows($xyz);
			  
			  console.log($i);
              $_SESSION['i']=$i;
              $_SESSION['r']=1;
                $xxx=mysqli_fetch_array($xyz);
                $id=$xxx['no'];
                $_SESSION['id']=$id;
                $ans=$xxx['answer'];
                $_SESSION['ans']=$ans;
                $ques=$xxx['question'];
                $option_A=$xxx['option_A'];
                $option_B=$xxx['option_B'];
                $option_C=$xxx['option_C'];
                $option_D=$xxx['option_D'];
                $_SESSION['previous'] = $id;
 

?>
<?php
if(isset($_POST['next'])){
  $_SESSION['finish']=$_POST['finish'];
  if(isset($_POST['group1'])){
    $userans=$_POST['group1'];
  }
  else{
    $userans="e";
  }
    $ans=$_SESSION['ans'];
    $username=$_SESSION['username'];
    $sub=$_SESSION['subject'];
    $iddd=$_SESSION['count'];
    mysqli_query($connect,"INSERT INTO quiz VALUES('$userans','$ans','$username','$sub','$iddd')");
  header("Location:result.php");
}
else{
  if($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
    $i=$_SESSION['i'];
	echo "ENTERED";
	
    if(isset($_POST['group1'])){
    $userans=$_POST['group1'];
  }
  else{
    $userans="e";
  }
    $ans=$_SESSION['ans'];
    $username=$_SESSION['username'];
    $sub=$_SESSION['sub'];
    $iddd=$_SESSION['count'];
    mysqli_query($connect,"INSERT INTO quiz VALUES('$userans','$ans','$username','$sub','$iddd')");
    $sub=$_SESSION['aa'];
    $idd=$_SESSION['previous'];
	echo $idd;
    $idd--;
    $_SESSION['previous']=$idd;
    $xyz=mysqli_query($connect,"SELECT* from exam_question AS E inner join questions as Q on Q.subject = E.subject and Q.no = E.question_id where E.subject = '$subject' and E.exam_id = '$exam_id' and Q.no<='$idd'  ORDER BY Q.no DESC");
              $i=mysqli_num_rows($xyz);
			  console.log($i);
			  $_SESSION['i']=$i;
              $_SESSION['r']=1;
                $xxx=mysqli_fetch_array($xyz);
                $id=$xxx['no'];
                
                $ans=$xxx['answer'];
                $_SESSION['ans']=$ans;
                $ques=$xxx['question'];
                $option_A=$xxx['option_A'];
                $option_B=$xxx['option_B'];
                $option_C=$xxx['option_C'];
                $option_D=$xxx['option_D'];
				
  }
}
?>
<!docktype html>
<html>
<head>
  <title> student </title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</head>
<body>
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="session_expired.php">Your profile</a></li>
  <li><a href="session_expired.php">Achievement</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="navbar-fixed">
<nav>
  <div class="nav-wrapper">
    <a href="session_expired.php" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="session_expired.php">Home</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Hi  <?php echo $_SESSION['username']; ?>
        <i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
</div>
<div class="row" style="font-family: GillSans, Calibri, Trebuchet, sans-serif;">
  <div class="input-field col s6" style="padding-left: 5%!important;">
    <h5>Jump direct to another question<?php echo $subject; echo $exam_id;?></h5><br>
    <ul class="pagination">
   <?php
   /*if(isset($_POST['submit'])){
    $m=$_SESSION['i'];
    $h=1;
    $z=5;
    while($m--){
        echo '<li class="active" style="margin-left: 10px!important;"><a href="#!">2</a></li>';
      if($h % $z === 0){
        echo "<br>"."<br>";
      }
      $h++;
    }
  }*/
    ?>
  </ul>
</div>

<form action="quiz.php" method="post">
<div class="input-field col s6">
  <div class="input-field col s12" >3
    <h5> Question No. <?php  echo $i; echo $idd; if (empty($_SESSION['count'])) {
     $_SESSION['count'] = 1;
  }else {
    if(isset($_POST['next'])){
      $_SESSION['count']++;
   }
  }
  echo $_SESSION['count']; ?></h5>
  </div>
  <div class="input-field col s12" >
     <?php echo '<p>'.$_SESSION['count'].".) $ques".'</p>';  ?>
  </div>
  <br>
  <div class="input-field col s12">
    <input class="with-gap" name="group1" type="radio" id="test1" value="A" />
    <label for="test1"><?php echo "$option_A"; ?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="group1" type="radio" id="test2" value="B"/>
    <label for="test2"><?php echo "$option_B";?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="group1" type="radio" id="test3" value="C"/>
    <label for="test3" ><?php echo "$option_C";?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="group1" type="radio" id="test4" value="D"/>
    <label for="test4"><?php echo "$option_D" ?></label>
  </div>
  <div class="input-field col s12">
    <br>
  </div>
  <div class="row">
    <div class="input-field col s6">
    <button class="btn waves-effect waves-light" type="submit" value="submit" name="finish" >Finish Test
    </button>
  </div>
  <div class="input-field col s6">
    <?php 
     if($i==$_SESSION['r']){
      echo '<a class="btn disabled" >Next question
    <i class="material-icons right">send</i></a>';
    } 
    else{
    $_SESSION['r']++;
    echo '<button name="next"'." ".'type="submit"'." ".'class="btn waves-effect waves-light" >Next question
    <i class="material-icons right">send</i>
  </button>';
  }
    ?>
  <div>
  </div>
</div>
</div>
              
</form>
</body>
</html>

