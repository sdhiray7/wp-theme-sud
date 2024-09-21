<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php
            react_mimic_theme_posted_on();
            react_mimic_theme_posted_by();
            ?>
        </div>
        <?php endif; ?>
    </header>

    <?php react_mimic_theme_post_thumbnail(); ?>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <?php react_mimic_theme_entry_footer(); ?>
    </footer>
</article>
