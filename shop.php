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

              <?php

                  if(!isset($_GET['category'])){

                    echo "

                      <div class='box-details'><!-- box Begin -->
                          <h1>Events</h1>
                      </div><!-- box Finish -->

                    ";

                  }

               ?>

               <div class="row"><!-- row Begin -->

                 <?php

                     if(!isset($_GET['category'])){

                        $per_page=6;

                        if(isset($_GET['page'])){

                            $page = $_GET['page'];

                            } else {

                                $page=1;

                            }

                            $start_from = ($page-1) * $per_page;

                            $get_products = "SELECT * FROM product ORDER BY 1 DESC LIMIT $start_from,$per_page";

                            $run_products = mysqli_query($con,$get_products);

                            while($row_products=mysqli_fetch_array($run_products)) {

                            $pro_id = $row_products['product_id'];
                            $pro_name = $row_products['product_name'];
                            $pro_loc = $row_products['product_loc'];
                            $pro_date = $row_products['product_date'];
                            $pro_price = $row_products['product_price'];
                            $pro_img_1 = $row_products['product_img_1'];

                              echo "

                                  <div class='col-md-4 col-sm-6 center-responsive'>

                                      <div class='product'>

                                          <a href='details.php?pro_id=$pro_id'>

                                              <img class='img-responsive' src='admin_area/product_images/$pro_img_1'></img>

                                          </a>

                                          <div class='text'>

                                              <h3>

                                                  <a href='details.php?pro_id=$pro_id'> $pro_name </a>

                                              </h3>

                                              <p class='price'>

                                                  Rp $pro_price

                                              </p>

                                              <br><br>

                                              <p class='button'>
                          
                                                  <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                          
                                                      View Details
                          
                                                  </a>
                          
                                                  <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                          
                                                      <i class='fa fa-shopping-cart'></i> Add to Cart
                          
                                                  </a>
                          
                                              </p>

                                          </div>

                                      </div>

                                  </div>

                              ";

                        }

                  ?>



               </div><!-- row Finish -->

               <center>
                   <ul class="pagination" class="box"><!-- pagination Begin -->

                     <?php

                     $query = "SELECT * FROM product";

                     $result = mysqli_query($con,$query);

                     $total_records = mysqli_num_rows($result);

                     $total_pages = ceil($total_records / $per_page);

                          echo "

                              <li>

                                  <a href='shop.php?page=1'> ".'First Page'." </a>

                              </i>

                          ";

                          for($i=1; $i<=$total_pages; $i++){

                            echo "

                                <li>

                                    <a href='shop.php?page=".$i."'> ".$i." </a>

                                </i>

                            ";

                          };

                               echo "

                                   <li>

                                       <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>

                                   </i>

                               ";

                      }

                      ?>

                   </ul><!-- pagination Finish -->
               </center>

                  <?php getcatpro(); ?>

               </div><!-- row Finish -->

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
