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
            <h1 class="m-0 text-dark">Reports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
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
              <div class="row">
                 
                  <div class="col-md-6 offset-md-6"> 
                  <a class="btn btn-success float-right" href="import.php"   >Import File &nbsp;  <i class="fas fa-upload"></i></a>
                  <br/><br/>   
                  </div> 
                </div>
              <div class="row">
 
              <div class="col-md-12">

          <div class="card">
          <div class="card-header">
          <h3 class="card-title">Total Number of Consultations per <span id="tot_filterbylabel">Month as of <?php echo date('Y'); ?> </span></h3>

          </div>
          <div class="card-body">
          <div class="d-flex">
                  <p class="d-flex flex-column">
                    <div class="form-group">
                    <label>Filter By:</label>
                  <select id="tot_filterby">
                    <option value="">none</option>
                    <option value="Year">Year</option>
                    <option value="Month">Month</option> 
                    <option value="Quarter">Quarter</option>
                  </select>
                </div>
                <div id="totfilterby_spec">

                </div>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-bold text-lg" id="sumCons">-</span>
                    <span class="text-muted">Total Consultations</span>
                  </p>
                </div>
          <div class="chart">
          <canvas id="lineChart_tot" style="min-height: 450px; height: 450; max-height: 450px; max-width: 100%;"></canvas>
          </div>
          </div>
          <!-- /.card-body -->
          </div>
          <!-- /.card -->



          </div>
            <div class="col-md-12">

 


                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Average Consultation (in minutes) per Type</h3>

                        </div>
                        <div class="card-body">
                          <div class="chart">
                            <canvas id="totevaldeptchart" style="min-height: 450px; height: 450; max-height: 450px; max-width: 100%;"></canvas>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->



                      </div>

                      <div class="col-md-12">

 


                        <div class="card">
                          <div class="card-header">
                          <h3 class="card-title">Average Consultation (in minutes) per <span id="avg_filterbylabel">Month as of <?php echo date('Y'); ?> </span></h3>

                                  </div>
                                  <div class="card-body">
                                  <div class="d-flex">
                          <p class="d-flex flex-column">
                            <div class="form-group">
                            <label>Filter By:</label>
                          <select id="avg_filterby">
                            <option value="">none</option>
                            <option value="Year">Year</option>
                            <option value="Month">Month</option> 
                            <option value="Quarter">Quarter</option>
                          </select>
                        </div>
                        <div id="avgfilterby_spec">

                        </div>
                          </p>
                          <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-bold text-lg" id="avgCons">-</span>
                            <span class="text-muted">Average Consultation Time</span>
                          </p>
                        </div>
                                <div class="chart">
                                <canvas id="lineChart" style="min-height: 450px; height: 450; max-height: 450px; max-width: 100%;"></canvas>
                                </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->



                        </div>  
                        
                      

              <div class="col-md-12">


              <div class="card">
              <div class="card-header">
              <h3 class="card-title">Total Number of Consultations  per Type</h3>
              </div>
              <div class="card-body">
             
              <div class="chart">
              <canvas id="totconschart" style="min-height: 450px; height: 450; max-height: 450px; max-width: 100%;"></canvas>
              </div>
              </div>
              <!-- /.card-body -->
              </div>
              <!-- /.card -->



              </div>
          
                </div>
               
               
                     

                   

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
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
<!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot-old/jquery.flot.resize.min.js"></script>
<script>

getTotEvalDepResult();
getTotCountResult();

getOvEvalRating();
 
$("#tot_filterby").change(function() {
//tot_filterbylabel
var selected = $(this).val();

if(selected=="Year"){
  $("#tot_filterbylabel").text(selected);
  $("#totfilterby_spec").html("");
  getTotCountResultYear();
  return;
}

if(selected=="Month"){
  displayFilterMonth("Month");
 
 
}
 
if(selected=="Quarter"){
  displayFilterMonth("Quarter");
}
else{
  $("#totfilterby_spec").html("");
  getTotCountResult();
}
 
});


