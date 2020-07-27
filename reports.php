$conn = mysqli_connect('localhost','root','','demo');
 
if(!$conn)
{
    die(mysqli_error());
}
 
//read text file and insert data into database
 
<?php
$localhost="localhost";
$dbuserid="root";
$dbpassword="";
$dbname="database";
$conn = mysqli_connect('localhost','root','','database');
 
$open = fopen('employee.txt','r');
 
while (!feof($open)) 
{
	$getTextLine = fgets($open);
	$explodeLine = explode(",",$getTextLine);
	
	list($name,$email) = $explodeLine;
	
	$qry = "insert into emails (`name`,`email`) values('".$name."','".$email."')";
 
	mysqli_query($conn,$qry);
}
 
fclose($open); 
?>