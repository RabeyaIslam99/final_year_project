<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%; height:655px; overflow-y:scroll ;
">
<div class="main-content">

  <div class="wrapper">
     <h1>Manage Food</h1>
     </br> </br> 
    <!--Button to add Admin-->

    <a href="<?php echo SITEURL;?>admin/add_food.php" id="add_more"  class="btn btn-success"> Add More Food </a>
</br> </br> </br> </br>
      
      
           <?php 
               if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                
            
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
               
                if(isset($_SESSION[' unauthorize']))
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }
                if(isset($_SESSION[' updated']))
                {
                    echo $_SESSION['updated'];
                    unset($_SESSION['updated']);
                }
               
                
                

              
            ?>





       <table class="tbl-full">
       <tr>
           <th>S.N</th>
           <th>Title</th>
           <th>Price</th>
           <th>Image name</th>
           <th>Featured </th>
           <th>Active</th>
           <th>Actions</th>
           </tr>

           
      <?php 
      //Create SQL query to get all the food
      $sql = "SELECT * FROM tbl_food  ";
      //Execute the query 
      $res = mysqli_query($conn , $sql);

      //Count Rows to  check whether we have foods or not
      $count = mysqli_num_rows($res);

       
      //Create serial number variable and set default value as 1
      $sn=1;




      if($count>0)
      {
          //we have foods in database
          //GEt the food from database and display
          while($row=mysqli_fetch_assoc($res))
          {

            //Get the values from individual columns
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
          
            $featured = $row['featured'];
            $active = $row['active'];

            ?>

         <tr>
           <td><?php echo $sn++; ?></td>
          <td><?php echo $title; ?></td>
           <td><?php echo $price; ?></td>
           <td><?php 
                if($image_name!="")
                {
                     //we have image , display image
                  ?>
                  <img  src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="80px">


           <?php
                   
                }
                else
                {
                    //WE donot have image display error message
                    echo "<div class ='error'> Image not added</div>";
                 

                }

           
           ?>
           </td>
           <td><?php echo $featured; ?></td>
          <td><?php echo $active; ?></td>
          <td>
            <a href="<?php echo SITEURL;?>admin/update_food.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update food</a>
            <a href="<?php echo SITEURL;?>admin/delete_food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete food</a>

          </td>
       </tr>
     




            <?php


          }
          


      }
      else
      {
          //Food not added into the database
          echo "<tr> <td colspan ='2' class ='error'>Food not added yet </td> </tr>";
      }


      
      ?>
      
       </table>
    </div>


</div>
</div>
    </div>
</div>