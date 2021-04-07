<h1 class="text-primary"><i class="fa fa-user-plus"> </i> All Students <small class="text-secondary">All Students</small></h1>
            <ol class="breadcrumb">
              
              <li class="active" style="margin-right: 15px"> <i class="fa fa-user-plus" > </i> All Students</li>
              <li ><a href="index.php?page=deshboard"> <i class="fa fa-dashboard"></i> Dashboard</a> </li>
            </ol>



 <div class="table-responsive"  style="background-color: lightblue">
              <table class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Class</th>
                    <th>City</th>
                    <th>Contact</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $db_sinfo=mysqli_query($link,"SELECT * FROM `student_info` ");
                    while ($row=mysqli_fetch_assoc($db_sinfo)) {
  
                  ?>
                  <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo ucwords($row['name']);?></td>
                    <td><?php echo $row['roll'];?></td>
                    <td><?php echo $row['class'];?></td>
                    <td><?php echo ucwords($row['city']);?></td>
                    <td ><?php echo $row['pcontact'];?></td>
                    <td style="height: 120px;width: 100px" > <img style="height: 120px;width: 100px" src="student_images/<?php echo $row['photo'];?>"></td>
                    <td style="width: 220px">
                      <a href="index.php?page=update_student&id=<?php echo base64_encode($row['id']);?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                      &nbsp;&nbsp;&nbsp;
                      <a href="delete_student.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                   <?php  
                   }
                   ?>
                </tbody>
              </table>
              </div>