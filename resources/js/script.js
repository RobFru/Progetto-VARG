// 

window.addEventListener('resize', function() {
    var navbar = document.querySelector('#navbar');
    if (window.innerWidth <= 768) {
      navbar.classList.remove('fixed-top');
    } else {
      navbar.classList.add('fixed-top');
    }
  });




  document.addEventListener('DOMContentLoaded', function() {
    // Assuming you have two carousels with the IDs "carousel1" and "carousel2"
  
    // Get the carousel elements
    const carousel1 = document.getElementById('carousel1');
    const carousel2 = document.getElementById('carousel2');
  
    // Add a click event listener to the next button of carousel2
    carousel2.querySelector('.carousel-control-next').addEventListener('click', function() {
      // Get the current active slide index of carousel1
      const currentSlideIndex = Array.from(carousel1.querySelectorAll('.carousel-item')).findIndex(item => item.classList.contains('active'));
  
      // Get the total number of slides in carousel1
      const totalSlides = carousel1.querySelectorAll('.carousel-item').length;
  
      // Calculate the next slide index
      const nextSlideIndex = (currentSlideIndex + 1) % totalSlides;
  
      console.log(currentSlideIndex, totalSlides, nextSlideIndex);
      // Programmatically change the slide of carousel1
      carousel1.querySelector('.carousel-item:nth-child(' + (nextSlideIndex + 1) + ')').click();
    });
  });