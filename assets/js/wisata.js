// JavaScript for handling the trip type tabs and image slider
document.addEventListener('DOMContentLoaded', function() {
    // Trip tab buttons functionality
    const tabButtons = document.querySelectorAll('.room-tabs .btn');
    const roomContainers = document.querySelectorAll('.room-container');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            tabButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Hide all room containers
            roomContainers.forEach(container => container.classList.remove('active'));
            
            // Show the selected room container
            const roomType = this.getAttribute('data-room-type');
            document.getElementById(`${roomType}-room`).classList.add('active');
        });
    });
    
    // Initialize booking buttons
    const bookingButtons = document.querySelectorAll('.booking-btn');
    bookingButtons.forEach(button => {
        button.addEventListener('click', function() {
            alert('Booking system integration will go here!');
            // Here you would typically redirect to booking page or open a booking modal
        });
    });
});

// Function to change main image when thumbnail is clicked
function changeImage(roomType, imageIndex) {
    // Get all thumbnails for this room type
    const thumbnails = document.querySelectorAll(`#${roomType}-room .thumbnail`);
    
    // Remove active class from all thumbnails
    thumbnails.forEach(thumb => thumb.classList.remove('active'));
    
    // Add active class to selected thumbnail
    thumbnails[imageIndex].classList.add('active');
    
    // Update main image src
    const mainImage = document.getElementById(`${roomType}-main-image`);
    mainImage.src = thumbnails[imageIndex].src;
}

// Handle responsive menu for smaller screens
window.addEventListener('resize', function() {
    adjustLayoutForScreenSize();
});

// Call once on page load
function adjustLayoutForScreenSize() {
    const width = window.innerWidth;
    
    // For very small screens, adjust the button group
    if (width <= 576) {
        const btnGroup = document.querySelector('.btn-group');
        if (btnGroup) {
            btnGroup.classList.add('btn-group-vertical');
        }
    } else {
        const btnGroup = document.querySelector('.btn-group');
        if (btnGroup) {
            btnGroup.classList.remove('btn-group-vertical');
        }
    }
}