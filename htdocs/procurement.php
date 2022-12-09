<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="static/css/style.css">

    <title>Procurement Details</title>
</head>

<body>
    <h1>Procurement Details between <?php echo $_POST["start_date"] . " and " . $_POST["end_date"];?><h1>

<?php include 'mysql.php';
$start_date = $_POST["start_date"];
$end_date   = $_POST["end_date"];

// Escape the input string to prevent SQL injection attacks
$start_date = mysqli_real_escape_string($conn, $start_date);
$end_date   = mysqli_real_escape_string($conn, $end_date);

// Execute the SQL query
$result = $conn->query(
    "SELECT t.art_name, a.group_name, a.artist_name, a.price, t.day, t.cust_name \n"
  . "FROM transactions t \n"
  . "INNER JOIN artwork a \n"
  . "ON t.art_name = a.name \n"
  . "WHERE t.day BETWEEN '$start_date' AND '$end_date' \n"
  . "ORDER BY a.group_name ASC"
);

// Print the results
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Title</th>";
    echo "<th>Art Group</th>";
    echo "<th>Artist</th>";
    echo "<th>Price</th>";
    echo "<th>Date of Purchase</th>";
    echo "<th>Customer</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["art_name"] . "</td>";
        echo "<td>" . $row["group_name"] . "</td>";
        echo "<td>" . $row["artist_name"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["day"] . "</td>";
        echo "<td>" . $row["cust_name"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No results found.";
}
?>

    <h1>Total Sales per Art Group between <?php echo $_POST["start_date"] . " and " . $_POST["end_date"];?><h1>

<?php include 'mysql.php';
// Execute the SQL query
$result = $conn->query(
    "SELECT a.group_name, SUM(a.price) AS group_total \n"
  . "FROM transactions t \n"
  . "INNER JOIN artwork a \n"
  . "ON t.art_name = a.name \n"
  . "WHERE t.day BETWEEN '$start_date' AND '$end_date' \n"
  . "GROUP BY a.group_name \n"
  . "ORDER BY a.group_name ASC"
);

// Print the results
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Art Group</th>";
    echo "<th>Total Sales</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["group_name"] . "</td>";
        echo "<td>" . $row["group_total"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No results found.";
}
?>

</body>

</html>
