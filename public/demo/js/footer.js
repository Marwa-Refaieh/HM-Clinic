// let calcScrollValue = () => {
//     let scrollProgress = document.getElementById("progress");
//     let progressValue = document.getElementById("progress-value");
//     let pos = document.documentElement.scrollTop;
//     let calcHeight =
//       document.documentElement.scrollHeight -
//       document.documentElement.clientHeight;
//     let scrollValue = Math.round((pos * 100) / calcHeight);
//     if (pos > 100) {
//       scrollProgress.style.display = "grid";
//     } else {
//       scrollProgress.style.display = "none";
//     }
//     scrollProgress.addEventListener("click", () => {
//       document.documentElement.scrollTop = 0;
//     });
//     scrollProgress.style.background = `conic-gradient(#03cc65 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
//   };
  
//   window.onscroll = calcScrollValue;
//   window.onload = calcScrollValue;
var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});