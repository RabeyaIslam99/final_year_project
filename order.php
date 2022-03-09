
<?php
ob_start();
include('partials-font/menu.php'); 
$cart =  $_SESSION['cart'];
?>
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





    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search2 p-3">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend class="text-center text-white" >Selected Food</legend>

                    <div class="food-menu-img">
                    <?php
       $total = 0;
       $namesItems =" ";
       
    foreach($cart as $key => $value){
        // echo $key ." : ". $value['quantity'] . "<br>";
        
        $sql = "SELECT * FROM tbl_food where id = $key";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result)
        ?>

           
            <tr>
           <td>
               <img src="images/food/<?php echo $row['image_name']; ?>" alt="" style="hieght:150px; width:150px; margin-left:10px;">
            </td>
           
            </tr>

        <?php
        
                    $namesItems .=  "$row[title] ,";
                
                
                $total = $total +  ($row['price'] * $value['quantity']);
    }

      
    
    ?>

                    </div>
    
                    <div class="food-menu-desc">
                        <h3 class="text-center text-white"><?php echo $namesItems; ?></h3>
                        <input type="hidden"  name="food" value="<?php echo $namesItems; ?>">

                        <p class="food-price text-white">Total : ৳<?php echo $total; ?></p>
                        <input type="hidden"  name="price" value="<?php echo $total; ?>">

                     
                        
                
                    </div>

                </fieldset>
                
                <fieldset >
                    <legend class="text-center text-white">Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                      

     
                  
                    <input type="text" readonly='readonly' name="full-name" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>"  class="input-responsive" required>
                    
                    <div class="order-label text-center text-white">Phone Number</div>
                    <input type="tel" name="contact" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" class="input-responsive" required>
                     
                    <div class="order-label">Payement Method</div>
                    <select name="Method">
                    <option value="Cash on Delivery">Cash On Delivery</option>
                    <option value="bkash">B Kash</option>

</select>
                    <div class="order-label">Address</div>
                    <textarea name="address" rows="7" class="input-responsive" required></textarea>
                    
                    
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php 
            //CHeck whether Update Button is Clicked or Not
            if (isset($_POST['submit'])) {
                $fromEmail = 'homoliciousyoufood@gmail.com';
                $toEmail = $_POST['email'];
                
                $food = $_POST['food'];
                $price = $_POST['price'];
                $to = $toEmail;
                $subject = 'order confirmed' .$food.
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
                $message = 'thank you sir for your order'. 
                $result = @mail($to, $subject, $message, $headers);
            
            
            }
                
        ?>
              
            <?php
            ob_start(); 
              
                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    

                    // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled
                    $selected_val = $_POST['Method'];
                   
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];
                       ///filtering email

                       if (filter_var($customer_email, FILTER_VALIDATE_EMAIL) === false) {
    
                               exit("invalid format");
    
                           }

             else{
                 //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        
                        order_date = '$order_date',
                        status = '$status',
                        payment = '$selected_val',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

             }
                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        unset($_SESSION['cart']);
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
      <div style="margin-top:200px;">
      <?php include('partials-font/footer.php'); ?>
      </div>
 