<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    } else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Events </title>
</head>
<body>

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <ol class="breadcrumb"><!-- breadcrumb Begin -->

            <li class="active"><!-- active Begin -->

                <i class="fa fa-dashboard"></i> Dashboard / Insert Events

            </li><!-- active Finish -->

        </ol><!-- breadcrumb Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <div class="panel panel-default"><!-- panel panel-default Begin -->

           <div class="panel-heading"><!-- panel-heading Begin -->

               <h3 class="panel-title"><!-- panel-title Begin -->

                   <i class="fa fa-money fa-fw"></i> Insert Events

               </h3><!-- panel-title Finish -->

           </div> <!-- panel-heading Finish -->

           <div class="panel-body"><!-- panel-body Begin -->

               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Name </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_name" type="text" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Location </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_loc" type="text" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Date </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_date" type="date" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Category </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="category" class="form-control"><!-- form-control Begin -->

                              <option> Select a Category </option>

                              <?php

                              $get_cat = "SELECT * FROM category";
                              $run_cat = mysqli_query($con,$get_cat);

                              while ($row_cat=mysqli_fetch_array($run_cat)){

                                  $category_id = $row_cat['category_id'];
                                  $category_name = $row_cat['category_name'];

                                  echo "

                                  <option value='$category_id'> $category_name </option>

                                  ";

                              }

                              ?>

                          </select><!-- form-control Finish -->

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Image </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_img_1" type="file" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Price </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_price" type="text" class="form-control" required>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Desc </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"></label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="submit" value="Insert Events" type="submit" class="btn btn-primary form-control">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

               </form><!-- form-horizontal Finish -->

           </div><!-- panel-body Finish -->

        </div><!-- canel panel-default Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

    <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>

<?php

if(isset($_POST['submit'])){

    $product_name = $_POST['product_name'];
    $product_loc = $_POST['product_loc'];
    $product_date = $_POST['product_date'];
    $category = $_POST['category'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];

    $product_img_1 = $_FILES['product_img_1']['name'];
    $product_img_2 = $_FILES['product_img_2']['name'];

    $temp_name_1 = $_FILES['product_img_1']['tmp_name'];
    $temp_name_2 = $_FILES['product_img_2']['tmp_name'];

    move_uploaded_file($temp_name_1,"product_images/$product_img_1");
    move_uploaded_file($temp_name_2,"product_images/$product_img_2");

    $insert_product = "INSERT INTO product
    (category_id,product_name,product_loc,product_date,product_img_1,product_img_2,product_price,product_desc) VALUES
    ('$category','$product_name','$product_loc','$product_date','$product_img_1','$product_img_2','$product_price','$product_desc')";

    $run_product = mysqli_query($con,$insert_product);

    if($run_product) {

      echo "<script>alert('Product has been inserted sucessfully')</script>";
      echo "<script>window.open(''index.php?view_products','_self'')</script>";

    }
}

?>

<?php } ?>
