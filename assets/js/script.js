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

function navItems() {
    var screenWidth = window.innerWidth;
    if (screenWidth < 1024) {
        const nav = document.getElementById('primary-menu')
        const navItems = document.querySelectorAll('#primary-menu > .menu-item-has-children')
        const navItemsLink = document.querySelectorAll('#primary-menu > .menu-item-has-children > a')
        navItemsLink.forEach(function(navItem) {
            var triangle = document.createElement('span')
            triangle.classList.add('nav-triangle-green-light')
            triangle.classList.add('top-[25%]')
            triangle.classList.add('right-4')
            triangle.classList.add('rotate-90')
            navItem.appendChild(triangle)
        })
        navItems.forEach(function(item) {
            const subMenu = item.getElementsByClassName('sub-menu')[0]
            var backBtn = document.createElement('button')
            backBtn.classList.add('nav-triangle-green-light')
            backBtn.classList.add('top-8')
            backBtn.classList.add('left-4')
            backBtn.classList.add('-rotate-90')
            subMenu.prepend(backBtn)
            item.addEventListener('click', function() {
                this.classList.toggle('subnav-open')
                subMenu.classList.toggle('!translate-x-0')
            })
        })
    }
}
function toggleBurgerMenu(body) {
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
            body.classList.add('overflow-hidden')
            header.classList.add('deployed')
            burgerIcon.classList.add('opacity-0')
            closeIcon.classList.add('opacity-100')
            closeText.classList.add('opacity-100')
            headerMenu.classList.add('translate-y-0')
            headerMenu.classList.add('!h-[92vh]')
            headerMenu.classList.remove('h-0')
            headerMenu.classList.remove('translate-y-[-110%]')
        } else {
            body.classList.remove('overflow-hidden')
            header.classList.remove('deployed')
            burgerIcon.classList.remove('opacity-0')
            closeIcon.classList.remove('opacity-100')
            closeText.classList.remove('opacity-100')
            headerMenu.classList.remove('translate-y-0')
            headerMenu.classList.remove('!h-[92vh]')
            headerMenu.classList.add('translate-y-[-110%]')
            setTimeout(function() {
                headerMenu.classList.add('h-0')
            }, 300)
        }
    })
}
function fixedHeaderOnScroll() {
    const header = document.querySelector('header')
    const headerHeight = header.offsetHeight;
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > headerHeight) {
            header.classList.remove('relative')
            header.classList.add('fixed')
            header.classList.add('animate__in')
            header.classList.remove('animate__out')
        } else {
            header.classList.remove('fixed')
            header.classList.add('relative')
            header.classList.remove('animate__in')
            header.classList.add('animate__out')
        }
    })
}
function footerAccordeon() {
    var footerNavBlocs = document.querySelectorAll('.footer-nav-block')
    footerNavBlocs.forEach(function(block) {
        const tab = block.children[0]
        const body = block.children[1]
        accordeonSystem(tab, body)
    })
}
function accordeonSystem(tab, body) {
    tab.addEventListener('click', function() {
        if (body.classList.contains('deployed')) {
            body.classList.remove('deployed')
        } else {
            body.classList.add('deployed')
        }
    })
}
function subMenuContainer() {
    var subMenus = document.querySelectorAll('.sub-menu')
    var header = document.querySelector('header')
    subMenus.forEach(function(subMenu) {
        const container = document.createElement('div')
        const subMenuParent = subMenu.parentElement
        var headerHeight = header.offsetHeight
        container.setAttribute("class", "sub-menu-container fixed top-[" + headerHeight + "px] overflow-hidden h-auto left-0 right-0 ")
        container.appendChild(subMenu)
        subMenuParent.appendChild(container)
    })
}

document.addEventListener("DOMContentLoaded", () => {
    let body = document.querySelector("body");
    fixedHeaderOnScroll()
    if (window.matchMedia("(min-width: 1024px)").matches) {
        subMenuContainer()
    }
    if (window.matchMedia("(max-width: 1024px)").matches) {
        navItems()
        toggleBurgerMenu(body)
        footerAccordeon()
    }
})