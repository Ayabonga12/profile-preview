<?php
$conn = mysqli_conect("localhost","root","","upload");

if(isset($_files["fileImg"]["name"])){
    global $conn;

    $imageName = $_Files["fileImg"]["name"];
    $tmpName = $_FILES["fileImg"]["tmp_name"];

    // Image extentsion validation
    $validImageExtentsion = ['jpg','jpeg','png'];
    $imageExtentsion = explode('.',$imageName);

    $name = $imageExtentsion[0];
    $imageExtentsion = strtolower(end($imageExtentsion));

    if(!in_array($imageExtentsion,$validImageExtentsion)){
        echo "Invalid";
        exit;
    }
    else{
      $newImageName = $name ."-".uniqid(); // Generate new image name
      $newImageName .= '.' . $imageExtentsion;
      
      move_uploaded_file($tmpName, 'uploads/'.$newImageName);
      $query = "INSERT INTO tb_upload VALUES('','$newImageName')";
      mysqli_query($conn,$query);
      echo "Success";
      exit;
    }
}
?>