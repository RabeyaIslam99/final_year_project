<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%; height:655px; overflow-y:scroll ;
">

<div class="main-content">

  <div >
     <h1>Manage Order</h1>
     </br> </br> 
    <!--Button to add Admin-->

    <!-- <a href="#" id="add_more" class="btn btn-success"> Add More Order</a> -->
</br> 

           <?php
           
           if(isset($_SESSION['update']))
           {
               echo $_SESSION['update'];
               unset($_SESSION['update']);
           }
          
           
           ?>

          <br> <br>



       <table class="tbl-full">
       <tr>
          
           <th>Food</th>
           <th>Price</th>
           <th>Qty.</th>
           <th>Total</th>
           <th>Order Date</th>
           <th>Status</th>
           <th>Customer name</th>
           
           <th> Email</th>
           <th>Address</th>
           <th>Actions</th>
           </tr>
               
           <?php
           //get all the orders form database
           $sql = "SELECT * from tbl_order ORDER BY id  desc";//display the latest order at first
           //execute query 
           $res = mysqli_query($conn, $sql);
           
           //count the rows
           $count = mysqli_num_rows($res);
           
           $sn =1; //create a 

           if($count>0)
           {
               //order available
               while($row=mysqli_fetch_assoc($res))
               {
                   //get all the data from databasse
                //    $id = $row['id'];
                $id = $row['id'];
                   $food = $row['food'];
                   $price = $row['price'];
                   $qty = $row['qty'];
                   $total = $row['total'];
                   $order_date = $row['order_date'];
                   $status = $row['status'];
                   $customer_name = $row['customer_name'];
                 
                   $customer_email= $row['customer_email'];
                   $customer_address = $row['customer_address'];

                   ?>
                        
                            <tr>
                        
                     
                        <td><?php echo $food ;?></td>
                        <td><?php echo $price ;?></td>
                        <td><?php echo $qty  ;?></td>
                        <td><?php echo  $total ;?></td>
                        <td><?php echo $order_date  ;?></td>

                        <td>
                            <?php 
                            //ordered, ondelivery, canceled and delivered
                            if($status=="ordered")
                            {
                                echo "<label>$status</label>";
                            }
                            elseif($status=="On Delivery")
                            {
                                echo "<label style='color: orange'>$status</label>";
                            }
                            elseif($status=="Delivered")
                            {
                                echo "<label style='color: green'>$status</label>";
                            }
                            elseif($status=="Canceled")
                            {
                                echo "<label style='color: red'>$status</label>";
                            }


                            ?>
                        </td>

                        <td><?php echo $customer_name ;?></td>
                       
                        <td ><?php echo $customer_email;?></td>
                        <td><?php echo  $customer_address ;?></td>
                        
                        <td>
                            <a href="<?php echo SITEURL;?>admin/update_order.php?id=<?php echo $id;?>" class="btn btn-secondary">Update order</a>
                            
                        </td>
                        <td>
                                <a href="<?php echo SITEURL; ?>admin/send_confirmation.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Send Confirmation</a>
                                        </td>
                        </tr>
                   <?php

               }
               
           }
           else
           {
               //order not available
               echo  "<tr><td colspan='12' class = 'error'>Order not available</td></tr>";
           }
      

           ?>


       
       
    

       
       
       
       </table>
    </div>


</div>
</div>
    </div>
</div>