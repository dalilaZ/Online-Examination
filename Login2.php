<!DOCTYPE html>
<?php include 'dbinfo.php'; ?>
<html lang="eng">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatibile" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Personel Registration Form | FMS </title>

<?php

//always start the session before anything else 
session_start(); 

if(isset($_POST['Username']) and isset($_POST['Password'])){ //check null
   $username = $_POST['Username'];//text field for username
   $password = $_POST['Password'];//text field for password


//store session data
$_SESSION['username']=$username; 

//connect to the database
$link= mysqli_connect($host, $user, $pass) or die ("Unable to connect");
mysqli_select_db($link,$database) or die("Unable to select database"); 

  //our sql query 
  $sql_query ="Select U.Username From users AS U, admin AS A Where U.Username ='$Username' AND U.Password = '$Password' AND U.Username = A.Username"; 

 //run our sql query
 $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));
         if($result == false)
           {
		echo 'The query failed'; 
	        exit();
 	    } 
	    if(mysqli_num_rows($result) == 1){ 
            //the username and passwor matches the database
            //move them to the page to which they neet to go 
	     header('Location: AdminSummary.php'); 
	     
             }

            $sql_query = "Select Username From users Where Username = '$username' AND Password = '$password'"; 
       
             //run sql query
	     $result = mysqli_query($link, $sql_query) or die(mysqli_error($link)); 
              if($result == false) 
 		{ 
		echo 'The query failed'; 
	        exit(); 
	 	} 

 		//actual verification happens
	      if(mysqli_num_rows($result) == 1) { 
	      //user name and password matches the database
  	     //move them to the page to hich they need to go 
	          header('Location: UserSummary.php'); 
              } else{
		  $err = 'Incorrect username and password'; 
	        } 
               echo "$err"; 
} 
?> 
	


<style>
form { 
       border: 5px solid #070707; 
 } 

 input[type=text], input[type=password] { 
      width: 100%;
      padding: 12px 20px; 
      margin: 8px 0; 
      display: inline-block; 
      border: 1px solid #ccc;
      box-sizing: border-box;
  }
 
 button { 
     background-color: #4CAF50;
     color: white; 
     padding: 14px 20px; 
     margin: 8px 0; 
     border: none;
     cursor: pointer; 
     width: 100%; 
  } 
button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 80px 0 3px 0;
}

img.avatar {
    width: 15%;
    border-radius: 60%;
}

.container {
    padding: 15px 300px ;
}
 .psw {
    float: right;
    padding-top: 20px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>


<body>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
 <div><h2 class="barone">Company Managment System</h2></div>
</head>


<form  method="post" action="" >

 <div class="imgcontainer">
 <img src="login.png" alt="Avatar" class="avatar">
 </div>

<div><h3 class="heading1">Login Form</h3></div>


 <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeolder = "Enter Username" name="Username" required>

    <label><b>Pasword</b></label>
    <input type ="password" placeholder="EnterPassword" name="Password" required>



    <button type="submit">Login</button>

    <input type="checkbox" checked="checked"> Remember me </div>

    <div class="container" style="background-color:#f1f1f1">
    <button type="reset" class="cancelbtn" value="Reset">Reset</button>
    <span class="psw">Forgot<a href="#" >password?</a></span>
    </div>
 </form>
<form action="NewUserRegistration.php" method="post">
<input type="Submit" value="Create Account"/>
</form>
    


   </body>
    </html>
<!--

<form action="" method="post">
<table>
<tr>
    <td>Username</td>
    <td><input type="text" name="Username" required/></td>
</tr>
<tr>
    <td>Password</td>
    <td><input type="text" name="Password" required/></td>
</tr>
</table>

<input type="Submit" value="Login"/>
</form>
<form action="NewUserRegistration.php" method="post">
<input type="Submit" value="Create Account"/>
</form>


</body>
</html>
-->

