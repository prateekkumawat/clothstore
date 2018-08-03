<?php
include 'inc/connection.php';
$result= $con->query("select * from tbl_category inner join tbl_subcategory on tbl_category.cat_id=tbl_subcategory.cat_id");

if(isset($_REQUEST["delid"]))
{
    $id= $_REQUEST["delid"];
    $con->query("delete from tbl_subcategory where subcat_id='$id'");
    header('location:All_Subcategories.php');
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
  	 <h4>ALL Subcategories</h4>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table">
      <thead>
        <tr>
          <th>Cat Id</th>
          <th>Category</th>
          <th>Parent Category</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
       <?php
          while($row= $result->fetch_object())
          {
              ?>
                <tr class="active">
                <th scope="row"><?php echo $row->subcat_id?></th>
                <td><?php echo $row->subcat_name?></td>
                <td><?php echo $row->cat_name?></td>
                <td><a href="All_Subcategories.php?delid=<?php echo $row->subcat_id?>">Delete</a></td>
               </tr>
       
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
