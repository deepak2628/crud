<?php include('add.php') ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>PHP CRUD</title>
   </head>
   <body>
      <div class="container">
        <div class="container">
         <h2><a class="btn btn-outline-danger" href="index.php">Back</a></h2>
        </div>
         <form class="" action="add.php" method="post" enctype="multipart/form-data">
            <!-- Text Fileds -->
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name"  placeholder="Enter Name" value=""><br>
            <!-- Checkbox Fileds -->
            <label for="">Hobbies</label> <br>
            <input type="checkbox" name="cbox[]" value="Playing" /> Playing
            <input type="checkbox" name="cbox[]" value="Writing" /> Writing
            <input type="checkbox" name="cbox[]" value="Dancing" /> Dancing<br>
            <!-- Text Fileds -->
            <label for="contact">Contact No:</label><br>
            <input type="text" class="form-control" name="contact" placeholder="Enter Mobile Number" value=""> <br>
            <!-- Radio group -->
            <label for="">Gender</label> <br>
            <input type="radio" name="gender" value="Male" /> Male
            <input type="radio" name="gender" value="Female" /> Female <br>
            <!-- Select group -->
            <label for="">City</label><br>
            <select name="city" class="form-control">
               <option value="">--Select City--</option>
               <option value="Surat">Surat</option>
               <option value="Ahemdabad">Ahemdabad</option>
               <option value="Vapi">Vapi</option>
            </select> <br>
            <!-- Email filds -->
            <label for="email">E-Mail</label> <br>
            <input type="email" class="form-control" name="email" placeholder="Enter Email" value=""> <br> <br>
            <!-- Image upload -->
            <label for="image">Choose Image</label> <br>
            <input type="file" class="form-control" name="image" value=""><br><br>
            <div class="form-group"> <br>
               <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
            </div>
         </form>
      </div>
   </body>
</html>