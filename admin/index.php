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

  <title>eAppoint</title>

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
              <a href="index.php" class="nav-link active">
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
            <a href="clients.php" class="nav-link ">
              <i class="nav-icon fa fa-users"></i>
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a href="doctors.php" class="nav-link ">
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
            <h1 class="m-0 text-dark">Appointments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Appointments</li>
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

               
               
                      <br/>
                        <!--
                      Pending Requests

                      <hr/>
-->
                      <img id="table_load" src="../images/ajax-loader-big.gif" style="  display: block;margin-left: auto;margin-right: auto;">

                         <table id="appointmentbl" class="table table-hover" width="100%">
                        <thead>
                        <tr>
                          <th>Status</th>
                          <th>ID</th>
                          <th>Request Date </th>
                          <th>Schedule Date</th>
                          <th>Name</th>
                          <th>Room #</th>
                          <th>Type</th>
                          <th>Doctor</th>
                          <th>Process</th>
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

      <!-- modal add -->
           <!-- modal add -->
           <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-custom">
              <h4 class="modal-title">Add Referral</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form">
                  <div class="form-group">
                      <label for="patientname">Patient Name</label>
                      <input type="text" class="form-control" id="patientname" readonly style=" background-color: transparent;">
                      <input type="hidden" class="form-control" id="patientid" readonly >
                    </div>
                      



                  <div class="form-group">
                    <label>Select Clinic</label>

                    <select  id="clinictype" class="custom-select select2">
                    <option value=""></option>
                      <?php 
                         $sql = "SELECT * FROM clinictbl   WHERE id<>'$admin->id' ";
                    
                         $query = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_assoc($query)){
                           $id = $row["id"];
                           $clinic_name = $row["clinic_name"];
                      ?>
                        <option value="<?php echo $id; ?>"> <?php echo $clinic_name; ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Type</label>

                    <select  id="seltype" class="custom-select select2">
                        <option value=""></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea  class="form-control" id="message" rows="5"  placeholder="Enter your message"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Add Attachment</label>
                    <div class="custom-file" >
                    <input type="file" class="custom-file-input" name="file" id="file"  >
                    <label class="custom-file-label"  for="file">Choose File</label>
                    </div>
                  </div>


              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" id="btnReferral" class="btn btn-success">Send Request</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="detailsModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-custom">
              <h4 class="modal-title">Appointment Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <img id="form_loader" src="../images/ajax-loader-big.gif" style="  display: block;margin-left: auto;margin-right: auto;">

              <form id="modalForm" role="form" >
                    <div class="row">

                    <div class="col-md-12">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-default">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="../images/users/avatar.png" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
             
                <h3 class="widget-user-username" id="client_name">-</h3>
                <h5 class="widget-user-desc">-</h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                       <input type="hidden" id="doctor_id"/ >
                       <input type="hidden" id="client_id" />
                       <input type="hidden" id="type_id" />
                        Doctor Name <span class="float-right badge bg-danger"  id="doctor_name">-</span>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="#" class="nav-link">
                      Type <span class="float-right badge bg-info"  id="type_name">-</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Room <span class="float-right badge bg-primary"  id="room">-</span>
                    </a>
                  </li>
                
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Appointment Schedule<span class="float-right badge bg-success"  id="schedule_date">-</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Message <p class="alert alert-light" id="message">-</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Approved For 
                        <div class="form-group">
                        <input type="date" class="form-control" id="approvedate" value="">
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Total Queue:
                      <img id="queue_load" src="../images/ajax-loader-small.gif" style="  display: block;margin-left: auto;margin-right: auto;" width="100px" height="20px">

                        <h2 id="totquecheck" style="text-align: center;">-</h2>
                    </a>
                  </li>
                </ul>

              </div>
            </div>
            <!-- /.widget-user -->
          </div>

                    </div>
                   
              </form>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" id="btnApprove" data-id="" class="btn btn-success  btn-block">APPROVE</button>
            <button type="button" id="btnDeny" data-id="" class="btn btn-danger btn-block">DENY</button>
            <button type="button" id="btnSet" data-id="" class="btn btn-warning btn-block">SET QUEUE AS TODAY</button>
           
              <button type="button"  class="btn btn-default  btn-block" data-dismiss="modal">CANCEL</button>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



      </div>
      <!-- /.container-fluid -->
	    <!-- /.card -->



    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
$("#appointmentbl").DataTable({
  "responsive": true,
  "autoWidth": false,
});

$('.select2').select2();
bsCustomFileInput.init();


//get appointmentbl
getAppointment();
getNotif();

function dialog(icon, title, text, values, type ){
  Swal.fire({
  title: title,
  text: text,
  icon: icon,
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {
      if(type == "approved") approveRequest(values);
      if(type == "denied") denyRequest(values);
      if(type == "set") setRequest(values);
      if(type == "referral") uploadFile();


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
function setRequest(values){
  //alert("set");
  $.ajax({
    type: "POST",
    url: "php_operation/appointmentcode.php",
    data: values,
    dataType: 'JSON',
    success: function(response){
      var status = response[0].status;
      var error = response[0].error;

      //alert(response);
      if(status=="success")  showAlert('success','Success','Appointment Set Today!');
      if(status=="exist")  showAlert('error','Error',error);
      if(status=="error")  showAlert('error','Error',error);

    }




  });


}

function approveRequest(values){
  $.ajax({
    type: "POST",
    url: "php_operation/appointmentcode.php",
    data: values,
    dataType: 'JSON',
    success: function(response){

     // alert(response);
      var status = response[0].status;
      var error = response[0].error;


      if(status=="success")  showAlert('success','Success','Appointment Approved');
      if(status=="exist")  showAlert('error','Error',error);
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


function getAppointment(){
  restartDatatable("#appointmentbl");

var data = {
       'display': "all"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/appointmentcode.php",
       data: data,
       dataType: 'JSON',
       success:  function(response){

          var len = response.length;
          var col="";

             for(var i=0; i<len; i++){

            var appointment_id = response[i].appointment_id;
            var schedule_date = response[i].schedule_date;
            var date_requested = response[i].date_requested;
            var doctor_id = response[i].doctor_id;
            var doctor_name= response[i].doctor_name;
            var type_id= response[i].type_id;
            var type_name= response[i].type_name;
            var room= response[i].room;
            var client_id= response[i].client_id;
            var client_name= response[i].client_name;
            var status= response[i].status;
            var message= response[i].message;

              col+='<tr>';
              col+='<td> '+setStatus(status)+' </td>';
              col+='<td> '+appointment_id+' </td>';
              col+='<td> '+date_requested+' </td>';
              col+='<td> '+schedule_date+' </td>';
              col+='<td> '+client_name+' </td>';
              col+='<td> '+room+' </td>';
              col+='<td> '+type_name+' </td>';
              col+='<td> '+doctor_name+' </td>';
              col+='<td>';
              col+='<div class="btn-group" >';
              col+='<button type="button" class="btn btn-default"><i class="fa fa-cog"></i>';
              col+='<button type="button" class="btn btn-default dropdown-toggle  dropdown-icon" data-toggle="dropdown"></button>';
              col+='<span class="sr-only">Toggle Dropdown</span>';
              col+='<div class="dropdown-menu" role="menu">';
              col+='<button type="button" ';
              col+=' data-appointment_id="'+appointment_id+'" ';
              col+=' data-client_id="'+client_id+'" ';
              col+=' data-client_name="'+client_name+'" ';
              col+=' data-doctor_id="'+doctor_id+'" ';
              col+=' data-type_id="'+type_id+'" ';
              col+=' data-doctor_name="'+doctor_name+'" ';
              col+=' data-type_name="'+type_name+'" ';
              col+=' data-room="'+room+'" ';
              col+=' data-schedule_date="'+schedule_date+'" ';
              col+=' data-message="'+message+'" ';
              col+='id="view_button" class="dropdown-item" >  View Details &nbsp; <i class="fas fa-eye"></i> </button>';
              col+='<button type="button" ';
              col+=' data-appointment_id="'+appointment_id+'" ';
              col+=' data-client_id="'+client_id+'" ';
              col+=' data-client_name="'+client_name+'" ';
              col+=' data-doctor_id="'+doctor_id+'" ';
              col+=' data-type_id="'+type_id+'" ';
              col+=' data-doctor_name="'+doctor_name+'" ';
              col+=' data-type_name="'+type_name+'" ';
              col+=' data-room="'+room+'" ';
              col+=' data-schedule_date="'+schedule_date+'" ';
              col+=' data-message="'+message+'" ';
              col+='id="btnRefer" class="dropdown-item" class="dropdown-item"  >   Refer to other Clinic &nbsp; <i class="fas fa-paper-plane"></i></button>';
              col+='  </div>';
              col+='  </button>';
              col+='  </div>';
              col+='  </td>';
              
              col+='</tr>';


           }
            $("#table_load").hide();

        $("#appointmentbl tbody").append(col);

            initDatatable("#appointmentbl");







        }

        });
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

 
function isInThePast(date) {
  const today = new Date();

  today.setHours(0, 0, 0, 0);

  return date < today;
}
$(document).on('click', '#btnSet', function () {
  var id = $(this).data('id');
   
  var approvedate = $("#approvedate").val();
  var client_id = $("#client_id").val();
  var doctor_id = $("#doctor_id").val();
  var type_id = $("#type_id").val();
  //alert(doctor_id);
  //alert(type_id);

      var values = {
    "date_sched": approvedate,
    "client_id": client_id,
    "doctor_id": doctor_id,
    "type_id": type_id,
    "display": "set",
    "id": id
    }

  dialog("question",
  "Are you sure you want to set this appointment today?",
  "This will not undo any changes in the database",
  values,
  "set" );
  
});


$(document).on('click', '#btnApprove', function () {
  var id = $(this).data('id');
  var approvedate = $("#approvedate").val();
  var client_id = $("#client_id").val();
  var doctor_id = $("#doctor_id").val();
  if(approvedate==""){
    showAlert('error','Error',"Please select the scheduled date!");
    return;
  }
  
  var past = isInThePast(new Date(approvedate));
  if (past) {
    showAlert('error','Error',"You cant select a past date!");
    return;
   }
 
  //alert(id);
      //set as object
      var values = {
    "date_sched": approvedate,
    "client_id": client_id,
    "doctor_id": doctor_id,
    "display": "approved",
    "id": id
    }

  dialog("question",
  "Are you sure you want to approve this appointment?",
  "This will not undo any changes in the database",
  values,
  "approved" );
  
});


$(document).on('click', '#btnDeny', function () {
  var id = $(this).data('id');
  var approvedate = $("#approvedate").val();
  var client_id = $("#client_id").val();
  var doctor_id = $("#doctor_id").val();
  //alert(id);
      //set as object
      var values = {
    "date_sched": approvedate,
    "client_id": client_id,
    "doctor_id": doctor_id,
    "display": "denied",
    "id": id
    }

  dialog("question",
  "Are you sure you want to deny this appointment?",
  "This will not undo any changes in the database",
  values,
  "denied" );

});
$(document).on('click', '#view_button', function () {
  
 // $('#doctor_id').val(doctor_id);
 
    var appointment_id= $(this).data('appointment_id');
    var client_id= $(this).data('client_id');
    var client_name= $(this).data('client_name');
    var doctor_id= $(this).data('doctor_id');
    var type_id= $(this).data('type_id');
    var doctor_name= $(this).data('doctor_name');
    var type_name= $(this).data('type_name');
    var room= $(this).data('room');
    var schedule_date= $(this).data('schedule_date');
    var message= $(this).data('message');
 
   //alert(appointment_id);

    $('#doctor_id').val(doctor_id);
    $('#client_id').val(client_id);
    $('#type_id').val(type_id);
    $('#client_name').text(client_name);
    $('#doctor_name').text(doctor_name);
    $('#type_name').text(type_name);
    $('#room').text(room);
    $('#schedule_date').text(schedule_date);
    $('#message').text(message);
    $('#approvedate').val(schedule_date);
    $('#btnApprove').data('id',appointment_id);
    $('#btnDeny').data('id',appointment_id);
    $('#btnSet').data('id',appointment_id);

     checkDate();

  $('#detailsModal').modal('show');
          $("#modalForm").show();
          $("#form_loader").hide();


});

$(document).on('click', '#btnRefer', function () {
  
  // $('#doctor_id').val(doctor_id);
  
     var appointment_id= $(this).data('appointment_id');
     var client_id= $(this).data('client_id');
     var client_name= $(this).data('client_name');
     var doctor_id= $(this).data('doctor_id');
     var type_id= $(this).data('type_id');
     var doctor_name= $(this).data('doctor_name');
     var type_name= $(this).data('type_name');
     var room= $(this).data('room');
     var schedule_date= $(this).data('schedule_date');
     var message= $(this).data('message');
  
     $('#patientname').val(client_name);
     $('#patientid').val(client_id);
 /*
     $('#doctor_id').val(doctor_id);
    
     $('#type_id').val(type_id);

     $('#doctor_name').text(doctor_name);
     $('#type_name').text(type_name);
     $('#room').text(room);
     $('#schedule_date').text(schedule_date);
     $('#message').text(message);
     $('#approvedate').val(schedule_date);
     $('#btnApprove').data('id',appointment_id);
     $('#btnDeny').data('id',appointment_id);
     $('#btnSet').data('id',appointment_id);
     */
 
      
 
   $('#addModal').modal('show');
        
 
 
 });

$("#clinictype").change(function() {

var selclinic = $(this).val();
console.log('selclinic for select:'+ selclinic);
 
fetchTypes(selclinic);


});

function fetchTypes(selclinic) {

  var values = {
       'clinic': selclinic,
       'display': "types"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/referralcode.php",
       data: values,
       dataType: 'JSON',
       success:  function(response){
        console.log(JSON.stringify(response));
          var len = response.length;
          var col="";
          $('#seltype').empty();
      
             for(var i=0; i<len; i++){

            var type_id = response[i].type_id;
            var type_name = response[i].type_name;
         //   console.log('type_id: '+ type_id);
            
          $('#seltype').append(new Option(type_name, type_id));
           


           }
           

        }

        });
 
}
$("#approvedate").change(function() {
  checkDate();
 

});
function checkDate(){

  $("#queue_load").show();
var seldate = $("#approvedate").val();
var doctor_id = $("#doctor_id").val();

var data = {
       'seldate': seldate,
       'doctor_id': doctor_id,
       'display': "approvedate"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/appointmentcode.php",
       data: data,
       dataType: 'JSON',
       success:  function(response){

          var len = response.length;
          var col="";

             for(var i=0; i<len; i++){

            var totqueue = response[i].totqueue;
            var maxqueue = response[i].maxqueue;
            
            $("#totquecheck").text(totqueue + "/"+ maxqueue);


           }
            $("#queue_load").hide();
 






        }

        });

}



$(document).on('click', '#btnReferral', function () {
  var file = $('#file').get(0).files.length;
  var clinictype = $("#clinictype").val();
  var seltype = $("#seltype").val();
  var message = $("#message").val();
  var patient = $("#patientname").val();

  if (file === 0) {
			showAlert('error','No Attachment Added','Please upload an attachment ');
			return; 
		}
  if(clinictype==""  || clinictype==null) {
       showAlert('error','No Selection','Please select clinic! ');
       return;
     }
     if(seltype=="" || seltype==null) {
       showAlert('error','No Selection','Please select type! ');
       return;
     }
     if(message==""){
       showAlert('error','Empty Fields','Please enter your message! ');
       return;
     }
     if (patient=="" || patient==null) {
       showAlert('error','Empty Fields','Please select patient! ');
       return;
     }

   

  
  dialog("question",
  "Are you sure you want to send this referral?",
  "This will not undo any changes in the database",
  '',
  "referral" );
  
  

});
function uploadFile(){
//alert("uploading");
var file = $('#file')[0].files[0]; 

var clinictype = $("#clinictype").val();
var seltype = $("#seltype").val();
var message = $("#message").val();
var patient = $("#patientid").val();
console.log(clinictype);
console.log(seltype);
console.log(message);
console.log(patient);
var fdata = new FormData();
fdata.append('file',file);
fdata.append('clinictype',clinictype); 
fdata.append('seltype',seltype); 
fdata.append('message',message); 
fdata.append('patient',patient); 
fdata.append('display','add'); 
ajaxFileUpload(fdata);


}


var ajaxFileUpload = function (data) {
var xhr = new XMLHttpRequest();
xhr.open("POST", "php_operation/referralcode.php", true);
xhr.upload.addEventListener("progress", progressHandler, false);
xhr.addEventListener("load", completeHandler, false);
xhr.addEventListener("error", errorHandler, false);
xhr.addEventListener("abort", abortHandler, false);
xhr.send(data);
};	
function progressHandler(event) {
//  $('#loaded_n_total').text("Uploaded " + event.loaded + " bytes of " + event.total);
var percent = (event.loaded / event.total) * 100; 
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
showAlert('success','Success','You successfully requested a new referral!');

}else{
showAlert('error','Error',error);
}


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
