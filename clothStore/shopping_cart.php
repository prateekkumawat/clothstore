<?php
error_reporting(0);
session_start();

if(isset($_REQUEST["updatecart"]))
{
  foreach($_SESSION["cart"] as $cart_items)
  {
    foreach($_REQUEST["cart"] as $data )
    {
      foreach($data as $k=>$v)
      {
        if($cart_items["id"]==$k)
        {
          $_SESSION["cart"][$k]["quantity"]=$v;
        }
      }
    }
  }
  header('location:shopping_cart.php');
}
?>
<?php include_once('include/header.php'); ?> 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
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
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                  <th>Actions</th>
                  
         </tr>
              </thead>
              <tbody>
                  <?php

                  $sum=0;
                  
                  foreach($_SESSION["cart"]  as $cart)
                  {
                      $p= $cart["price"];
                      $q= $cart["quantity"];

                      $sum= $sum + $p*$q;
                      ?>
                         <tr>
                            <td><?php echo $cart["id"];?></td>
                            <td><?php echo $cart["name"];?></td>
                            <td><?php echo $cart["price"];?></td>
                            <td>
                               
                                <input type="text"  value="<?php echo $q;?>" name="cart['q'][<?php echo $cart["id"];?>]">
                            
                            </td>
                            <td><?php echo  $p*$q;?></td>
                            <td class="center">
                                <a class="btn btn-danger" href="cart.php?remove_cartid=<?php echo $cart["id"];?>">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                   Remove
                                </a>
                             </td>
        
                </tr>  
                      <?php
                      
                  }
                  
                  
                  ?>
               
                  <tr>

                  <td class="center" colspan="4" align="right">
                        <a class="btn btn-success" href="#">
                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>Clear Cart
                  </a>
                        
          <button type='submit' name='updatecart' class="btn btn-info" value="update"> <i class="glyphicon glyphicon-edit icon-white"></i>Update Cart</button>
                       
                           
                     
                        <a class="btn btn-danger" href="cart.php?order=done">
                            <i class="glyphicon glyphicon-trash icon-white"></i>Place Order
                        </a>
        </td>
        
        <th>Total Order</th>
        <td><?php echo $sum;?></td>
          </tr>
        
                
        </tbody>
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