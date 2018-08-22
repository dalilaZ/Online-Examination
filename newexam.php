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





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School Managment System! | </title>

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
                      <li><a href="typography.html">Delete Exam</a></li>
                      <li><a href="icons.html">Grades</a></li>
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
              <div class="clearfix"></div>
                <div class="input-field col s6">
				
	<div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				  
    
	          <h3>Select The Course</h3>
				<form action="preview.php" method="post" >
               <div class="row">
                <div class="input-field col s6" style="width: 70%!important; margin-left: 5%; margin-top: 5%;">

      <select name="user">
      <option value="" disabled selected>Choose your subject</option>
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
    <input class="btn waves-effect waves-light" style="padding-top: 7px!important; margin-left: 5%; margin-top: 2%; margin-down= 5%; "type="submit" name="submit" value="SUBMIT" />
  </div>
</form>
	
	
    
                  </div>
                </div>
              </div>
			  
			  
			  <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				     <form class="form-horizontal form-label-left" action="makeexam.php" method="post">
					 </form>
				  
				  </div>
				     </div>
					   </div>
			  
			  <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
			  <form class="form-horizontal form-label-left" action="makeexam.php" method="post">
			  <div class="form-group">
               <ul class="integration-list" style=" overflow-x: scroll;">
                  <li class="collection-header"><h4>Added Questions</h4></li>
      <?php
      if(isset($_POST['action'])){
        if (empty($_SESSION['count'])) {
     $_SESSION['count'] = 1;
  }else {
     $_SESSION['count']++;
  }
$i=$_SESSION['count'];
$sub2 = $_SESSION['subject'];

$xyz=mysqli_query($connect,"SELECT *  from questions where username ='$name' AND subject = '$sub2' ");
$x=1;
$s = mysqli_num_rows($xyz);
while($s--){
  $xxx=mysqli_fetch_array($xyz);
  $quess=$xxx['question'];
  $option_A=$xxx['option_A'];
  $option_B=$xxx['option_B'];
  $option_C=$xxx['option_C'];
  $option_D=$xxx['option_D'];
  $id=$xxx['id'];
        echo "<"."li "."class"."=".'"'."collection-item".'"'.">";
  echo "$x".".)"." $quess"."<br>";
  echo " a.)"." $option_A"."     b.)"." $option_B"."     c.)"." $option_C"."     d.)"." $option_D"." <br>"; 
  ?>  <form method="post"><div class="row">
        <div class="input-field col s12">
        <button class="addBtn" type="submit" value="submit" name="Delete">Delete
      </button>
    </div> </form>
	<?php
   
	if(isset($_POST['Delete'])) 
	{
	$xyz2=mysqli_query($connect,"DELETE FROM questions where  question = '$quess'  AND id='$id' ");
	}
		 echo "<"."/"."li".">";
$x++;

      }
    }
      ?>
    </ul>
      </div>
    </div>
	</div></div></div>
        <!-- /page content -->

        <!-- footer content -->

        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>