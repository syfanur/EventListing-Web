<?php

    $active='Home';
    include("includes/header.php");

?>

   <div class="container" id="slider"><!-- container Begin -->

       <div class="col-md-12"><!-- col-md-12 Begin -->

           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->

               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->

                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>

               </ol><!-- carousel-indicators Finish -->

               <div class="carousel-inner"><!-- carousel-inner Begin -->

                  <?php

                  $get_slides = "SELECT * FROM slides LIMIT 0,1";

                  $run_slide = mysqli_query($con,$get_slides);

                  while($row_slides=mysqli_fetch_array($run_slide)) {

                      $slide_name = $row_slides['slide_name'];
                      $slide_img = $row_slides['slide_img'];

                      echo "

                      <div class='item active'>

                      <img src='admin_area/slides_images/$slide_img'>

                      </div>

                      ";
                  }

                  $get_slides = "SELECT * FROM slides LIMIT 1,3";

                  $run_slide = mysqli_query($con,$get_slides);

                  while($row_slides=mysqli_fetch_array($run_slide)) {

                      $slide_name = $row_slides['slide_name'];
                      $slide_img = $row_slides['slide_img'];

                      echo "

                      <div class='item'>

                      <img src='admin_area/slides_images/$slide_img'>

                      </div>

                      ";
                  }

                  ?>

               </div><!-- carousel-inner Finish -->

               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->

                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>

               </a><!-- left carousel-control Finish -->

               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->

                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>

               </a><!-- left carousel-control Finish -->

           </div><!-- carousel slide Finish -->

       </div><!-- col-md-12 Finish -->

   </div><!-- container Finish -->

   <div id="hot"><!-- #hot Begin -->

       <div class="box-new"><!-- box Begin -->

           <div class="container"><!-- container Begin -->

               <div class="col-md-12"><!-- col-md-12 Begin -->

                   <h2>
                       Available Events
                   </h2>

               </div><!-- col-md-12 Finish -->

           </div><!-- container Finish -->

       </div><!-- box Finish -->

   </div><!-- #hot Finish -->

   <div id="content" class="container"><!-- container Begin -->

       <div class="row"><!-- row Begin -->

        <?php

           getPro();

        ?>

       </div><!-- row Finish -->

   </div><!-- container Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
