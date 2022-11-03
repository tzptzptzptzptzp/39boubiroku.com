let el = document.documentElement;
let sun = document.getElementById("js-sun")!;
let moon = document.getElementById("js-moon")!;

const initializeColorMode = () => {
    function getInitialColorMode() {
        //モード情報が保管されている場合にモード情報を返す
        const storedColorMode = window.localStorage.getItem("theme");
        if ( typeof storedColorMode === "string" ) {
            return storedColorMode;
        };
        //ユーザーが定義している場合にモード情報を返す
        const usersColorMode = window.matchMedia("(prefers-color-scheme): dark");
        if ( typeof usersColorMode.matches === "boolean" ) {
            return usersColorMode.matches ? "dark" : "light";
        };
        return "light";
    };
    //初期値のモード情報を適用
    const currentColorMode = getInitialColorMode();
    el.style.setProperty("--initial-color-mode", currentColorMode);
    if ( currentColorMode === "dark" ) {
        el.setAttribute("data-theme", "dark");
        document.querySelector('meta[name="theme-color"]')!.setAttribute("content", "#333");
    } else {
        el.setAttribute("data-theme", "light");
        document.querySelector('meta[name="theme-color"]')!.setAttribute("content", "#fff");
    };
};

initializeColorMode();

const setModeButton = ()=> {
    let initialColorValue = el.style.getPropertyValue("--initial-color-mode");
    if ( initialColorValue === "dark" ) {
        sun.classList.add("active");
    } else {
        moon.classList.add("active");
    }
};

export { el, sun, moon, setModeButton};
