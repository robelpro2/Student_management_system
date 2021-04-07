<h1 class="text-primary"><i class="fa fa-user-plus"> </i> All Users <small class="text-secondary">All Users</small></h1>
            <ol class="breadcrumb">
              
              <li class="active" style="margin-right: 15px"> <i class="fa fa-user-plus" > </i> All Users</li>
              <li ><a href="index.php?page=deshboard"> <i class="fa fa-dashboard"></i> Dashboard</a> </li>
            </ol>



 <div class="table-responsive" style="background-color: lightblue">
              <table class="table table-bordered table-striped text-center">
                <thead>
                  <tr >
                    <th>Name</th>
                    <th>Emaill</th>
                    <th>User Name</th>
                    <th>Photo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $db_uinfo=mysqli_query($link,"SELECT * FROM `user` ");
                    while ($row=mysqli_fetch_assoc($db_uinfo)) {
  
                  ?>
                  <tr>
                    <td style ="padding-top:50px"><?php echo ucwords($row['name']);?></td>
                    <td style ="padding-top:50px"><?php echo $row['email'];?></td>
                    <td style ="padding-top:50px"><?php echo $row['username'];?></td>
                    <td style="height: 120px;width: 100px" > <img style="height: 120px;width: 100px" src="images/<?php echo $row['photo'];?>"></td>
                   
                  </tr>
                   <?php  
                   }
                   ?>
                </tbody>
              </table>
              </div>