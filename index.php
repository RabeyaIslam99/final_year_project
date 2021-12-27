<?php include('partials-font/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
            //Create  SQL Query to display categories from database
            $sql = "SELECT * FROM tbl_category where active='Yes' and featured='Yes' LIMIT 5";//using limit we can display the category in our front page and we can also manage the category
            //Execute the Query 
            $res = mysqli_query($conn, $sql);
            //count rows to check whether the categoey is available or not
            $count = mysqli_num_rows($res);

            if($count>0)
            {

                //Categories available
                while($row=mysqli_fetch_assoc($res))
                {
                    //GET the values like iamge_name ,id,title
                    $id = $row['id'];
                    $title =$row['title'];
                    $image_name = $row['image_name'];
                    ?>
                     <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
                     <div class="box-3 float-container">
                         <?php 
                            //check whether the image is available or not
                            if($image_name=="")
                            {
                             //Display  message
                             echo "<div class='error'>Image not available</div>";
                            
                            }
                            else
                            {

                             //Image Available
                             ?>

                              <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="Momo" class="img-responsive img-curve">


                             <?php
                            }
                         ?>
                        
                         <h3 class="float-text text-white"><?php echo $title;?></h3>
                     </div>
                     </a>


                    <?php
                }
            }
            else
            {
                //categories not available
                echo "<div class ='error'>Category not Added.</div>";

            }


            
            
            ?>

           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            
            <?php 

            //getting food from databse that are active and featured
            //SQL query 
            $sql2 = "SELECT * FROM  tbl_food Where active='Yes' and featured='Yes' " ;
              //Execute the query 
              $res2 = mysqli_query($conn, $sql2);

              //count rows
              $count2 = mysqli_num_rows($res2);

              //check whether food is available or not
              if($count2>0)
              {
                  //food available

                  while($row=mysqli_fetch_assoc($res2))
                  {
                    //GET all the value from database 
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description =$row['description'];
                    $image_name = $row ['image_name'];

                   ?>
                    <div class="food-menu-box">
                       <div class="food-menu-img">
                           <?php 
                           
                           //Check whether image available or not
                           if($image_name=="")
                           {
                               //iamage not avaialbel
                               echo "<div class ='error'>Image not available.</div>";
                           }
                           else
                           {

                            //iamge available

                            ?>
                             <img src="<?php echo SITEURL ; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                            <?php

                           }

                           

                           ?>
                            
                    </div>

                   <div class="food-menu-desc">
                       <h4><?php echo $title;?></h4>
                         <p class="food-price">$<?php echo $price; ?></p>
                         <p class="food-detail">
                             <?php  echo $description; ?>
                        </p>
                       <br>

                       <a href="order.html" class="btn btn-primary">Order Now</a>
                   </div>
              </div>


                   <?php

                  }
              }
              else
              {
                  //food not available
                  echo "<div class='error>Food not available</div>";
              }


            
            ?>



          
            

           

            

           


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-font/footer.php'); ?>