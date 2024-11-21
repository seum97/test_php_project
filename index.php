<?php
include "db_connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test Project</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<div class="container">

		<h1>User Management System</h1> 
		<?php
		    if (isset($_GET["msg"])) {
		      $msg = $_GET["msg"];
		      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
		       .$msg.
		      '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		    </div>';
		    }
		    ?>
		<a href="create_user.php" class="btn btn-dark mb-3">Create New User</a>

		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
		    <tr>
		      <td><?php echo $row["id"] ?></td>
		      <td><?php echo $row["name"] ?></td>
		      <td><?php echo $row["email"] ?></td>
		      <td>
		      	<a class="btn btn-info" href="update_user.php?id=<?php echo $row["id"] ?>">Update</a>
		      	<a class="btn btn-danger" href="delete.php?id=<?php echo $row["id"] ?>">Delete</a>
		      </td>
		    </tr>
		    <?php
        }
        ?>
		  </tbody>
		</table>
				
	</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>