document.addEventListener("DOMContentLoaded", function () {
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");
    const timelinediv = document.querySelector(".timeline");
    const slides = document.querySelectorAll(".line");
    
    if (slides.length === 0) return;

    // Observe active slide based on scroll position
    timelinediv.addEventListener('scroll', () => {
        let index = Math.round(timelinediv.scrollLeft / getSlideWidth());
        slides.forEach(slide => slide.classList.remove("active"));
        if (slides[index]) slides[index].classList.add("active");
    });

    // Initialize first slide as active
    slides[0].classList.add("active");

    function getSlideWidth() {
        const style = window.getComputedStyle(slides[0]);
        return slides[0].offsetWidth + parseFloat(style.marginRight || 0);
    }

    nextButton.addEventListener("click", () => {
        const sw = getSlideWidth();
        // If at the end, go back to start
        if (timelinediv.scrollLeft + timelinediv.clientWidth >= timelinediv.scrollWidth - 10) {
            timelinediv.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            timelinediv.scrollBy({ left: sw, behavior: 'smooth' });
        }
    });

    prevButton.addEventListener("click", () => {
        const sw = getSlideWidth();
        // If at the beginning, go to end
        if (timelinediv.scrollLeft <= 10) {
            timelinediv.scrollTo({ left: timelinediv.scrollWidth, behavior: 'smooth' });
        } else {
            timelinediv.scrollBy({ left: -sw, behavior: 'smooth' });
        }
    });
});
