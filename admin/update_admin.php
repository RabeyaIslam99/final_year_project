<?php include('partials/menu.php'); ?>
  
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin<h1>

        <br><br>
        <?php
            //1.Get the ID of selected admin
            $id=$_GET['id'];
            //2.Create SQL Query to get the details
            $sql="SELECT * FROM tbl_admin";

            //3.Execute the Query 
            $res=mysqli_query($con, $sql);
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full name:</td>
                    <td>
                        <input type="text" name="full_name" value="">
                    </td>
                </tr> 

                <tr>
                  <td>UserName: </td>
                  <td>
                      <input type="text" name="username" value="">
                  </td>
                </tr> 
                <tr>
                    <td colspan="2">
                      <input type="submit" name="submit" value="Update admin" class="btn-secondary">
                    </td>
                    
                </tr> 

            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php');?>
