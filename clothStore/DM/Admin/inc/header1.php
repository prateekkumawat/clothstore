  <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../Admin/dashboard.php">Digital Marketing</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/1.png"><span class="badge"></span></a>
	        		<ul class="dropdown-menu">
						
						
						<li class="m_2"><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>	
	        		</ul>
	      		</li>
			</ul>
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../Admin/dashboard.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Manage Categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Admin/category.php">Add New</a>
                                    <a href="../Admin/All_Categories.php">All Categories</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Manage Sub Categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="subcategory.php">Add New</a>
                                    <a href="All_Subcategories.php">All Sub Categories</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Manage Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Admin/Add_Product.php">Add New</a>
                                    <a href="../Admin/All_Products.php">All Products</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                             <a href="../Admin/All_Users.php"><i class="fa fa-envelope nav_icon"></i> All Customers</a>
                        </li>
                         <li>
                             <a href="../Admin/All_Orders.php"><i class="fa fa-envelope nav_icon"></i>Manage Orders</a>
                        </li>
                         <li>
                             <a href="../Admin/All_Inquiries.php"><i class="fa fa-envelope nav_icon"></i> All Inquiries</a>
                        </li>
                         <li>
                             <a href="../Admin/All_feedback.php"><i class="fa fa-envelope nav_icon"></i> All Feedback</a>
                        </li>
                        
                        <li>
                            <a href="../Admin/logout.php"><i class="fa fa-power-off"></i> &nbsp;Logout</a>
                        </li>
                       
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>