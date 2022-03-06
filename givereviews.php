
<?php
ob_start();
include('partials-font/menu.php'); ?>
<?php
// Initialize the session

if(!isset($_SESSION)) { 
    session_start(); 
    
  } 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
    <?php 
        //CHeck whether food id is set or not
        if(isset($_GET['user_name']))
        {
            //Get the Food id and details of the selected food
            $user_name = $_GET['user_name'];

          
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>
<a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search2">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $user_name ; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $user_name ; ?>">

        
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                      

     
                  
                    <input type="text" readonly='readonly' name="full-name" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" placeholder="E.g. William Moore" class="input-responsive" required>
                    
                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 7410000000" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. william@codeastro.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            ob_start(); 
              
                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                   

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO review_table SET 
                        
                        order_date = '$order_date',
                       
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL);
                        exit;
                        
                        
                        
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                        exit;
                    }

                }
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-font/footer.php'); ?>