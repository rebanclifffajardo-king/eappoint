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
  .custom-map-control-button {
    display: inline-block;
    font-weight: 400;
    position: absolute;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    top: 0px;
    left: 357px;
    color: #fff;
    user-select: none;
    background-color: #174076;
    border-color: #174076;
    box-shadow: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
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
   <script>
  /*This is script*/ 


function myMap() {
  
  var arrayVal = new Array();
  var lastLang= new google.maps.LatLng(8.052977, 126.214967);
/*
  arrayVal.push({lat: 7.420880, lng: 125.832795});
  arrayVal.push( {lat: 7.422604, lng: 125.831111});
  arrayVal.push( {lat: 7.423814, lng: 125.830030});
  arrayVal.push({lat: 7.424262, lng: 125.830589});
  */

  var myLatLng = new google.maps.LatLng(8.0481027, 126.0575728);
			var map = new google.maps.Map(document.getElementById('googleMap'), {
			zoom: 16,
			center: lastLang,
			mapTypeId: 'terrain'
			});
         
        var infoWindow1 = new google.maps.InfoWindow();
        infoWindow1.setPosition(myLatLng);
        infoWindow1.setContent("Your current Location.");
        infoWindow1.open(map);
        
        map.setCenter(myLatLng);
        var marker = new google.maps.Marker({
        icon: {
        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
        strokeColor: "red",
        scale: 3
        },
        position: myLatLng,
        map: map,
        title: 'Position'
        });
        marker.setMap(map);
            google.maps.event.addListener(marker, 'click', function () {
            infoWindow1.open(map, marker);
            });

        getClinic(map,myLatLng);
      /*
			 var marker = new google.maps.Marker({
          position: lastLang,
          map: map,
          title: 'Destination'
        });
		marker.setMap(map);
		/*
		
		  var flightPlanCoordinates = arrayVal;
		 //  window.alert(flightPlanCoordinates);
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#0000FF',
          strokeOpacity: 1.0,
          strokeWeight: 10
        });

        flightPath.setMap(map);
        */


let infoWindow;
infoWindow = new google.maps.InfoWindow();

const locationButton = document.createElement("button");

locationButton.textContent = "Pan to Current Location";
locationButton.classList.add("custom-map-control-button");
map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
locationButton.addEventListener("click", () => {
  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };

        console.log(pos);

        infoWindow.setPosition(pos);
        infoWindow.setContent("Your current Location.");
        infoWindow.open(map);
        
        map.setCenter(pos);
        var marker = new google.maps.Marker({
        icon: {
        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
        strokeColor: "red",
        scale: 3
        },
        position: pos,
        map: map,
        title: 'Position'
        });
        marker.setMap(map);
            google.maps.event.addListener(marker, 'click', function () {
            infoWindow.open(map, marker);
            });

        getClinic(map,pos);

      },
      () => {
        handleLocationError(true, infoWindow, map.getCenter());
      }
    );
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
});
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
infoWindow.setPosition(pos);
infoWindow.setContent(
  browserHasGeolocation
    ? "Error: The Geolocation service failed."
    : "Error: Your browser doesn't support geolocation."
);
infoWindow.open(map);
}
 function getClinic(map,pos){
  console.log('requesting nearby clinics');
  var request = {
    location: pos,
    radius: '1000',
    keyword: 'clinic',
    //type: ['restaurant']
  };

  service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);

  function setMarker(pos, map){
  var marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: 'Hospital'
        });
        marker.setMap(map);
}

  function callback(results, status) {
    


  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      //createMarker(results[i]);
      var bounds = new google.maps.LatLngBounds();
      for (var i = 0; i < results.length; i++) {
        var x = pos;
        var y = results[i].geometry.location;
      //  document.getElementById("distance").innerHTML += "[" + i + "]  name:" + results[i].name + ", distance=" + (google.maps.geometry.spherical.computeDistanceBetween(x, y) / 1000).toFixed(2) + " km<br>";
        console.log(y);
        var marker = new google.maps.Marker({
          position: results[i].geometry.location,
          map: map,
          title: results[i].name
        });
        var distance = checkDistancenum((google.maps.geometry.spherical.computeDistanceBetween(x, y) / 1000).toFixed(2));

        const contentString =
        '<div id="content">' +
      //  '<h1 id="firstHeading" class="firstHeading">'+results[i].name+'</h1>' +
        '<div id="bodyContent">' +
        '<img src="../images/doctor.png" width=30px height=30px class="img-circle" /> '+
        '<b> '+results[i].name+' </b><br/>'+
        '<span style="float: right;">DISTANCE: <b>'+ distance + '</b></span> <br/><br/>'+
        '<a style="float: right;" target="_blank" href="https://www.google.com/maps/search/'+results[i].name+'"> View on Google Maps </a>'+

        "</div>";
        /*
        const infowindow = new google.maps.InfoWindow({
        content: contentString,
        ariaLabel: "Title",
        });
        */
        addInfoWindow(marker, contentString);
/*
        marker.addListener("click", () => {

       
          let infowindow = new google.maps.InfoWindow();
        infowindow.setContent(contentString);
        infowindow.setPosition(y);
        infowindow.open(map,y);
       
          /*
        infowindow.open({
        anchor: marker,
        map,
        });
        
        });
        */
        bounds.extend(marker.getPosition());
      }
      map.fitBounds(bounds);
    }
  }

 }

}
function checkDistancenum(distance){
  if(distance<1){
    return (distance*1000)+ "m";
  }else{
    return (distance)+ "km";
  }
}
function addInfoWindow(marker, message,map) {

var infoWindow = new google.maps.InfoWindow({
    content: message
});

google.maps.event.addListener(marker, 'click', function () {
    infoWindow.open(map, marker);
});
}


 

 
/*
 function initialize() {
  var resultsMap = new google.maps.Map(
    document.getElementById("map_canvas"), {
      center: new google.maps.LatLng(37.4419, -122.1419),
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
  ////function,google.maps.geometry.spherical.computeDistanceBetween (x,y) is what i am using to do that ,so how to insert the request.location value as x
  var x = new google.maps.LatLng(52.395715, 4.888916);
  var requestLocation = new google.maps.Marker({
    position: x,
    map: resultsMap,
    title: "request position",
    icon: "http://maps.google.com/mapfiles/ms/micons/blue.png"
  });
  var request = {
    location: x,
    radius: '500',
    query: 'restaurant'
  };
  var service = new google.maps.places.PlacesService(resultsMap);
  service.textSearch(request, callback);

  function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      var bounds = new google.maps.LatLngBounds();
      for (var i = 0; i < results.length; i++) {
        var y = results[i].geometry.location;
        document.getElementById("distance").innerHTML += "[" + i + "]  name:" + results[i].name + ", distance=" + (google.maps.geometry.spherical.computeDistanceBetween(x, y) / 1000).toFixed(2) + " km<br>";
        console.log(y);
        var marker = new google.maps.Marker({
          position: results[i].geometry.location,
          map: resultsMap,
          title: results[i].name
        });
        bounds.extend(marker.getPosition());
      }
      resultsMap.fitBounds(bounds);
    }

  }
}
google.maps.event.addDomListener(window, "load", initialize);

*/
 </script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBtmv62_ey0rShFsFwFgPShTeDq0Ypoe8&libraries=places,geometry&callback=myMap"></script>
 

 
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
            <a href="map1.php" class="nav-link active">
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
            <h1 class="m-0 text-dark">List of Nearby Clinics</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">List of Nearby Clinics</li>
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
           
              <div id="googleMap" style="width:100%;height:500px;"></div>
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
 getNotif();
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
