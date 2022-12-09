<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="static/css/style.css">

    <title>Available Artwork</title>
</head>

<body>
    <h1>Available Artwork<h1>

<?php include 'mysql.php';
// Execute the SQL query
$result = $conn->query(
    "SELECT * FROM artwork a \n"
  . "WHERE a.name NOT IN (SELECT t.art_name FROM transactions t) \n"
  . "ORDER BY a.group_name ASC"
);

// Print the results
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Title</th>";
    echo "<th>Creation Date</th>";
    echo "<th>Art Style</th>";
    echo "<th>Price</th>";
    echo "<th>Artist</th>";
    echo "<th>Art Group</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["year"] . "</td>";
        echo "<td>" . $row["style_name"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["artist_name"] . "</td>";
        echo "<td>" . $row["group_name"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No results found.";
}
?>

</body>

</html>
