<?php include('partials/menu.php');?>


    <div class="main-content">
         <div class="wrapper">
         <h1>Add Category</h1>

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
                <table class="tbl-30"> 
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
                           <input type="submit" name="submit" value="Add category" class="btn-primary" >

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
                        //Redirect to Manage category page
                        header("location:".SITEURL.'admin/add_category.php');
                    }

                }
         

           ?>



         </div> 
   </div>
