<?php
   include('db.php');
   $upload_dir = 'uploads/';
   
   if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $sql = "select * from contacts where id = ".$id;
   $result = mysqli_query($conn, $sql);
   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $image = $row['image'];
      unlink($upload_dir.$image);
      $sql = "delete from contacts where id=".$id;
      if(mysqli_query($conn, $sql)){
         header('location:index.php');
      }
   }
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>PHP CRUD</title>
   </head>
   <body>
      <div class="container">
         <h2><a class="btn btn-primary" href="create.php">Add Records</a></h2>
         <table>
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th> Name</th>
                  <th>Contact No:</th>
                  <th>Gender</th>
                  <th>E-Mail</th>
                  <th>City</th>
                  <th>Hobbies</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql = "select * from contacts";
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result)){
                     while($row = mysqli_fetch_assoc($result)){
                  ?>
               <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><img src="<?php echo $upload_dir.$row['image'] ?>" / width="250"></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['contact'] ?></td>
                  <td><?php echo $row['gender'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo $row['city'] ?></td>
                  <td><?php echo $row['hobbies'] ?></td>
                  <td>
                     <a href="show.php?id=<?php echo $row['id'] ?>">Show</a>
                     <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                     <a href="index.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">Delete</a>
                  </td>
               </tr>
               <?php
                     }
                  }
               ?>
            </tbody>
         </table>
      </div>
   </body>
</html>