  <?php
session_start();
include "connect.php";

?>
<?php
$exam = $_SESSION['exam'];
$subject = $_SESSION['subject']; 
$username =$_SESSION['username']; 

if(isset($_POST['finish'])) { header('Location:r.php');}
  
   
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
 
  <li class="divider"></li>
  <li><a href="login.php">Logout</a></li>
</ul>
<div class="navbar-fixed">
<nav>
  <div class="nav-wrapper">
    <a href="session_expired.php" class="brand-logo">OES</a>
    <ul class="right hide-on-med-and-down">
      
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Hi  <?php echo $_SESSION['username']; ?>
        <i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
</div>
<div class="row" style="font-family: GillSans, Calibri, Trebuchet, sans-serif;">
  <div class="input-field col s6" style="padding-left: 5%!important;">
    <h5>Your exam has started</h5><br>
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

<form action="quiz2.php" method="post">
<h5> Questions </h5>
  <?php 
  $xyz=mysqli_query($connect,"SELECT question_id from exam_question where exam_id='$exam' and subject='$subject' ");
              $i=mysqli_num_rows($xyz);
			  $x=0;
			  $y=0;
              while($xxx=mysqli_fetch_array($xyz)){
				  $x++;
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
				<div class="input-field col s6">
  <div class="input-field col s12" >
    
  </div>
  <div class="input-field col s12" >
     <?php echo '<p>'.$x.".) $ques".'</p>';  ?>
  </div>
  <br>
 
  
  <div class="input-field col s12">
    <input class="with-gap" name="<?php echo $question_id; ?>"  id="<?php echo ($x*100+1); ?>"  value="A"  type="radio"" />
    <label for="<?php echo ($x*100+1);?>"><?php echo $option_A ?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="<?php echo $question_id; ?>"  id="<?php echo ($x*100+2);?>" type="radio"  value="B"/>
    <label for="<?php echo ($x*100+2);?>"><?php echo "$option_B";?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="<?php echo $question_id; ?>" id ="<?php echo ($x*100+3);?>"type="radio" value="C"/>
    <label for="<?php echo ($x*100+3);?>" ><?php echo "$option_C";?></label>
  </div>
  <div class="input-field col s12">
    <input class="with-gap" name="<?php echo $question_id; ?>" id="<?php echo ($x*100+4); ?>" type="radio"  value="D"/>
    <label for="<?php echo ($x*100+4); ?>"><?php echo "$option_D" ?></label>
	
  </div>
			  <?php   
			     
				  if (isset($_POST[$question_id])){ 
				  $user_answer = $_POST[$question_id]; 
				  
				  mysqli_query($connect, "INSERT INTO quiz VALUES('','$exam', '$question_id', '$user_answer','$username') " );
 			  
			  
			  
			  } 
			  
			 
			  }
			  
			  
			  
			  
               			   ?>
  <div class="input-field col s12">
    <br>
  </div>
  
  <div class="row">
    <div class="input-field col s6">
    <button class="btn waves-effect waves-light" type="submit" value="submit" name="finish" >Finish Test
    </button>
  </div>
 </form>
  <div class="input-field col s6">
  
   
  <div>
  </div>
</div>
</div>
              
</form>
</body>
</html>

