<h1 class="text-primary"><i class="fa fa-user-plus"> </i> User Profile <small class="text-secondary">User Profile</small></h1>
           
<?php 
	$session_user=$_SESSION['user_login'];
	$user_data=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$session_user'");
	$user_row=mysqli_fetch_assoc($user_data);


     if ( isset($_POST['update'])) {
      
        $name       =$_POST['name']; 
        $username   =$_POST['username'];
        $email      =$_POST['email']; 
        $status     =$_POST['status']; 
        $class      =$_POST['class']; 
       
         $query="UPDATE `user` SET `name`='$name',`email`='$email',`username`='$username',`status`='$status' WHERE `username`='$session_user'"; 
        
         $result=mysqli_query($link,$query);
         
     }
 ?>

            
<div class="row" style="background-color: lightblue">
	<div class="col-sm-6">
		  <form action="" method="POST" enctype="multipart/form-data">
		  	
        <div class="form-group">
        	<label for="name"> User Name</label>
        	<input type="text"  name="name" class="form-control" required="" value="<?php echo ucwords($user_row['name']);?>">
        </div>  
        <div class="form-group">
        	<label for="username"> Username</label>
        	<input type="text"  name="username"  required="" id="username" value="<?php echo ucwords($user_row['username']);?>" class="form-control">
        </div>
        <div class="form-group">
        	<label for="city"> Email</label>
        	<input type="email"  name="email"  required="" id="email" value="<?php echo $user_row['email'];?>" class="form-control">
        </div>
        <div class="form-group">
        	<label for="status"> Status</label>
        	<input type="text"  name="status"  required="" id="status" value="<?php echo ucwords($user_row['status']);?>" class="form-control">
        </div> 
       
        <div class="form-group"> <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
        </div> 
       
</div>	
      

	<div class="col-sm-6">
		<a href="">
			<img src="images/<?php echo $user_row['photo'] ?>" style="height: 300px;width: 250px">
		</a><br><br>
        <?php 
          if (isset($_POST['upload'])) {
           $photo      =explode('.',$_FILES['photo']['name']); 
           $photo   =end($photo); 
           $photo_name =$session_user.'.'.$photo;

         $upload=mysqli_query($link,"UPDATE `user` SET photo`='$photo_name' WHERE `username`='$session_user'");

         	 move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
       

          }
         ?>

		<form action="" enctype="multipart/form-data"  method="POST">
			<label><b>Profile Picture</b></label><br>
			<input type="file" name="photo"  id="photo">
			<br><br>
			<input type="submit"  name="upload" value="Upload" class="btn btn-sm btn-primary ">
		</form><br><br>
	</div>
</div>
