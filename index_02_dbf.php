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
    <?php 
    while($row = mysqli_fetch_assoc($result)) {
      //  var_dump($row);
        $title = $row['tle'];
        $subTitle = $row['subtitle'];
        echo $title;
        echo $subTitle;
        echo "<hr>";
    }  
    
    
    // Step 4 Release returned data
    mysqli_free_result($result);
    
    // Step 5 Close DB connection
    mysqli_close($connection);
    
?>
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
            <div class="card">
                <div class="card-content">
                    <a href="recipe.html"> <img src="imgs/anchohero.jpg"> </a>
                    <h2 class="card-title">Ancho-Orange Chicken</h2>
                    <p class="card-subtitle">With Kale Rice & Roasted Carrots</p>
                    <div class="card-info">
                        <div class="card-span">
                            <p class="card-mins">Cook Time: 45 mins</p>
                        </div>
                        <div class="card-span">
                            <p class="card-cals">Calories/Serving: 600</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content"> <img src="imgs/beefhero.jpg">
                    <h2 class="card-title">Beef Medallions & Mushroom Sauce</h2>
                    <p class="card-subtitle">With Mashed Potatoes</p>
                    <div class="card-info">
                        <div class="card-span">
                            <p class="card-mins">Cook Time: 40 mins</p>
                        </div>
                        <div class="card-span">
                            <p class="card-cals">Calories/Serving: 700</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content"> <img src="imgs/sandwichhero.jpg">
                    <h2 class="card-title">Broccoli & Basil Pesto Sandwiches</h2>
                    <p class="card-subtitle">With Romaine & Citrus Salad</p>
                    <div class="card-info">
                        <div class="card-span">
                            <p class="card-mins">Cook Time: 45 mins</p>
                        </div>
                        <div class="card-span">
                            <p class="card-cals">Calories/Serving: 910</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content"> <img src="imgs/calzonehero.jpg">
                    <h2 class="card-title">Broccoli & Mozzarella Calzones</h2>
                    <p class="card-subtitle">With Caesar Salad</p>
                    <div class="card-info">
                        <div class="card-span">
                            <p class="card-mins">Cook Time: 50 mins</p>
                        </div>
                        <div class="card-span">
                            <p class="card-cals">Calories/Serving: 930</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content"> <img src="imgs/honeyhero.jpg">
                    <h2 class="card-title">Honey-Butter Barramundi</h2>
                    <p class="card-subtitle">With Za'atar Roasted Vegetables</p>
                    <div class="card-info">
                        <div class="card-span">
                            <p class="card-mins">Cook Time: 45 mins</p>
                        </div>
                        <div class="card-span">
                            <p class="card-cals">Calories/Serving: 470</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content"> <img src="imgs/fishhero.jpg">
                    <h2 class="card-title">Crispy Fish Sandwiches</h2>
                    <p class="card-subtitle">With Tartar Sauce & Roasted Sweet Potato Wedges</p>
                    <div class="card-info">
                        <div class="card-span">
                            <p class="card-mins">Cook Time: 40 mins</p>
                        </div>
                        <div class="card-span">
                            <p class="card-cals">Calories/Serving: 790</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
