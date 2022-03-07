<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%; height:655px; overflow-x: hidden;
">

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Contact</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Name</th>
                        <th width="10%">Email</th>
                        <th width="10%">Phone</th>
                       
                        <th  width="25%">Massage</th>
                        <th  width="10%">Action</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM inbox ORDER BY id DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $message = $row['message'];
                                $text= $row['text'];
                               
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $name ; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $message ; ?></td>
                                        <td><?php echo $text ?></td>
                                        <td><a href="<?php echo SITEURL; ?>admin/delete_message.php?id=<?php echo $id; ?>" class=" btn btn-danger">Delete Text</a></td>
                                        
                         
                                      
                                      
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>No Massage Yet</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>
</div>
    </div>
</div>
