<?php include('partials/menu.php');?>



                <?php
                
                //check whether id is set or not
                if(isset($_GET['id']))
                {
                    //GEt all the details
                    $id =$_GET['id'];
                    //$QL Query to get the selected food
                    $sql2 = "SELECT * FROM tbl_food  WHERE id=$id";
                    //Execute the query 
                    $res2 = mysqli_query($conn, $sql2);

                    //Get the value based on query executed
                    $row2 =mysqli_fetch_assoc($res2);
                    //GEt the individaul values of selected
                    $title = $row2['title'];
                    $description = $row2['description'];
                    $price = $row2['price'];
                    $current_image = $row2['image_name'];
                    $current_category = $row2['category_id'];
                    $featured = $row2['featured'];
                    $active = $row2['active'];




                }
                else
                {
                    //REdirect to manage food page
                    header("location:".SITEURL.'admin/manage_food.php');
                }
                
                
                
                
                
                ?>


             <div class="main-content">

             <div class="wrapper">

              <h1>Update food</h1>
              <br><br>

              <form action="" method="POST" enctype="multipart/form-data">
              <table class="tbl-30">

              <tr>
                  <td>Title:</td>
                  <td>
                      <input type="text" name="title" value="<?php echo $title;?>">
                  </td>
              </tr>
              <tr>
              <td>Description:</td>
                  <td>
                      <textarea name="description" cols="30" rows="5" ><?php echo $description;?></textarea>
                  </td>
              </tr>
              <tr>
                   <td>Price:</td>
                   <td>
                       <input type = "number" name="price" value="<?php echo $price;?>">
                   </td>
                </tr>
              <tr>
                  <td>Current Image:</td>
                  <td>
                     <?php  
                     
                     if($current_image =="")
                     {
                         //Image not available
                         echo "<div class='error'> Image not available</div>";
                     }
                     else{

                        //image available
                        ?>

                        <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image;?>" width="120px">
                        <?php
                     }
                     
                     ?>
                  </td>

              </tr>
              <tr>
                  <td>Select iamge:</td>
                  <td>
                      <input type="file" name="image" >
                  </td>

              </tr>
              <tr>
                  <td>Category:</td>
                  <td>
                     <select name="category">
                         <?php 
                         //Query to get active categries from database
                         $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                         //Execute the query

                         $res = mysqli_query($conn, $sql);

                         $count = mysqli_num_rows($res);
                         //Check whether category is available or not
                         if($count>0)
                         {
                             //Category available
                             while($row=mysqli_fetch_assoc($res))
                             {
                                 $category_title = $row['title'];
                                 $category_id = $row['id'];
                                 //echo "<option value ='$category_id'> $category_title</option>";
                                 ?>
                            <option <?php if($current_category==$category_id) {echo "selected";}?> value ="<?php echo $category_id?>"> <?php echo  $category_title;?></option>;

                            <?php
                             }

                         }
                         else
                         {
                             //category not available
                             echo "<option value ='0'>Category not available. </option>";
                            
                         }




                         ?>
                         
                     </select>
                  </td>

              </tr>
              <tr>
               <td>Featured:</td>

               <td>
                 <input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                 <input <?php if($featured=="No") {echo "checked";}?> type="radio" name="featured" value="No">No
               </td>



               </tr>
               <tr>
               <td>Active:</td>

               <td>
                 <input <?php if($active=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes">Yes
                 <input <?php if($active=="No") {echo "checked";}?>type="radio" name="active" value="No">No
               </td>



               </tr>
               <tr> 
                       <td colspan="2">
                           <input type="hidden" name="id" value="<?php echo $id;?>">
                           <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                           <input type="submit" name="submit" value="Update food" class="btn-primary" >

                       </td>

                    </tr>

              </table>
          
          
            </form>

            <?php 
                 if(isset($_POST['submit']))
                 {
                    // echo "clicked";
                    //1.Get all the details from the form
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $current_image = $_POST['current_image'];
                    $category = $_POST['category'];

                    $featured = $_POST['featured'];
                    $active =$_POST['active'];

                    //2.Upload the image if selected

                    if(isset($_FILES['image']['name']))
                    {

                        //Upload button clicked
                        $image_name = $_FILES['image']['name'];//new image name
                        //Check whether the file is available or not
                        if($image_name!="")
                        {
                            //image is available

                            //A.uploading new image


                           //rename the image

                            $ext = end(explode('.', $image_name));//get the extension of the image
                            $image_name = "Food_name_".rand(0000, 9999).'.'.$ext;//this will be rename image

                         //get the source path and destination path
                         $src_path = $_FILES['image']['tmp_name'];//src path

                         $dst_path = "../images/food/".$image_name;//dst path


                         //upload the image
                         $upload = move_uploaded_file($src_path, $dst_path);


                         //chech the images is uploaded or not
                         if($upload==false)
                         {
                             //Failed to upload

                             $_SESSION['upload'] = "<div class='error'> Failed to upload the image</div>";
                             //redirect to manage food page

                             header("location:".SITEURL.'admin/manage_food.php');
                             die();
                         }

                          //3.Remove  the image if new image is uploaded and current image exists
                         //B.remove current image if available
                         if($current_image!="")

                         {

                            //current image is available
                            //remove the image
                            $remove_path = "../images/food/".$current_image;

                            $remove = unlink($remove_path);

                            //check whether the image is remove or not

                           if($remove==false)
                           {

                            //failed to remove current image
                            $_SESSION['remove-failed'] = "<div class='error'> Failed to remove the current image</div>";

                            header("location:".SITEURL.'admin/manage_food.php');
                            die();
                           }

                         }

                        }
                        else
                        {
                            $image_name = $current_image;//Default image when image is not selected

                        }
                    }
                    else
                    {
                        $image_name = $current_image;//default image when button is not is clicked
                       

                    }

                    

                    //4.Update the food in database

                    $sql3 = "UPDATE tbl_food SET
                     title = '$title',
                     description = '$description',
                     price = $price,
                     image_name = '$image_name',
                     category_id  = '$category',
                     featured = '$featured',
                     active = '$active'
                     WHERE id = $id
                    
                    
                    ";


                    $res3 = mysqli_query($conn, $sql3);

                  if($res3==true)
                  {
                     //Query executed and food updated
                     $_SESSION['updated'] = "<div class='success'> Updated successfully</div>";

                     
                     header('location:'.SITEURL.'admin/manage_food.php');

                    
                  }
                  else
                  {
                        //failed to update food
                        $_SESSION['updated'] = "<div class='error'> Failed to update food</div>";

                        header('location:'.SITEURL.'admin/add_food.php');

                  }


                    
                 }
            
            
            
            
            ?>



          
        </div>

             </div>