<?php

require_once("../db/databaseConnection.php");
include("php_operation/sessioncheck.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>iPoint</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- select2 -->

  
  <link rel="stylesheet" href="plugins/select2/css/select2.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
 <!-- iCheck for checkboxes and radio inputs -->
 
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 <!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
  a {
      color: #174076;
      text-decoration: none;
      background-color: transparent;
  }
  .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #174076;
    border-color: #174076;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #174076;
}

.bg-custom {
    background-color: #174076;
    color: white;
}
.navbar-custom {
    background-color: #174076;
}
.btn-success {
    color: #fff;
    background-color: #174076;
    border-color: #174076;
    box-shadow: none;
}
.sidebar-light-success .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #174076;
    color: #fff;
}
  </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <!-- /.navbar -->
 <nav class="main-header navbar navbar-expand navbar-custom navbar-dark">
                                

 <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <!--
                        <li class="nav-item d-none d-sm-inline-block">
                          <a href="../index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                          <a href="../about.php" class="nav-link">About</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                          <a href="../doctor.php" class="nav-link">Doctors</a>
                        </li>
						              <li class="nav-item d-none d-sm-inline-block">
                          <a href="../news.php" class="nav-link">News</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                        <a href="../contact.php" class="nav-link">Contact</a>
                      </li>
-->
                      </ul>

                   <!--   
            <form class="form-inline ml-3">
              <div class="input-group input-group-sm">
                <input id="searchinput" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button id="searchbtn" class="btn btn-navbar" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
-->
				 <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="notifbadge">

          <i class="far fa-bell"></i>
		  	<!--
          <span class="badge badge-warning navbar-badge">3</span>
		  -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifications</span>
		  <div id="notifcontent">
		   <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
               <div class="media-body">
                <h3 class="dropdown-item-title">
                 <i class="far fa-bell"></i>  No notifications yet.
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>


              </div>
            </div>
            <!-- Message End -->
          </a>

			</div>
          <a id="notifbtn" href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link"    href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>


                    </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->

    <a href="index.php" class="brand-link" style="
    padding-left: 20px;
">
      <img src="../images/ipointlogo1.png" alt="ipoint Logo"
           height="40px" width="170px" >
    <!-- <span class="brand-text font-weight-light">Survey Sys</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  id="userhead" href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
	      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">Options</li>
            <li class="nav-item">
              <a href="index.php" class="nav-link ">
                <i class="nav-icon fa fa-calendar"></i>
                Appointments

              </a>
            </li>
          <li class="nav-item">
            <a href="queue.php" class="nav-link">
              <i class="nav-icon fa fa-sort-numeric-down"></i>
              Queue

            </a>
          </li>

          <li class="nav-item">
            <a href="clients.php" class="nav-link  ">
              <i class="nav-icon fa fa-users"></i>
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a href="doctors.php" class="nav-link active">
              <i class="nav-icon fa fa-stethoscope"></i>
              Doctors
            </a>
          </li>
          <li class="nav-item">
            <a href="referral.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              Referrals
            </a>
          </li>
          <li class="nav-header">Reports</li>
         <li class="nav-item">
           <a href="reports.php" class="nav-link ">
             <i class="nav-icon fas fa-chart-pie"></i>
             <p>Reports</p>
           </a>
         </li>
           <li class="nav-header">System</li>
          <li class="nav-item">
            <a href="settings.php" class="nav-link  ">
              <i class="nav-icon fa fa-cog"></i>
              <p>Settings</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="activity.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Activity Log</p>
            </a>
          </li>
		  <li class="nav-item">
            <a id="logoutbtn" href="#" class="nav-link">
              <i class="nav-icon fa fa-window-close"></i>
              <p>Logout</p>
            </a>
          </li>
              </ul>

        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Doctors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Doctors</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title"></h3>

              </div>
              <div class="card-body">

              <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal" > <i class="fas fa-plus"></i>&nbsp; Add New Doctor </a>
                <br/><br/>
                        <!--
                      Pending Requests

                      <hr/>
