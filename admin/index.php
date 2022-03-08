<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%
">
        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div >
                <h1 class="text-center text-success"> Administrator Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>
                <div class='container'>

                <div class="row g-4">
    <div class="col text-center bg-white shadow-sm me-2 p-3 rounded-2" style= "margin-left:10px; margin-bottom:10px;">
            <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tbl_category";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Food Categories
    </div>
    <div class="col bg-white text-center shadow-lg ms-2 p-3" style= "margin-left:10px; margin-bottom:10px;">
    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_food";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
    </div>
    <div class="col bg-white shadow-lg ms-2 p-3 text-center" style= "margin-left:10px; margin-bottom:10px;">
    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM tbl_order";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
    </div>
    
  </div>
  <div class="row g-4">
    <div class="col bg-white shadow-lg ms-2 p-3 text-center" style= "margin-left:10px; margin-bottom:10px;">
    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];

                    ?>

                    <h1>৳<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
    </div>
    <div class="col bg-white shadow-lg ms-2 p-3 text-center" style= "margin-left:10px; margin-bottom:10px;">
    <?php 
                        //Sql Query 
                        $sql6 = "SELECT * FROM tbl_order WHERE status = 'Ordered'";
                        //Execute Query
                        $res6 = mysqli_query($conn, $sql6);
                        //Count Rows
                        $count6 = mysqli_num_rows($res6);
                    ?>

                    <h1><?php echo $count6; ?></h1>
                    <br />
                    Pending Orders
    </div>
    <div class="col bg-white shadow-lg ms-2 p-3 text-center" style= "margin-left:10px; margin-bottom:10px;">
    <?php 
                        //Sql Query 
                        $sql7 = "SELECT * FROM tbl_order WHERE status = 'On Delivery'";
                        //Execute Query
                        $res7 = mysqli_query($conn, $sql7);
                        //Count Rows
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    On Delivery Orders
    </div>
  </div>
  <div class="row g-3">
    <div class="col bg-white shadow-lg ms-2 p-3 text-center"style= "margin-left:10px; margin-bottom:10px;">
    <?php 
                        //Sql Query 
                        $sql7 = "SELECT * FROM tbl_order WHERE status = 'On Delivery'";
                        //Execute Query
                        $res7 = mysqli_query($conn, $sql7);
                        //Count Rows
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    On Delivery Orders
    </div>
    <div class="col bg-white shadow-lg ms-2 p-3 text-center" style= "margin-left:10px; margin-bottom:10px;">
    <?php 
                        //Sql Query 
                        $sql7 = "SELECT * FROM tbl_order WHERE status = 'Cancelled'";
                        //Execute Query
                        $res7 = mysqli_query($conn, $sql7);
                        //Count Rows
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    Cancelled Orders
    </div>
    <div class="col bg-white text-center shadow-lg ms-2 p-3 text-center" style= "margin-left:10px; margin-bottom:10px;">
    <?php 
                        //Sql Query 
                        $sql8 = "SELECT * FROM tbl_admin";
                        //Execute Query
                        $res8 = mysqli_query($conn, $sql8);
                        //Count Rows
                        $count8 = mysqli_num_rows($res8);
                    ?>

                    <h1><?php echo $count8; ?></h1>
                    <br />
                    System Administrator
    </div>
  </div>    
                
               
                </div>
                <div class="clearfix"></div>

            </div >
            <?php include('bar.php'); ?>
        </div>

        <!-- Main Content Setion Ends -->
        </div>
    </div>
</div>
