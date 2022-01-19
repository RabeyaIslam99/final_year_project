
<?php include('partials-font/menu.php'); ?>
 

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
       
               <div class="explore" >
            <div class="explore-info"> 
               <h1 class="animate__animated animate__fadeInUp">All Your Family Needs Is A Warm And Homemade Meal</h1>
               <p>So get fresh, tasty, pre-portioned ingredients with ultra-simple recipe cards to whip up heavenly meals in your very own kitchen.</p>
            </div>
              
               <div class="tawa">
                    <img src="images/tonnys-tawa.png" alt="">
                </div>
              
               </div>
               <div class="container">
               <h2 class="text-center">Explore Food Category</h2>
               <span id="head"></span>
             
             <?php
                 
             //Display all the categories that are active
             //Sql query
             $sql ="SELECT * FROM tbl_category where active='Yes'";

             //execute the query
             $res=mysqli_query($conn, $sql);

             //count rows
             $count = mysqli_num_rows($res);

             //Check whether categories is available or not

             if($count>0)
             {
                //categories available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the values
                    $id =$row['id'];
                    $title =$row['title'];
                    $image_name = $row['image_name'];
                   
                   
                   ?>
                    
                 <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
                   <div class="box-3 float-container">
                       <?php 
                       
                       if($image_name=="")
                       {
                           //image is not available 
                           echo "<div class ='error'>image is not available.</div>";
                       }
                        else
                        {
                            //image is available

                            ?>
                           <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" alt="Momo" height="200px" class="img-responsive img-curve">


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
                 echo "<div class ='error'>Category not fouond.</div>";
             }


             ?>

           
            
          


            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


<?php include('partials-font/footer.php'); ?>