<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['edit_payment'])){

        $edit_payment_id = $_GET['edit_payment'];
        $process = "Complete";
        $complete = "Complete";

        $edit_payment = "UPDATE pending_orders SET order_status='$process' WHERE order_id='$edit_payment_id'";
        $run_edit = mysqli_query($con,$edit_payment);

        $update_customer_order = "UPDATE customer_orders SET order_status='$complete' WHERE order_id='$edit_payment_id'";
        $run_customer_order = mysqli_query($con,$update_customer_order);

        if($run_edit){

            echo "<script>alert('One of Your Payment Has Been Processed')</script>";

            echo "<script>window.open('index.php?view_orders','_self')</script>";

        }

    }

?>






<?php } ?>
