<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark "  >
<?php include('partials/menu.php'); ?>
</div>
        </div>
        <div class="col py-3" style="float: left;
        width: 71%
">

<div class="main-content">
    <div class="wrapper">
        <h1>Confirmation Order</h1>
        <br><br>


        <?php 
        
            //CHeck whether id is set or not
            if(isset($_GET['id']))
            {
                //GEt the Order Details
                $id=$_GET['id'];

                //Get all other details based on this id
                //SQL Query to get the order details
                $sql = "SELECT * FROM tbl_order WHERE id=$id";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);
                
              
                if($count==1)
                {
                    //Detail Availble
                    
                    $row=mysqli_fetch_assoc($res);

                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address= $row['customer_address'];
                }
                else
                {
                    //DEtail not Available/
                    //Redirect to Manage Order
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //REdirect to Manage ORder PAge
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        
        ?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Send Email</h5>
                    <form action="" method="post" class="form-signin">
                        <div class="form-label-group">
                            <label for="inputEmail">From <span style="color: #FF0000">*</span></label>
                            <input type="text" name="fromEmail" id="fromEmail" class="form-control"  value="homoliciousyoufood@gmail.com" readonly required autofocus>
                        </div> <br/>
                        <div class="form-label-group">
                            <label for="inputEmail">To <span style="color: #FF0000">*</span></label>
                            <input type="text" name="toEmail" id="toEmail" class="form-control" value="<?php echo $customer_email; ?>" placeholder="Email address" required autofocus>
                        </div> <br/>
                        <label for="inputPassword">Subject <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <input type="text" id="subject" name="subject" class="form-control" value="<?php echo $food; ?> Ordered" placeholder="Subject" required>
                        </div><br/>
                        <label for="inputPassword">Message <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <input  id="message" name="message" Value="You Have Orderded <?php echo $qty ; ?> of <?php echo $food; ?> total Price : <?php echo $price; ?>  " class="form-control" placeholder="Message" required ></input>
                        </div> <br/>
                        <button type="submit" name="sendMailBtn" class="btn btn-success btn-block text-uppercase" >Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      

        <?php 
            //CHeck whether Update Button is Clicked or Not
            if (isset($_POST['sendMailBtn'])) {
                $fromEmail = $_POST['fromEmail'];
                $toEmail = $_POST['toEmail'];
                $subjectName = $_POST['subject'];
                $message = $_POST['message'];
            
                $to = $toEmail;
                $subject = $subjectName;
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
                $message = '<!doctype html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport"
                                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                            <meta http-equiv="X-UA-Compatible" content="ie=edge">
                            <title>Document</title>
                        </head>
                        <body>
                        <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$message.'</span>
                            <div class="container">
                             '.$message.'<br/>
                                Regards<br/>
                              '.$fromEmail.'
                            </div>
                        </body>
                        </html>';
                $result = @mail($to, $subject, $message, $headers);
            
                echo '<script>alert("Email sent successfully !")</script>';
                echo '<script>window.location.href="index.php";</script>';
            }
                
        ?>
                                           

    </div>
</div>

</div>
    </div>
</div>
