// Navbar Start
const navbar = document.querySelector('.nav-fixed');
// Navbar End

// Navbar Start
window.onscroll = () => {
  
    if (window.scrollY > 550) {
        navbar.classList.add('nav-active');
    } else {
        navbar.classList.remove('nav-active');
    }
  };
  // Navbar End

  

//  Start Navbar Burger
const burgerIcon = document.querySelector('#burger');
const navbarMenu = document.querySelector('#navbarMenuHeroA');
//  End Navbar Burger

// Start Navbar Burger
document.addEventListener('DOMContentLoaded', () => {
  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {
      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);
      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
});
burgerIcon.addEventListener('click',()=>{
  navbarMenu.classList.toggle('is-active');
})
//  End Navbar Burger