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
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo ucwords($_SESSION['manager']).' Panel';?> <i class="caret"></i>                                </a>
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
                            <li class="active">
                                <a href="index.php">Dashboard</a> </li>
                            <li>
                                <a href="add_meal.php">Add Meal</a> </li>
						     <li class="dropdown">
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
                        <li class="active">
                            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a> </li>
                        <li>
                            <a href="add_meal.php"><i class="icon-chevron-right"></i>Add Meal </a> </li>
                        <li>
                            <a href="orders.php"><i class="icon-chevron-right"></i> View Orders </a></li>
                        <li>
                            <a href="customers.php"><i class="icon-chevron-right"></i>View Cusomers </a> </li>
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
	                                        <a href="#">Dashboard</a> <span class="divider">.</span>	
	                                    </li>
	                                    
	                                </ul>
                            	</div>
                        	</div>
               	  </div>
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistics</div>
                                
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
                                    <div class="chart" data-percent="100">
									<?php
									$orders= mysqli_query($con,"select * from orders left join hotels on orders.hotels_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."'");
									echo mysqli_num_rows($orders);
									?>
									</div>
                                    <div class="chart-bottom-heading"><span class="label label-info"><a href="orders.php" style="color:#FFFFFF">Orders</a></span>                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="100">
									<?php
									$cust= mysqli_query($con,"select * from orders left join customer on orders.customer_id=customer.cust_id left join hotels on orders.hotels_id = hotels.h_id where hotels.u_id='".$_SESSION['ID']."'");
									echo mysqli_num_rows($cust);
									?>
									</div>
                                    <div class="chart-bottom-heading"><span class="label label-info"><a href="customers.php" style="color:#FFFFFF">Customers</a></span>                                    </div>
                                </div>
                               
                                <div class="span3">
                                    <div class="chart" data-percent="100">
									<?php
									$meals= mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."'");
									echo mysqli_num_rows($meals);
									?>
									</div>
                                    <div class="chart-bottom-heading"><span class="label label-info"><a href="meals.php" style="color:#FFFFFF">Meals</a></span>                                    </div>
                                </div>

                              <div class="span3">
                                    <div class="chart" data-percent="100">
                               <?php
                                    /*$sql= mysqli_query($con,"select * from orders");
                                    echo mysqli_num_rows($sql);*/
                                    $profits=mysqli_query($con,"select sum(amount) as total from orders left join meal on orders.meal_id=meal.m_id left join hotels on 
                                    orders.hotels_id=hotels.h_id left join customer on orders.customer_id=customer.cust_id where hotels.u_id='".$_SESSION['ID']."'") or die(mysqli_error($con));
            
                                       $row1=mysqli_fetch_array($profits,MYSQLI_ASSOC);
                                       $total=number_format($row1['total'],2);
                                       echo $total;
                                    ?>
                                    </div>
                                    <div class="chart-bottom-heading"><span class="label label-info"><a href="meals.php" style="color:#FFFFFF">Profits (Ksh.)</a></span>                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left"><a href="orders.php">Orders</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="ordersreportperiod.php" style="background-color:orange;color:white;font-size:16px;padding:8px;border-radius:5px;text-decoration:none">Download Report</a></div>
                                    <div class="pull-right"><span class="badge badge-info" style="padding:8px;margin-bottom:5px;">
                                    <?php
                                    /*$sql= mysqli_query($con,"select * from orders");
                                    echo mysqli_num_rows($sql);*/
                                    $profits=mysqli_query($con,"select sum(amount) as total from orders left join meal on orders.meal_id=meal.m_id left join hotels on 
                                    orders.hotels_id=hotels.h_id left join customer on orders.customer_id=customer.cust_id where hotels.u_id='".$_SESSION['ID']."'") or die(mysqli_error($con));
            
                                       $row1=mysqli_fetch_array($profits,MYSQLI_ASSOC);
                                       $total=number_format($row1['total'],2);
                                       echo "Total Profit Ksh. ".$total;
                                    ?>
            
                                    </span>

                                    </div>
                                </div>
                                <div class="block-content collapse in" style="overflow: scroll; overflow-y: hidden;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Meal</th>
                                                <th>Type</th>
                                                <th>Hotel</th>
												<th>Customer</th>
												<th>Price</th>
												<th>Date Ordered</th>
												<th>View</th>
                                                <th>Report</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$sel=mysqli_query($con,"select * from orders left join meal on orders.meal_id=meal.m_id left join hotels on orders.hotels_id=hotels.h_id left join customer on orders.customer_id=customer.cust_id GROUP BY orders.order_id
ORDER BY orders.order_id DESC limit 5") or die(mysqli_error($con));
                                        $i=0;
										while($row=mysqli_fetch_array($sel,MYSQLI_ASSOC)){
										$i++;
										$id=$row['order_id'];
										echo'<tr class="del'.$id.'"><td>'.$i.'</td><td><a href="view_orders.php?id='.$row['order_id'].'">'.$row['meal_name'].'</a></td><td>'.$row['food_type'].'</td><td>'.$row['hotel_name'].'</td><td>'.$row['customer_fname'].' '.$row['customer_lname'].'</td><td>'.$row['amount'].'</td><td>'.$row['date_ordered'].'</td><td><a href="view_orders.php?id='.$row['order_id'].'" class="btn btn-info">view</a></td><td><a target="blank" href="reportorders.php?id='.$row['order_id'].'" class="btn btn-success">Report</a></td><td><a class="btn btn-danger" id='.$id.'>Delete</a></td></tr>';
										}
                                            ?>
                                        </tbody>
										<tr><td colspan="2"><a href="orders.php">View all</a></td></tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left"><a href="customers.php">Customers</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="customerreportperiod.php" style="background-color:orange;color:white;font-size:16px;padding:8px;border-radius:5px;text-decoration:none">Download Report</a></div>
                                    <div class="pull-right"><span class="badge badge-info">
									<?php
									$c= mysqli_query($con,"select * from customer left join orders on customer.cust_id=orders.customer_id left join hotels on orders.hotels_id = hotels.h_id where hotels.u_id='".$_SESSION['ID']."' group by customer.customer_contact");
									echo mysqli_num_rows($c);
									?>
									</span>

                                    </div>
                                </div>
                                <div class="block-content collapse in" style="overflow: scroll; overflow-y: hidden;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
												<th>Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
												<th>View</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$selc=mysqli_query($con,"select * from customer left join orders on customer.cust_id=orders.customer_id left join hotels on orders.hotels_id = hotels.h_id where hotels.u_id='".$_SESSION['ID']."' group by customer.customer_contact order by customer.cust_id DESC limit 5") or die(mysqli_error($con));
										$i=0;
										while($row=mysqli_fetch_array($selc,MYSQLI_ASSOC)){
										$i++;
										$id=$row['cust_id'];
										echo'<tr class="del'.$id.'"><td>'.$i.'</td><td><a href="view_customers.php?id='.$row['cust_id'].'">'.$row['customer_fname'].' '.$row['customer_lname'].'</a></td><td>'.$row['customer_email'].'</td><td>'.$row['customer_contact'].'</td><td>'.$row['customer_address'].'</td><td><a class="btn btn-info" href="view_customers.php?id='.$row['cust_id'].'">View</a></td><td><a target="blank" href="reportcustomers.php?id='.$row['cust_id'].'" class="btn btn-success">Report</a></td><td><a class="btn btn-danger customer" id='.$id.'>Delete</a></td></tr>';
										}
                                            ?>
                                        </tbody>
										<tr><td colspan="2"><a href="customers.php">View all</a></td></tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                    
                        <div class="span6" style="margin-left:-4px">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left"><a href="meals.php">Meals</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="report_meals.php" style="background-color:orange;color:white;font-size:16px;padding:8px;border-radius:5px;text-decoration:none">Download Report</a></div>
                                    <div class="pull-right"><span class="badge badge-info">
									<?php
									$m= mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."'");
									echo mysqli_num_rows($m);
									?>
									</span>

                                    </div>
                                </div>
                                
							<div class="block-content collapse in" style="overflow: scroll; overflow-y: hidden;">
                                    <table width="52%" class="table table-striped" style="width:50%">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
												<th width="12%">Image</th>
                                                <th width="10%">Meal</th>
                                                <th width="10%">Type</th>
												<th width="19%">Description</th>
												<th width="11%">Stock</th>
												<th width="12%">Price</th>
												<th>View</th>
                                                <th>Report</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
										$selm=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' order by meal.m_id DESC limit 5") or die(mysqli_error($con));
										$i=0;
										while($row=mysqli_fetch_array($selm,MYSQLI_ASSOC)){
										$i++;
										$id=$row['m_id'];
										echo'<tr class="del'.$id.'"><td>'.$i.'</td><td><img src='.$row['photo'].' width="50" height="50" alt="No image" /></td><td><a href="update_meal.php?id='.$row['m_id'].'">'.$row['meal_name'].'</a></td><td>'.$row['food_type'].'</td><td>'.$row['description'].'</td><td>'.$row['stock'].'</td><td>'.$row['price'].'</td><td><a class="btn btn-warning" href="view_meals.php?id='.$row['m_id'].'">View</a></td><td><a target="blank" href="reportmeals.php?id='.$row['m_id'].'" class="btn btn-success">Report</a></td><td><a class="btn btn-info" href="update_meal.php?id='.$row['m_id'].'">Update</a></td><td><a class="btn btn-danger meal" id='.$id.'>Delete</a></td></tr>';
										}
                                            ?>
											
                                        </tbody>
										<tr><td colspan="2"><a href="meals.php">View all</a></td></tr>
                                  </table>
                                </div>
                            </div>
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
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
		
		   <script type="text/javascript">
   $(document).ready(function() {
  
   $('.meal').click( function() {
		
                var id = $(this).attr("id");
         
                if(confirm("Are you sure you want to delete this meal?")){
                    $.ajax({
                        type: "POST",
                        url: "del_meal.php",
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
			$('.customer').click( function() {
		
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
			$('.order').click( function() {
		
                var id = $(this).attr("id");
         
                if(confirm("Are you sure you want to delete this order?")){
                    $.ajax({
                        type: "POST",
                        url: "del_order.php",
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
    </body>

</html>