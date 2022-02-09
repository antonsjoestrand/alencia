<?php

include("libs/functions.php");

connectDatabase();

$full_name = $_POST["full_name"];
$email = $_POST["email"];
$country = $_POST["country"];
$message_subject = $_POST["message_subject"];
$message_content = $_POST["message_content"];

$sql = "INSERT INTO contact_form (full_name, email, country, message_subject, message_content) VALUES ('".$full_name."', '".$email."', '".$country."', '".$message_subject."', '".$message_content."')";

mysqli_query($con, $sql);

header("location: success.php");

?>