<?php include('partials/menu.php'); ?>

<div class="main-content">
         <div class="wrapper">
           
            <h2>Add more food</h2>
            <br><br>


             <?php
             
             if(isset($_SESSION['upload']))
             {

              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
             }
             
             
             ?>
            

           <form action="" method="POST" enctype="multipart/form-data">
             <table class="tbl-30">
               <tr>
                 <td>Title:</td>
                 <td>
                   <input type = "text" name="title" placeholder="Title">
                 </td>
               </tr>
               <tr> 
                 <td>Description:</td>

                 <td> <textarea name="description" col="30" rows="5" placeholder="Description of food">  </textarea> </td>

               </tr>
               <tr>

                <td>Price:</td>
                <td> 
                  <input type="number" name="price">
                </td>

               </tr>
               <tr>
               <td>Select Image:</td>
              
                 <td>

                 <input type="file" name="image">
                
               </td>

               </tr>
               <tr> 
                 <td>Category:</td>
                 <td>
                  <select name="category">
                    <?php 
                    
                    //create Php code to display categories from database
                    //1..Create SQL to get all active categoreis from category data
                    $sql = "SELECT * FROM tbl_category WHERE active='Yes' ";
                      
                    $res = mysqli_query($conn, $sql);

                    //count rows to check whether we have categories or not
                      $count = mysqli_num_rows($res);

                       //If count is greater then zero, then we have categoris else we donot have categories
                      if($count>0)
                      {

                      //WE have categories
                       while($row=mysqli_fetch_assoc($res))
                       {

                         //GEt the details of categories
                         $id = $row['id'];
                         $title = $row['title'];
                        
                         ?>

                         <option value="<?php echo $id;?>"><?php echo $title;?></option>

                         <?php

                       }

                      }
                      else{
                         
                        //We donot have categories
                         ?>
                           <option value="0">No categories found</option>
                         <?php


                      }



                    //2..display non dropdown
                    
                    ?>
                       
                  
                  </select>

                 </td>
               </tr>

               <tr>
               <td>Featured:</td>

               <td>
                 <input type="radio" name="featured" value="Yes">Yes
                 <input type="radio" name="featured" value="No">No
               </td>



               </tr>
               
               <tr>
               <td>Active:</td>

               <td>
                 <input type="radio" name="active" value="Yes">Yes
                 <input type="radio" name="active" value="No">No
               </td>



               </tr>

               <tr> 
                       <td colspan="2">
                           <input type="submit" name="submit" value="Add food" class="btn-primary" >

                       </td>

                    </tr>



             </table>
          
          
          
          
          </form>

        <?php 
        
        //Check whether the button is clicked or not
        if(isset($_POST['submit']))
        {
              //Add the food into database

           // echo "click";
               //1..Get the data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //checked whether radio button foe featured and active checked or not
                if(isset($_POST['featured']))
                {
                  $featured = $_POST['featured'];


                }
                else{

                  $featured = "No"; //setting the default value for the featured option
                }
                if(isset($_POST['active']))
                {
                  $active = $_POST['active'];
                }
                else
                {
                  $active = "No";
                }




                //2..Upload the image if selected

                //Checked whether the image is clicked or not and upload the image if the image is selected
                if(isset($_FILES['image']['name']))
                {
                  //get the details of the selected image
                  $image_name = $_FILES['image']['name'];

                  //check whether the image is selected or not and upload the image only if selected
                if($image_name!="")
                {
                 //image is selected

                 //A...rename the image

                 //Get the categories of selected image (jpg,png,gif,etc)
                 $ext = end(explode('.', $image_name));

                 //Create new name for image
                 $image_name = "Food_name_".rand(0000,9999).".".$ext;//new image name 'Foof_name_45.jpg'


                 //B..upload the image
                 //source path and destination path
                 //Source path id the current location of the image
                 $src = $_FILES['image']['tmp_name'];



                 //Destination path for the image to be uploaded
                 $dst = "../images/food/".$image_name;

                 //finally upload the food image
                 $upload = move_uploaded_file($src, $dst);

                 //Check whether image uploaded or not
                 if($upload==false)
                 {
                      //Failed to upload the image
                      //redirect to add food page with error message
                      $_SESSION['upload'] = "<div class='error'>Failed to upload the image.</div>" ;
                      header("location:".SITEURL.'admin/add_food.php');
                      //Stop the process
                      die();

                 }



                }

                 }
                else
                {
                  $image_name = ""; //Setting the default value as blank


                }



               //3.. Insert into the database
               //create SQL query to save th e data into database
               //for numerical value we do not need to pass value inside ' ' but for the string value it is compolsury to add ''
               $sql2 = "INSERT INTO tbl_food SET
               title = '$title',
               description = '$description',
               price = $price,
               image_name  ='$image_name',
               category_id = $category,
               featured = '$featured',
               active = '$active'
               
               ";

              $res2 = mysqli_query($conn, $sql2);



              //check whether data inserted or not
               //4..Redirect with message to manage food page
              if($res2==true)
              {

                //Data inserted successfully
                $_SESSION['add'] = "<div class='success'>Food added food successfully.</div>";
                header("location:".SITEURL.'admin/manage_food.php');

              }
              else
              {
             //Failed to 
             $_SESSION['add'] = "<div class='error'>Failed to add food.</div>";
             header("location:".SITEURL.'admin/manage_food.php');

              }

             

        }
        
        ?>
        
        
        
        </div>





</div>