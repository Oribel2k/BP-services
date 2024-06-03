<?php
if (isset($_SESSION['find_dg']) && $_SESSION['find_dg'] !== true) {
        header("Location: http://localhost/TRAVAUX/dashboard_dg.php");
        exit();
    } 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord du DG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header h1{
            margin-left : 200px;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
        }
        .sidebar .header {
            padding: 20px;
            text-align: center;
            background-color: #005c3d; /* Adjust this to match your theme */
            color: #fff;
        }
        .sidebar nav a {
            padding: 15px 20px;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .sidebar nav a:hover {
            background-color: #f4f4f4;
        }
        .sidebar nav a span {
            margin-left: 10px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .main-content .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .main-content .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .stats-cards {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .stats-cards .card {
            background-color: #fff;
            padding: 20px;
            flex: 1;
            margin-right: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stats-cards .card:last-child {
            margin-right: 0;
        }
        .stats-cards .card h3 {
            margin: 0;
            font-size: 22px;
        }
        .stats-cards .card p {
            margin: 10px 0 0;
            font-size: 18px;
        }
        .recent-activities {
            margin-top: 40px;
        }
        .recent-activities table {
            width: 100%;
            border-collapse: collapse;
        }
        .recent-activities table th,
        .recent-activities table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .recent-activities table th {
            background-color: #f4f4f4;
        }
        .recent-activities table tbody tr:hover {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="header">
            <h2>Admin Panel</h2>
        </div>
        <nav>
            <a href="dashboard_dg.php"><span>🏠</span>Tableau de bord</a>
            <a href="#"><span>📊</span>Rapports</a>
            <a href="#"><span>⚙️</span>Paramètre</a>
            <a href="#"><span>🔴</span>Se déconnecter</a>
        </nav>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Tableau de bord du DG</h1>
        </div>
        <div class="stats-cards">
            <div class="card">
                <h3>Garçons</h3>
                <!-- <p>1020</p> -->
            </div>
            <div class="card">
                <h3>Filles</h3>
                <!-- <p>2834</p> -->
            </div>
            <div class="card">
                <h3>Total Inscrits</h3>
                <!-- <p>2543</p> -->
            </div>
        </div>
        <div class="recent-activities">
            <h2>Récentes demandes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom et Prénoms</th>
                        <th>Type de demande</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>will</td>
                        <td>01-10-2021</td>
                        <td><span style="color: green;">Completed</span></td>
                    </tr>
                    <tr>
                        <td>will</td>
                        <td>01-10-2021</td>
                        <td><span style="color: orange;">Pending</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
