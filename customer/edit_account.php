<?php

$customer_session = $_SESSION['customer_email'];
$get_customer = "SELECT * FROM customer WHERE customer_email='$customer_session'";
$run_customer = mysqli_query($con,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];
$customer_name = $row_customer['customer_name'];
$customer_email = $row_customer['customer_email'];
$customer_contact = $row_customer['customer_contact'];
$customer_city = $row_customer['customer_city'];
$customer_address = $row_customer['customer_address'];
$customer_pos = $row_customer['customer_pos'];
$customer_image = $row_customer['customer_img'];

?>

<h1 align="center"> Edit Your Account </h1>

<form action="" method="post" enctype="multipart/form-data"><!-- form Begin -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Nama </label>

        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Email </label>

        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> No. Telepon </label>

        <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Kota </label>

        <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Alamat Lengkap </label>

        <textarea type='text' name="c_address" id="" cols="30" rows="7" class="form-control"><?php echo $customer_address; ?></textarea>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Kode Pos </label>

        <input type="text" name="c_pos" class="form-control" value="<?php echo $customer_pos; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Image </label>

        <input type="file" name="c_image" class="form-control form-height-custom">

        <img class="img-responsive" src="customer_images/<?php echo $customer_img; ?>" alt="Costumer Image">

    </div><!-- form-group Finish -->

    <div class="text-center"><!-- text-center Begin -->

        <button name="update" class="btn btn-primary"><!-- btn btn-primary Begin -->

            <i class="fa fa-user-md"></i> Update Now

        </button><!-- btn btn-primary inish -->

    </div><!-- text-center Finish -->

</form><!-- form Finish -->

<?php

if(isset($_POST['update'])) {

    $update_id = $customer_id;

    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_contact = $_POST['c_contact'];
    $c_city = $_POST['c_city'];
    $c_address = $_POST['c_address'];
    $c_pos = $_POST['c_pos'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");

    $update_customer = "UPDATE customer set
    customer_name='$c_name',
    customer_email='$c_email',
    customer_contact='$c_contact',
    customer_city='$c_city',
    customer_address='$c_address',
    customer_pos='$c_pos',
    customer_img='$c_image' WHERE customer_id='$update_id' ";

    $run_customer = mysqli_query($con,$update_customer);

    if($run_customer) {

        echo "<script>alert('Your account has been updated, to complete the process, please Relogin')</script>";

        echo "<script>window.open('logout.php','_self')</script>";

    }

}

?>
