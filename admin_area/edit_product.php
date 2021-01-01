<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['edit_product'])){

        $edit_id = $_GET['edit_product'];

        $get_p = "SELECT * FROM product WHERE product_id='$edit_id'";
        $run_edit = mysqli_query($con,$get_p);
        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['product_id'];
        $p_name = $row_edit['product_name'];
        $p_loc = $row_edit['product_loc'];
        $p_date = $row_edit['product_date'];
        $category = $row_edit['category_id'];
        $p_image_1 = $row_edit['product_img_1'];
        $p_image_2 = $row_edit['product_img_2'];
        $p_price = $row_edit['product_price'];
        $p_desc = $row_edit['product_desc'];

    }

        $get_category = "SELECT * FROM category WHERE category_id='$category'";
        $run_category = mysqli_query($con,$get_category);
        $row_category = mysqli_fetch_array($run_category);
        $category_name = $row_category['category_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit Products </title>
</head>
<body>

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <ol class="breadcrumb"><!-- breadcrumb Begin -->

            <li class="active"><!-- active Begin -->

                <i class="fa fa-dashboard"></i> Dashboard / Edit Events

            </li><!-- active Finish -->

        </ol><!-- breadcrumb Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <div class="panel panel-default"><!-- panel panel-default Begin -->

           <div class="panel-heading"><!-- panel-heading Begin -->

               <h3 class="panel-title"><!-- panel-title Begin -->

                   <i class="fa fa-money fa-fw"></i> Edit Events

               </h3><!-- panel-title Finish -->

           </div> <!-- panel-heading Finish -->

           <div class="panel-body"><!-- panel-body Begin -->

               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Name </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_name" type="text" class="form-control" required value="<?php echo $p_name; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Location </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_loc" type="text" class="form-control" required value="<?php echo $p_loc; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Date </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_date" type="date" class="form-control" required value="<?php echo $p_date; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Category </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <select name="product_cat" class="form-control"><!-- form-control Begin -->

                              <option value="<?php echo $category; ?>"> <?php echo $category_name; ?> </option>

                              <?php

                              $get_category = "SELECT * FROM category";
                              $run_category = mysqli_query($con,$get_category);

                              while ($row_category=mysqli_fetch_array($run_category)){

                                  $category_id = $row_category['category_id'];
                                  $category_name = $row_category['category_name'];

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

                          <br>

                          <img width="70" height="70" src="product_images/<?php echo $p_image_1; ?>" alt="<?php echo $p_image_1; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Price </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Events Desc </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <textarea name="product_desc" cols="19" rows="6" class="form-control">

                              <?php echo $p_desc; ?>

                          </textarea>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"></label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="update" value="Update Events" type="submit" class="btn btn-primary form-control">

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

if(isset($_POST['update'])){

    $product_name = $_POST['product_name'];
    $product_loc = $_POST['product_loc'];
    $product_date = $_POST['product_date'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];

    $product_img_1 = $_FILES['product_img_1']['name'];
    $product_img_2 = $_FILES['product_img_2']['name'];

    $temp_name_1 = $_FILES['product_img_1']['tmp_name'];
    $temp_name_2 = $_FILES['product_img_2']['tmp_name'];

    move_uploaded_file($temp_name1,"product_images/$product_img_1");
    move_uploaded_file($temp_name2,"product_images/$product_img_2");

    $update_product = "UPDATE product SET category_id='$product_cat',product_name='$product_name',product_loc='$product_loc',product_date='$product_date',product_img_1='$product_img_1',product_img_2='$product_img_2',product_desc='$product_desc',product_price='$product_price' WHERE product_id='$p_id'";
    $run_product = mysqli_query($con,$update_product);

    if($run_product){

       echo "<script>alert('Your product has been updated Successfully')</script>";

       echo "<script>window.open('index.php?view_products','_self')</script>";

    }

}

?>


<?php } ?>
