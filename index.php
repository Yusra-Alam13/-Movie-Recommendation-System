<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVIE </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/movie/assets/styles.css">

</head>
<body>
<header>
    <div class="header overlay">
   
        <div class="logo">
            <img class="netflix-logo" src="./uploads./sas.png" alt="" srcset="">
        </div>
        <div class="links">
         <div class="options">
            <a href="index.php">Home</a>
         </div>
        
         <div class="options">
            <a href="index.php?category=shows">TV Shows</a>
         </div>
         <div class="options">
            <a href="index.php?category=rating">Top Rated</a>
         </div>
        </div>
        <!-- <div class="login">
                <button type="submit">Login</button>
        </div> -->
    </div>
    <div class="search-bar">
        <div class="bar">
            <form method="GET" action="index.php">
                <input class="search-input" type="text" name="search" placeholder="Search by Title...">
                <button class="search-button" type="submit">Search</button>
            </form>
        </div> 
    </div>
</header>

<div class="main">
    <div class="genre">
         <div>
       <a href="index.php?category=All">ALL</a>
        </div>
    <div>
            <a href="index.php?category=Movie">Movies</a>
    </div>
    <div>
            <a href="index.php?category=TV show">Tv Shows</a>
    </div>
    </div>
   
    <?php include 'db.php';
    
  $category = isset($_GET['category']) ? $_GET['category'] : '';
  $search = isset($_GET['search']) ? trim($_GET['search']) : '';

  if (!empty($search)) {
    $sql = "SELECT * FROM movies WHERE title LIKE '%$search%'";
  }elseif($category === 'Movie'){
    $sql = "SELECT * FROM movies WHERE category = 'Movie' ";
  }elseif($category === 'TV show'){
    $sql = "SELECT * FROM movies WHERE category = 'TV Show' ";

  }elseif($category === 'shows'){
      $sql = "SELECT * FROM movies WHERE category = 'TV Show' ";
  }
  
  elseif($category === 'All'){
        $sql = "SELECT * FROM movies";
  }elseif($category === "rating"){
    $sql = "SELECT * FROM movies WHERE rating >= 7 ORDER BY RATING DESC";
  }
  else{
    $sql = "SELECT * FROM movies";
  }



    $result = mysqli_query($connect, $sql);
    ?>
    <div class="cards">
        <?php
     
        if($result && mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
           ?>

       
        <div class="movie-card">
            <a href="movie.php?id=<?php echo $row['id']; ?>">
            <div class="poster">
                <div class="movie-type">
                    <p><?php echo htmlspecialchars($row['movie_type']);?></p>
                </div>
                <img src="./uploads/<?php echo htmlspecialchars($row['poster']);?>" alt="" class="poster-img">
            </div>
            </a>
            <div class="title">
              <p>
                <?php echo htmlspecialchars($row['title']); ?>
              </p>
            </div>
            <div class="info">
                <div class="movie-info">
                    <div class="year">
                        <?php echo htmlspecialchars($row['movie_year']) ?>
                    </div>
                    <div class="duration">
                      <span><i class="fa-regular fa-clock"></i>
                       <?php echo htmlspecialchars($row['duration']);?>
                      </span>
                    </div>
                </div>
                <div class="type">
                    <?php echo htmlspecialchars($row['category']);?>
                </div>
            </div>
        </div>

        <?php

        }
        }else {
                    echo "<p> NO Movies Found. <p>";
            }
         
        ?>
         
    </div>
</div>




<script src="gsap.min.js"></script>
<script src="./js/script.js" ></script>
</body>
</html>