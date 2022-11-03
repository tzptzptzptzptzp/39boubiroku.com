<?php

// アイキャッチ画像をサポート
add_theme_support('post-thumbnails');

//サムネイルカラム追加
function customize_manage_posts_columns($columns)
{
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}
add_filter('manage_posts_columns', 'customize_manage_posts_columns');

//サムネイル画像表示
function customize_manage_posts_custom_column($column_name, $post_id)
{
    if ('thumbnail' == $column_name) {
        $thum = get_the_post_thumbnail($post_id, 'small', array('style' => 'width:100px;height:auto;'));
    }
    if (isset($thum) && $thum) {
        echo $thum;
    } else {
        echo __('None');
    }
}
add_action('manage_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2);

// 記事のPVを取得
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

// 記事のPVをカウントする
function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// スマホ表示分岐 
function is_mobile()
{
    $useragents = array(
        'iPhone',
        'iPod',
        'Android.*Mobile',
        'Windows.*Phone',
        'incognito',
        'webmate'
    );
    $pattern = '/' . implode('|', $useragents) . '/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// 投稿ページで<img>タグの情報を書き換える
add_filter('the_content', function($content) {
    if ( is_single() | is_page() ) {
        $content = str_replace('<img', '<img class="lazyload opacity-0" ', $content);
        $content = str_replace('src="https://39boubiroku', 'data-src="https://39boubiroku', $content);
        return $content;
    };
});

// ページネーション
// $range : 左右に何ページ表示するか
// $show_only : 1ページしかない時に表示するかどうか
function pagination($pages, $paged, $range = 2, $show_only = true)
{

    $pages = (int) $pages;
    $paged = $paged ?: 1;

    //表示テキスト
    $text_before  = "&#12296;";
    $text_next    = "&#12297;";

    // １ページのみで表示設定が true の時
    if ($show_only && $pages === 1) {
        echo '<div id="js-pagination" class="p-pagination flex fixed font-post">1</div>';
        return;
    }

    // １ページのみで表示設定が false の時
    if ($pages === 1) return;

    //２ページ以上の時
    if (1 !== $pages) {
        echo '<div id="js-pagination" class="p-pagination flex fixed font-post">';

        // 「前へ」 の表示
        if ($paged > 1) {
            echo '<div class="p-pagination__prev"><a href="', get_pagenum_link($paged - 1), '">', $text_before, '</a></div>';
        }
        for ($i = 1; $i <= $pages; $i++) {

            if ($i <= $paged + $range && $i >= $paged - $range) {
                if ($paged === $i) {
                    echo '<a href="#" class="active">', $i, '</a>';
                } else {
                    echo '<a href="', get_pagenum_link($i), '">', $i, '</a>';
                }
            }
        }
        // 「次へ」 の表示
        if ($paged < $pages) {
            echo '<div class="p-pagination__next"><a href="', get_pagenum_link($paged + 1), '">', $text_next, '</a></div>';
        }
        echo '</div>';
    }
}

//投稿者アーカイブにアクセスさせない
add_filter( 'author_rewrite_rules', '__return_empty_array' );
    function disable_author_archive() {
        if( $_GET['author'] || preg_match('#/author/.+#', $_SERVER['REQUEST_URI']) ){
        wp_redirect( home_url( '/404.php' ) );
        exit;
    }
}
add_action('init', 'disable_author_archive');

//管理画面メニューの不要項目削除
function remove_menus() {
    remove_menu_page( 'edit.php?post_type=page' ); // 固定.
    remove_menu_page( 'edit-comments.php' ); // コメント.
    remove_menu_page( 'tools.php' ); // ツール.
}
add_action( 'admin_menu', 'remove_menus', 999 );

// Head関連の記述
// global-styles-inline-css を非表示にする
add_action('wp_enqueue_scripts', 'remove_my_global_styles');
function remove_my_global_styles()
{
    wp_dequeue_style('global-styles');
}
// meta name="generator" を非表示にする
remove_action('wp_head', 'wp_generator');
// EditURIを非表示にする
remove_action('wp_head', 'rsd_link');
// wlwmanifestを非表示にする
remove_action('wp_head', 'wlwmanifest_link');
// 短縮URLを非表示にする
remove_action('wp_head', 'wp_shortlink_wp_head');
// 絵文字用JS・CSSを非表示にする
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
// コメントフィードを非表示にする
remove_action('wp_head', 'feed_links_extra', 3);
// dns-prefetchを非表示にする
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
function remove_dns_prefetch($hints, $relation_type)
{
    if ('dns-prefetch' === $relation_type) {
        return array_diff(wp_dependencies_unique_hosts(), $hints);
    }
    return $hints;
}
// wp versionを非表示にする
remove_action('wp_head','rest_output_link_wp_head');
//Gutenberg用CSSを非表示にする
function dequeue_plugins_style() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('liquid-block-speech');
    wp_dequeue_style('pochipp-front');
}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);
//jQueryを読み込まない
function delete_jquery() {
    wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'delete_jquery' );
