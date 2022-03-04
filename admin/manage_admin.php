<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%
">
   
    <!--Main content  section starts -->
  
    <div  class="main-content">
          <div class="wrapper">
             <h1 >Manage Admin</h1>
         </br> </br> 
        <?php 
  
          if(isset($_SESSION['add']))
       {
             echo $_SESSION['add'];//Displaying session message
             unset($_SESSION['add']);//Removing  session message
       }
       if(isset($_SESSION['delete']))
       {
           echo $_SESSION['delete'];
           unset($_SESSION['delete']);
       }
       if(isset($_SESSION['update']))
       {
           echo $_SESSION['update'];
           unset($_SESSION['update']);
       }
       if(isset($_SESSION['user-not-found']))
       {
           echo $_SESSION['user-not-found'];
           unset($_SESSION['user-not-found']);
       }
       if(isset($_SESSION['password-not-match']))
       {
           echo $_SESSION['password-not-match'];
           unset($_SESSION['password-not-match']);
       }
      if(isset($_SESSION['change-pwd']))
       {
           echo $_SESSION['change-pwd'];
           unset($_SESSION['change-pwd']);
       }

        ?>
        </br></br>
      <!--Button to add Admin-->

         <a href="add_admin.php"  id="add_more" class="btn btn-success"> Add more admin</a>
      </br> </br> </br> </br>
        
   
       <table class="table" >
        <tr>
           <th>S.N</th>
           <th>Full Name</th>
           <th>UserName</th>
           <th> Actions  </th>
           
        </tr>
    
       
       <?php 
           //Query to get all admin 
           $sql = "SELECT * FROM  tbl_admin";
           //Executed the query
           $res = mysqli_query($conn,$sql);
           //Check whether the query is executed or not 
           if($res==TRUE)
           {
               //Check Rows to check whether we have data in database or not
               $count = mysqli_num_rows($res);//Function to get all the rows in database

               $sn =1; //Create the value and assign the value
               //Check the num of rows 
               if($count>0)
                 {
                   //We have data in database
                   while($rows = mysqli_fetch_assoc($res))
                   {
                   //Using while loop to get all the data from database
                   //And while loop will run as long as we have data in database 

                   //Get individual data
                   $id = $rows['id'];
                   $full_name = $rows['full_name'];
                   $username =$rows['username'];
                    
                   //Display the values in our table
?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo $username; ?></td>
                       <td>
                        <a href="<?php echo SITEURL; ?>admin/update_password.php?id=<?php echo $id; ?>"class="btn btn-primary">ChangePassword</a>
                        <a href="<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id; ?>"class="btn btn-secondary">Update</a>
                        <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?>"class=" btn btn-danger">Delete</a>
                       </td>
                    </tr
 


                <?php


                   }
                 }
                   else
                    {
                        //we do not have data in data base
                        

                    }



                 }
               ?>
              
            
        
        </div>
              
 </div>
    </table>
            </br></br>
  <!-- Main content  section ends -->

  </div>
    </div>
</div>
   

 