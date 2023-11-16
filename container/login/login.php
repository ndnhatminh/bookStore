<?php
session_start();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
		crossorigin="anonymous"
	>
    <script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
		crossorigin="anonymous"
	></script>
</head>
<body>
	<div
		class="d-flex justify-content-center align-items-center"
	     style="min-height: 100vh;">

		<form class="p-5 rounded shadow"
		      style="max-width: 30rem; width: 100%"
		      method="POST"
		      action="../../php/validation/auth.php">
		  <h1 class="text-center display-4 pb-5">LOGIN</h1>
		  <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error']); ?>
		  </div>
		  <?php } ?>

		  <div class="mb-3">
		    <label for="email"
		           class="form-label">Email</label>
		    <input type="email"
		           class="form-control"
		           name="email"
		           id="email"
		           aria-describedby="emailHelp"
				   >
		  </div>

		  <div class="mb-3">
		    <label
				for="password"
		        class="form-label">Password</label>
		    <input
				type="password"
		        class="form-control"
		        name="password"
		        id="password"
				>
		  	</div>
		  	<button
		  		type="submit"
		        class="btn btn-outline-primary mt-3">
		          Login
			</button>
			<button
		  		type="submit"
		        class="btn btn-outline-danger mt-3"
			>
				<a href="./index.php" class="text-decoration-none text-danger">Store</a>
			</button>
		</form>
	</div>
</body>
</html>

<?php }else{
  header("Location: admin.php");
  exit;
} ?>