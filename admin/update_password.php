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
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password<h1>
        <br><br>
        <?php
           if(isset($_GET['id']))
            {
             $id = $_GET['id'];
            }
        ?>
        
        <form action="" method="POST">
           <table class="tbl-40">
               <tr>
                    <td>Current password :</td>
                        <td>
                            <input    type="password" name="current_password"   placeholder="current_password">

                        </td>

                </tr> 

                <tr>
                    <td>New password : </td> <br>
                        <td>
                            <input type="password"name="new_password"placeholder="new_password">

                        </td>

                </tr>

                <tr>
                   <td>Confirm password :</td>
                        <td>
                            <input type="password" name="confirm_password"placeholder="confirm_password">

                        </td>
             


            </table>
            <br>
            </tr>
               
               <td colspan="2">
                 <input type="hidden" name="id" value="<?php echo $id;?>">
                 <input type="submit" name="submit" value="Change password" id="cng-pass" class="btn btn-success">
               </td>
               
           </tr> 

        </form>  

    </div>
</div>

<?php 
     //Check whether the submit button is clicked or not
     if(isset($_POST['submit']))
     {
         //echo "clicked";
         //1.Get the data from Form
         $id=$_POST['id'];
         $current_password = md5($_POST['current_password']);
         $new_password = md5($_POST['new_password']);
         $confirm_password = md5($_POST['confirm_password']);
         
         //2.Check whether the user with current ID and current password Exists or not
         $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
          
         //Execute the query
         $res = mysqli_query($conn, $sql);

         if($res==TRUE)
         {
             //Check whether data is avaialble or not
             $count=mysqli_num_rows($res);

             if($count==1)
             {
              //User exists and Password can be changed
              //echo "User found";

              //Check whether the new password and confirm password match or not
              if($new_password==$confirm_password)
              {
                  //update the password
                  echo "Password match ";
                  $sql2 ="UPDATE tbl_admin SET 
                  password= '$new_password'
                  WHERE id=$id

                  ";

                  //Execute the query
                  $res2= mysqli_query($conn, $sql2);
                  //Check whether the query executed or not
                   if($res2==TRUE)
                  {
                     
                    //Display the succcess message
                    //Redirect to manage admin page with success massege
                  $_SESSION['change-pwd'] = "<div class='success'>Password changed successfully.</div>";
                 //Redirect the user
                  header("location:".SITEURL.'admin/manage_admin.php');
                  }
                 
                  else 
                  {
                      //Display error message
                         //Redirect to manage admin page with error massege
                 

                  }
              }
              else
              {
                  //Redirect to manage admin page with error massege
                  $_SESSION['password-not-match'] = "<div class='error'>Password did not match.</div>";
                 //Redirect the user
                  header("location:".SITEURL.'admin/manage_admin.php');
              }

             }
             else
             {
              //User does not exists set message and redirect
              $_SESSION['user-not-found'] = "<div class='error'>User not found.</div>";
               //Redirect the user
               header("location:".SITEURL.'admin/manage_admin.php');
             }
         }

         //3.Check whether the new Password and confirm password match or not 
          
         //4. Change password if all above is true
     }



?>


</div>
    </div>
</div>