<?php
    // require_once './dbcon.php';
    // session_start(); 
    if ( isset($_POST['Ragistration'])) {
      
        $name       =$_POST['name']; 
        $email      =$_POST['email'];
        $username   =$_POST['username']; 
        $password   =$_POST['password'];
        $c_password =$_POST['c_password'];

            


         $photo      =explode('.',$_FILES['photo']['name']); 
         $photo      =end($photo); 
         $photo_name =$username.'.'.$photo;
       echo '<!--  echo $photo_name; -->';

        $input_error =array();
      
        if( empty($name)){
        $input_error['name']="The Name field is required.";
        }

        if( empty($email)){
        $input_error['email']="The  email is required.";
        }
        if( empty($username)){
        $input_error['username']="The  username is required.";
        }
        if( empty($password)){
        $input_error['password']="The  password is required.";
        }
        if( empty($c_password)){
        $input_error['c_password']="The confirm password field is required.";
        }
        if(count($input_error)==0){
        $email_check= mysqli_query($link,"SELECT * FROM `user` WHERE `email` ='$email';");

        if(mysqli_num_rows($email_check)==0){
        $username_check= mysqli_query($link,"SELECT * FROM `user` WHERE `username` ='$username';");
          if(mysqli_num_rows($username_check)==0){

           if(strlen($password)>7){
            if($password == $c_password){
            $password=md5($password);
            $query="INSERT INTO `user`(`name`, `email`, `username`, `password`, `photo`,`status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')" ;
            $result=mysqli_query($link,$query);

              if($result){
              $_SESSION['data_insert_success']="Data Insert successfull";
             move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
             header('location: registration.php');  
            }else{
            $_SESSION['data_insert_error']="Data Insert Error";
          }
          }
            else{
            $password_not_match="Confirm password not match";
          }
         }
           else{
           $password_l="Password Require More Then 8 Character";
         }

        } else{
                $username_error="This username Already Exists";
       }

     } else{
            $email_error="This Email Address Already Exists";
     }
      }
        
            }
            
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Student management system</title>
	<meta charset="UTF-8">
	
	  <link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	
</head>
<body>
 <div class="container"><br>
  <h1 class="text-primary"><i class="fa fa-user-plus"> </i> Add Users <small class="text-secondary">Add New user</small></h1>
            <ol class="breadcrumb">
              
              <li class="active" style="margin-right: 15px"> <i class="fa fa-user-plus" > </i> Add Student</li>
              <li ><a href="index.php?page=deshboard"> <i class="fa fa-dashboard"></i> Dashboard</a> </li>
            </ol>
	 <h2 style="color: orange">User Registration Form</h2><hr>

   <?php if (isset($_SESSION['data_insert_success'])) {
     echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';
   }
    if (isset($_SESSION['data_insert_error'])) {
     echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';
   }
    ?>
   
   <div class="row" style="background-color: lightblue">
    	<div class="col-sm-6"><br>
	     <form action="" enctype="multipart/form-data" class="form-horizontal" method="POST">
			  
         <div class="form-group">
				   <label for="name" class="col-sm-3 control-label ">Name</label>
				   <div class="col-sm-8 form-check-inline">
				     
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php  if(isset($name)) {echo $name;} ?>" ></div>
				     
             <label class="error"><?php if(isset($input_error['name'])){echo $input_error['name'];} ?></label>
			  </div>

    			<div class="form-group">
    				<label for="email" class="control-label col-sm-3">Email</label>
    				<div class="col-sm-8 form-check-inline">

    				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php if(isset($email)){echo $email;} ?>"></div>

    				<label class="error"><?php if(isset($input_error['email'])){echo $input_error['email'];} ?></label>
            <label class="error"><?php if(isset($email_error)){echo $email_error;} ?></label>
    			</div>


    			<div class="form-group">
    				<label for="username" class="col-sm-3 control-label ">Username</label>
    				<div class="col-sm-8 form-check-inline">

    				<input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php if(isset($username)){echo $username;} ?>"></div>

    				<label class="error"><?php if(isset($input_error['username'])){echo $input_error['username'];} ?></label>
            <label class="error"><?php if(isset($username_error)){echo $username_error;} ?></label>
    			</div>



			<div class="form-group">
				<label for="password" class="control-label col-sm-3">Password</label>
				<div class="col-sm-8 form-check-inline">
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="<?php if(isset($password)){echo $password;} ?>"></div>
				<label class="error"><?php if(isset($input_error['password'])){echo $input_error['password'];} ?></label>
        <label class="error"><?php if(isset($password_l)){echo $password_l;} ?></label>
			</div>

			<div class="form-group">
				<label for="c_password" class="control-label col-sm-3">Confirm Password</label>
				<div class="col-sm-8 form-check-inline">
				<input type="password" class="form-control" id="c_password" name="c_password" placeholder="Enter password" value="<?php if(isset($c_password)){echo $c_password;} ?>"></div>
				<label class="error"><?php if(isset($input_error['c_password'])){echo $input_error['c_password'];} ?></label>
        <label class="error"><?php if(isset($password_not_match)){echo $password_not_match;} ?></label>
			</div>

			<div class="form-group">
				<label for="photo" class="control-label col-sm-3">Photo</label>
				<div class="col-sm-8 form-check-inline">
				<input type="file" id="photo" class="form-control" name="photo"></div>

			</div>
			
			<div class="col-sm-9 float-right">
				
				<input type="submit" name="Ragistration" value="Ragistration" class="btn btn-secondary ">
			</div>  <br>
        <br>
		</form>
       	</div>
        <br>
        <br>
        <div class="col-sm-6"style="background-image: url('../images/g1.jpg ');
      background-repeat: no-repeat;
      background-size:cover;"></div>
 </div>
       </div><br><br>
          <b><h4 class="" >If you have an account. please <a href="login.php" style="color: orange">Login</a></b>  </h4>
       	<hr>
           
           
       </div>
        

</body>
</html>