<?php get_header(); ?>
<body id="home">

    <div id="js-wrapper" class="l-wrapper theme-color w-full h-full font-serif">

        <?php get_template_part('./parts/loader'); ?>

        <div id="js-container" class="l-container w-full h-full opacity-0">

            <?php get_template_part('./parts/header'); ?>

            <main id="js-main" class="l-main flex w-full h-full">
                <div id="js-main-inner" class="l-main__inner relative ml:w-[90%] s:w-full h-full m-auto">

                    <section data-category="money" class="l-section js-tab-switcher">
                        <div class="l-section__inner">

                        <?php get_template_part('./parts/postListMoney'); ?>

                        </div><!-- .l-section__inner -->
                    </section><!-- .l-section -->

                    <section data-category="idea" class="l-section js-tab-switcher">
                        <div class="l-section__inner">

                        <?php get_template_part('./parts/postListIdea'); ?>

                        </div><!-- .l-section__inner -->
                    </section><!-- .l-section -->

                    <section data-category="item" class="l-section js-tab-switcher">
                        <div class="l-section__inner">

                        <?php get_template_part('./parts/postListItem'); ?>

                        </div><!-- .l-section__inner -->
                    </section><!-- .l-section -->

                    <section data-category="and-more" class="l-section js-tab-switcher">
                        <div class="l-section__inner">

                        <?php get_template_part('./parts/postListAndmore'); ?>

                        </div><!-- .l-section__inner -->
                    </section><!-- .l-section -->

                </div><!-- #js-main__inner -->
            </main><!-- #js-main -->

            <?php get_template_part('./parts/menu'); ?>

            <div id="js-sp-operation" class="p-sp-operation flex ml:hidden justify-center items-center fixed bottom-0 w-full font-link">
                <p class="p-sp-operation__arrow block relative translate-y-2 w-3/5 h-[1.3px] rounded-[1px]">
                    <span class="p-sp-operation__arrow absolute right-0 rotate-[35deg] -translate-x-[.4px] origin-right w-5 h-[1.2px] rounded-[1px]"></span>
                    <span class="absolute bottom-0 centering-x">scroll</span>
                </p>
            </div><!-- #js-sp-operation -->

        </div><!-- .l-container -->
        
    </div><!-- #js-wrapper -->

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/index.js" type="module"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/plugin/lazyload-front.js"></script>
    
    <?php get_footer(); ?>

</body>
</html>