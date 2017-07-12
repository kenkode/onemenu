<?php
include'../db.php';
require_once('../auth.php');
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo ucwords($_SESSION['manager']).'`s ';?>Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><?php echo ucwords($_SESSION['manager']).' hotel`s';?> Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo ucwords($_SESSION['manager']);?> Panel <i class="caret"></i>                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="hotel_profile.php">Profile</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li>
                                <a href="index.php">Dashboard</a> </li>
                            <li>
                                <a href="add_meal.php">Add Meal</a> </li>
						     <li class="dropdown active">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Views <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="orders.php">Orders</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="customers.php">Customers</a>
                                    </li>
									<li>
                                        <a tabindex="-1" href="meals.php">Meals</a>
                                    </li>
									<li>
                                        <a tabindex="-1" href="menu.php">Menu</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
    <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li>
                            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a> </li>
                        <li>
                            <a href="add_meal.php"><i class="icon-chevron-right"></i>Add Meal </a> </li>
                        <li>
                            <a href="orders.php"><i class="icon-chevron-right"></i> View Orders </a></li>
                        <li class="active">
                            <a href="customers.php"><i class="icon-chevron-right"></i>View Customers </a> </li>
                       <li>
                            <a href="meals.php"><i class="icon-chevron-right"></i> View Meals </a> </li>
					   <li>
                            <a href="menu.php"><i class="icon-chevron-right"></i> View Menu </a> </li>	 
						<li>
                            <a href="hotel_profile.php"><i class="icon-chevron-right"></i>Profile</a></li>
                        <li>
                            <a href="logout.php"><i class="icon-chevron-right"></i> Logout </a> </li>
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid" style="margin-top:30px;">
                        
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Customers</a> <span class="divider">.</span>	
	                                    </li>
	                                    
	                                </ul>
                            	</div>
                        	</div>
               	  </div>
                    <div class="row-fluid">
                        <!-- block -->
                        <!-- /block -->
</div>
                    <div class="row-fluid" style="width:980px">
                        <div class="span6" style="width:980px">
                            <!-- block -->
                          <div class="block" style="width:980px">
                                <div class="navbar navbar-inner block-header" style="width:940px">
                                    <div class="muted pull-left"><a href="customers.php">Customers</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="customerreportperiod.php" style="background-color:orange;color:white;font-size:16px;padding:8px;border-radius:5px;text-decoration:none">Download Report</a></div>
                                    <div class="pull-right"><span class="badge badge-info">
									<?php
									$c= mysqli_query($con,"select * from orders left join customer on orders.customer_id=customer.cust_id left join hotels on orders.hotels_id = hotels.h_id where hotels.u_id='".$_SESSION['ID']."' group by customer.cust_id");
                                    echo mysqli_num_rows($c);
									?>
			
									</span>

                                    </div>
                                </div>
                                <div class="block-content collapse in" style="width:950px">
                                  <table class="table table-striped" style="width:950px" id="example">
                                     <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
												<th>Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
												<th>View</th>
                                                <th>Report</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$selc=mysqli_query($con,"select * from customer left join orders on customer.cust_id=orders.customer_id left join hotels on orders.hotels_id = hotels.h_id where hotels.u_id='".$_SESSION['ID']."' group by customer.cust_id order by customer.cust_id DESC limit 5") or die(mysqli_error($con));
                                        $i=0;
										while($row=mysqli_fetch_array($selc,MYSQLI_ASSOC)){
										$i++;
										$id=$row['cust_id'];
										echo'<tr class="del'.$id.'"><td>'.$i.'</td><td><a href="view_customers.php?id='.$row['cust_id'].'">'.$row['customer_fname'].' '.$row['customer_lname'].'</a></td><td>'.$row['customer_email'].'</td><td>'.$row['customer_contact'].'</td><td>'.$row['customer_address'].'</td><td><a class="btn btn-info" href="view_customers.php?id='.$row['cust_id'].'">View</a></td><td><a target="blank" href="reportcustomers.php?id='.$row['cust_id'].'" class="btn btn-success">Report</a></td><td><a class="btn btn-danger" id='.$id.'>Delete</a></td></tr>';
										}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                          </div>
                            <!-- /block -->
                        </div>
                        <div class="span6">
                            <!-- block -->
                            <!-- /block -->
</div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <!-- /block -->
</div>
                        <div class="span6">
                            <!-- block -->
                            <!-- /block -->
</div>
                    </div>
                    <div class="row-fluid">
                        <!-- block -->
                        <!-- /block -->
</div>
                </div>
            </div>
            <hr>
            <footer>
                <p align="center" style="font-size:12px">Copyright &copy; 2015. All Rights Reserved.</p>
				<p align="center" style="font-size:10px">Designed by Kanim.</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>
				<script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
   <script type="text/javascript">
   $(document).ready(function() {
    $('#example').dataTable();
	
	$('.btn-danger').click( function() {
		
                var id = $(this).attr("id");
         
                if(confirm("Are you sure you want to delete this customer?")){
                    $.ajax({
                        type: "POST",
                        url: "del_customer.php",
                        data: ({id: id}),
                        cache: false,
                        success: function(html){
                            $(".del"+id).fadeOut('slow'); 
                        } 
                    }); 
                }else{
                    return false;
				}
            });				
   });
   </script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>