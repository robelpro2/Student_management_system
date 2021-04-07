<!DOCTYPE html>
<html>
<head>
	<title>add_student</title>
	
</head>
<body>
<h1 class="text-primary"><i class="fa fa-user-plus"> </i> Add Student <small class="text-secondary">Add New Student</small></h1>
            <ol class="breadcrumb">
            	
              <li class="active" style="margin-right: 15px"> <i class="fa fa-user-plus" > </i> Add Student</li>
              <li ><a href="index.php?page=deshboard"> <i class="fa fa-dashboard"></i> Dashboard</a> </li>
            </ol>
        
      <?php            
      
     if ( isset($_POST['add_student'])) {
      
        $name       =$_POST['name']; 
        $roll       =$_POST['roll'];
        $city       =$_POST['city']; 
        $pcontact   =$_POST['pcontact']; 
        $class      =$_POST['class']; 
       

         $photo      =explode('.',$_FILES['photo']['name']); 
         $photo   =end($photo); 
         $photo_name =$roll.'.'.$photo;

         $query="INSERT INTO `student_info`( `name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$photo_name')"; 
         $result=mysqli_query($link,$query);

         if ($result) {
         	$success="Data Insert Successfull";
         	move_uploaded_file($_FILES['photo']['tmp_name'],'student_images/'.$photo_name);
         	
         }
         else{
         	$error="Data is not Insert";
         }
   }
 ?> 
 <div class="row">
 	<?php if(isset($success))  {echo '<p class="alert alert-info col-sm-6">'.$success.'</p>'; } ?>

 	<?php if (isset($error))  {echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';
 	} ?>
 </div>
 <h2 style="color: lightgreen">Student Registration Form</h2><hr>
 <div class="row" >

 	<div class="col-sm-6" style="background-color:  lightblue"> 
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        	<label for="name"> Student Name</label>
        	<input type="text"  name="name" placeholder="Student Name" class="form-control" required="">
        </div> <div class="form-group">
        	<label for="roll"> Student Roll</label>
        	<input type="number"  name="roll" id="roll" placeholder="Student Roll" class="form-control"   pattern="[0-9]{6}">
        </div> 
        <div class="form-group">
        	<label for="city"> City</label>
        	<input type="text"  name="city"  required="" id="city" placeholder="City" class="form-control">
        </div> 
        <div class="form-group">
        	<label for="pcontact"> Pcontact</label>
        	<input type="number"  name="pcontact" id="pcontact" placeholder="01----" class="form-control"  pattern="01[0-9]{9}" required="11">
        </div> 
        <div class="form-group">
        	<label for="class"> Class</label>
        	<select class="form-control" id="class"  required="" name="class">
						<option value="">-----</option>
						<option value="1">One</option>
						<option value="2">Two</option>
						<option value="3">Three</option>
						<option value="4">Four</option>
						<option value="5">Five</option>
						<option value="6">Six</option>
						<option value="7">Seven</option>
						<option value="8">Eight</option>
						<option value="9">Nine</option>
						<option value="10">Ten</option>
					</select>
        </div>
        <div class="form-group">
        	<label for="photo">Photo</label>
        	<input type="file" name="photo"  required="" id="photo" class="form-control"> </div> 

        	<div class="form-group"> <input type="submit" name="add_student" value="Add Student" class="btn btn-primary pull-right">
        </div> 

      </form>
 	</div>
 	<div class="col-sm-6"style="background-image: url('../images/1.jpg ');
			background-repeat: no-repeat;
			background-size:cover;"></div>
 </div>                 
</body>
</html>
