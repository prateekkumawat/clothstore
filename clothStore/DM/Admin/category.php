
<?php include 'inc/connection.php';?>

<?php
if(isset($_REQUEST["submit"]))
{
    $cat= strtolower($_REQUEST["cat"]);    
    $con->query("insert into tbl_category(cat_name) values('$cat')");
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Forms :: w3layouts</title>
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
        <div class="graphs">
	     <div class="xs">
  	       <h4>Add New Subcategory</h4>
               <br/>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
                                                    <form class="form-horizontal" method="post">
								
								
								
                                                            <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Enter Subcategory</label>
									<div class="col-sm-6">
										<input type="text" class="form-control1" id="cat" name="cat" placeholder="Enter Subcategory Name..">
									</div>
									
								</div>
								
                                                            <br/>
                                                           
                                                                
		<div class="row">
                    
			<div class="col-sm-8 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
				
                            <button class="btn-inverse btn" type="reset">Reset</button>
			</div>
		</div>

							</form>
						</div>
					</div>
					
					
  
	
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

  