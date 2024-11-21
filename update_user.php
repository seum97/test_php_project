<?php
include "db_connection.php";

// Check if 'id' is passed
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
} else {
    die("Error: ID Missing !");
}

if (isset($_POST["submit"])) {
   $name = $_POST['userName'];
   $email = $_POST['email'];

   $sql = "UPDATE `users` SET `name`='$name',`email`='$email'WHERE id = $id";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      // header("Location: index.php?msg=New User created successfully");
      header("Location: index.php");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

   <?php
    $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
   ?>
    
   <div class="container">
   	<h3>Update User Information</h3>
   	<div style="padding-right: 400px;" class="userForm">
   		<form action="" method="post">
		  
		  <div class="mb-3">
		    <label class="form-label">Name</label>
		    <input type="text" class="form-control" name="userName" value="<?php echo $row['name'] ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Email address</label>
		    <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" aria-describedby="emailHelp">
		    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		  </div>

		  
		  
		  <button type="submit"  name="submit"  class="btn btn-success">Update</button>
		</form>
   	</div>
   </div>

   




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>