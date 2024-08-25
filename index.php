<?php get_header(); ?>

<main id="primary" class="site-main">
    <section>
        <div class="container">
        <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    if (is_singular()) :
                        the_title('<h1 class="entry-title">', '</h1>');
                    else :
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    endif;
                    ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    the_content(sprintf(
                        __('Continue lendo<span class="screen-reader-text"> "%s"</span>', 'meu-tema'),
                        get_the_title()
                    ));

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Páginas:', 'meu-tema'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php
                    if (get_edit_post_link()) :
                        edit_post_link(
                            sprintf(
                                __('Editar<span class="screen-reader-text"> "%s"</span>', 'meu-tema'),
                                get_the_title()
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                    endif;
                    ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile;

        the_posts_navigation();

    else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>
        </div>
    </section>
    
</main><!-- #main -->

<?php get_footer(); ?>
