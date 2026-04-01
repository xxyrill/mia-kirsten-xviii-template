<?php
get_header();
?>
<main>
    <h1 style="text-align:center;padding:80px 20px;">Blog</h1>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?> style="max-width:800px;margin:0 auto 40px;">
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php
get_footer();
?>