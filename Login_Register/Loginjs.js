 // background images slider
const slides = document.querySelectorAll('.slide');
let current = 0;

// next image function
function nextSlide(){
    slides[current].classList.remove('active');
    current = (current + 1) % slides.length;
    slides[current].classList.add('active');
}

// 3 seconds interval
setInterval(nextSlide, 3000);
