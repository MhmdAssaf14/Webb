<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
    
    <link rel="icon" href="Uploads/alwanas-white-01-removebg-preview.png" type="image/icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
           
            background-color: #f4f4f4;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 100px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            display: block;
            max-width: 50px;
            max-height: 50px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<?php
include("authentication.php");
$userId = $_SESSION["UserId"];
require("Config.php");
$query = "SELECT I.ID, I.Name, I.Price, I.Image, O.OrderDate, O.OrderNb 
          FROM item I 
          INNER JOIN `order` O ON I.ID = O.itemId 
          WHERE O.UserId = $userId";

$result = mysqli_query($con, $query);

echo "<table>";
echo "<tr> 
        <th>Order #</th> 
        <th></th> 
        <th>Name</th> 
        <th>Price</th>
        <th>Order Date</th>
      </tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>{$row["OrderNb"]}</td>";
    $img = $row["Image"];
    echo "<td><img src='Uploads/$img' alt='Item Image'/></td>";
    echo "<td>{$row["Name"]}</td>";
    echo "<td>{$row["Price"]}$</td>";
    echo "<td>{$row["OrderDate"]}</td>";
    echo "</tr>";
}

echo "</table>";
?>
</body>
</html>
