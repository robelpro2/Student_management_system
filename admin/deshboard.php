<h1 class="text-primary"><i class="fa fa-dashboard"> </i> Dashboard <small class="text-secondary">Statistic Overview</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"> </i> Deshboard</li>
            </ol>
                  
            <?php 
              $count_student=mysqli_query($link,"SELECT * FROM `student_info`");
              $total_student=mysqli_num_rows($count_student);

               $count_user=mysqli_query($link,"SELECT * FROM `user`");
              $total_user=mysqli_num_rows($count_user);
             ?>
             <div>
            <div class="row row-responsive"   >
              <div class="col-sm-3" style="background-color:lightgreen; margin: 0 10px 0 10px;height: 150px; border: 1px blue;">
                <div class="panel panel-primary">
                               <div class="panel-heading">
                                <div class="row  bg-primary">
                                  <div class="col-md-3"  style="font-size: 55px"><i class="fa fa-users "></i></div>
                                  <div class="col-md-9">
                                    <div class="pull-right" style=" font-size: 55px"><?php  echo $total_student ?></div>
                                    <div class="clearfix"></div>
                                    <div class= "pull-right">All Student</div>
                                  </div>
                                </div>
                               </div>
                               <a href="index.php?page=all_student">
                                 <div class="panel-footer"style ="padding-top: 5px">
                                <span class="pull-left">All Student</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                <div class="clearfix"></div>
                               </div>
                               </a>  
                </div>
              </div>
              

            
              <div class="col-sm-3 " style="background-color:lightgreen;">
                <div class="panel panel-primary">
                               <div class="panel-heading">
                                <div class="row bg-primary">
                                  <div class="col-md-3"  style="font-size: 55px"><i class="fa fa-users "></i></div>
                                  <div class="col-md-9">
                                    <div class="pull-right" style=" font-size: 55px"><?php  echo $total_user ?></div>
                                    <div class="clearfix"></div>
                                    <div class= "pull-right">All Users</div>
                                  </div>
                                </div>
                               </div>
                               <a href="index.php?page=all_user">
                                 <div class="panel-footer"style ="padding-top: 5px">
                                <span class="pull-left">All Users</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                <div class="clearfix"></div>
                               </div>
                               </a>  
                </div>
              </div>


              <!-- <div class="col-sm-3" style="background-color:lightgreen; margin: 0 10px 0 10px; border: 1px black;">
                <div class="panel panel-primary">
                               <div class="panel-heading">
                                <div class="row  bg-primary">
                                  <div class="col-md-3"  style="font-size: 45px"><i class="fa fa-users "></i></div>
                                  <div class="col-md-9">
                                    <div class="pull-right" style=" font-size: 45px">10</div>
                                    <div class="clearfix"></div>
                                    <div class= "pull-right">All Student</div>
                                  </div>
                                </div>
                               </div>
                               <a href="#">
                                 <div class="panel-footer">
                                <span class="pull-left">All Student</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                <div class="clearfix"></div>
                               </div>
                               </a>  
                </div>
              </div> --> <br><br>
          </div>
              
               
              <hr>
              <h2 style="color: orange"><b> Student List</b></h2>
           
             <div class="table-responsive" style="background-color: lightblue">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>City</th>
                    <th>Contact</th>
                    <th>Photo</th>
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
                    <td><?php echo ucwords($row['city']);?></td>
                    <td ><?php echo $row['pcontact'];?></td>
                    <td style="height: 120px;width: 100px" > <img style="height: 120px;width: 100px" src="student_images/<?php echo $row['photo'];?>"></td>
                  </tr>
                   
                   <?php  
                   }
                   ?>
                </tbody>
              </table>
              </div>
              </div>