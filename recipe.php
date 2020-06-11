<?php
// Step 1 Open a connection to DB
require 'include/db.php';
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>The Chew • Recipe</title>
        <meta charset="UTF-8">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="main.css"> </head>
    <header>
        <div class="home">
            <a href="index.php"> <img src="imgs/spoon.png"> </a>
        </div>
    </header>

    <body>
        <div class="wrapper">
            <?php
       // Get the ID number passed to this page
       $id = $_GET['id']; 
       // Query for said ID number 
       // Step 2 Perform a DB Table query 
        $table = 'recipes';
        $query = "SELECT * FROM {$table} WHERE id={$id}";
        $result = mysqli_query($connection, $query);

       // Check for errors in SQL statement 

        if(!$result ) {
        die('Database query failed');
        } else {
            $row = mysqli_fetch_assoc($result);
//          print_r($row);
        }
        
       // Extract record information 
        ?>
                <div class="plateimg"><img src="graphics/<?php echo $row[main_img];?>"></div>
                <div class="platetext">
                    <h1><?php echo $row['tle']; ?></h1>
                    <h3><?php echo $row['subtitle']; ?></h3>
                    <p>
                        <?php echo $row['description']; ?>
                    </p>
                    <ul>
                        <li> Cook Time:
                            <?php echo $row['cook_time'];?>
                        </li>
                        <li> Servings:
                            <?php echo $row['servings'];?>
                        </li>
                        <li> Cals/Serving:
                            <?php echo $row['cal_per_serving']; ?>
                        </li>
                    </ul>
                </div>
                <div class="ingredients">
                    <h2>Ingredients</h2> <img src="graphics/<?php echo $row[ingredients_img];?>">
                    <ul>
                        <?php
            
            $ingredStr = $row['all_ingredients'];
            // echo $ingredStr;
            
            // Convert string into array
            $ingredArray = explode("*", $ingredStr);
           // print_r($ingredArray);
            for ($lp = 0; $lp < count($ingredArray); $lp++) {
                $oneIngred = $ingredArray[$lp];
                echo "<li>" . $oneIngred . "</li>";
            }
            
            ?>
                    </ul>
                </div>
                <!--        Build out the steps -->
                <div class="instructions">
                    <?php 
        
            
            // Get the step data 
            $stepImgStr = $row['step_imgs'];
            $allStepStr = $row['all_steps'];
            
//            print_r($stepImgStr);
//            print_r($allStepStr);
                    
            $stepImgArray = explode("*", $stepImgStr);
            $allStepArray = explode("*", $allStepStr);
                    
                    
            for ($lp = 0; $lp < count($stepImgArray); $lp++) {
                $oneStepImg = $stepImgArray[$lp];
                $oneStepStr = $allStepArray[$lp];
                
//                echo "image file name " . $oneStepImg . "</br>";
//                echo "step instrucitons " . $oneStepStr . "</br>";
                
                echo "<div class=\"instructions\">";
                echo "<img src=\"graphics/" . $oneStepImg . "\"alt=\"step image\">";
                echo "<p>";
                echo $oneStepStr;
                echo "</p>";
                echo "</div>";
            }
            
            // Loop thru step data and build steps
            
            ?>
                </div>
        </div>
        <div class="box">
            <a class="button" href="#popup1"> <img src="imgs/help.png"></a>
            <div id="popup1" class="overlay">
                <div class="popup">
                    <h1>We're here to Help!</h1> <a class="close" href="#">&times;</a>
                    <div class="content">
                        <h2>Browse for recipes on the home page, filter your preferencecs, and follow the steps for a delicious meal.
                    </h2> <img src="imgs/logo.png"> </div>
                </div>
            </div>
        </div>
    </body>

    </html>