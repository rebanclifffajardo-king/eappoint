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
           height="40px" width="170px"  >
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
            <a href="queue.php" class="nav-link active">
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
            <h1 class="m-0 text-dark">Queue</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Queue</li>
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

                <ul class="nav nav-pills">
                <li class="nav-item"><a  id="nav-pending" class="nav-link active" href="#pending_tab" data-toggle="tab" >Waiting List </a></li>
                <li class="nav-item"><a  id="nav-completed" class="nav-link"   href="#completed_tab" data-toggle="tab">Completed</a></li>
                 <li class="nav-item"><a  id="nav-expired" class="nav-link"  href="#expired_tab" data-toggle="tab">Expired</a></li>

                </ul>
                <hr/>
                <div class="tab-content">
                    <div class="active tab-pane" id="pending_tab">
                       
                        <!--
                      Pending Requests

                      
-->

<a class="btn btn-danger btn-sm mb-2" href="#" data-toggle="modal" data-target="#addModal" > <i class="fas fa-plus-circle"></i>&nbsp; Add Walk-in Appointment </a>
               

                      <img id="table_load" src="../images/ajax-loader-big.gif" style="  display: block;margin-left: auto;margin-right: auto;">

                         <table id="queuetbl" class="table table-hover" width="100%">
                        <thead>
                        <tr>
                          <th>Status</th>
                          <th>Priority #</th>
                          <th>Date/Time</th>
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

                    <div class=" tab-pane" id="completed_tab">
                      <br/>
                        <!--
                      Completed Requests

                      <hr/>
-->
                      <img id="table_load_complete" src="../images/ajax-loader-big.gif" style="  display: block;margin-left: auto;margin-right: auto;">

                         <table id="completetbl" class="table table-hover" width="100%">
                        <thead>
                        <tr>
                          <th>Status</th>
                          <th>Priority #</th>
                          <th>Date/Time</th>
                          <th>Name</th>
                          <th>Room #</th>
                          <th>Type</th>
                          <th>Doctor</th>
                       
                        </tr>
                        </thead>
                        <tbody >

                        </tbody>


                      </table>

                    </div>
                    <div class=" tab-pane" id="expired_tab">
                      <br/>
                        <!--
                      
                        Expired Requests

                      <hr/>
