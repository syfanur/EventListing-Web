<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php

    if(isset($_GET['delete_category'])){

        $delete_category_id = $_GET['delete_category'];

        $delete_category = "DELETE FROM category WHERE category_id='$delete_category_id'";

        $run_delete = mysqli_query($con,$delete_category);

        if($run_delete){

            echo "<script>alert('One of Your Product Has Been Deleted')</script>";

            echo "<script>window.open('index.php?view_categories','_self')</script>";

        }

    }

?>




<?php } ?>
