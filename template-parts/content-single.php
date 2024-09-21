<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-meta">
            <?php
            react_mimic_theme_posted_on();
            react_mimic_theme_posted_by();
            ?>
        </div>
    </header>

    <?php react_mimic_theme_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'react-mimic-theme' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div>

    <footer class="entry-footer">
        <?php react_mimic_theme_entry_footer(); ?>
    </footer>
</article>
