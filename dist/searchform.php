<div class="p-search-container flex relative w-full h-20 min-h-[5rem]">
    <div class="p-search-container__inner flex relative w-full h-full m-auto p-3">
        <div class="c-overlay absolute top-0 left-0 -z-1 w-full h-full rounded-md"></div>
        <form class="c-form flex justify-center w-full h-full text-font" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="c-form__text w-full h-full px-1" type="text" name="s" id="s" value="<?php the_search_query(); ?>">
            <button class="c-form__submit flex w-14 h-full bg-userBlack" type="submit">
                <svg class="c-form__submit-icon m-auto text-white" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                    <g fill='currentColor'>
                        <path d="M22.1 20.1l-4.8-4.8C18.4 13.8 19 12 19 10c0-5-4-9-9-9s-9 4-9 9 4 9 9 9c2 0 3.8-.6 5.3-1.7l4.8 4.8c.6.6 1.4.6 2 0 .5-.6.5-1.5 0-2zM10 16.5c-3.6 0-6.5-2.9-6.5-6.5S6.4 3.5 10 3.5s6.5 2.9 6.5 6.5-2.9 6.5-6.5 6.5z"></path>
                    </g>
                </svg>
            </button>
        </form>
    </div>
</div><!-- .p-search-container -->