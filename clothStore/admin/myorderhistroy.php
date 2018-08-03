<?php
include 'inc/connection.php';
$user_id = @$_GET['pur'];

$select = "SELECT  id FROM tbl_orders where customer_id='$user_id'";
$record = $con->query($select);
while ($getrec = $record->fetch_object()) 
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
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Basic_tables :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
          <?php include './inc/header1.php';?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
     <h4>My Order History <p style="position: absolute;left: 1016px;top: 32px;"><a href="All_Orders.php">Back</a></p></h4>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Size</th>
          <th>Description</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($myorder as $key => $value)
        {
         ?>
        <tr>
          <td><?= $value->pname; ?></td>
          <td><?= $value->price; ?></td>
          <td><?= $value->size; ?></td>
          <td><?= $value->description;?></td>
          <td><img width="50" height="50" src="upload/<?php echo $value->image; ?>"></td>
        <tr>
        <?php
        }
        ?>  
      </tbody>
    </table>
   </div>
   
    
  </div>
  <div class="copy_layout">
      <p>Copyright © 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
  </div>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
