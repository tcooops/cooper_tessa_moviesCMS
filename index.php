<!-- LANDING HOME PAGE!!! --->

<?php
    require_once './load.php';

    if(isset($_GET['filter'])){
        $filter = $_GET['filter'];
        $getMovies = getMoviesByGenre($filter);
    } else {
        $getMovies = getAllMovies();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Movie CMS</title>
    <?php include 'templates/links.php'; ?>
</head>
<body>
    <h1 class="hidden">Movie CMS</h1>
    <?php include 'templates/header.php'; ?>

    <section class="movies-wrapper">
        <?php foreach($getMovies as $movie):?>
            <div class="movie-item">
                <img class="movie-img" src="images/<?php echo $movie['movies_cover']; ?>" alt="<?php echo $movie['movies_title']; ?> Cover Image">
                <div class="details">
                    <h2 class="movie-title"><?php echo $movie['movies_title']; ?></h2>
                    <h4 class="release-date">Released: <?php echo $movie['movies_release']; ?></h4>
                    <h5 class="runtime">Runtime: <?php echo $movie['movies_runtime']; ?></h5>
                    <p class="storyline"><?php echo $movie['movies_storyline']; ?></p>
                    <a href="details.php?id=<?php echo $movie['movies_id'];?>">More Details...</a>
                </div>
            </div>
        <?php endforeach;?>
    </section>

    <?php include 'templates/footer.php'; ?>

</body>
</html>