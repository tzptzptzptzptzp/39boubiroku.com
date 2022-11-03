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
/* -------------------- SEARCH -------------------- */
const getCategory = () => {
    let location: string = String(document.location);
    const result = (cat: string) => {
        if ( location.indexOf(cat) !== -1 ) {
            return true;
        };
    };
    const catSelectorActive = (num: number) => {
        menu.catSelector[num].classList.add("active");
    };
    if ( result("money") ) {
        catSelectorActive(0);
    } else if ( result("idea") ) {
        catSelectorActive(1);
    } else if ( result("item") ) {
        catSelectorActive(2);
    } else if ( result("and") ) {
        catSelectorActive(3);
    };
};
addEventListener('DOMContentLoaded', getCategory);

let header = document.getElementById("js-header")!;
let main = document.getElementById("js-main")!;
let headerHeight = header.clientHeight;
let pagination = document.getElementById("js-pagination")!;
let result = document.getElementById("js-search-result")!;
const mainAreaOptimize = () => {
    pagination.style.bottom = `${headerHeight / 2}px`;
    result.style.bottom = `${headerHeight / 2}px`;
    if ( layout.conditions ) {
        main.style.padding = `${headerHeight * 2}px 0px` ;
    };
};
addEventListener("DOMContentLoaded", mainAreaOptimize);
addEventListener("resize", mainAreaOptimize);
const headerSwitch = () => {
    header.classList.toggle("switch");
};
menu.btn.addEventListener("click", headerSwitch);