$("#avg_filterby").change(function() {
//avg_filterbylabel
var selected = $(this).val();

if(selected=="Year"){
  $("#avg_filterbylabel").text(selected);
  $("#avgfilterby_spec").html("");

  getAvgCountResultYear("Year");
  return;
}
if(selected=="Month"){
  $("#avg_filterbylabel").text(selected);
  displayFilterMonthAvg("Month");
  
  return;
 
}
if(selected=="Quarter"){
  $("#avg_filterbylabel").text(selected);
  displayFilterMonthAvg("Quarter");
}

else{
  $("#avgfilterby_spec").html("");
  getOvEvalRating();
}
});

function displayFilterMonthAvg(filtertype){
  var setID="";
  if(filtertype=="Month") setID= "avgfilterby_spec_yr";
  if(filtertype=="Quarter") setID= "avgfilterby_spec_yr";


 
  

  var value = {
       'year': filtertype,
       'display': "year"
       };

       var col="";

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var month_arr = new Array();
        var tot_arr = new Array();
        var len = response.length;
          col="<select id='"+setID+"' >";
                 for(var i=0; i<len; i++){
                  var year = response[i].year;
                  col+='<option value="' + year + '" data-yrlbl="'+filtertype+'" >' + year + '</option>';
                  
              }
               // alert(col);
                $("#avgfilterby_spec").html(col);
               
 

      }
        });
 
  return col;


}

$(document).on('change', '#avgfilterby_spec_yr', function () {

//tot_filterbylabel
var selected = $(this).val();
var type = $(this).find(':selected').data('yrlbl');

if(type=="Month"){ 
  $("#avg_filterbylabel").text(type+' as of '+selected);
  getAvgCountResultMonth("Month",selected);
  return;
  
}
if(type=="Quarter"){ 
  $("#avg_filterbylabel").text(type+' as of '+selected);
  getAvgCountResultQuarter(selected);
  return;
}
  

 
});

$(document).on('change', '#totfilterby_spec_yr', function () {

//tot_filterbylabel
var selected = $(this).val();
var type = $(this).find(':selected').data('yrlbl');

if(type=="Month"){ 
  $("#tot_filterbylabel").text(type+' as of '+selected);
  getTotCountResultMonth(selected);
  return;
  
}
if(type=="Quarter"){ 
  $("#tot_filterbylabel").text(type+' as of '+selected);
  getTotCountResultQuarter(selected);
  return;
}
  

 
});


/*
$("#totfilterby_spec_yr").change(function() {

});
*/

function displayFilterMonth(filtertype){
  var setID="";
  if(filtertype=="Month") setID= "totfilterby_spec_yr";
  if(filtertype=="Quarter") setID= "totfilterby_spec_yr";


 
  

  var value = {
       'year': filtertype,
       'display': "year"
       };

       var col="";

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var month_arr = new Array();
        var tot_arr = new Array();
        var len = response.length;
          col="<select id='"+setID+"' >";
                 for(var i=0; i<len; i++){
                  var year = response[i].year;
                  col+='<option value="' + year + '" data-yrlbl="'+filtertype+'" >' + year + '</option>';
                  
              }
               // alert(col);
                $("#totfilterby_spec").html(col);
               
 

      }
        });
 
  return col;


}

function getTotCountResultQuarter(year){

  var value = {
       'year': year,
       'display': "line1_quarterly"
       };

      

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var quarter_arr = new Array();
        var tot_arr = new Array();
        var len = response.length;
        var col="";
                 for(var i=0; i<len-1; i++){
                  var quarter = "QTR "+ response[i].quarter;
                  var tot = response[i].tot;
               
                  quarter_arr.push(quarter);
                  tot_arr.push(parseInt(tot));
                  
              }

              var maxCons= response[len-1].maxCons; 
              

     //   alert("quarter_arr: " + quarter_arr + "\n total: " + tot_arr + "\n maxCons: " + maxCons);
        maxCons = parseInt(maxCons)+2;
        
        

        initLineChart_count(quarter_arr,tot_arr,maxCons,"Quarter");
       
    
 
    var sum = (tot_arr).reduce(add, 0);
    $("#sumCons").text(sum);

      }
        });

}

