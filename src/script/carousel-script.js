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


// ---------------------------------------------CAROUSEL #2

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

// ------------------------- CAROUSEL #3

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