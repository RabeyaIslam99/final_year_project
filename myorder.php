<?php include('partials-font/menu.php'); ?>
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

<div class="main-content">
    <div class="container" style="margin-bottom:60px;">
        <h1 class="text-center">My order</h1> <br> 
        <span id="head"></span>

                <br /><br /><br />

    
                <br><br>

                <table class="tbl-full"  >
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Order Date</th>
                        <th width="10%">Food</th>
                        <th width="5%">Price</th>
                        <th width="5%">Qty</th>
                        <th width="6%">Total</th>
                        <th width="8%">Status</th>
                        
                        <th width="10%">Address</th>
                       
                    </tr>

                    <?php 
                        //Get all the orders from database
                        
                        $username= $_SESSION['username'];
                       
                        $sql = "SELECT * FROM tbl_order WHERE `customer_name` = '$username'";
                       
                        //Execute Query$username
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_address = $row['customer_address'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $order_date; ?></td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo '$'.$price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo '$'.$total; ?></td>
                                        

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label style='color: blue;'>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'><b>$status</b></label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                       
                                        <td><?php echo $customer_address; ?></td>
                                      
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

        <div style="margin-top:200px;" >
        <?php include('partials-font/footer.php'); ?> 
        </div>