-->
                      <img id="table_load_expired" src="../images/ajax-loader-big.gif" style="  display: block;margin-left: auto;margin-right: auto;">

                         <table id="expiredtbl" class="table table-hover" width="100%">
                        <thead>
                        <tr>
                          <th>Status</th>
                          <th>Priority #</th>
                          <th>Date/Time</th>
                          <th>Name</th>
                          <th>Room #</th>
                          <th>Type</th>
                          <th>Doctor</th>
                          
                        </tr>
                        </thead>
                        <tbody >

                        </tbody>


                      </table>

                    </div>


                </div>



              </div>
            </div>
            <!-- /.card -->

 <!-- modal add -->
 <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-custom">
              <h4 class="modal-title">Add Walk-in Appointment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form">
                <input type="hidden" id="clinictype" value="<?php echo $admin->id; ?>" >


                      <div class="form-group">
                      <label for="appointment_date">Appointment Date</label>
                      <input type="date" class="form-control" id="appointment_date" placeholder="2022-01-01">

                      </div>
                      <div class="form-group">
                      <label for="patientname">Patient Name</label>
                      <input type="text" class="form-control" id="patientname" placeholder="Dela Cerna, Juan">

                      </div>

                   
                  <div class="form-group">
                    <label>Select Type</label>

                    <select  id="seltype" class="custom-select select2">
                    <option value=""></option>
                      <?php 
                         $sql = "SELECT * FROM typetbl   WHERE clinictype='$admin->id' ";
                    
                         $query = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_assoc($query)){
                           $type_id = $row["type_id"];
                           $type_name = $row["type_name"];
                      ?>
                        <option value="<?php echo $type_id; ?>"> <?php echo $type_name; ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Doctor</label>

                    <select  id="seldoctor" class="custom-select select2">
                        <option value=""></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="message">Note</label>
                    <textarea  class="form-control" id="message"  placeholder="Enter your notes to client"></textarea>
                  </div>




              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" id="btnSave" class="btn btn-success">Add Appointment</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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
   
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <!-- select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>

<script>
// Initialize Firebase

var config = {
  apiKey: "AIzaSyB5WA2se2-gCfhRA6TpGlUUyG_xxkQl41Y",
  authDomain: "sampledb-463a2.firebaseapp.com",
  databaseURL: "https://sampledb-463a2-default-rtdb.firebaseio.com",
  projectId: "sampledb-463a2",
  storageBucket: "sampledb-463a2.appspot.com",
  messagingSenderId: "108015086112"
};
firebase.initializeApp(config);

</script>
<script>
	$(function() {
//datatable
$("#queuetbl").DataTable({
  "responsive": true,
  "autoWidth": false,
});

$('.select2').select2();



//get queue

getQueue();
getQueueCompleted();
getQueuenoshow();
getNotif();

 
function dialog(icon, title, text, values, type ){
  Swal.fire({
  title: title,
  text: text,
  icon: icon,
  confirmButtonColor: '#174076',
  cancelButtonColor: '#d33',
  showCancelButton: true,
  reverseButtons: true
  }).then((result) => {
  if (result.isConfirmed) {
      if(type == "ongoing") acceptRequest(values);
      if(type == "noshow") noshowRequest(values);
      if(type == "complete") completedRequest(values);
      

  }
  });
}
function acceptRequest(values){

    $.ajax({
      type: "POST",
      url: "php_operation/queuecode.php",
      data: values,
      dataType: 'JSON',
      success: function(response){
        var status = response[0].status;
        var error = response[0].error;

        if(status=="success") {
          firebasecheck("current");
        }  if(status=="error")  showAlert('error','Error',error);

    }

    });
}



function noshowRequest(values){
  $.ajax({
    type: "POST",
    url: "php_operation/queuecode.php",
    data: values,
    dataType: 'JSON',
    success: function(response){
      var status = response[0].status;
      var error = response[0].error;

      if(status=="success")  {
        firebasecheck("removed");
       }
        if(status=="error")  showAlert('error','Error',error);

  }

  });
}
function completedRequest(values){
  $.ajax({
    type: "POST",
    url: "php_operation/queuecode.php",
    data: values,
    dataType: 'JSON',
    success: function(response){
      var status = response[0].status;
      var error = response[0].error;

      if(status=="success") {
          firebasecheck("success");
      }     if(status=="error")  showAlert('error','Error',error);


  }

  });
}

function getQueue(){
  restartDatatable("#queuetbl");

var data = {
       'display': "all"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/queuecode.php",
       data: data,
       dataType: 'JSON',
       success:  function(response){

          var len = response.length;
          var col="";

             for(var i=0; i<len; i++){

            var id = response[i].id;
            var priorityno = response[i].priorityno;
            var name = response[i].name;
            var date_sched= response[i].date_sched;
            var datetime_sched= response[i].datetime_sched;
            var type_name= response[i].type_name;
            var room= response[i].room;
            var doctor_name= response[i].doctor_name;
            var status= response[i].status;


              col+='<tr>';
              col+='<td> '+setStatus(status)+' </td>';
              col+='<td> '+checkNo(priorityno)+' </td>';
              col+='<td> '+datetime_sched+' </td>';
              col+='<td> '+name+' </td>';
              col+='<td> '+room+' </td>';
              col+='<td> '+type_name+' </td>';
              col+='<td> '+doctor_name+' </td>';
              col+='<td>';
              col+='<div class="btn-group" >';
              col+='<button type="button" class="btn btn-default"><i class="fa fa-cog"></i>';
              col+='<button type="button" class="btn btn-default dropdown-toggle  dropdown-icon" data-toggle="dropdown"></button>';
              col+='<span class="sr-only">Toggle Dropdown</span>';
              col+='<div class="dropdown-menu" role="menu">';
            //  col+='<button type="button" id="view_button" data-id="'+id+'" class="dropdown-item" href=""> View Details <i class="fa fa-eye"></i> </a>';
              col+='<button type="button" id="accepbtn" data-id="'+id+'"  class="dropdown-item"  href="">Set as Current <i class="fa fa-stethoscope"></i> </button>';
              col+='<button type="button" id="noshowbtn" data-id="'+id+'"  class="dropdown-item"  href="">No Show <i class="fa fa-times"></i> </button>';
              col+='<button type="button" id="completedbtn" data-id="'+id+'"  class="dropdown-item"  href="">Mark as Completed <i class="fa fa-check"></i> </button>';
              col+='  </div>';
              col+='  </button>';
              col+='  </div>';

              col+='</td></tr>';


           }
            $("#table_load").hide();

        $("#queuetbl tbody").append(col);

            initDatatable("#queuetbl");







        }

        });
      }

function getQueueCompleted(){
  restartDatatable("#completetbl");

var data = {
       'display': "completed"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/queuecode.php",
       data: data,
       dataType: 'JSON',
       success:  function(response){

          var len = response.length;
          var col="";

             for(var i=0; i<len; i++){

            var id = response[i].id;
            var priorityno = response[i].priorityno;
            var name = response[i].name;
            var date_sched= response[i].date_sched;
            var datetime_sched= response[i].datetime_sched;
            var type_name= response[i].type_name;
            var room= response[i].room;
            var doctor_name= response[i].doctor_name;
            var status= response[i].status;


              col+='<tr>';
              col+='<td> '+setStatus(status)+' </td>';
              col+='<td> '+checkNo(priorityno)+' </td>';
              col+='<td> '+datetime_sched+' </td>';
              col+='<td> '+name+' </td>';
              col+='<td> '+room+' </td>';
              col+='<td> '+type_name+' </td>';
              col+='<td> '+doctor_name+' </td>';
              col+='</tr>';


           }
            $("#table_load_complete").hide();

        $("#completetbl tbody").append(col);

            initDatatable("#completetbl");







        }

        });
      }

function getQueuenoshow(){
  restartDatatable("#expiredtbl");

var data = {
       'display': "noshow"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/queuecode.php",
       data: data,
       dataType: 'JSON',
       success:  function(response){

          var len = response.length;
          var col="";

             for(var i=0; i<len; i++){

            var id = response[i].id;
            var priorityno = response[i].priorityno;
            var name = response[i].name;
            var date_sched= response[i].date_sched;
            var datetime_sched= response[i].datetime_sched;
            var type_name= response[i].type_name;
            var room= response[i].room;
            var doctor_name= response[i].doctor_name;
            var status= response[i].status;


              col+='<tr>';
              col+='<td> '+setStatus(status)+' </td>';
              col+='<td> '+checkNo(priorityno)+' </td>';
              col+='<td> '+datetime_sched+' </td>';
              col+='<td> '+name+' </td>';
              col+='<td> '+room+' </td>';
              col+='<td> '+type_name+' </td>';
              col+='<td> '+doctor_name+' </td>';
              col+='</tr>';


           }
            $("#table_load_expired").hide();

        $("#expiredtbl tbody").append(col);

            initDatatable("#expiredtbl");







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
    "order": [[ 1, "asc" ]],
    "scrollX": false
    });
  }


  $(document).on('click', '#btnSave', function () {
  var appointment_date = $("#appointment_date").val();
  var patientname = $("#patientname").val();
  var seltype = $("#seltype").val();
  var seldoctor = $("#seldoctor").val();
  var message = $("#message").val(); 
  var clinictype = $("#clinictype").val(); 
  if(appointment_date==""){
  showAlert('error','Empty Fields!','Please enter a valid appointment date');
  return;
  }
  if(patientname==""){
  showAlert('error','Empty Fields!','Please enter the patient name');
  return;
  }
  if(seltype==""  || seltype==null){
  showAlert('error','Empty Fields!','Please select type');
  return;
  }
  if(seldoctor==""  || seldoctor==null){
  showAlert('error','Empty Fields!','Please select a doctor');
  return;
  } 
  if(message==""){
  showAlert('error','Empty Fields!','Please enter a note');
  return;
  }

  var values = {
  "appointment_date": appointment_date,
  "patientname": patientname,
  "seltype": seltype,
  "seldoctor": seldoctor,
  "message": message,
  "clinictype": clinictype,
  "display": "walkin"
  }

  Swal.fire({
  title: "Are you sure you want to add this walk-in appointment?",
  text: "This will not undo your transaction",
  icon: "question",
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {

    sendappointment(values);


  }
  });


});


function sendappointment(values){
  
  
  $.ajax({
         type: "POST",
         url: "php_operation/appointmentcode.php",
         data: values,
         dataType: 'JSON',
         success:  function(response){
         alert(response);
         
           var status = response[0].status;
           var error = response[0].error;
           if(status=="success")  showAlert('success','Succes','Walk-in Appointment Added');
           if(status=="exist")  showAlert('error','Error',error);
           if(status=="error")  showAlert('error','Error',error);

         }
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
   reverseButtons: true,
  }).then((result) => {
  if (result.isConfirmed) {
      window.location = "php_operation/logout.php";


  }
  });


});
function setStatus(status){
  if(status=="")
  return '<span class="badge bg-primary">WAITING</span>';
  if(status=="ongoing")
  return '<span class="badge bg-success">ON-GOING</span>';
  if(status=="complete")
  return '<span class="badge bg-warning">COMPLETE</span>';
  if(status=="noshow")
  return '<span class="badge bg-danger">EXPIRED</span>';
else return '';
}
function checkNo(no){
if(no==0)
 return '-';
else return no;
}


