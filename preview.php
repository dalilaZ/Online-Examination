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
$sub2 =$_SESSION['sub']; 
   $r=mysqli_query($connect,"SELECT* FROM exam WHERE username='$name' AND subject='$sub2' ");
   $count = mysqli_num_rows($r); 
   
   ?>
   
	


	

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Examination System | </title>

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
              <div class="title_left">
                <h3>Select The Course</h3>
				<form action="preview.php" method="post" >
               <div class="row">
                <div class="input-field col s6" style="width: 70%!important; margin-left: 5%; margin-top: 5%;">

      <select name="user">
      <option value="" disabled selected>Choose your subject</option>
      <?php
      $query=mysqli_query($connect,"SELECT  name FROM addsubject");
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
    <input class="btn waves-effect waves-light" style="padding-top: 7px!important; margin-left: 5%; margin-top: 2%; margin-down= 5%; "type="submit" name="submit" value="SUBMIT" />
  </div>
</form>
				
              </div>
            
              
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Exams</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     In this table exams that you made are showen. Clicking on delete button you can delete exam.
                    </p>
					<form action="preview.php" method="post">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						  <th>Action</th>
                          <th>Exam Name</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Start Hour</th>
                          <th>End Hour</th>
                          <th>Duration</th>
                          <th>Total Questions</th>
						  <th>See Questions</th>
                          <th>Status</th>
                         
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
		if(isset($_POST['submit'])){
              $sub=$_POST['user'];
              $_SESSION['sub']=$sub;
              $_SESSION['ref']=1;
              $_SESSION['aa']=$sub;
			  
              $xyz=mysqli_query($connect,"SELECT DISTINCT exam_id from exam_question where subject='$sub' AND username='$name' ");
              $i=mysqli_num_rows($xyz);
              $_SESSION['i']=$i;
              $_SESSION['r']=1;
              while($xxx= mysqli_fetch_array($xyz)){
                $exam_id=$xxx['exam_id'];
           
              $q1=mysqli_query($connect, "SELECT* from exam WHERE id='$exam_id'");
			  $row = mysqli_fetch_array($q1);
			  $exam_name = $row['exam_name'];
			  $sdate= $row['start_date'];
			  $fdate =$row['finish_date'];
			  $shour =$row['start_hour'];
			  $fhour =$row['finish_hour']; 
			  $duration =$row['duration']; 
			  
			  $q3=mysqli_query($connect, "SELECT* from exam_question WHERE subject='$sub' AND username='$name' AND exam_id='$exam_id'");
			  $total = mysqli_num_rows($q3); 
			  
			  
			  
              
			 ?>
                        
					    <tr>
						  <td>
						    <a onclick="return confirm('Are you sure?')" href="?idd=<?php echo $exam_id?>" class="btn btn-danger">Delete</a></td>
		
		
                          <td><?php echo $exam_name; ?></td>
                          <td><?php echo $sdate; ?></td>
                          <td><?php echo $fdate; ?></td>
                          <td><?php echo $shour; ?></td>
						  <td><?php echo $fhour; ?></td>
						  <td><?php echo $duration; ?></td>
						  <td><?php echo $total; ?></td>
						  <td><a  href="edit.php?id=<?php echo $exam_id?>" class="btn btn-danger">View</a></td></td>
                          <td><?php 
						  
						  
						 
$nowDate = strtotime(date("Y-m-d"));
$DateBegin = strtotime("$sdate");
$DateEnd = strtotime("$fdate");
$timeBegin = strtotime("$shour");
$timeEnd =strtotime("$fhour"); 
$timeNow=strtotime(date("H:i:s")); 

if($nowDate >= $DateBegin && $nowDate <= $DateEnd) {
   echo "ACTIVE";
} else {
    echo "NOT ACTIVE";  
}    ?> </td>
						  
						  
						  
                        </tr>
						
					   <?php }}
                         if (isset($_GET['idd'])){
                            $idd = $_GET['idd'];
							$result= mysqli_query($connect,"Delete from exam where id='$idd'");
						    
							if ($result) {?>
								<script> 
								    alert("Exam succesfuly deleted!");
									
								</script><?php
							}
							else { ?>
								<script>
								     alert("Exam could not be deleted!");
									 
								</script> <?php
							}
			
						 }
							?>
                       
                      </tbody>
                    </table>
					
					
					</form>
					
                  </div>
                </div>
              </div>
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