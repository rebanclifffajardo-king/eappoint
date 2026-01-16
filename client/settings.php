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
<input type="hidden" id="client_id" value="<?php echo $user->client_id; ?>"/>
<input type="hidden" id="setpassword" value="<?php echo $user->password; ?>"/>
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
          <img  src="../images/<?php echo $user->picture; ?>" class="img-circle elevation-2" alt="User Image">
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
              <a href="index.php" class="nav-link ">
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
            <a href="settings.php" class="nav-link active ">
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
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
              <!-- /.col-md-12 -->
              <div class="col-md-12">
            <div class="card card-success card-outline">
            <div class="card-body box-profile">

            <ul class="nav nav-pills">
             <li class="nav-item"><a  id="nav-personal" class="nav-link  active"  href="#personal_tab" data-toggle="tab" >Personal Details </a></li>
            <li class="nav-item"><a  id="nav-password" class="nav-link "   href="#password_tab" data-toggle="tab" >Password Settings</a></li>
            <li class="nav-item"><a  id="nav-picture" class="nav-link "   href="#picture_tab" data-toggle="tab" >Profile Picture</a></li>

            </ul>

            <div class="tab-content">

        
            <div class="active tab-pane" id="personal_tab">
            <hr/>

            <div class="row">
                <div class="col-sm-6">

                   
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" readonly value="<?php echo $user->username; ?>">
                    </div>
                    <div class="form-group">
                      <label for="firstname">Firstname</label>
                      <input type="text" class="form-control" id="firstname" placeholder="John" value="<?php echo $user->firstname; ?>">
                    </div>
                    <div class="form-group">
                      <label for="lastname">Lastname</label>
                      <input type="text" class="form-control" id="lastname" placeholder="Doe" value="<?php echo $user->lastname; ?>">
                    </div>
                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" class="form-control" id="email" placeholder="johndoe@email.com" value="<?php echo $user->email; ?>">
                    </div>
                    <div class="form-group">
                      <label for="phone">Email Address</label>
                      <input type="text" class="form-control" id="phone" placeholder="09123456" value="<?php echo $user->phone; ?>">
                    </div>
                </div>
              
            </div>
              <button type="button" id="updatebtn" class="btn btn-success">Save changes</button>
            </div>

            <div class=" tab-pane" id="password_tab">
            <hr/>

            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                      <label for="oldpassword">Enter Old Password</label>
                      <input type="password" class="form-control" id="oldpassword"    >
                    </div>
                    <div class="form-group">
                      <label for="oldpassword">Enter New Password</label>
                      <input type="password" class="form-control" id="newpassword"    >
                    </div>
                    <div class="form-group">
                      <label for="oldpassword">Enter Confirm Password</label>
                      <input type="password" class="form-control" id="cnewpassword"    >
                    </div>


                </div>

            </div>
              <button type="button" id="pupdatebtn" class="btn btn-success">Save changes</button>
            </div>

            <div class="  tab-pane" id="picture_tab">
            <hr/>

            <div class="row">
                <div class="col-sm-4">
                
 
                    <br/>
                  
           <img class="img-thumbnail" id= "output"  src="../images/<?php echo $user->picture; ?>" width="260px" height="260px">
      
          <br/> <br/>
          <div class="form-group"  >
      
          <div class="custom-file" >
          <input type="file" class="custom-file-input" name="file" id="file" onchange="validateimage(this);">
          <label class="custom-file-label"  for="file">Choose File</label>
          </div>
          </div>

                </div>

            </div>
              <button type="button" id="btnSavePic" class="btn btn-success">Save changes</button>
            </div>
            </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->

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
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
 
$('.select2').select2();
bsCustomFileInput.init();
getNotif();

function validateimage(input) {;
		var validExtensions = ['jpg','png','jpeg','gif','bmp','tif']; //array of valid extensions
		var fileName = input.files[0].name;
    
    $('#output').attr('src',window.URL.createObjectURL(input.files[0]));
		 
    }
 
