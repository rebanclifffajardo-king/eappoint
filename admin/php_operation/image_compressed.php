<?php
function saveImage($filename_val){
define ("MAX_SIZE","3000");
function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
}
$errors_gen = "";
$errors=0;


   $image =$_FILES["file"]["name"];
   $uploadedfile = $_FILES['file']['tmp_name'];


   if ($image)
   {

       $filename = stripslashes($_FILES['file']['name']);

       $extension = getExtension($filename);
       $extension = strtolower($extension);


if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
       {
           $errors_gen = "Unknown Extension..!";
       }
       else
       {

$size=filesize($_FILES['file']['tmp_name']);


if ($size > MAX_SIZE*1024)
{
   $errors_gen = "File Size Excedeed..!!";
}


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

}
else if($extension=="png")
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);

}
else
{
$src = imagecreatefromgif($uploadedfile);
echo $src;
}

list($width,$height)=getimagesize($uploadedfile);


$newwidth=128;
$newheight=128;
//$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);


$newwidth1=128;
$newheight1=128;
//$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
/*
$name = md5(rand(100, 200));
$ext = explode('.', $_FILES['file']['name']);
$filename_val = $name . '.' . $ext[1];
*/
$filename = '../../images/doctors/'. $filename_val;

$filename1 = '../../images/doctors/'. $filename_val;



imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}}


return $errors_gen;


}
?>
