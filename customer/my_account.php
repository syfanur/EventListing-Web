<?php

session_start();

if(!isset($_SESSION['customer_email'])) {

    echo "<script>windwow.open('../checkout.php','_self')</script>";

} else {

include("includes/db.php");
include("functions/functions.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Listing | My Account</title>
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
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="../cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="checkout.php">

                          <?php

                          if(!isset($_SESSION['customer_email'])){

                              echo "<a href='checkout.php'> Login </a>";

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

        <a href="../index.php" class="navbar-brand"><!-- navbar-brand home Begin -->
            <img src="images/logo.png" class="hidden-xs" style="width: 85%">
            <img src="images/logo.png" class="visible-xs" style="width: 85%">
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

               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                   <span class="sr-only">Toggle Search</span>

                   <i class="fa fa-search"></i>

               </button>

           </div><!-- navbar-header Finish -->

           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->

               <div class="padding-nav"><!-- padding-nav Begin -->

                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->

                       <li>
                           <a href="../index.php">Home</a>
                       </li>
                       <li>
                           <a href="../shop.php">Events</a>
                       </li>
                       <li>
                           <a href="../cart.php">Cart</a>
                       </li>
                       <li>
                           <a href="../about.php">About</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contact</a>
                       </li>

                   </ul><!-- nav navbar-nav left Finish -->

               </div><!-- padding-nav Finish -->

              
             </div><!-- navbar-collapse collapse Finish -->

       </div><!-- container Finish -->

   </div><!-- navbar navbar-default Finish -->



   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->

           <div class="col-md-3"><!-- col-md-3 Begin -->

   <?php

    include("includes/sidebar.php");

    ?>

           </div><!-- col-md-3 Finish -->

           <div class="col-md-9"><!-- col-md-9 Begin -->

               <div class="box-details"><!-- box Begin -->

                   <?php

                   if (isset($_GET['my_orders'])){

                       include("my_orders.php");

                   } else if (isset($_GET['pay_offline'])){

                       include("pay_offline.php");

                   } else if (isset($_GET['edit_account'])){

                       include("edit_account.php");

                   } else if (isset($_GET['change_pass'])){

                       include("change_pass.php");

                   } else if (isset($_GET['delete_account'])){

                       include("delete_account.php");

                   }

                   ?>

               </div><!-- box Finish -->

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

<?php } ?>
