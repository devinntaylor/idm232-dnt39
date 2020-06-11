<?php
    //Step 1 open a connection to database
    require'include/db.php';

    //Get filter info if passed in URL
    $filter = $_GET['filter'];
//    print_r($filter);

    $table = 'recipes';

    if (isset($_POST['submit'])){
   
    $search = $_POST['search'];
//        print_r($search); 
        
        $query = "SELECT * FROM {$table} WHERE tle LIKE '%{$search}%' OR subtitle  LIKE '%{$search}%'";
    $result = mysqli_query($connection, $query);
//     print_r($result); 
    if (!$result){
        die('Search query failed');
        }
    } else if (isset($filter)) {
          $query = "SELECT * FROM {$table} WHERE proteine LIKE '%{$filter}%'";
        $result = mysqli_query($connection, $query);
    } else {
        
    // Step 2 preform and DB table query
    $query = "SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);

    // Check for errors
    if (!$result){
        die('Database query failed');
    }
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
    <link rel="stylesheet" href="recipe.php">
    <link rel="stylesheet" href="fontsheet.css">
</head>

<body>
    <div class="indexwrap">
        <div id="navbar">
            <div class="search-container">
                <div class="align">
                    <form action="index.php" method="POST" class="form form--search">
                        <div class="form__field">
                            <input type="search" placeholder="Search…" name="search">
                            <input type="submit" name="submit" value="GO"> </div>
                    </form>
                </div>
            </div>
            <header>
                <div class="logo">
                    <h1>The Chew
                        <a href="index.php"> <img src="imgs/spoon.png"> </a>
                    </h1>
                </div>
            </header>
            <div id="browse">
                <h3>Browse by Category&#33;</h3>
                <li><a href="index.php?filter=Beef">Beef</a></li>
                <li><a href="index.php?filter=Chicken">Chicken</a></li>
                <li><a href="index.php?filter=Fish">Fish</a></li>
                <li><a href="index.php?filter=Pork">Pork</a></li>
                <li><a href="index.php?filter=Vegetarian">Vegetarian</a></li>
            </div>
        </div>
        <!--Cards!-->
        <div class="cards">
            <?php 
    while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card">
                <!--              <a href="recipe.php"> -->
                <?php
                $id = $row['id'];
                echo "<a href=\"recipe.php?id={$id}\">";
               ?> <img src="graphics/<?php echo $row[main_img];?>"> </a>
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
            <div id="popup1" class="overlay">
                <div class="popup">
                    <h1>We're here to Help!</h1> <a class="close" href="#">&times;</a>
                    <div class="content">
                        <h2>Browse for recipes on the home page, filter your preferencecs, and follow the steps for a delicious meal.
                        </h2> <img src="imgs/logo.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <a class="button" href="#popup1"> <img src="imgs/help.png"></a>
        </div>
        <footer class="copyright">
            <div class="up" id="up">
                <p>&copy; 2020 Devin Taylor</p>
            </div>
        </footer>
</body>

</html>
