// Hamburger menu animation
window.onload = function() {
    const menu_btn = document.querySelector(".hamburger");
    const hamburger_menu = document.querySelector(".hamburger__menu");

    // Adds and removes the class "is-active" when the hamburger menu is clicked   
    menu_btn.addEventListener("click", function() {
        menu_btn.classList.toggle("is-active");
        hamburger_menu.classList.toggle("is-active");
    });
}

// Image timeline on intro page using GSAP library
// All images are stacked on top of each other using absolute positioning
// The timeline simply fades them in and out and repeats forever 
const tl = gsap.timeline({repeat: -1, yoyo: true});

// Animation slide 1
tl.from(".image1", { duration: 2, opacity: 1 }, "+=5");
tl.to(".image1", { duration: 2, opacity: 0, ease: "back" });

// Animation slide 2
tl.from(".image2", { duration: 2, opacity: 0 }, "-=4");
tl.to(".image2", { duration: 2, opacity: 1, ease: "back" }, "+=5");

// Removes the image for next animation
tl.to(".image2", { duration: 2, opacity: 0, ease: "back" });

// Animation slide 3
tl.from(".image3", { duration: 2, opacity: 0 }, "-=4");
tl.to(".image3", { duration: 2, opacity: 1, ease: "back" });