<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    $title = "Alencia - VanArts mockup project";

    include("includes/helmet.php");
    include("libs/functions.php");

    connectDatabase();

    // Grabbing intro images
    $sql = "SELECT
    home.id,
    home.image
    FROM home";

    $result = mysqli_query($con, $sql);

    $intro = array();

    // Fetches each image path from the database and puts it into the array
    while($row = mysqli_fetch_array($result)) {
        $intro[]=$row["image"];
    }

    // Grabbing news
    $sql = "SELECT
    news.id,
    news.title,
    news.image,
    news.text,
    category.name AS category
    FROM news
    LEFT JOIN category on category.id=news.category_id";

    $result = mysqli_query($con, $sql);

    $latest_article_id = array();
    $latest_article_title = array();
    $latest_article_image = array();
    $latest_article_category = array();

    while($row = mysqli_fetch_array($result)) {
        $latest_article_id[]=$row["id"];
        $latest_article_title[]=$row["title"];
        $latest_article_image[]=$row["image"];
        $latest_article_category[]=$row["category"];
    }

    // Grabbing recent projects
    $sql = "SELECT
    projects.id,
    projects.title,
    projects.image,
    city.name AS city
    FROM projects
    LEFT JOIN city on city.id=projects.city_id";

    $result = mysqli_query($con, $sql);

    $recent_project_title = array();
    $recent_project_image = array();
    $recent_project_city = array();

    while($row = mysqli_fetch_array($result)) {
        $recent_project_title[]=$row["title"];
        $recent_project_image[]=$row["image"];
        $recent_project_city[]=$row["city"];
    }

    ?>
</head>
<body>

    <div class="wrapper">

        <?php include("includes/mainnav.php"); ?>
        <?php include("includes/mobilenav.php"); ?>

        <div class="intro">
            <div class="content">
                <div class="tagline">
                    <h1><span>We</span> design with <span>your</span> future in mind</h1>
                    <a href="about_us.php#learnmore">Learn more</a>
                </div>
            </div>
            <div class="image1" style="background-image: url('<?=$intro["0"]?>')"></div>
            <div class="image2" style="background-image: url('<?=$intro["1"]?>')"></div>
            <div class="image3" style="background-image: url('<?=$intro["2"]?>')"></div>
        </div>

        <div class="latest">
            <div class="section-title">
                <h3>Latest news</h3>
            </div>
            <div class="highlights">
                <div class="item">
                    <a href="show_article.php?article_id=<?=$latest_article_id["0"]?>">
                        <div class="highlight1" style="background-image: url('<?=$latest_article_image["0"]?>')"></div>
                        <div class="text">
                            <h5 class="accent"><?=$latest_article_category["0"]?></h5>
                            <h4><?=$latest_article_title["0"]?></h4>
                        </div>
                    </a>    
                </div>
                <div class="item">
                   <a href="show_article.php?article_id=<?=$latest_article_id["2"]?>">
                        <div class="highlight2" style="background-image: url('<?=$latest_article_image["2"]?>')"></div>
                        <div class="text">
                            <h5 class="accent"><?=$latest_article_category["2"]?></h5>
                            <h4><?=$latest_article_title["2"]?></h4>
                        </div>
                    </a> 
                </div>
            </div>
            <!-- Hidden on mobile view -->
            <div class="news-articles">
                <div class="spotlight spotlight1">
                    <h5><?=$latest_article_category["1"]?></h5>
                    <h4><?=$latest_article_title["1"]?> and how they will work in the future</h4>
                    <a href="show_article.php?article_id=<?=$latest_article_id["1"]?>">Read more</a>
                </div>
                <div class="spotlight spotlight2">
                    <h5><?=$latest_article_category["3"]?></h5>
                    <h4><?=$latest_article_title["3"]?> and how bridges might be the key</h4>
                    <a href="show_article.php?article_id=<?=$latest_article_id["3"]?>">Read more</a>
                </div>
                <div class="spotlight spotlight3">
                    <h5><?=$latest_article_category["4"]?></h5>
                    <h4><?=$latest_article_title["4"]?> and designing the impossible</h4>
                    <a href="show_article.php?article_id=<?=$latest_article_id["4"]?>">Read more</a>
                </div>
                <div class="spotlight spotlight4">
                    <h5><?=$latest_article_category["6"]?></h5>
                    <h4><?=$latest_article_title["6"]?> and we are prepared for the worst</h4>
                    <a href="show_article.php?article_id=<?=$latest_article_id["6"]?>">Read more</a>
                </div>
            </div>
        </div>

        <div class="recent">
            <div class="section-title dark-section">
                <h3 class="accent">Recent projects</h3>
            </div>
            <div class="projects">
                <div class="recent-project">
                    <a href="gondolas.php#recent1">
                        <div class="recent-project1" style="background-image: url('<?=$recent_project_image["0"]?>')"></div>
                        <div class="text">
                            <h4><?=$recent_project_title["0"]?></h4>
                            <h5 class="accent"><?=$recent_project_city["0"]?></h5>
                        </div>
                    </a>
                </div>
                <div class="recent-project">
                   <a href="bridges.php#recent2">
                        <div class="recent-project2" style="background-image: url('<?=$recent_project_image["1"]?>')"></div>
                        <div class="text">
                            <h4><?=$recent_project_title["1"]?></h4>
                            <h5 class="accent"><?=$recent_project_city["1"]?></h5>
                        </div>
                    </a>
                </div>
                <div class="recent-project">
                   <a href="bridges.php#recent3">
                        <div class="recent-project3" style="background-image: url('<?=$recent_project_image["2"]?>')"></div>
                        <div class="text">
                            <h4><?=$recent_project_title["2"]?></h4>
                            <h5 class="accent"><?=$recent_project_city["2"]?></h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <?php include("includes/mainfooter.php"); ?>
        <?php include("includes/mobilefooter.php"); ?>

    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

</body>
</html>