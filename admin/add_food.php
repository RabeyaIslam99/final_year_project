<?php 
include('partials/menu.php');?>


     
    <div class="main-content">
         <div class="wrapper">
         <h1>Add More Food Option</h1>
         <br><br>

         <?php 
         
         if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);

                }
         
         
         ?>




         <form action="" method="POST" enctype="multipart/form-data">
           <table class= "tbl-30">
              
             <tr>
             <td> Title :</td>
             <td>
               <input type="text" name="title" placeholder="title">
             </td>


             </tr>
            
             <tr>
             <td> Description: </td>
             <td>
               <textarea name="description" cols="30" rows="5" placeholder="add description "></textarea>
             </td>



            </tr>
            
            <tr>
            <td> Price: </td>
            <td>
              <input type="number" name="price">
            </td>

            </tr>
            
              <tr>
                  <td>Image Name:</td>
                  <td>
                       <input type="file" name="image">
                 </td>
              </tr>
            
            <tr>

            <td> Category:</td>
            <td>
              <Select>
                   <?php 
                   
                   //Cretate php code to display categories from database
                   //1.Create SQL to get all active categories from database
                    $sql = "SELECT * FROM tbl_category WHERE active = 'Yes' ";

                    //Executing Query
                    $res = mysqli_query($conn, $sql);

                    //Count rows to check whether we have categories or not
                    $count = mysqli_num_rows($res);

                    //If count greater then zero , else we have categories we donot have categories
                    if($count>0)
                    {
                         //we have categories
                         while($row=mysqli_fetch_assoc($res))
                         {
                           //Get the details of category
                           $id = $row['id'];
                           $title = $row['title'];

                           ?>

                           <option value="<?php echo $id;?>"><?php echo $title ; ?></option>

                           <?php
                          

                         }


                    }
                    else {
                      //We donot have categories
                      ?>
                     <option value = "0"> No categories found.  </option>

                      <?php

                    }

                   

                   //2.Display on dropdown
                   
                   
                   
                   ?>
                  
                  
              </Select>
             
            </td>


            </tr>
            
            <tr>

            <td> Featured:</td>
                   <td>
                             <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No"> No
                  </td>

 
            </tr>


            <tr>

              <td> Active: </td>
             <td>
                          <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No

             </td>


             </tr>

             <tr> 
                       <td colspan="2">
                           <input type="submit" name="submit" value="Add Food" class="btn-primary" >

                       </td>

                    </tr>



               </table>
        
        
        
        
        </form>
        <?php 
             //check whether button is clicked or not
             if(isset($_POST['submit']))
             {

              //add the food in database
             // echo "clicked";

             //1.Get the data from form 
             $title = $_POST['title'];
             $description = $_POST['description'];
             $price = $_POST['price'];
             $category = $_POST['category'];

             //Check whether the radio button for active and featured is checked
             if(isset($_POST['featured']))
             {
               $featured = $_POST['featured'];
             }
             else
             {
                 $featured ="No";//Settindg the default value

             }
             if(isset($_POST['active']))
             {

              $active = $_POST['active'];

             }
             else
             {
               $active = "no";

            
             }



             //2.upload the image if selected
           //Check whether image is clicked or not and upload the image only if the image is selected
           if(isset($_FILES['image']['name']))
           {

           //Get the details of the selected image
           $image_name = $_FILES['image']['name'];

           //check whether the image is selected or not and upload image only if selected 
           if($image_name!="")
           {
             //image is selected 

             //A.Rename the image
             //Get the extension of selected image(jpg,png,gif,etc.)
             $ext = end(explode('.',$image_name));

             //create new name for image
             $image_name = "Food_name_".rand(0000,9999).".".$ext; //New image name may be "Food_name"

             //B.Upload the image
             //Get the src path and destination path

             //Source path is the current location of the image
             $src = $_FILES['image']['tmp_name'];
             
             //Destination path for the image to the uploaded
             $dst = "../images/food/".$image_name;

             //finally upload the food image

             $upload = move_uploaded_file($src, $dst);

             //check wether image uploaded or not
             if($upload==false)
             {
               //Failed to upload the image
               //redirect to add Food page with error message

               $_SESSION['upload'] = "<div class ='error'>Failed to upload image.</div>";
               header("location:".SITEURL."admin/add_food.php");

               //Stop the process
               die();


             }



           }
            

           }
           else
           {
             $image_name = ""; //Setting default value as blank 

           }


             //3.Insert into database

             //4.Create SQL Query to save or add food
             //For numerical value we do not need to pass valur inside quotes '' but for string value it is compulsury to add quotes''
             $sql2 = "INSERT INTO tbl_food SET 

               title = '$title',
               description = '$description',
               price = $price,
               image_name = '$image_name',
               category_id ='$category',
               featured = '$featured',
               active = '$active'


             ";
              

             //Execute the query 
             $res2 = mysqli_query($conn, $sql2);
             //check whether data inserted or not
               //4.Redirect with message  to manage food

              if($res2==true)
              {
                //Data inserted successfully 
                $_SESSION['add'] = "<div class='success'>FOOD info Added Successfully </div>";
                header("location:".SITEURL.'admin/manage_food.php');

              }
              else
              {

                //Failed to insert the data
                $_SESSION['add'] = "<div class='error'>Failed to add FOOD info.</div> ";
                header("location:".SITEURL.'admin/add_food.php');
              }


           

             }


           
          

        ?>

             
   </div>
   
   </div>


