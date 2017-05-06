<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Med Aid</title>
    <!-- Core CSS - Include with every page -->
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   	<link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
<!--    Graph JS-->
    <link href="../assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
<!--    Table JS-->
    <link href="../assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
			<!-- navbar-header -->
			<div class="navbar-header">
				<a class="navbar-brand" href="dashboard_c.php">
					<img src="../assets/img/logo.png" alt="" />
				</a>
			</div>
			<!-- end navbar-header -->
			
		<!-- navbar-top-links -->
			<ul class="nav navbar-top-links navbar-right">
				<!-- main dropdown -->       
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="top-label label label-info">5</span>  <i class="fa fa-bell fa-3x"></i>
					</a>
					<!-- dropdown alerts-->
					<ul class="dropdown-menu dropdown-alerts">
						<li>
							<a href="#">
								<div>
									<i class="fa fa-comment fa-fw"></i>New Comment
									<span class="pull-right text-muted small">4 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<i class="fa fa-twitter fa-fw"></i>3 New Followers
									<span class="pull-right text-muted small">12 minutes ago</span>
								</div>
							</a>
						</li>
					</ul>
					<!-- end dropdown-alerts -->
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-3x"></i>
					</a>
					<!-- dropdown user-->
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
						</li>
						<li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
						</li>
						<li class="divider"></li>
						<li><a href="../index.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
						</li>
					</ul>
					<!-- end dropdown-user -->
				</li>
				<!-- end main dropdown -->
			</ul>
			<!-- end navbar-top-links -->

		</nav>
		<!-- end navbar top -->
		
        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-info">
                                <span id="dCenterName"></span>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>
									<span id="dCenterEmail"><span>
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
		
        <!--  page-wrapper -->
		<div id="page-wrapper">
					<div class="row">
							<!--  page header -->
							<div class="col-lg-12">
								<h1 class="page-header">Dashboard</h1>
							</div>
							<!-- end  page header -->
					</div>
					<div class="row">
						  <div class="col-lg-12">
									<!-- Advanced Tables -->
									<div class="panel panel-default">
									  <div class="panel-heading">Blood Donation Requests</div>
									  <div class="panel-body">
										<div class="table-responsive">
										  <table class="table table-striped table-bordered table-hover" id="dataTables-bloodtype">
											<thead>
													<tr>
													  <th>ID</th>
													  <th>Blood Type</th>
													  <th>Hospital</th>
													  <th></th>
													  <th></th>
													</tr>
											</thead>
										  </table>
										</div>
									  </div>
									</div>
									<!--End Advanced Tables -->
								  </div>
							</div>
					<div class="row">
						  <div class="col-lg-12">
							<!-- Advanced Tables -->
							<div class="panel panel-default">
							  <div class="panel-heading">Blood Drive Events</div>
							  <div class="panel-body">
								<div class="table-responsive">
								  <table class="table table-striped table-bordered table-hover" id="dataTables-blooddrive">
									<thead>
										<tr>
										  <th>ID</th>
										  <th>Event Name</th>
										  <th>Location</th>
										  <th>Start Date</th>
										  <th>End Date</th>
										  <th>Extra Info</th>
										</tr>
									</thead>
								  </table>
								</div>
							  </div>
							</div>
							<!--End Advanced Tables -->
						  </div>
					</div>
		</div>
        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="../assets/plugins/jquery-1.10.2.js"></script>
    <script src="../assets/plugins/bootstrap/bootstrap.js"></script>
    <script src="../assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../assets/plugins/pace/pace.js"></script>
    <script src="../assets/scripts/medaid.js"></script>

<!--     Page-Level Plugin Scripts-->
<!--    Table JS-->
	<script src="../assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function() {
		var obj = JSON.parse(localStorage.getItem("loginData"));
		
		$("#dCenterName").text(obj.username);
		$("#dCenterEmail").text(obj.email);
		
		$.ajax({
			type: 'post',
			url: '/assets/php/citizen/dashboard_c.php',
			data: obj,
			dataType: 'json',
			encode: true
			error: function(error){
				alert("nayyak");
			}
		})
	  
		.done(function(dataSet) {
			var d_data = [];
			var r_data = [];
			
			for(i = 0; i < dataSet.drivedata.length; i++){
				d_data.push([dataSet.drivedata[i].driveid, dataSet.drivedata[i].drivename, dataSet.drivedata[i].driveloc, dataSet.drivedata[i].sdate, dataSet.drivedata[i].edate, dataSet.drivedata[i].info]);
			}
			
			for(i = 0; i < dataSet.reqdata.length; i++){
				r_data.push([dataSet.reqdata[i].reqid, dataSet.reqdata[i].bloodtype, dataSet.reqdata[i].hospital, dataSet.reqdata[i].info]);
			}
			
			var dataTables_blooddrive = $('#dataTables-blooddrive').DataTable( {
				data: d_data
			});
			
			var dataTables_bloodtype = $('#dataTables-bloodtype').DataTable( {
				data: r_data,
				"columnDefs": [ {
					"targets": -1,
					"data": null,
					"defaultContent": "<button id='cancel' type='button' class='btn btn-danger'>Cancel</button>"
				},
				{
					"targets": -2,
					"className":      'details-control',
					"orderable":      false,
					"data":           null,
					"defaultContent": "<button id='accept' type='button' class='btn btn-info'>Accept</button>"
				}
				]
			});
			
			$('#dataTables-bloodtype tbody').on('click', '#accept', function () {
				
			} );
			
			$('#dataTables-bloodtype tbody').on( 'click', '#cancel', function () {
				
			} );
			
		});
	});
	</script>
</body>

</html>
