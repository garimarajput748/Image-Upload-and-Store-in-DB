<?php
    require_once("db.php");

$tname = "demo";
$user = new db();
$db = $user->connect();

if(isset($_POST['submit'])){
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $fileName = basename($_FILES["image"]["name"]);
  $fileNameNoExtension = preg_replace("/\.[^.]+$/", "",$fileName);
  $thumb_img = $target_dir.'/'.$fileNameNoExtension.'_thumb.jpg';
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

    // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  function make_thumb($src, $dest, $desired_width,$desired_height) {
    /* read the source image */
    $extension = strtolower(strrchr($src, '.'));

    switch ($extension) {
        case '.jpg':
        case '.jpeg':
          $source_image = @imagecreatefromjpeg($src);
            break;
        case '.gif':
          $source_image = @imagecreatefromgif($src);
            break;
        case '.png':
          $source_image = @imagecreatefrompng($src);
            break;
        default:
        $source_image = false;
            break;
    }
    // $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);
    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
  }
  $desired_width = "100px";
  $desired_height = "100px";
  make_thumb($target_file,$thumb_img, $desired_width,$desired_height);
 

  $data = $user->exec_query("INSERT INTO `demo` (`image_name`, `thumb_img`) VALUES ('$fileName','$fileNameNoExtension')");
  exit;


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container text-center">
  <h2>Upload Image with create thumb image</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="usr">Upload Image:</label>
      <input type="file" class="form-control w-25" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
  </form>
</div>

</body>
</html>
