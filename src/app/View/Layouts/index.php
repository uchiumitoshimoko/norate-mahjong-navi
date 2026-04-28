<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<div class="main category__page" id="oneColumn__block" style="visibility: visible; opacity: 1;">
    <div class="header">
        <div class="module__page-breadcrumb">
            <div class="container ">
                <?php mytheme_breadcrumb(); ?>
            </div>
        </div>
    </div>
</div>


<div class="wrap">

    <div>
        <ul class="menu-category">
            <li class="cat-geeklycolumn"><a href="/column/category/cat-geeklycolumn/">Geekly コラム</a></li>
            <li class="cat-technology"><a href="/column/category/cat-technology/">技術/テクノロジー</a></li>
            <li class="cat-position"><a href="/column/category/cat-position/">職種/ポジション</a></li>
            <li class="cat-webgame"><a href="/column/category/cat-webgame/">Web・ゲーム</a></li>
            <li class="cat-preparation"><a href="/column/category/cat-preparation/">転職準備</a></li>
            <li class="cat-jobsearch"><a href="/column/category/cat-jobsearch/">転職活動</a></li>
        </ul>
    </div>



    <?php if ( have_posts() ) : ?>
    <header class="page-header">
        <h1 class="page-title">最新の記事一覧</h1>
        <?php
        /*
        the_archive_title( '<h1 class="page-title">', 'の記事一覧</h1>' );
        the_archive_description( '<div class="taxonomy-description">', '</div>' );
        */
        ?>
    </header><!-- .page-header -->
    <?php endif; ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            if ( have_posts() ) : ?>
            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();

            /*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
            get_template_part( 'template-parts/post/content', get_post_format() );

            endwhile;

            the_posts_pagination( array(
                'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
            ) );

            else :

            get_template_part( 'template-parts/post/content', 'none' );

            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar(); ?>



</div><!-- .wrap -->

<div class="main foot" id="oneColumn__block" style="visibility: visible; opacity: 1;">

    <div class="header foot">

        <h2 class="htitle">Geekly Media<span>ギークリー メディア</span></h2>
    </div>

    <div class="content__blockA quality__block">
        <p class="htitle">Opportunity Loves Geek. 好機はこだわりと相思相愛である。</p>
        <p class="description__block01">IT/Web/ゲーム業界特化の人材プロフェッショナルならではの視点で「IT」「転職」を徹底解説。
            専門性を追求し続けたからこそ分かる「客観的かつ俯瞰的な"IT"情報」「次のステージへの一歩を後押しする"転職"情報」。
            そんな弊社「こだわり」の情報を提供することで、「IT」「転職」を捉える新しい視点をご提案します。
            それによって、成長意欲溢れるすべての人に「好機」を提供するメディアを目指します。</p>
    </div>

</div>



<?php get_footer();
