<?php
    $cat_posts = get_posts(array(
        'post_type' => 'post',
        'category_name' => 'idea',
        'posts_per_page' => 7,
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    global $post;
    if ( $cat_posts ) : foreach ( $cat_posts as $post ) : setup_postdata( $post );
?>

<a class="p-post" href="<?php echo get_permalink(); ?>">
    <div class="p-post__inner">
        <div class="p-post__thumbnail">
            <img class="p-post__image lazyload" data-src="<?php the_post_thumbnail_url( 'medium' ); ?>" width="350px" height="300px" alt="post-thumbnail" />
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

<?php endforeach; endif; wp_reset_postdata(); ?>

<?php
    $cat_id = get_cat_ID('idea');
    $cat_link = get_category_link($cat_id);
?>

<a class="p-post p-post-more" href="<?php echo esc_url($cat_link); ?>">
    <div class="p-post__inner">
        <div class="p-post__thumbnail">
            <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post-thumbnail-idea-s.webp" type="image/webp"/></source>
                <img class="p-post__image lazyload" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/post-thumbnail-idea-s.jpg" width="350px" height="300px" alt="more-post-thumbnail" />
            </picture>                        
        </div>
        <div class="p-post__body">
            <h2 class="p-post__title">アイデアに関する記事をさらに見る。</h2>
            <div class="p-post__meta">
                <p class="p-post__category">Idea</p>
                <p class="p-post__more">Read more...</p>
            </div>
        </div>
    </div><!-- .p-post__inner -->
</a><!-- .p-post -->