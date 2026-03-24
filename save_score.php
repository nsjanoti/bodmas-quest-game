<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $score = $_POST["score"];
    $level = $_POST["level"];

    $stmt = $conn->prepare("INSERT INTO scores (player_name, score, level) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $name, $score, $level);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>