-->
                      <img id="table_load" src="../images/ajax-loader-big.gif" style="  display: block;margin-left: auto;margin-right: auto;">

                         <table id="doctortbl" class="table table-hover" width="100%">
                        <thead>
                        <tr> 
                        <th>Doctor Name</th>
                          <th>Type</th>
                          <th>Phone</th>
                          <th>Room #</th>
                          <th>Status </th>
                          <th>Action</th>
                          
                        </tr>
                        </thead>
                        <tbody >


                        </tbody>


                      </table>

                  



              </div>
            </div>
            <!-- /.card -->


      <!-- /.modal -->
          </div>
          <!-- /.col-md-12 -->
           <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container-fluid -->
	    <!-- /.card -->



    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- modal edit details -->
 <div class="modal fade" id="editdetModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-custom">
              <h4 class="modal-title">Edit  Doctor Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form">
            <center>
           <img class="img-thumbnail" id= "output_e"  src="../images/doctor.png" width="150px" height="150px" >
          </center>
          <br/>
          <div class="form-group"  >
      
          <div class="custom-file" >
          <input type="file" class="custom-file-input" name="file_e" id="file_e" onchange="validateimage1(this);">
          <label class="custom-file-label"  for="file_e">Choose File</label>
          </div>
          </div>
 
                      <div class="form-group">
                      <label for="doctorname_e">Doctor Name</label>
                      <input type="hidden" id="doctor_id_e"  >
                      <input type="text" class="form-control" id="doctorname_e" placeholder="Dr. John">

                      </div>



                  <div class="form-group">
                    <label>Select Type</label>

                    <select  id="seltype_e" class="custom-select select2">
                      
                        <option value=""></option>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="email_e">Email Address</label>
                  <input type="email" class="form-control" id="email_e" placeholder="@email.com">

                  </div>
                  <div class="form-group">
                  <label for="phone_e">Phone number</label>
                  <input type="text" class="form-control" id="phone_e" placeholder="0912456789">

                  </div>



              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" id="btnUdpatePic" class="btn btn-success">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
 <!-- modal add -->
 <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-custom">
              <h4 class="modal-title">Add New Doctor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form">
            <center>
           <img class="img-thumbnail" id="output"  src="../images/doctor.png" width="150px" height="150px" >
          </center>
          <br/>
          <div class="form-group"  >
      
          <div class="custom-file" >
          <input type="file" class="custom-file-input" name="file" id="file" onchange="validateimage(this);">
          <label class="custom-file-label"  for="file">Choose File</label>
          </div>
          </div>
 
                      <div class="form-group">
                      <label for="doctorname">Doctor Name</label>
                      <input type="text" class="form-control" id="doctorname" placeholder="Dr. John">

                      </div>



                  <div class="form-group">
                    <label>Select Type</label>

                    <select  id="seltype" class="custom-select select2">
                      
                        <option value=""></option>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" class="form-control" id="email" placeholder="@email.com">

                  </div>
                  <div class="form-group">
                  <label for="doctorname">Phone number</label>
                  <input type="text" class="form-control" id="phone" placeholder="0912456789">

                  </div>



              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" id="btnSavePic" class="btn btn-success">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="detailsModal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-custom">
              <h4 class="modal-title">Schedule Details </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <img id="form_loader_v" src="../images/ajax-loader-big.gif" style="  display: block;margin-left: auto;margin-right: auto;">
            <div id="modalForm_v" role="form" style="display: none">
            <table id="schedtbl" class="table table-striped">
              <thead>
              <tr>
                <th>Day</th>
                <th>Status</th>
                <th>Available Hours</th>
                <th>Consultation Time</th>
                <th>Max Client per day</th>

              </tr>
              
              </thead>
              <tbody>
             
              </tbody>

              </table>
            </div>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- modal edit -->
      <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-custom">
              <h4 class="modal-title">Edit Schedule</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <img id="form_loader" src="../images/ajax-loader-big.gif" style="  display: block;margin-left: auto;margin-right: auto;">

              <form id="modalForm" role="form" style="display: none">

                      <div class="form-group">
                   
                      <div class="row">
                      <div class="col-2">
                        <label for="day">Monday</label>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="chkMonday" name="chkMonday" checked>
                      <label class="form-check-label" for="chkMonday" >Available</label>
                      </div>
                      </div>
                      <div class="col-2">
                          <label for="monday_start">Start</label>
                        <input type="time" class="form-control" id="monday_start" value="">
                      </div>
                      <div class="col-2">
                        <label for="monday_end">End</label>
                        <input type="time" class="form-control" id="monday_end" value="">
                      </div>
                      <div class="col-3">
                     <label for="consultation_time">Consultation Time (minutes)</label>
                     <input type="number" class="form-control" id="mon_consultation_time" placeholder="minutes"  >
                   </div>
               
                    <div class="col-3">
                       <label for="max_client">Max Client (per day)</label>
                     <input type="text" class="form-control" id="mon_max_client"  >
                   </div>
                    </div>
                      </div>
                  <hr/>
                      <div class="form-group">
                   
                      <div class="row">
                      <div class="col-2">
                        <label for="day">Tuesday</label>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="chkTuesday" name="chkTuesday" checked>
                      <label class="form-check-label" for="chkTuesday" >Available</label>
                      </div>
                      </div>
                      <div class="col-2">
                          <label for="tuesday_start">Start</label>
                        <input type="time" class="form-control" id="tuesday_start" value="">
                      </div>
                      <div class="col-2">
                        <label for="tuesday_end">End</label>
                        <input type="time" class="form-control" id="tuesday_end" value="">
                      </div>
                      <div class="col-3">
                     <label for="consultation_time">Consultation Time (minutes)</label>
                     <input type="number" class="form-control" id="tue_consultation_time" placeholder="minutes"  >
                   </div>
               
                    <div class="col-3">
                       <label for="max_client">Max Client (per day)</label>
                     <input type="text" class="form-control" id="tue_max_client" >
                   </div>
                    </div>
                      </div>
                      <hr/>
                      <div class="form-group">
                   
                      <div class="row">
                      <div class="col-2">
                        <label for="day">Wednesday</label>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="chkWednesday" name="chkWednesday" checked>
                      <label class="form-check-label" for="chkWednesday" >Available</label>
                      </div>
                      </div>
                      <div class="col-2">
                          <label for="wednesday_start">Start</label>
                        <input type="time" class="form-control" id="wednesday_start" value="">
                      </div>
                      <div class="col-2">
                        <label for="wednesday_end">End</label>
                        <input type="time" class="form-control" id="wednesday_end" value="">
                      </div>
                      <div class="col-3">
                     <label for="consultation_time">Consultation Time (minutes)</label>
                     <input type="number" class="form-control" id="wed_consultation_time" placeholder="minutes"  >
                   </div>
               
                    <div class="col-3">
                       <label for="max_client">Max Client (per day)</label>
                     <input type="text" class="form-control" id="wed_max_client" >
                   </div>
                    </div>
                      </div>
                      <hr/>
                      <div class="form-group">
                   
                      <div class="row">
                      <div class="col-2">
                        <label for="day">Thursday</label>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="chkThursday" name="chkThursday" checked>
                      <label class="form-check-label" for="chkThursday" >Available</label>
                      </div>
                      </div>
                      <div class="col-2">
                          <label for="thursday_start">Start</label>
                        <input type="time" class="form-control" id="thursday_start" value="">
                      </div>
                      <div class="col-2">
                        <label for="thursday_end">End</label>
                        <input type="time" class="form-control" id="thursday_end" value="">
                      </div>
                      <div class="col-3">
                     <label for="consultation_time">Consultation Time (minutes)</label>
                     <input type="number" class="form-control" id="thu_consultation_time" placeholder="minutes" >
                   </div>
               
                    <div class="col-3">
                       <label for="max_client">Max Client (per day)</label>
                     <input type="text" class="form-control" id="thu_max_client" >
                   </div>
                    </div>
                      </div>
                      <hr/>
                      <div class="form-group">
                   
                      <div class="row">
                      <div class="col-2">
                        <label for="day">Friday</label>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="chkFriday" name="chkFriday" checked>
                      <label class="form-check-label" for="chkFriday" >Available</label>
                      </div>
                      </div>
                      <div class="col-2">
                          <label for="friday_start">Start</label>
                        <input type="time" class="form-control" id="friday_start" value="">
                      </div>
                      <div class="col-2">
                        <label for="friday_end">End</label>
                        <input type="time" class="form-control" id="friday_end" value="">
                      </div>
                      <div class="col-3">
                     <label for="consultation_time">Consultation Time (minutes)</label>
                     <input type="number" class="form-control" id="fri_consultation_time" placeholder="minutes"  >
                   </div>
               
                    <div class="col-3">
                       <label for="max_client">Max Client (per day)</label>
                     <input type="text" class="form-control" id="fri_max_client" >
                   </div>
                    </div>
                      </div>
                      <hr/>
                      <div class="form-group">
                   
                      <div class="row">
                      <div class="col-2">
                        <label for="day">Saturday</label>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="chkSaturday" name="chkSaturday" checked>
                      <label class="form-check-label" for="chkSaturday" >Available</label>
                      </div>
                      </div>
                      <div class="col-2">
                          <label for="saturday_start">Start</label>
                        <input type="time" class="form-control" id="saturday_start" value="">
                      </div>
                      <div class="col-2">
                        <label for="saturday_end">End</label>
                        <input type="time" class="form-control" id="saturday_end" value="">
                      </div>
                      <div class="col-3">
                     <label for="consultation_time">Consultation Time (minutes)</label>
                     <input type="number" class="form-control" id="sat_consultation_time" placeholder="minutes"  >
                   </div>
               
                    <div class="col-3">
                       <label for="max_client">Max Client (per day)</label>
                     <input type="text" class="form-control" id="sat_max_client" >
                   </div>
                    </div>
                      </div>
                      <hr/>
                      <div class="form-group">
                   
                      <div class="row">
                      <div class="col-2">
                        <label for="day">Sunday</label>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="chkSunday" name="chkSunday" checked>
                      <label class="form-check-label" for="chkSunday" >Available</label>
                      </div>
                      </div>
                      <div class="col-2">
                          <label for="sunday_start">Start</label>
                        <input type="time" class="form-control" id="sunday_start" value="">
                      </div>
                      <div class="col-2">
                        <label for="sunday_end">End</label>
                        <input type="time" class="form-control" id="sunday_end" value="">
                      </div>
                      <div class="col-3">
                     <label for="consultation_time">Consultation Time (minutes)</label>
                     <input type="number" class="form-control" id="sun_consultation_time" placeholder="minutes"  >
                   </div>
               
                    <div class="col-3">
                       <label for="max_client">Max Client (per day)</label>
                     <input type="text" class="form-control" id="sun_max_client" >
                   </div>
                    </div>
                    <br/>
                
                      </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" id="btnSave" data-id="none" class="btn btn-success">Save Changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="#">i<b>Point</b>   </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <!-- select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>


