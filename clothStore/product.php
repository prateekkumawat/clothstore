<?php
// if(isset($_GET['cat_id']))
// {
//   if($_GET['cat_id']==1) {
//     $page_name = "Men";
//   }
//   elseif ($_GET['cat_id']==2) {
//     $page_name = "Women";    
//   }
//   elseif ($_GET['cat_id']==3) {
//     $page_name = "Kids";        
//   }
    //elseif ($_GET['cat_id']==4) {
//     $page_name = "Dress";        
//   }
//   else{
//     $page_name = "Product";
//   }
// }
session_start(); 
include_once('include/header.php');
include_once('include/connection.php');
$select = 'SELECT  *FROM tbl_category';
$record = $con->query($select);
//$products1 = $con->query("select * from tbl_product");
$products = $con->query("select * from tbl_product limit 3");


if(isset($_REQUEST['cat_id']))
{
  $pid = $_REQUEST['cat_id'];
  $products1 = $con->query("select * from tbl_product where cat_id='$pid'");
}
else
{
  $products1 = $con->query("select * from tbl_product"); 
}

?> 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Fashion</h2>
        <!-- <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>         
          <li class="active"><?= $page_name ?></li>
        </ol> -->
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            
            <div class="aa-product-catg-body">
             <ul class="aa-product-catg">
                        <!-- start single product item -->
                        <?php
                          while ($p = $products1->fetch_object()) {
                          ?>
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="DM/Admin/upload/<?= $p->image; ?>" height="300" width="250" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="product_detail.php?pid=<?=$p->id; ?>"><?= $p->pname; ?></a></h4>
                              <span class="aa-product-price"><?= $p->price; ?>&nbsp;Rs.</span>
                            </figcaption>
                          </figure>                          
                          <!-- product badge -->
                          <span class="aa-badge aa-sale" href="#">SALE!</span>
                        </li>
                        <?php 
                        }
                        ?>
                        <!-- start single product item -->
                      </ul>
                     
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>           
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
              <?php 
              while($all = $record->fetch_object())
              { 
                ?>
                  <li><a href="product.php?cat_id=<?=$all->cat_id; ?>"><?= $all->cat_name; ?></a></li>
              <?php
              }
              ?>
              </ul>
            </div>
            <!-- single sidebar -->
          
            <!-- single sidebar -->
        
            <!-- single sidebar -->
            
            <!-- single sidebar -->
            
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                   <?php 
                    while($all = $products->fetch_object())
                  { 
                ?>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="DM/Admin/upload/<?= $all->image; ?>" width="150" height="150"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#"><?= $all->pname; ?></a></h4>
                      <p><?= $all->price; ?>&nbsp;Rs.</p>
                    </div>                    
                  </li>
              <?php
              }
              ?>                                                     
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->
  <!-- / Subscribe section -->
  <!-- footer -->
  <?php 
    include_once('include/footer.php');
  ?>
