<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Med Aid</title>
    <!-- Core CSS - Include with every page -->
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   	<link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
     <!-- Page Level CSS -->
	<!--    Table JS-->
    <link href="../assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>

<body>
    
    <div id="wrapper">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
        <!-- navbar-header -->
        <div class="navbar-header"> <a class="navbar-brand" href="dashboard_dc.php"> <img src="../assets/img/logo.png" alt="" /> </a> </div>
        <!-- end navbar-header -->
        <!-- navbar-top-links -->
        <ul class="nav navbar-top-links navbar-right">
          <!-- main dropdown -->
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="top-label label label-info">5</span> <i class="fa fa-bell fa-3x"></i> </a>
            <!-- dropdown alerts-->
            <ul class="dropdown-menu dropdown-alerts">
              <li> <a href="#">
                <div> <i class="fa fa-comment fa-fw"></i>New Comment <span class="pull-right text-muted small">4 minutes ago</span> </div>
              </a> </li>
              <li class="divider"></li>
              <li> <a href="#">
                <div> <i class="fa fa-twitter fa-fw"></i>3 New Followers <span class="pull-right text-muted small">12 minutes ago</span> </div>
              </a> </li>
            </ul>
            <!-- end dropdown-alerts -->
          </li>
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-3x"></i> </a>
            <!-- dropdown user-->
            <ul class="dropdown-menu dropdown-user">
              <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a> </li>
              <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a> </li>
              <li class="divider"></li>
              <li><a href="../index.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a> </li>
            </ul>
            <!-- end dropdown-user -->
          </li>
          <!-- end main dropdown -->
        </ul>
        <!-- end navbar-top-links -->
      </nav>
      
      <!-- navbar top -->      <!-- end navbar top -->
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
                  <div>Jonny <strong>Deen</strong></div>
                  <div class="user-text-online"> <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online </div>
                </div>
              </div>
              <!--end user image section-->
            </li>
            <li class=""> <a href="dashboard_dc.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a> </li>
            <li> <a href="#"><i class="fa fa-edit fa-fw"></i> Create Forms<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li> <a href="donation_request_form.php"> Donation Request</a> </li>
                <li> <a href="blood_drive_event_form.php"> Blood Drive Event</a> </li>
              </ul>
              <!-- second-level-items -->
            </li>
            <li> <a href="donors_log.php" class="selected"><i class="fa fa-table fa-fw"></i> Donors Log</a> </li>
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
            <h1 class="page-header">Donors Log</h1>
          </div>
          <!-- end  page header -->
        </div>
        <div class="row">
          <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
              <div class="panel-heading">Log of Previous User Donations</div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Last Donation Date (DD-Month-YYYY)</th>
                        <th>Units Donated</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>usf1996</td>
                        <td>Youssef</td>
                        <td>El Khoury</td>
                        <td class="center">06-April-2017</td>
                        <td class="center">XXXX</td>
                      </tr>
                      <tr>
                        <td>kalashsoft</td>
                        <td>Ahmad</td>
                        <td>Kalash</td>
                        <td class="center">22-February-2017</td>
                        <td class="center">XXXX</td>
                      </tr>
					</tbody>
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
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!--  wrapper -->

    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->

</body>

</html>
