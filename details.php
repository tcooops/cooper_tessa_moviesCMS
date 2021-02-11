<!-- SINGLE MOVIE DETAIL PAGE -->

<?php
    require_once './load.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $movie = getSingleMovie($id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <?php include 'templates/links.php'; ?>
</head>
<body>
    <h1 class="hidden">Movie CMS</h1>
    <?php include 'templates/header.php'; ?>
    <?php if (!empty($movie)):?>

        <section class="movies-wrapper">
            <div class="movie-item-details">
                <img class="movie-img" src="images/<?php echo $movie['movies_cover']; ?>" alt="<?php echo $movie['movies_title']; ?> Cover Image">
                <div class="details">
                    <h2 class="movie-title"><?php echo $movie['movies_title']; ?></h2>
                    <h4 class="release-date">Released: <?php echo $movie['movies_release']; ?></h4>
                    <h5 class="runtime">Runtime: <?php echo $movie['movies_runtime']; ?></h5>
                    <p class="storyline"><?php echo $movie['movies_storyline']; ?></p>
                    <a href="index.php">Back</a>
                </div>
            </div>
    </section>
    <?php else:?>
        <p>Sorry, that movie was not found!</p>
    <?php endif;?>   
    <?php include 'templates/footer.php'; ?>



</body>
</html>