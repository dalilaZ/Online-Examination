  <?php
session_start();
include "connect.php";

?>
<?php
$exam = $_SESSION['exam'];
$subject = $_SESSION['subject']; 
$username =$_SESSION['username']; 
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
    <h5>Jump direct to another question<?php echo $_SESSION['exam']; ?></h5><br>
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


<h5> Questions </h5>
  <?php 
  $xyz=mysqli_query($connect,"SELECT question_id from exam_question where exam_id='$exam' and subject='$subject' ");
              
   if (isset($_POST['submit'])){
	   $x=1;
	   $i=mysqli_num_rows($xyz);
	   while($xxx=mysqli_fetch_array($xyz)){
          if(isset($_POST[$x])){
			  $user_answer=$_POST[$x];
    mysqli_query($connect, "INSERT INTO quiz VALUES('','$exam', '$question_id', '$user_answer','$username') " );
		  }
		  $x++;
		  }
	   }
	   
	   else{ ?>
  <form action="exam3.php" method="post">
  <div class="input-field col s6">
  <div class="input-field col s12" >
    
  </div>
  <div class="input-field col s12" >
     
  </div>
  <br>
 <?php 
  
  $x=1;
  $xyz=mysqli_query($connect,"SELECT question_id from exam_question where exam_id='$exam' and subject='$subject' ");
              $i=mysqli_num_rows($xyz);
			  
              while($xxx=mysqli_fetch_array($xyz)){
				 
               $question_id=$xxx['question_id'];
			  $q = mysqli_query($connect,"SELECT* from questions WHERE no='$question_id' ");
			  
                $row = mysqli_fetch_array($q); 
				
                $answer=$row['answer'];
                $ques=$row['question'];
                $option_A=$row['option_A'];
                $option_B=$row['option_B'];
                $option_C=$row['option_C'];
			    $option_D=$row['option_D']; 
			    $id[$x] = $question_id;
				$_SESSION['idd[]'] = $id[$x];
				
				?>
				
  
  <div class="input-field col s12">
    <input class="with-gap" name="<?php echo $x; ?>"  id="<?php echo ($x*100+1); ?>"  value="A"  type="radio"" />
    <label for="<?php echo ($x*100+1);?>"><?php echo $x ?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="<?php echo $x; ?>"  id="<?php echo ($x*100+2);?>" type="radio"  value="B"/>
    <label for="<?php echo ($x*100+2);?>"><?php echo "$option_B";?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="<?php echo $x; ?>" id ="<?php echo ($x*100+3);?>"type="radio" value="C"/>
    <label for="<?php echo ($x*100+3);?>" ><?php echo "$option_C";?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="<?php echo $x; ?>" id="<?php echo ($x*100+4); ?>" type="radio"  value="D"/>
    <label for="<?php echo ($x*100+4); ?>"><?php echo "$option_D" ?></label>
  </div>
			  <?php   
			     
				  $x++;
			  } 
			  ?>
	<center><input type="submit" name="submit" value="Submit"></center>

	   <?php } ?>
			 
			  
			  
			  
			  
			  
               			  
  <div class="input-field col s12">
    <br>
  </div>
  </form>
  <div class="row">
    <div class="input-field col s6">
    <button class="btn waves-effect waves-light" type="submit" value="submit" name="finish" >Finish Test
    </button>
  </div>
  <?php/*  if (isset($_POST['finish'])) {
			  for ($g=$x; $g=1; $g--){
			  if (isset($_POST['$g'])) { 
			  $f=$_POST['$g'];
			  $ff = $id[$g];
			    mysqli_query($connect, "INSERT INTO quiz VALUES('','$exam', '$ff', '$f','$username') " );
				
			  }
  } }*/ ?>
  <div class="input-field col s6">
    <?php 
     
  
  $username=$_SESSION['username'];
  $sub=$_SESSION['sub'];
  $total=mysqli_query($connect,"SELECT * FROM quiz where username='$username' AND subject='$sub'");
  $quesno=mysqli_num_rows($total);
	$query=mysqli_query($connect,"SELECT * FROM quiz where username='$username' AND subject='$sub' AND userans=ans");
  $correct_ans=mysqli_num_rows($query);
  $qu=mysqli_query($connect,"SELECT * FROM quiz where username='$username' AND subject='$sub' AND userans='e'");
  $not_attempted=mysqli_num_rows($qu);
  $attempt=$quesno-$not_attempted;
  $wrong_ans=$quesno-$correct_ans-$not_attempted;
  $user=$_SESSION['username'];
  $percent=($correct_ans/$quesno)*100;
  
  
  
  if($percent<40){
              echo "FAIL";
              $result="FAIL";
            }
            else{
              if($percent>90){
                echo "EXCELLENT";
                $result="EXCELLENT";
              }
              else{
                if($percent>80){
                  echo "VERY GOOD";
                  $result="VERY GOOD";
                }
                else{
                  if($percent>70){
                    echo "GOOD";
                    $result="GOOD";
                  }
                  else{
                    if($percent>60){
                      echo "AVERAGE";
                      $result="AVERAGE";
                    }
                    else{
                      if($percent>40){
                        echo "BELOW AVERAGE";
					  $result="BELOW AVERAGE";}
					      }
                    }
                  }
                }
              }
            
    
 /*if(isset($_SESSION['finish'])){
 mysqli_query($connect, "INSERT INTO results(``,`exam_id`,`question_id`,`user_ans`,`username`)
    VALUES('$username','$sub','$percent','$quesno','$correct_ans','$result')" );}*/
	
    ?>
  <div>
  </div>
</div>
</div>
              
</form>
</body>
</html>

