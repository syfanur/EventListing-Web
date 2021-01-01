<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Dashboard / View Events

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->

                   <i class="fa fa-tags"></i>  View Events

               </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Events ID: </th>
                                <th> Events Title: </th>
                                <th> Events Image: </th>
                                <th> Events Price: </th>
                                <th> Events Sold: </th>
                                <th> Events Delete: </th>
                                <th> Events Edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php

                                $i=0;

                                $get_pro = "SELECT * FROM product";
                                $run_pro = mysqli_query($con,$get_pro);

                                while($row_pro=mysqli_fetch_array($run_pro)){

                                    $pro_id = $row_pro['product_id'];
                                    $pro_name = $row_pro['product_name'];
                                    $pro_img_1 = $row_pro['product_img_1'];
                                    $pro_price = $row_pro['product_price'];

                                    $i++;

                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $pro_name; ?> </td>
                                <td> <img src="product_images/<?php echo $pro_img_1; ?>" width="60" height="60"></td>
                                <td> Rp <?php echo $pro_price; ?> </td>
                                <td> <?php

                                        $get_sold = "SELECT * FROM pending_orders WHERE product_id='$pro_id'";
                                        $run_sold = mysqli_query($con,$get_sold);
                                        $count = mysqli_num_rows($run_sold);

                                        echo $count;

                                     ?>
                                </td>
                                <td>

                                     <a href="index.php?delete_product=<?php echo $pro_id; ?>">

                                        <i class="fa fa-trash-o"></i> Delete

                                     </a>

                                </td>
                                <td>

                                     <a href="index.php?edit_product=<?php echo $pro_id; ?>">

                                        <i class="fa fa-pencil"></i> Edit

                                     </a>

                                </td>
                            </tr><!-- tr finish -->

                            <?php } ?>

                        </tbody><!-- tbody finish -->

                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>
