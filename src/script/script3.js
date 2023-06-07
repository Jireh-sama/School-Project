const wrapperThree = document.querySelector(".carousel-wrapper-three");
const carouselThree = document.querySelector(".main-carousel-three");
const firstCardWidthThree = carouselThree.querySelector(".card").offsetWidth;
const arrowBtnsThree = document.querySelectorAll(".carousel-wrapper-three i");
const carouselChildrensThree = [...carouselThree.children];

let isDraggingThree = false, isAutoPlayThree = true, startXThree, startScrollLeftThree, timeoutIdThree;

// Get the number of cards that can fit in the carousel at once
let cardPerViewThree = Math.round(carouselThree.offsetWidth / firstCardWidthThree);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrensThree.slice(-cardPerViewThree).reverse().forEach(card => {
    carouselThree.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrensThree.slice(0, cardPerViewThree).forEach(card => {
    carouselThree.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carouselThree.classList.add("no-transition");
carouselThree.scrollLeft = carouselThree.offsetWidth;
carouselThree.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtnsThree.forEach(btn => {
    btn.addEventListener("click", () => {
        carouselThree.scrollLeft += btn.id == "btn-left" ? -firstCardWidthThree : firstCardWidthThree;
    });
});

const dragStartThree = (e) => {
    isDraggingThree = true;
    carouselThree.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startXThree = e.pageX;
    startScrollLeftThree = carouselThree.scrollLeft;
}

const draggingThree = (e) => {
    if(!isDraggingThree) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carouselThree.scrollLeft = startScrollLeftThree - (e.pageX - startXThree);
}

const dragStopThree = () => {
    isDraggingThree = false;
    carouselThree.classList.remove("dragging");
}

const infiniteScrollThree = () => {
    // If the carousel is at the beginning, scroll to the end
    if(carouselThree.scrollLeft === 0) {
        carouselThree.classList.add("no-transition");
        carouselThree.scrollLeft = carouselThree.scrollWidth - (2 * carouselThree.offsetWidth);
        carouselThree.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carouselThree.scrollLeft) === carouselThree.scrollWidth - carouselThree.offsetWidth) {
        carouselThree.classList.add("no-transition");
        carouselThree.scrollLeft = carouselThree.offsetWidth;
        carouselThree.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutIdThree);
    if(!wrapperThree.matches(":hover")) autoPlayThree();
}

const autoPlayThree = () => {
    if(window.innerWidth < 800 || !isAutoPlayThree) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutIdThree = setTimeout(() => carouselThree.scrollLeft += firstCardWidthThree, 2500);
}
autoPlayThree();

carouselThree.addEventListener("mousedown", dragStartThree);
carouselThree.addEventListener("mousemove", draggingThree);
document.addEventListener("mouseup", dragStopThree);
carouselThree.addEventListener("scroll", infiniteScrollThree);
wrapperThree.addEventListener("mouseenter", () => clearTimeout(timeoutIdThree));
wrapperThree.addEventListener("mouseleave", autoPlayThree);