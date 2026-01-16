<?php

require_once("../db/databaseConnection.php");
include("php_operation/sessioncheck.php");
if(!isset($_GET['appointment_id'])) header("location: index.php");
$appointment_id = $_GET['appointment_id'];

require_once("php_operation/getqueuerecord.php");
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
#queueno{
  font-size: 150px;

}
#queuetime{
  font-size: 70px;

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
  <input type="hidden" id="date_sched" value="<?php echo $appointment->date_sched ; ?>" />
  <input type="hidden" id="datetime_sched" value="<?php echo $appointment->datetime_sched ; ?>" />
  <input type="hidden" id="consultation_start" value="<?php echo $appointment->consultation_start_or ; ?>" />
  <input type="hidden" id="priorityno" value="<?php echo $appointment->priorityno ; ?>" />
  <input type="hidden" id="consultation_time" value="<?php echo $appointment->consultation_time ; ?>" />
  <input type="hidden" id="status" value="<?php echo $appointment->status ; ?>" />
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
          <img src="../images/<?php echo $user->picture; ?>"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a  id="userhead" href="#" class="d-block"><?php echo $user->name; ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
	      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">Options</li>
            <li class="nav-item">
              <a href="index.php" class="nav-link active ">
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
          <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-success">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="../images/<?php echo $appointment->doctor_pic; ?>" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php echo $appointment->doctor_name; ?></h3>
                <h5 class="widget-user-desc"><?php echo $appointment->type_name; ?></h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Room <span class="float-right badge bg-primary"><?php echo $appointment->room; ?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Total Queue <span class="float-right badge bg-info"><?php echo $appointment->total; ?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Appointment Schedule<span class="float-right badge bg-success"><?php echo $appointment->consultation_start . " - " . $appointment->consultation_end; ?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        Estimated Consultation Hours <span class="float-right badge bg-danger"><?php echo $appointment->consultation_time . " minutes"; ?></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-md-4">


            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="m-0">Appointment ID. <strong><?php echo $appointment_id; ?> </strong></h5>
              </div>
              <div class="card-body">
                <center>
                  <h5 class="m-0">Queue No.</h5>
                <h1 id="queueno"><?php echo $appointment->priorityno; ?></h1>
                <!--
                <div class="overlay">
                  <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                  <p class="card-text"> Time Remaining: 30 minutes</p>
                </div>
              -->

              <!--  <a href="#" class="btn btn-primary">Skip Number</a> -->
              <br/>  <br/>
              </center>
              </div>
            </div>
          </div>
          <div class="col-md-4">


            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="m-0">Timer</h5>
              </div>
              <div class="card-body">
                <center>
                  <h5 class="m-0">Remaining Time</h5>
                <h1 id="queuetime">
                  <?php
                echo $appointment->status=="noshow"?"EXPIRED":"--:--:--";

                  ?></h1>
                  <h6>hh:mm:ss</h6>
                  <h5 id="queuehours">-</h5>
                  <hr/>
                <!--
                <div class="overlay">
                  <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                  <p class="card-text"> Time Remaining: 30 minutes</p>
                </div>
              -->

                <span>Time changes depending on the consultation hours per patient.</span>
              </center>
              </div>
            </div>
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



$('.select2').select2();

getNotif();

/*
var date_sched = $('#date_sched').val();
var datetime_sched = $('#datetime_sched').val();
var consultation_start = $('#consultation_start').val();
var priorityno = $('#priorityno').val();
var consultation_time = $('#consultation_time').val();
var status = $('#status').val();
*/
//startTimer(date_sched,datetime_sched,consultation_start,priorityno,consultation_time,status);
firebasecheck();


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

        if(status=="success")  showAlert('success','Appointment Set as Current','Priority numbers have been reordered. ');
        if(status=="error")  showAlert('error','Error',error);
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

      if(status=="success")  showAlert('success','Appointment Removed','Priority numbers have been reordered. ');
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

      if(status=="success")  showAlert('success','Appointment Completed','Priority numbers have been reordered. ');
      if(status=="error")  showAlert('error','Error',error);
  }

  });
}

