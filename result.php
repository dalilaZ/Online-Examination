<?php
session_start();
	include "connect.php";
	
  $exam = $_SESSION['exam'];
$subject = $_SESSION['subject']; 
$username =$_SESSION['username'];



$total=mysqli_query($connect,"SELECT* FROM exam_question where exam_id ='$exam' ");
$total_question_number=mysqli_num_rows($total);
//correct answers
  $query=mysqli_query($connect,"SELECT* FROM quiz AS q, questions as qq where q.username='$username' AND q.exam_id='$exam' AND q.question_id=qq.no AND q.user_ans=qq.answer");
  $correct_ans=mysqli_num_rows($query);
 //not attempted
  $qu=mysqli_query($connect,"SELECT* FROM quiz where username='$username' AND exam_id='$exam' AND user_ans=' '");
  $not_attempted=mysqli_num_rows($qu);
  
  $quer=mysqli_query($connect, "Select* from exam where id='$exam'");
  $row=mysqli_fetch_array($quer);
  $exam_name1 = $row['exam_name'];
  
  $attempt=$total_question_number-$not_attempted;
  //wrong answers
  $wrong_ans=$total_question_number-$correct_ans-$not_attempted;
  $percent=($correct_ans/$total_question_number)*100;
  if($percent<40){
              //echo "FAIL";
              $result="Fail";
            }
            else{
              if($percent>90){
                //echo "EXCELLENT";
                $result="EXCELLENT";
              }
              else{
                if($percent>80){
                 // echo "VERY GOOD";
                  $result="VeryGood";
                }
                else{
                  if($percent>70){
                    //echo "GOOD";
                    $result="Good";
                  }
                  else{
                    if($percent>60){
                      //echo "AVERAGE";
                      $result="Average";
                    }
                    else{
                      if($percent>40){
                       // echo "BELOW AVERAGE";
					  $result="BelovAverage";}
					      }
                    }
                  }
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
<div style="width: 60%; margin-left: 20%; margin-top: 5%; ">
<table class="striped">
        <thead>
          <tr>
              <th data-field="subject" style="padding-left: 45%; background-color: #64b5f6;"><?php echo $_SESSION['username']; ?></th>
              <th data-field="subject" style="padding-left: 45%; background-color: #64b5f6;"></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td><b>Subject</b></td>
            <td><?php echo $_SESSION['subject']; ?></td>
          </tr>
          <tr>
            <td>Total Questions in Exam</td>
            <td><?php echo $total_question_number; ?></td>
          </tr>
          <tr>
            <td>Total Correct Questions</td>
            <td><?php echo $correct_ans ; ?></td>
          </tr>
          <tr>
            <td>Total Wrong Questions</td>
            <td><?php echo $wrong_ans ; ?></td>
          </tr>
          <tr>
            <td>Precentage</td>
            <td><?php echo $percent."%"; ?></td>
          </tr>
          <tr>
            <td>Result</td>
            <td><?php echo $result ;?></td>
          </tr>
          <tr>
            <td>Exam Name</td>
            <td><?php echo $exam_name1; ?>
            
              </td>
          </tr>
        </tbody>
      </table>
    </div>
</body>
</html>

