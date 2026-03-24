<!DOCTYPE html>
<html>
<head>
    <title>BODMAS Quest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1 class="title"> BODMAS Quest</h1>
    <p class="subtitle">Master the Order of Operations — Step by Step!</p>

    <div class="stats">
        <div class="badge">Score: <span id="score">0</span></div>
        <div class="badge">Level: <span id="level">1</span></div>
        <div class="badge">Streak: <span id="streak">0</span></div>
    </div>

    <div class="bodmas-row">
        <div>B</div>
        <div>O</div>
        <div>D</div>
        <div>M</div>
        <div>A</div>
        <div>S</div>
    </div>

    <div class="progress-bar">
        <div id="progress"></div>
    </div>

    <div class="card">
        <h3>Solve step by step — what should we calculate NEXT?</h3>
        <div id="expression" class="expression"></div>
        <div id="options" class="options"></div>
        <p id="message"></p>
    </div>

    <button class="start-btn" onclick="startGame()">Start Game</button>

</div>

<script src="script.js"></script>
</body>
</html>