<?php

    $active='About';
    include("includes/header.php");

?>

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->

               <div class="box-details"><!-- box Begin -->

                   <div class="box-header"><!-- box-header Begin -->


                      <?php

                      $get_desc = "SELECT * FROM description";
                      $run_desc = mysqli_query($con,$get_desc);

                      while($row_desc=mysqli_fetch_array($run_desc)) {

                          $desc_id = $row_desc['desc_id'];
                          $desciption_about = $row_desc['desciption_about'];

                          echo "

                          <center>

                              <h2> About Us </h2>

                          </center>

                          <p>

                             $desciption_about

                          </p>

                          ";
                      }

                       ?>


                   </div><!-- box-header Finish -->

               </div><!-- box Finish -->



       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
