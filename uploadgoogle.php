<!DOCTYPE html>
<html>
<head>
   <title>file upload</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
  <label>Title</label>
<input type="text" name="title">
  <label>file upload</label>
<input type="file" name="file">
<input type="submit" name="submit">
</form>
</body>
</html>

<?php
$localhost="localhost";
$dbuserid="root";
$dbpassword="";
$dbname="database";
$conn = mysqli_connect($localhost,$dbuserid,$dbpassword,$dbname);

if(isset($_POST["submit"]))
{
  $title=$_POST["title"];
  $pname=rand(1000,10000)."-".$FILES["file"]["name"];
  $tname=$_FILES["file"]["tmp_name"];
$uploads_dir='/images';
move_uploaded_file($tname,$uploads_dir.'/'.$pname);
$sql="INSERT into fileup(title,image) values('$title','$pname')";
      if(mysqli_query($conn,$sql)){
          echo "success";
      }
      else{
           echo "error";
       }
}
?>