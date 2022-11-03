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
/* -------------------- HOME -------------------- */
let tabSwitcher = document.getElementsByClassName("js-tab-switcher");
const initializeCategory = () => {
    let storedCategoryIndex =  window.localStorage.getItem("categoryIndex");
    if ( typeof storedCategoryIndex == "string" ) {
        let index = Number(storedCategoryIndex);
        menu.catSelector[index].classList.add("active");
        tabSwitcher[index].classList.add("active");
    } else {
        menu.catSelector[1].classList.add("active");
        tabSwitcher[1].classList.add("active");
    };
};
addEventListener("DOMContentLoaded", initializeCategory);

function tabSwitch(this: Element, e: any) {
    if ( !document.getElementById("js-menu")!.classList.contains("active") ) {
        e.preventDefault();
        for ( let i = 0 ; i < menu.catSelector.length ; i++ ) {
            menu.catSelector[i].classList.remove("active");
        };
        for ( let i = 0 ; i < tabSwitcher.length ; i++ ) {
            tabSwitcher[i].classList.remove("active");
        };
        this.classList.add("active");
        const arrayTab: Array<Element> = Array.prototype.slice.call(menu.catSelector);
        const index: number = arrayTab.indexOf(this);
        tabSwitcher[index].classList.add("active");
        window.localStorage.setItem("categoryIndex", `${index}`);
    } 
};
for ( let i = 0 ; i < menu.catSelector.length ; i++ ) {
    menu.catSelector[i].addEventListener("click", tabSwitch);
}

