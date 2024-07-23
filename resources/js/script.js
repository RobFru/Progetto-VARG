// 

window.addEventListener('resize', function() {
    var navbar = document.querySelector('#navbar');
    if (window.innerWidth <= 768) {
      navbar.classList.remove('fixed-top');
    } else {
      navbar.classList.add('fixed-top');
    }
  });