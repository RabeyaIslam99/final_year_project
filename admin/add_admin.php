<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%
">


<div class="main-content">
   <div class="wrapper">
   <h1>Add Admin</h1>

</br> </br>
 <?php 
  
  if(isset($_SESSION['add']))//Checking whether the session is set or not
{
     echo $_SESSION['add'];//Displaying session message
     unset($_SESSION['add']);//Removing  session message
}

?>

   <form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>FullName:</td>
            <td>
                <input type="text" name="full_name" placeholder="Enter your name">
            </td>
            <td></td>
        </tr>
        <tr>
            <td>UserName:</td>
            <td>
                <input type="text" name="username" placeholder="Your username">
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <input type="password" name="password" placeholder="Correct password">
            </td>
            <td></td>
        </tr>
        
    </table>
    <br>
    <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add admin" class="btn btn-success">

            </td>
        </tr>
       </form>

   </div> 
</div>



<?php include('partials/footer.php');?>

<?php

  //Process the value from form and save it in Database

  //Check where the submit button is clicked or not clicked
  
  if(isset($_POST['submit']))
  {
     //button clicked
    // echo "Button clicked";

    //1.Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password =md5($_POST['password']);//Password Encryption with MD5
    
    //2.SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET 
         full_name ='$full_name',
         username ='$username',
         password ='$password'
    
     ";
     
     //3.Executing Query and saving data into Database
    $res = mysqli_query($conn,$sql) or die(mysqli_error());
    
    //4.Check whether the (Query is executed) data is inserted or not and display appropriate message
    if($res==TRUE)
    {  
      //Data Inserted 
      //echo "Data successfully inserted";
      //Create a session variable to display message
      $_SESSION['add'] = "<div class='true'>Admin added successfully </div>";
      //Redirect page Manage admin
      header("location:".SITEURL.'admin/manage_admin.php');
    }
    else
    {    
        //Fail to insert data
        // echo "Failed to insert the data";
         //Create a session variable to display message
      $_SESSION['add'] = "<div class='false'>Failed to add admin</div>";
      //Redirect page ADD admin
      header("location:".SITEURL.'admin/add_admin.php');
    }
    
    }
  



 
?>
</div>
    </div>
</div>