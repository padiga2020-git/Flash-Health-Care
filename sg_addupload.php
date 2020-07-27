<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['btn-upload'])) {
include '../includes/dbcon.php';   

    $file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $keywords = mysqli_real_escape_string($con, $_POST['keywords']);
    $categ = mysqli_real_escape_string($con, $_POST['categ']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $art_info = mysqli_real_escape_string($con, $_POST['art_info']);
    $folder="../uploads_art_jou/";

$allowed =  array('pdf','doc' ,'docx');
    $file = $_FILES['file']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION); 
$file = $folder."$file";    
    //$location =mysqli_real_escape_string ($con, $_POST['location']);

    // new file size in KB
    $new_size = $file_size/1024;  
    // new file size in KB

    // make file name in lower case
    $new_file_name = strtolower($file);

//checks file extension for images only

        if(!in_array($ext,$allowed) ) 
            { 
?>
<script>
       alert('file extension not allowed');
       window.location.href='art_jou_add.php?file_type_not_allowed_error';
</script>

<?php 
    }

//check whether file exist in said folder

        elseif (file_exists($file))
            { 
?>
<script>
       alert('file already exist');
       window.location.href='art_jou_add.php?file_exist';
</script>
<?php
    }

//if file does not exist, move it to folder and save details to table
    else(move_uploaded_file($file_loc,$folder.$file));
    {

    $sql="INSERT INTO art_jou(file,type,size,title,keywords,categ,email,art_info)
             VALUES('$file','$file_type','$file_size','$title','$keywords','$categ','$email','$art_info')";
    mysqli_query($con,$sql);
    echo "it is done";
?>

<?php
    }

    }

?>