<?php
$target_dir = "users/entro/photo/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);



$uploadOk = 1;
  echo $uploadOk;

move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);


		
?>