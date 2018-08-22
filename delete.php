<?php
session_start();
include "connect.php" ;
/*if(!$_SESSION['username'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}
else{
  if($_SESSION['group1']!="teacher"){
    header("Location: student.php");
  }
}*/
$name= $_SESSION['username'];
?>
<?php
if(isset($_POST['action'])){
  include "connect.php";
  $idd =$_POST['id2']; 
  $ques=$_POST['question'];
  $option_A=$_POST['option_A'];
  $option_B=$_POST['option_B'];
  $option_C=$_POST['option_C'];
  $option_D=$_POST['option_D'];
  $ans=$_POST['answer'];
  $sub=$_POST['sub'];
  $_SESSION['subject'] = $sub;
  $ssss = mysqli_query($connect, "SELECT* from questions WHERE subject = '$sub' AND id = '$idd' ");
  $idC=mysqli_fetch_array($ssss);
  $idK = $idC['id'];
  $subjectC = $idC['subject'];
  
  if (!$idK )
  {
  mysqli_query($connect," INSERT INTO questions(`id`,`question`,`option_A`,`option_B`,`option_C`,`option_D`,`answer`,`username`,`subject`)
    VALUES('$idd','$ques','$option_A','$option_B','$option_C','$option_D','$ans','$name','$sub')" );
  } 
  else 
  { 
     function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      alert("This question number already exist, enter the number after");

    
     //echo "This question number already exist, enter the number after "."$idK"." ";
  }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School Managment System | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="glyphicon glyphicon-blackboard"></i> <span>SMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/profil.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Courses <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">Given Courses</a></li>
                      <li><a href="form_advanced.html">Classrooms</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i>Exam <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="makeexam.php">Make Exam</a></li>
                      <li><a href="preview.php">Preview Exams</a></li>
                      <li><a href="delete.php">Delete Exam</a></li>
                      <li><a href="grades.php">Grades</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-user"></i> Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Students Information</a></li>
                      <li><a href="chartjs2.html">Grades</a></li>
                      
                    </ul>
                  </li>
                  
                </ul>
              </div>
             

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['username']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
			  
                <h3>Select The Course To Be Deleted</h3>
				
				<form action="delete.php" method="post" >
               <div class="row">
                <div class="input-field col s6" style="width: 100%!important; margin-left: 5%; margin-top: 5%;">

      <select name="user">
      <option value="" disabled selected>Choose your course</option>
      <?php
      $query=mysqli_query($connect,"SELECT DISTINCT subject FROM questions");
      $i=mysqli_num_rows($query);
      while($i--){
        $xxx=mysqli_fetch_array($query);
        $sub=$xxx['subject'];
        echo '<option value='."$sub".'>'."$sub".'</option>' ;
      }
      ?>
    </select>
  </div>
</div>
    <input class="btn waves-effect waves-light" style="padding-top: 7px!important; margin-left: 5%; margin-top: 2%; margin-down= 5%; "type="submit" name="delete" value="DELETE" />
  </div>
</form>
</div>

<?php 
			  if(isset($_POST['delete'])){
              $sub=$_POST['user'];
              $_SESSION['sub']=$sub;
              $_SESSION['ref']=1;
              $_SESSION['aa']=$sub;
              mysqli_query($connect,"DELETE FROM questions where subject='$sub' ");
			  
			  function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      alert(""."$sub"." exam as been deleted! ");

			  
			  
			  }
			  ?>
              
            
			
              
			  
            </div>
          </div>
        </div>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
				
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
      <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
      </ul>
      <div class="clearfix"></div>
      <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>