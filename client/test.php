<?php

require_once("../db/databaseConnection.php");
//include("php_operation/sessioncheck.php");
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
<body class="container">
      <h5>Name: <span id="name"> </span> </h5>
      <h5>ID: <span id="id"> </span> </h5>
      <div id="values"> Values: </div>

      <button type="button" id="btnAdd" class="btn btn-primary btn-sm"> ADD </button>
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
	<script type="text/javascript">
	$(function() {

    var database = firebase.database().ref().child("Request");
       database.on('value', function(snapshot){
          alert('exist');

           if(snapshot.exists()){

               snapshot.forEach(function(data){


           				var val = data.val();
           				var id =val.id;
           				var name =val.name;
           				var key= data.key;

                  $('#name').text(name);
                  $('#id').text(id);




               });

           }else{


           }
       });

        function addNode(){
          var database = firebase.database().ref().child("Request");
          var newval = database.push();
          newval.set({ 'name': 'fred', 'id': '32' });


        }
$(document).on('click', '#btnAdd', function () {
  addNode();
  	});

	});



	</script>
  
 </body>
</html>
