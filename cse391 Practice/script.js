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



document.write(theNum)