const display = document.getElementById("display");
const startButton = document.getElementById("startButton")
const stopButton = document.getElementById("stopButton")
const resetButton = document.getElementById("resetButton")

let time = 0; // passed time holder
let timer = null; // interval Id stores

function stopTimer() {
    clearInterval(timer);
    timer = null; // stop the timer
}

function resetTimer() {
    stopTimer();
    time = 0;
    display.textContent = time;
}

function startTimer() {
    if (timer !== null) return;

    timer = setInterval (
        function() {
            time += 3;
            display.textContent = time;

            if (time === 30) { // stop at 30 sec
                stopTimer();
            }
        }, 3000
    );
}




startButton.addEventListener("click", startTimer);
stopButton.addEventListener("click", stopTimer);
resetButton.addEventListener("click", resetTimer);