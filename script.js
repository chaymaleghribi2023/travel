let menu =document.querySelector('#menu-btn');
let navbar =document.querySelector('.header .navbar');
menu.onclick =() =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');

}
window.onscroll =() =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

};
var swiper = new Swiper(".home-slider", {
    loop:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});
var swiper = new Swiper(".reviews-slider", {
    loop:true,
    spaceBetween: 20,
    autoHeight:true,
    grabCursor:true,
    breakpoints: {
        640: {
          slidesPerView: 1,
          
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
          
        },
      },
}); 
let loadMoreBtn = document.querySelector('.packages .load-more .btn');
let currentItem = 3;

loadMoreBtn.onclick = () => {
  let boxes = document.querySelectorAll('.packages .box-container .box');
  
  for (var i = currentItem; i < currentItem + 3 && i < boxes.length; i++) {
    boxes[i].style.display ='inline-block';
  }

  currentItem += 3;

  if (currentItem >= boxes.length) {
    loadMoreBtn.style.display ='none';
  }
};



    // Fonction pour afficher le bouton "Mettre à jour"
    function showUpdateButton() {
        document.getElementById('updateButton').style.display = 'block';
    }

    // Attacher un gestionnaire d'événements au bouton "Update" pour déclencher la fonction showUpdateButton()
    document.getElementById('update').addEventListener('click', showUpdateButton);

