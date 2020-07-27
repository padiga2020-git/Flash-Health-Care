<?php
$f=1;
$connect = mysqli_connect("localhost","root","","database");
$sql="INSERT INTO user_details (firstname,lastname,email,address,userid,password)VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[email]', '$_POST[address]','$_POST[userid]','$_POST[password]')";
$sql1 = "SELECT * FROM user_details where email='$_POST[email]'";
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