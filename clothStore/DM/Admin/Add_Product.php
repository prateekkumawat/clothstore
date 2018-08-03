<?php
include 'inc/connection.php';
$result= $con->query("select * from tbl_category");

$result1= $con->query("select * from tbl_subcategory");

if(isset($_REQUEST["submit"]))
{ 
    $pname=$_REQUEST["pname"];
    $cat= $_REQUEST["cat"];
    $subcat= $_REQUEST["subcat"];
    $price= $_REQUEST["price"];
    $size = implode(",",$_REQUEST["size"]);
    $description= $_REQUEST["description"];
    $stock= $_REQUEST["stock"];
    
    $image= $_FILES["image"]["name"];
    $path="upload/$image";
    $tmp= $_FILES["image"]["tmp_name"];
    move_uploaded_file($tmp,$path);
    
    $con->query("INSERT INTO `tbl_product`(`pname`, `cat_id`, `subcat_id`, `price`, `size`, `description`, `stock`, `image`) VALUES ('$pname','$cat','$subcat','$price','$size','$description','$stock','$image')");
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
            <?php include './inc/header1.php'; ?>
            <div id="page-wrapper">
                <div class="graphs">
                    <div class="xs">
                        <h4>Add New Product</h4><br/>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Product Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control1" id="pname" name="pname" placeholder="Default Input">
                                        </div>
                                        <div class="col-sm-2">
                                            <p class="help-block">Your help text!</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Select Category</label>
									<div class="col-sm-6">
                                                                            <select name="cat" id="cat" class="form-control1">
                                                                                <option value="">Select Category</option>
                                                                                <?php
                                                                                while($row= $result->fetch_object())
                                                                                {
                                                                                    ?>
                                                                                        <option value="<?php echo $row->cat_id;?>"><?php echo $row->cat_name;?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
										
                                                                            </select>
                                                                        </div>
								</div>
                                    <div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Sub Categories</label>
									<div class="col-sm-6">
                                                                            <select name="subcat" id="subcat" class="form-control1">
                                                                                <option value="">Select Subcategory</option>
                                                                                <?php
                                                                                while($row= $result1->fetch_object())
                                                                                {
                                                                                  
                                                                                    ?>
                                                                                        <option value="<?php echo $row->subcat_id;?>"><?php echo $row->subcat_name;?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
										
                                                                            </select>
                                                                        </div>
								</div>
                                    
                                     <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Price</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control1" id="price" name="price" placeholder="Default Input">
                                        </div>
                                        <div class="col-sm-2">
                                            <p class="help-block">Your help text!</p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="checkbox" class="col-sm-2 control-label">Availbale Size</label>
                                        <div class="col-sm-8">
                                            <div class="checkbox-inline1"><label><input type="checkbox" value="s" id="chk1" name="size[]">Small</label></div>
                                            <div class="checkbox-inline1"><label><input type="checkbox" value="m" id="chk2" name="size[]">Medium</label></div>
                                            <div class="checkbox-inline1"><label><input type="checkbox" value="l" id="chk3" name="size[]">Large</label></div>
                                            <div class="checkbox-inline1"><label><input type="checkbox" value="xl" id="chk4" name="size[]">Extra Large</label></div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                        <label for="txtarea1" class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-8"><textarea name="description" id="description" cols="30" rows="20" class="form-control1" style="height: 100px; width: 500px;"></textarea></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="radio" class="col-sm-2 control-label">Available Stock</label>
                                        <div class="col-sm-8">
                                            <div class="radio-inline"><label><input type="radio" name="stock" value="In"> In</label></div>
                                            <div class="radio-inline"><label><input type="radio"  name="stock" value="Out"> Out</label></div>
                                            
                                        </div>
                                    </div>
                                   
                                   

                                    <div class="form-group mb-n">
                                        <label for="largeinput" class="col-sm-2 control-label label-input-lg">Product Image</label>
                                        <div class="col-sm-8">
                                            <input type="file" id="image" name="image">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="panel-footer">

                                        <div class="row">
<br/>
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                                &nbsp;
                                                <button class="btn-inverse btn" type="reset">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
