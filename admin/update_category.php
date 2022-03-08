<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php 
 ob_start();
include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%; height:655px; overflow-y:scroll ;
">


    <div  class="main-content">

          <div class="wrapper">
             <h1> Update category </h1>
             </br> </br> 

             <?php 
             
             //Check whether the id is set or not
             if(isset($_GET['id']))

             {
                 //Get all the id and all  other details
                 // echo "Getting the data";
                 $id = $_GET['id'];
          
                 //Check SQL query to get all other details
                 $sql = "SELECT * FROM tbl_category WHERE id=$id";



           
        
                    //Execute the Query 
                    $res = mysqli_query($conn, $sql);

                    //Coount the rows to check whether the id is valid or not

                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                       //Get all the data
                       $row = mysqli_fetch_assoc($res);
                       $title = $row['title'];
                       $current_image = $row['image_name'];
                       $featured =  $row['featured'];
                       $active = $row['active'];

                    }
                    else
                     {
                        //Redirect to manage category with session message
                        $_SESSION['no-category-found'] = "<div class ='error'> Category not found. </div>";

                        header("location:".SITEURL.'admin/manage_category.php');

                    }


                }
                 
          
             else {
                //Redirect to manage category page
                header("location:".SITEURL.'admin/manage_category.php');
             
             }
             
             ?>
             

             <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-40"> 
                    <tr>
                       <td> Title : </td>
                       <td>
                            <input type="text" name="title" value="<?php echo $title; ?>" >

                       </td>
                    </tr>

                            <tr>
                               <td>
                                  Current Image:

                               </td>
                              <td>
                                  <?php 
                                 if($current_image!="")
                                 {

                                    //Display the image
                                    ?>

                                   <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image; ?>" width="130px">

                                    <?php

                                 }
                                 else {
                                    //Display message
                                    echo "<div class ='error'> Image not added</div>";
                                 }


                                 ?>
                              </td>
                           </tr>

                             <tr>

                                <td>New Image: </td>
                                <td>
                                   <input type="file" name="image">
                            
                                </td>
                            </tr>
                            <tr>
                                   <td>
                                   Featured:  <br> 
                                    </td>
                               <td>
                                  <input <?php if($featured=="Yes") {echo "Checked";} ?> type="radio" name="featured" value="Yes"> Yes
                                    <input <?php if($featured=="No") {echo "Checked";} ?>type="radio" name="featured" value="No"> No

                                </td>
                          </tr>


                            <tr>
                                <td> Active : </td>
                                <td>
                                     <input <?php if($active=="Yes") {echo "Checked";} ?>  type="radio" name="active" value="Yes"> Yes
                                   <input <?php if($active=="No") {echo "Checked";} ?>  type="radio" name="active" value="No"> No

                                </td>
                             </tr>
                          <tr> 
                            <td colspan="2">
                                <input type="hidden" name="current_iamge" value=<?php  echo $current_image;?>>
                                
                                <input type="hidden" name="id" value="<?php  echo $id;?>">
                                <input type="submit" name="submit" value="Update category" class="btn btn-success" >

                            </td>

                     </tr>

                 </table>
                <br><br>

              
            </form>   
            <?php 
            
            
            if(isset($_POST['submit']))
            {

                //echo "clickedddd";

              $title = $_POST['id'];
              $title = $_POST['title'];
              $current_image =$_POST['current_image'];
              $featured =$_POST['featured'];
              $active =$_POST['active'];

              //2.Updating the image if selected
              //Check whether the image is selected or not
              if(isset($_FILES['image']['name']))
              {
                //Get the iamge details
                 $image_name = $_FILES['image']['name'];
                 //Check whether the image is avilable or not
                if($image_name != "")
                {
                   //Image available
                   //A....upload the new image
                   //Auto rename our iamge

                     //Get the extension of our image(jpg,png,gif,etc) e.g "specialfood1.jpg"
                     $ext = end(explode('.', $image_name));


                     //Rename the image
                     $image_name = "Food_category_".rand(000, 999).'.'.$ext;//eg. Food_category_834.jpg

                
                     $source_path = $_FILES['image']['tmp_name'];

                     $destination_path = "../images/category/".$image_name;

                     // Finally upload the image

                     $upload = move_uploaded_file($source_path, $destination_path);

                     //Check whether image is uploaded or not

                     //And if the image is not uploaded we will stop the process redirect with error message

                     if($upload==false)
                     {
                         //set message
                         $_SESSION['upload'] = "<div class ='error'>Failed to upload image.</div>";
                         //Redirect to add category page
                         header("location:".SITEURL."admin/manage_category.php");

                         //Stop the process 
                         die();


                     }

                   //B...Remove the current image if available
                   if($current_image!="")
                   {
                     $remove_path = "../images/category/".$current_image;


                     $remove = unlink($remove_path);
                     //Check whether the image is remove or not
                     //If failed to remove then display the message and stop the process
                     if($remove==false)
                     {
  
                       //Failed to remove the image
                       $_SESSION['failed_remove'] = "<div class ='error'>Failed to remove current image.</div>";
                       header("location:".SITEURL."admin/manage_category.php");
                       die();//Stop the process
  
                     }

                   }

                  



                }
                else
                {
                  $image_name = $current_image;
                }

               
               }
              else
              {
                 $image_name = $current_image;
              }



              //3.Update the database
                $sql2 =  "UPDATE tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                     WHERE id= '$id'
                    ";

                    //Execute the query

                    $res2 = mysqli_query($conn, $sql2);
                     
              //4.Redirect to manage category page with message
              //Check whether executed or not
              if($res2==true)
              {
                
            //category updated
               $_SESSION['update'] = "<div class='success'> Category updated successfully  </div>";
               header("location:".SITEURL.'admin/manage_category.php');


              }
              else {
                 
               $_SESSION['update'] = "<div class='error'> Failed to update category </div>";
               header("location:".SITEURL.'admin/manage_category.php');

              }


            }
            ?> 

         </div>
         </div>

         </div>
    </div>
</div>



