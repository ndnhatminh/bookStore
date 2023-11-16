<?php
function getAllBooks($conn){
   $sql  = "SELECT * FROM books ORDER bY id DESC";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() > 0) {
   	  $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}

function getBook($conn, $id){
   $sql  = "SELECT * FROM books WHERE id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
   	  $book = $stmt->fetch();
   }else {
      $book = 0;
   }

   return $book;
}

function searchBooks($conn, $key){
   $key = "%{$key}%";

   $sql  = "SELECT * FROM books 
            WHERE title LIKE ?
            OR description LIKE ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key]);

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}

function getBooksByCategory($conn, $id){
   $sql  = "SELECT * FROM books WHERE category_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}

function getBooksByAuthor($conn, $id){
   $sql  = "SELECT * FROM books WHERE author_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}
