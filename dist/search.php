<?php get_header(); ?>
<body id="search">

    <div id="js-wrapper" class="l-wrapper theme-color w-full h-full font-serif">

        <?php get_template_part('./parts/loader'); ?>

        <div id="js-container" class="l-container w-full h-full opacity-0">

            <?php get_template_part('./parts/header'); ?>

            <main id="js-main" class="l-main flex w-full h-full">
                <div id="js-main-inner" class="l-main__inner relative ml:w-[90%] s:w-full h-full m-auto">

                    <?php if (have_posts()): ?>

                    <div id="js-search-result" class="p-search-result flex s:hidden items-baseline fixed text-center font-post">
                        <h2><?php the_search_query(); ?>&#65306;</h2>
                        <p><?php echo $wp_query->found_posts;?>件</p>
                    </div><!-- #js-search-result -->

                    <section data-archive class="l-section">
                        <div class="l-section__inner">

                            <?php while (have_posts()) : the_post(); ?>

                            <a class="p-post" href="<?php echo get_permalink(); ?>">
                                <div class="p-post__inner">
                                    <div class="p-post__thumbnail">
                                        <img class="p-post__image" src="<?php the_post_thumbnail_url('medium'); ?>" width="350px" height="300px" alt="post-thumbnail" />
                                        <p class="p-post__excerpt"><?php echo get_the_excerpt(); ?></p>
                                    </div>
                                    <div class="p-post__body">
                                        <h2 class="p-post__title"><?php the_title(); ?></h2>
                                        <div class="p-post__meta">
                                            <p class="p-post__tags">
                                                <?php
                                                $posttags = get_the_tags();
                                                if ($posttags) {
                                                    foreach ($posttags as $tag) {
                                                        echo $tag->name . ' ';
                                                    }
                                                }
                                                ?>
                                            </p>
                                            <time class="p-post__time"><?php the_time('y/m/d'); ?></time>
                                        </div>
                                    </div>
                                </div><!-- .p-post__inner -->
                            </a><!-- .p-post -->

                            <?php endwhile; ?>
                            <?php else : ?>

                            <div class="text-center font-post">
                                <h2><?php the_search_query(); ?>はありませんでした。</h2>
                            </div>

                            <?php endif; ?>

                        </div><!-- .l-section__inner -->
                    </section><!-- .l-section -->

                </div><!-- #js-main__inner -->
            </main><!-- #js-main -->

            <?php get_template_part('./parts/menu'); ?>

            <?php
            if ( function_exists( 'pagination' ) ) :
            pagination( $wp_query->max_num_pages, get_query_var( 'paged' ) );
            endif;
            ?>

        </div><!-- .l-container -->
        
    </div><!-- #js-wrapper -->

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/search.js" type="module"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/plugin/lazyload.js"></script>

    <?php get_footer(); ?>

</body>
</html>