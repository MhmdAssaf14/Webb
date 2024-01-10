<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>

    <link rel="icon" href="Uploads/alwanas-white-01-removebg-preview.png" type="image/icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .card {
       
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }
</style>
</head>
<body>

<?php
include("authentication.php");

// Redirect to login if not logged in

if (!isset($_SESSION["LoggedIN"]) && $_SESSION["LoggedIN"] != 1) {
    header("Location: login.php");
}
require("Config.php");

    $itemId = base64_decode($_GET["x"]);
    $query = "SELECT * FROM item WHERE ID = $itemId";
    $stmt = mysqli_query($con, $query);

    
    while ($row = mysqli_fetch_array($stmt)) {
        echo "<div class='col-12 col-md-12 col-lg-4'>";
        echo "<div class='card text-light text-center bg-white pb-2'>";
        echo "<div class='card-body text-dark'>";
        $img = $row["Image"];
        echo "<div class='img-area'><img src='Uploads\\$img' class='img-fluid' alt='Product Image'/></div>";
        echo "<h3 class='card-title'>".$row["Name"]."</h3>";
        echo "<p class='lead'>". $row["Price"] . "$"." / piece </p>" ;
        $id = $row["ID"]; // Item Id
        $id = base64_encode($id);
        echo "<a href='index.php' class='back-link'>Back to List</a> </br>";
        $id = base64_encode($row["ID"]);
        echo "<button class='btn bg-warning text-dark'><a style='text-decoration: none; color: black;' class='submit-link' onclick='return confirm(\"Are you sure?\")' href='OrderAction.php?x=$id'>Submit Order</a></button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        echo"</br>";
    }
    echo "</div>";


?>

</body>
</html>





