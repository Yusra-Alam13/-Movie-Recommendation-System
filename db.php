<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "movies";
  $connect = mysqli_connect($server, $username, $password, $database);

  if (!$connect) {
    die("connection failed " . mysqli_connect_error());
  }else{
     "Database Connection Established <br>";
  }


// $sql = "INSERT INTO movies(title,genre,cast,country,movie_type,rating,duration,category,poster,movie_year)
//        VALUES('F1: The Academy','Documentary','N/A','USA','HD',5.2,45,'Tv Show','f1.jpg',2025)";
  // $sql = "ALTER TABLE movies ADD movie_year VARCHAR(10)";


?>