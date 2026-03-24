<?php
include "db.php";

$sql = "SELECT player_name, score, level, created_at 
        FROM scores 
        ORDER BY score DESC 
        LIMIT 10";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard - BODMAS Quest</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #111827;
            color: white;
            text-align: center;
            padding: 40px;
        }

        h1 {
            margin-bottom: 30px;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 70%;
            background: #1f2937;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #374151;
        }

        th {
            background: #2563eb;
        }

        tr:hover {
            background: #374151;
        }

        a {
            display: inline-block;
            margin-top: 25px;
            color: #3b82f6;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Top Players Leaderboard</h1>

<table>
    <tr>
        <th>Rank</th>
        <th>Player Name</th>
        <th>Score</th>
        <th>Level</th>
        <th>Date</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    $rank = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rank++ . "</td>";
        echo "<td>" . htmlspecialchars($row['player_name']) . "</td>";
        echo "<td>" . $row['score'] . "</td>";
        echo "<td>" . $row['level'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No scores yet</td></tr>";
}
?>

</table>

<a href="index.php">Back to Game</a>

</body>
</html>