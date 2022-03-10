
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
                <img src="images/food/<?php echo $row['image_name']; ?>" alt="" style="hieght:180px; width:200px; margin-left:10px;">
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

                            <p class="food-price text-white text-center">Total : ৳ <?php echo $total; ?></p>
                            <input type="hidden"  name="price" value="<?php echo $total; ?>">

                        
                            
                    
                        </div>

                    </fieldset>
                    
                    <fieldset >
                        <legend class="text-center text-white">Delivery Details</legend>
                        <div class="order-label">Full Name</div>
                        

        
                    
                        <input type="text" readonly='readonly' name="full-name" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>"  class="input-responsive" required>
                        
                        <div class="order-label text-center text-white">Phone Number</div>
                        <input type="tel" name="contact" class="input-responsive" required>

                        <div class="order-label text-center text-white">Confirm Email</div>
                        <input type="email" name="email" class="input-responsive" required>
                        
                        <div class="order-label text-center text-white">Payement Method</div>
                        <select name="Method">
                        <option value="Cash on Delivery">Cash On Delivery</option>
                        <option value="bkash">bKash</option>

    </select>
                        <div class="order-label mt-4 text-center text-white">Address</div>
                        <textarea name="address" rows="4" class="input-responsive" required></textarea>
                        
                        
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
                //Session bugging problem clear
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


        <!-- Subscribe us -->
     <section class="text-center mb-4 " >
    <div class="container "  style=" width:600px; height: 50px; margin-bottom:200px; margin-top:50px;">
     <h1 >Get The Latest Meals</h1>
     <p >And receive ৳20 coupon for first order</p>
     <div class="input-group " >
  <input type="text" class="form-control" placeholder=" username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class=" btn btn-kit p-4" id="basic-addon2">Subscribe Us</span>
</div> <br> <br>
     

     <div class="mb-3 form-check text-left">
    <input type="checkbox" class="form-check-input" > 
    <label class="form-check-label" for="exampleCheck1">Subscribe us for get the latest update.</label>
  </div>
  </div>  <br> <br>
    </section>
        <div style="margin-top:200px;">
        <?php include('partials-font/footer.php'); ?>
        </div>
    