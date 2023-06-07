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

















































const wrapper2 = document.querySelector(".wrapper-2");
const carousel2 = document.querySelector(".carousel-2");
const firstCardWidth2 = carousel.querySelector(".card-2").offsetWidth;
const arrowBtns2 = document.querySelectorAll(".wrapper-2 i");
const carouselChildrens2 = [...carousel.children];

let isDragging2 = false, isAutoPlay2 = true, startX2, startScrollLeft2, timeoutId2
// Get the number of cards that can fit in the carousel at once
let cardPerView2 = Math.round(carousel2.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrens2.slice(-cardPerView).reverse().forEach(card => {
    carousel2.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrens2.slice(0, cardPerView).forEach(card => {
    carousel2.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carousel2.classList.add("no-transition");
carousel2.scrollLeft = carousel2.offsetWidth;
carousel2.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns2.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel2.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart2 = (e) => {
    isDragging2 = true;
    carousel2.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startX2 = e.pageX;
    startScrollLeft2 = carousel2.scrollLeft;
}

const dragging2 = (e) => {
    if(!isDragging2) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carousel2.scrollLeft = startScrollLeft2 - (e.pageX - startX2);
}

const dragStop2 = () => {
    isDragging2 = false;
    carousel2.classList.remove("dragging");
}

const infiniteScroll2 = () => {
    // If the carousel is at the beginning, scroll to the end
    if(carousel2.scrollLeft === 0) {
        carousel2.classList.add("no-transition");
        carousel2.scrollLeft = carousel2.scrollWidth - (2 * carousel2.offsetWidth);
        carousel2.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carousel2.scrollLeft) === carousel2.scrollWidth - carousel2.offsetWidth) {
        carousel2.classList.add("no-transition");
        carousel2.scrollLeft = carousel2.offsetWidth;
        carousel2.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutId2);
    if(!wrapper2.matches(":hover")) autoPlay2();
}

const autoPlay2 = () => {
    if(window.innerWidth < 800 || !isAutoPlay2) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutId2 = setTimeout(() => carousel2.scrollLeft += firstCardWidth, 2500);
}
autoPlay();

carousel2.addEventListener("mousedown", dragStart);
carousel2.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel2.addEventListener("scroll", infiniteScroll);
wrapper2.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper2.addEventListener("mouseleave", autoPlay);