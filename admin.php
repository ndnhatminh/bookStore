<?php
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
	include "container/ulti/db_conn.php";
	include "php/book/func-book.php";
	include "php/author/func-author.php";
	include "php/category/func-category.php";

    $books = getAllBooks($conn);
    $authors = getAllAuthor($conn);
    $categories = getAllCategories($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMIN</title>

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
	<div class="container">
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="admin.php">Admin</a>
		    <button
				class="navbar-toggler"
				type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse"
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link" 
		             aria-current="page" 
		             href="index.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link"
		             href="container/book/add-book.php">Add Book</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link"
		             href="container/category/add-category.php">Add Category</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link"
		             href="container/author/add-author.php">Add Author</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link"
		             href="container/login/logout.php">Logout</a>
		        </li>
		      </ul>
			  <form class="d-flex" action="container/ulti/search.php">
					<input class="form-control me-2" type="text" placeholder="Search">
					<button class="btn btn-primary" type="button">Search</button>
				</form>
		    </div>
		  </div>
		</nav>

		</div>
       </form>
       <div class="mt-5"></div>
        <?php if (isset($_GET['error'])) { ?>
			<div class="alert alert-danger" role="alert">
				<?=htmlspecialchars($_GET['error']); ?>
			</div>
		<?php } ?>
		<?php if (isset($_GET['success'])) { ?>
			<div class="alert alert-success" role="alert">
				<?=htmlspecialchars($_GET['success']); ?>
			</div>
		<?php } ?>


        <?php  if ($books == 0) { ?>
        	<div
				class="alert alert-warning text-center p-5"
        	    role="alert"
			>
        	    <img
				 	src="img/empty.png"
        	        width="100"
					alt=""
				>
        	     <br>
			  There is no book in the database
		  </div>
        <?php }else {?>

		<h4>All Books</h4>
		<table class="table table-bordered shadow">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Author</th>
					<th>Description</th>
					<th>Category</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			  <?php 
			  $i = 0;
			  foreach ($books as $book) {
			    $i++;
			  ?>
			  <tr>
				<td><?=$i?></td>
				<td>
					<img 
						width="100"
					    src="uploads/cover/<?=$book['cover']?>" >
					<a  
						class="link-dark d-block text-center"
					    href="uploads/files/<?=$book['file']?>"
					>
					   <?=$book['title']?>	
					</a>
						
				</td>
				<td>
					<?php if ($authors == 0) {
						echo "Undefined";}else{ 

					    foreach ($authors as $author) {
					    	if ($author['id'] == $book['author_id']) {
					    		echo $author['name'];
					    	}
					    }
					}
					?>

				</td>
				<td><?=$book['description']?></td>
				<td>
					<?php if ($categories == 0) {
						echo "Undefined";}else{ 

					    foreach ($categories as $category) {
					    	if ($category['id'] == $book['category_id']) {
					    		echo $category['name'];
					    	}
					    }
					}
					?>
				</td>
				<td>
					<a href="edit-book.php?id=<?=$book['id']?>" 
					   class="btn btn-warning">
					   Edit</a>

					<a href="php/delete-book.php?id=<?=$book['id']?>" 
					   class="btn btn-danger">
				       Delete</a>
				</td>
			  </tr>
			  <?php } ?>
			</tbody>
		</table>
	   <?php }?>

        <?php  if ($categories == 0) { ?>
        	<div class="alert alert-warning
        	            text-center p-5"
        	     role="alert">
        	    <img 
				 	src="img/empty.png" 
        	        width="100"
					alt=""
				>
        	    <br>
			  There is no category in the database
		    </div>
        <?php }else {?>
	    <!-- List of all categories -->
		<h4 class="mt-5">All Categories</h4>
		<table class="table table-bordered shadow">
			<thead>
				<tr>
					<th>#</th>
					<th>Category Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$j = 0;
				foreach ($categories as $category ) {
				$j++;	
				?>
				<tr>
					<td><?=$j?></td>
					<td><?=$category['name']?></td>
					<td>
						<a href="edit-category.php?id=<?=$category['id']?>" 
						   class="btn btn-warning">
						   Edit</a>

						<a href="php/delete-category.php?id=<?=$category['id']?>" 
						   class="btn btn-danger">
					       Delete</a>
					</td>
				</tr>
			    <?php } ?>
			</tbody>
		</table>
	    <?php } ?>

	    <?php  if ($authors == 0) { ?>
        	<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <img src="img/empty.png" 
        	          width="100">
        	     <br>
			  There is no author in the database
		    </div>
        <?php }else {?>
	    <!-- List of all Authors -->
		<h4 class="mt-5">All Authors</h4>
         <table class="table table-bordered shadow">
			<thead>
				<tr>
					<th>#</th>
					<th>Author Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$k = 0;
				foreach ($authors as $author ) {
				$k++;	
				?>
				<tr>
					<td><?=$k?></td>
					<td><?=$author['name']?></td>
					<td>
						<a href="edit-author.php?id=<?=$author['id']?>" 
						   class="btn btn-warning">
						   Edit</a>

						<a href="php/delete-author.php?id=<?=$author['id']?>" 
						   class="btn btn-danger">
					       Delete</a>
					</td>
				</tr>
			    <?php } ?>
			</tbody>
		</table> 
		<?php } ?>
	</div>
</body>
</html>

<?php }else{
  header("Location: login.php");
  exit;
} ?>