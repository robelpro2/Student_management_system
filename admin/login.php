<?php 
require_once './dbcon.php';
session_start();


 if (isset($_SESSION['user_login'])) {
 	header('location: index.php');
 }

if (isset($_POST['Login'])) {
	 $username   =$_POST['username']; 
     $password   =$_POST['password'];


     $usernamecheck=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$username'");
     if (mysqli_num_rows($usernamecheck)>0) {
        $row=mysqli_fetch_assoc($usernamecheck);
        //print_r($row);

        if ($row['password']==md5($password)) {
        	if ($row['status']=='active') {
        		$_SESSION['user_login']=$username;
        		header('location: index.php');
        	}
        	else{
        		$status_inactive="Your Status is inactive,please Active.";
        	}
        }else{
        	$wrong_password="This is wrong password!! <br> Please try again..";
        }
     }else{
     	 $username_not_found="This user name in not Found";
     	
     }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student management system</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.css">

	
</head>
<body  style="background-image: url('../images/1.jpg');background-size: cover">
	<div class="container" style="min-height: 630px"><br>
		
		<h1 class="text-center">Student management system</h1><br><br>
       <div class="row ">
       	<div class="col-sm-4"></div>
       	<div class="col-sm-4 text-center" style="background-image: url('../images/banner.jpg');">
       		<h3>Admin Login Form</h3><br>
       		<form action="" method="POST">
				<div>
					<input type="text" name="username" placeholder="Username" required="" value="<?php if(isset($username)){echo $username;}  ?>"  class="form-control">
				</div><br>
				<div>
					<input type="password" name="password" placeholder="Password" required="" value="<?php if(isset($password)) {echo $password;} ?>"  class="form-control">
				</div><br>
				<div>
					<a href="../index.php" class="float-left">Go back</a>
					<input type="submit" name="Login" value="Login" class="btn btn-info float-right">
				</div>
	      </form>

           <br> <br>  <br><br>
	      <?php  
        if (isset($username_not_found)) {
        	echo '<div class="alert alert-danger">'.$username_not_found.'</div>';
        }
         if (isset($wrong_password)) {
        	echo '<div class="alert alert-danger">'.$wrong_password.'</div>';
        }
        	 if (isset($status_inactive)) {
        	echo '<div class="alert alert-danger">'.$status_inactive.'</div>';
        }
        ?>
       	</div>
       </div>

       </div>
       

		<hr>
           
          <footer class="text-center" style="background-color: #3CA9E8;  margin-top: 20px; padding: 10px 0; color: #fff">
         	<p><b><h5>Copyright &copy:2017-2019 All Right Reserved: <a href="#">CSE-14th(EVE)</a></b></h5></p>
        </footer>

	

</body>
</html>