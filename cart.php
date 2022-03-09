<?php 
session_start();


include('partials-font/menu.php'); 

?>
 
 <div class="container">
<?php 
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
 <?php
            $items = $_SESSION['cart'];
            $cartitems = explode(",", $items);
            echo count($cartitems);
          ?>
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>S.NO</th>
	  		<th>Item Name</th>
	  		<th>Price</th>
	  	</tr>
		<?php
        
		$total = '';
		$i=1;
		 foreach ($cartitems as $key=>$id) {
			$sql = "SELECT * FROM tbl_food WHERE id = $id";
			$res=mysqli_query($conn, $sql);
			$r = mysqli_fetch_assoc($res);
		?>	  	
	  	<tr>
	  		<td><?php echo $i; ?></td>
	  		<td><a href="delcart.php?remove=<?php echo $key; ?>">Remove</a> <?php echo $r['title']; ?></td>
	  		<td>$<?php echo $r['price']; ?></td>
	  	</tr>
		<!-- <?php 
			$total = $total + $r['price'];
			$i++; 
			} 
		?> -->
	
	  </table>
	  
	</div>
 
</div>
 
 
<?php include('partials-font/footer.php'); ?>