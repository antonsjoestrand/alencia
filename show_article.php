<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    $news_active = true;

    include("libs/functions.php");

    connectDatabase();

    $article_id = $_GET["article_id"];

    // Grabbing news article by specific id 
    $sql = "SELECT * FROM news WHERE id='$article_id'";

    $result = mysqli_query($con, $sql);

    $articleRecord = mysqli_fetch_assoc($result);

    $image = $articleRecord["image"];

    $title = $articleRecord["title"];

    $content = $articleRecord["text"];

    include("includes/helmet.php");
    
    ?>
</head>
<body>

    <div class="wrapper">

        <?php include("includes/mainnav.php"); ?>
        <?php include("includes/mobilenav.php"); ?>
        
        <div class="header">
            <div class="background" style="background-image: url('<?=$image?>')">
                <h2><?=$title?></h2>
            </div>
        </div>

        <div class="article-content">
            <p><?=$content?></p>
        </div>
        
        <?php include("includes/mainfooter.php"); ?>
        <?php include("includes/mobilefooter.php"); ?>
        
    </div>
    
    <script src="js/main.js"></script>
    
</body>
</html>