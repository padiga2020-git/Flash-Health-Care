<?php
$conn = new mysqli("localhost","root","","database");
$email=$_POST['email'];
$password=$_POST['password'];
$sql="SELECT * FROM user_details WHERE email='$email'";
$result=mysqli_query($conn,$sql); 
if($result){
	$rowcount=mysqli_num_rows($result);
	if ($rowcount > 0) {
    		$sql="update user_details set password='$password' where email='$email'";
    		$result1=mysqli_query($conn,$sql);
    if($result1){
	echo "password changedsuccessfully";}
    else{
	echo "not updated";
	}
  } 
else {
    echo "This email is not present";
}
}
else{
echo "error";
}
$conn->close();
?>