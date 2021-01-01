<?php

$db = mysqli_connect("localhost","root","","db_eventlisting");

/// begin getRealIpUser function //

function getRealIpUser() {

    switch(true){

        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_IP'])) : return $_SERVER['HTTP_X_FORWARDED_IP'];

        default : return $_SERVER['REMOTE_ADDR'];

    }

}

/// finish getRealIpUser function //

/// begin add_cart function //

function add_cart(){

    global $db;

    if(isset($_GET['add_cart'])) {

        $ip_add = getRealIpUser();
        $p_id = $_GET['add_cart'];

        $product_qty = $_POST['product_qty'];

        $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
        $run_check = mysqli_query($db,$check_product);

        if(mysqli_num_rows($run_check)>0) {

            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        } else {

            $query = "INSERT INTO cart (p_id,ip_add,qty) VALUES ('$p_id','$ip_add','$product_qty')";
            $run_query = mysqli_query($db,$query);

            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        }

    }

}

/// finish add_cart function //

/// begin getPro function //

function getPro(){

    global $db;

    $get_products = "SELECT * FROM product ORDER BY 1 DESC LIMIT 0,4";

    $run_products = mysqli_query($db,$get_products);

    while($row_products=mysqli_fetch_array($run_products)) {

        $pro_id = $row_products['product_id'];
        $pro_name = $row_products['product_name'];
        $pro_loc = $row_products['product_loc'];
        $pro_date = $row_products['product_date'];
        $pro_price = $row_products['product_price'];
        $pro_img_1 = $row_products['product_img_1'];

        echo "

        <div class='col-md-4 col-sm-6 single'>

            <div class='product'>

                <a href='details.php?pro_id=$pro_id'>

                    <img class='img-responsive' src='admin_area/product_images/$pro_img_1'>

                </a>

                <div class='text'>

                    <h3>

                        <a href='details.php?pro_id=$pro_id'>

                            $pro_name

                        </a>

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

}

/// finish getPro function //

/// begin getPCats function //

function getCats() {

    global $db;

    $get_category = "SELECT * FROM category";

    $run_category = mysqli_query($db,$get_category);

    while($row_category=mysqli_fetch_array($run_category)) {

        $category_id = $row_category['category_id'];
        $category_name = $row_category['category_name'];

        echo "

            <li>

                <a href='shop.php?category=$category_id'> $category_name </a>

            </li>

        ";

    }

}

/// finish getPCats function //

/// begin getpcatpro function //

function getcatpro(){

    global $db;

    if(isset($_GET['category'])){

        $category_id = $_GET['category'];

        $get_category ="SELECT * FROM category WHERE category_id ='$category_id' LIMIT 0,6";

        $run_category = mysqli_query($db,$get_category);

        $row_category = mysqli_fetch_array($run_category);

        $category_name = $row_category['category_name'];

        $category_desc = $row_category['category_desc'];

        $get_products ="SELECT * FROM product WHERE category_id ='$category_id'";

        $run_products = mysqli_query($db,$get_products);

        $count = mysqli_num_rows($run_products);

        if($count==0) {

            echo "

                <div class='box'>

                    <h1> No Events Found In This Categories </h1>

                </div>

            ";

        } else {

            echo "

                <div class='box-details'>

                    <h1> $category_name </h1>

                </div>

            ";

        }

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

                      <img class='img-responsive' src='admin_area/product_images/$pro_img_1'>

                  </a>

                  <div class='text'>

                      <h3>

                          <a href='details.php?pro_id=$pro_id'>

                              $pro_name

                          </a>

                      </h3>

                      <p class='price'>

                          Rp $pro_price

                      </p>

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

    }

}

/// finish getpcatpro function //

/// begin items function //

function items(){

    global $db;

    $ip_add = getRealIpUser();

    $get_items = "select * from cart where ip_add='$ip_add'";

    $run_items = mysqli_query($db,$get_items);

    $count_items = mysqli_num_rows($run_items);

    echo $count_items;

}

/// finish items function //

/// begin total_price function //

function total_price(){

    global $db;

    $ip_add = getRealIpUser();
    $total = 0;
    $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_cart = mysqli_query($db,$select_cart);

    while($record=mysqli_fetch_array($run_cart)){

        $pro_id = $record['p_id'];
        $pro_qty = $record['qty'];
        $get_price = "SELECT * FROM product WHERE product_id='$pro_id'";
        $run_price = mysqli_query($db,$get_price);

        while($row_price=mysqli_fetch_array($run_price)) {

            $sub_total = $row_price['product_price']*$pro_qty;

            $total += $sub_total;

        }

    }

    echo "Rp". $total;

}

/// finish getabout function //

function getabout(){

    global $db;

    if(isset($_GET['description'])){

        $desc_id = $_GET['description'];

        $get_desc ="SELECT * FROM description WHERE desc_id ='$desc_id'";
        $run_desc = mysqli_query($db,$get_desc);
        $row_desc = mysqli_fetch_array($run_desc);

        $desciption_about = $row_desc['desciption_about'];

        $get_description ="SELECT * FROM description WHERE desc_id ='$desc_id'";
        $run_description = mysqli_query($db,$get_description);
        $count = mysqli_num_rows($run_description);

        if($count==0) {

            echo "

                <div class='box'>

                    <h1> No Desc Found </h1>

                </div>

            ";

        } else {

            echo "

            <div class='box-details'>

                <div class='box-header'>

                    <center>

                        <h2> About Us </h2>

                    </center>

                    <p> $desciption_about </p>

                </div>

            </div>

            ";

        }

    }

}

/// finish getabout function //

?>
