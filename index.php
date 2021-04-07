<!DOCTYPE html>
<html>
<head>
	<title>Student management system</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	
	<style type="text/css">
		body{
			background-image: url('images/atten.jpg ');
			background-repeat: no-repeat;
			background-size:100%;
		}
	</style>
</head >
<body style="">
	<div class="container" style=" min-height:380px"><br>
		<a class="btn btn-primary float-right" href="Admin/login.php" >Login Admin</a><br>
		<h1 class="text-center">Welcome to Student management system</h1>
		<br><br>
       <div class="row ">
       	<div class="col-sm-3"></div>
       	<div class="col-sm-5" style="background-image: url('images/banner.jpg ');width:800">
       		<form method="POST">
		<table class="table table-bordered">
			<tr>
				<td colspan="2" class="text-center"><label><b><h3>Student Information</h3></b></label></td>
			</tr>
			<tr>
				<td><label for="choose">Choose class</label></td>
				<td>
					<select class="form-control" id="choose" name="choose">
						<option value="">select</option>
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
				</td>
			</tr>
			<tr>
				<td><label for="roll">Roll</label></td>
				<td><input id="roll" class="form-control" type="text" name="roll" placeholder="Enter roll"></td>
			</tr>
			<tr>
				<td colspan="2" class="text-center"><input  type="submit" value="Show info" name="submit"></td>
			</tr>
		</table>
	</form>


       	</div>
       </div>
	  <br>
	  <br>
	 
      <?php 
      require_once './admin/dbcon.php';
        if (isset($_POST['submit'])) {
        	$choose  = $_POST['choose'];
        	$roll  = $_POST['roll'];

        	$result=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$choose' and `roll`='$roll'");
        	if (mysqli_num_rows($result)==1) {
        			$row=mysqli_fetch_assoc($result);
              ?>
                  <div class="row">
	  		<div class="col-sm-3"></div>
	  	<div class="col-sm-6 ">
	  		<table class="table-bordered text-center">
	  			<tr style="width: ">
	  				<td rowspan="4">
	  					<img src="admin/student_images/<?php echo $row['photo'] ?>" class="img-thumbnail" style="width: 150px" >
	  				</td>
	  				<td style="width: 100px">Name</td>
	  				<td style="width: 150px"><?php echo ucwords($row['name']) ?></td>
	  			</tr>
	  			<tr>
	  				<td>ROll</td>
	  				<td><?php echo $row['roll'] ?></td>
	  			</tr>
	  			<tr>
	  				<td>Class</td>
	  				<td><?php echo $row['class'] ?></td>
	  			</tr>
	  			<tr>
	  				<td>City</td>
	  				<td><?php echo ucwords($row['city']) ?></td>
	  			</tr>
	  			
	  		</table>
	  	</div>
	  </div>
	  <?php 

        		}else{ ?>
        			<script type="text/javascript">
        			alert('Data is Not Found!  Please Try Again. ');
        			</script>
        		<?php  }
        	}
        
       ?>

	  </div>
	  <div class="clearfix"></div>
	 	<hr>
           
           <footer class="text-center" style="background-color: #3CA9E8; margin-top: -15px;  padding: 10px 0; color: #fff">
       	<p><b><h5>Copyright &copy:2017-2019 All Right Reserved: <a href="#">CSE-14th(EVE)</a></b></h5></p>
     </footer>

	

</body>
</html>