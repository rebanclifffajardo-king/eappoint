<?php

session_start();
require_once("../../db/databaseConnection.php");
include 'classes.php';

 $response=array();

  $display=mysqli_real_escape_string($conn,$_POST['display']);

 //$display="line1_quarterly_avg";

 
 if($display=="bar1") $response = getBarchartReport2();
 if($display=="bar2") $response = getBarchartReportTotal();
 if($display=="line") $response = getLinechartReport();
 if($display=="line1") $response = getLinechartCount();
 if($display=="line1_yearly_avg") $response = getLinechartReportAvg();
 if($display=="line1_monthly_avg") $response = getLinechartReportMonthAvg();
 if($display=="line1_quarterly_avg") $response = getLinechartReportQuarterAvg();
 if($display=="year") $response = getYear();
 if($display=="line1_yearly") $response = getLinechartCountYearly();
 if($display=="line1_monthly") $response = getLinechartCountMonthly();
 if($display=="line1_quarterly") $response = getLinechartCountQuarterly();
 echo json_encode($response);

 //-------------functions

 function getLinechartCountQuarterly(){
 
  global $conn;
  $response=array();
  $tot_arr=array();
  array_push($tot_arr,0);
  $admin_id = $_SESSION['id'];
  $year=mysqli_real_escape_string($conn,$_POST['year']);
  //$year='2022';

   $sql = "SELECT name,COUNT(id) as 'tot',schedule_date,QUARTER(schedule_date) as 'quarter' 
   FROM importtbl  
   WHERE clinic_id='$admin_id' AND YEAR(schedule_date)='$year'
   GROUP BY quarter ORDER BY QUARTER(schedule_date)";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $name = $row["name"];
     $tot = $row["tot"];
      
     $schedule_date = $row["schedule_date"];
     $quarter = $row["quarter"];
     array_push($tot_arr, $tot);

   $response[]=array(
           "name"=>($name),
           "tot"=>($tot),
           "schedule_date"=>($schedule_date),
           "quarter"=>($quarter)
          );

   }
   $max = max($tot_arr);

   $response[]=array(
    "maxCons"=>($max) 
   );
   return $response;
 

}

 function getLinechartCountMonthly(){
 
  global $conn;
  $response=array();
  $tot_arr=array();
  array_push($tot_arr,0);
  $admin_id = $_SESSION['id'];
  $year=mysqli_real_escape_string($conn,$_POST['year']);
  //$year='2016';

   $sql = "SELECT name,COUNT(id) as 'tot',schedule_date,MONTHNAME(schedule_date) as 'month_name' 
   FROM importtbl  
   WHERE clinic_id='$admin_id' AND YEAR(schedule_date)='$year'
   GROUP BY month_name ORDER BY MONTH(schedule_date)";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $name = $row["name"];
     $tot = $row["tot"];
      
     $schedule_date = $row["schedule_date"];
     $month_name = $row["month_name"];
     array_push($tot_arr, $tot);

   $response[]=array(
           "name"=>($name),
           "tot"=>($tot),
           "schedule_date"=>($schedule_date),
           "month_name"=>($month_name)
          );

   }
   $max = max($tot_arr);

   $response[]=array(
    "maxCons"=>($max) 
   );
   return $response;
 

}

 function getLinechartCountYearly(){

  global $conn;
  $response=array();
  $tot_arr=array();
  $admin_id = $_SESSION['id'];
   $sql = "SELECT name,COUNT(id) as 'tot',schedule_date,YEAR(schedule_date) as 'year' 
   FROM importtbl  
   WHERE clinic_id='$admin_id'
   GROUP BY year ORDER BY YEAR(schedule_date)";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $name = $row["name"];
     $tot = $row["tot"];
      
     $schedule_date = $row["schedule_date"];
     $year = $row["year"];
     array_push($tot_arr, $tot);

   $response[]=array(
           "name"=>($name),
           "tot"=>($tot),
           "schedule_date"=>($schedule_date),
           "year"=>($year)
          );

   }
   $max = max($tot_arr);

   $response[]=array(
    "maxCons"=>($max) 
   );
   return $response;
 

}

 function getYear(){

  global $conn;
  $response=array();

  $admin_id = $_SESSION['id'];
   $sql = "SELECT YEAR(schedule_date) as 'year' 
   FROM importtbl  
   WHERE clinic_id='$admin_id' 
   GROUP BY year ORDER BY YEAR(schedule_date) DESC";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $year = $row["year"];
     

   $response[]=array(
           "year"=>($year)
          );

   }
  
   return $response;
 

}

 function getLinechartCount(){

  global $conn;
  $response=array();
  $tot_arr=array();
  $admin_id = $_SESSION['id'];
   $sql = "SELECT name,COUNT(id) as 'tot',schedule_date,MONTHNAME(schedule_date) as 'month_name' 
   FROM importtbl  
   WHERE clinic_id='$admin_id' AND YEAR(schedule_date)=YEAR(CURDATE())
   GROUP BY month_name ORDER BY MONTH(schedule_date)";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $name = $row["name"];
     $tot = $row["tot"];
      
     $schedule_date = $row["schedule_date"];
     $month_name = $row["month_name"];
     array_push($tot_arr, $tot);

   $response[]=array(
           "name"=>($name),
           "tot"=>($tot),
           "schedule_date"=>($schedule_date),
           "month_name"=>($month_name)
          );

   }
   $max = max($tot_arr);

   $response[]=array(
    "maxCons"=>($max) 
   );
   return $response;
 

}

 function getLinechartReportQuarterAvg(){

  global $conn;
  $response=array();
  
  $tot_arr=array();
  $year=mysqli_real_escape_string($conn,$_POST['year']);
 // $year='2022';
 

  $admin_id = $_SESSION['id'];
   $sql = "SELECT name,AVG(minutes_done) as 'average',schedule_date,QUARTER(schedule_date) as 'quarter' 
   FROM importtbl  
   WHERE clinic_id='$admin_id' AND YEAR(schedule_date)='$year'
   GROUP BY quarter ORDER BY QUARTER(schedule_date)";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $name = $row["name"];
     $average = $row["average"];
     $average = "" .round($average,2);
     $schedule_date = $row["schedule_date"];
     $quarter = $row["quarter"];
     array_push($tot_arr, $average);

   $response[]=array(
           "name"=>($name),
           "average"=>($average),
           "schedule_date"=>($schedule_date),
           "quarter"=>($quarter)
          ); 

   }
   $max =max($tot_arr);

   $response[]=array(
    "maxCons"=>($max) 
   );
   return $response;
 

}

 function getLinechartReportMonthAvg(){

  global $conn;
  $response=array();
  
  $tot_arr=array();
  $year=mysqli_real_escape_string($conn,$_POST['year']);
  //$year='2022';
 

  $admin_id = $_SESSION['id'];
   $sql = "SELECT name,AVG(minutes_done) as 'average',schedule_date,MONTHNAME(schedule_date) as 'month_name' 
   FROM importtbl  
   WHERE clinic_id='$admin_id' AND YEAR(schedule_date)='$year'
   GROUP BY month_name ORDER BY MONTH(schedule_date)";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $name = $row["name"];
     $average = $row["average"];
     $average = "" .round($average,2);
     $schedule_date = $row["schedule_date"];
     $month_name = $row["month_name"];
     array_push($tot_arr, $average);

   $response[]=array(
           "name"=>($name),
           "average"=>($average),
           "schedule_date"=>($schedule_date),
           "month_name"=>($month_name)
          ); 

   }
   $max =max($tot_arr);

   $response[]=array(
    "maxCons"=>($max) 
   );
   return $response;
 

}

 function getLinechartReportAvg(){

  global $conn;
  $response=array();
  
  $tot_arr=array();


  $admin_id = $_SESSION['id'];
   $sql = "SELECT name,AVG(minutes_done) as 'average',schedule_date,YEAR(schedule_date) as 'year' 
   FROM importtbl  
   WHERE clinic_id='$admin_id' 
   GROUP BY year ORDER BY YEAR(schedule_date)";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $name = $row["name"];
     $average = $row["average"];
     $average = "" .round($average,2);
     $schedule_date = $row["schedule_date"];
     $year = $row["year"];
     array_push($tot_arr, $average);

   $response[]=array(
           "name"=>($name),
           "average"=>($average),
           "schedule_date"=>($schedule_date),
           "year"=>($year)
          ); 

   }
   $max =max($tot_arr);

   $response[]=array(
    "maxCons"=>($max) 
   );
   return $response;
 

}

 function getLinechartReport(){

  global $conn;
  $response=array();
  
  $tot_arr=array();
  

  $admin_id = $_SESSION['id'];
   $sql = "SELECT name,AVG(minutes_done) as 'average',schedule_date,MONTHNAME(schedule_date) as 'month_name' 
   FROM importtbl  
   WHERE clinic_id='$admin_id'
   GROUP BY month_name ORDER BY MONTH(schedule_date)";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $name = $row["name"];
     $average = $row["average"];
     $average = "" .round($average,2);
     $schedule_date = $row["schedule_date"];
     $month_name = $row["month_name"];
     array_push($tot_arr, $average);

   $response[]=array(
           "name"=>($name),
           "average"=>($average),
           "schedule_date"=>($schedule_date),
           "month_name"=>($month_name)
          );


   }
   $max =max($tot_arr);

   $response[]=array(
    "maxCons"=>($max) 
   );
   return $response;
 

}
 function getBarchartReportTotal(){
  global $conn;
  $response=array();
  $tot_arr=array();
  $admin_id = $_SESSION['id'];

   $sql = "SELECT COUNT(i.id) as 'tot',t.type_name FROM importtbl i
   INNER JOIN typetbl t ON t.type_id=i.type_id 
   WHERE i.clinic_id='$admin_id'
   GROUP BY i.type_id ";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     
     $tot = $row["tot"];
     $type_name = $row["type_name"];
     array_push($tot_arr, $tot);
  
   $response[]=array(
           "type_name"=>($type_name),
           "tot"=>($tot)
          );

   }
   $max = max($tot_arr);

   $response[]=array(
    "maxCons"=>($max) 
   );
 

   return $response;


} 

 function getBarchartReport2(){
  global $conn;
  $response=array();
  $admin_id = $_SESSION['id'];

   $sql = "SELECT AVG(i.minutes_done) as 'average',t.type_name FROM importtbl i
   INNER JOIN typetbl t ON t.type_id=i.type_id 
   WHERE i.clinic_id='$admin_id'
   GROUP BY i.type_id ";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     
     $average = $row["average"];
     $average = "" .round($average,2);
     $type_name = $row["type_name"];
  
   $response[]=array(
           "type_name"=>($type_name),
           "average"=>($average)
          );

   }
   return $response;


} 

?>
