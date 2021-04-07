<h1 class="text-primary"><i class="fa fa-user-plus"> </i> Update Student <small class="text-secondary">Update Student</small></h1>
            <ol class="breadcrumb">
            	
              <li class="active" style="margin-right: 15px"> <i class="fa fa-pencil-square-o" > </i> Update Student</li>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <li ><a href="index.php?page=deshboard"> <i class="fa fa-dashboard"></i> Dashboard</a> </li>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <li ><a href="index.php?page=all_student"> <i class="fa fa-user-plus"></i> Dashboard</a> </li>
            </ol>
        
      <?php            
    
   $id= base64_decode($_GET['id']);  
   $db_data=mysqli_query($link,"SELECT *  FROM `student_info` WHERE id='$id'") ;
   $db_row=mysqli_fetch_assoc($db_data);  




     if ( isset($_POST['update_student'])) {
      
        $name       =$_POST['name']; 
        $roll       =$_POST['roll'];
        $city       =$_POST['city']; 
        $pcontact   =$_POST['pcontact']; 
        $class      =$_POST['class']; 
        
        $photo      =explode('.',$_FILES['photo']['name']); 
         $photo   =end($photo); 
         $photo_name =$roll.'.'.$photo;



         $query="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact', `photo`='$photo_name' WHERE id= $id"; 
         $result=mysqli_query($link,$query);
         if($result){
         header('location:index.php?page=all_student');

         }
     }
 	?>

 <div class="row" style="color:orange">
 	<div class="col-sm-6"> 
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        	<label for="name"> Student Name</label>
        	<input type="text"  name="name" placeholder="Student Name" class="form-control" required="" value="<?php echo ucwords($db_row['name']);?>">
        </div> <div class="form-group">
        	<label for="roll"> Student Roll</label>
        	<input type="number"  name="roll"  id="roll" placeholder="Student Roll" class="form-control"  required="" value="<?php echo ucwords($db_row['roll']);?>" pattern="[0-9]{6}">
        </div> 
        <div class="form-group">
        	<label for="city"> City</label>
        	<input type="text"  name="city"  required="" id="city" placeholder="City" value="<?php echo ucwords($db_row['city']);?>" class="form-control">
        </div> 
        <div class="form-group">
        	<label for="pcontact"> Parents contact</label>
        	<input type="number"  name="pcontact" id="pcontact" placeholder="01----" class="form-control" value="<?php echo $db_row['pcontact'];?>"  required="" pattern="01[0-9]{9}">
        </div> 
        <div class="form-group">
        	<label for="class"> Class</label>
        	<select class="form-control" id="class" value="" required="" name="class">
						<option value="">-----</option>
						<option <?php echo $db_row['class']=='1'?'selected=""':'';?> value="1">One</option>
						<option <?php echo $db_row['class']=='2'?'selected=""':'';?> value="2">Two</option>
						<option <?php echo $db_row['class']=='3'?'selected=""':'';?> value="3">Three</option>
						<option <?php echo $db_row['class']=='4'?'selected=""':'';?> value="4">Four</option>
						<option <?php echo $db_row['class']=='5'?'selected=""':'';?> value="5">Five</option>
						<option <?php echo $db_row['class']=='6'?'selected=""':'';?> value="6">Six</option>
						<option <?php echo $db_row['class']=='7'?'selected=""':'';?> value="7">Seven</option>
						<option <?php echo $db_row['class']=='8'?'selected=""':'';?> value="8">Eight</option>
						<option <?php echo $db_row['class']=='9'?'selected=""':'';?> value="9">Nine</option>
						<option <?php echo $db_row['class']=='10'?'selected=""':'';?> value="10">Ten</option>
					</select>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo"  required="" id="photo" value="<?php echo $db_row['photo_name']; move_uploaded_file($_FILES['photo']['tmp_name'],'student_images/'.$photo_name);?>" class="form-control"> </div> 
      
        <div class="form-group"> <input type="submit" name="update_student" value="Update" class="btn btn-primary pull-right">
        </div> 

      </form>
 	</div>
 </div>                 