$(document).on('click', '#accepbtn', function () {

  var id = $(this).data('id');

    //set as object
    var values = {
    "display": "queue",
    "status" : "ongoing",
    "id": id
    }

  dialog("question",
  "Are you sure you want to set this appointment as current?",
  "This will not undo any changes in the database",
  values,
  "ongoing" );


});
$(document).on('click', '#completedbtn', function () {

  var id = $(this).data('id');

    //set as object
    var values = {
    "display": "queue",
    "status" : "complete",
    "id": id
    }

  dialog("question",
  "Are you sure you want to set this appointment as complete?",
  "This will not undo any changes in the database",
  values,
  "complete" );


});
$(document).on('click', '#noshowbtn', function () {

  var id = $(this).data('id');

    //set as object
    var values = {
    "display": "queue",
    "status" : "noshow",
    "id": id
    }

  dialog("question",
  "Are you sure you want to set this appointment as no show?",
  "This will not undo any changes in the database",
  values,
  "noshow" );


});

function firebasecheck(type){
  showLoading('Sending updates to connected clients...');
  addNode(type);
      /*
  var database = firebase.database().ref().child("Request");
        database.on('value', function(snapshot){


        if(snapshot.exists()){
        //   alert('queue updated');
       // addNode(type);
       // return;


        //   alert("hi");

        }
        });
*/

}
function addNode(type){
/*

        var newkey = generateKey(10);
        firebase.database().ref('Request/1').set({
        id: newkey,
        });
        */
        var database = firebase.database().ref().child("Request");
      //  var newval = database.push();
       // newval.set({ 'name': 'val', 'id': '32' });

        database.push().set({ 'name': 'val', 'id': '32' }).then(() => {
        console.log('Successfully added to firebase');
        if(type=="success") showAlert('success','Appointment Completed','Priority numbers have been reordered. ');
        if(type=="removed") showAlert('success','Appointment Removed','Priority numbers have been reordered. ');
        if(type=="current")  showAlert('success','Appointment Set as Current','Priority numbers have been reordered. ');
       
        db.once('value').then((snap) => {
        console.log(snap);
        });
        });


       
        
        //  alert("added");

}
function generateKey(length) { // min and max included
         var result           = '';
         var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
         var charactersLength = characters.length;
         for ( var i = 0; i < length; i++ ) {
         result += characters.charAt(Math.floor(Math.random() *
         charactersLength));
         }
         return result;
 }

 	});

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


$("#seltype").change(function() {

var seltype = $(this).val();
console.log('seltype:'+ seltype);
  fetchdoc_type(seltype);


});

function fetchdoc_type(seltype) {

var data = {
     'type': seltype,
     'display': "doctors"
     };

$.ajax({
     type: "POST",
     url: "php_operation/referralcode.php",
     data: data,
     dataType: 'JSON',
     success:  function(response){

        var len = response.length;
        var col="";
        $('#seldoctor').empty();
    
           for(var i=0; i<len; i++){

          var doctor_id = response[i].doctor_id;
          var doctor_name = response[i].doctor_name;
          
          $('#seldoctor').append(new Option(doctor_name, doctor_id));
         


         }

      }

      });

}


</script>
 </body>
</html>
