<div id="js-menu" class="l-menu theme-color flex fixed top-0 z-10 invisible w-full h-full opacity-0">
    <div id="js-menu-inner" class="l-menu__inner flex flex-col justify-between relative w-[90%] s:w-full m-auto s:p-[2%]">

        <div class="js-menu-container flex gap-2">

            <?php
                if ( is_mobile() ){
                    $args = array(
                        'post_type' => 'post',
                        'post__in' => array(79),
                        'posts_per_page' => 1,
                        'order'=>'ASC',
                        'orderby' => 'post_data'
                    );    
                } else {
                    $args = array(
                        'post_type' => 'post',
                        'post__in' => array(79,136),
                        'posts_per_page' => 2,
                        'order'=>'ASC',
                        'orderby' => 'post_data'
                    );    
                }
                $query = new WP_Query( $args );
                if ( $query->have_posts() ):
                while( $query->have_posts() ): $query->the_post();
            ?>

            <a class="p-post s:!w-[49.5%]" href="<?php echo get_permalink(); ?>">
                <div class="p-post__inner">
                    <div class="p-post__thumbnail">
                        <img class="p-post__image lazyload" data-src="<?php the_post_thumbnail_url('medium'); ?>" width="350px" height="300px" alt="post-thumbnail" />
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

            <div class="p-infomation flex flex-col gap-5 justify-between w-[49%] h-full">

                <div class="p-tag-cloud relative overflow-hidden h-full p-3">
                    <div class="c-overlay absolute top-0 left-0 -z-1 w-full h-full rounded-md"></div>
                    <div class="p-tag-cloud__inner flex flex-wrap gap-x-[10px] content-start overflow-y-scroll h-full">
                        
                        <?php
                            $tags = get_tags();
                            foreach ( $tags as $tag ) {
                                echo '<a href="'. get_tag_link($tag->term_id) .'">' . $tag->name . '</a>';
                            }
                        ?>
                    
                    </div>
                </div><!-- .p-tag-cloud -->

                <?php get_search_form(); ?>

            </div><!-- .p-infomation -->

        </div><!-- .js-menu-container -->

        <div class="js-menu-container flex justify-between font-link">

            <div class="p-profile flex justify-around w-full h-full text-center">

                <div class="flex col-2 justify-end items-center relative s:hidden">
                    <img class="w-32 h-32" src="<?php echo get_template_directory_uri(); ?>/assets/images/code-tzp-jp.png" width="80px" height="80px" alt="QRコード" />
                    <p class="absolute -right-1/3 -rotate-90">てづっぴ.jp</p>
                </div>

                <div class="flex col-3 s:col-6 flex-col justify-around h-full s:text-center">
                    <a href="https://xn--j9jdc2d.jp/">てづっぴ.jp</a>
                    <a href="https://xn--j9jdc2d.com/">てづっぴ.com</a>
                    <a href="https://tzp.pink/">Design Tomato</a>
                    <a class="ml:hidden" href="https://www.youtube.com/channel/UCdT6RgpVc2gSol0DMxVfO0Q">YouTube</a>
                    <a class="ml:hidden" href="https://twitter.com/tzptzptzptzptzp">Twitter</a>
                    <a class="ml:hidden" href="https://www.instagram.com/tzptzptzptzptzp/?hl=ja">Instagram</a>
                    <a class="ml:hidden" href="https://github.com/tzptzptzptzptzp">GitHub</a>
                </div>

                <div class="flex col-2 s:col-6 flex-col justify-center w-full h-full">
                    <div class="overflow-hidden ml:w-64 s:w-44 ml:h-64 s:h-44 mx-auto rounded-full">
                        <picture>
                            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/bisyojo_chan.webp" type="image/webp" />
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bisyojo_chan.jpg" width="300px" height="300px" alt="美少女ちゃんアイコン" />
                        </picture>
                    </div>
                    <p>テツカ ヒロキ</p>
                </div>

                <div class="flex s:hidden col-3 s:col-6 flex-col justify-around h-full">
                    <a href="https://www.youtube.com/channel/UCdT6RgpVc2gSol0DMxVfO0Q">YouTube</a>
                    <a href="https://twitter.com/tzptzptzptzptzp">Twitter</a>
                    <a href="https://www.instagram.com/tzptzptzptzptzp/?hl=ja">Instagram</a>
                    <a href="https://github.com/tzptzptzptzptzp">GitHub</a>
                </div>

                <div class="flex s:hidden col-2 justify-start items-center relative">
                    <p class="absolute -left-1/3 rotate-90">39boubiroku</p>
                    <img class="w-32 h-32" src="<?php echo get_template_directory_uri(); ?>/assets/images/code-39boubiroku.png" width="80px" height="80px" alt="QRコード" />
                </div>

            </div><!-- .p-profile -->

        </div><!-- .js-menu-container -->

        <footer class="l-footer fixed bottom-2 centering-x">
            <div class="l-footer__inner">

                <small class="p-footer__copy">&copy;&nbsp;てづっぴ</small>

            </div><!-- .l-footer__inner -->
        </footer><!-- .l-footer -->

    </div><!-- .l-menu__inner -->
</div><!-- #js-menu -->