function getQueue(){


var data = {
       'display': "client"
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

            var appointment_id = response[i].appointment_id;
            var total = response[i].total;
            var room = response[i].room;
            var consultation_time= response[i].consultation_time;
            var consultation_start= response[i].consultation_start;
            var consultation_start_or= response[i].consultation_start_or;
            var consultation_end= response[i].consultation_end;
            var consultation_end_or= response[i].consultation_end_or;
            var date_sched= response[i].date_sched;
            var datetime_sched= response[i].datetime_sched;
            var doctor_name= response[i].doctor_name;
            var type_id= response[i].type_id;
            var type_name= response[i].type_name;
            var doctor_pic= response[i].doctor_pic;
            var priorityno= response[i].priorityno;
            var status= response[i].status;
          //  alert("changing");
            if(status=="complete")setAsComplete();
            if(status=="noshow")setAsExpired();

            if(status=="" || status=="ongoing")
            startTimer(date_sched,datetime_sched,consultation_start_or,priorityno,consultation_time,status);



           }



        }

        });
      }

function setAsComplete(){
clearInterval(myInterval);
clearInterval(blink_interval);
blink_stop();
$('#queuehours').text("-");
$('#queuetime').text("COMPLETE");
$('#queueno').text("-");
}
function setAsExpired(){
clearInterval(myInterval);
clearInterval(blink_interval);
blink_stop();
$('#queuehours').text("-");
$('#queuetime').text("EXPIRED");
$('#queueno').text("-");
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
function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = pad(hours) + ':' + minutes + ' ' + ampm;
  return strTime;
}
function pad(time){
  var newtime = time<9?('0'+time):time;
  return newtime
}
function addMinutesToDate(date, minutes) {
  return new Date(new Date(date).setMinutes(date.getMinutes() + minutes));
}
var myInterval;

function myTimer(countDownDate) {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds

    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);


    // Output the result in an element with id="demo"
    document.getElementById("queuetime").innerHTML =  leftPad(hours, 2)  + ":"
    + leftPad(minutes, 2) + ":" + leftPad(seconds, 2) + "";

    // If the count down is over, write some text
    if (distance < 0) {
      clearInterval(myInterval);
      document.getElementById("queuetime").innerHTML = "YOUR TURN";
      blinktext('queuetime');
      blinktext('queueno');
    }
}

function myStop() {
  clearInterval(myInterval);
}

function startTimer(date_sched,datetime_sched,consultation_start,priorityno,consultation_time,status){
//var x;

  $('#queueno').text(priorityno);
  var addminutes = priorityno * consultation_time;
//myInterval = setInterval(myTimer, 1000);


  var final_sched = new Date(date_sched + " "+consultation_start);



//var countDownDate = new Date("Sep 17, 2022 23:37:25").getTime();
//var countDownDate = (new Date(datetime_sched).getTime() )+ (addminutes * 60 * 1000) ;
//var countDownDate = (new Date(datetime_sched).getTime() ) ;
//var countDownDate1 = (new Date(final_sched).getTime() )+ (30 * 60 * 1000) ;

var countDownDate= addMinutesToDate(final_sched,addminutes);
var timeSched =formatAMPM(countDownDate);
$('#queuehours').text(timeSched);
//clearInterval(x);
//x=null;
//document.getElementById("queuetime").innerHTML =  "-";

if(status=="noshow"){
  $('#queueno').text("-");
  return;
}

  priorityno==0?blinktext('queueno'):'';
//alert("or date: " + (countDownDate1) + " minutes: "  +addminutes );
// alert("time: " + (timeSched)  );

// Update the count down every 1 second
myStop();
myInterval = setInterval(() => {
 myTimer(countDownDate);
}, 1000);
/*
 x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds

  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);


  // Output the result in an element with id="demo"
  document.getElementById("queuetime").innerHTML =  leftPad(hours, 2)  + ":"
  + leftPad(minutes, 2) + ":" + leftPad(seconds, 2) + "";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("queuetime").innerHTML = "YOUR TURN";
    blinktext('queuetime');
    blinktext('queueno');
  }
}, 1000);

*/
}
function leftPad(number, targetLength) {
    var output = number + '';
    while (output.length < targetLength) {
        output = '0' + output;
    }
    return output;
}

var blink_interval;

function blink_start(id) {
  var ele = document.getElementById(id);
  ele.style.color = 'red';
  ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
}

function blink_stop() {
  clearInterval(myInterval);
}
function blinktext(id){
  var blink_speed = 500; // every 1000 == 1 second, adjust to suit
  blink_stop();
  blink_interval = setInterval(() => {
   blink_start(id);
  }, blink_speed);
/*
var t = setInterval(function () {
    var ele = document.getElementById(id);
    ele.style.color = 'red';
    ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
}, blink_speed);
*/
}


function firebasecheck(){

        var database = firebase.database().ref().child("Request");
        database.on('value', function(snapshot){


        if(snapshot.exists()){
        //   alert('queue updated');
            getQueue();


        //   alert("hi");

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
