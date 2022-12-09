<?php include 'mysql.php';
$year = $_POST["year"];

// Escape the input string to prevent SQL injection attacks
$year = mysqli_real_escape_string($conn, $year);

// Execute the SQL query
$result = $conn->query(
    "SELECT a.group_name, SUM(a.price) AS total_sales \n"
  . "FROM transactions t \n"
  . "INNER JOIN artwork a \n"
  . "ON t.art_name = a.name \n"
  . "WHERE YEAR(t.day) = '$year' \n"
  . "GROUP BY a.group_name \n"
  . "ORDER BY total_sales DESC"
);

$data = array();

// Print the results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[$row["group_name"]] = $row["total_sales"];
    }
}

$data_js = json_encode($data);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="static/css/style.css">
    <script src="static/js/chart.js"></script>

    <title>Grouped Sales</title>
</head>

<body>
    <h1>Sales per Art Group for the year <?php echo $_POST["year"];?><h1>
    <canvas id="pie-chart" height="500"></canvas>

    <script>
        const ctx = document.getElementById('pie-chart');

        new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: Object.keys(<?php echo $data_js;?>),
                    datasets: [{
                        label: 'Total Sales per Art Group',
                        data: Object.values(<?php echo $data_js;?>),
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                }
        });
    </script>
</body>
</html>
