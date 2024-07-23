// Navbar non fixed top da telefono

window.addEventListener('resize', function() {
    var navbar = document.querySelector('#navbar');
    if (window.innerWidth <= 768) {
      navbar.classList.remove('fixed-top');
    } else {
      navbar.classList.add('fixed-top');
    }
  });


//   /* Click icona cuore */
// let heartIcon = document.querySelectorAll('.bi-suit-heart');
// console.log(heartIcon);

// heartIcon.forEach((icon) => {
//     icon.addEventListener("click", () => {
//         console.log("ENTRATO");
//         icon.classList.toggle('bi-suit-heart-fill');
//         icon.classList.toggle('bi-suit-heart');
//     })
// })

// /* Doppio click immagine */
// let cardImg = document.querySelectorAll(".img-card");
// console.log(cardImg);
// cardImg.forEach((img,i)=>{
//     img.addEventListener("dblclick",()=>{
//         heartIcon[i].classList.toggle("bi-suit-heart-fill");
//         heartIcon[i].classList.toggle("bi-suit-heart");
        
//     })
// })