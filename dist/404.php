<?php get_header(); ?>
<body id="404">

    <div id="js-wrapper" class="l-wrapper theme-color w-full h-full font-serif">
            
        <div id="js-container" class="l-container flex w-full h-full">

            <div class="flex flex-col justify-around w-full h-1/2 m-auto ml:pb-24 text-center">

                <h1 class="c-header__logo text-9xl s:text-8xl font-logo">
                    <a href="<?php echo home_url(); ?>" class="c-header__logo-link" title="site-title" rel="home">39boubiroku</a>
                </h1><!-- .p-header__logo -->

                <h2 class="mb-8 ml:text-5xl s:text-4xl">404</h2>

                <div class="text-3xl s:text-xl">
                    <h2 class="mb-12">お探しのページは見つかりませんでした。</h2>
                    <h2 class="mb-12">The page you're looking for can't be found.</h2>
                    <h2 class="mb-12">找不到您要查找的页面。</h2>
                </div>
    
                <footer class="l-footer p-footer">
                    <div class="l-footer__inner">
        
                        <small class="p-footer__copy">&copy;&nbsp;てづっぴ</small>
                    
                    </div><!-- .l-footer__inner -->
                </footer><!-- .l-footer -->            
    
            </div>

        </div><!-- .l-container -->
        
    </div><!-- #js-wrapper -->

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/404.js" type="module"></script>

</body>
</html>