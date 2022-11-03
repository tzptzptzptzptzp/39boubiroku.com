<?php get_header(); ?>
<?php
    if ( !is_user_logged_in() && !is_robots() ) {
        setPostViews( get_the_ID() );
    }
?>
<body id="singular">

    <div id="js-wrapper" class="l-wrapper theme-color w-full h-screen font-post">

        <?php get_template_part('./parts/loader'); ?>

        <div id="js-container" class="l-container w-full h-full opacity-0">

            <?php get_template_part('./parts/header'); ?>

            <main id="js-main" class="l-main inline-block relative overflow-scroll w-full h-full">
                <div id="js-main-inner" class="l-main__inner inline relative w-full m-auto">

                    <div id="js-article-header" class="p-article__header fixed top-0 w-full ml:h-[60vh] s:h-[30vh]">

                        <div id="js-article-thumbnail" class="p-article__thumbnail w-full h-full">
                            <img id="js-thumbnail-img" class="p-article__thumbnail-image w-full h-full object-cover" src="<?php if ( is_mobile() ) { the_post_thumbnail_url( "medium" ); } else { the_post_thumbnail_url( "full" ); } ?>" width="1920px" height="1080px" alt="post_thumbnail">
                        </div><!-- .p-article__thumbnail -->
    
                        <div class="p-article__meta absolute centering z-1 ml:w-1/2 s:w-[85%] text-[#ddd] text-center">

                            <?php if ( is_single() ) : ?>
                                <ul class="p-article__tags flex gap-x-[10px] justify-center text-[1.3rem]">
                                    <?php
                                        $tags = get_the_tags();
                                        foreach( $tags as $tag ) {
                                            echo '<li><a href="'. get_tag_link($tag->term_id) .'">'. $tag->name .'</a></li>';
                                        }
                                    ?>
                                </ul>
                            <?php endif; ?>

                            <h1 class="p-article__title text-[2.3rem]"><?php the_title(); ?></h1>

                            <?php if ( is_single() ) : ?>
                                <time class="p-article__time text-[1.2rem]" datatime="<?php the_time('Y-m-d'); ?>"><?php the_time('y/m/d'); ?></time>
                            <?php endif; ?>

                        </div><!-- .p-article__meta -->
    
                    </div><!-- #js-article-header -->
                    
                    <div id="js-thumbnail-area" class="inline-block relative w-full pointer-events-none"></div>

                    <article id="js-article" class="p-article inline relative z-1 w-full h-full">
                        <div class="p-article__inner flex flex-col w-full">

                            <div id="js-article-share" class="p-article__share c-border-theme-color flex justify-between ml:w-4/5 s:w-[90%] mx-auto ml:px-[20%] s:px-[5%] ml:py-24 s:py-12 border-b">
                                <a data-share-twitter href="https://twitter.com/share?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>" target="_blank" rel="nofollow noopener" class="p-article__share-link"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke="currentcolor" fill="currentcolor" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg><span>twitter</span></a>
                                <a data-share-facebook href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener" class="p-article__share-link"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke="currentcolor" fill="currentcolor" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg><span>facebook</span></a>
                                <a data-share-line href="https://social-plugins.line.me/lineit/share?url=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener" class="p-article__share-link"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke="currentcolor" fill="currentcolor" viewBox="0 0 448 512"><path d="M272.1 204.2v71.1c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.1 0-2.1-.6-2.6-1.3l-32.6-44v42.2c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.8 0-3.2-1.4-3.2-3.2v-71.1c0-1.8 1.4-3.2 3.2-3.2H219c1 0 2.1.5 2.6 1.4l32.6 44v-42.2c0-1.8 1.4-3.2 3.2-3.2h11.4c1.8-.1 3.3 1.4 3.3 3.1zm-82-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 1.8 1.4 3.2 3.2 3.2h11.4c1.8 0 3.2-1.4 3.2-3.2v-71.1c0-1.7-1.4-3.2-3.2-3.2zm-27.5 59.6h-31.1v-56.4c0-1.8-1.4-3.2-3.2-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 .9.3 1.6.9 2.2.6.5 1.3.9 2.2.9h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.7-1.4-3.2-3.1-3.2zM332.1 201h-45.7c-1.7 0-3.2 1.4-3.2 3.2v71.1c0 1.7 1.4 3.2 3.2 3.2h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2V234c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2v-11.4c-.1-1.7-1.5-3.2-3.2-3.2zM448 113.7V399c-.1 44.8-36.8 81.1-81.7 81H81c-44.8-.1-81.1-36.9-81-81.7V113c.1-44.8 36.9-81.1 81.7-81H367c44.8.1 81.1 36.8 81 81.7zm-61.6 122.6c0-73-73.2-132.4-163.1-132.4-89.9 0-163.1 59.4-163.1 132.4 0 65.4 58 120.2 136.4 130.6 19.1 4.1 16.9 11.1 12.6 36.8-.7 4.1-3.3 16.1 14.1 8.8 17.4-7.3 93.9-55.3 128.2-94.7 23.6-26 34.9-52.3 34.9-81.5z"/></svg><span>line</span></a>
                            </div><!-- #js-article-share -->

                            <?php if ( is_single() ) : ?>

                                <div class="p-article__category ml:pt-24 s:pt-12 text-xl text-center">
                                    <?php
                                        $categories = get_the_category();
                                        if ( $categories ) {
                                            foreach ( $categories as $category ) {
                                                echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';
                                            }
                                        }
                                    ?>
                                    <a href="/"></a>
                                </div><!-- .p-article__category -->

                                <div class="p-article__reading-time flex flex-col justify-center items-center ml:pt-12 s:pt-6 text-xl text-center">
                                    <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" stroke="currentcolor" fill="currentcolor" viewBox="0 0 512 512"><path d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"/></svg>
                                </div><!-- .p-article__reading-time -->
                                
                            <?php endif; ?>

                            <div data-post id="js-post-content" class="p-content relative z-1 ml:w-1/2 s:w-[96%] mx-auto">
                                <?php the_content(); ?>
                            </div><!-- data-post -->

                            <div class="p-article__share c-border-theme-color flex justify-between ml:w-4/5 s:w-[90%] mx-auto ml:px-[20%] s:px-[5%] ml:py-24 s:py-12 border-t">
                                <a data-share-twitter href="https://twitter.com/share?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>" target="_blank" rel="nofollow noopener" class="p-article__share-link"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke="currentcolor" fill="currentcolor" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg><span>twitter</span></a>
                                <a data-share-facebook href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener" class="p-article__share-link"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke="currentcolor" fill="currentcolor" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg><span>facebook</span></a>
                                <a data-share-line href="https://social-plugins.line.me/lineit/share?url=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener" class="p-article__share-link"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke="currentcolor" fill="currentcolor" viewBox="0 0 448 512"><path d="M272.1 204.2v71.1c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.1 0-2.1-.6-2.6-1.3l-32.6-44v42.2c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.8 0-3.2-1.4-3.2-3.2v-71.1c0-1.8 1.4-3.2 3.2-3.2H219c1 0 2.1.5 2.6 1.4l32.6 44v-42.2c0-1.8 1.4-3.2 3.2-3.2h11.4c1.8-.1 3.3 1.4 3.3 3.1zm-82-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 1.8 1.4 3.2 3.2 3.2h11.4c1.8 0 3.2-1.4 3.2-3.2v-71.1c0-1.7-1.4-3.2-3.2-3.2zm-27.5 59.6h-31.1v-56.4c0-1.8-1.4-3.2-3.2-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 .9.3 1.6.9 2.2.6.5 1.3.9 2.2.9h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.7-1.4-3.2-3.1-3.2zM332.1 201h-45.7c-1.7 0-3.2 1.4-3.2 3.2v71.1c0 1.7 1.4 3.2 3.2 3.2h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2V234c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2v-11.4c-.1-1.7-1.5-3.2-3.2-3.2zM448 113.7V399c-.1 44.8-36.8 81.1-81.7 81H81c-44.8-.1-81.1-36.9-81-81.7V113c.1-44.8 36.9-81.1 81.7-81H367c44.8.1 81.1 36.8 81 81.7zm-61.6 122.6c0-73-73.2-132.4-163.1-132.4-89.9 0-163.1 59.4-163.1 132.4 0 65.4 58 120.2 136.4 130.6 19.1 4.1 16.9 11.1 12.6 36.8-.7 4.1-3.3 16.1 14.1 8.8 17.4-7.3 93.9-55.3 128.2-94.7 23.6-26 34.9-52.3 34.9-81.5z"/></svg><span>line</span></a>
                            </div><!-- .p-article__share -->

                            <div class="p-article__popular flex s:flex-col s:gap-[10px] justify-between ml:w-[90%] s:w-[96%] mx-auto ml:mb-24 s:mb-[10px]">

                                <?php
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 4,
                                        'meta_key' => 'post_views_count',
                                        'order'=>'DESC',
                                        'orderby' => 'meta_value_num'
                                    );
                                    $the_view_query = new WP_Query( $args );
                                    if ( $the_view_query->have_posts() ):
                                    while( $the_view_query->have_posts() ): $the_view_query->the_post();
                                ?>

                                <a class="p-post" href="<?php echo get_permalink(); ?>">
                                    <div class="p-post__inner">
                                        <div class="p-post__thumbnail">
                                            <img class="p-post__image" src="<?php the_post_thumbnail_url('medium'); ?>" width="350px" height="300px" alt="thumbnail" />
                                            <p class="p-post__excerpt"><?php echo get_the_excerpt(); ?></p>
                                        </div>
                                        <div class="p-post__body">
                                            <h2 class="p-post__title"><?php the_title(); ?></h2>
                                            <div class="p-post__meta">
                                                <p class="p-post__tags">
                                                <?php
                                                    $posttags = get_the_tags();
                                                    if ( $posttags ) {
                                                        foreach ( $posttags as $tag ) {
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
                                <?php endif; ?>
                                <?php wp_reset_postdata(); ?>
    
                            </div><!-- .p-article__popular -->

                            <div class="c-border-theme-color ml:w-4/5 s:w-[90%] mx-auto border-t"></div>

                            <div class="p-article__footer w-[25rem] mx-auto mb-12 py-12">
                                <div class="text-[4rem] leading-[3rem] font-logo text-center">
                                    <a href="<?php echo home_url(); ?>">39boubiroku</a>
                                </div>
                                <div class="flex ml:gap-8 s:gap-4 justify-between text-xl s:text-2xl text-center">
                                    <a href="<?php echo home_url(); ?>/profile/" class="w-full">Profile</a>
                                    <a href="<?php echo home_url(); ?>/privacy-policy" class="w-full whitespace-nowrap">Privacy Policy</a>    
                                    <a href="<?php echo home_url(); ?>/sitemap/" class="w-full">Sitemap</a>    
                                </div>
                            </div><!-- .p-article__footer -->

                        </div><!-- .l-article__inner -->
                    </article>

                </div><!-- #js-main__inner -->
            </main><!-- #js-main -->

            <?php get_template_part('./parts/menu'); ?>

            <div id="js-position" class="p-position fixed z-1 s:overflow-hidden ml:w-[2px] s:w-full ml:h-3/5 s:h-[2px]">
                <div class="p-position__bar block relative w-full h-full opacity-30"></div>
                <span id="js-position-point" class="p-position__point absolute ml:top-0 left-1/2 w-6 h-6 rounded-full"></span>
            </div><!-- #js-position -->

            <div id="js-scroller" class="p-scroller fixed z-1 ml:w-[2px] s:w-[35px] ml:h-3/5 s:h-[35px] cursor-pointer">
                <div class="p-scroller__bar block s:hidden relative centering w-full h-full"></div>
                <span class="s:hidden absolute centering w-16 h-full"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="ml:hidden duration-300" width="35px" height="35px" fill="currentColor" stroke="currentColor" viewBox="0 0 448 512"><path d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z"/></svg>
            </div><!-- #js-scroller -->

        </div><!-- .l-container -->
        
    </div><!-- #js-wrapper -->

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/singular.js" type="module"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/plugin/lazyload-singular.js"></script>

    <?php get_footer(); ?>

</body>
</html>