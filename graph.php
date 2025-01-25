<?php include 'menu.php'; ?>
<?php
$conn = new mysqli('localhost', 'root', '', 'admin');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$sql = "SELECT status, COUNT(*) AS count FROM absences GROUP BY status";
$result = $conn->query($sql);

$statuses = [];
$counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $statuses[] = $row['status'];
        $counts[] = $row['count'];
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Graphique des absences</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="graph.css">
</head>
<body>
<h1>Graphique des absences</h1>
<canvas id="absenceChart" width="400" height="200"></canvas>
<script>
    const ctx = document.getElementById('absenceChart').getContext('2d');
    const absenceChart = new Chart(ctx, {
        type: 'bar', // Vous pouvez utiliser 'pie' ou 'doughnut' pour un graphique circulaire
        data: {
            labels: <?php echo json_encode($statuses); ?>,
            datasets: [{
                label: 'Nombre d\'absences',
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
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
