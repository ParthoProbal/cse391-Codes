// No ChatGPT and Gemini can generate such Fortunes

const fortunes = [
    "One day, you SHALL find your \"Celine\"...",
    "Keep Speedrunning, you SHALL be able to repair your Damaged 25 years of life",
    "Date a Girl who can Earn, so that You can have a Chance to Get a Free 5090 as a Valentine gift...",
    "Learn how to Solder GPU VRAMs, you can Double your VRAM",
    "Save Children, by NOT Bringing Them into the World!",
    "Study Hard, Be an Innovator, so that You can make Liquid-Nitrogen CPU coolers at a cheaper price",
    "When the Winter Gets Cold, Grab a Branket, and Cuddle with your \"Samantha\"...",
    "You SHALL watch Your Next World-Cup in a Foreign Country, with your \"Rose\"",
    "Isn't it Fascinating that the Girl you would Date was Born Around 10 thousand kilometers from You, but The Destiny Brought them together!!!",
    "You SHALL Learn a Foreign Language, Just to Understand Why Your Girlfriend is Laughing at You...",
    "The Distance Between You and Your Soulmate is Measured in Time, Not Kilometers...",
    "Be a Power-Efficient CGPA earner, and You will roam Around in Snowy European Streets, the Park, and the Lakeside, with a Warm Hand holding your Hands, sooner than you think..."
];

const fortuneBox = document.querySelector('.fortuneBoxClass'); // querySelector returns the First HTML tag with the Given ID/Class, here class was selected
const fortuneText = document.getElementById('fortuneText'); // gets Element By ID from the DOM
const fortuneHeader = document.querySelector('.fortuneHeaderClass'); // gets the heading element for metadata display


function showRandomFortune() {
    const randomIndex = Math.floor(Math.random() * fortunes.length) // math.random() returns 0 >= num > 1
    let fNo = randomIndex + 1;
    let totalFNo = fortunes.length;
    let fByTotal = fNo + "/" + totalFNo;
    
    fortuneHeader.textContent = "Fortune : " + fByTotal; // Distribute contents to their respective designated tags
    fortuneText.textContent = fortunes[randomIndex]; //.textContent gets the text from the id=fortuneText, and then assigns from the array
}

// Styling START

let textColorIndex = 0;
let bgColorIndex = 0;
let borderColorIndex = 0;
let fontIndex = 0;

const textColors = ['#3d2e26', '#1e4a3b', '#7a3e2e', '#4f3a6b', '#a63c3c', '#1f6b5e'];
const bgColors = ['#fefcf7', '#f6efe8', '#d9e3dd', '#f1e1d4', '#cbdad5', '#e8d9d1'];
const borderColors = ['#d9c8b2', '#b7a28b', '#8f7a63', '#a68d7b', '#c3a68a', '#ad8f78'];
const fontStyles = [
    { size: '1.8rem', family: "'Georgia', 'Times New Roman', serif" },
    { size: '2.2rem', family: "'Palatino', 'Georgia', serif" },
    { size: '1.5rem', family: "'Segoe UI', Roboto, sans-serif" },
    { size: '2.0rem', family: "'Arial', Helvetica, sans-serif" },
    { size: '1.9rem', family: "'Trebuchet MS', sans-serif" },
    { size: '2.4rem', family: "'Courier New', monospace" }
];

function applyStyles() {
    fortuneText.style.color = textColors[textColorIndex];
    fortuneBox.style.backgroundColor = bgColors[bgColorIndex];
    fortuneBox.style.borderColor = borderColors[borderColorIndex];
    fortuneText.style.fontSize = fontStyles[fontIndex].size;
    fortuneText.style.fontFamily = fontStyles[fontIndex].family;
}
// Styling END

// Cycling through Styles
function cycleStyle(styleType) {
    if (styleType === 'textColor') {
        textColorIndex = (textColorIndex + 1) % textColors.length;
    } else if (styleType === 'bgColor') {
        bgColorIndex = (bgColorIndex + 1) % bgColors.length;
    } else if (styleType === 'borderColor') {
        borderColorIndex = (borderColorIndex + 1) % borderColors.length;
    } else if (styleType === 'fontStyle') {
        fontIndex = (fontIndex + 1) % fontStyles.length;
    }
    applyStyles();
}

document.querySelectorAll('.controlButton').forEach(button => { // querySelectorAll returns array type data where id/class is = parametre
    button.addEventListener('click', function() {
        const styleType = this.getAttribute('dataStyle');
        cycleStyle(styleType);
    });
});

showRandomFortune();
applyStyles();
