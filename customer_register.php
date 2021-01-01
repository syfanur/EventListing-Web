<?php

    $active='Register';
    include("includes/header.php");

?>

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->

        <div class="row"><!-- row begin -->
          
          <div class="col-xs-12"><!-- col-xs-12 Begin -->
                 
                 <div class="box-details"><!-- box Begin -->

                   <div class="box"><!-- box-header Begin -->

                       <center><!-- center Begin -->

                           <h2> Register a new account </h2>

                       </center><!-- center Finish -->

                       <hr>

                       <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Nama</label>

                               <input type="text" class="form-control" name="c_name" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Email</label>

                               <input type="text" class="form-control" name="c_email" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Password</label>

                               <input type="password" class="form-control" name="c_pass" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>No. Telepon</label>

                               <input type="text" class="form-control" name="c_contact" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Kota</label>

                               <input type="text" class="form-control" name="c_city" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Alamat Lengkap</label>

                               <input type="text" class="form-control" name="c_address" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Kode Pos</label>

                               <input type="text" class="form-control" name="c_pos" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Profile Picture</label>

                               <input type="file" class="form-control form-height-custom" name="c_image" required>

                           </div><!-- form-group Finish -->

                           <div class="text-center"><!-- text-center Begin -->

                               <button type="submit" name="register" class="btn btn-primary">

                               <i class="fa fa-user-md"></i> Register

                               </button>

                           </div><!-- text-center Finish -->

                       </form><!-- form Finish -->

                   </div><!-- box-header Finish -->

               </div><!-- box Finish -->

           </div><!-- col-xs-12 Finish -->

        </div><!-- row finish -->
           

       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>

<?php

if(isset($_POST['register'])){

    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_contact = $_POST['c_contact'];
    $c_city = $_POST['c_city'];
    $c_address = $_POST['c_address'];
    $c_post = $_POST['c_pos'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealIpUser();

    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

    $insert_customer = "INSERT INTO customer (customer_name,customer_email,customer_pass,customer_contact,customer_city,customer_address,customer_pos,customer_img,customer_ip) VALUES ('$c_name','$c_email','$c_pass','$c_contact','$c_city','$c_address','$c_post','$c_image','$c_ip')";

    $run_customer = mysqli_query($con,$insert_customer);
    $sel_cart = "SELECT * FROM cart WHERE ip_add='$c_ip'";
    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if($check_cart>0) {

        /// If register with item in cart ///

        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('You have been Registered Sucessfully')</script>";

        echo "<script>window.open('checkout.php','_self')</script>";

    } else {

        /// If register without item in cart ///

        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('You have been Registered Sucessfully')</script>";

        echo "<script>window.open('index.php','_self')</script>";

    }

}

 ?>
