<?php  
session_start();
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	include "../../container/ulti/db_conn.php";
	if (isset($_POST['author_name'])) {
		$name = $_POST['author_name'];

		if (empty($name)) {
			$em = "The author name is required";
			header("Location: ../../container/author/add-author.php?error=$em");
            exit;
		}else {
			$sql  = "INSERT INTO authors (name) VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);
		     if ($res) {
		     	$sm = "Successfully created!";
				header("Location: ../../container/author/add-author.php?success=$sm");
	            exit;
		     }else{
		     	$em = "Unknown Error Occurred!";
				header("Location: ../../container/author/add-author.php?error=$em");
	            exit;
		     }
		}
	}else {
      header("Location: ../../admin.php");
      exit;
	}

}else{
  header("Location: ../../login.php");
  exit;
}