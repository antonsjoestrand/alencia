<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    $about_us_active = true;
    $title = "About us";

    include("includes/helmet.php");
    include("libs/functions.php");

    connectDatabase();

    // Grab the images for about us
    $sql = "SELECT
    about_us.id,
    about_us.image
    FROM about_us";

    $result = mysqli_query($con, $sql);

    $about_us_image = array();

    while($row = mysqli_fetch_array($result)) {
        $about_us_image[]=$row["image"];
    }

    // Grab the team members
    $sql = "SELECT
    team_members.id,
    team_members.name,
    team_members.image,
    department.name AS department
    FROM team_members
    LEFT JOIN department on department.id=team_members.department_id";

    $result = mysqli_query($con, $sql);

    ?>
</head>
<body>

    <div class="wrapper">

        <?php include("includes/mainnav.php"); ?>
        <?php include("includes/mobilenav.php"); ?>
        
        <div class="header">
            <div class="background" style="background-image: url('<?=$about_us_image["0"]?>')">
                <h2>About us</h2>
            </div>
        </div>

        <div class="about" id="learnmore">
            <div class="title">
                <h3>We design with your future in mind</h3>
            </div>
            <div class="content">
                <p>The future of our generations are now more 
                important than ever. Whether around the 
                corner or across the globe, we need to find a 
                way of making this world a better and safer 
                place. A place for our kids, our future kids, 
                and their kids. We are committed and driven 
                to build the bridges for the future using our 
                technology and innovation.</p>

                <p>We care about the communities we serve, 
                because they’re our communities too. This 
                allows us to assess what’s needed and 
                connect our expertise, to appreciate 
                nuances and envision what’s never 
                been considered, to bring together diverse 
                perspectives so we can collaborate toward 
                a shared success.</p>

                <p>We’re designers, engineers, scientists, and 
                project managers, innovating together at 
                the intersection of community, creativity, 
                and client relationships. Balancing these 
                priorities results in projects that advance 
                the quality of life in communities across 
                the globe.</p>
            </div>
        </div>

        <div class="technology">
            <div class="background" style="background-image: url('<?=$about_us_image["1"]?>')"></div>
            <div class="content">
                <div class="title">
                    <h3>Our technology</h3>
                </div>
                <p>At alencia, our business objective is to maintain our position as a top tier 
                global design and delivery firm. Our local strength, knowledge, and relationships, 
                coupled with our world-class technology, have allowed us to go anywhere to meet 
                our clients’ needs in more creative and personalized ways. With a long-term 
                commitment to the people and places we serve, alencia has the unique ability to 
                connect to projects on a personal level and advance the quality of life in 
                communities across the globe. We believe continued growth will increase shareholder 
                value and give alencia employees the opportunity to work with the best clients, 
                on the best projects, and deliver exceptional service.</p>
            </div>
        </div>

        <div class="team">
            <div class="section-title">
                <h3>Meet our brilliant team</h3>
            </div>
            <div class="members">
                <?php
                 while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="member-card">
                        <div class="member" style="background-image: url('<?=$row["image"]?>')"></div>
                        <div class="role">
                            <h4><?=$row["name"]?></h4>
                            <p><?=$row["department"]?></p>
                        </div>
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