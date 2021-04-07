<?php 

 session_start();
 require_once './dbcon.php';
 if (!isset($_SESSION['user_login'])) {
 	header('location: login.php');
 }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title></title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
		<!-- <link rel="stylesheet" type="text/css" href="../js/bootstrap.bundle.js"> -->
	
    <style type="text/css">
        .list-group-item:hover{
            background-color: orange;

        }
        .btn:hover{
          background-color: orange;
        }
    </style>
</head>
<body  style="min-height: 550px; background-image: url('../images/q.jpg');">
    <div class="row" style="background-image:url('../images/1.jpg');height: 40px">

<div class="col-sm-5" style="padding-top: 6px;padding-left: 60px; color:green"> <h4><b> STUDENT MANAGEMENT SYSTEM</b></h4></div>

<div class="col-sm-7" style="text-align:right;">
	<a href="index.php?page=welcome">
	<button class="btn ">Welcome</button></a>
	<a href="index.php?page=registration">
	<button class="btn "><i class="fa fa-user-plus"></i> Add user</button></a>
	<a href="index.php?page=profile">
	<button class="btn "><i class="fa fa-users"></i> Profile</button></a>
	<a href="https://www.google.com"><input type="text" placeholder="Search" name=""></a>
</div>
</div>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-3"  style="background-image:url('../images/g12.jpg'); background-size: cover;">
    			<div class="list-group">
    				<a href="index.php?page=deshboard" class="list-group-item active"><i class="fa fa-dashboard"> </i> Deshboard</a>
    				<a href="index.php?page=add_student" class="list-group-item" > <i class="fa fa-user-plus"></i>  Add Student</a>
    				<a href="index.php?page=all_student" class="list-group-item"><i class="fa fa-users"> </i> All Student</a>
    				 <a href="index.php?page=registration" class="list-group-item"><i class="fa fa-user-plus"> </i> Add User</a>
                     <a href="index.php?page=all_user" class="list-group-item"><i class="fa fa-users"> </i> All Users</a>
                     <a href="index.php?page=profile" class="list-group-item"><i class="fa fa-user"> </i> Active User</a>
    				<a href="logout.php" class="btn btn-secondary"><i class="fa fa-power-off"></i> Logout</a>
    			</div>
    		</div>
     		<div class="col-sm-9">
    			<div class="content">
    			 <?php 
                 
                 if (isset($_GET['page'])) {
                  $page=$_GET['page'].'.php';	
                 }
                 else{
                 	$page="crops_deshboard.php";
                 }
                 
                 if (file_exists($page)) {
                 	require_once $page;
                 }
                 else{
                 	require_once '404.php';
                 }
    			   ?>
    		</div>


    	</div>
    </div>
   
     <footer class="text-center" style="background-color: #3CA9E8; width: cover;margin-left: -15px; padding: 10px; color: #fff">
       	<p><b><h5>Copyright &copy:2017-2019 All Right Reserved: <a href="#">CSE-14th(EVE)</a></b></h5></p>
     </footer>
</body>
</html>