//datatable
$("#doctortbl").DataTable({
  "responsive": true,
  "autoWidth": false,
});

$('.select2').select2();
bsCustomFileInput.init();

 
function validateimage(input) {;
		 var fileName = input.files[0].name;
    $('#output').attr('src',window.URL.createObjectURL(input.files[0]));
    console.log(window.URL.createObjectURL(input.files[0]));
    }
  function validateimage1(input) {;
    var fileName = input.files[0].name;
  $('#output_e').attr('src',window.URL.createObjectURL(input.files[0]));
  console.log(window.URL.createObjectURL(input.files[0]));
  }

   
  

//get doctortbl
getDoctorlist();
getType();
getNotif();
function dialog(icon, title, text, values, type ){
  Swal.fire({
  title: title,
  text: text,
  icon: icon,
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {
      if(type == "changeschedule") changeSched(values);
      if(type == "update_doctor") updateDoctor(values);
 


  }
  });
}

function showLoading(title){
		//sweet modal success
		let timerInterval
		Swal.fire({
		allowEscapeKey: false,
		allowOutsideClick: false,
		title: title,
		html: 'It will take shortly. Please wait',
		onBeforeOpen: () => {
		Swal.showLoading()
		timerInterval = setInterval(() => {
		const content = Swal.getContent()
		if (content) {
		const b = content.querySelector('b')
		if (b) {
		b.textContent = Swal.getTimerLeft()
		}
		}
		}, 100)
		},
		onClose: () => {
		clearInterval(timerInterval)
		}
		}).then((result) => {

		if (result.dismiss === Swal.DismissReason.timer) {
		console.log('I was closed by the timer')

		}
		})
		}
function updateDoctor(values){
  showLoading('Updating doctor details...');
  $.ajax({
    type: "POST",
    url: "php_operation/doctorcode.php",
    data: values,
    dataType: 'JSON',
    success: function(response){
      var status = response[0].status;
      var error = response[0].error;


      if(status=="success")  showAlert('success','Success','Update Success!');
      if(status=="error")  showAlert('error','Error',error);

    }




  });


}
function changeSched(values){
  showLoading('Updating schedule...');
  $.ajax({
    type: "POST",
    url: "php_operation/doctorcode.php",
    data: values,
    dataType: 'JSON',
    success: function(response){
      var status = response[0].status;
      var error = response[0].error;


      if(status=="success")  showAlert('success','Success','Schedule Changed');
      if(status=="error")  showAlert('error','Error',error);

    }




  });


}
function denyRequest(values){
  $.ajax({
    type: "POST",
    url: "php_operation/appointmentcode.php",
    data: values,
    dataType: 'JSON',
    success: function(response){
      var status = response[0].status;
      var error = response[0].error;


      if(status=="success")  showAlert('success','Success','Appointment Denied');
      if(status=="exist")  showAlert('error','Error',error);
      if(status=="error")  showAlert('error','Error',error);

    }




  });


}


