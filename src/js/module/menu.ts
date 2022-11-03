//メニュー関連の処理
let btn = document.getElementById("js-btn-menu")!;
let icon = document.getElementById("js-icon-menu")!;
let menu = document.getElementById("js-menu")!;
let catSelector = document.getElementsByClassName("js-category-selector");
const activeSwitch = () => {
    icon.classList.toggle("active");
    menu.classList.toggle("active");
    for ( let i = 0 ; i < catSelector.length ; i++ ) {
        catSelector[i].classList.toggle("opacity-30");
    };
};
export { btn, activeSwitch, catSelector };