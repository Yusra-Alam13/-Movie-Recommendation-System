<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVIES</title>
    <link rel="stylesheet" href="movie.css">
</head>
<body>
<header>
    <div class="movie-header">
        <div class="sas-logo">
            <img src="./uploads/sas.png" alt="">
        </div>
        <div class="links">
            <div class="home">
                <a href="index.php">Home</a></div>
            <div class="TV-SHOWS">
                <a href="index.php?category=shows">Tv Shows</a> </div>
            <div class="Top-Rated">
                <a href="index.php?category=rating">Top Rated</a></div>
        </div>
    </div>
</header>
    <?php 
    include 'db.php';
       
    if (isset($_GET['id'])) {
    $movie_id = intval($_GET['id']);

    // Query to fetch movie by ID
    $query = "SELECT * FROM movies WHERE id = $movie_id";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $movie = mysqli_fetch_assoc($result);
    } else {
        die("Movie not found.");
    }
    } else {
        die("No movie selected.");
    }
       ?>
    <div class="poster">
    <img class="poster-img" src="./uploads/<?php echo $movie['background_image'] ?>" alt="">
    </div>
    <div class="movie-card">
        <div class="details">
            <div class="card">
                <img src="./uploads/<?php echo htmlspecialchars($movie['poster']);?>" alt="">
            </div>
        <div class="movie-info-card">
            <div class="movie-info">
                <div class="movie-title"><?php echo $movie['title'] ?></div>
                <div class="movie-rating">
                    <a href="<?php echo $movie['trailer_url']; ?>" target="_blank">
                    <button class="rating-button">Trailer</button>
                    </a>
                    <p><?php echo $movie['movie_type']?></p>
                    <p>IMDB <?php echo $movie['rating'] ?> </p>
                </div>
                <div class="movie-description">
                    <p>
                    <?php echo $movie['movie_description'] ?>
                    </p>
                </div>
                <div class="movie-details">
                    <div class="detail-item"><strong>Released:</strong> <?php echo $movie['movie_year'] ?></div>
                    <div class="detail-item"><strong>Duration:</strong>  <?php echo  $movie['duration'] ?> min</div>
                    <div class="detail-item"><strong>Genre:</strong>  <?php echo  $movie['genre'] ?></div>
                    <div class="detail-item"><strong>Country:</strong>  <?php echo $movie['cast'] ?></div>
                    <div class="detail-item"><strong>Casts:</strong>  <?php echo  $movie['cast'] ?></div>
                    <div class="detail-item"><strong>Production:</strong> Marvel Studios, Columbia Pictures, Pascal Pictures, LStar Capital, Sony Pictures</div>


                </div>
            </div>
        </div>
        </div>
    </div>

       
</body>
</html>