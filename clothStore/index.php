<?php
session_start();
include_once('include/header.php');
include_once('include/connection.php');
$select = 'SELECT * FROM tbl_category';
$record = $con->query($select);

if(isset($_REQUEST['pid']))
{
  $pid = $_REQUEST['pid'];
  $products = $con->query("select * from tbl_product where id='$pid' limit 8");
}
else
{
  $products = $con->query("select * from tbl_product limit 8 "); 
}
?>
  <!-- Start slider -->
  <section id="aa-slider">
  <div class="">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/slider/Banner1.png" alt="Los Angeles" style="width:100%;height: 500px;">
      </div>

      <div class="item">
        <img src="img/slider/Banner3.jpg" alt="Chicago" style="width:100%; height: 500px;">
      </div>
    
      <div class="item">
        <img src="img/slider/Banner5.jpg" alt="New york" style="width:100%;height: 500px;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </section>
</div>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              <!-- promo right -->              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <?php 
                    while($row= $record->fetch_object())
                    {
                   ?>
                    <li><a href="#women" data-toggle="tab"><?= $row->cat_name; ?></a></li>
                  <?php 
                    }
                  ?>                    
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        <?php
                          while ($p = $products->fetch_object()) {
                          ?>
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="DM/Admin/upload/<?= $p->image; ?>" height="300" width="250" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn" href="product_detail.php?pid=<?= $p->id; ?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="product_detail.php?pid=<?= $p->id; ?>"><?= $p->pname; ?></a></h4>
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
                      
                    </div>
                    <!-- / electronic product category -->
                  </div>
                  <!-- quick view modal -->                  
                  <!-- / quick view modal -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    
  </section>
  <!-- popular section -->
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <!-- / Testimonial -->

  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- / Client Brand -->
<?php 
include_once('include/footer.php');
?>
