<?php include 'mysql.php';
$year = $_POST["year"];

// Escape the input string to prevent SQL injection attacks
$year = mysqli_real_escape_string($conn, $year);

// Execute the SQL query
$result = $conn->query(
    "SELECT MONTHNAME(t.day) AS month, MONTHNAME(t.day) as monthname, SUM(a.price) AS total_sales \n"
  . "FROM transactions t \n"
  . "INNER JOIN artwork a \n"
  . "ON t.art_name = a.name \n"
  . "WHERE YEAR(t.day) = '$year' \n"
  . "GROUP BY month \n"
  . "ORDER BY month ASC"
);

$data = array(
    "January"=> 0,
    "February"=> 0,
    "March"=> 0,
    "April"=> 0,
    "May"=> 0,
    "June"=> 0,
    "July"=> 0,
    "August"=> 0,
    "September"=> 0,
    "October"=> 0,
    "November"=> 0,
    "December"=> 0
);

// Print the results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[$row["monthname"]] = $row["total_sales"];
    }
}

$data_js = json_encode($data);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="static/css/style.css">
    <script src="static/js/chart.js"></script>

    <title>Monthly Sales</title>
</head>

<body>
    <h1>Sales per Month for the year <?php echo $_POST["year"];?><h1>
    <canvas id="bar-chart" height="100%"></canvas>

    <script>
        const ctx = document.getElementById('bar-chart');

        new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(<?php echo $data_js;?>),
                    datasets: [{
                        label: 'Total Monthly Sales',
                        data: Object.values(<?php echo $data_js;?>),
                        backgroundColor: "#333",
                        borderColor: "#222",
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: true,
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
        });
    </script>
</body>
</html>
