<header id="js-header" class="l-header z-20 w-full s:p-1">
    <div class="l-header__inner m-auto">

        <nav class="p-nav">
            <ul class="p-nav__inner flex justify-around items-center text-5xl s:text-4xl font-menu">

                <li class="p-nav__item-btn">
                    <div id="js-btn-menu" class="c-btn__menu flex justify-center items-center z-20 w-12 h-12 s:mr-auto s:ml-5 ml:mx-auto">
                        <span id="js-icon-menu" class="c-btn__menu-icon"></span>
                    </div>
                </li><!-- .p-nav__item-btn -->

                <li data-category="money" class="p-nav__item s:left-0 s:pl-2">
                    <a class="js-category-selector p-nav__link opacity-30" href="<?php echo esc_url( get_category_link( get_cat_ID('money') ) ); ?>">
                        <h2 class="p-nav__item-title">Money</h2>
                    </a>
                </li>
                <li data-category="idea" class="p-nav__item s:left-1/4">
                    <a class="js-category-selector p-nav__link opacity-30" href="<?php echo esc_url( get_category_link( get_cat_ID('idea') ) ); ?>">
                        <h2 class="p-nav__item-title">Idea</h2>
                    </a>
                </li>

                <li class="p-nav__item-logo">
                    <h1 class="c-header__logo translate-y-[2px] text-8xl s:text-[5rem] font-logo">
                        <a href="<?php echo home_url(); ?>" class="c-header__logo-link" title="39boubiroku" rel="home">39boubiroku</a>
                    </h1>
                </li><!-- .p-header__logo -->

                <li data-category="item" class="p-nav__item s:left-2/4">
                    <a class="js-category-selector p-nav__link opacity-30" href="<?php echo esc_url( get_category_link( get_cat_ID('item') ) ); ?>">
                        <h2 class="p-nav__item-title">Item</h2>
                    </a>
                </li>
                <li data-category="and-more" class="p-nav__item s:left-3/4 s:pr-2">
                    <a class="js-category-selector p-nav__link opacity-30" href="<?php echo esc_url( get_category_link( get_cat_ID('and more') ) ); ?>">
                        <h2 class="p-nav__item-title">and more</h2>
                    </a>
                </li>

                <li class="p-nav__item-btn">
                    <div id="js-mode-switcher" class="c-btn__mode flex justify-center items-center relative w-12 h-12 s:ml-auto s:mr-5 ml:mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" id="js-sun" class="c-btn__mode-sun absolute top-0 left-0 opacity-0" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" id="js-moon" class="c-btn__mode-moon absolute top-0 left-0 opacity-0" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                    </div>
                </li><!-- .p-nav__item-btn -->

            </ul>
        </nav><!-- .p-header__nav -->

    </div><!-- .l-header__inner -->
</header><!-- #js-header -->