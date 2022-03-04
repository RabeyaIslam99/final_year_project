<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%
">

<div class="main-content">
    

  <div class="wrapper">
     <h1>Manage Category</h1>
     </br> </br> 
           
            <?php 
               if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);

                }
                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);

                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);

                }
                if(isset($_SESSION['no-category-found']))
                {
                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);

                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);

                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);

                }
                if(isset($_SESSION['failed_remove']))
                {
                    echo $_SESSION['failed_remove'];
                    unset($_SESSION['failed_remove']);

                }

                
                
         

         
         
            ?>

           </br> </br> 

      <!--Button to add Admin-->

      <a href="<?php  echo SITEURL; ?>admin/add_category.php" id="add_more" class="btn btn-success"> Add more Category </a>
    </br> </br> </br> </br>
       <table class="table">
       <tr>
           <th>S.N</th>
           <th>Title</th>
           <th>Image_name</th>
           <th>Featured</th>
           <th>Active</th>
           <th>Action</th>
           </tr>

       <?php
        
            //Query to get all categories from database
             $sql = "SELECT * FROM  tbl_category";
             //Execute query 
             $res = mysqli_query($conn, $sql);

             //count rows
             $count = mysqli_num_rows($res);
               
             //Create serial number variable assign value as 1
             $sn=1;




             //check whether we have data in database or not  
              if($count>0)
            {
              //WE have data in database
              //GEt the data and display
              while($row=mysqli_fetch_assoc($res))
              {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active= $row['active'];

                ?>
                 

                 <tr>
                       <td><?php echo $sn++; ?></td>
                       <td><?php echo $title; ?></td>

                        <td>
                          <?php 
                          
                          //Check Whether image name is available or not
                           if($image_name!="")
                           {
                              //Display the image
                              ?>

                               <img  src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="80px">

                               
                              <?php
                            

                           }
                           else {
                             //Display the message
                             echo "<div class ='error'> Image not added</div>";

                           }

                          
                          
                          ?>
                        
                        </td>


                        <td><?php echo $featured;?></td>
                        <td><?php echo $active?></td>
       
                         <td>
                             <a href="<?php  echo SITEURL;?>admin/update_category.php?id=<?php echo $id;?>" class="btn btn-secondary">Update Category</a>
                             <a href="<?php echo SITEURL; ?>admin/delete_category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete Category</a>

                           </td>
                   </tr>
      


                 
                <?php

              }
            }
            else {
              //we do not have data

              //We wil display the message inside the table
              ?>
              <tr>
                 <td>
                   <div colspan="6" class="error">No category added</div>
                 </td>

              </tr>

              <?php

            }

        ?>

      
     

       
       
       
       </table>
    </div>


</div>
</div>
    </div>
</div>