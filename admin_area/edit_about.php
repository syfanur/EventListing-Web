<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['edit_about'])){

        $edit_id = $_GET['edit_about'];

        $get_desc = "SELECT * FROM description WHERE desc_id='$edit_id'";
        $run_edit = mysqli_query($con,$get_desc);
        $row_edit = mysqli_fetch_array($run_edit);

        $desc_id = $row_edit['desc_id'];
        $desciption_about = $row_edit['desciption_about'];

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit About Us </title>
</head>
<body>

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <ol class="breadcrumb"><!-- breadcrumb Begin -->

            <li class="active"><!-- active Begin -->

                <i class="fa fa-dashboard"></i> Dashboard / Edit About Us

            </li><!-- active Finish -->

        </ol><!-- breadcrumb Finish -->

    </div><!-- col-lg-12 Finish -->

</div><!-- row Finish -->

<div class="row"><!-- row Begin -->

    <div class="col-lg-12"><!-- col-lg-12 Begin -->

        <div class="panel panel-default"><!-- panel panel-default Begin -->

           <div class="panel-heading"><!-- panel-heading Begin -->

               <h3 class="panel-title"><!-- panel-title Begin -->

                   <i class="fa fa-money fa-fw"></i> Edit About Us

               </h3><!-- panel-title Finish -->

           </div> <!-- panel-heading Finish -->

           <div class="panel-body"><!-- panel-body Begin -->

               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->


                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"> Description </label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <textarea name="desciption_about" cols="19" rows="6" class="form-control">

                              <?php echo $desciption_about; ?>

                          </textarea>

                      </div><!-- col-md-6 Finish -->

                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->

                      <label class="col-md-3 control-label"></label>

                      <div class="col-md-6"><!-- col-md-6 Begin -->

                          <input name="update" value="Update About Us" type="submit" class="btn btn-primary form-control">

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

    $desciption_about = $_POST['desciption_about'];

    $update_desc = "UPDATE description SET desciption_about='$desciption_about' WHERE desc_id='$desc_id'";
    $run_desc = mysqli_query($con,$update_desc);

    if($run_desc){

       echo "<script>alert('Your About Us has been updated Successfully')</script>";

       echo "<script>window.open('index.php?view_about','_self')</script>";

    }

}

?>


<?php } ?>