function getTotCountResultMonth(year){

  var value = {
       'year': year,
       'display': "line1_monthly"
       };

      

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var month_arr = new Array();
        var tot_arr = new Array();
        var len = response.length;
        var col="";
                 for(var i=0; i<len; i++){
                  var month_name = response[i].month_name;
                  var tot = response[i].tot;
               
                  month_arr.push(month_name);
                  tot_arr.push(parseInt(tot));
                  
              }

              var maxCons= response[len-1].maxCons; 
              

     //   alert("month_arr: " + month_arr + "\n total: " + tot_arr + "\n maxCons: " + maxCons);
        maxCons = parseInt(maxCons)+2;

        initLineChart_count(month_arr,tot_arr,maxCons,"Month");
       
    

    tot_arr.pop();
    var sum = (tot_arr).reduce(add, 0);
    $("#sumCons").text(sum);

      }
        });

}

function getAvgCountResultQuarter(year){
   
  display="line1_quarterly_avg";
    var value = {
       'year': year,
       'display': display
       };
  

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var qtr_arr = new Array();
        var avg_arr = new Array();
        var len = response.length;
        var col="";
                 for(var i=0; i<len; i++){
                  var quarter = "QTR "+response[i].quarter;
                  var average = response[i].average;
               
                  qtr_arr.push(quarter);
                  avg_arr.push(parseFloat(average));
                 
              }
             
              var maxCons= response[len-1].maxCons; 
             // alert("month_arr: " + month_arr + "\n avg_arr: " + avg_arr + "\n maxCons: " + maxCons );

        qtr_arr.pop();
        avg_arr.pop();
        maxCons = parseFloat(maxCons)+20;
        initLineChart(qtr_arr,avg_arr,maxCons,"Quarter");

      
      var avg_tot = ((avg_arr).reduce(add, 0))/avg_arr.length;
       avg_tot = parseFloat(avg_tot).toFixed(2);
      $("#avgCons").text(avg_tot);
   

    

      }
        });



}

function getAvgCountResultMonth(displaytype,year){
  //alert("displaytype:"+displaytype+"\n year"+year);
  display="line1_monthly_avg";
    var value = {
       'year': year,
       'display': display
       };
  

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var month_arr = new Array();
        var avg_arr = new Array();
        var len = response.length;
        var col="";
                 for(var i=0; i<len; i++){
                  var month_name = response[i].month_name;
                  var average = response[i].average;
               
                  month_arr.push(month_name);
                  avg_arr.push(parseFloat(average));
                 
              }
             
              var maxCons= response[len-1].maxCons; 
             // alert("month_arr: " + month_arr + "\n avg_arr: " + avg_arr + "\n maxCons: " + maxCons );

       
        maxCons = parseFloat(maxCons)+2;
        initLineChart(month_arr,avg_arr,maxCons,"Month");

        avg_arr.pop();
      var avg_tot = ((avg_arr).reduce(add, 0))/avg_arr.length;
       avg_tot = parseFloat(avg_tot).toFixed(2);
      $("#avgCons").text(avg_tot);
   

    

      }
        });



}
function getAvgCountResultYear(displaytype){
   
  display="line1_yearly_avg";
    var value = {
       'display': display
       };
  
  

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var year_arr = new Array();
        var avg_arr = new Array();
        var len = response.length;
        var col="";
                 for(var i=0; i<len; i++){
                  var year = response[i].year;
                  var average = response[i].average;
               
                  year_arr.push(year);
                  avg_arr.push(parseFloat(average));
                 
              }
             
              var maxCons= response[len-1].maxCons; 
           //   alert("year_arr: " + year_arr + "\n avg_arr: " + avg_arr + "\n maxCons: " + maxCons );

       
        maxCons = parseFloat(maxCons)+2;
        initLineChart(year_arr,avg_arr,maxCons,"Year");

        avg_arr.pop();
      var avg_tot = ((avg_arr).reduce(add, 0))/avg_arr.length;
       avg_tot = parseFloat(avg_tot).toFixed(2);
      $("#avgCons").text(avg_tot);
   

    

      }
        });



}

