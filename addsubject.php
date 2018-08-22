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
  $subject_code =$_POST['subject_code']; 
  $subject_name=$_POST['subject_name'];
  
  $q =mysqli_query($connect," SELECT* FROM addsubject" );
  $cc=mysqli_fetch_array($q);
  $code = $cc['sub_code'];
  
 
    mysqli_query($connect," INSERT INTO addsubject(`sub_code`,`name`)
    VALUES('$subject_code','$subject_name')" );
  
     
  

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

    <title>Online Examination System! | </title>

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
              <a href="index.php" class="site_title"><i class="glyphicon glyphicon-blackboard"></i> <span>OES</span></a>
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
                      <li><a href="givencourses.php">Given Courses</a></li>
                      
					   <li><a href="addsubject.php">Add Subject</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i>Exam <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="questionbank.php">Question Bank</a></li>
                      <li><a href="makeexam2.php">Make Exam</a></li>
                      <li><a href="preview.php">Preview Exams</a></li>
                      <li><a href="grades.php">Grades</a></li>
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-user"></i> Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="studentinformation.php">Students Information</a></li>
                      <li><a href="grades.php">Grades</a></li>
                      
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
                    <img src="images/profil.jpg" alt=""><?php echo $_SESSION['username']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
				  
    
    <h5>Add Course</h5>
	<form class="form-horizontal form-label-left" action="addsubject.php" method="post">
   
	<br />
                    

	 
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Code</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="subject_code" >
                        </div>
                      </div>
                    
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="subject_name" >
                        </div>
                      </div>
        
        
        
	                  
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary "><a href="index.php" >Cancel</a></button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" class="btn btn-success" name="action">Submit</button>
                        </div>
                      </div>

                    </form>
                
			  
			  
			  
                
    <br/>
	 <div class="ln_solid"></div>
    <h5>Delete Course</h5>
	<form  action="addsubject.php" method="post">
   
	<br />

               <div class="col-md-6 col-xs-12">
                <div class="input-field col s6" style="width: 40%!important; margin-left: 5%; margin-top: 5%;">

      <select name="user">
      <option value="" disabled selected>Course To Be Deleted</option>
      <?php
      $query=mysqli_query($connect,"SELECT* FROM addsubject ");
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
    <input class="btn btn-danger" type="submit" name="submit" value="Delete" />
  </div>
</form>
					  <?php 
					   if(isset($_POST['submit'])){
                         $sub2=$_POST['user'];
              
                          mysqli_query($connect,"DELETE  from addsubject where name='$sub2'");
						 
					   }
             ?>
				
	
	         </div>
	    </div>
</div>
	
	
	
	
			  
			  <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
			  <form class="form-horizontal form-label-left" action="addsubject.php" method="post">
			  <div class="form-group">
               <ul class="integration-list" style=" overflow-x: scroll;">
                  <li class="collection-header"><h4>Added Courses</h4></li>
      <?php
      
        if (empty($_SESSION['count'])) {
     $_SESSION['count'] = 1;
  }else {
     $_SESSION['count']++;
  }
$i=$_SESSION['count'];


$xyz=mysqli_query($connect,"SELECT *  from addsubject ");
$x=1;
$s = mysqli_num_rows($xyz);
while($s--){
  $xxx=mysqli_fetch_array($xyz);
  $subject_name1=$xxx['name'];
  $subject_code1=$xxx['sub_code'];
  
        echo "<"."li "."class"."=".'"'."collection-item".'"'.">";
  echo "$x".".)"." $subject_code1"."       "."$subject_name1"." <br>";
  
   $x++;
	
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