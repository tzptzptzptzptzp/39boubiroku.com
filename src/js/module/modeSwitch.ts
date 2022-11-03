import * as colorMode from "./modeInit"

//モード切り替えボタン
const colorModeSwitcher = document.getElementById("js-mode-switcher")!;
//ボタンクリック時の処理
const colorModeSwitch= () => {
    //ライトモードの時の処理
    if ( colorMode.el.getAttribute("data-theme") === "light" ) {
        colorMode.el.setAttribute("data-theme", "dark");
        window.localStorage.setItem("theme", "dark");
        colorMode.moon.classList.remove("active");
        colorMode.sun.classList.add("active");
        document.querySelector('meta[name="theme-color"]')!.setAttribute("content", "#333");
    //ダークモードの時の処理
    } else {
        colorMode.el.setAttribute("data-theme", "light");
        window.localStorage.setItem("theme", "light");
        colorMode.sun.classList.remove("active");
        colorMode.moon.classList.add("active");
        document.querySelector('meta[name="theme-color"]')!.setAttribute("content", "#fff");
    }
};

export { colorModeSwitcher, colorModeSwitch };
