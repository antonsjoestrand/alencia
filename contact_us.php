<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    $contact_us_active = true;
    $title = "Contact us";

    include("includes/helmet.php");
    include("libs/functions.php");

    connectDatabase();

    // Grabbing locations and information
    $sql = "SELECT
    our_locations.id,
    our_locations.name,
    our_locations.address,
    our_locations.phone,
    our_locations.email
    FROM our_locations";

    $result = mysqli_query($con, $sql);

    ?>
</head>
<body>

    <div class="wrapper">

        <?php include("includes/mainnav.php"); ?>
        <?php include("includes/mobilenav.php"); ?>
        
        <div class="header">
            <div class="world-map">
                <h2>Contact us</h2>
            </div>
        </div>

        <div class="locations">
            <div class="section-title">
                <h3>Our locations</h3>
            </div>
            <div class="cities">
                <?php
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="city-card">
                        <div class="city">
                            <h4><?=$row["name"]?></h4>
                        </div>
                        <div class="content">
                            <p><i class="fas fa-map-marker-alt"></i><?=$row["address"]?></p>
                            <p><i class="fas fa-phone-alt"></i><?=$row["phone"]?></p>
                            <p><i class="fas fa-envelope"></i><?=$row["email"]?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        
        <div class="form" id="contact">
            <div class="section-title dark-section">
                <h3 class="accent">Get in touch</h3>
            </div>
            <div class="container">
                <form method="post" action="save_form.php">
                    
                        
                    <?php
                
                    $formSettings = array (
                        "fields"=>array(
                            array("label"=>"Full name", "type"=>"text", "name"=>"full_name", "placeholder"=>"", "value"=>""),
                            array("label"=>"Email address", "type"=>"email", "name"=>"email", "placeholder"=>"", "value"=>"")
                        )
                    );
                
                    buildForm($formSettings);
                
                    buildCountryList();
                
                    $formSettings = array (
                        "fields"=>array(
                            array("label"=>"Subject", "type"=>"text", "name"=>"message_subject", "placeholder"=>"", "value"=>"")
                        )
                    );
                
                    buildForm($formSettings);
                
                    ?>
                
                    <textarea name="message_content" cols="30" rows="10"></textarea>
                
                    <input type="submit" value="Send message"/>
                
                </form>
                <!-- Hidden on mobile view -->
                <div class="form-background"></div>
            </div>
        </div>
        
        <?php include("includes/mainfooter.php"); ?>
        <?php include("includes/mobilefooter.php"); ?>

    </div class="wrapper">
    
    <script src="js/main.js"></script>
    
</body>
</html>