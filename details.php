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
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h1>Movie CMS</h1>
    <?php include 'templates/header.php'; ?>
    <?php if (!empty($movie)):?>

    <div class="movie-item">
        <img class="movie-img" src="images/<?php echo $movie['movies_cover']; ?>" alt="<?php echo $movie['movies_title']; ?> Cover Image">
        <h2 class="movie-title"><?php echo $movie['movies_title']; ?></h2>
        <h4 class="release-date">Released: <?php echo $movie['movies_release']; ?></h4>
        <h5 class="runtime">Runtime: <?php echo $movie['movies_runtime']; ?></h5>
        <p class="storyline"><?php echo $movie['movies_storyline']; ?></p>
        <a href="#">More details...</a>
    </div>
    <?php else:?>
        <p>Sorry, that movie was not found!</p>
    <?php endif;?>   
    <?php include 'templates/footer.php'; ?>



</body>
</html>