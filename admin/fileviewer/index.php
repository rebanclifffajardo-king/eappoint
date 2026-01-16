<?php
/*
require_once("../db/databaseConnection.php");
 

$id = $_GET['id'];
$sql=mysql_query("SELECT * FROM materialtbl WHERE id='$id'");
$row = mysql_fetch_array($sql);
$file_path= $row['file_path'];
 */
?>


<!DOCTYPE html>
<html style="height:100%;">
  <head>
    <meta http-equiv="Content-Type" content="text/html" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <script src="webviewer.min.js"></script>
    <script src="old-browser-checker.js"></script>
    <script src="modernizr.custom.min.js"></script>
    <!--ga-tag-->
  </head>

  <body style="width:100%;height:100%;margin:0px;padding:0px;overflow:hidden">
    <div id="viewer" style="height: 100%; overflow: hidden;"></div>
    <script>
      /* global Modernizr */
      var viewerElement = document.getElementById('viewer');
      Modernizr.addTest('async', function() {
        try {
          var result;
          // eslint-disable-next-line no-eval
          eval('var a = () => {result = "success"}; var b = async () => {await a()}; b()');
          return result === 'success';
        } catch (e) {
          return false;
        }
      });
      var script = Modernizr.async ? 'ViewerCustomSaveTest.js' : 'ViewerCustomSaveTest.ES5.js';
      // eslint-disable-next-line no-unused-vars
    //var file_path ="<?php echo $file_path; ?>";
    var file_path ="english.pdf";
	
	var file_display = "../../books/"+file_path;
	//alert(file_display);
	WebViewer(
        {
          type: 'html5',
          path: '',
          initialDoc: file_display,
          config: script,
          documentType: 'pdf',
          showLocalFilePicker: true,
          annotationAdmin: true,
          fullAPI: true,
        },
        viewerElement
      );
    </script>
  </body>
</html>
