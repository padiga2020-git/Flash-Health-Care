<?php
$target_dir = "reportfiles";
$target_file = $target_dir . basename($_FILES['fileToupload']['name']);
$uploadOk = 1;


if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES['fileToupload']['size'] > 70000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES['fileToupload']["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToupload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>