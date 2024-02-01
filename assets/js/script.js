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

function insertNavItemTriangles() {
    var screenWidth = window.innerWidth;
    if (screenWidth < 1024) {
        var navItems = document.querySelectorAll('#primary-menu > .menu-item > a')
        var secondaryNavItems = document.querySelectorAll('#menu-secondaire > .menu-item > a')
        navItems.forEach(function(navItem) {
            var triangle = document.createElement('span')
            triangle.classList.add('nav-triangle-green-light')
            navItem.appendChild(triangle)
        })
        secondaryNavItems.forEach(function(navItem) {
            var triangle = document.createElement('span')
            triangle.classList.add('nav-triangle-green-light')
            navItem.appendChild(triangle)
        })
    }
}

function toggleBurgerMenu() {
    var header = document.getElementById('header')
    var toggleBtn = document.getElementById('toggleMenuBtn')
    var headerMenu = document.getElementById('headerMenu')

    headerMenu.classList.add('h-0')
    headerMenu.classList.add('translate-y-[-110%]')

    toggleBtn.addEventListener('click', function() {
        var burgerIcon = toggleBtn.querySelector('.burger-icon')
        var closeIcon = toggleBtn.querySelector('.close-icon')
        var closeText = toggleBtn.querySelector('.close-text')
        if (!header.classList.contains('deployed')) {
            header.classList.add('deployed')
            burgerIcon.classList.add('opacity-0')
            closeIcon.classList.add('opacity-100')
            closeText.classList.add('opacity-100')
            headerMenu.classList.add('translate-y-0')
            headerMenu.classList.add('!h-auto')
            headerMenu.classList.remove('h-0')
            headerMenu.classList.remove('translate-y-[-110%]')
        } else {
            header.classList.remove('deployed')
            burgerIcon.classList.remove('opacity-0')
            closeIcon.classList.remove('opacity-100')
            closeText.classList.remove('opacity-100')
            headerMenu.classList.remove('translate-y-0')
            headerMenu.classList.remove('!h-auto')
            headerMenu.classList.add('translate-y-[-110%]')
            setTimeout(function() {
                headerMenu.classList.add('h-0')
            }, 300)
        }
    })
}

document.addEventListener("DOMContentLoaded", () => {
    let body = document.querySelector("body");
    insertNavItemTriangles()
    toggleBurgerMenu()
})