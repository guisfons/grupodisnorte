document.addEventListener("DOMContentLoaded", function () {
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");
    const timelinediv = document.querySelector(".timeline");
    const slides = document.querySelectorAll(".line");
    let index = 0;
    let translateAxis = 0;
    
    if (slides.length === 0) return;

    slides[0].classList.add('active');

    function getSlideWidth() {
        const style = window.getComputedStyle(slides[0]);
        return slides[0].offsetWidth + parseFloat(style.marginRight || 0);
    }

    function updateTimeline() {
        timelinediv.style.transition = "margin-left 0.5s ease"; 
        timelinediv.style.marginLeft = translateAxis + 'px';
    }

    function updateIndex(offset) {
        index = (index + offset + slides.length) % slides.length;
    }

    function updateSlideClass() {
        slides.forEach(slide => slide.classList.remove("active"));
        slides[index].classList.add("active");
    }

    nextButton.addEventListener("click", () => {
        const sw = getSlideWidth();
        if (index === slides.length - 1) {
            index = 0;
            translateAxis = 0;
        } else {
            updateIndex(1);
            translateAxis -= sw;
        }
        updateTimeline();
        updateSlideClass();
    });

    prevButton.addEventListener("click", () => {
        const sw = getSlideWidth();
        if (index === 0) {
            index = slides.length - 1;
            translateAxis = -sw * (slides.length - 1);
        } else {
            updateIndex(-1);
            translateAxis += sw;
        }
        updateTimeline();
        updateSlideClass();
    });

    window.addEventListener("resize", () => {
        translateAxis = -index * getSlideWidth();
        updateTimeline();
    });
});