function getDoctorlist(){
  restartDatatable("#doctortbl");

var data = {
       'display': "all"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/doctorcode.php",
       data: data,
       dataType: 'JSON',
       success:  function(response){

          var len = response.length;
          var col="";

             for(var i=0; i<len; i++){

              var doctor_id = response[i].doctor_id;
            var doctor_name = response[i].doctor_name;
            var type_id = response[i].type_id;
            var type_name = response[i].type_name;
            var room = response[i].room;
            var doctor_status= response[i].doctor_status;
            var doctor_pic= response[i].doctor_pic;
            var max_client= response[i].max_client;
            var phone= response[i].phone;
            var email= response[i].email;

            var mon= response[i].mon;
            var tue= response[i].tue;
            var wed= response[i].wed;
            var thu= response[i].thu;
            var fri= response[i].fri;
            var sat= response[i].sat;
            var sun= response[i].sun;
            col+='<tr>';
              
              col+='<td>';
              col+='<div class="user-block">';
              col+='<img class="img-circle img-bordered-sm" src="../images/'+doctor_pic+'" alt="user_image">';
              col+='<span class="username">';
              col+='<a href="#">'+doctor_name+'</a>';
              col+='</span>';
              col+='<span class="description">'+email+'</span> </td>';
              col+=' </td>';
              col+='<td> '+type_name+' </td>';
              col+='<td> '+phone+' </td>';
              col+='<td> '+room+' </td>';
              col+='<td> '+setStatus(doctor_status)+' </td>';
              col+='<td>'; 
              col+='<div class="btn-group" >';
              col+='<button type="button" class="btn btn-default"><i class="fa fa-cog"></i>';
              col+='<button type="button" class="btn btn-default dropdown-toggle  dropdown-icon" data-toggle="dropdown"></button>';
              col+='<span class="sr-only">Toggle Dropdown</span>';
              col+='<div class="dropdown-menu" role="menu">';
              col+='<button type="button"  data-id='+doctor_id+' id="editbtn" class="dropdown-item"   >  Edit Schedule &nbsp; <i class="fas fa-edit"></i> </button>';
              col+='<button type="button" id="viewbtn" data-id='+doctor_id+' class="dropdown-item" class="dropdown-item"  >   View Schedule &nbsp; <i class="fas fa-eye"></i></button>';
              col+='<button type="button" id="editdetbtn" data-id="'+doctor_id+ '" ';
              col+=' data-doctor_name="'+doctor_name+'" ';
              col+=' data-type_id="'+type_id+ '" ';
              col+=' data-type_name="'+type_name+ '" ';
              col+=' data-room="'+room+ '" ';
              col+=' data-doctor_status="'+doctor_status+ '" ';
              col+=' data-doctor_pic="'+doctor_pic+ '" ';
              col+=' data-max_client="'+max_client+ '" ';
              col+=' data-phone="'+phone+ '" ';
              col+=' data-email="'+email+ '" ';
              col+='class="dropdown-item" class="dropdown-item"  >   Edit Details &nbsp; <i class="fas fa-edit"></i></button>';
              col+='  </div>';
              col+='  </button>';
              col+='  </div>';
              col+='  </td>';


              col+='</td></tr>';

            /*
              col+='<tr>';
              col+='<td>';
              col+='<div class="user-block">';
              col+='<img class="img-circle img-bordered-sm" src="../images/'+doctor_pic+'" alt="user_image">';
              col+='<span class="username">';
              col+='<a href="#">'+doctor_name+'</a>';
              col+='</span>';
               col+='<span class="description">'+('1001-00'+ doctor_id)+'</span> </td>';
              col+=' </td>';
              col+='<td> '+ type_name+' </td>';
              col+='<td> '+ fetchSched(mon)+' </td>';
              col+='<td> '+fetchSched(tue)+' </td>';
              col+='<td> '+fetchSched(wed)+' </td>';
              col+='<td> '+fetchSched(thu)+' </td>';
              col+='<td> '+fetchSched(fri)+' </td>';
              col+='<td> '+fetchSched(sat)+' </td>';
              col+='<td> '+fetchSched(sun)+' </td>'; 
            
              col+='<td>'; 
              col+='<div class="btn-group" >';
              col+='<button type="button" class="btn btn-default"><i class="fa fa-cog"></i>';
              col+='<button type="button" class="btn btn-default dropdown-toggle  dropdown-icon" data-toggle="dropdown"></button>';
              col+='<span class="sr-only">Toggle Dropdown</span>';
              col+='<div class="dropdown-menu" role="menu">';
              col+='<button type="button"  data-id='+doctor_id+' id="editbtn" class="dropdown-item"   >  Edit Schedule &nbsp; <i class="fas fa-edit"></i> </button>';
              col+='<button type="button" id="viewbtn" class="dropdown-item" class="dropdown-item"  >   View Details &nbsp; <i class="fas fa-eye"></i></button>';
              col+='  </div>';
              col+='  </button>';
              col+='  </div>';
              col+='  </td>';

             // col+='<button type="button" class="btn btn-primary btn-sm" > Edit Schedule <i class="fa fa-edit"> </i> </button>'; 
              col+=' </tr>';
*/

           }
            $("#table_load").hide();

        $("#doctortbl tbody").append(col);

            initDatatable("#doctortbl");







        }

        });
      }

         
  $(document).on('click', '#editdetbtn', function () {
  var id = $(this).data('id');
  var doctor_name = $(this).data('doctor_name');
  var type_id = $(this).data('type_id');
  var type_name = $(this).data('type_name');
  var room = $(this).data('room');
  var doctor_status = $(this).data('doctor_status');
  var doctor_pic = $(this).data('doctor_pic');
  var max_client = $(this).data('max_client');
  var phone = $(this).data('phone');
  var email = $(this).data('email');
   
  
   // alert(type_id);
   $("#doctor_id_e").val(id);
   $("#doctorname_e").val(doctor_name);
   $("#seltype_e").val(type_id).trigger('change');
   $("#email_e").val(email);
   $("#phone_e").val(phone);
   $('#output_e').attr('src','../images/'+doctor_pic);
 
  $('#editdetModal').modal('show');
  
  });
         
  $(document).on('click', '#viewbtn', function () {
  var id = $(this).data('id');
    
 
  $("#modalForm").hide();
  $("#form_loader").show();
  showSchedDoc(id);
  
  });

      function showSchedDoc(id){
    
    var data = {
           'display': "daysched",
           'id': id
           };
    
      $.ajax({
           type: "POST",
           url: "php_operation/doctorcode.php",
           data: data,
           dataType: 'JSON',
           success:  function(response){
    
              var len = response.length;
              var col1="";
    
                 for(var i=0; i<len; i++){
    
                  var mon= response[i].mon;
                  var tue= response[i].tue;
                  var wed= response[i].wed;
                  var thu= response[i].thu;
                  var fri= response[i].fri;
                  var sat= response[i].sat;
                  var sun= response[i].sun;

                  col1+=fetchSchedDoc(mon);
                  col1+=fetchSchedDoc(tue);
                  col1+=fetchSchedDoc(wed);
                  col1+=fetchSchedDoc(thu);
                  col1+=fetchSchedDoc(fri);
                  col1+=fetchSchedDoc(sat);
                  col1+=fetchSchedDoc(sun);
    
               
             
               } 
              $("#schedtbl tbody").html(col1);
              $('#detailsModal').modal('show');
              $("#modalForm_v").show();
              $("#form_loader_v").hide();
            }
    
            });
      }
      function fetchSchedDoc(day){
      var col ="<tr>";
      jQuery.each(day, function(index, value){
      col+='<td> '+value.day_+' </td>';
      col+= (value.consultation_time>0)?"<td><span class='badge bg-success'>AVAILABLE</span></td>":"<td><span class='badge bg-danger'>UNAVAILABLE</span></td>";
      col+= (value.consultation_time>0)?'<td> '+value.consultation_start + '-'+value.consultation_end+' </td>':"<td>-</td>";
      col+= (value.consultation_time>0)?'<td> '+value.consultation_time+' mins.</td>':"<td>-</td>";
      col+= (value.consultation_time>0)?'<td> '+value.max_client+' pax </td>':"<td>-</td>";
   

      });
      col+='</tr>';
      return col;

    }

