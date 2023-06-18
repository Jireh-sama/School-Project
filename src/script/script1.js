const wrapperOne = document.querySelector(".carousel-wrapper");
const carouselOne = document.querySelector(".main-carousel");
const firstCardWidthOne = carouselOne.querySelector(".card").offsetWidth;
const arrowBtnsOne = document.querySelectorAll(".carousel-wrapper i");
const carouselChildrensOne = [...carouselOne.children];

let isDraggingOne = false, isAutoPlayOne = true, startXOne, startScrollLeftOne, timeoutIdOne;

// Get the number of cards that can fit in the carousel at once
let cardPerViewOne = Math.round(carouselOne.offsetWidth / firstCardWidthOne);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrensOne.slice(-cardPerViewOne).reverse().forEach(card => {
    carouselOne.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrensOne.slice(0, cardPerViewOne).forEach(card => {
    carouselOne.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carouselOne.classList.add("no-transition");
carouselOne.scrollLeft = carouselOne.offsetWidth;
carouselOne.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtnsOne.forEach(btn => {
    btn.addEventListener("click", () => {
        carouselOne.scrollLeft += btn.id == "btn-left" ? -firstCardWidthOne : firstCardWidthOne;
    });
});

const dragStartOne = (e) => {
    isDraggingOne = true;
    carouselOne.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startXOne = e.pageX;
    startScrollLeftOne = carouselOne.scrollLeft;
}

const draggingOne = (e) => {
    if(!isDraggingOne) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carouselOne.scrollLeft = startScrollLeftOne - (e.pageX - startXOne);
}

const dragStopOne = () => {
    isDraggingOne = false;
    carouselOne.classList.remove("dragging");
}

const infiniteScrollOne = () => {
    // If the carousel is at the beginning, scroll to the end
    if(carouselOne.scrollLeft === 0) {
        carouselOne.classList.add("no-transition");
        carouselOne.scrollLeft = carouselOne.scrollWidth - (2 * carouselOne.offsetWidth);
        carouselOne.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carouselOne.scrollLeft) === carouselOne.scrollWidth - carouselOne.offsetWidth) {
        carouselOne.classList.add("no-transition");
        carouselOne.scrollLeft = carouselOne.offsetWidth;
        carouselOne.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutIdOne);
    if(!wrapperOne.matches(":hover")) autoPlayOne();
}

const autoPlayOne = () => {
    if(window.innerWidth < 800 || !isAutoPlayOne) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutIdOne = setTimeout(() => carouselOne.scrollLeft += firstCardWidthOne, 2500);
}
autoPlayOne();

carouselOne.addEventListener("mousedown", dragStartOne);
carouselOne.addEventListener("mousemove", draggingOne);
document.addEventListener("mouseup", dragStopOne);
carouselOne.addEventListener("scroll", infiniteScrollOne);
wrapperOne.addEventListener("mouseenter", () => clearTimeout(timeoutIdOne));
wrapperOne.addEventListener("mouseleave", autoPlayOne);