function getTotCountResultYear(){

  var value = {
       'display': "line1_yearly"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var year_arr = new Array();
        var tot_arr = new Array();
        var len = response.length;
        var col="";
                 for(var i=0; i<len; i++){
                  var year = response[i].year;
                  var tot = response[i].tot;
               
                  year_arr.push(year);
                   tot_arr.push(parseInt(tot));
                  
              }
             
              var maxCons= response[len-1].maxCons; 
             

       // alert("year_arr: " + year_arr + "\n total: " + tot_arr + "\n maxCons: " + maxCons);
        maxCons = parseInt(maxCons)+2;

    initLineChart_count(year_arr,tot_arr,maxCons,"Year");

    tot_arr.pop();
    var sum = (tot_arr).reduce(add, 0);
    $("#sumCons").text(sum);

      }
        });



}

function add(accumulator, a) {
  return parseInt(accumulator) + a;
}
  //lineChart_tot
function getTotCountResult(){
//totconschart

var value = {
       'display': "line1"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var month_arr = new Array();
        var tot_arr = new Array();
        var len = response.length;
        var col="";
                 for(var i=0; i<len; i++){
                  var month_name = response[i].month_name;
                  var tot = response[i].tot;
               
                  month_arr.push(month_name);
                  tot_arr.push(parseInt(tot));
                  
              }
              var maxCons= response[len-1].maxCons; 

     //   alert("month_arr: " + month_arr + "\n total: " + tot_arr + "\n maxCons: " + maxCons);
        maxCons = parseInt(maxCons)+2;

    initLineChart_count(month_arr,tot_arr,maxCons,"Month");
    tot_arr.pop();
    var sum = (tot_arr).reduce(add, 0);
    $("#sumCons").text(sum);

      }
        });



//-------------
//- BAR CHART -
//-------------

var value = {
           'display': "bar2"
           };

      $.ajax({
           type: "POST",
           url: "php_operation/reportscode.php",
           data: value,
           dataType: 'JSON',
           success:  function(response){
             var type_arr = new Array();
             var tot_arr = new Array();
            
              var len = response.length;
              var col="";
                 for(var i=0; i<len; i++){
                  var type_name = response[i].type_name;
                  var tot = response[i].tot;
               
                  type_arr.push(type_name);
                  tot_arr.push(tot);
                  
              }
              var maxCons= response[len-1].maxCons; 

            //   alert("type: " + type_arr + "\n total: " + tot_arr + "\n maxCons: " + maxCons);
               maxCons = parseInt(maxCons)+2;

            initBarChartCountCons(type_arr,tot_arr,maxCons);
            
          }
            });

}
function getOvEvalRating(){


var value = {
       'display': "line"
       };

  $.ajax({
       type: "POST",
       url: "php_operation/reportscode.php",
       data: value,
       dataType: 'JSON',
       success:  function(response){
        var month_arr = new Array();
        var avg_arr = new Array();
        var len = response.length;
        var col="";
                 for(var i=0; i<len; i++){
                  var month_name = response[i].month_name;
                  var average = response[i].average;
               
                  month_arr.push(month_name);
                  avg_arr.push(parseFloat(average));
                  
              }
              var maxCons= response[len-1].maxCons; 
          maxCons = parseInt(maxCons)+2;
    // alert("month_arr: " + month_arr + "\n avg_arr: " + avg_arr);
    

      initLineChart(month_arr,avg_arr,maxCons,"Month");

      avg_arr.pop();
      var avg_tot = ((avg_arr).reduce(add, 0))/avg_arr.length;
       avg_tot = parseFloat(avg_tot).toFixed(2);
      $("#avgCons").text(avg_tot);
   
      }
        });




}

function   initLineChart_count(month_arr,tot_arr,maxCons,xlabel){

var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
var lineChartDataVal = {
  labels  : month_arr,
  datasets: [
    {
      label               : 'Total Number of Consultation',
      backgroundColor     : 'rgba(165,196,34,0.9)',
      borderColor         : 'rgba(165,196,34,0.9)',
      pointRadius         : 5,
      pointStyle          : 'circle',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(165,196,34,0.9)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(165,196,34,0.9)',
      data                : tot_arr
    }
  ]
}

var lineChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
         display: true,
         position: 'bottom'
       },
  scales: {
    xAxes: [{
      gridLines : {
        display : true,
      },
      scaleLabel: {
        display: true,
        labelString: xlabel
      }
    }],
    yAxes: [{
      display: true,
      ticks: {
          min: 0, // minimum value
          max:maxCons // maximum value
      },
      gridLines : {
        display : true,
      },
      scaleLabel: {
        display: true,
        labelString: 'Total Consultation'
      }
    }]
  },
  animation: linechartanimation(),
  tooltips: linecharttooltip()
}


