import './bootstrap';
import { Modal, Tooltip, Input, initTE } from "tw-elements";
initTE({ Modal, Tooltip, Input });

const countryTimeZones = {
    'PH': 'Asia/Manila',
    'US': 'America/New_York',
    'SG': 'Asia/Singapore',
    'JP': 'Asia/Tokyo'
}

const currencySymbol = {
    'PH': '₱',
    'US': '$',
    'SG': '$',
    'JP': '¥'
}

const currencyText = {
    'PH': 'PHP',
    'US': 'USD',
    'SG': 'SGD',
    'JP': 'JPY'
}

function getCurrencyText(countryCode){
    return currencyText[countryCode];
}

function getCurrencySymbol(countryCode){
    return currencySymbol[countryCode];
}

function getTimeZone(countryCode) {
    // Return the time zone from the dictionary if available, otherwise return a default value
    return countryTimeZones[countryCode] || 'UTC'; // You can change 'UTC' to any default time zone you prefer
}

const userCountry = window.userCountry || 'PH';
const timeZone = getTimeZone(userCountry);
const currencyElement = document.getElementById('currency');
const currencyTextElement = document.getElementById('currency-text');

if (currencyElement) {
    currencyElement.textContent = getCurrencySymbol(userCountry);
}

if (currencyTextElement){
    currencyTextElement.textContent = getCurrencyText(userCountry);
}

// Function to format and display the time and date
function displayTimeAndDate() {
    const now = new Date();
    const timeOptions = {
        timeZone: timeZone, // Set to Philippines time zone
        hourCycle: 'h12', // Use 24-hour format
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
    };

    const dateOptions = {
        timeZone: timeZone, // Set to Philippines time zone
        day: 'numeric',
        month: 'long',
        year: 'numeric',
    };

    // Create formatters based on the user's country
    const timeFormatter = new Intl.DateTimeFormat(`en-${userCountry}`, timeOptions);
    const dateFormatter = new Intl.DateTimeFormat(`en-${userCountry}`, dateOptions);

    // Format and display the time and date
    const formattedTime = timeFormatter.format(now);
    const formattedDate = dateFormatter.format(now);
    const timeElement = document.getElementById('time');
    const dateElement = document.getElementById('date');
    timeElement.textContent = formattedTime;
    dateElement.textContent = formattedDate;
}

// Update the time and date every second
setInterval(displayTimeAndDate, 1000);