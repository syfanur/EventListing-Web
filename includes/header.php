<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<?php

if(isset($_GET['pro_id'])) {

    $product_id = $_GET['pro_id'];
    $get_product = "SELECT * FROM product WHERE product_id='$product_id'";
    $run_product = mysqli_query($con,$get_product);
    $row_product = mysqli_fetch_array($run_product);

    $category_id = $row_product['category_id'];
    $pro_name = $row_product['product_name'];
    $pro_loc = $row_product['product_loc'];
    $pro_date = $row_product['product_date'];
    $pro_price = $row_product['product_price'];
    $pro_desc = $row_product['product_desc'];
    $pro_persen = $row_product['product_persen'];
    $pro_img_1 = $row_product['product_img_1'];
    $pro_img_2 = $row_product['product_img_2'];

    $get_category = "SELECT * FROM category WHERE category_id='$category_id'";
    $run_category = mysqli_query($con,$get_category);
    $row_category = mysqli_fetch_array($run_category);

    $category_name = $row_category['category_name'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Listing</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style3.css">
</head>
<body>

   <div id="top"><!-- Top Begin -->

       <div class="container"><!-- container Begin -->

           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->

             <a href="#" class="btn btn-success btn-sm">

                 <?php

                 if(!isset($_SESSION['customer_email'])){

                     echo "Welcome : Guest";

                 }else{

                     echo "Welcome : " . $_SESSION['customer_email'] . "";

                 }

                 ?>

             </a>

           </div><!-- col-md-6 offer Finish -->

           <div class="col-md-6"><!-- col-md-6 Begin -->


               <ul class="menu"><!-- cmenu Begin -->

                   <li>
                       <a href="customer_register.php">Register</a>
                   </li>
                   <li>
                       <?php

                        if(!isset($_SESSION['customer_email'])) {

                            echo"<a href='customer_login.php'>My Account</a>";

                        } else {

                            echo"<a href='customer/my_account.php?my_orders'>My Account</a>";

                        }

                        ?>
                   </li>
                   <li>
                       <a href="cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="checkout.php">

                          <?php

                          if(!isset($_SESSION['customer_email'])){

                              echo "<a href='customer_login.php'> Login </a>";

                          }else{

                              echo "<a href='logout.php'> Log Out </a>";

                          }

                           ?>

                       </a>
                   </li>
                   <li>
                       <a href="admin_area/login.php">Admin Page</a>
                   </li>

               </ul><!-- menu Finish -->

           </div><!-- col-md-6 Finish -->

       </div><!-- container Finish -->

   </div><!-- Top Finish -->

   <div class="banner-logo"><!-- banner logo Begin -->

     <div class="container"><!-- container Begin -->

      <div class=" row row-centered"><!-- row Begin -->

        <div class="col-md-4 col-centered"><!-- col-md-4 Begin -->

          <a href="index.php" class="navbar-brand"><!-- navbar-brand home Begin -->
            <img src="images/logoo.png" class="hidden-xs" style="width: 85%">
            <img src="images/logoo.png" class="visible-xs" style="width: 85%">
        </a><!-- navbar-brand home Finish -->

        </div><!-- col-md-4 Finish -->

      </div><!-- row Finish -->

      </div><!-- container Finish -->

    </div><!-- banner logo Finish -->

   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->

       <div class="container"><!-- container Begin -->

           <div class="navbar-header"><!-- navbar-header Begin -->


               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                   <span class="sr-only">Toggle Navigation</span>

                   <i class="fa fa-align-justify"></i>

               </button>


           </div><!-- navbar-header Finish -->

           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->

               <div class="padding-nav"><!-- padding-nav Begin -->

                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->

                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Events</a>
                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="cart.php">Cart</a>
                       </li>
                       <li class="<?php if($active=='About') echo"active"; ?>">
                           <a href="about.php">About</a>
                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="contact.php">Contact</a>
                       </li>

                   </ul><!-- nav navbar-nav left Finish -->

               </div><!-- padding-nav Finish -->

               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->

                   <i class="fa fa-shopping-cart"></i>

                   <span><?php items(); ?> Items In Your Cart | Total Price : <?php total_price(); ?></span>

               </a><!-- btn navbar-btn btn-primary Finish -->

           </div><!-- navbar-collapse collapse Finish -->

       </div><!-- container Finish -->

   </div><!-- navbar navbar-default Finish -->
