<?php include('partials/menu.php');?>

<div class="main-content">

  <div class="wrapper">
     <h1>Manage Food</h1>
     </br> </br> 
    <!--Button to add Admin-->

    <a href="<?php echo SITEURL;?>admin/add_food.php" id="add_more" > Add More Food </a>
</br> </br> </br> </br>
      
      
           <?php 
               if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
              
            ?>





       <table class="tbl-full">
       <tr>
           <th>S.N</th>
           <th>Full Name</th>
           <th>UserName</th>
           <th>Actions</th>
           </tr>
       <tr>
       <td>1.</td>
       <td>Rabeya islam</td>
       <td>rabeyatonny</td>
       <td>
            <a href="#" class="btn-secondary">Update food</a>
            <a href="#" class="btn-danger">Delete food</a>

       </td>
       </tr>
       
       <td>2.</td>
       <td>Rabeya islam</td>
       <td>rabeyatonny</td>
       <td>
             <a href="#" class="btn-secondary">Update food</a>
            <a href="#" class="btn-danger">Delete food</a>

       </td>
       </tr>
       
       <td>3.</td>
       <td>Rabeya islam</td>
       <td>rabeyatonny</td>
       <td>
             <a href="#" class="btn-secondary">Update food</a>
              <a href="#" class="btn-danger">Delete food</a>
       </td>
       </tr>

       
       
       
       </table>
    </div>


</div>
<?php // include('partials/footer.php');?>