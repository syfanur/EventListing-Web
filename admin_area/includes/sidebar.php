<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top Begin -->
    <div class="navbar-header"><!-- navbar-header Begin -->

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle Begin -->

            <span class="sr-only">Toggle Navigation</span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button><!-- navbar-toggle Finish -->

        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
        <a href="http://localhost:8080/tubes/index.php" class="navbar-brand">Home</a>
        

    </div><!-- navbar-header Finish -->

    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav Begin -->

        <li class="dropdown"><!-- dropdown Begin -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle Begin -->

                <i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>

            </a><!-- dropdown-toggle Finish -->

            <ul class="dropdown-menu"><!-- dropdown-menu Begin -->
                <li><!-- li Begin -->
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>"><!-- a href Begin -->

                        <i class="fa fa-fw fa-user"></i> Profile

                    </a><!-- a href Finish -->
                </li><!-- li Finish -->

                <li><!-- li Begin -->
                    <a href="index.php?view_products"><!-- a href Begin -->

                        <i class="fa fa-fw fa-envelope"></i> Products

                        <span class="badge"><?php echo $count_products; ?></span>

                    </a><!-- a href Finish -->
                </li><!-- li Finish -->

                <li><!-- li Begin -->
                    <a href="index.php?view_customers"><!-- a href Begin -->

                        <i class="fa fa-fw fa-users"></i> Customers

                        <span class="badge"><?php echo $count_customers; ?></span>

                    </a><!-- a href Finish -->
                </li><!-- li Finish -->

                <li><!-- li Begin -->
                    <a href="index.php?view_categories"><!-- a href Begin -->

                        <i class="fa fa-fw fa-gear"></i> Categories

                        <span class="badge"><?php echo $count_categories; ?></span>

                    </a><!-- a href Finish -->
                </li><!-- li Finish -->

                <li class="divider"></li>

                <li><!-- li Begin -->
                    <a href="logout.php"><!-- a href Begin -->

                        <i class="fa fa-fw fa-power-off"></i> Log Out

                    </a><!-- a href Finish -->
                </li><!-- li Finish -->

            </ul><!-- dropdown-menu Finish -->

        </li><!-- dropdown Finish -->

    </ul><!-- nav navbar-right top-nav Finish -->

    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Begin -->
            <li><!-- li Begin -->
                <a href="index.php?dashboard"><!-- a href Begin -->

                    <i class="fa fa-fw fa-dashboard"></i> Dashboard

                </a><!-- a href Finish -->
            </li><!-- li Finish -->

            <li><!-- li Begin -->
                <a href="#" data-toggle="collapse" data-target="#products"><!-- a href Begin -->

                    <i class="fa fa-fw fa-tag"></i> Events
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href Finish -->

                <ul id="products" class="collapse"><!-- collapse Begin -->
                    <li><!-- li Begin -->
                        <a href="index.php?insert_product"> Insert Events </a>
                    </li><!-- li Finish -->
                    <li><!-- li Begin -->
                        <a href="index.php?view_products"> View Events </a>
                    </li><!-- li Finish -->
                </ul>  <!-- collapse Finish -->

            </li><!-- li Finish -->

            <li><!-- li Begin -->
              <a href="#" data-toggle="collapse" data-target="#category"><!-- a href Begin -->

                  <i class="fa fa-fw fa-book"></i> Categories
                  <i class="fa fa-fw fa-caret-down"></i>

              </a><!-- a href Finish -->

              <ul id="category" class="collapse"><!-- collapse Begin -->
                  <li><!-- li Begin -->
                      <a href="index.php?insert_category"> Insert Category </a>
                  </li><!-- li Finish -->
                  <li><!-- li Begin -->
                      <a href="index.php?view_categories"> View Categories </a>
                  </li><!-- li Finish -->
              </ul>  <!-- collapse Finish -->

            </li><!-- li Finish -->

            <li><!-- li Begin -->
              <a href="#" data-toggle="collapse" data-target="#slides"><!-- a href Begin -->

                  <i class="fa fa-fw fa-gear"></i> Slides
                  <i class="fa fa-fw fa-caret-down"></i>

              </a><!-- a href Finish -->

              <ul id="slides" class="collapse"><!-- collapse Begin -->
                  <li><!-- li Begin -->
                      <a href="index.php?insert_slide"> Insert Slide </a>
                  </li><!-- li Finish -->
                  <li><!-- li Begin -->
                      <a href="index.php?view_slides"> View Slides </a>
                  </li><!-- li Finish -->
              </ul>  <!-- collapse Finish -->

            </li><!-- li Finish -->

            <li><!-- li Begin -->
                <a href="index.php?view_customers"><!-- a href Begin -->
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a><!-- a href Finish -->
            </li><!-- li Finish -->

            <li><!-- li Begin -->
                <a href="index.php?view_orders"><!-- a href Begin -->
                    <i class="fa fa-fw fa-book"></i> View Orders
                </a><!-- a href Finish -->
            </li><!-- li Finish -->

            

            <li><!-- li Begin -->
              <a href="#" data-toggle="collapse" data-target="#users"><!-- a href Begin -->

                  <i class="fa fa-fw fa-users"></i> Users
                  <i class="fa fa-fw fa-caret-down"></i>

              </a><!-- a href Finish -->

              <ul id="users" class="collapse"><!-- collapse Begin -->
                  <li><!-- li Begin -->
                      <a href="index.php?insert_user"> Insert User </a>
                  </li><!-- li Finish -->
                  <li><!-- li Begin -->
                      <a href="index.php?view_users"> View Users </a>
                  </li><!-- li Finish -->
                  <li><!-- li Begin -->
                      <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit User Profile </a>
                  </li><!-- li Finish -->
              </ul>  <!-- collapse Finish -->

            </li><!-- li Finish -->

            <li><!-- li Begin -->
                <a href="index.php?view_about"><!-- a href Begin -->
                    <i class="fa fa-fw fa-users"></i> View About Us
                </a><!-- a href Finish -->
            </li><!-- li Finish -->

            <li><!-- li Begin -->
                <a href="logout.php"><!-- a href Begin -->
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a><!-- a href Finish -->
            </li><!-- li Finish -->

        </ul><!-- nav navbar-nav side-nav Finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse Finish -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Finish -->

<?php } ?>
