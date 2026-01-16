 
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
           height="40px" width="120px" >
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

               
              <a class="btn btn-success" href="#" id="sendbtn"> <i class="fas fa-send"></i>&nbsp; SEND SMS </a>
                <br/><br/>
               

                   

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

<script>

//datatable
$("#appointmentbl").DataTable({
  "responsive": true,
  "autoWidth": false,
});

$('.select2').select2();



//get appointmentbl
getAppointment();


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
              col+='<button type="button" class="btn btn-primary btn-sm"';
              col+=' data-appointment_id="'+appointment_id+'" ';
              col+=' data-client_id="'+client_id+'" ';
              col+=' data-client_name="'+client_name+'" ';
              col+=' data-doctor_id="'+doctor_id+'" ';
              col+=' data-doctor_name="'+doctor_name+'" ';
              col+=' data-type_name="'+type_name+'" ';
              col+=' data-room="'+room+'" ';
              col+=' data-schedule_date="'+schedule_date+'" ';
              col+=' data-message="'+message+'" ';
              col+=' id="view_button" >View Details  <i class="fa fa-eye"></i> </button>';
              col+='</div></div>';
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
  //alert(id);
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
$(document).on('click', '#sendbtn', function () {
    alert("sending");
  /*
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "https://api.semaphore.co/api/v4/messages");
        xhr.setRequestHeader("Accept", "application/json");
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
        console.log(xhr.status);
        console.log(xhr.responseText);
        }};

        let data = {
        "apikey": "4d3ec21e1b6dba8191501aa5b300547e",
        "number": "09554827928",
        "message": "hello this is reban cliff"
        };

        xhr.send(data);
*/
/*
        const response = await fetch("https://api.semaphore.co/api/v4/messages", {
        method: 'POST',
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        body: {
        "apikey": "4d3ec21e1b6dba8191501aa5b300547e",
        "number": "09554827928",
        "message": "hello this is reban cliff"
        },
        });

        response.json().then(data => {
        console.log(data);
        alert(data);
        });
        */
/*
        $.ajax({
        type: "POST",
        url: "https://api.semaphore.co/api/v4/messages",
        data: {
            "apikey": "4d3ec21e1b6dba8191501aa5b300547e",
            "number": "09554827928",
            "message": "SMS notification from e-appoint app."
        },
        success: function (result) {
        console.log(result);
        alert(data);
        },
        dataType: "json"
        });

        */

        $.ajax({
        type: "POST",
        url: "curl/curlpost.php",
        data: {
          "display": "sms"
        },
        dataType: 'JSON',
        success: function(response){
        var status = response[0].status;
        var error = response[0].error;
        alert(status);
        if(status=="Pending")  showAlert('success','Success','SMS Sent!');
         else showAlert('error','Error',error);

        }

        });

        

});


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
</script>
 </body>
</html>
