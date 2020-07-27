<?php
$f=1;
$connect = mysqli_connect("localhost","root","","database");
$sql="INSERT INTO organisation_details (hospitalname,category,email,address,userid,password)VALUES ('$_POST[hospitalname]','$_POST[category]','$_POST[email]', '$_POST[address]','$_POST[userid]','$_POST[password]')";
$sql1 = "SELECT * FROM organisation_details where email='$_POST[email]'";
$result1 = $connect->query($sql1);
$rowcount=mysqli_num_rows($result1);
if ( $rowcount> 0) {
    echo "take another username";
     $f=0;
}
if($f==1) {
$result=mysqli_query($connect,$sql);
header("location: optional_u_p.html");
}
?>