function fetchSched(day){
  var col ="";
jQuery.each(day, function(index, value){
  if(value.consultation_time>0)col = value.consultation_start + "-" + value.consultation_end; 
  else col ="<span class='badge bg-danger'>UNAVAILABLE</span>";

});
return col;
}

function restartDatatable(tblname){
$(tblname).DataTable().destroy();
}
  function initDatatable(tblname){
    $(tblname).DataTable({
    "responsive": true,
    "autoWidth": false,
    "order": [[ 1, "desc" ]],
    "scrollX": false
    });
  }


function showAlert(icon, title, content){
  Swal.fire({
  icon: icon,
  title: title,
  text: content,
  confirmButtonText: 'CONTINUE',
  allowEscapeKey: false,
  allowOutsideClick: false,
}).then((result) => {

  if (result.isConfirmed) {
    if(icon=='success')
      location.reload(true);


  }
})



}
 
  function showSched(id){
    
var data = {
       'display': "doctorsched",
       'id': id
       };

  $.ajax({
       type: "POST",
       url: "php_operation/doctorcode.php",
       data: data,
       dataType: 'JSON',
       success:  function(response){

          var len = response.length;
          var col="";

             for(var i=0; i<len; i++){

            var id = response[i].id;
            var day_ = response[i].day_;
            var consultation_time = response[i].consultation_time;
            var consultation_start = response[i].consultation_start;
            var consultation_end= response[i].consultation_end;
            var max_client= response[i].max_client; 
            var doctor_id= response[i].doctor_id; 

            setSched(day_,consultation_time, consultation_start, consultation_end,max_client);

         
           } 
          $('#editModal').modal('show');
          $("#modalForm").show();
          $("#form_loader").hide();
        }

        });
  }
  function setTimeAvail(start,end,consultation_start, consultation_end,chkbox,max_client,consultation_time, max_,_time){
    $(start).attr("disabled", false);
    $(end).attr("disabled", false);
    $(max_client).attr("disabled", false);
    $(consultation_time).attr("disabled", false);
    $(max_client).val(max_);  
    $(consultation_time).val(_time);
    $(start).val(consultation_start);
    $(end).val(consultation_end);
    $(chkbox).prop('checked', true);
  }
 
  function setTimeNotAvail(start,end,chkbox,max_client,consultation_time){
    $(start).attr("disabled", true);
    $(end).attr("disabled", true);
    $(max_client).attr("disabled", true);
    $(consultation_time).attr("disabled", true);
    $(max_client).val("");  
    $(consultation_time).val("");
    $(start).val("");
    $(end).val("");
    $(chkbox).prop('checked', false);
  }
  function setSched(day_, consultation_time, consultation_start, consultation_end, max_client){
    if(day_=="Monday"){
      if(consultation_time<=0) {
        setTimeNotAvail("#monday_start", "#monday_end","#chkMonday","#mon_max_client","#mon_consultation_time" );
      }else{
        setTimeAvail("#monday_start", "#monday_end",consultation_start, consultation_end,"#chkMonday","#mon_max_client","#mon_consultation_time", max_client,consultation_time);
      }
   
    }
    if(day_=="Tuesday"){ 
      if(consultation_time<=0) {
          setTimeNotAvail("#tuesday_start", "#tuesday_end","#chkTuesday","#tue_max_client","#tue_consultation_time");
        }else{
          setTimeAvail("#tuesday_start", "#tuesday_end",consultation_start, consultation_end,"#chkTuesday","#tue_max_client","#tue_consultation_time", max_client,consultation_time);
        }
    }
    if(day_=="Wednesday"){ 
      if(consultation_time<=0) {
        
            setTimeNotAvail("#wednesday_start", "#wednesday_end","#chkWednesday","#wed_max_client","#wed_consultation_time");
          }else{
            setTimeAvail("#wednesday_start", "#wednesday_end",consultation_start, consultation_end,"#chkWednesday","#wed_max_client","#wed_consultation_time", max_client,consultation_time);
          }
    }
    if(day_=="Thursday"){ 
      if(consultation_time<=0) {
          setTimeNotAvail("#thursday_start", "#thursday_end","#chkThursday","#thu_max_client","#thu_consultation_time");
        }else{
          setTimeAvail("#thursday_start", "#thursday_end",consultation_start, consultation_end,"#chkThursday","#thu_max_client","#thu_consultation_time", max_client,consultation_time);
        }
    }
    if(day_=="Friday"){ 
      if(consultation_time<=0) {
          setTimeNotAvail("#friday_start", "#friday_end","#chkFriday","#fri_max_client","#fri_consultation_time");
        }else{
          setTimeAvail("#friday_start", "#friday_end",consultation_start, consultation_end,"#chkFriday","#fri_max_client","#fri_consultation_time", max_client,consultation_time);
        }
    }
    if(day_=="Saturday"){ 
      if(consultation_time<=0) {
          setTimeNotAvail("#saturday_start", "#saturday_end","#chkSaturday","#sat_max_client","#sat_consultation_time");
        }else{
          setTimeAvail("#saturday_start", "#saturday_end",consultation_start, consultation_end,"#chkSaturday","#sat_max_client","#sat_consultation_time", max_client,consultation_time);
        }
    }
    if(day_=="Sunday"){
      if(consultation_time<=0) {
          setTimeNotAvail("#sunday_start", "#sunday_end","#chkSunday","#sun_max_client","#sun_consultation_time");
        }else{
          setTimeAvail("#sunday_start", "#sunday_end",consultation_start, consultation_end,"#chkSunday","#sun_max_client","#sun_consultation_time", max_client,consultation_time);
        }
    }

  }

$(document).on('click', '#editbtn', function () {
  var id = $(this).data('id');

  //$('#btnSave').attr("data-id",id);
  $('#btnSave').data('id',id); //setter
  var newid = $('#btnSave').data('id');

  $("#modalForm").hide();
  $("#form_loader").show();
  showSched(id);
  //alert(newid);
   
// data-toggle="modal" data-target="#editModal"
});


$(document).on('click', '#logoutbtn', function () {



  Swal.fire({
  title: "Are you sure you want to logout?",
  text: "This will exit you in the website",
  icon: "question",
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {
      window.location = "php_operation/logout.php";


  }
  });


});

function setStatus(status){
  if(status=="")
  return '<span class="badge bg-warning">PENDING</span>';
  if(status=="available")
  return '<span class="badge bg-success">AVAILABLE</span>';
  if(status=="unavailable")
  return '<span class="badge bg-danger">UNAVAILABLE</span>';
  if(status=="approved")
  return '<span class="badge bg-success">APPROVED</span>';
  if(status=="completed")
  return '<span class="badge bg-primary">COMPLETED</span>';
  if(status=="denied")
  return '<span class="badge bg-danger">DENIED</span>';
  if(status=="ongoing")
  return '<span class="badge bg-custom">ON-GOING</span>';
  else return '';
}

