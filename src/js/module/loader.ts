const loading = () => {
    const imagesLoaded = require("imagesloaded");
    const loader = document.getElementById("js-loader")!;
    const progressBar = document.getElementById("js-loader-progress-bar")!;
    const progressNumber = document.getElementById("js-loader-progress-number")!;
    const imgLoad = imagesLoaded("body");
    const imgTotal = imgLoad.images.length;
    let imgLoaded: number = 0;
    let progressSpeed: number = 8;
    let progressCount: number = 0;
    let progressResult: number = 0;
    let progressInit = setInterval(function () {
        updateProgress();
    }, 25);
    imgLoad.on("progress", function (instance: any, image: any) {
        imgLoaded++
    });
    function updateProgress() {
        progressCount += (imgLoaded / imgTotal) * progressSpeed;
        if (progressCount >= 100 && imgTotal > imgLoaded) {
            progressResult = 99;
        } else if (progressCount > 99.9) {
            progressResult = 100;
        } else {
            progressResult = progressCount;
        };
        let loadedNumber: number = Math.floor(progressResult);
        let loadedNumberString: string = `${loadedNumber}`;
        progressBar.style.width = progressResult + "%";
        progressNumber.innerText = loadedNumberString;
        if (progressResult >= 100 && imgTotal == imgLoaded) {
            clearInterval(progressInit);
            setTimeout(function () {
                loader.classList.add("is-loaded");
            }, 500);
        };
    };
};

const loaded = () =>  {
    let container = document.getElementById('js-container')!;
    setTimeout(function() {
        container.style.opacity = "1";
        },800)
};

export { loading, loaded };