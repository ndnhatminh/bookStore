<?php
session_start();
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
	include "../../container/ulti/db_conn.php";
	if (isset($_POST['category_name'])) {
		$name = $_POST['category_name'];
		if (empty($name)) {
			$em = "The category name is required";
			header("Location: ../../container/category/add-category.php?error=$em");
            exit;
		}else {
			$sql  = "INSERT INTO categories (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);
		     if ($res) {
		     	$sm = "Successfully created!";
				header("Location: ../../container/category/add-category.php?success=$sm");
	            exit;
		     }else{
		     	$em = "Unknown Error Occurred!";
				header("Location: ../../container/category/add-category.php?error=$em");
	            exit;
		     }
		}
	}else {
      header("Location: ../../admin.php");
      exit;
	}

}else{
  header("Location: ../../container/login/login.php");
  exit;
}