$(document).on('click', '#deny_button', function () {

  var id = $(this).data('id');

    //set as object
    var values = {
    "display": "denied",
    "id": id
    }

  dialog("question",
  "Are you sure you want to deny this appointment?",
  "This will not undo any changes in the database",
  values,
  "denied" );


});

$(document).on('click', '#approve_button', function () {

  var id = $(this).data('id');

    //set as object
    var values = {
    "display": "approved",
    "id": id
    }

  dialog("question",
  "Are you sure you want to approve this appointment?",
  "This will not undo any changes in the database",
  values,
  "approved" );


});
 

$(document).on('click', '#btnSavePic', function () {
  var file = $('#file').get(0).files.length;
  var doctorname = $("#doctorname").val();
  var seltype = $("#seltype").val();
  var email = $("#email").val();
  var phone = $("#phone").val();
  if (file === 0) {
			showAlert('error','No Image Selected','Please upload the doctor\'s picture ');
			$('#file').css('border-color', 'red');
			return; 
		}
    if (doctorname=="") {
			showAlert('error','Empty Fields','Please add the doctor\'s name! ');
			$('#doctorname').css('border-color', 'red');
			return;
		}
    if (email=="") {
			showAlert('error','Empty Fields','Please add a valid email address ');
			$('#email').css('border-color', 'red');
			return;
		}
    if (phone=="") {
			showAlert('error','Empty Fields','Please add a valid phone number! ');
			$('#phone').css('border-color', 'red');
			return;
		}
    if (seltype=="" || seltype==null) {
			showAlert('error','No selected type','Please select Type! ');
			$('#seltype').css('border-color', 'red');
			return;
		}

  uploadDoctorImg();

});
 

$(document).on('click', '#btnUdpatePic', function () {
  var file = $('#file_e').get(0).files.length;
  var doctorname = $("#doctorname_e").val();
  var seltype = $("#seltype_e").val();
  var email = $("#email_e").val();
  var phone = $("#phone_e").val();

    if (doctorname=="") {
			showAlert('error','Empty Fields','Please add the doctor\'s name! ');
			$('#doctorname').css('border-color', 'red');
			return;
		}
    if (email=="") {
			showAlert('error','Empty Fields','Please add a valid email address ');
			$('#email').css('border-color', 'red');
			return;
		}
    if (phone=="") {
			showAlert('error','Empty Fields','Please add a valid phone number! ');
			$('#phone').css('border-color', 'red');
			return;
		}
    if (seltype=="" || seltype==null) {
			showAlert('error','No selected type','Please select Type! ');
			$('#seltype').css('border-color', 'red');
			return;
		}

    if (file === 0) {
			update_NoImg();
		}else{

      update_withImg();
    }
  

});


