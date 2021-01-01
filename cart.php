<?php

    $active='Cart';
    include("includes/header.php");

?>

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->

           <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->

               <div class="box-details"><!-- box Begin -->

                   <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

                       <h1>Checkout</h1>

                       <?php

                        $ip_add = getRealIpUser();

                        $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
                        $run_cart = mysqli_query($con,$select_cart);

                        $count = mysqli_num_rows($run_cart);

                        ?>

                       <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>

                       <div class="table-responsive"><!-- table-responsive Begin -->

                           <table class="table"><!-- table Begin -->

                               <thead><!-- thead Begin -->

                                   <tr><!-- tr Begin -->

                                       <th colspan="2">Product</th>
                                       <th>Quantity</th>
                                       <th>Unit Price</th>
                                       <th colspan="1">Delete</th>
                                       <th colspan="2">Sub-Total</th>

                                   </tr><!-- tr Finish -->

                               </thead><!-- thead Finish -->

                               <tbody><!-- tbody Begin -->

                                  <?php

                                   $total = 0;

                                   while($row_cart = mysqli_fetch_array($run_cart)) {

                                         $pro_id = $row_cart['p_id'];
                                         $pro_qty = $row_cart['qty'];

                                         $get_products = "SELECT * FROM product WHERE product_id='$pro_id'";
                                         $run_products = mysqli_query($con,$get_products);

                                         while($row_products = mysqli_fetch_array($run_products)) {

                                            $product_name = $row_products['product_name'];
                                            $product_img_1 = $row_products['product_img_1'];
                                            $only_price = $row_products['product_price'];

                                            $sub_total = $row_products['product_price']*$pro_qty;

                                            $total += $sub_total;

                                   ?>

                                   <tr><!-- tr Begin -->

                                       <td>

                                           <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img_1; ?>" alt="Product 3a">

                                       </td>

                                       <td>

                                           <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_name; ?> </a>

                                       </td>

                                       <td>

                                           <?php echo $pro_qty; ?>

                                       </td>

                                       <td>

                                           <?php echo $only_price; ?>

                                       </td>

                                       <td>

                                           <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">

                                       </td>

                                       <td>

                                           Rp <?php echo $sub_total; ?>

                                       </td>

                                   </tr><!-- tr Finish -->

                                 <?php } } ?>

                               </tbody><!-- tbody Finish -->

                               <tfoot><!-- tfoot Begin -->

                                   <tr><!-- tr Begin -->

                                       <th colspan="5">Total</th>
                                       <th colspan="2">Rp <?php echo $total; ?></th>

                                   </tr><!-- tr Finish -->

                               </tfoot><!-- tfoot Finish -->

                           </table><!-- table Finish -->

                       </div><!-- table-responsive Finish -->

                       <div class="box-footer"><!-- box-footer Begin -->

                           <div class="pull-left"><!-- pull-left Begin -->

                               <a href="index.php" class="btn btn-default"><!-- btn btn-default Begin -->

                                   <i class="fa fa-chevron-left"></i> Continue Shopping

                               </a><!-- btn btn-default Finish -->

                           </div><!-- pull-left Finish -->

                           <div class="pull-right"><!-- pull-right Begin -->

                               <button type="submit" name="update" value="Update Cart" class="btn btn-default"><!-- btn btn-default Begin -->

                                   <i class="fa fa-refresh"></i> Update Cart

                               </button><!-- btn btn-default Finish -->

                               <a href="checkout.php" class="btn btn-primary">

                                   Proceed Checkout <i class="fa fa-chevron-right"></i>

                               </a>

                           </div><!-- pull-right Finish -->

                       </div><!-- box-footer Finish -->

                   </form><!-- form Finish -->

                   <hr>
                   <hr>

                   <h5>Keterangan :</h5>
                   <h5>1. Waktu Pengiriman tiket 15 Menit ~ 1 Jam setelah pembayaran</h5>
                   <h5>2. Tiket dikirim melalui email</h5>
                   <h5>3. Jika ada kesalahan atau kendala, silahkan hubungi admin</h5>

               </div><!-- box Finish -->

               <?php

               function update_cart(){

                   global $con;

                   if(isset($_POST['update'])){

                       foreach($_POST['remove'] as $remove_id){

                           $delete_product = "DELETE FROM cart WHERE p_id='$remove_id'";

                           $run_delete = mysqli_query($con,$delete_product);

                           if($run_delete){

                               echo "<script>window.open('cart.php','_self')</script>";

                           }

                       }

                   }

               }

              echo @$up_cart = update_cart();

                ?>

                <hr>

               <div id="row same-height-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box-details"><!-- box same-height headline Begin -->
                           <h3 class="text-center">You Maybe Also Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->

                   <?php

                    $get_products = "SELECT * FROM product ORDER BY rand() LIMIT 0,3";
                    $run_products = mysqli_query($con,$get_products);

                    while($row_products=mysqli_fetch_array($run_products)) {

                        $pro_id = $row_products['product_id'];
                        $pro_name = $row_products['product_name'];
                        $pro_price = $row_products['product_price'];
                        $pro_img_1 = $row_products['product_img_1'];

                        echo "

                   <div class='col-md-3 col-sm-6 center-responsive'><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class='product same-height'><!-- product same-height Begin -->
                           <a href='details.php?pro_id=$pro_id'>
                               <img class='img-responsive' src='admin_area/product_images/$pro_img_1' alt='Product 6'>
                            </a>

                            <div class='text'><!-- text Begin -->
                                <h3><a href='details.php?pro_id=$pro_id'> $pro_name </a></h3>

                                <p class='price'>Rp $pro_price</p>

                            </div><!-- text Finish -->

                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->

                        ";

                   }

                   ?>

               </div><!-- #row same-heigh-row Finish -->

           </div><!-- col-md-9 Finish -->

           <div class="col-md-3"><!-- col-md-3 Begin -->

               <div id="order-summary" class="box"><!-- box Begin -->

                   <div class="box-header"><!-- box-header Begin -->

                       <h3>Order Summary</h3>

                   </div><!-- box-header Finish -->

                   <div class="table-responsive"><!-- table-responsive Begin -->

                       <table class="table"><!-- table Begin -->

                           <tbody><!-- tbody Begin -->

                               <tr><!-- tr Begin -->

                                   <td> Order All Sub-Total </td>
                                   <th> Rp <?php echo $sub_total; ?> </th>

                               </tr><!-- tr Finish -->

                               <tr class="total"><!-- tr Begin -->

                                   <td> Total </td>
                                   <th> Rp <?php echo $total; ?> </th>

                               </tr><!-- tr Finish -->

                           </tbody><!-- tbody Finish -->

                       </table><!-- table Finish -->

                   </div><!-- table-responsive Finish -->

               </div><!-- box Finish -->

           </div><!-- col-md-3 Finish -->

       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
