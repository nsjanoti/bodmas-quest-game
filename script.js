let score = 0;
let level = 1;
let streak = 0;
let questionCount = 0;
let maxQuestions = 8;

let currentExpression = [];
let correctAnswer = "";

function startGame() {
    score = 0;
    level = 1;
    streak = 0;
    questionCount = 0;

    updateStats();
    generateQuestion();
}

function generateQuestion() {
    if (questionCount >= maxQuestions) {
        let playerName = prompt("Enter your name:");

fetch("save_score.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded"
    },
    body: `name=${playerName}&score=${score}&level=${level}`
})
.then(response => response.text())
.then(data => {
    alert("Score Saved Successfully!");
});
        return;
    }

    questionCount++;

    currentExpression = [
        randomNum(),
        "+",
        randomNum(),
        "×",
        randomNum()
    ];

    correctAnswer = getCorrectOperation(currentExpression);

    displayExpression();
    displayOptions();
    updateProgress();
}

function randomNum() {
    return Math.floor(Math.random() * 9) + 1;
}

function displayExpression() {
    const container = document.getElementById("expression");
    container.innerHTML = "";

    currentExpression.forEach(item => {
        let span = document.createElement("span");
        span.innerText = item;
        container.appendChild(span);
    });
}

function getCorrectOperation(expr) {
    if (expr.includes("÷")) return "Division";
    if (expr.includes("×")) return "Multiplication";
    if (expr.includes("+")) return "Addition";
    if (expr.includes("-")) return "Subtraction";
}

function displayOptions() {
    const optionsDiv = document.getElementById("options");
    optionsDiv.innerHTML = "";

    const operations = ["Multiplication", "Division", "Addition", "Subtraction"];

    operations.forEach(op => {
        let btn = document.createElement("button");
        btn.innerText = op;
        btn.onclick = () => checkAnswer(op);
        optionsDiv.appendChild(btn);
    });
}

function checkAnswer(selected) {
    const message = document.getElementById("message");

    if (selected === correctAnswer) {
        score += 10;
        streak++;
        message.innerText = "✅ Correct! " + selected + " comes next.";
        message.style.color = "#00ffcc";
    } else {
        streak = 0;
        message.innerText = "❌ Wrong! Follow BODMAS rule.";
        message.style.color = "#ff6b6b";
    }

    updateStats();

    setTimeout(() => {
        message.innerText = "";
        generateQuestion();
    }, 1200);
}

function updateStats() {
    document.getElementById("score").innerText = score;
    document.getElementById("level").innerText = level;
    document.getElementById("streak").innerText = streak;
}

function updateProgress() {
    let progressPercent = (questionCount / maxQuestions) * 100;
    document.getElementById("progress").style.width = progressPercent + "%";
}