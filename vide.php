<?php
// Redirection vers la page index.html
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['find']) || $_SESSION['find'] !== true) {
    header('Location: http://localhost/TRAVAUX/index.php');
    exit();
}

// Include database connection file
include('file.php');

// Vérifiez si la connexion est ouverte
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection established successfully.<br>";
}

// Function to get counts of different request statuses
function getRequestCounts($conn) {
    $counts = [
        'validated' => 0,
        'rejected' => 0,
        'total' => 0
    ];

    // Query to get the count of validated requests
    $query_validated = "SELECT COUNT(*) AS count FROM demandes WHERE status = 'validé'";
    $result_validated = $conn->query($query_validated);
    if ($result_validated && $result_validated->num_rows > 0) {
        $row = $result_validated->fetch_assoc();
        $counts['validated'] = $row['count'];
    } else {
        echo "Error: " . $conn->error . "<br>";
    }

    // Query to get the count of rejected requests
    $query_rejected = "SELECT COUNT(*) AS count FROM demandes WHERE status = 'rejeté'";
    $result_rejected = $conn->query($query_rejected);
    if ($result_rejected && $result_rejected->num_rows > 0) {
        $row = $result_rejected->fetch_assoc();
        $counts['rejected'] = $row['count'];
    } else {
        echo "Error: " . $conn->error . "<br>";
    }

    // Query to get the total count of requests
    $query_total = "SELECT COUNT(*) AS count FROM demandes";
    $result_total = $conn->query($query_total);
    if ($result_total && $result_total->num_rows > 0) {
        $row = $result_total->fetch_assoc();
        $counts['total'] = $row['count'];
    } else {
        echo "Error: " . $conn->error . "<br>";
    }

    return $counts;
}

// Function to get recent requests
function getRecentRequests($conn) {
    $requests = [];
    $query = "SELECT titre, description, status FROM demandes ORDER BY description DESC LIMIT 5";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $requests[] = $row;
        }
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
    return $requests;
}

// Get counts and recent requests
$counts = getRequestCounts($conn);
$recent_requests = getRecentRequests($conn);

// Afficher les résultats pour débogage
echo "<pre>";
print_r($counts);
print_r($recent_requests);
echo "</pre>";

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord du DG</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Style de base */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            background-color: #2d3e50;
            color: #fff;
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
        .sidebar ul li a:hover {
            color: #00b4d8;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        h1, h2 {
            color: #333;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .stat-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            width: 30%;
        }
        .stat-item h3 {
            margin: 0;
            font-size: 24px;
            color: #555;
        }
        .stat-item p {
            font-size: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
        }
        /* Status colors */
        .status-validé {
            color: green;
        }
        .status-rejeté {
            color: red;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="dashboard_dg.php">Tableau de bord</a></li>
            <li><a href="#">Rapports</a></li>
            <li><a href="#">Paramètre</a></li>
            <li><a href="logout.php">Se déconnecter</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Tableau de bord du DG</h1>
        <div class="stats">
            <div class="stat-item">
                <h3>Demandes validées</h3>
                <p id="validated-requests"><?php echo $counts['validated']; ?></p>
            </div>
            <div class="stat-item">
                <h3>Demandes rejetées</h3>
                <p id="rejected-requests"><?php echo $counts['rejected']; ?></p>
            </div>
            <div class="stat-item">
                <h3>Total des demandes</h3>
                <p id="total-requests"><?php echo $counts['total']; ?></p>
            </div>
        </div>
        <h2>Récentes demandes</h2>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="recent-requests">
                <?php foreach ($recent_requests as $request): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($request['titre']); ?></td>
                        <td><?php echo htmlspecialchars($request['description']); ?></td>
                        <td class="status-<?php echo strtolower($request['status']); ?>"><?php echo ucfirst($request['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
