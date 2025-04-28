const images = ["<?= base_url ('assets/img/fotopage4-1.jpg')?>", "<?= base_url ('assets/img/fotopage4-2.jpg')?>", "<?= base_url ('assets/img/fotopage4-3.jpg')?>"];

let current = 0;
const bg = document.querySelector(".slideshow-background");

function changeBackground() {
  bg.style.backgroundImage = `url(${images[current]})`;
  current = (current + 1) % images.length;
}

changeBackground();
setInterval(changeBackground, 5000);
