<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
        <?php 
ob_start();
include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%; height:655px; overflow-y:scroll ;
">
<div class="main-content">
    <div class="wrapper">
        <h1>Update order</h1>
        <br><br>

        <?php 
        //check whether id is set or not 
        if(isset($_GET['id']))
        {
            //GET the order details
            $id = $_GET['id'];
            //get all the value based on id
            //SQL Query to get all details 
            $sql = "SELECT * from tbl_order where id=$id";

            //Execute the query 
            $res = mysqli_query($conn, $sql);
            //count rows 
            $count = mysqli_num_rows($res);
              




            if($count==1)
            {
                //Details available
                $row = mysqli_fetch_assoc($res);

                        $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact= $row['customer_contact'];
                        $customer_email= $row['customer_email'];
                        $customer_address = $row['customer_address'];


            }
            else
            {
                //details not avilable
                //redirect to manage order
                header('location:'.SITEURL.'admin/manage_order.php');

            }

        }
        else
        {
            //we will redirect to manage order page
            header('location:'.SITEURL.'admin/manage_order.php');
        }
        
        
        ?>

        <form action="" method="POST">

        <table class="tbl-40">
                       <tr> 
                     <td>Food name :</td>
                            <td>
                               <b> <?php echo $food;?></b>
                            </td>
                        </tr> 
                          
                        <tr>
                        <td>Price :</td>
                            <td>
                            <b>৳ <?php echo $price;?></b>
                                
                            </td>
                        </tr> 

                        <tr> 
                     <td>Quantity:</td>
                            <td>
                                <input type="number" name="qty" value="<?php echo $qty;?>">
                            </td>
                        </tr> 

                        <tr> 
                     <td>Status:  </td>
                            <td>
                                <select name="status">
                                    <option <?php if($status=="ordered"){echo "selected";}?> value="ordered">Ordered</option>
                                    <option <?php if($status=="On Delivery"){echo "selected";}?> value="On Delivery">On-delivery</option>
                                    <option  <?php if($status=="Delivered"){echo "selected";}?>value="Delivered">Delivered</option>
                                    <option <?php if($status=="Canceled"){echo "selected";}?>value="Canceled">Canceled</option>
                                </select>
                            </td>
                        </tr> 
                         

                        <tr>
                        <td>Customer name:   </td>
                            <td>
                            <input type="text" name="customer_name" value="<?php echo $customer_name;?>">
                            </td>
                        </tr> 

                        <tr>
                        <td>Customer contact:  </td>
                            <td>
                            <input type="text" name="customer_contact" value="<?php echo $customer_contact;?>">
                            </td>
                        </tr> 

                         
                        <tr>
                        <td>Customer email: </td>
                            <td>
                            <input type="text" name="customer_email" value="<?php echo $customer_email;?>">
                            </td>
                        </tr> 

                        <tr>
                        <td>Customer address: </td>
                            <td>
                           <textarea  name="customer_address" cols="20" rows="5"><?php echo $customer_address;?></textarea>
                            </td>
                        </tr> 


                        
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="hidden" name="price" value="<?php echo $price;?>">
                                <input type="submit" name="submit" value="Update order" class="btn btn-success">
                            </td>
                        </tr> 

        </table>


        </form>
        <?php
        
            //check whether update button is cliccked or not 
            if(isset($_POST['submit']))
            {
                //echo "clicked";

                //GEt all the values from  form

                //update the values and redirect to manage order page with message
                $id= $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty;

                $status =$_POST['status'];

                $customer_name =$_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'] ;
                $customer_address= $_POST['customer_address'];


                //Update the values
                $sql2 = "UPDATE tbl_order SET 
                 qty= $qty,
                 total = $total,
                 status ='$status',
                 customer_name  = '$customer_name',
                 customer_contact ='$customer_contact',
                 customer_email='$customer_email',
                 customer_address='$customer_address'
                 WHERE id=$id
                
                ";

              //  execute the query 
              $res2 = mysqli_query($conn, $sql2);
              
              //check whether update or not
              if($res2==true)
              {
                  //updated
                  $_SESSION['update']=  "<div class='success'>Order info updated successfully.</div >";

                header('location:'.SITEURL.'admin/manage_order.php');
              }
              else
              {
                  //failed to update
                  $_SESSION['update']=  "<div class='error'>Failed to updatee order info .</div >";

                header('location:'.SITEURL.'admin/manage_order.php');
              }





            }


        ?>


</div>
</div>


</div>
    </div>
</div>