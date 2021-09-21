
<?php 
  //include  constants.php file here
  include('../config/constants.php  ');

   //1.Get the id of admin  to be deleted
  $id = $_GET['id'];
//2.Create SQL query to 
$sql ="DELETE FROM tbl_admin WHERE id=$id";
//Execute the query
$res = mysqli_query($conn, $sql);

//Check whether the query executed successfully or not

  if($res==TRUE)
  {
          //Query executed successfully and Admin Deleted
          //echo "Admin Deleted";
          //Create session variable to display Message
          $_SESSION['delete'] = "<div class='success'>Admin deleted successfully </div>";
          //Redirect to message Admin page
          header('location:'.SITEURL.'admin/manage_admin.php');
             

  }
  else
{
//Failed to delete Admin
//echo "Failed to delete the admin";
$_SESSION['delete'] = "<div class='error'>Failed to  delete admin try again later </div>";
header('location:'.SITEURL.'admin/manage_admin.php');

}


 //3.Rediect to manage admin page with message (succes/error)
?>