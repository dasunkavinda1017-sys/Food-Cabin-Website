const slides = document.querySelectorAll('.slide');
let current = 0;

function nextSlide() {
    slides.forEach((slide, index) => {
        slide.classList.remove('active');
        slide.classList.remove('previous');
        if(index === current) slide.classList.add('previous'); // move current to left
    });

    current = (current + 1) % slides.length;
    slides[current].classList.add('active');
}

// change every 3 seconds
setInterval(nextSlide, 3000);
