

<?php include('partials-font/menu.php'); ?>
<?php 
  //check whether the id is passed or not
    if(isset($_GET['category_id']))
    {
      //category id is set and get the id
       $category_id = $_GET['category_id'];
       //Get the category title 
       $sql = "SELECT title from tbl_category where id=$category_id";

       //execute the query 
       $res =mysqli_query($conn, $sql);
       //get the values from database
       
       $row  = mysqli_fetch_assoc($res);
       //get the title
       $category_title = $row['title'];



    }
    else{
        //category not passed 
        //redirect to home page
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search2 text-center ">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

        </div>
</section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            //create sql query to get food based on selected category
            $sql2= "SELECT * from tbl_food where category_id =$category_id";
            //execute the query 
            $res2 = mysqli_query($conn, $sql2);


            //count the rows
            $count2 = mysqli_num_rows($res2);
            //check whether food is available or not 
            if($count2>0)
            {
                //food is available 
                while($row2=mysqli_fetch_assoc($res2))
                {   
                    $id =$row2['id'];
                   $title = $row2['title'];
                   $price = $row2['price'];
                   $description =$row2['description'];
                   $image_name = $row2['image_name'];
                   ?>
                            <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            if($image_name=="")
                            {
                                //image not available
                                echo "<div class='error'>image is not available</div>";
                            }
                            else
                            {
                                //iamge available
                                ?>
                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                                <?php
                            }
                            
                              
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price">৳<?php echo $price;?></p>
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
                //food is available or not 
                echo "<div class='error'>food is not available</div>";
            }

            
            ?>

          

            

            <div class="clearfix"></div>

            

        </div>

    </section>
   
    <!-- fOOD Menu Section Ends Here -->

    
    <?php include('partials-font/footer.php'); ?>