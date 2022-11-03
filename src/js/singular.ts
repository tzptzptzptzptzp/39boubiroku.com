//layout
import * as layout from "./module/layout";
addEventListener("DOMContentLoaded", layout.screenOptimize);
addEventListener("DOMContentLoaded", layout.postAreaOptimize);
addEventListener("resize", layout.screenOptimize);
addEventListener("resize", layout.postAreaOptimize);
//loader
import * as loader from "./module/loader";
loader.loading();
loader.loaded();
//mode
import { setModeButton } from "./module/modeInit";
setModeButton();
import * as colorMode from "./module/modeSwitch";
colorMode.colorModeSwitcher.addEventListener("click", colorMode.colorModeSwitch);
//menu
import * as menu from "./module/menu";
menu.btn.addEventListener("click", menu.activeSwitch);
/* -------------------- SINGULAR -------------------- */
let header = document.getElementById("js-header")!;
const headerSwitch = () => {
    header.classList.toggle("switch");
};
menu.btn.addEventListener("click", headerSwitch);

let thumb = document.getElementById("js-article-thumbnail")!;
let area = document.getElementById("js-thumbnail-area")!;
let thumbHeight: number = thumb.clientHeight;
area.style.height = (`${thumbHeight}px`);

let main = document.getElementById("js-main")!;
let positionBar = document.getElementById("js-position")!;
let scroller = document.getElementById("js-scroller")!;
const showUI = () => {
    let scrollTop: number = main.scrollTop;
    if ( scrollTop > thumbHeight) {
        header.classList.add("active");
        positionBar.classList.add("active");
        scroller.classList.add("active");
    } else {
        header.classList.remove("active");
        positionBar.classList.remove("active");
        scroller.classList.remove("active");
    };
    let thumbImg = document.getElementById("js-thumbnail-img")!;
    let position: string = (60 - (scrollTop / 10 )) + "%";
    thumbImg.style.objectPosition = `50% ${position}`;
};
main.addEventListener("scroll", showUI);

let postContent: number = document.getElementById("js-post-content")!.clientHeight;
let point = document.getElementById("js-position-point")!;
const scrollPosition = () => {
    let scrollTop: number = main.scrollTop;
    let requiredScroll: number = postContent / 100;
    let currentLocation: number = (Math.round((scrollTop / requiredScroll) * 100) /100);
    if ( currentLocation > 100 ) {
        currentLocation = 100;
    };
    if ( layout.conditions ) {
        point.style.top = `${currentLocation}%`;
    } else {
        point.style.left = `${currentLocation}%`;
    }
};
main.addEventListener("scroll", scrollPosition);
scroller.addEventListener("click", () => {
    main.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});

if ( !layout.conditions ) {
    let headerHeight = header.clientHeight;
    positionBar.style.top = `${headerHeight}px`;
};
