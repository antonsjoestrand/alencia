<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    $news_active = true;
    $title = "News";

    include("includes/helmet.php");
    include("libs/functions.php");

    connectDatabase();

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

    $news_image = array();

    while($row = mysqli_fetch_array($result)) {
        $news_image[]=$row["image"];
    }

    $result = mysqli_query($con, $sql);
    
    ?>
</head>
<body>

    <div class="wrapper">

        <?php include("includes/mainnav.php"); ?>
        <?php include("includes/mobilenav.php"); ?>
        
        <div class="header">
            <div class="background" style="background-image: url('<?=$news_image["5"]?>')">
                <h2>News</h2>
            </div>
        </div>

        <div class="news">
            <div class="section-title">
                <h3>News articles</h3>
            </div>
            <div class="articles">
                <?php
                while($row = mysqli_fetch_assoc($result)) 
                { ?>
                    <div class="article-card">
                        <a href="show_article.php?article_id=<?=$row["id"]?>">
                            <div class="article-image" style="background-image: url('<?=$row["image"]?>')"></div>
                            <div class="content">
                                <h5 class="accent"><?=$row["category"]?></h5>
                                <h4><?=$row["title"]?></h4>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        
        <?php include("includes/mainfooter.php"); ?>
        <?php include("includes/mobilefooter.php"); ?>
        
    </div>
    
    <script src="js/main.js"></script>
    
</body>
</html>