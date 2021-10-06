
<?php include('../config/constants.php') ;?>
<html>
    <head>
       <title>Login - into Food order website </title>
       <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
           <div class="log">
          <div class="login-box" > 
              <h2 class="text-center" id="tgl-login">User Login</h2>
              <br><br>
              
              <?php
               if(isset($_SESSION['login']))
               {
                   echo $_SESSION['login'];
                   unset($_SESSION['login']);
               }
               if(isset($_SESSION['no-login-message']))
               {
                   echo $_SESSION['no-login-message'];
                   unset($_SESSION['no-login-message']);
               }
              
              ?>
                



              <br><br>
              
              <!-- Login form starts here -->
                <form class="input-group"  action="" method="POST"> 
                     Username
                    <input type="text" class="input-field"  name="username" placeholder="Enter your usename">
                    Password
                    <input type="password"  class="input-field" name="password" placeholder="Enter your password">

                    <input type="submit" class="submit-btn" name="submit"  value=" User Log in"><br><br>



                        

                </form>
              



               <!-- Login form ends here -->

              <p  class="text-center"> </p>
          </div>
            </div>
    </body>



</html>

<?php
      //Check whether the submit button is clicked or not
      if(isset($_POST['submit']))
      {
        //Press for login
        //1.Get the data from login form
        $username = $_POST['username'];
        $password =md5($_POST['password']);//Password Encryption with MD5

        //2.SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

        //3. Execute the query 
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user available
            $_SESSION['login'] = "<div class = 'success'>Login successfully.</div>";
            $_SESSION['user'] = $username; //To check whether the user is logged in or not and logout wil unset it

            //Redirect to home/dashboard

            header("location:".SITEURL.'admin/');
        }
        else {
            //user not available and login fail
            $_SESSION['login'] = "<div class ='error'>Username and password did not mached.</div>";
          
            //Redirect to home/dashboard

            header("location:".SITEURL.'admin/login.php');
        }

      }
   


?>
