const carouse1 = document.querySelector(".carouse1");
const wrapper = document.querySelector(".wrapper");
const arrowBtns = document.querySelectorAll(".wrapper i");
const firstCardWidth = carouse1.querySelector(".card").offsetWidth;
const carouse1Childrens = [...carouse1.children];


let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

let cardPerView = Math.round(carouse1.offsetWidth / firstCardWidth);

carouse1Childrens.slice(-cardPerView).reverse().forEach(card => {
    carouse1.insertAdjacentHTML("afterbegin", card.outerHTML);
});

carouse1Childrens.slice(0, cardPerView).forEach(card => {
    carouse1.insertAdjacentHTML("beforeend", card.outerHTML);
});

arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carouse1.scrollLeft += btn.id === "left" ? -firstCardWidth : firstCardWidth;
    })
})

const dragStart = (e) => {
    isDragging = true;
    carouse1.classList.add("dragging");
    startX = e.pageX;
    startScrollLeft = carouse1.scrollLeft;
}

const dragging = (e) => {
    if (!isDragging) return;

    carouse1.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carouse1.classList.remove("dragging");
}



const infiniteScroll = () => {
    // If the carousel is at the beginning, scroll to the end
    if (carouse1.scrollLeft === 0) {
        carouse1.classList.add("no-transition");
        carouse1.scrollLeft = carouse1.scrollWidth - (2 * carouse1.offsetWidth);
        carouse1.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if (Math.ceil(carouse1.scrollLeft) === carouse1.scrollWidth - carouse1.offsetWidth) {
        carouse1.classList.add("no-transition");
        carouse1.scrollLeft = carouse1.offsetWidth;
        carouse1.classList.remove("no-transition");
    }
    clearTimeout(timeoutId);
    if (!wrapper.matches(":hover")) autoPlay();
}


const autoPlay = () => {
    if (window.innerWidth < 800 || !isAutoPlay) return;

    timeoutId = setTimeout(() => carouse1.scrollLeft += firstCardWidth, 2500);
}

autoPlay();



carouse1.addEventListener("mousedown", dragStart);
carouse1.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carouse1.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);

