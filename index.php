<?php get_header(); ?>

<div class="col-md-3">
    <?php get_sidebar('left'); ?>
</div>
<div class="col-md-6">
    <main id="main" class="site-main">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;
            the_posts_navigation();
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
    </main>
</div>
<div class="col-md-3">
    <?php get_sidebar('right'); ?>
</div>

<?php get_footer(); ?>
