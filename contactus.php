<?php include('partials-font/menu.php'); ?>
 

<div class="works ">

  <img src="images/banner-4.jpg" alt="">
  <div  class="works-title">  
      <h1 class="text-white  animate__animated animate__flipInX">Contact Us</h1>
   </div>
 
</div>


  
  <section class="container  p-3  d-flex align-items-center justify-content-center">
     

       
     
    

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-lg-offset-2 p-4">

                  


                    <form id="contact-form" action="contactform.php" method="POST" role="form" >

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Your Name *</label>
                                        <input type="text" name="name" id="name" placeholder="Enter your name"  class="form-control" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input type="text" name="email" id="email" placeholder="mail@example.com" class="form-control"  required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Phone</label>
                                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Please enter your phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea  name="text" placeholder="Write something to us" class="form-control" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" name="submit" style="padding: 10px 20px; margin-top:10px;" value="Send" class="btn btn-kit btn-send">
                                </div>
                            </div>
                            <div class="row">
                              
                            </div>
                        </div>

                    </form>
            

                </div><!-- /.8 -->

            </div> <!-- /.row-->

        </div> <!-- /.container-->

      

     
     
  </section>
 



  











  <section class="text-center mb-4 " >
    <div class="container "  style=" width:600px; height: 50px; margin-bottom:200px; margin-top:50px;">
     <h1 >Get The Latest Meals</h1>
     <p >And receive $20 coupon for first order</p>
     <div class="input-group " >
  <input type="text" class="form-control" placeholder=" username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class=" btn btn-kit p-4" id="basic-addon2">Subscribe Us</span>
</div> <br> <br>
     

     <div class="mb-3 form-check text-left">
    <input type="checkbox" class="form-check-input" > 
    <label class="form-check-label" for="exampleCheck1">Subscribe us for get the latest update.</label>
  </div>
  </div>  <br> <br>
    </section>






<?php include('partials-font/footer.php'); ?>

    