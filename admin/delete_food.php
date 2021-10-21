<?php   
           //include constants file
            include('../config/constants.php');
             // echo "Update";

           if(isset($_GET['id'])   && isset($_GET['image_name'])  )
         {

           //process to delete
          // echo "process to delete";

           //1.Get Id and image name 
           $id = $_GET['id'];
           $image_name = $_GET['image_name'];




           //2.Remove the image if available
           //Check whether the image is available or not and delete the image if available
                if($image_name !="")
                {
                    //It has image and need to remove from folder
                    //Get the image path
                    $path= "../images/food/".$image_name;
                    //Remove image file from folder
                    $remove  = unlink($path);

                    //check whether the image is removed or not
                    if($remove==false)
                    {
                     //FAiles to remove image
                     $_SESSION['upload'] = "<div class = 'error'> Failed to remove image file.</div> ";
                      //Redirect to manage food section 

                      header('location:'.SITEURL.'admin/manage_food.php');
                      //Stop the process of deleting food 
                      die();
                    }


                }

           //3.Delete food from database 
           $sql = "DELETE FROM tbl_food WHERE id=$id";
           //Execute the query
           $res = mysqli_query($conn, $sql);

           //check whether the query is execute or not and set the session message respectively
           if($res==true)
           {
             //Food deleted
             $_SESSION['delete'] = "<div class= 'success'> Food info  deleted successfullly. </div>";
             header("location:".SITEURL.'admin/manage_food.php');
             
           }
           else
           {
               //Failed to delete food

               $_SESSION['delete'] = "<div class= 'error'> Failed delete the food info. </div>";
               header("location:".SITEURL.'admin/manage_food.php');
           }
              


           //4.Redirect to manage food page with session mesage


           }
         else
          {
             //Redirect to manage food page
               //echo "Redirect";

                 $_SESSION['unauthorize']= "<div class= 'error'>Unauthorized access.</div>";
             header('location:'.SITEURL.'admin/manage_food.php');


           }


?>