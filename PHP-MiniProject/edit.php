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
   
   if(isset($_POST['Submit'])){
      $name = $_POST['name'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];
      
      // radio
      $gender  = $_POST['gender'];
      
      // Checkbox
      $items = implode(",",$_POST['cbox']);
      
      // selects
      $city = $_POST['city'];
   
    // image
     $imgName = $_FILES['image']['name'];
     $imgTmp = $_FILES['image']['tmp_name'];
     $imgSize = $_FILES['image']['size'];
   
   if($imgName){
   
    $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
   
    $allowExt  = array('jpeg', 'jpg', 'png', 'gif','svg');
   
    $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
   
    if(in_array($imgExt, $allowExt)){
   
      if($imgSize < 5000000){
        unlink($upload_dir.$row['image']);
        move_uploaded_file($imgTmp ,$upload_dir.$userPic);
      }else{
        $errorMsg = 'Image too large';
      }
    }else{
      $errorMsg = 'Please select a valid image';
    }
   }else{
   
    $userPic = $row['image'];
   }
   
   if(!isset($errorMsg)){
      $sql = "update contacts 
                        set name = '".$name."',
                            contact = '".$contact."',
                            email = '".$email."',
                            gender = '".$gender."',
                            city = '".$city."',
                            hobbies = '".$items."',
                            image = '".$userPic."'
                            where id=".$id;
      $result = mysqli_query($conn, $sql);
      if($result){
         $successMsg = 'New record updated successfully';
         header('Location:index.php');
       }else{
         $errorMsg = 'Error '.mysqli_error($conn);
       }
      }
   }
   
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <div class="container">
         <h2><a class="btn btn-outline-danger" href="index.php">Back</a></h2>
      </div>
      <div class="container">
         <h1>Edit Profile</h1>
         <form class="" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group">
               <label for="contact">Contact No:</label>
               <input type="text" class="form-control" name="contact" placeholder="Enter Mobile Number" value="<?php echo $row['contact']; ?>">
            </div>
            <div class="form-group mb-3">
               <label for="">hobbies</label> <br>
               <?php 
                  $item = $row['hobbies'];
                   $repeat_array = explode(",", $item);     
                  ?>
               <input type="checkbox" name="cbox[]" value="Playing" <?php  if (in_array("Playing", $repeat_array)){ echo "checked"; } ?> /> Playing
               <input type="checkbox" name="cbox[]" value="Writing" <?php  if (in_array("Writing", $repeat_array)){ echo "checked"; } ?> /> Writing
               <input type="checkbox" name="cbox[]" value="Dancing" <?php  if (in_array("Dancing", $repeat_array)){ echo "checked"; } ?>   /> Dancing
            </div>
            <div class="form-group mb-3">
               <label for="">Gender</label> <br>
               <input type="radio" name="gender" value="Male"<?php echo ($row['gender'] =='Male')?'checked':'' ?> /> Male
               <input type="radio" name="gender" value="Female" <?php echo ($row['gender'] =='Female')?'checked':'' ?> /> Female
            </div>
            <div class="from-group mb-3">
               <label for="">City</label>
               <select name="city" class="form-control">
                  <option value="Surat" <?php echo ($row['city'] =='Surat')?'selected':'' ?>>Surat</option>
                  <option value="Ahemdabad" <?php echo ($row['city'] =='Ahemdabad')?'selected':'' ?>>Ahemdabad</option>
                  <option value="Vapi" <?php echo ($row['city'] =='Vapi')?'selected':'' ?> >Vapi</option>
               </select>
            </div>
            <div class="form-group">
               <label for="email">E-Mail</label>
               <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
               <label for="image">Choose Image</label>
               <div class="col-md-6">
                  <img src="<?php echo $upload_dir.$row['image'] ?>" width="250" >
                  <input type="file" class="form-control" name="image" value="">
               </div>
            </div>
            <div class="form-group">
               <button type="submit" name="Submit" class="btn btn-primary text-dark waves">Submit</button>
            </div>
         </form>
      </div>
   </body>
</html>