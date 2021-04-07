<h1 class="text-primary"><i class="fa fa-user-plus"> </i> User Profile <small class="text-secondary">User Profile</small></h1>
            <ol class="breadcrumb">
              
              <li class="active" style="margin-right: 15px"> <i class="fa fa-user" > </i> Profile</li>
              <li ><a href="index.php?page=deshboard"> <i class="fa fa-dashboard"></i> Dashboard</a> </li>
            </ol>

<?php 
	$session_user=$_SESSION['user_login'];
	$user_data=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$session_user'");
	$user_row=mysqli_fetch_assoc($user_data);


     if ( isset($_POST['edit'])) {
      
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
		<table class="table table-bordered">
	<tr>
		<td>User ID</td>
		<td><?php echo $user_row['id']; ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo ucwords($user_row['name']); ?></td>
	</tr>
	<tr>
		<td>Username</td>
		<td><?php echo $user_row['username']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $user_row['email']; ?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><?php echo ucwords($user_row['status']); ?></td>
	</tr>
    <tr>
		<td>Signup Date</td>
		<td><?php echo $user_row['datetime']; ?></td>
	</tr>
</table>
<a href="index.php?page=edit_profile">
<input type="submit"  name="edit" value="Edit Profile" class="btn btn-sm btn-info pull-right"></a><br><br>
	</div>
	<div class="col-sm-6">
		<a href="">
			<img src="images/<?php echo $user_row['photo'] ?>" style="height: 295px;width: 250px">
		</a>
	</div><br><br>
</div>
