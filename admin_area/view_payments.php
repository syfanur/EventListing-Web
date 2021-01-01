<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->

                <i class="fa fa-dashboard"></i> Dashboard / View Payments

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->

                   <i class="fa fa-tags"></i>  View Payments

               </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No </th>
                                <th> Invoice No </th>
                                <th> Payment Image</th>
                                <th> Process Order </th>
                                <th> Edit Order </th>
                                <th> Delete Payment </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->

                            <?php

                                $i=0;

                                $get_payments = "SELECT * FROM payments";
                                $run_payments = mysqli_query($con,$get_payments);

                                while($row_payments=mysqli_fetch_array($run_payments)){

                                    $payment_id = $row_payments['payment_id'];
                                    $invoice_no = $row_payments['invoice_no'];
                                    $payment_img = $row_payments['payment_img'];
                                    $payment_process = $row_payments['payment_process'];

                                    $i++;

                            ?>

                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <img src="../customer/payment_images/<?php echo $payment_img; ?>" width="60" height="60"></td>
                                <td> <?php echo $payment_process; ?> </td>
                                <td>

                                     <a href="index.php?edit_payment=<?php echo $payment_id; ?>">

                                        <i class="fa fa-pencil"></i> Process

                                     </a>

                                </td>
                                <td>

                                     <a href="index.php?delete_payment=<?php echo $payment_id; ?>">

                                        <i class="fa fa-trash-o"></i> Delete

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
