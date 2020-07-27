<?php
$localhost="localhost";
$dbuserid="root";
$dbpassword="";
$dbname="database";
$conn = mysqli_connect($localhost,$dbuserid,$dbpassword,$dbname);


if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO upload_files(file,type,size) VALUES('$file','$file_type','$file_size')";
 if(mysqli_query($conn,$sql)){
          echo "   Upload Successfully";
      }
      else{
           echo "error";
       }
 
}
?>