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
 
  $ques=$_POST['question'];
  $option_A=$_POST['option_A'];
  $option_B=$_POST['option_B'];
  $option_C=$_POST['option_C'];
  $option_D=$_POST['option_D'];
  $ans=$_POST['answer'];
  $sub=$_POST['user'];
  $_SESSION['subject'] = $sub;
  $ssss = mysqli_query($connect, "SELECT* from questions WHERE subject = '$sub' AND question = '$ques' ");
  $q=mysqli_fetch_array($ssss);
  $qC = $q['question'];
  $subjectC = $q['subject'];
  
  if (!$qC)
  {
  mysqli_query($connect," INSERT INTO questions(`question`,`option_A`,`option_B`,`option_C`,`option_D`,`answer`,`username`,`subject`)
    VALUES('$ques','$option_A','$option_B','$option_C','$option_D','$ans','$name','$sub')" );
  } 
  else 
  { 
     function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      alert("This question  already exist, enter another question");

    
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

    <title>Online Examnation System! | </title>

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
              <a href="index.html" class="site_title"><i class="glyphicon glyphicon-blackboard"></i> <span>OES</span></a>
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
                      
					  <li><a href="addsubject.php">Add Course</a></li>
                      
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
                      
                      
                    </ul>
                  </li>
                  
                </ul>
              </div>
             

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
		
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
                <div class="input-field col s12">
				 <div class="input-field row s30">
				
	<div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				  
    
    <h5>Add question</h5>
	<form class="form-horizontal form-label-left" action="questionbank.php" method="post">
   
	<br />
                    

                      
					  
					 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Question: <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" name="question" rows="3" placeholder="How much is 2+2?"></textarea>
                        </div>
                      </div>
	 
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Option A </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="option_A" placeholder="2">
                        </div>
                      </div>
                    
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Option B </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="option_B" placeholder="3">
                        </div>
                      </div>
        
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Option C </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="option_C"placeholder="4" >
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Option D </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="option_D"placeholder="1">
                        </div>
                      </div>
        
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Correct Answer </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="answer" placeholder="C">
                        </div>
                      </div>
                     
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
						
                   <select name="user">
      <option value="" disabled selected>Course To Add Question To</option>
      <?php
      $query=mysqli_query($connect,"SELECT* FROM addsubject ");
      $i=mysqli_num_rows($query);
      while($i--){
        $xxx=mysqli_fetch_array($query);
        $sub2=$xxx['name'];
        echo '<option value='."$sub2".'>'."$sub2".'</option>' ;
      }
      ?>
    </select>
                        </div>
                      </div>
        
        
	                  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary "><a href="index.php" >Cancel</a></button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" class="btn btn-success" name="action">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
			  
			  
			  
			  <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				  
			  <form class="" action="questionbank.php" method="post">
			  <div class="form-group">
			  
			   <label class="control-label col-md-8 col-sm-8 col-xs-12">View previously added questions for:  </label>
			  
       <select name="user2" class =" col-md-6 col-sm-6 col-xs-5" style="padding: 3px 8px;">
      <option value="" disabled selected>Choose Course</option>
      <?php
      $query=mysqli_query($connect,"SELECT* FROM addsubject ");
      $i=mysqli_num_rows($query);
      while($i--){
        $xxx=mysqli_fetch_array($query);
        $sub3=$xxx['name'];
        echo '<option value='."$sub3".'>'."$sub3".'</option>' ;
      }
      ?>
    </select>
	
	<button type="submit" class="col-md-2 col-sm-2 col-xs-12" style="padding: 0.30px 0.60px;"
     name="action2">Submit</button>
	
	 <br><br>
	 <div class="ln_solid"></div>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Click To View Questions For Choosen Subject</button>

			  
	
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"><?php echo $_POST['user2']; ?></h4>
                        </div>
                        <div class="modal-body">
                          <h4>Previously Added Questions</h4>
                          <p>
						  <?php 
						     if(isset($_POST['action2'])){
                               if (empty($_SESSION['count'])) {
                                    $_SESSION['count'] = 1;
                                }else {
                                        $_SESSION['count']++;
                                       }
                                $i=$_SESSION['count'];
                                $sub33 = $_POST['user2'];

                                $xyz=mysqli_query($connect,"SELECT *  from questions where username ='$name' AND subject = '$sub33' ");
								$x=1;
								$s = mysqli_num_rows($xyz);
while($s--){
  $xxx=mysqli_fetch_array($xyz);
  $quess=$xxx['question'];
  $option_A=$xxx['option_A'];
  $option_B=$xxx['option_B'];
  $option_C=$xxx['option_C'];
  $option_D=$xxx['option_D'];
   
        echo "<"."li "."class"."=".'"'."collection-item".'"'.">";
  echo "$x".".)"." $quess"."<br>";
  echo " a.)"." $option_A"."     b.)"." $option_B"."     c.)"." $option_C"."     d.)"." $option_D"." <br>";
  $x++;
}
							 }  
  ?>
						  
						  
						 </p>
                         
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         
                        </div>

                      </div>
                    </div>
                  </div>

                 


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