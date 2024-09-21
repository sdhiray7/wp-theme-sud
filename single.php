<?php get_header(); ?>

<div class="col-md-3">
    <?php get_sidebar('left'); ?>
</div>
<div class="col-md-6">
    <main id="main" class="site-main">
        <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'single' );
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endwhile;
        ?>
    </main>
</div>
<div class="col-md-3">
    <?php get_sidebar('right'); ?>
</div>

<?php get_footer(); ?>
