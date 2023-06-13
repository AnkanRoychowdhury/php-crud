<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.php");
}

$updatePic = false;
$updatePic_err = false;
$allwType_err = false;


require_once 'database/_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_FILES["profile_pic"]) && $_FILES["profile_pic"]["error"] == UPLOAD_ERR_OK) {
    $targetDir = "uploads/"; // Upload here
    $targetFile = $targetDir . basename($_FILES["profile_pic"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $allowedTypes)) {

      if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFile)) {
        $_SESSION['profile_pic'] = $targetFile;
        $updatePic = true;
      } else {
        $updatePic_err = true;
      }
    } else {
      $allwType_err = true;
    }
  } else {
    $updatePic_err = true;
  }
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Profile</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="/ideaapp/logo.svg" height="28px" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/ideaapp/ideas.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/ideaapp/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <?php
  if ($updatePic) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Profile Picture has been Uploaded successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if ($updatePic_err) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Sorry, </strong>there was an error uploading your file.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if ($allwType_err) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Sorry,</strong> only JPG, JPEG, PNG, and GIF files are allowed.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

  <div class="container">

    <h1>Welcome! <?php echo $_SESSION['username']; ?></h1>
    <p>Username: <?php echo $_SESSION['username']; ?></p>

    <?php
    if (isset($_SESSION['profile_pic'])) {
      echo '<img src="' . $_SESSION['profile_pic'] . '" alt="Profile Picture">';
    }
    ?>

    <!-- Add the profile photo upload form -->
    <form action="profile.php" method="POST" enctype="multipart/form-data">
      <label for="profile_pic">Profile Picture:</label>
      <input type="file" name="profile_pic" id="profile_pic">
      <input type="submit" value="Upload">
    </form>

  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>