<?php
session_start();

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
	<title>Book Store</title>
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
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		  <div class="container-fluid">
		    <a
				class="navbar-brand"
				href="index.php"
			>
				Online Book Store
			</a>
		    <button
				class="navbar-toggler"
				type="button"
				data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse"
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active"
		             aria-current="page"
		             href="index.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link"
		             href="#">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="#">About</a>
		        </li>
		        <li class="nav-item">
		          <?php if (isset($_SESSION['user_id'])) {?>
		          	<a class="nav-link" 
		             href="admin.php">Admin</a>
		          <?php }else{ ?>
		          <a class="nav-link" 
		             href="container/login/login.php">Login</a>
		          <?php } ?>

		        </li>
		      </ul>
			  	<form class="d-flex" action="container/ulti/search.php">
					<input class="form-control me-2" type="text" placeholder="Search">
					<button class="btn btn-primary" type="button">Search</button>
				</form>
		    </div>
		  </div>
		</nav>
		<div class="d-flex pt-3">
			<?php if ($books == 0){ ?>
				<div class="alert alert-warning
        	            text-center p-5"
        	     role="alert">
        	    <img
				 	src="img/empty.png"
        	        width="100"
					alt=""
				>
        	     <br>
			    There is no book in the database
		       </div>
			<?php }else{ ?>
			<div class="pdf-list d-flex flex-wrap">
				<?php foreach ($books as $book) { ?>
				<div class="card m-1">
					<img
						src="uploads/cover/<?=$book['cover']?>"
					    class="card-img-top"
						alt=""
					>
					<div class="card-body">
						<h5 class="card-title">
							<?=$book['title']?>
						</h5>
						<p class="card-text">
							<i><b>By:
								<?php foreach($authors as $author){
									if ($author['id'] == $book['author_id']) {
										echo $author['name'];
										break;
									}
								?>

								<?php } ?>
							<br></b></i>
							<?=$book['description']?>
							<br><i><b>Category:
								<?php foreach($categories as $category){ 
									if ($category['id'] == $book['category_id']) {
										echo $category['name'];
										break;
									}
								?>

								<?php } ?>
							<br></b></i>
						</p>
                       <a href="uploads/files/<?=$book['file']?>"
                          class="btn btn-success">Open</a>

                        <a href="uploads/files/<?=$book['file']?>"
                          class="btn btn-primary"
                          download="<?=$book['title']?>">Download</a>
					</div>
				</div>
				<?php } ?>
			</div>
		<?php } ?>

		<div class="category">
			<div class="list-group">
				<?php if ($categories == 0){
					return;
				}else{ ?>
				<a href="#"
				   class="list-group-item list-group-item-action active">Category</a>
				   <?php foreach ($categories as $category ) {?>
				  
				   <a href="category.php?id=<?=$category['id']?>"
				      class="list-group-item list-group-item-action">
				      <?=$category['name']?></a>
				<?php } } ?>
			</div>

			<div class="list-group mt-5">
				<?php if ($authors == 0){
					return;
				}else{ ?>
				<a href="#"
				   class="list-group-item list-group-item-action active">Author</a>
				   <?php foreach ($authors as $author ) {?>
				  
				   <a href="author.php?id=<?=$author['id']?>"
				      class="list-group-item list-group-item-action">
				      <?=$author['name']?></a>
				<?php } } ?>
			</div>
		</div>
		</div>
	</div>
</body>
</html>