function changeImage(roomType, imageIndex) {
	// Update main image
	document.getElementById(`${roomType}-main-image`).src =
		roomImages[roomType][imageIndex];

	// Update active thumbnail
	const thumbnails = document.querySelectorAll(`#${roomType}-room .thumbnail`);
	thumbnails.forEach((thumb, index) => {
		if (index === imageIndex) {
			thumb.classList.add("active");
		} else {
			thumb.classList.remove("active");
		}
	});
}

// Room type selection
document.addEventListener("DOMContentLoaded", function () {
	const roomButtons = document.querySelectorAll(".room-tabs .btn");
	const roomContainers = document.querySelectorAll(".room-container");

	roomButtons.forEach((button) => {
		button.addEventListener("click", function () {
			// Update active button
			roomButtons.forEach((btn) => btn.classList.remove("active"));
			this.classList.add("active");

			// Show selected room container
			const roomType = this.getAttribute("data-room-type");
			roomContainers.forEach((container) => {
				container.classList.remove("active");
			});
			document.getElementById(`${roomType}-room`).classList.add("active");
		});
	});

	// Initialize thumbnails
	for (const roomType in roomImages) {
		// Set initial main images
		document.getElementById(`${roomType}-main-image`).src =
			roomImages[roomType][0];

		// Set thumbnail images
		const thumbnails = document.querySelectorAll(
			`#${roomType}-room .thumbnail`
		);
		thumbnails.forEach((thumb, index) => {
			thumb.src = roomImages[roomType][index].replace("800/400", "200/150");
		});
	}
});
