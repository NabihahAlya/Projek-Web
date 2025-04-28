const images = JSON.parse(document.getElementById('slideshow').getAttribute('data-images'));

let current = 0;
const bg = document.querySelector(".slideshow-background");

function changeBackground() {
  bg.style.backgroundImage = `url(${images[current]})`;
  current = (current + 1) % images.length;
}

changeBackground();
setInterval(changeBackground, 5000);

