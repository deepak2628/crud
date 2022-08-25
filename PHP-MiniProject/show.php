<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from contacts where id=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }
?>

<div class="container">
  <img src="<?php echo $upload_dir.$row['image'] ?>" width="50%">
  <h2><?php echo $row['name'] ?></h2>
  <h3><?php echo $row['contact'] ?></h3>
  <h4><?php echo $row['email'] ?></h4><br/>
  <p><?php echo $row['hobbies'] ?></p>
  <p><?php echo $row['city'] ?></p>
  <p><?php echo $row['gender'] ?></p>

  <a class="btn btn-outline-danger" href="index.php"><span>Back</span></a>
</div>


