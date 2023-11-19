
// Swiper Pricing Start
var swiper = new Swiper(".swiper-pricing", {
  slidesPerGroup: 3,
  pagination: {
    el: '.pricing-pagination',
    clickable: true,
    paginationPerGroup: 1,
  },
  speed: 2500,
        parallax: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  spaceBetween: 30,
  loop: true,
  loopFillGroupWithBlank: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints:{
    0:{
      slidesPerView :1,
    },
    520:{
      slidesPerView :2,
    },
    950:{
      slidesPerView :3,
    },
  },
});
// Swiper Pricing End


// Swiper Testimonial Start
var swiper = new Swiper(".testimonial-swiper", {
slidesPerView: 1,
spaceBetween: 90,
slidesPerGroup: 1,
centerSlide: true,
gragCursor: true,
loop: true,
effect: 'fade',
loopFillGroupWithBlank: true,
pagination: {
el: ".testimonial-pagination",
clickable: true,
},
navigation: {
nextEl: ".swiper-button-next",
prevEl: ".swiper-button-prev",
},
});
// Swiper Testimonial End

//  Start Counter
$('.count').counterUp();
// End Counter

document.addEventListener('DOMContentLoaded', () => {
  // Functions to open and close a modal
  function openModal($el) {
    $el.classList.add('is-active');
  }

  function closeModal($el) {
    $el.classList.remove('is-active');
  }

  function closeAllModals() {
    (document.querySelectorAll('.modal') || []).forEach(($modal) => {
      closeModal($modal);
    });
  }

  // Add a click event on buttons to open a specific modal
  (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
    const modal = $trigger.dataset.target;
    const $target = document.getElementById(modal);

    $trigger.addEventListener('click', () => {
      openModal($target);
    });
  });

  // Add a click event on various child elements to close the parent modal
  (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
    const $target = $close.closest('.modal');

    $close.addEventListener('click', () => {
      closeModal($target);
    });
  });

  // Add a keyboard event to close all modals
  document.addEventListener('keydown', (event) => {
    const e = event || window.event;

    if (e.keyCode === 27) { // Escape key
      closeAllModals();
    }
  });
});




