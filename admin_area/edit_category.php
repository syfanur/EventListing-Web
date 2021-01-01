<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['edit_category'])){

        $edit_category_id = $_GET['edit_category'];

        $edit_category_query = "SELECT * FROM category WHERE category_id='$edit_category_id'";
        $run_edit = mysqli_query($con,$edit_category_query);
        $row_edit = mysqli_fetch_array($run_edit);

        $category_id = $row_edit['category_id'];
        $category_name= $row_edit['category_name'];
        $category_desc = $row_edit['category_desc'];

    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Dashboard / Edit Product Category

            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->

                    <i class="fa fa-pencil fa-fw"></i> Edit Product Category

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Category Name

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value=" <?php echo $category_name; ?> " name="category_name" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                            Category Description

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <textarea type='text' name="category_desc" class="form-control"><?php echo $category_desc; ?></textarea>

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->

                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->



                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <input value="Update" name="update" type="submit" class="form-control btn btn-primary">

                        </div><!-- col-md-6 finish -->

                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php

          if(isset($_POST['update'])){

              $category_name = $_POST['category_name'];
              $category_desc = $_POST['category_desc'];

              $update_category = "UPDATE category SET category_name='$category_name',category_desc='$category_desc' WHERE category_id='$category_id'";
              $run_category = mysqli_query($con,$update_category);

              if($run_category){

                  echo "<script>alert('Your Product Category Has Been Updated')</script>";

                  echo "<script>window.open('index.php?view_categories','_self')</script>";

              }

          }

?>



<?php } ?>
