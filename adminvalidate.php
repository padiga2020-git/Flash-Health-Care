<?php
    $connection = mysqli_connect("localhost", "root", "","database"); 
    $query = "SELECT * FROM admin_details where userid='$_POST[userid]' and password='$_POST[password]'";
    $result = mysqli_query($connection, $query);     
    if ($result)
    {
        $row = mysqli_num_rows($result);
 if($row>0){
header("location: admin.html");
 }else{echo "invalid userid and password please check";
 }  
}
  else{
echo "error";
}
    // Connection close 
    mysqli_close($connection);
?>