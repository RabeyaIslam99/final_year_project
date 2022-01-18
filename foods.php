<?php include('partials-font/menu.php'); ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center" style="background-image: url(images/back.jpg)">
        <div class="container " >
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required  style="background-color:#f0f5f5 ;">
                <input type="submit" name="submit" value="Search" class="btn-search">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


  


    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <span id="head"></span>

                   <?php 
                   //display the foods that are active
                   $sql = "SELECT * From tbl_food where active='Yes' ";

                  //Execute the query 
                  $res=mysqli_query($conn, $sql);
                  //count rows where the foods are available or not
                  $count=mysqli_num_rows($res);

                   //check whether the food are available or not
                   if($count>0)
                   {
                       //foods available
                       while($row=mysqli_fetch_assoc($res))
                       {
                           //Get the values
                           $id = $row['id'];
                           $title =$row['title'];
                           $description = $row['description'];
                           $price = $row['price'];
                           $image_name = $row['image_name'];
                           ?>
                             

                              
                      <div class="food-menu-box animate__animated animate__fadeInLeftBig">
                         <div class="food-menu-img">
                             <?php 
                             //check whether image is available or not
                             if($image_name=="")
                             {
                               //image not available
                               echo "<div class= 'error'>  Image not fouond.</div>" ;
                             }
                             else
                             {
                                 //image available
                                 ?>
                                         <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                 <?php
                             }
                             ?>
                        
                     </div>

                    <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price;?></p>
                    <p class="food-detail">
                         <?php echo $description;?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL ; ?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                           <?php


                       }
                   }
                   else
                   {
                      //food not available
                      echo "<div class= 'error'>Food not fouond.</div>" ;
                   }
                   
                   ?>

           

           
            

           

          


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-font/footer.php'); ?>