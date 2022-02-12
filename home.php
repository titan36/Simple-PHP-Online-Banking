<?php
session_start();
include('config.php');
include('clean_xxs.php');
	$sender = $_SESSION['phone'];
	$sendersql = "select * from users where phone = '$sender'";
	$result1 = mysqli_query($con, $sendersql);
	$row1 = mysqli_fetch_assoc($result1);
	$saccount_number = $row1['account_number'];
	$sender_amount = $row1['balance'];
	$user = $row1['fname'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Navbar</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	<link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
	<link href="dist/css/customized.css" rel="stylesheet">
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="vendor/datatables/css/datatables.min.css">
</head>
<body>
<div class="wrapper">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>	
				
			</button>
			<a href="home.php" class="navbar-brand">MicroMerce</a>
		</div>
		<ul class="nav navbar-nav navbar-right sm-collapse" style="margin-right: 10px;">
			<li><a href=""><span class="glyphicon glyphicon-account"></span> <?php echo $saccount_number; ?></a></li>
			<li><a href=""><span class="glyphicon glyphicon-user"></span> <?php echo $user; ?></a></li>
			<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		</ul>	
		<!-- start of Sidebar-->
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse"><!-- start of Sidebar Collapse-->
				<ul class="nav" id="side-menu"> <!-- start of Side Menu-->
					<li>
						<a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
					</li>
					<li> 
						<a href="transfer.php"><i class="fa fa-table fa-fw"></i>Transfer</a>
					</li> 
					<li>
						<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Transaction<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="#">Tranfered</a>
								</li>
								<li>
									<a href="#">Received</a>
								</li>
							
							</ul>
					</li>
					
					<li>
						<a href="#"><i class="glyphicon glyphicon-user fa-fw"></i> Deposit</a>
					</li>				
					<li>
						<a href="#"><i class="glyphicon glyphicon-wrench fa-fw"></i> Website Setting</a>
					</li>	
					<li>
						<a href="#"><i class="glyphicon glyphicon-credit-card fa-fw"></i> Payment Gateway</a>
					</li>	
					<li>
						<a href="#"><i class="glyphicon glyphicon-comment fa-fw"></i> Messages</a>
					</li>
					<li>
						<a href="logout.php"><i class="glyphicon glyphicon-log-out fa-fw"></i> Logout</a>
					</li>		
				</ul> <!-- endof Side Menu-->
			</div> <!-- end of Sidebar Collapse-->
		</div><!-- end of Sidebar-->
	</nav>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row" style="margin-top: 20px;">
				<div class="col-lg-12">
					<h1 class="page-header">Hello Welcome Home</h1>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Balance</div>
						<div class="panel-body">
							<div class="col-md-6">
								<i class="fa fa-dollar text-left" style="margin-top: 20px;font-size: 30px;"></i>
							</div>
							<div class="col-md-6">
								<h1 class="text-right"><?php echo $sender_amount; ?></h1>
								
							</div>
							<div class="col-lg-12">
								<a class="btn btn-block btn-primary" href="">View</a>
							</div>
						</div>
					</div>
				</div>
			
					<div class="col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">Completed Orders</div>
							<div class="panel-body">
								<div class="col-md-6">
									<i class="fa fa-shopping-cart text-left" style="margin-top: 20px;font-size: 30px;"></i>
								</div>
								<div class="col-md-6">
									<h1 class="text-right">100</h1>
									
								</div>
								<div class="col-lg-12">
									<a class="btn btn-block btn-primary" href="">View</a>
								</div>
							</div>
						</div>
					</div>
				

				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Payment System</div>
						<div class="panel-body">
							<div class="col-md-6">
								<i class="fa fa-credit-card text-left" style="margin-top: 20px;font-size: 30px;"></i>
							</div>
							<div class="col-md-6">
								<h1 class="text-right">5</h1>
								
							</div>
							<div class="col-lg-12">
								<a class="btn btn-block btn-primary" href="">View</a>
							</div>
						</div>
					</div>
				</div>
			
             </div>             
     	 </div>
	 </div> 
</div>
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/metisMenu/metisMenu.min.js"></script>
<script src="dist/js/customized.js"></script>
 <script src="vendor/datatables-plugins/jquery.dataTables.min.js"></script>

       <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
</html>