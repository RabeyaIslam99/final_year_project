<?php include('partials/menu.php'); ?>
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
           <table class="tbl-30">
               <tr>
                    <td>Current password :</td>
                        <td>
                            <input    type="password" name="current_password"   placeholder="current_password">

                        </td>

                </tr> 

                <tr>
                    <td>New password :</td>
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
                 <input type="submit" name="submit" value="Change password" class="btn-secondary">
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


<?php include('partials/footer.php');?>