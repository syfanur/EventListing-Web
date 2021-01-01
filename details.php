<?php

    $active='Shop';
    include("includes/header.php");

?>

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->

            <div class="col-md-3"><!-- col-md-3 Begin -->

   <?php

    include("includes/sidebar.php");

    ?>

           </div><!-- col-md-3 Finish -->

           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                               </ol><!-- carousel-indicators Finish -->

                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img_1; ?>" alt="Product 3-a"></center>
                                   </div>
                               </div>

                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->

                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box-details"><!-- box Begin -->
                           <h2 class="text-center"><?php echo $pro_name; ?></h2>
                           <h4 class="text-center"><?php echo $pro_loc; ?></h1>
                           <p class="text-center"><?php echo $pro_date; ?></p>

                           <?php add_cart(); ?>

                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Quantity</label>

                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           </select><!-- select Finish -->

                                    </div><!-- col-md-7 Finish -->

                               </div><!-- form-group Finish -->

                               <div class="form-group"><!-- form-group Begin -->

                                   <div class="col-md-7"><!-- col-md-7 Begin -->


                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->

                               <div class="form-group"><!-- form-group Begin -->
                                  

                                   <div class="col-md-7"><!-- col-md-7 Begin -->

                                          

                                    </div><!-- col-md-7 Finish -->

                               </div><!-- form-group Finish -->

                               <h3 class="price">Rp <?php echo $pro_price; ?></h3>

                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>

                           </form><!-- form-horizontal Finish -->

                       </div><!-- box Finish -->

                       <div class="row" id="thumbs"><!-- row Begin -->

                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                           </div><!-- col-xs-4 Finish -->

                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                           </div><!-- col-xs-4 Finish -->

                       </div><!-- row Finish -->

                   </div><!-- col-sm-6 Finish -->


                </div><!-- row Finish -->
                       
                       <h2>Event Details</h2>
                       <br>
                   <p>
                       <?php echo $pro_desc; ?>
                   </p>
                       <hr>

               </div><!-- box Finish -->

               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box-details"><!-- box same-height headline Begin -->
                           <h3 class="text-center">You Maybe Also Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->

                   <?php

                        $get_products = "SELECT * FROM product ORDER BY rand() LIMIT 0,2";
                        $run_products = mysqli_query($con,$get_products);

                        while($row_products=mysqli_fetch_array($run_products)){

                            $pro_id = $row_products['product_id'];
                            $pro_name = $row_products['product_name'];
                            $pro_loc = $row_products['product_loc'];
                            $pro_date = $row_products['product_date'];
                            $pro_img_1 = $row_products['product_img_1'];
                            $pro_price = $row_products['product_price'];

                            echo "

                              <div class='col-md-4 col-sm-6 center-responsive'>

                                  <div class='product same-height'>

                                      <a href='details.php?pro_id=$pro_id'>

                                          <img class='img-responsive' src='admin_area/product_images/$pro_img_1'

                                      </a>

                                      <div class='text'>

                                          <h3> <a href='details.php?pro_id=$pro_id'> $pro_name </a> </h3>

                                          <p class='price'> Rp $pro_price </p>

                                      </div>

                                  </div>

                              </div>

                            ";

                        }

                    ?>

               </div><!-- #row same-heigh-row Finish -->

           </div><!-- col-md-9 Finish -->

       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
