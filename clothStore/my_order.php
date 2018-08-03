<?php
session_start();
error_reporting(0);
include_once('include/header.php');
include_once('include/connection.php');
$select = 'SELECT  id,customer_id FROM tbl_orders';
$record = $con->query($select);
while ($getrec = $record->fetch_object()) 
{
  if($getrec->customer_id == $_SESSION['id'])
  {    
    $product_id = "SELECT  product_id FROM tbl_order_details where order_id='$getrec->id'";
    $product_details = $con->query($product_id);
    while ($product = $product_details->fetch_object()) 
    {
      $product_id = "SELECT  * FROM tbl_product where id='$product->product_id'";
      $product_details = $con->query($product_id);
      while ($final = $product_details->fetch_object()) 
      {  
        $myorder[] = $final;
      }
    }
  }
}
?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>My Orders</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>                   
          <li class="active">My Order</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
          <div class="cart-view-table">
          <form method="post">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Name</th>
                  <th>Price</th>
                </tr>
                <?php
                if(count($myorder)>=1)
                { 
                  $i =1;
                  foreach ($myorder as $key => $value)
                  {
                  ?>
                  <tr>
                    <th><?php echo $i; ?></th>
                    <th><?php echo $value->pname;?></th>
                    <th><?php echo $value->price;?></th>
                  </tr>
                  <?php
                  $i++;
                  }
                }
                else
                {
                ?>
                  <th colspan="3">Order Not Found</th>

                <?php
              }
              ?>
              </thead>
            </table>
          </form><!-- Cart Total view -->
             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <!-- Subscribe section -->
  
  <!-- / Subscribe section -->

  <?php 
  include_once('include/footer.php');
  ?>