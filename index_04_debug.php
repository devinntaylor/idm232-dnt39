<?php
// Step 1 Open a connection to DB
require 'include/db.php';

// Step 2 Perform a DB Table query 
$table = 'recipes';
$query = "SELECT * FROM {$table}";
$result = mysqli_query($connection, $query);


// Check for errors in SQL statement 

if(!$result ) {
    die('Database query failed');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>The Chew • Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="recipe.html">
    <link rel="stylesheet" href="fontsheet.css">
</head>

<body>
    <div class="indexwrap">
        <header>
            <div class="search">
                <input id="search" name="Search" type="search" placeholder="Search..." value="" />
                <button type="submit">GO</button>
            </div>
            <div class="logo">
                <h1>The Chew
                    <img src="imgs/spoon.png">
                </h1>
            </div>
        </header>
        <div class="filter">
            <button type="button">Meat</button>
            <button type="button">Vegeterian</button>
            <button type="button">Fish</button>
        </div>
        <!--Cards!-->
        <div class="cards">
            <?php 
    while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card"> <a href="recipe.html"> <img src="graphics/<?php echo $row[main_img];?>"> </a>
                <div class="card-title">
                    <?php echo $row[tle];?>
                </div>
                <p class="card-subtitle">
                    <?php echo $row[subtitle];?>
                </p>
                <div class="card-info">
                    <div class="card-span">
                        <p class="card-mins">Cook Time: 45 mins</p>
                    </div>
                    <div class="card-span">
                        <p class="card-cals">Calories/Serving: 600</p>
                    </div>
                </div>
            </div>
            <?php 
    }  // end php while loop
    
    
    // Step 4 Release returned data
    mysqli_free_result($result);
    
    // Step 5 Close DB connection
    mysqli_close($connection);
    
    ?>
            <div class="box">
                <a class="button" href="#popup1"> <img src="imgs/help.png"></a>
            </div>
            <div id="popup1" class="overlay">
                <div class="popup">
                    <h1>We're here to Help!</h1> <a class="close" href="#">&times;</a>
                    <div class="content">
                        <h2>Browse for recipes on the home page, filter your preferencecs, and follow the steps for a delicious meal.
                        </h2> <img src="imgs/logo.png">
                    </div>
                </div>
            </div>
            <footer class="copyright">
                <div class="up" id="up">
                    <p>&copy; 2020 Devin Taylor</p>
                </div>
            </footer>
        </div>
</body>

</html>
