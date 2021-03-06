<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php 
ob_start();
include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%; height:655px; overflow-x: hidden;
">

    <div class="main-content">
         <div class="wrapper">
         <h1 >Add Category</h1>

         </br> </br>
           

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
         
         
            ?>

            <br><br>
                
         <!--Add category form starts -->

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-40"> 
                    <tr>
                       <td> Title : </td>
                       <td>
                            <input type="text" name="title" placeholder="Category title">

                       </td>
                    </tr>

                       <tr>
                          <td>Select Image:</td>
                          <td>
                            <input type="file" name="image">
                            
                          </td>


                       </tr>


                    <tr>
                       <td> Featured : </td>
                       <td>
                            <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No"> No

                       </td>
                    </tr>
 
                    <tr>
                       <td> Active : </td>
                       <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No

                       </td>
                    </tr>

                    <tr> 
                       <td colspan="2">
                           <input type="submit" name="submit" value="Add category" class=" btn btn-success" >

                       </td>

                    </tr>
                </table>
                <br><br>

              
            </form>    
           <!--Add category form ends -->

           <?php 
           
           //Check whether the submit button clicked or not
           if(isset($_POST['submit']))
           {
               //Submit button is clicked
               //echo "clicked";

               //1.Get the values from category form
               $title = $_POST['title'];
              


               //For radio input, we need to check whether the button is selected or not
               if(isset($_POST['featured']))
             {
                   //Get the value from from
                   $featured = $_POST['featured'];

               }
               else
                {
                   //Set the default value
                  $featured = "No";
               
               }
               if(isset($_POST['active']))
               {
                 $active = $_POST['active'];
                }
               else 
               {
                   $active = "No";
               }


               //Check whether the image name query  is selected or not and set the value for image name accordingly
               
                //print_r($_FILES['image']);

                 //die(); //Break the code here

                 if(isset($_FILES['image']['name']))
                {
                     $image_name = $_FILES['image']['name'];

                     //Upload the Image only if image is selected
                     if($image_name!="")
                    {


                     //Auto rename our iamge

                     //Get the extension of our image(jpg,png,gif,etc) e.g "specialfood1.jpg"
                     $ext = explode('.', $image_name);
                        
                     $file_extension = end($ext); //Gets the extension of the image

                     $image_name = "Food-Name-".rand(0000, 9999).'.'.$file_extension;


                 ;//eg. Food_category_834.jpg

                
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
                         header("location:".SITEURL."admin/add_category.php");

                         //Stop the process 
                         die();


                     }

                 }


                }
                
                else {
                     //Don't upload image and set the image_name value as blank
                     $image_name ="";
                 }

             


               //2. Create SQL Query to insert Category into Database
               $sql = "INSERT INTO tbl_category SET 
                       title='$title',
                       image_name = '$image_name',
                       featured='$featured',
                       active='$active'

                    ";

                    //3.Execute the Query and Save in Database
                    $res = mysqli_query($conn, $sql);
    
                    
                    //4. Check Whether the query executed or not or data added or not

                    if($res==TRUE)
                    {
                       //Query executed and Category added
                        $_SESSION['add'] = "<div class='success'>Category Added Successfully </div>";
                        //Redirect to Manage category page
                        header("location:".SITEURL.'admin/manage_category.php');
                    }
                    else
                    {
                        //Failed to Add category 
                        $_SESSION['add'] = "<div class='error'>Failed to add category.</div> ";
                        //Redirect to add category page
                        header("location:".SITEURL.'admin/add_category.php');
                    }

                }
         

           ?>



         </div> 
   </div>



   </div>
    </div>
</div>