<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    $bridges_active = true;
    $title = "Bridges";

    include("includes/helmet.php");
    include("libs/functions.php");

    connectDatabase();

    // Grabbing projects
    $sql = "SELECT
    projects.id,
    projects.title,
    projects.image,
    city.name AS city
    FROM projects
    LEFT JOIN city on city.id=projects.city_id";

    $result = mysqli_query($con, $sql);

    $project_image = array();
    $project_title = array();
    $project_city = array();

    while($row = mysqli_fetch_array($result)) {
        $project_image[]=$row["image"];
        $project_title[]=$row["title"];
        $project_city[]=$row["city"];
    }

    ?>
</head>
<body>

    <div class="wrapper">

        <?php include("includes/mainnav.php"); ?>
        <?php include("includes/mobilenav.php"); ?>
        
        <div class="header">
            <div class="background" style="background-image: url('<?=$project_image["3"]?>')">
                <h2>Bridges</h2>
            </div>
        </div>

        <div class="showcase">
            <div class="projects project1" id="recent2">
                <div class="project" style="background-image: url('<?=$project_image["1"]?>')"></div>
                <div class="content">
                    <h3><?=$project_title["1"]?></h3>
                    <h5 class="accent2"><?=$project_city["1"]?></h5>
                    <p>When we were asked to help Toronto increase the productive capacity of the 
                    existing hoisting plant at the Allan Division Mine outside Saskatoon, 
                    we knew this meant we would be helping farmers yield bountiful crops. 
                    Food which would find its way to your table and ours. To meet production 
                    goals, we analyzed the entire mine hoisting system, from the underground 
                    surge bin to the surface skip dump bin. To avoid a prolonged mine production 
                    hiatus and accommodate higher capacity skips, the expansion required the 
                    production headframe height to be raised. We did this through construction of 
                    a stand-alone, four-leg, A-frame structure with penthouse sheave decks, 
                    a first in Canada. The new steel headframe was the tallest in the world at 
                    the time if its construction, measuring 95.7 meters. The hoisting plant 
                    features a ground mounted four-rope, 234 inch diameter, nominal 12,950 horsepower, 
                    friction hoist; the first application of such a design in Canada.</p>
                </div>
            </div>
            <div class="projects project2" id="recent3">
                <div class="project" style="background-image: url('<?=$project_image["2"]?>')"></div>
                <div class="content">
                    <h3 class="accent"><?=$project_title["2"]?></h3>
                    <h5 class="accent"><?=$project_city["2"]?></h5>
                    <p>When we were asked to help Los Angeles increase the productive capacity of the 
                    existing hoisting plant at the Allan Division Mine outside Saskatoon, 
                    we knew this meant we would be helping farmers yield bountiful crops. 
                    Food which would find its way to your table and ours. To meet production 
                    goals, we analyzed the entire mine hoisting system, from the underground 
                    surge bin to the surface skip dump bin. To avoid a prolonged mine production 
                    hiatus and accommodate higher capacity skips, the expansion required the 
                    production headframe height to be raised. We did this through construction of 
                    a stand-alone, four-leg, A-frame structure with penthouse sheave decks, 
                    a first in USA. The new steel headframe was the tallest in the world at 
                    the time if its construction, measuring 95.7 meters. The hoisting plant 
                    features a ground mounted four-rope, 234 inch diameter, nominal 12,950 horsepower, 
                    friction hoist; the first application of such a design in USA.</p>
                </div>
            </div>
            <div class="projects project3">
                <div class="project" style="background-image: url('<?=$project_image["3"]?>')"></div>
                <div class="content">
                    <h3><?=$project_title["3"]?></h3>
                    <h5 class="accent2"><?=$project_city["3"]?></h5>
                    <p>When we were asked to help Vancouver increase the productive capacity of the 
                    existing hoisting plant at the Allan Division Mine outside Saskatoon, 
                    we knew this meant we would be helping farmers yield bountiful crops. 
                    Food which would find its way to your table and ours. To meet production 
                    goals, we analyzed the entire mine hoisting system, from the underground 
                    surge bin to the surface skip dump bin. To avoid a prolonged mine production 
                    hiatus and accommodate higher capacity skips, the expansion required the 
                    production headframe height to be raised. We did this through construction of 
                    a stand-alone, four-leg, A-frame structure with penthouse sheave decks, 
                    a first in Canada. The new steel headframe was the tallest in the world at 
                    the time if its construction, measuring 95.7 meters. The hoisting plant 
                    features a ground mounted four-rope, 234 inch diameter, nominal 12,950 horsepower, 
                    friction hoist; the first application of such a design in Canada.</p>
                </div>
            </div>
        </div>
        
        <?php include("includes/mainfooter.php"); ?>
        <?php include("includes/mobilefooter.php"); ?>

    </div>
    
    <script src="js/main.js"></script>
    
</body>
</html>