const wrapperTwo = document.querySelector(".carousel-wrapper-two");
const carouselTwo = document.querySelector(".main-carousel-two");
const firstCardWidthTwo = carouselTwo.querySelector(".card").offsetWidth;
const arrowBtnsTwo = document.querySelectorAll(".carousel-wrapper-two i");
const carouselChildrensTwo = [...carouselTwo.children];

let isDraggingTwo = false, isAutoPlayTwo = true, startXTwo, startScrollLeftTwo, timeoutIdTwo;

// Get the number of cards that can fit in the carousel at once
let cardPerViewTwo = Math.round(carouselTwo.offsetWidth / firstCardWidthTwo);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrensTwo.slice(-cardPerViewTwo).reverse().forEach(card => {
    carouselTwo.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrensTwo.slice(0, cardPerViewTwo).forEach(card => {
    carouselTwo.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carouselTwo.classList.add("no-transition");
carouselTwo.scrollLeft = carouselTwo.offsetWidth;
carouselTwo.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtnsTwo.forEach(btn => {
    btn.addEventListener("click", () => {
        carouselTwo.scrollLeft += btn.id == "btn-left" ? -firstCardWidthTwo : firstCardWidthTwo;
    });
});

const dragStartTwo = (e) => {
    isDraggingTwo = true;
    carouselTwo.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startXTwo = e.pageX;
    startScrollLeftTwo = carouselTwo.scrollLeft;
}

const draggingTwo = (e) => {
    if(!isDraggingTwo) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carouselTwo.scrollLeft = startScrollLeftTwo - (e.pageX - startXTwo);
}

const dragStopTwo = () => {
    isDraggingTwo = false;
    carouselTwo.classList.remove("dragging");
}

const infiniteScrollTwo = () => {
    // If the carousel is at the beginning, scroll to the end
    if(carouselTwo.scrollLeft === 0) {
        carouselTwo.classList.add("no-transition");
        carouselTwo.scrollLeft = carouselTwo.scrollWidth - (2 * carouselTwo.offsetWidth);
        carouselTwo.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carouselTwo.scrollLeft) === carouselTwo.scrollWidth - carouselTwo.offsetWidth) {
        carouselTwo.classList.add("no-transition");
        carouselTwo.scrollLeft = carouselTwo.offsetWidth;
        carouselTwo.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutIdTwo);
    if(!wrapperTwo.matches(":hover")) autoPlayTwo();
}

const autoPlayTwo = () => {
    if(window.innerWidth < 800 || !isAutoPlayTwo) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutIdTwo = setTimeout(() => carouselTwo.scrollLeft += firstCardWidthTwo, 2500);
}
autoPlayTwo();

carouselTwo.addEventListener("mousedown", dragStartTwo);
carouselTwo.addEventListener("mousemove", draggingTwo);
document.addEventListener("mouseup", dragStopTwo);
carouselTwo.addEventListener("scroll", infiniteScrollTwo);
wrapperTwo.addEventListener("mouseenter", () => clearTimeout(timeoutIdTwo));
wrapperTwo.addEventListener("mouseleave", autoPlayTwo);