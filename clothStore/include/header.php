<?php 
include_once('include/connection.php');
$select = 'SELECT * FROM tbl_category';
$record = $con->query($select);

if(isset($_POST['search']))
{
  $search = strtolower($_POST['search_val']);
  $sel    = "select cat_id from tbl_category where cat_name='$search'";
  $exe    = $con->query($sel);
  $record = $exe->fetch_object();
  if(!empty($record))
  {
    header("location:product.php?cat_id=".$record->cat_id);
  }
  else
  {
    header("location:index.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
        
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">             
              <!-- / header top left -->
              <?php
              if(isset($_SESSION['id']))
              { 
              ?>
              <b>Welcome : <?php echo ucfirst($_SESSION['name']); ?></b> 
              <?php
              } 
              ?>
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="account.php">My Account</a></li>
                  <?php  
                if(isset($_SESSION['id']))
                {
                ?>
                  <li><a href="update_profile.php">Update Profile</a></li>
                  <li><a href="update_profile.php">Change Password</a></li>
                  <li><a href="my_order.php">My Order</a></li>
                  <li class="hidden-xs"><a href="logout.php">Logout</a></li>
                <?php 
                }
                else
                {
                ?>
                  <li class="hidden-xs"><a href="account.php">Login</a></li>
                <?php
                }
                ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.html">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Cloth<strong>Store</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form method="post">
                  <input type="text" name="search_val" id="" placeholder="Search here ex. 'Men' ">
                  <button type="submit" name="search"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
            <?php             
              while($row= $record->fetch_object())
              {
                  $cat_id= $row->cat_id;
                  $result1= $con->query("select * from tbl_subcategory where cat_id ='$cat_id'");
                ?>
                <li>
                  <a href="product.php?cat_id=<?=$row->cat_id; ?>"><?php echo ucfirst($row->cat_name);?> <span class="caret"></span></a>
                <?php   
                 if(isset($result1))
                  {
                ?>
                <ul class="dropdown-menu">
                    <?php    
                    while($row1= $result1->fetch_object())
                    {
                      ?>
                                     
                      <li><a href="product.php?cat_id=<?=$row->cat_id; ?>"><?php echo $row1->subcat_name;?></a></li>
 
                      <?php
                    }
                    ?>
                </ul>
              <?php
            }
    ?>
    </li><?php 
}
?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