//-------------
//- LINE CHART -
//--------------
var lineChartCanvas = $('#lineChart_tot').get(0).getContext('2d')
var lineChartOptions = jQuery.extend(true, {}, lineChartOptions)
var lineChartData = jQuery.extend(true, {}, lineChartDataVal)
lineChartData.datasets[0].fill = false;
lineChartOptions.datasetFill = false

var lineChart = new Chart(lineChartCanvas, {
  type: 'line',
  data: lineChartData,
  options: lineChartOptions
});
}

function   initLineChart(month_arr,average_arr,maxCons,ylabel){

var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
var lineChartDataVal = {
  labels  : month_arr,
  datasets: [
    {
      label               : 'Average Consultation (in minutes)',
      backgroundColor     : 'rgba(165,196,34,0.9)',
      borderColor         : 'rgba(165,196,34,0.9)',
      pointRadius         : 5,
      pointStyle          : 'circle',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(165,196,34,0.9)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(165,196,34,0.9)',
      data                : average_arr
    }
  ]
}

var lineChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
         display: true,
         position: 'bottom'
       },
  scales: {
    xAxes: [{
      gridLines : {
        display : true,
      },
      scaleLabel: {
        display: true,
        labelString: ylabel
      }
    }],
    yAxes: [{
      display: true,
      ticks: {
          min: 0, // minimum value
          max: parseInt(maxCons) // maximum value
      },
      gridLines : {
        display : true,
      },
      scaleLabel: {
        display: true,
        labelString: 'Average Consultation Time (minutes)'
      }
    }]
  },
  animation: linechartanimation(),
  tooltips: linecharttooltip()
}


//-------------
//- LINE CHART -
//--------------
var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
var lineChartOptions = jQuery.extend(true, {}, lineChartOptions)
var lineChartData = jQuery.extend(true, {}, lineChartDataVal)
lineChartData.datasets[0].fill = false;
lineChartOptions.datasetFill = false

var lineChart = new Chart(lineChartCanvas, {
  type: 'line',
  data: lineChartData,
  options: lineChartOptions
});
}

function linechartanimation(){
      const animation = {
            onComplete: function() {
              const chartInstance = this.chart,
                ctx = chartInstance.ctx;

              ctx.font = Chart.helpers.fontString(
                14,
                Chart.defaults.global.defaultFontStyle,
                Chart.defaults.global.defaultFontFamily
              );
              ctx.textAlign = "center";
              ctx.textBaseline = "bottom";

              this.data.datasets.forEach(function(dataset, i) {
                const meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function(bar, index) {
                  const data = dataset.data[index];
                  ctx.fillStyle = "#6c757d";
                  ctx.fillText(data, bar._model.x, bar._model.y - 2);
                });
              });
            }
          };

        return animation;
    }
    function linecharttooltip(){
    const tooltips = {
               enabled: true
             };
      return tooltips;
    }

function getTotEvalDepResult(){

//totevaldeptchart
//-------------
//- BAR CHART -
//-------------

    var value = {
           'display': "bar1"
           };

      $.ajax({
           type: "POST",
           url: "php_operation/reportscode.php",
           data: value,
           dataType: 'JSON',
           success:  function(response){
             var type_arr = new Array();
             var average_arr = new Array();
            
              var len = response.length;
              var col="";
                 for(var i=0; i<len; i++){
                  var type_name = response[i].type_name;
                  var average = response[i].average;
               
                  type_arr.push(type_name);
                  average_arr.push(average);
                  
              }

             //   alert("type: " + type_arr + "\n average: " + average_arr );


            initBarChartCount(type_arr,average_arr);
          }
            });


}


