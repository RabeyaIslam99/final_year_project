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
           <table>
               <tr>
                    <td>Current pass:</td>
                        <td>
                            <input    type="password"    name="current_password"   placeholder="current_password">

                        </td>

                </tr> 

                <tr>
                    <td>New pass:</td>
                        <td>
                            <input type="password"name="new_password"placeholder="new_password">

                        </td>

                </tr>

                <tr>
                   <td>Confirm pass:</td>
                        <td>
                            <input type="password" name="confirm_password"placeholder="confirm_password">

                        </td>

                </tr>
               
                    <td colspan="2">
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                      <input type="submit" name="submit" value="Change password" class="btn-secondary">
                    </td>
                    
                </tr> 


            </table>

        </form>  

    </div>
</div>

<?php include('partials/footer.php');?>