$(document).on('click', '#btnSavePic', function () {

  Swal.fire({
  title: "Are you sure you want to change your picture?",
  text: "Doing this will not undo any changes",
  icon: "question",
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {
    uploadDoctorImg();


  }
  });

  

});
function dialog(icon, title, text, values, type ){
  Swal.fire({
  title: title,
  text: text,
  icon: icon,
  showCancelButton: true,
  }).then((result) => {
  if (result.isConfirmed) {
      if(type == "edit_account") editProfile(values);
      if(type == "edit_password") editPassword(values);


  }
  });
}

function uploadDoctorImg(){
//alert("uploading");
var file = $('#file')[0].files[0]; 

var id = $("#client_id").val();

var fdata = new FormData();
fdata.append('file',file);
fdata.append('id',id); 
ajaxFileUpload(fdata);


}

var ajaxFileUpload = function (data) {
var xhr = new XMLHttpRequest();
xhr.open("POST", "php_operation/upload_img_user.php", true);
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


} 

function errorHandler(event) {

  showAlert('error','Error','Upload Failed');
}

function abortHandler(event) {
  
  showAlert('error','Error','Upload Aborted');
}
function editProfile(values){
   
  
$.ajax({
  type: "POST",
  url: "php_operation/settingscode.php",
  data: values,
  dataType: 'JSON',
  success: function(response){
    var status = response[0].status;
    var error = response[0].error;
  //  alert(response);
    if(status=="success")  showAlert('success','Success','Account updated');
    if(status=="exist")  showAlert('error','Error',error);
    if(status=="error")  showAlert('error','Error',error);

  }




});
}
function editPassword(values){
 // alert(values);
$.ajax({
  type: "POST",
  url: "php_operation/settingscode.php",
  data: values,
  dataType: 'JSON',
  success: function(response){
    var status = response[0].status;
    var error = response[0].error;
  //  alert(response);
    if(status=="success")  showAlert('success','Success','Password Updated');
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
  }).then((result) => {
  if (result.isConfirmed) {
      window.location = "php_operation/logout.php";


  }
  });


});

$(document).on('click', '#pupdatebtn', function () {
  var id= $("#client_id").val();
  var oldpassword= $("#oldpassword").val();
  var newpassword= $("#newpassword").val();
  var cnewpassword= $("#cnewpassword").val();
  var setpassword= $("#setpassword").val();




    if(oldpassword==""){
       showAlert('error','Empty Fields','Please enter old password! ');
       return;
     }
     if(newpassword==""){
        showAlert('error','Empty Fields','Please enter new password! ');
        return;
      }

   if(cnewpassword==""){
      showAlert('error','Empty Fields','Please enter confirmed password! ');
      return;
    }


     //set as object
   var values = {
     "id": id,
     "oldpassword": oldpassword,
     "newpassword": newpassword,
     "cnewpassword": cnewpassword,
     "setpassword": setpassword,
     "display": 'edit_password'
   }


    dialog("question",
      "Are you sure you want to update your password?",
      "This will not undo in the database",
      values,
      "edit_password" );

});

$(document).on('click', '#updatebtn', function () {
  var client_id= $("#client_id").val();
  var lastname= $("#lastname").val();
  var firstname= $("#firstname").val();
  var email= $("#email").val();
  var phone= $("#phone").val();
  

    if(firstname==""){
       showAlert('error','Empty Fields','Please select enter your firstname ! ');
       return;
     }
    if(lastname==""){
       showAlert('error','Empty Fields','Please select enter your lastname ! ');
       return;
     }
    if(email==""){
       showAlert('error','Empty Fields','Please select enter your email address ! ');
       return;
     }
    if(phone==""){
       showAlert('error','Empty Fields','Please select enter your phone number ! ');
       return;
     }
      


     //set as object
   var values = {
     "client_id": client_id,
     "lastname": lastname,
     "firstname": firstname,
     "email": email,
     "phone": phone,
     "display": 'edit_account'
   }


    dialog("question",
      "Are you sure you want to update this account?",
      "This will not undo in the database",
      values,
      "edit_account" );

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
