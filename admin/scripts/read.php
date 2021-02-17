<?php 

// note, database is not secure here. reference user.php to see how the array and :placeholders secure our sql queries... also, good luck.

function getAllMovies() {
    $pdo = Database::getInstance()->getConnection();
    $queryAll = "SELECT * FROM tbl_movies";
    $runAll = $pdo->query($queryAll);
    $movies = $runAll->fetchAll(PDO::FETCH_ASSOC);

    if ($movies) {
        return $movies;
    } else {
        return "Uh oh! There was a problem accessing the requested information!";
    }
}


function getSingleMovie($id){
    $pdo = Database::getInstance()->getConnection();
    $querySingle = 'SELECT * FROM tbl_movies WHERE movies_id = "'.$id.'"';
    $runSingle = $pdo->query($querySingle);
    
    if ($runSingle) {
        $movie = $runSingle->fetch(PDO::FETCH_ASSOC);
        return $movie;
    } else {
        return 'There was a problem to fetch single movie for '.$id;
    }
}

function getMoviesByGenre($genre) {
    $pdo = Database::getInstance()->getConnection();
    ## TODO: finish the following SQL query that fetch all movies that belongs to the given genre
    $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) as genre_name FROM tbl_movies m';
    $query.= ' LEFT JOIN tbl_mov_genre link ON link.movies_id = m.movies_id';
    $query.= ' LEFT JOIN tbl_genre g ON link.genre_id = g.genre_id';
    $query.= ' GROUP BY m.movies_id';
    $query.= ' HAVING genre_name LIKE "%'.$genre.'%"';
    $runGenre = $pdo->query($query);

//    echo $query;
//    exit;
    
    if ($runGenre) {
        $movies = $runGenre->fetchAll(PDO::FETCH_ASSOC);
        return $movies;
    } else {
        return 'There was a problem fetching movies by'.$genre;
    }
}

?>