// const swiper = new Swiper('.swiper', {
//     // Optional parameters
//     direction: 'vertical',
//     loop: true,
  
//     // If we need pagination
//     pagination: {
//       el: '.swiper-pagination',
//     },
  
//     // Navigation arrows
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
  
//     // And if we need scrollbar
//     scrollbar: {
//       el: '.swiper-scrollbar',
//     },
// });

const swiper = new Swiper(".bannerSwiper", {
    slidesPerView: "auto",
    spaceBetween: 30,
    autoplay: {
      delay: 3000,
    },
    speed: 7000,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
});

// Food Carousel
let circle = document.querySelector('.circle');
let slider = document.querySelector('.slider');
let list = document.querySelector('.list');
let prev = document.getElementById('prev');
let next = document.getElementById('next');
let items = document.querySelectorAll('.list .item');
let count = items.length;
let active = 1;
let leftTransform = 0;
let width_item = items[active].offsetWidth;

next.onclick = () => {
    active = active >= count - 1 ? count - 1 : active + 1;
    runCarousel();
}
prev.onclick = () => {
    active = active <= 0 ? active : active - 1;
    runCarousel();
}
function runCarousel() {
    prev.style.display = (active == 0) ? 'none' : 'block';
    next.style.display = (active == count - 1) ? 'none' : 'block';


    let old_active = document.querySelector('.item.active');
    if(old_active) old_active.classList.remove('active');
    items[active].classList.add('active');

     leftTransform = width_item * (active - 1) * -1;
    list.style.transform = `translateX(${leftTransform}px)`;
}
runCarousel();

// Set Text on a Circle
let textCircle = circle.innerText.split('');
circle.innerText = '';
textCircle.forEach((value, key) => {
    let newSpan =  document.createElement("span");
    newSpan.innerText = value;
    let rotateThisSpan = (360 / textCircle.length) * (key + 1);
    newSpan.style.setProperty('--rotate', rotateThisSpan + 'deg');
    circle.appendChild(newSpan); 
});