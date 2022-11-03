const conditions: boolean = window.innerHeight < window.innerWidth || 959 <= window.innerWidth;

const screenOptimize = () => {
    //要素の高さを合わせる
    let wrapper = document.getElementById("js-wrapper")!;
    wrapper.style.height = (`${window.innerHeight}px`);
};

const postAreaOptimize = () => {
    //コンテンツエリア、ポストの高さを指定
    let post: any = document.querySelectorAll(".p-post");
    let menuContainer: any = document.querySelectorAll(".js-menu-container");
    let mainInner = document.getElementById("js-main-inner")!;
    let menuInner = document.getElementById("js-menu-inner")!;
    let headerHeight = document.getElementById("js-header")!.clientHeight;
    let operation = document.getElementById("js-sp-operation")!;
    if ( operation ) {
        operation.style.height = (`${headerHeight}px`);
    }
    let contentsInnerHeight = (() => {
        if ( conditions ) {
            let value: number = ( menuInner.clientWidth * .5 );
            return value;
        } else {
            let value: number = ( window.innerHeight - ( headerHeight * 1.7 ) );
            return value;
        };
    });
    let postHeight = ((contentsInnerHeight: number) => {
        if ( conditions ) {
            let value: number = ( post[0].clientWidth * .75 );
            return value;
        } else {
            let value: number = ( (contentsInnerHeight - (headerHeight * 1.4 )) / 2 );
            return value;
        };
    });
    let calcContentsInnerHeight: number = contentsInnerHeight();
    let calcPostHeight: number = postHeight(calcContentsInnerHeight);
    if ( document.getElementById("home") ) {
        mainInner.style.height = (`${calcContentsInnerHeight}px`);
    } else if ( (document.getElementById("archive") || document.getElementById("search")) && !conditions ) {
        mainInner.style.height = (`${calcContentsInnerHeight}px`);
    };
    menuInner.style.height = (`${calcContentsInnerHeight}px`);
    for ( let i = 0 ; i < post.length ; i++ ) {
        post[i].style.height = (`${calcPostHeight}px`);
    };
    for ( let i = 0 ; i < menuContainer.length ; i++ ) {
        menuContainer[i].style.height = (`${calcPostHeight}px`);
    };
    //サムネイルの高さを最適化
    let postInner: number = document.getElementsByClassName("p-post__inner")[0].clientHeight;
    let thumbnail: any = document.querySelectorAll(".p-post__thumbnail");
    let body: number = document.getElementsByClassName("p-post__body")[0].clientHeight;
    let thumbnailHeight: number = ( postInner - body );
    for ( let i = 0 ; i < thumbnail.length ; i++ ) {
        thumbnail[i].style.height = (`${thumbnailHeight}px`);
    };
}
export { conditions, screenOptimize, postAreaOptimize };