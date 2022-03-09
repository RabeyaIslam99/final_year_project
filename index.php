<?php ob_start();
include('partials-font/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center mt-0">
    <div>
            



      <!-- image slider -->
   
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/back.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block ">
       
      <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn-search">
            </form>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/bgg.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn-search">
            </form>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/bg--2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn-search" >
            </form>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <!-- image slider end -->
           

        </div>
    </section>


    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>



       <!-- How it Works section card start -->
       <h2 class="text-center mt-4">HOW IT WORKS</h2>
            <span id="head"></span>

       <section class=" container">
       <div class="row row-cols-1 row-cols-md-3 g-4 ">
  <div class="col">
    <div class="card h-100 border border-white  shadow p-3 mb-5 bg-white rounded-3">
      <img src="images/search.png" class="card-img-top p-4" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center" >Choose Your Favorite Meals</h5>
        <p class="card-text text-muted text-center" > 
        Choose from our wide selection of delicious meal options and add-ons.
         (We’ve got Express, Kid-Friendly, or Healthy- to name a few.)
         </p>
      </div>
    </div>
  </div>
  <div class="col ">
    <div class="card h-100 border border-white shadow p-3 mb-5 bg-white rounded ">
      <img src="images/search-2.png" class="card-img-top p-4" alt="...">
      <div class="card-body">
      <h5 class="card-title text-center" >We Deliver It To You</h5>
      <p class="card-text text-muted text-center" > 
           Choose your favorite meals and order online.
          Our chef-designed recipes include balanced meals, 
          quick one-pan dinners, and top-rated dishes with premium kosher ingredients.
         </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 border border-white shadow p-3 mb-5 bg-white rounded">
      <img src="images/search-3.png" class="card-img-top p-4" alt="...">
      <div class="card-body">
      <h5 class="card-title text-center" >Cook & Enjoy!!!</h5>
      <p class="card-text text-muted text-center" > 
      Follow the step-by-step recipe cards to create homey and nourishing dishes to fill up hungry tummies.
         </p>
      </div>
    </div>
  </div>
 
  </div>
</div>


       </section>
    

       <!-- How it Works section card start -->
           <section class="container d-flex align-items-center justify-content-center mt-4">
           
             <div>
               
               <img class="w-75" src="images/food-kit.png" alt="">
             </div>

             <div class="mt-4 p-3">
               <h1>What's Inside in <br> our Kitchen?</h1> <br>
               <img src="images/fresh-icon.png" alt="">
               <small class="text-muted">Fresh, pre-portioned produce straight from the farm</small><br><br>

               <img src="images/fridge-icon.png" alt="">
               <small class="text-muted">Convenient mealkit packages that fit perfectly into your fridge</small> <br><br>

               <img src="images/prep-icon.png" alt="">
               <small class="text-muted">Perfectly measured dressings & sauces for minimal prep time</small> <br><br>

               <img src="images/hungry-icon.png" alt="">
               <small class="text-muted">Extra generous amounts so that nobody goes hungry</small><br><br>

               <img src="images/receipe-icon.png" alt="">
               <small class="text-muted">Easy-to-follow recipe cards ,teenagers also can prepare dinner, too!!!</small> <br>
                  <a href="" class="btn btn-kit">Explore Now</a>
                  <img  class="w-50 ms-4" src="images/chili.png" alt="">

             
               
             </div>
            
           </section>
           

       <!-- All fresh kit and meal item start -->
      





        <!-- All fresh kit and meal item end -->

     

    <!-- fOOD sEARCH Section Ends Here -->
        <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
        
        ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            
            <h2 class="text-center">Explore Food Categories</h2>
            <span id="head"></span>




            <?php 
            //Create  SQL Query to display categories from database
            $sql = "SELECT * FROM tbl_category where active='Yes' and featured='Yes' LIMIT 3";//using limit we can display the category in our front page and we can also manage the category
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

        <p class="text-center">
            <a href="categories.php">See All Categories</a>
        </p>
       
        
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2  class="text-center">Food Menu</h2>
             <span id="head"></span>

            
            <?php 

            //getting food from databse that are active and featured
            //SQL query 
            $sql2 = "SELECT * FROM  tbl_food Where active='Yes' and featured='Yes' Limit 3" ;
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
                         <p class="food-price">৳ <?php echo $price; ?></p>
                         <p class="food-detail">
                             <?php  echo $description; ?>
                        </p>
                       <br>

                       <a href='addToCart.php?id=<?php echo $id; ?>'  class="btn btn-kit  btn-xs pull-right"  >
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </a>
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
            <a href="foods.php">See All Foods</a>
        </p>
    </section>


     <!-- Review Slide section added -->
     
   
    <!-- fOOD Menu Section Ends Here -->


    <!-- contact us form start here -->

  
    <?php include('subscribe.php'); ?>

    <!-- contact us form end here -->


    <?php include('partials-font/footer.php'); ?>