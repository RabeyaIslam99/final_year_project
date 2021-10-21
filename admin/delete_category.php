<?php 
  //include constants file
  include('../config/constants.php');

  //echo "Delete page";
  
  //check whether the id and image_name valur is sset or not
  if(isset($_GET['id']) AND isset($_GET['image_name']))
{

    //Get the value and delete 
    //echo "Get value and delete"; 

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove the physical iamge file is available
    
    if($image_name!="")
    {
       //image is available so remove it

       $path = "../images/category/".$image_name;
      
       //remove the image
       $remove = unlink($path);


       //If we fail to remove image then add an error message and stop the process

       if($remove==false)
       {

         //Set the session message 
           $_SESSION['remove'] = "<div class = 'error'> Failed to remove category image.</div> ";

         // Redirect  to Manage category page
           header("location:".SITEURL.'admin/manage_category.php');
         //stop the process
         die();


       }




    }

    //Delete data from database
      //SQL query to delete data from database 
    $sql = "DELETE FROM tbl_category WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //Check whether the data id delete from database or not
    if($res==true)
    {
        //Set success message and redirect to manage category page
        $_SESSION['delete'] = "<div class= 'success'> Category deleted successfullly. </div>";
        header("location:".SITEURL.'admin/manage_category.php');
        
    }
    else {
        //Set failed message and redirect
        $_SESSION['delete'] = "<div class= 'error'> Failed deleted successfullly. </div>";
        header("location:".SITEURL.'admin/manage_category.php');
    }
    
    
    
    //Redirect to manage category page with message



}
else {
    //Redirect to Manage category page
    header("location:".SITEURL.'admin/manage_category.php');
}


?>