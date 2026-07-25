// let num = prompt("Enter a Number: ", "");
// num = parseInt(num);

// function isPrime(num) {
//     let count = 0;
//     for (let i = 1; i <= num; i++) {
//         if (num % i == 0) {
//             count++;
//         }
//     }

//     if (count == 2) {
//         document.write("Yes");
//     } else {
//         document.write("No");
//     }
// }

// isPrime(num);

let luckyMsg = [
    "I want to Take you on a Date",
    "Wanna go to the Prom with me?",
    "Let's fight Zombies together!",
    "Can I hold your Hands?"
];

let holiDate = new Date();

function lucky() {
    let idx = parseInt(Math.random() * luckyMsg.length);

    theMsgCls = document.getElementsByClassName("theLuckyMessage")[0];

    theMsgCls.innerHTML = luckyMsg[idx];

}

function theNewWindow() {
    outputWindow = window.open();
    outputWindow.document.open();
    

    outputWindow.document.write(
        "I love you"
    );

    outputWindow.document.close();
}

function showAlertBox() {
    let theText = document.getElementsByClassName("textBox")[0].value;

    alert(theText);


}


let theNum = holiDate.getTime();

console.log(localStorage);

localStorage.setItem("Deck", "Tally Ho");

let theRand = document.getElementById("randomShit");
theRand.innerHTML = localStorage.getItem("Deck");

let countriesIWannaFlee = [
    "Norway",
    "NetherLands",
    "Ireland",
    "Denmark"
];

localStorage.setItem("Final Destination", JSON.stringify(countriesIWannaFlee));

let theString = "";

for (let i = 0; i < countriesIWannaFlee.length; i++) {
    if (i != countriesIWannaFlee.length - 1) {
        theString += countriesIWannaFlee[i] + ", ";
    } else {
       theString += countriesIWannaFlee[i] + "."; 
    }
    
}

document.getElementById("whereDoYouGo").innerHTML = theString;

function clearLocalStorage() {
    localStorage.clear();
}

sessionStorage.setItem("Funny RomCom", "How to Lose a Guy in 10 Days");

let random1 = {
    "name" : "Partho",
    "likes" : "RomComs",
    "wants" : "Foreign Visa"
};

sessionStorage.setItem("Desires", JSON.stringify(random1));

let movie = "Before Sunrise";
let movieType = "Romance";

document.cookie = "name = Probal";
document.cookie = "date of Birth (Original) = 21-02-2004";
document.cookie = `${encodeURIComponent(movie)} = ${encodeURIComponent(movieType)}`;

let correctAns = [0, 2]
let givenAns = [-1, -1]

function selectAns(quesitonIdx, givenIdx) {
    givenAns[quesitonIdx] = givenIdx;
}

function evaluateAns() {
    let marks = 0;

    for (let i = 0; i < correctAns.length; i++) {
        if (correctAns[i] === givenAns[i]) {
            marks++;
        }
    }

    let theMarks = document.getElementsByClassName("marksGot")[0];
    theMarks.innerHTML = "You got " + marks + "/" + correctAns.length + " !"

    let studentName = prompt("Enter Your name: ");
    let studentId = prompt("Enter ID: ");
    let stuInfo = [studentName, marks];
    document.cookie = `${studentId} = ${JSON.stringify(stuInfo)}`;

    location.reload();
}

// (i) Array of questions with unique id, question, options, and correct answer index
let questions = [
    {
        "id": 1,
        "question": "What is the capital of Bangladesh?",
        "options": ["Chittagong", "Dhaka", "Sylhet", "Rajshahi"],
        "correct": 1
    },
    {
        "id": 2,
        "question": "Which programming language runs in the browser?",
        "options": ["Java", "C++", "JavaScript", "Python"],
        "correct": 2
    },
    {
        "id": 3,
        "question": "What is 5 + 3?",
        "options": ["6", "7", "8", "9"],
        "correct": 2
    }
];

let currentQuesIdx = 0;
let totalPoints = 0;
let correctCount = 0;
let incorrectCount = 0;
let selectedOption = -1;

// (ii) Display the question one-by-one inside an HTML table
function renderQuestion() {
    let container = document.getElementById("quizContainer");

    if (currentQuesIdx < questions.length) {
        let q = questions[currentQuesIdx];
        selectedOption = -1; // reset selected index for new question

        let html = "<table border='1' cellpadding='10'>";
        html += "<tr><th>Question " + q.id + "</th><td>" + q.question + "</td></tr>";
        
        for (let i = 0; i < q.options.length; i++) {
            html += "<tr>";
            html += "<td><input type='radio' name='qOpt' value='" + i + "' onclick='selectOption(" + i + ")'></td>";
            html += "<td>" + q.options[i] + "</td>";
            html += "</tr>";
        }

        // (iii) Create a submit button labeled "Answer" at the bottom of the table
        html += "<tr><td colspan='2' align='center'><input type='button' value='Answer' onclick='submitAnswer()'></td></tr>";
        html += "</table>";

        container.innerHTML = html;
    } else {
        // (iv) & (v) Summary and Leaderboard handling after all questions are completed
        showFinalSummary();
    }
}

function selectOption(optIdx) {
    selectedOption = optIdx;
}

// (iii) Check answer, add 5 points if correct, update counts, save to cookie
function submitAnswer() {
    if (selectedOption === -1) {
        alert("Please select an answer first!");
        return;
    }

    let q = questions[currentQuesIdx];

    if (selectedOption === q.correct) {
        totalPoints += 5;
        correctCount++;
    } else {
        incorrectCount++;
    }

    // Save total points to cookie
    document.cookie = "totalPoints=" + totalPoints;

    currentQuesIdx++;
    renderQuestion();
}

// (iv) & (v) Show summary and ask for name to store in leaderboard cookie
function showFinalSummary() {
    let container = document.getElementById("quizContainer");
    
    let summaryText = "<h2>Quiz Completed!</h2>";
    summaryText += "<p>Correct Answers: " + correctCount + "</p>";
    summaryText += "<p>Incorrect Answers: " + incorrectCount + "</p>";
    summaryText += "<p>Final Score: " + totalPoints + " points</p>";

    container.innerHTML = summaryText;

    let studentName = prompt("Quiz Finished! Enter your name for the leaderboard:");

    if (studentName) {
        let leaderboardData = [studentName, totalPoints];
        
        // Using serialize() if available or JSON fallback
        let serializedVal = typeof serialize === "function" ? serialize(leaderboardData) : JSON.stringify(leaderboardData);
        
        // Save to separate cookie variable
        document.cookie = "leaderboard=" + encodeURIComponent(serializedVal);
    }
}

// Initial load call
renderQuestion();


document.write(theNum)