<?php

    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

      $admin_session = $_SESSION['admin_email'];

      $get_admin = "SELECT * FROM admins WHERE admin_email='$admin_session'";
      $run_admin = mysqli_query($con,$get_admin);
      $row_admin = mysqli_fetch_array($run_admin);

      $admin_id = $row_admin['admin_id'];
      $admin_name = $row_admin['admin_name'];
      $admin_email = $row_admin['admin_email'];
      $admin_image = $row_admin['admin_image'];
      $admin_country = $row_admin['admin_country'];
      $admin_about = $row_admin['admin_about'];
      $admin_contact = $row_admin['admin_contact'];
      $admin_job = $row_admin['admin_job'];

      $get_products = "SELECT * FROM product";
      $run_products = mysqli_query($con,$get_products);
      $count_products = mysqli_num_rows($run_products);

      $get_customers = "SELECT * FROM customer";
      $run_customers = mysqli_query($con,$get_customers);
      $count_customers = mysqli_num_rows($run_customers);

      $get_categories = "SELECT * FROM category";
      $run_categories = mysqli_query($con,$get_categories);
      $count_categories = mysqli_num_rows($run_categories);

      $get_pending_orders = "SELECT * FROM pending_orders";
      $run_pending_orders = mysqli_query($con,$get_pending_orders);
      $count_pending_orders = mysqli_num_rows($run_pending_orders);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Listing | Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- wrapper Begin -->

        <?php include("includes/sidebar.php") ?>

        <div id="page-wrapper"><!-- page-wrapper Begin -->
            <div class="container-fluid"><!-- container-fluid Begin -->

              <?php

                  if(isset($_GET['dashboard'])){

                      include("dashboard.php");

                  } if(isset($_GET['insert_product'])){

                      include("insert_product.php");

                  } if(isset($_GET['view_products'])){

                      include("view_products.php");

                  } if(isset($_GET['delete_product'])){

                      include("delete_product.php");

                  } if(isset($_GET['edit_product'])){

                      include("edit_product.php");

                  } if(isset($_GET['insert_category'])){

                          include("insert_category.php");

                  }   if(isset($_GET['view_categories'])){

                          include("view_categories.php");

                  }   if(isset($_GET['delete_category'])){

                          include("delete_category.php");

                  }   if(isset($_GET['edit_category'])){

                          include("edit_category.php");

                  }   if(isset($_GET['insert_slide'])){

                          include("insert_slide.php");

                  }   if(isset($_GET['view_slides'])){

                          include("view_slides.php");

                  }   if(isset($_GET['delete_slide'])){

                          include("delete_slide.php");

                  }   if(isset($_GET['edit_slide'])){

                          include("edit_slide.php");

                  }if(isset($_GET['view_customers'])){

                          include("view_customers.php");

                  }   if(isset($_GET['delete_customer'])){

                          include("delete_customer.php");

                  }   if(isset($_GET['view_orders'])){

                          include("view_orders.php");

                  }   if(isset($_GET['delete_order'])){

                          include("delete_order.php");

                  

                  }   if(isset($_GET['delete_payment'])){

                          include("delete_payment.php");

                  }   if(isset($_GET['edit_payment'])){

                          include("edit_payment.php");

                  }   if(isset($_GET['view_users'])){

                          include("view_users.php");

                  }   if(isset($_GET['delete_user'])){

                          include("delete_user.php");

                  }   if(isset($_GET['insert_user'])){

                          include("insert_user.php");

                  }   if(isset($_GET['user_profile'])){

                          include("user_profile.php");

                  }   if(isset($_GET['view_about'])){

                          include("view_about.php");

                  }   if(isset($_GET['edit_about'])){

                          include("edit_about.php");

                  }

              ?>

            </div><!-- container-fluid Finish -->
        </div><!-- page-wrapper Finish -->
    </div><!-- wrapper Finish -->

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php } ?>
