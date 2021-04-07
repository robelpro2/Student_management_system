<h1 class="text-primary"><i class="fa fa-user-plus"> </i> User Profile <small class="text-secondary">User Profile</small></h1>
            <ol class="breadcrumb">
              
              <li class="active" style="margin-right: 15px"> <i class="fa fa-user" > </i> Profile</li>
              <li ><a href="index.php?page=deshboard"> <i class="fa fa-dashboard"></i> Dashboard</a> </li>
            </ol>

<?php 
	$session_user=$_SESSION['user_login'];
	$user_data=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$session_user'");
	$user_row=mysqli_fetch_assoc($user_data);
    
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
<a href="" class="btn btn-sm btn-info pull-right">Edit Profile</a>
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
		</form>
	</div>
</div>
