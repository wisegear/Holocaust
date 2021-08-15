// Get elements in HTML

const hamburger = document.querySelector(".hamburger");
const mobilenav = document.querySelector(".mobile-nav");
const closenav = document.querySelector(".close-nav");

const usermenu = document.querySelector(".user-menu");
const usermenutoggle = document.querySelector(".user-menu-toggle");

const mobileusermenu = document.querySelector(".mobile-user-menu");
const mobileusermenutoggle = document.querySelector(".mobile-user-menu-toggle");

// Add Event Listeners

// Open and close mobile nav, also remove hamburger when open
hamburger.addEventListener("click", () => {
    mobilenav.classList.toggle("hidden");
    hamburger.classList.toggle("hidden");
});

// Close the mobile nav
closenav.addEventListener("click", () => {
    mobilenav.classList.toggle("hidden");
    hamburger.classList.toggle("hidden");
});

// Add event listener to open the user menu

usermenutoggle.addEventListener("click", () => {
    usermenu.classList.toggle("hidden");
});

// Add event listener to open the mobile user menu

mobileusermenutoggle.addEventListener("click", () => {
    mobileusermenu.classList.toggle("hidden");
});