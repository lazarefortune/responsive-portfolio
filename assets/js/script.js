// MENU SHOW AND HIDE

const navMenu = document.getElementById('nav-menu'),
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close');


/* menu show */
if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu');
    });
}

// menu hidden
if (navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu');
    });
}

// Remove menu mobile 
const navLink = document.querySelectorAll('.nav__link');

function linkAction() {
    const navMenu = document.getElementById('nav-menu');
    navMenu.classList.remove('show-menu');
}

navLink.forEach(link => {
    link.addEventListener('click', linkAction);
});

/* Accordion skills */
const skillsContent = document.getElementsByClassName("skills__content"),
  skillsHeader = document.querySelectorAll(".skills__header");

function toggleSkills() {
    let itemClass = this.parentNode.className;

    for (i = 0; i < skillsContent.length; i++) {
        skillsContent[i].className = "skills__content skills__close";
    }
    if (itemClass === "skills__content skills__close") {
      this.parentNode.className = "skills__content skills__open";
    }
}

skillsHeader.forEach((el) => {
    el.addEventListener('click', toggleSkills);
})

// Qualification tabs 

const tabs = document.querySelectorAll('[data-target]'),
    tabContents = document.querySelectorAll('[data-content]');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        console.log('click');
        const target = document.querySelector(tab.dataset.target);

        tabContents.forEach((tabContent) => {
            tabContent.classList.remove('qualification__active');
        });
        target.classList.add('qualification__active');

        tabs.forEach(tab => {
            tab.classList.remove('qualification__active');
        });

        tab.classList.add('qualification__active');
    });
});

/* SERVICES MODAL */

const modalViews = document.querySelectorAll('.services__modal'),
    modalButtons = document.querySelectorAll('.services__button'),
    modalCloses = document.querySelectorAll('.services__modal-close');

let modal = function (modalClick) {
    modalViews[modalClick].classList.add("active-modal");
}

modalButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        modal(index);
    });
});

modalCloses.forEach((close) => {
    close.addEventListener('click', () => {
        modalViews.forEach((modalView) => {
            modalView.classList.remove('active-modal');
        });
    });
});

/* PORTFOLIO SWIPER */

let swiper = new Swiper(".portfolio__container", {
    cssMode: true,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination", 
        clickable: true,
    },
});

/* SCROLL SECTIONS ACTIVE LINK */
const sections = document.querySelectorAll(".section[id]");

function scrollActive() {
    console.log('scroll');
    const scrollY = window.pageYOffset;

    sections.forEach(current => {
        const sectionHeight = current.offsetHeight;
        const sectionTop = current.offsetTop - 50,
        sectionId = current.getAttribute("id");

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            document.querySelector(".nav__menu a[href*='" + sectionId + "']").classList.add("active-link");
        } else {
            document.querySelector(".nav__menu a[href*='" + sectionId + "']").classList.remove("active-link");
        }
    });
}
window.addEventListener("scroll", scrollActive);

/* CHANGE BACKGROUND HEADER */
function scrollHeader() {
    const nav = document.getElementById("header");
    
    if(this.scrollY >= 80) nav.classList.add("scroll__header"); else nav.classList.remove("scroll__header");
}
window.addEventListener("scroll", scrollHeader);

/* SHOW SCROLL TOP */

function scrollUp() {
    const scrollUp = document.getElementById("scroll-up");
 
    if(this.scrollY >= 560) scrollUp.classList.add("show-scroll"); else scrollUp.classList.remove("show-scroll");
}
window.addEventListener("scroll", scrollUp);