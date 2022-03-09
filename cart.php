<?php 


include('partials-font/menu.php'); 


?>
 <?php  

if (!isset($_SESSION["cart"]))
   {
      header("location: index.php");
   }
else{
    $cart =  $_SESSION['cart'];
}


//  print_r($cart);

?>
 
 <div class="container">
    <h2 class='text-center text-white'>Cart</h2>

   <table class="table table-bordered bg-white">
       <tr>
           <th>Image</th>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Total</th>
           <th>Action</th>
       </tr>

       <?php
       $total = 0;

    foreach($cart as $key => $value){
        // echo $key ." : ". $value['quantity'] . "<br>";
        
        $sql = "SELECT * FROM tbl_food where id = $key";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result)
        ?>


            <tr>
           <td><img src="images/food/<?php echo $row['image_name']; ?>" alt="" style="hieght:100px; width:100px;"></td>
           <td><?php echo $row['title']?> </td>
           <td><?php echo $row['price']?> </td>
           <td><?php echo $value['quantity']?></td>
           <td><?php echo $row['price'] * $value['quantity'] ?> </td>
            <td><a href='deleteCart.php?id=<?php echo $key; ?>'>Remove</a></td>
            </tr>

        <?php

$total = $total +  ($row['price'] * $value['quantity']);
    }

      
    
    ?>
      
   </table>

   <div class="text-right">
    <!-- <button class="btn mr-3">Update Cart</button> -->

    <a class="btn btn-kit p-3 mb-3" href='order.php'>Checkout</a>
</div>
<div class="card">
<div class="card-header">Total</div>
<div class="card-body">
Total Amount: ৳ <?php echo $total; ?>.00/-
</div>
</div>

</div>






