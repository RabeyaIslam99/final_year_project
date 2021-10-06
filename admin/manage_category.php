<?php include('partials/menu.php');?>

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
         
         
            ?>

           </br> </br> 

      <!--Button to add Admin-->

      <a href="<?php  echo SITEURL; ?>admin/add_category.php" id="add_more"> Add more Category </a>
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
                             <a href="#" class="btn-secondary">Update Category</a>
                             <a href="#" class="btn-danger">Delete Category</a>

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
<?php //include('partials/footer.php');?>