
<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Order System</title>

     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

       <!-- extra animation -->
       <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />


      <!-- Scroll animation css -->
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="containers">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo-2.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                     <li>
                         <a href="<?php echo SITEURL; ?>how-it-works.php">How It Works</a>
                     </li>
                     <?php $user = ($_SESSION); 
                    if(empty($user)) {
                    ?>
                    <li >
                        <a  href="login.php">Login</a>
                    </li>
                    <li >
                        <a href="register.php">Register</a>
                    </li>
                    <?php } else {?>
                        <li>
                    
                    <a href="myorder.php">My order</a>
                
                </li>
                <li>
                    
                        <a  href="<?php echo SITEURL; ?>givereviews.php?user_name=<?php echo htmlspecialchars($_SESSION["username"]); ?>">review</a>
                    
                    </li>
                    <li >
                        <a href="#" >
                            <?php echo htmlspecialchars($_SESSION["username"]); ?>
                        </a>
     
                    </li>

                    
                    <li>
                    
                        <a  href="logout.php">Logout</a>
                    
                    </li>
            
                    <?php } ?>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->