function initBarChartCountCons(type_arr,tot_arr,maxCons){

var areaChartData = {
  labels  : type_arr,
  datasets: [
    {
      label               : 'Total Number of Consultation',
      backgroundColor     : 'rgba(165,196,34,0.9)',
      borderColor         : 'rgba(165,196,34,0.8)',
      pointRadius         : 5,
      pointStyle          : 'circle',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : tot_arr
    }
  ]
}

var areaChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
    display: true
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : false,
      },
    }],
    yAxes: [{
      gridLines : {
        display : false,
      }
    }]
  }

}
//totconschart
var barChartCanvas = $('#totconschart').get(0).getContext('2d')
var barChartData = jQuery.extend(true, {}, areaChartData)
var temp0 = areaChartData.datasets[0]
barChartData.datasets[0] = temp0

var barChartOptions = {
  legend: {
         display: true,
         position: 'bottom'
       },
  responsive              : true,
  maintainAspectRatio     : false,
  datasetFill             : false,
  plugins:{
    labels:{
      render: 'value'
    }
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : true,
      },
      scaleLabel: {
        display: true,
        labelString: 'Type'
      }
    }],

    yAxes: [{
      display: true,
      ticks: {
          min: 0, // minimum value
          max: parseInt(maxCons)// maximum value
      },
      gridLines : {
        display : true,
      },
      scaleLabel: {
        display: true,
        labelString: 'Total Consultation'
      }
    }]
  }
}

var barChart = new Chart(barChartCanvas, {
  type: 'bar',
  data: barChartData,
  options: barChartOptions
})


}


function initBarChartCount(type_arr,average_arr){

var areaChartData = {
  labels  : type_arr,
  datasets: [
    {
      label               : 'Average Consultation per Type',
      backgroundColor     : 'rgba(165,196,34,0.9)',
      borderColor         : 'rgba(165,196,34,0.8)',
      pointRadius         : 5,
      pointStyle          : 'circle',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : average_arr
    }
  ]
}

var areaChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
    display: true
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : false,
      },
    }],
    yAxes: [{
      gridLines : {
        display : false,
      }
    }]
  }

}
//evaldeptchart
var barChartCanvas = $('#totevaldeptchart').get(0).getContext('2d')
var barChartData = jQuery.extend(true, {}, areaChartData)
var temp0 = areaChartData.datasets[0]
barChartData.datasets[0] = temp0

var barChartOptions = {
  legend: {
         display: true,
         position: 'bottom'
       },
  responsive              : true,
  maintainAspectRatio     : false,
  datasetFill             : false,
  plugins:{
    labels:{
      render: 'value'
    }
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : true,
      },
      scaleLabel: {
        display: true,
        labelString: 'Type'
      }
    }],

    yAxes: [{
      display: true,
      ticks: {
          min: 0, // minimum value
          max: 60 // maximum value
      },
      gridLines : {
        display : true,
      },
      scaleLabel: {
        display: true,
        labelString: 'Average Consultation Time (minutes)'
      }
    }]
  }
}

var barChart = new Chart(barChartCanvas, {
  type: 'bar',
  data: barChartData,
  options: barChartOptions
})


}

 

$('.select2').select2();



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
$(document).on('click', '#view_button', function () {
  
 // $('#doctor_id').val(doctor_id);
 
    var appointment_id= $(this).data('appointment_id');
    var client_id= $(this).data('client_id');
    var client_name= $(this).data('client_name');
    var doctor_id= $(this).data('doctor_id');
    var doctor_name= $(this).data('doctor_name');
    var type_name= $(this).data('type_name');
    var room= $(this).data('room');
    var schedule_date= $(this).data('schedule_date');
    var message= $(this).data('message');
 
   //alert(appointment_id);

    $('#doctor_id').val(doctor_id);
    $('#client_id').val(client_id);
    $('#doctor_id').val(doctor_id);
    $('#client_name').text(client_name);
    $('#doctor_name').text(doctor_name);
    $('#type_name').text(type_name);
    $('#room').text(room);
    $('#schedule_date').text(schedule_date);
    $('#message').text(message);
    $('#approvedate').val(schedule_date);
    $('#btnApprove').data('id',appointment_id);
    $('#btnDeny').data('id',appointment_id);

     checkDate();

  $('#detailsModal').modal('show');
          $("#modalForm").show();
          $("#form_loader").hide();


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
