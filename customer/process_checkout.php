<div class="box"><!-- box Begin -->

    <?php

     $session_email = $_SESSION['customer_email'];
     $select_customer = "SELECT * FROM customer WHERE customer_email='$session_email'";
     $run_customer = mysqli_query($con,$select_customer);
     $row_customer = mysqli_fetch_array($run_customer);

     $customer_id = $row_customer['customer_id'];
     $customer_name = $row_customer['customer_name'];
     $customer_contact = $row_customer['customer_contact'];
     $customer_address = $row_customer['customer_address'];

     ?>

   

        <p class="lead"><!-- lead Begin -->

          <form action="process_checkout.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

          <div class="form-group"><!-- form-group Begin -->

<label>Informasi Tambahan</label>

</div><!-- form-group Finish -->
              <div class="form-group"><!-- form-group Begin -->

                  <label>Nama : <?php echo $customer_name; ?></label>

              </div><!-- form-group Finish -->

              <div class="form-group"><!-- form-group Begin -->

                  <label>No. Telepon : <?php echo $customer_contact; ?></label>

              </div><!-- form-group Finish -->

              <div class="form-group"><!-- form-group Begin -->

                  <label>Alamat Lengkap : <?php echo $customer_address; ?></label>

              </div><!-- form-group Finish -->

              

              <div class="text-center"><!-- text-center Begin -->
                
                    <a href="order.php?c_id=<?php echo $customer_id ?>" class="btn btn-primary">

                        <i class="fa fa-user-md"></i> LANJUTKAN

                    </a>

              </div><!-- text-center Finish -->

          </form><!-- form Finish -->

        </p> <!-- lead Finish -->

</div><!-- box Finish -->