$(document).on('click', '#btnSave', function () {

  var id = $(this).data('id');

  var monday_start = $("#monday_start").val();
  var tuesday_start = $("#tuesday_start").val();
  var wednesday_start = $("#wednesday_start").val();
  var thursday_start = $("#thursday_start").val();
  var friday_start = $("#friday_start").val();
  var saturday_start = $("#saturday_start").val();
  var sunday_start = $("#sunday_start").val();

  var monday_end = $("#monday_end").val();
  var tuesday_end = $("#tuesday_end").val();
  var wednesday_end = $("#wednesday_end").val();
  var thursday_end = $("#thursday_end").val();
  var friday_end = $("#friday_end").val();
  var saturday_end = $("#saturday_end").val();
  var sunday_end = $("#sunday_end").val();
  var consultation_time = $("#consultation_time").val();
  var max_client = $("#max_client").val();

  var mon_max_client = $("#mon_max_client").val();
  var mon_consultation_time = $("#mon_consultation_time").val();

  var tue_max_client = $("#tue_max_client").val();
  var tue_consultation_time = $("#tue_consultation_time").val();

  var wed_max_client = $("#wed_max_client").val();
  var wed_consultation_time = $("#wed_consultation_time").val();

  var thu_max_client = $("#thu_max_client").val();
  var thu_consultation_time = $("#thu_consultation_time").val();

  var fri_max_client = $("#fri_max_client").val();
  var fri_consultation_time = $("#fri_consultation_time").val();

  var sat_max_client = $("#sat_max_client").val();
  var sat_consultation_time = $("#sat_consultation_time").val();

  var sun_max_client = $("#sun_max_client").val();
  var sun_consultation_time = $("#sun_consultation_time").val();

 
  var chkMonday = $("#chkMonday").is(':checked'); 
  var chkTuesday = $("#chkTuesday").is(':checked'); 
  var chkWednesday = $("#chkWednesday").is(':checked'); 
  var chkThursday = $("#chkThursday").is(':checked'); 
  var chkFriday = $("#chkFriday").is(':checked'); 
  var chkSaturday = $("#chkSaturday").is(':checked'); 
  var chkSunday = $("#chkSunday").is(':checked'); 
  
  if(mon_consultation_time=="" && chkMonday){
    showAlert('error','Empty Fields!','Please enter the consultation time for monday');
    return;
  }if(mon_max_client=="" && chkMonday){
    showAlert('error','Empty Fields!','Please enter the maximum client per day for monday');
    return;
  }if(monday_start=="" && chkMonday){
    showAlert('error','Empty Fields!','Please enter the start time for monday');
    return;
  }
  if(monday_end=="" && chkMonday){
    showAlert('error','Empty Fields!','Please enter the  closing time for monday');
    return;
  }
  if(tue_consultation_time=="" && chkTuesday){
    showAlert('error','Empty Fields!','Please enter the consultation time for tuesday');
    return;
  }if(tue_max_client=="" && chkTuesday){
    showAlert('error','Empty Fields!','Please enter the maximum client per day for tuesday');
    return;
  }if(tuesday_start=="" && chkTuesday){
    showAlert('error','Empty Fields!','Please enter the start time for tuesday');
    return;
  }
  if(tuesday_end=="" && chkTuesday){
    showAlert('error','Empty Fields!','Please enter the  closing time for tuesday');
    return;
  }
  if(wed_consultation_time=="" && chkWednesday){
    showAlert('error','Empty Fields!','Please enter the consultation time for wednesday');
    return;
  }if(wed_max_client=="" && chkWednesday){
    showAlert('error','Empty Fields!','Please enter the maximum client per day for wednesday');
    return;
  }if(wednesday_start=="" && chkWednesday){
    showAlert('error','Empty Fields!','Please enter the start time for wednesday');
    return;
  }
  if(wednesday_end=="" && chkWednesday){
    showAlert('error','Empty Fields!','Please enter the  closing time for wednesday');
    return;
  }
  if(thu_consultation_time=="" && chkThursday){
    showAlert('error','Empty Fields!','Please enter the consultation time for thursday');
    return;
  }if(thu_max_client=="" && chkThursday){
    showAlert('error','Empty Fields!','Please enter the maximum client per day for thursday');
    return;
  }if(thursday_start=="" && chkThursday){
    showAlert('error','Empty Fields!','Please enter the start time for thursday');
    return;
  }
  if(thursday_end=="" && chkThursday){
    showAlert('error','Empty Fields!','Please enter the  closing time for thursday');
    return;
  }
  if(fri_consultation_time=="" && chkFriday){
    showAlert('error','Empty Fields!','Please enter the consultation time for friday');
    return;
  }if(fri_max_client=="" && chkFriday){
    showAlert('error','Empty Fields!','Please enter the maximum client per day for friday');
    return;
  }if(friday_start=="" && chkFriday){
    showAlert('error','Empty Fields!','Please enter the start time for friday');
    return;
  }
  if(friday_end=="" && chkFriday){
    showAlert('error','Empty Fields!','Please enter the  closing time for friday');
    return;
  }
  if(sat_consultation_time=="" && chkSaturday){
    showAlert('error','Empty Fields!','Please enter the consultation time for saturday');
    return;
  }if(sat_max_client=="" && chkSaturday){
    showAlert('error','Empty Fields!','Please enter the maximum client per day for saturday');
    return;
  }if(saturday_start=="" && chkSaturday){
    showAlert('error','Empty Fields!','Please enter the start time for saturday');
    return;
  }
  if(saturday_end=="" && chkSaturday){
    showAlert('error','Empty Fields!','Please enter the  closing time for saturday');
    return;
  }
  if(sun_consultation_time=="" && chkSunday){
    showAlert('error','Empty Fields!','Please enter the consultation time for sunday');
    return;
  }if(sun_max_client=="" && chkSunday){
    showAlert('error','Empty Fields!','Please enter the maximum client per day for sunday');
    return;
  }if(sunday_start=="" && chkSunday){
    showAlert('error','Empty Fields!','Please enter the start time for sunday');
    return;
  }
  if(sunday_end=="" && chkSunday){
    showAlert('error','Empty Fields!','Please enter the  closing time for sunday');
    return;
  }
  
  //alert(saturday_start);
  //alert(saturday_end);
    //set as object
    var values = {
    "display": "changeschedule",
    "monday_start": monday_start,
    "tuesday_start": tuesday_start,
    "wednesday_start": wednesday_start,
    "thursday_start": thursday_start,
    "friday_start": friday_start,
    "saturday_start": saturday_start,
    "sunday_start": sunday_start,
    "monday_end": monday_end,
    "tuesday_end": tuesday_start,
    "wednesday_end": wednesday_end,
    "thursday_end": thursday_end,
    "friday_end": friday_end,
    "saturday_end": saturday_end,
    "sunday_end": sunday_end,
    "mon_consultation_time": mon_consultation_time,
    "mon_max_client": mon_max_client,
    "tue_consultation_time": tue_consultation_time,
    "tue_max_client": tue_max_client,
    "wed_consultation_time": wed_consultation_time,
    "wed_max_client": wed_max_client,
    "thu_consultation_time": thu_consultation_time,
    "thu_max_client": thu_max_client,
    "fri_consultation_time": fri_consultation_time,
    "fri_max_client": fri_max_client,
    "sat_consultation_time": sat_consultation_time,
    "sat_max_client": sat_max_client,
    "sun_consultation_time": sun_consultation_time,
    "sun_max_client": sun_max_client,
    "id": id
    }
 


  dialog("question",
  "Are you sure you want to update changes for the schedule?",
  "This will not undo any changes in the database",
  values,
  "changeschedule" );


});

function clearTimeField(start, end, bool,max_client,consultation_time){
  $(start).attr("disabled", bool);
    $(end).attr("disabled", bool);
    $(start).val("");
    $(end).val("");
    $(max_client).attr("disabled", bool);
    $(consultation_time).attr("disabled", bool);
    $(max_client).val("");
    $(consultation_time).val("");
}

$("#chkMonday").change(function(event) {
   var checkbox = event.target;
   if (checkbox.checked) clearTimeField("#monday_start", "#monday_end", false,"#mon_max_client","#mon_consultation_time");
   else clearTimeField("#monday_start", "#monday_end", true,"#mon_max_client","#mon_consultation_time");
});
$("#chkTuesday").change(function(event) {
   var checkbox = event.target;
   if (checkbox.checked) clearTimeField("#tuesday_start", "#tuesday_end", false,"#tue_max_client","#tue_consultation_time");
   else clearTimeField("#tuesday_start", "#tuesday_end", true,"#tue_max_client","#tue_consultation_time");
});
$("#chkWednesday").change(function(event) {
   var checkbox = event.target;
   if (checkbox.checked) clearTimeField("#wednesday_start", "#wednesday_end", false,"#wed_max_client","#wed_consultation_time");
   else clearTimeField("#wednesday_start", "#wednesday_end", true,"#wed_max_client","#wed_consultation_time");
});
$("#chkThursday").change(function(event) {
   var checkbox = event.target;
   if (checkbox.checked) clearTimeField("#thursday_start", "#thursday_end", false,"#thu_max_client","#thu_consultation_time");
   else clearTimeField("#thursday_start", "#thursday_end", true,"#thu_max_client","#thu_consultation_time");
});
$("#chkFriday").change(function(event) {
   var checkbox = event.target;
   if (checkbox.checked) clearTimeField("#friday_start", "#friday_end", false,"#fri_max_client","#fri_consultation_time");
   else clearTimeField("#friday_start", "#friday_end", true,"#fri_max_client","#fri_consultation_time");
});
$("#chkSaturday").change(function(event) {
   var checkbox = event.target;
   if (checkbox.checked) clearTimeField("#saturday_start", "#saturday_end", false,"#sat_max_client","#sat_consultation_time");
   else clearTimeField("#saturday_start", "#saturday_end", true,"#sat_max_client","#sat_consultation_time");
});
$("#chkSunday").change(function(event) {
   var checkbox = event.target;
   if (checkbox.checked) clearTimeField("#sunday_start", "#sunday_end", false,"#sun_max_client","#sun_consultation_time");
   else clearTimeField("#sunday_start", "#sunday_end", true,"#sun_max_client","#sun_consultation_time");
});


