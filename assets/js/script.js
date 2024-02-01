console.log('Script JS Loaded')

function adjustElementsForScreenSize() {
    var screenWidth = window.innerWidth;
    // Search Field
    var searchField = document.getElementById('headerSearchField');
    var mobileSearchLocation = document.getElementById('mobileSearchForm');
    var originalSearchLocation = document.getElementById('headerSearchForm');
    // Account Link
    var accountLink = document.getElementById('headerAccountLink');
    var mobileAccountLocation = document.getElementById('mobileAccountNav');
    var originalAccountLocation = document.getElementById('headerAccountNav');

    if (screenWidth < 1024) {
        mobileSearchLocation.appendChild(searchField);
        mobileAccountLocation.appendChild(accountLink)
    } else {
        originalSearchLocation.appendChild(searchField);
        originalAccountLocation.appendChild(accountLink)
    }
}

window.addEventListener('load', adjustElementsForScreenSize);
window.addEventListener('resize', adjustElementsForScreenSize);

document.addEventListener("DOMContentLoaded", () => {
    let body = document.querySelector("body");
})