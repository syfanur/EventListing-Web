<?php

    $active='Checkout';
    include("includes/header.php");

?>

  

   
<div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->

<div class="box"><!-- box Begin -->
<h1 class="text-center">Checkout</h1>
<?php

$ip_add = getRealIpUser();
$select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
$run_cart = mysqli_query($con,$select_cart);

$count = mysqli_num_rows($run_cart);

?>

<div class="table-responsive"><!-- table-responsive Begin -->

<table class="table"><!-- table Begin -->

    <thead><!-- thead Begin -->

        <tr><!-- tr Begin -->

            <th colspan="2">Product</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th colspan="1">Delete</th>
            <th colspan="2">Sub-Total</th>

        </tr><!-- tr Finish -->

    </thead><!-- thead Finish -->

    <tbody><!-- tbody Begin -->

       <?php

        $total = 0;

        while($row_cart = mysqli_fetch_array($run_cart)) {

              $pro_id = $row_cart['p_id'];
              $pro_qty = $row_cart['qty'];

              $get_products = "SELECT * FROM product WHERE product_id='$pro_id'";
              $run_products = mysqli_query($con,$get_products);

              while($row_products = mysqli_fetch_array($run_products)) {

                 $product_name = $row_products['product_name'];
                 $product_img_1 = $row_products['product_img_1'];
                 $only_price = $row_products['product_price'];

                 $sub_total = $row_products['product_price']*$pro_qty;

                 $total += $sub_total;

        ?>

        <tr><!-- tr Begin -->

           
            

            <td>

                <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_name; ?> </a>

            </td>

            <td>
            <h1>             </h1>
            </td>
            <td>

                <?php echo $pro_qty; ?>

            </td>

            <td>

                <?php echo $only_price; ?>

            </td>

            <td>

                <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">

            </td>

            <td>

                Rp <?php echo $sub_total; ?>

            </td>

        </tr><!-- tr Finish -->

      <?php } } ?>

    </tbody><!-- tbody Finish -->

    <tfoot><!-- tfoot Begin -->

        <tr><!-- tr Begin -->

            <th colspan="5">Total</th>
            <th colspan="2">Rp <?php echo $total; ?></th>

        </tr><!-- tr Finish -->

    </tfoot><!-- tfoot Finish -->

</table><!-- table Finish -->

</div><!-- table-responsive Finish -->
<?php
 require_once(dirname(__FILE__) . '/vendor/autoload.php');
 
  Veritrans_Config::$serverKey = "SB-Mid-server-mtvaQXmR-fUZ1YakO-bY7-Ii";

  Veritrans_Config::$isSanitized = true;

  Veritrans_Config::$is3ds = true;

  $transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => 40000, 
  );


  $item2_details = array(
    'id' => $pro_id,
    'price' => $only_price,
    'quantity' => $pro_qty,
    'name' => $product_name
 );

  $item_details = array ($item2_details);

  $billing_address = array(
    'first_name'    => "Syfa",
    'last_name'     => "",
    'address'       => "Baleendah",
    'city'          => "Bandung",
    'postal_code'   => "30745",
    'phone'         => "081234567891",
    'country_code'  => 'IDN'
  );

  $shipping_address = array(
    'first_name'    => "Muhammad",
    'last_name'     => "Tanwir",
    'address'       => "Goethe Insitute, Jakarta Pusat",
    'city'          => "Jakarta",
    'postal_code'   => "83354",
    'phone'         => "081234567892",
    'country_code'  => 'IDN'
  );

  $customer_details = array(
    'first_name'    => "Syfa",
    'last_name'     => "",
    'email'         => "syfanur31@gmail.com",
    'phone'         => "081234567891",
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
  );

  $enable_payments = array('mandiri_clickpay','echannel');

  $transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    // 'customer_details' => $customer_details,
    'item_details' => $item_details,
  );

  $snapToken = Veritrans_Snap::getSnapToken($transaction);

?>

                <button id = "pay-button" class="btn btn-primary btn-md my-0 p" type="submit">Beli Tiket
                  <i class="fas fa-shopping-Buy ml-1"></i>
              </button>

             

          <p>
                <?php echo "Snap Token ".$snapToken ?> 
              </p>

              <p><pre>
                <div id="result-json">JSON Payment : <br></div>
              </pre></p>

        </p>
</div>
        

          <?php

           if(!isset($_SESSION['customer_email'])) {

              include("customer/customer_login.php");

           } else {

              include("customer/process_checkout.php");

           }

           
           ?>


       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" 
    data-client-key="SB-Mid-client-7huulUSZw3A_p3AP"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('<?=$snapToken?>', {
          onSuccess: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onPending: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onError: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>

</body>
</html>