function getType(){

var data = {
         'display': "type"
         };

    $.ajax({
         type: "POST",
         url: "php_operation/doctorcode.php",
         data: data,
         dataType: 'JSON',
         success:  function(response){

            //fetch type

            fetchType(response.types);
          


          }

          });

}
function fetchType(types){
  jQuery.each(types, function(index, value){
      $('#seltype').append(new Option(value.type_name, value.type_id));
      $('#seltype_e').append(new Option(value.type_name, value.type_id));
  });
}




function update_NoImg(){


var doctorid = $("#doctor_id_e").val();
var doctorname = $("#doctorname_e").val();
var seltype = $("#seltype_e").val();
var email = $("#email_e").val();
var phone = $("#phone_e").val();
 
//set as object
var values = {
     "doctorid": doctorid,
     "doctorname": doctorname,
     "seltype": seltype,
     "email": email,
     "phone": phone,
     "display": 'update_doctor'
   }


    dialog("question",
      "Are you sure you want to update the doctor's details?",
      "This will not undo in the database",
      values,
      "update_doctor" );

}

function update_withImg(){

var file = $('#file_e')[0].files[0]; 
var doctorid = $("#doctor_id_e").val();
var doctorname = $("#doctorname_e").val();
var seltype = $("#seltype_e").val();
var email = $("#email_e").val();
var phone = $("#phone_e").val();


  Swal.fire({
  title: "Are you sure you want to update the doctor's details?",
  text: "This will not undo in the database",
  icon: "question",
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {
        
    var fdata = new FormData();
    fdata.append('file',file);
    fdata.append('seltype',seltype);
    fdata.append('doctorid', doctorid);
    fdata.append('doctorname', doctorname);
    fdata.append('email', email);
    fdata.append('phone', phone);
    fdata.append('display', 'update');
    ajaxFileUpload(fdata);


  }
  });

}

function uploadDoctorImg(){

var file = $('#file')[0].files[0]; 

var doctorname = $("#doctorname").val();
var seltype = $("#seltype").val();
var email = $("#email").val();
var phone = $("#phone").val();

var fdata = new FormData();
fdata.append('file',file);
fdata.append('seltype',seltype);
fdata.append('doctorname', doctorname);
fdata.append('email', email);
fdata.append('phone', phone);
fdata.append('display', 'add');
ajaxFileUpload(fdata);


}


var ajaxFileUpload = function (data) {
var xhr = new XMLHttpRequest();
xhr.open("POST", "php_operation/upload_img_doctor.php", true);
xhr.upload.addEventListener("progress", progressHandler, false);
xhr.addEventListener("load", completeHandler, false);
xhr.addEventListener("error", errorHandler, false);
xhr.addEventListener("abort", abortHandler, false);
xhr.send(data);
};	
function progressHandler(event) {
//  $('#loaded_n_total').text("Uploaded " + event.loaded + " bytes of " + event.total);
var percent = (event.loaded / event.total) * 100;
//    var progressbar = document.getElementById("progressbarid");
//    progressbar .style.width = Math.round(percent) + "%";
//  $('#status').text(Math.round(percent) + "% uploaded... please wait");
   showLoading('Uploading your files to server . Please wait...');

}
function completeHandler(event) {

var response = event.target.responseText;
//alert(response);

var responseArray = JSON.parse(response); 
console.log(JSON.stringify(responseArray));

var status = responseArray[0].status;
var error = responseArray[0].error;
 

if(status=="success"){
showAlert('success','Success','You successfully added a new doctor!');

}else{
showAlert('error','Error',error);
}


//showAlert('success','Success','You successfully added the file!');
// stepper.next();
//

} 

function errorHandler(event) {

  showAlert('error','Error','Upload Failed');
}

function abortHandler(event) {
  
  showAlert('error','Error','Upload Aborted');
}




function getNotif(){

//alert('transaction');
var data = {
       'display': "admin"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/notificationcode.php",
       data: data,
       dataType: 'JSON',
       success:  function(response){

  var len = response.length;

  var col="";

    for(var i=0; i<len-1; i++){

    var id = response[i].id;
    var transaction = response[i].transaction;
    var date_ = response[i].date_;
    var timedif = response[i].timedif;
    var seen = response[i].seen;
    var type = response[i].type; 
    var status = 'pending'; 


    col+='<a href="'+reqType(type)+'" class="dropdown-item">';
    col+='<div class="media">';
    col+='<div class="media-body">';
    col+='<h3 class="dropdown-item-title">';
    col+='<i class="'+iconType(type)+'"></i>  '+titleType(type);
    col+='<span class="'+starType(status)+'"><i class="fas fa-star"></i></span>';
    col+='</h3>';
    col+='<p class="text-sm">'+transaction+'</p>';
    col+='<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> '+timedif+'</p>';
    col+='</div>';
    col+='</div>';
    col+='</a>';
    col+='<div class="dropdown-divider"></div>';

    }

   // alert(col);

   if((len-1)>0){
  $("#notifcontent").html(col);
  var countnotif = response[len-1].countnotif;
   if(countnotif>0)	$("#notifbadge").html('<i class="far fa-bell"></i><span class="badge badge-danger navbar-badge">'+countnotif+'</span>');
}
  }

      });
}
function starType(status){
   if(status=="approved") return "float-right text-sm text-success";
   if(status=="denied") return "float-right text-sm text-danger";
   if(status=="pending") return "float-right text-sm text-warning";
   else return "float-right text-sm text-warning";

 }
function reqType(type){
   if(type=="referral") return "referral.php";
   if(type=="appointment") return "index.php";
    if(type=="settings") return "settings.php";
   else return "index.php";

 }
 function iconType(status){
   if(status=="referral") return "fa fa-stethoscope";
   if(status=="appointment") return "fa fa-calendar";
   if(status=="settings") return "fas fa-cog";
   else return "fas fa-book";

 }
 function titleType(status){
   if(status=="referral") return "New Referral";
   if(status=="appointment") return "Appointment Request";
   if(status=="settings") return "New Changes";
   else return "fas fa-book";

 }

 $(document).on('click', '#notifbtn', function () {
  gotonotif();
   window.location="notification.php";
});
function gotonotif(){
 
var data = {
'display': "delete"
};
$.ajax({
type: "POST",
url: "php_operation/notificationcode.php",
data: data,
cache: false,
success:  function(response){
 
}
});

}
</script>
 </body>
</html>
