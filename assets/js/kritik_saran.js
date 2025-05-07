document.addEventListener("DOMContentLoaded", function () {
	let current = 0;
	const bg = document.querySelector(".slideshow-background");

	if (!window.slideshowImages || slideshowImages.length === 0 || !bg) return;

	function changeBackground() {
		bg.style.backgroundImage = `url(${slideshowImages[current]})`;
		current = (current + 1) % slideshowImages.length;
	}

	changeBackground();
	setInterval(changeBackground, 2000);
});
