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

let currentThemeIndex = 0;

const themes = [
    { textColor: '#1e4a3b', bgColor: '#e2f0d9', borderColor: '#70ad47', size: '1.8rem', family: "'Georgia', 'Times New Roman', serif" },
    { textColor: '#7a3e2e', bgColor: '#fff2cc', borderColor: '#ffc000', size: '2.2rem', family: "'Palatino', 'Georgia', serif" },
    { textColor: '#1f6b5e', bgColor: '#ddebf7', borderColor: '#5bc0de', size: '1.5rem', family: "'Segoe UI', Roboto, sans-serif" },
    { textColor: '#3d2e26', bgColor: '#fce4d6', borderColor: '#ed7d31', size: '2.0rem', family: "'Arial', Helvetica, sans-serif" }
];

function applyStyles() {
    const theme = themes[currentThemeIndex];
    fortuneText.style.color = theme.textColor;
    fortuneBox.style.backgroundColor = theme.bgColor;
    fortuneBox.style.borderColor = theme.borderColor;
    fortuneText.style.fontSize = theme.size;
    fortuneText.style.fontFamily = theme.family;
}
// Styling END

document.querySelectorAll('.controlButton').forEach(button => { // querySelectorAll returns array type data where id/class is = parametre
    button.addEventListener('click', function() {
        currentThemeIndex = parseInt(this.getAttribute('dataTheme'));
        applyStyles();
    });
});

showRandomFortune();
applyStyles();
