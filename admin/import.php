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
           <a href="reports.php" class="nav-link active">
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
            <h1 class="m-0 text-dark">Import Old Records</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="reports.php">Reports</a></li>
              <li class="breadcrumb-item active">Import Old Records</li>
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
              <a href="importlist.php"> <h3 class="card-title">Go to List >></h3> </a>
              </div>
              <div class="card-body">
              <section id="content">
        <h2>Instruction</h2>
        <p>To successfully import an excel file (.csv), please use the correct header format and values for the file. Please see sample template for reference. </p>
        <a class="btn btn-success" href="sample_file/sample_data_doc.csv" download> Download &nbsp; <i class="fa fa-file-excel"></i> </a>
              
        <hr>
        <h2>Upload File</h2>
        <input type="file" id="files" name="files[]" multiple />
        <hr />
        <h2>FileInfo</h2>
        <div id="file-info"></div>
        <hr />
        <h2>Preview</h2>
        <textarea id="result" style="height: 250px; width:100%;" disabled></textarea>
        <button type="button" id="btnimport" class="btn btn-success"  > Import Content  &nbsp;<i class="fa fa-upload"></i></button>
               
      </section>
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
<script src="https://code.jquery.com/jquery-3.1.1.min.js"  ></script>
    <script src="dist/js/jquery.csv.js"></script>
    <script src="dist/js/helpers.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
   
<script>
 
 var importArray;
  // enable syntax highlighting
  hljs.initHighlightingOnLoad();

$(document).ready(function() {
  if(isFileAPIAvailable()) {
    $('#files').bind('change', handleDialog);
  }
});
function handleDialog(event) {
  var files = event.target.files;
  var file = files[0];

  var fileInfo = `
    <span style="font-weight:bold;">${escape(file.name)}</span><br>
    - FileType: ${file.type || 'n/a'}<br>
    - FileSize: ${file.size} bytes<br>
    - LastModified: ${file.lastModifiedDate ? file.lastModifiedDate.toLocaleDateString() : 'n/a'}
  `;
  $('#file-info').append(fileInfo);

  var reader = new FileReader();
  reader.readAsText(file);
  reader.onload = function(event){
    var csv = event.target.result;
   // var data = $.csv.toArrays(csv);
    var data = $.csv.toObjects(csv);
    importArray=data;

    $('#result').empty();
    $('#result').html(JSON.stringify(data, null, 2));
  }
}

 

$(document).on('click', '#btnimport', function () {

var importArray_= JSON.stringify(importArray);


  if(importArray_=="" || importArray_==null){
     showAlert('error','Empty Fields','Please select a file! ');
     return;
   }
    
   //alert(importArray_);
   //set as object
    var display = "import";
    var values = {
      "importArray": importArray_,
      "display": display
    }
  
   
  dialog("question",
    "Are you sure you want to import this file?",
    "This will only add new entries in the database",
    values,
    display );
    

});


function dialog(icon, title, text, values, type ){
  Swal.fire({
  title: title,
  text: text,
  icon: icon,
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {
      if(type == "import") importvalues(values);
      


  }
  });
}


function importvalues(values){
  showLoading('Uploading your files to the server . Please wait...');
  $.ajax({
    type: "POST",
    url: "php_operation/importcode.php",
    data: values,
    dataType: 'JSON',
    success: function(response){
      var status = response[0].status;
      var error = response[0].error;

      if(status=="success")  showAlert('success','Success','The file has been successfully imported!');
      if(status=="exist")  showAlert('error','Error',error);
      if(status=="error")  showAlert('error','Error',error);

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
</script>
 </body>
</html>
