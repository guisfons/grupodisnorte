document.addEventListener("DOMContentLoaded", function () {
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");
    const timelinediv = document.querySelector(".timeline");
    const slides = document.querySelectorAll(".line");
    const width = screen.width;
    let index = 0;
    let translateAxis = 0;
    let translateAxisMobile = 0;
    const slideWidth = width < 500 ? 300 : 400;
    
    slides[0].classList.add('active')

    function updateTimeline() {
        timelinediv.style.transition = "margin-left 0.5s ease"; 
        timelinediv.style.marginLeft = width < 500 ? translateAxisMobile + 'px' : translateAxis + 'px';
    }

    function updateIndex(offset) {
        index = (index + offset + slides.length) % slides.length;
    }

    function updateTranslateAxis(offset) {
        translateAxis += offset * slideWidth;
        translateAxisMobile += offset * 300;
    }

    function updateSlideClass() {
        slides.forEach(slide => slide.classList.remove("active"));
        slides[index].classList.add("active");
    }

    nextButton.addEventListener("click", () => {
        if (index === slides.length - 1) {
            index = 0;
            translateAxis = 0;
            translateAxisMobile = 0;
        } else {
            updateIndex(1);
            updateTranslateAxis(-1);
        }
        updateTimeline();
        updateSlideClass();
    });

    prevButton.addEventListener("click", () => {
        if (index === 0) {
            index = slides.length - 1;
            translateAxis = width < 500 ? -300 * slides.length : -400 * slides.length;
            translateAxisMobile = -300 * slides.length;
        } else {
            updateIndex(-1);
            updateTranslateAxis(1);
        }
        updateTimeline();
        updateSlideClass();
    });
});
