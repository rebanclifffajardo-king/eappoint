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
.bg-custom {
    background-color: #174076;
    color: white;
}
.modal-title {
    color: white;
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
          <img src="../images/<?php echo $user->picture; ?>"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  id="userhead" href="#" class="d-block"><?php echo $user->name; ?> </a>
          <a  class="btn btn-success btn-xs mt-1 text-white"  href="settings.php"> View Profile &nbsp;   </a>
        
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
            <a href="doctors.php" class="nav-link ">
              <i class="nav-icon fa fa-stethoscope"></i>
              Doctors
            </a>
          </li>
          <li class="nav-item">
            <a href="map1.php" class="nav-link">
              <i class="nav-icon fa fa-map"></i>
              Nearby Clinics
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
            <h1 class="m-0 text-dark">My Appointments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">My Appointments</li>
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

                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal" > <i class="fas fa-plus"></i>&nbsp; Add Appointment </a>
                <br/><br/>
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
                      <!--    <th>Name</th> -->
                          <th>Room #</th>
                          <th>Type</th>
                          <th>Doctor</th>
                          <th></th>
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


      <!-- modal add -->
      <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-custom">
              <h4 class="modal-title">Add Appointment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form">


                      <div class="form-group">
                      <label for="appointment_date">Appointment Date</label>
                      <input type="date" class="form-control" id="appointment_date" placeholder="2022-01-01">

                      </div>
                      <div class="form-group">
                      <label for="patientname">Patient Name</label>
                      <input type="text" class="form-control" id="patientname" placeholder="Dela Cerna, Juan">

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
                    <label>Select Doctor</label>

                    <select  id="seldoctor" class="custom-select select2">
                        <option value=""></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea  class="form-control" id="message"  placeholder="Enter your message"></textarea>
                  </div>




              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" id="btnSave" class="btn btn-success">Send Request</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

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

<script>

//datatable
$("#appointmentbl").DataTable({
  "responsive": true,
  "autoWidth": false,
});

$('.select2').select2();



//get appointmentbl
getAppointment();
//get selection
getType_Doc();
getNotif();

function dialog(icon, title, text, values, type ){
  Swal.fire({
  title: title,
  text: text,
  icon: icon,
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {
      if(type == "approve") approveRequest(values);
      if(type == "deny") denyRequest(values);


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

              col+='<tr>';
              col+='<td> '+setStatus(status)+' </td>';
              col+='<td> '+appointment_id+' </td>';
              col+='<td> '+date_requested+' </td>';
              col+='<td> '+schedule_date+' </td>';
            //  col+='<td> '+client_name+' </td>';
              col+='<td> '+room+' </td>';
              col+='<td> '+type_name+' </td>';
              col+='<td> '+doctor_name+' </td>';
              col+='<td>'+checkStatus(appointment_id,status,schedule_date)+' </td>';


              col+='</td></tr>';


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
  if(clinictype=="" || clinictype==null){
  showAlert('error','Empty Fields!','Please select clinic ');
  return;
  }
  if(message==""){
  showAlert('error','Empty Fields!','Please enter a message');
  return;
  }

  var values = {
  "appointment_date": appointment_date,
  "patientname": patientname,
  "seltype": seltype,
  "seldoctor": seldoctor,
  "message": message,
  "clinictype": clinictype,
  "display": "request"
  }



  Swal.fire({
  title: "Are you sure you want to submit this appointment request?",
  text: "This will not undo your transaction",
  icon: "question",
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {

    sendappointment(values);


  }
  });


});



function sendappointment(data){
  $.ajax({
         type: "POST",
         url: "php_operation/appointmentcode.php",
         data: data,
         dataType: 'JSON',
         success:  function(response){
       //   alert(response);
           var status = response[0].status;
           var error = response[0].error;
           if(status=="success")  showAlert('success','Appointment Sent!','You will receive a notification once approved.');
           if(status=="exist")  showAlert('error','Error',error);
           if(status=="error")  showAlert('error','Error',error);

         }
         });

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
function checkStatus(appointment_id,status,schedule_date){
  if(status=="approved" && schedule_date==dateToday())
  return '<a class="btn btn-primary btn-sm" href="queue.php?appointment_id='+appointment_id+'"  > <i class="fas fa-eye"></i>&nbsp; Check Queue </a>';
  else return '';
}

function dateToday(){
  const today = new Date();
  const yyyy = today.getFullYear();
  let mm = today.getMonth() + 1; // Months start at 0!
  let dd = today.getDate();

  if (dd < 10) dd = '0' + dd;
  if (mm < 10) mm = '0' + mm;

  const formattedToday =  yyyy + '-' + mm + '-' + dd;

  return formattedToday;
}
function getType_Doc(){

var data = {
         'display': "selection"
         };

    $.ajax({
         type: "POST",
         url: "php_operation/appointmentcode.php",
         data: data,
         dataType: 'JSON',
         success:  function(response){

            //fetch type and doctor

           // fetchType(response.types);
         //   fetchDoctors(response.doctors);


          }

          });

}

function fetchType(types){
  jQuery.each(types, function(index, value){
      $('#seltype').append(new Option(value.type_name, value.type_id));
  });
}
function fetchDoctors(doctors){
  jQuery.each(doctors, function(index, value){
      $('#seldoctor').append(new Option(value.doctor_name, value.doctor_id));
  });
}




$("#clinictype").change(function() {

var clinictype = $(this).val();
  fetchselTypes(clinictype);


});

function fetchselTypes(clinictype) {

  var data = {
       'clinic': clinictype,
       'display': "types"
       };

  $.ajax({
       type: "POST",
       url: "../admin/php_operation/referralcode.php",
       data: data,
       dataType: 'JSON',
       success:  function(response){

          var len = response.length;
          var col="";
          $('#seltype').empty();
          $('#seldoctor').empty();
      
             for(var i=0; i<len; i++){

            var type_id = response[i].type_id;
            var type_name = response[i].type_name;
            
            $('#seltype').append(new Option(type_name, type_id));
            fetchdoc_type(type_id);



           }
          if(len>0)fetchdoc_type(response[0].type_id);


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
       url: "../admin/php_operation/referralcode.php",
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





function getNotif(){

//alert('transaction');
var data = {
       'display': "user"
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
